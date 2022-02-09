<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFile;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Utility\ConvertBytes;
use Monolog\Logger;
use Monolog\Handler\TestHandler;
use Monolog\Processor\PsrLogMessageProcessor;
use PrettyXml\Formatter;
use Psr\Log\LoggerInterface;
use Symfony\Component\Stopwatch\Stopwatch;

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
     * @var \PrettyXml\Formatter
     */
    protected $xmlFormatter;

    /**
     * A Symfony stopwatch.
     *
     * @var \Symfony\Component\Stopwatch\Stopwatch
     */
    private $stopWatch;

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
     * @return Media
     *            The Media object.
     *
     * @throws InvalidFileException
     *            On failure.
     */
    public static function loadFromFile(string $path, ?LoggerInterface $external_logger = null, ?string $fail_level = null): Media
    {
        // @todo lock file while reading, capture fstats to prevent overwrites.
        $dataFile = new DataFile($path);
        return static::parse($dataFile, $external_logger, $fail_level);
    }

    /**
     * Creates a Media object from data.
     *
     * @param DataElement $data_element
     *            The data element providing the data.
     * @param \Psr\Log\LoggerInterface|null $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|null $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force media parsing to stop.
     *
     * @return Media
     *            The Media object.
     */
    public static function parse(DataElement $data_element, ?LoggerInterface $external_logger = null, ?string $fail_level = null): Media
    {
        // Determine the media format.
        $media_format = new ItemDefinition(static::getMatchingMediaCollection($data_element));

        // Build the Media object and its immediate child, that represents the
        // media format. Then parse the media according to the media format.
        $media = new static($external_logger, $fail_level);
        $media->getStopwatch()->start('media-parsing');
        $media->debugBlockInfo($data_element);
        $media->addBlock($media_format)->parseData($data_element);
        $media->getStopwatch()->stop('media-parsing');

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
    protected static function getMatchingMediaCollection(DataElement $data_element): Collection
    {
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
        $media = new ItemDefinition(Collection::get('Media'));
        parent::__construct($media);
        $this->logger = (new Logger('mediaprobe'))
          ->pushHandler(new TestHandler(Logger::INFO))
          ->pushProcessor(new PsrLogMessageProcessor());
        $this->externalLogger = $external_logger;
        $this->failLevel = $fail_level ? Logger::toMonologLevel($fail_level) : null;
        $this->stopWatch = new Stopwatch();
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

    /**
     * Returns the stopwatch.
     */
    public function getStopwatch(): Stopwatch
    {
        return $this->stopWatch;
    }
}
