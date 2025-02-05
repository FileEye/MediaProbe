<?php

declare(strict_types=1);

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFile;
use FileEye\MediaProbe\Model\BlockInterface;
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
    /**
     * Constructs a Media object.
     *
     * @param ?LoggerInterface $externalLogger
     *   (Optional) a PSR-3 compliant logger callback. Consuming code can have higher level
     *   logging facilities in place. Any entry sent to the internal logger will also be sent to
     *   the callback, if specified.
     * @param ?string $failLevel
     *   (Optional) a PSR-3 compliant log level. Any log entry at this level or above will force
     *   media parsing to stop.
     */
    public function __construct(
        ?LoggerInterface $externalLogger,
        ?string $failLevel,
    ) {
        parent::__construct(
            definition: new ItemDefinition(CollectionFactory::get('Media')),
            failLevel: $failLevel ? Logger::toMonologLevel($failLevel) : null,
            logger: (new Logger('mediaprobe'))
                ->pushHandler(new TestHandler(Level::Info))
                ->pushProcessor(new PsrLogMessageProcessor()),
            externalLogger: $externalLogger,
        );
    }

    /**
     * Creates a Media object from a file.
     *
     * @param string $path
     *   The path to a media file on the file system.
     * @param ?LoggerInterface $externalLogger
     *   (Optional) a PSR-3 compliant logger callback.
     * @param ?string $failLevel
     *   (Optional) a PSR-3 compliant log level. Any log entry at this level or above will force
     *   media parsing to stop.
     *
     * @throws MediaProbeException
     */
    public static function parseFromFile(
        string $path,
        ?LoggerInterface $externalLogger = null,
        ?string $failLevel = null,
    ): Media {
        // @todo lock file while reading, capture fstats to prevent overwrites.
        $dataFile = new DataFile($path);
        return static::parse($dataFile, $dataFile->typeHints, $externalLogger, $failLevel);
    }

    /**
     * Creates a Media object from data.
     *
     * @param DataElement $dataElement
     *   The data element providing the data.
     * @param list<string> $typeHints
     *   (Optional) a list of most likely MIME types.
     * @param ?LoggerInterface $externalLogger
     *   (Optional) a PSR-3 compliant logger callback.
     * @param ?string $failLevel
     *   (Optional) a PSR-3 compliant log level. Any log entry at this level or above will force
     *   media parsing to stop.
     *
     * @throws MediaProbeException
     */
    public static function parse(
        DataElement $dataElement,
        array $typeHints = [],
        ?LoggerInterface $externalLogger = null,
        ?string $failLevel = null,
    ): Media {
        $media = new Media($externalLogger, $failLevel);
        $media->getStopwatch()->start('media-parsing');

        // Determine the media type. Stop immediately if not processable.
        try {
            $mediaType = new ItemDefinition(
                collection: MediaTypeResolver::fromDataElement($dataElement, $typeHints),
            );
        } catch (MediaProbeException $e) {
            assert($media->debugInfo(['dataElement' => $dataElement]));
            $media->critical($e->getMessage());
            $media->getStopwatch()->stop('media-parsing');
            return $media;
        }

        // Build the Media object and its immediate child, that represents the actual media. Then
        // parse the media according to the media format.
        $media->setAttribute('mimeType', (string) $mediaType->collection->getPropertyValue('item'));
        assert($media->debugInfo(['dataElement' => $dataElement]));
        $mediaTypeBlock = $media->addBlock($mediaType);
        assert($mediaTypeBlock instanceof BlockInterface);
        $mediaTypeBlock->parseData($dataElement);
        $media->level = $mediaTypeBlock->level();
        $media->getStopwatch()->stop('media-parsing');

        return $media;
    }

    protected function doParseData(DataElement $data): void
    {
        throw new \LogicException(__METHOD__ . '() is not implemented');
    }

    /**
     * Determines the MIME type of the media.
     */
    public function getMimeType(): string
    {
        return $this->getAttribute('mimeType');
    }

    /**
     * Save the Media object as a file.
     *
     * @param string $path
     *   The path to the media file on the file system.
     *
     * @return int
     *   The number of bytes that were written to the file.
     *
     * @throws MediaProbeException
     */
    public function saveToFile(string $path): int
    {
        $size = file_put_contents($path, $this->toBytes());
        if ($size === false) {
            throw new MediaProbeException('File save failed');
        }
        return $size;
    }

    public function collectInfo(array $context = []): array
    {
        $info = parent::collectInfo($context);

        if ($context['dataElement'] instanceof DataFile) {
            $info['_msg'] .= ' file: ' . basename($context['dataElement']->filePath);
        }
        
        $info['mimeType'] = $this->getAttribute('mimeType');

        if ($info['mimeType']) {
            $info['_msg'] .= ' MIME type: {mimeType}';
        }

        return $info;
    }
}
