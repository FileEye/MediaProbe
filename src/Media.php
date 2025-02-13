<?php

declare(strict_types=1);

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Block\Media\Tiff\Ifd;
use FileEye\MediaProbe\Block\Media\Tiff\IfdEntryValueObject;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFile;
use FileEye\MediaProbe\Model\EntryInterface;
use FileEye\MediaProbe\Model\RootBlockBase;
use Monolog\Handler\TestHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Processor\PsrLogMessageProcessor;
use Psr\Log\LoggerInterface;

/**
 * Class to handle media data.
 *
 * This is the root class of any media file, and the base for accessing any
 * of its DOM-represented components.
 */
class Media extends RootBlockBase
{
    public function __construct(
        ?Level $failLevel = null,
        ?LoggerInterface $externalLogger = null,
    ) {
        parent::__construct(
            collection: CollectionFactory::get('Media'),
            failLevel: $failLevel,
            logger: (new Logger('mediaprobe'))
                ->pushHandler(new TestHandler(Level::Info))
                ->pushProcessor(new PsrLogMessageProcessor()),
            externalLogger: $externalLogger,
        );
    }

    /**
     * Creates a Media object from a file.
     *
     * @param string $filePath
     *   The path to a media file on the file system.
     * @param ?LoggerInterface $externalLogger
     *   (Optional) a PSR-3 compliant logger callback.
     * @param ?string $failLevel
     *   (Optional) a PSR-3 compliant log level. Any log entry at this level or above will force
     *   media parsing to stop.
     */
    public static function createFromFile(
        string $filePath,
        ?LoggerInterface $externalLogger = null,
        ?string $failLevel = null,
    ): Media {
        $dataFile = new DataFile($filePath);
        $media = new Media(
            failLevel: $failLevel ? Logger::toMonologLevel($failLevel) : null,
            externalLogger: $externalLogger,
        );
        $media->fromDataElement($dataFile);
        return $media;
    }

    public function fromDataElement(DataElement $dataElement): Media
    {
        $this->getStopwatch()->start('media-parsing');

        $this->size = $dataElement->getSize();

        try {
            // Determine the media type.
            $mediaTypeCollection = MediaTypeResolver::fromDataElement($dataElement);
            $this->mimeType = (string) $mediaTypeCollection->getPropertyValue('mimeType');
            assert($this->debugInfo(['dataElement' => $dataElement]));
            // Build the Media immediate child object, that represents the actual media. Then
            // parse the media according to the media format.
            $mediaTypeHandler = $mediaTypeCollection->handler();
            $mediaTypeBlock = new $mediaTypeHandler(
                collection: $mediaTypeCollection,
                parent: $this,
            );
            $mediaTypeBlock->fromDataElement($dataElement);
            $this->graftBlock($mediaTypeBlock);
            static::makerNoteToBlock($this);
        } catch (MediaProbeException $e) {
            assert($this->debugInfo(['dataElement' => $dataElement]));
            $this->critical($e->getMessage());
        }

        $this->getStopwatch()->stop('media-parsing');

        return $this;
    }

    /**
     * Save the Media object as a file.
     *
     * @param string $filePath
     *   The path to the media file on the file system.
     *
     * @return int
     *   The number of bytes that were written to the file.
     *
     * @throws MediaProbeException
     */
    public function saveToFile(string $filePath): int
    {
        $size = file_put_contents($filePath, $this->toBytes());
        if ($size === false) {
            throw new MediaProbeException('File save failed');
        }
        return $size;
    }

    /**
     * Converts a maker note tag to an IFD structure.
     */
    public static function makerNoteToBlock(Media $media): void
    {
        // Get the Exif subIfd if existing.
        if (!$exif_ifd = $media->getElement("//ifd[@name='ExifIFD']")) {
            return;
        }
        assert($exif_ifd instanceof Ifd, get_class($exif_ifd));

        // Get MakerNote tag from Exif IFD.
        if (!$maker_note_tag = $exif_ifd->getElement("tag[@name='MakerNote']")) {
            return;
        }
        assert($maker_note_tag instanceof Tag);

        // Get Make tag from IFD0.
        if (!$make_tag = $media->getElement("//ifd[@name='IFD0']/tag[@name='Make']")) {
            return;
        }
        $maker = $make_tag && $make_tag->getElement("entry") ? $make_tag->getElement("entry")->getValue() : 'na';  // xx modelTag should always have an entry, so the check is irrelevant but a test fails

        // Get Model tag from IFD0.
        $model_tag = $media->getElement("//ifd[@name='IFD0']/tag[@name='Model']");
        $model = $model_tag && $model_tag->getElement("entry") ? $model_tag->getElement("entry")->getValue() : 'na';  // xx modelTag should always have an entry, so the check is irrelevant but a test fails

        // Get maker note collection.
        if (!$maker_note_collection = static::getMakerNoteCollection($make_tag->getElement("entry")->getValue(), $model)) {
            $media->info("**** No decoder available to parse maker notes for {maker}/{model}", [
                'maker' => $maker,
                'model' => $model,
            ]);
            return;
        }

        // Load maker note into IFD.
        $ifd_class = $maker_note_collection->handler();
        $maker_note_ifd_name = $maker_note_collection->getPropertyValue('item');  // xx why not name?? it used to work
        $media->debug("**** Parsing maker notes for {maker}/{model}", [
            'maker' => $maker,
            'model' => $model,
        ]);
        $entry = $maker_note_tag->getElement("entry");
        assert($entry instanceof EntryInterface);

        $ifdEntry = new IfdEntryValueObject(
            collection: $maker_note_collection,
            dataFormat: $maker_note_tag->getFormat(),
            countOfComponents: $maker_note_tag->getComponents(),
            data: 0,
        );
        $ifd = new $ifd_class(
            ifdEntry: $ifdEntry,
            dataDisplacement: $maker_note_tag->getDefinition()->dataOffset,
            parent: $exif_ifd,
        );
        $ifd->setAttribute('id', '37500');
        $ifd->setAttribute('name', $maker_note_ifd_name);
        $data = $entry->getDataElement();
        $ifd->fromDataElement($data);
        $exif_ifd->graftBlock($ifd, $maker_note_tag);

        // Remove the MakerNote tag that has been converted to IFD.
        $exif_ifd->removeElement("tag[@name='MakerNote']");
    }

    /**
     * Determines the Collection of the maker notes.
     *
     * @param string $make
     *            the value of IFD0/Make.
     * @param string $model
     *            the value of IFD0/Model.
     *
     * @return CollectionInterface|null
     *            the Collection object describing the maker notes, or null if
     *            no specification exists.
     */
    protected static function getMakerNoteCollection(string $make, string $model): ?CollectionInterface
    {
        $maker_notes_collection = CollectionFactory::get('ExifMakerNotes\MakerNotes');
        foreach ($maker_notes_collection->listItemIds() as $maker_note_collection_id) {
            $maker_note_collection = $maker_notes_collection->getItemCollection($maker_note_collection_id);
            if ($maker_note_collection->getPropertyValue('make') === $make) {
                return $maker_note_collection;
            }
        }
        return null;
    }
}
