<?php

declare(strict_types=1);

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFile;
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

        try {
            // Determine the media type.
            $mediaTypeCollection = MediaTypeResolver::fromDataElement($dataElement);
            $this->mimeType = (string) $mediaTypeCollection->getPropertyValue('mimeType');
            assert($this->debugInfo(['dataElement' => $dataElement]));
            // Build the Media immediate child object, that represents the actual media. Then
            // parse the media according to the media format.
            $mediaTypeHandler = $mediaTypeCollection->getHandler();
            $mediaTypeBlock = new $mediaTypeHandler(
                collection: $mediaTypeCollection, 
                parent: $this,
            );
            $mediaTypeBlock->fromDataElement($dataElement);
            $this->graftBlock($mediaTypeBlock);
            $this->level = $mediaTypeBlock->level();
        } catch (MediaProbeException $e) {
            assert($this->debugInfo(['dataElement' => $dataElement]));
            $this->critical($e->getMessage());
        }

        $this->getStopwatch()->stop('media-parsing');

        return $this;
    }

    public function graftBlock($mediaTypeBlock): void 
    {
        $this->DOMNode->appendChild($mediaTypeBlock->DOMNode);
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
}
