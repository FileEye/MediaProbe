<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Utility\ConvertBytes;
use Monolog\Logger;
use Monolog\Handler\TestHandler;
use Monolog\Processor\PsrLogMessageProcessor;
use PrettyXml\Formatter;
use Psr\Log\LoggerInterface;

/**
 * Class to handle media data.
 *
 * This is the root class of any media file, and the base for accessing any
 * of its DOM-represented components.
 */
class Media extends BlockBase
{
    /**
     * The internal logger instance for this Media object.
     *
     * @var \Monolog\Logger
     */
    protected $logger;

    /**
     * A PSR-3 compliant logger callback.
     *
     * Consuming code can have higher level logging facilities in place. Any
     * entry sent to the internal logger will also be sent to the callback, if
     * specified.
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $externalLogger;

    /**
     * The minimum log level for failure.
     *
     * MediaProbe normally intercepts and logs media parsing issues without
     * breaking the flow. However it is possible to enable hard failures by
     * defining the minimum log level at which the parsing process will break
     * and throw an InvalidFileException.
     *
     * @var int
     */
    protected $failLevel;

    /**
     * An XML prettify formatter.
     *
     * @var PrettyXml\Formatter
     */
    protected $xmlFormatter;

    /**
     * Creates a Media object from a file.
     *
     * @param string $path
     *            The path to a media file on the file system.
     * @param \Psr\Log\LoggerInterface|null $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|null $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force media parsing to stop.
     *
     * @return Media|null
     *            The Media object.
     *
     * @throws InvalidFileException
     *            On failure.
     */
    public static function createFromFile(string $path, ?LoggerInterface $external_logger = null, ?string $fail_level = null): Media
    {
        $magic_data_element = new DataString(file_get_contents($path, false, null, 0, 10), $external_logger);
        $media_format_collection = static::getMatchingMediaCollection($magic_data_element, $external_logger);
        $data_element = new DataString(file_get_contents($path), $external_logger);
        return static::doCreate($media_format_collection, $data_element, $external_logger, $fail_level);
    }

    /**
     * Creates a Media object from data.
     *
     * @param DataElement $data_element
     *            the data string object providing the data.
     * @param \Psr\Log\LoggerInterface|null $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|null $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force media parsing to stop.
     *
     * @return Media
     *            The Media object.
     *
     * @throws InvalidFileException
     *            On failure.
     */
    public static function createFromData(DataElement $data_element, ?LoggerInterface $external_logger = null, ?string $fail_level = null): Media
    {
        $media_format_collection = static::getMatchingMediaCollection($data_element, $external_logger);
        return static::doCreate($media_format_collection, $data_element, $external_logger, $fail_level);
    }

    /**
     * Creates a Media object from data.
     *
     * @param Collection $media_format_collection
     *            The media format collection.
     * @param DataElement $data_element
     *            The data string object providing the data.
     * @param \Psr\Log\LoggerInterface|null $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|null $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force media parsing to stop.
     *
     * @return Media
     *            The Media object.
     */
    protected static function doCreate(Collection $media_format_collection, DataElement $data_element, ?LoggerInterface $external_logger, ?string $fail_level): Media
    {
        // Build the Media object and its immediate child, that represents the
        // media format. Then load the media according to the media format.
        $media = new static($external_logger, $fail_level);
        try {
            $media_format_class = $media_format_collection->getPropertyValue('class');
            $media_format = new $media_format_class($media_format_collection, $media);
            $media_format->loadFromData($data_element);
            $media->valid = $media_format->isValid();
        } catch (\Throwable $e) {
            $media->error(get_class($e) . ': ' . $e->getMessage());
            $media->valid = false;
        }
        return $media;
    }

    /**
     * Determines the media format collection of the media data.
     *
     * @param DataElement $data_element
     *            the data element that will provide the data.
     *
     * @return Collection
     *            The media format collection.
     *
     * @throws InvalidFileException
     *            On failure.
     */
    protected static function getMatchingMediaCollection(DataElement $data_element, ?LoggerInterface $external_logger): Collection
    {
        if ($external_logger) {
            $external_logger->debug('Check data to identify media type');
        }
        $media_collection = Collection::get('Media');
        // Loop through the 'Media' collection items, each of which defines a
        // media format collection, and checks if the media matches the format.
        // When a match is found, return the media format collection.
        foreach ($media_collection->listItemIds() as $media_format_collection_id) {
            $format_collection = $media_collection->getItemCollection($media_format_collection_id);
            $format_class = $format_collection->getPropertyValue('class');
            if ($format_class::isDataMatchingFormat($data_element)) {
                return $format_collection;
            }
        }

        throw new InvalidFileException('Media format not managed by MediaProbe');
    }

    /**
     * Constructs a Media object.
     *
     * @param \Psr\Log\LoggerInterface|null $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|null $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force media parsing to stop.
     */
    public function __construct(?LoggerInterface $external_logger, ?string $fail_level)
    {
        parent::__construct(Collection::get('Media'));
        $this->logger = (new Logger('mediaprobe'))
          ->pushHandler(new TestHandler(Logger::INFO))
          ->pushProcessor(new PsrLogMessageProcessor());
        $this->externalLogger = $external_logger;
        $this->failLevel = $fail_level ? Logger::toMonologLevel($fail_level) : null;
    }

    /**
     * Determines the MIME type of the media.
     *
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->getElement('*')->getMimeType();
    }

    /**
     * Save the Media object as a file.
     *
     * @param string $path
     *            The path to the media file on the file system.
     *
     * @return int
     *            The number of bytes that were written to the file.
     *
     * @throws InvalidFileException
     *            On failure.
     */
    public function saveToFile(string $path): int
    {
        $size = file_put_contents($path, $this->toBytes());
        if ($size === false) {
            throw new InvalidFileException('File save failed');
        }
        return $size;
    }

    /**
     * Returns the DOM structure of the Media object as an XML string.
     *
     * @param bool $pretty
     *            TRUE if the XML should be prettified.
     *
     * @return string
     */
    public function toXml(bool $pretty = false): string
    {
        if ($pretty && !$this->$xmlFormatter) {
            $this->$xmlFormatter = new Formatter();
        }
        $xml = $this->DOMNode->ownerDocument->saveXML();
        return $pretty ? $this->$xmlFormatter->format($xml) : $xml;
    }

    /**
     * xx todo
     */
    protected function getLogger(): Logger
    {
        return $this->logger;
    }

    /**
     * Returns the log entries of the Media object.
     *
     * @param string $level_name
     *            (Optional) If specified, filters only the entries of the
     *            specified severity level.
     *
     * @return array
     *            An array of Monolog entries.
     */
    public function dumpLog(?string $level_name = null): array
    {
        $handler = $this->logger->getHandlers()[0];
        $ret = [];
        foreach ($handler->getRecords() as $record) {
            if (($level_name && $record['level_name'] === $level_name) || !$level_name) {
                $ret[] = $record;
            }
        }
        return $ret;
    }
}
