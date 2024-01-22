<?php declare(strict_types=1);

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataFile;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Model\RootBlockBase;
use FileEye\MediaProbe\Utility\ConvertBytes;
use Monolog\Handler\TestHandler;
use Monolog\Level;
use Monolog\Logger;
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
class Media extends RootBlockBase
{
    /**
     * The internal Monolog logger instance for this Media object.
     */
    protected Logger $logger;

    /**
     * The minimum log level for failure.
     *
     * MediaProbe normally intercepts and logs media parsing issues without
     * breaking the flow. However it is possible to enable hard failures by
     * defining the minimum log level at which the parsing process will break
     * and throw an MediaProbeException.
     */
    protected ?Level $failLevel;

    /**
     * An XML prettify formatter.
     */
    protected Formatter $xmlFormatter;

    /**
     * A Symfony stopwatch.
     */
    private Stopwatch $stopWatch;

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
        protected ?LoggerInterface $externalLogger,
        ?string $failLevel,
    )
    {
        $media = new ItemDefinition(CollectionFactory::get('Media'));
        parent::__construct($media);
        $this->logger = (new Logger('mediaprobe'))
            ->pushHandler(new TestHandler(Logger::INFO))
            ->pushProcessor(new PsrLogMessageProcessor());
        $this->failLevel = $failLevel ? Logger::toMonologLevel($failLevel) : null;
        $this->stopWatch = new Stopwatch();
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
    public static function parseFromFile(string $path, ?LoggerInterface $externalLogger = null, ?string $failLevel = null): Media
    {
        // @todo lock file while reading, capture fstats to prevent overwrites.
        $dataFile = new DataFile($path);
        return static::parse($dataFile, $externalLogger, $failLevel);
    }

    /**
     * Creates a Media object from data.
     *
     * @param DataElement $dataElement
     *   The data element providing the data.
     * @param ?LoggerInterface $externalLogger
     *   (Optional) a PSR-3 compliant logger callback.
     * @param ?string $failLevel
     *   (Optional) a PSR-3 compliant log level. Any log entry at this level or above will force
     *   media parsing to stop.
     *
     * @throws MediaProbeException
     */
    public static function parse(DataElement $dataElement, ?LoggerInterface $externalLogger = null, ?string $failLevel = null): Media
    {
        // Determine the media format.
        $mediaType = new ItemDefinition(MediaTypeResolver::fromDataElement($dataElement));

        // Build the Media object and its immediate child, that represents the
        // media format. Then parse the media according to the media format.
        $media = new static($externalLogger, $failLevel);
        $media->getStopwatch()->start('media-parsing');
        assert($media->debugInfo(['dataElement' => $dataElement]));
        $media->addBlock($mediaType)->parseData($dataElement);
        $media->getStopwatch()->stop('media-parsing');

        return $media;
    }

    /**
     * @todo remove, replace by parser
     */
    protected function doParseData(DataElement $data): void
    {
    }

    /**
     * Determines the MIME type of the media.
     */
    public function getMimeType(): string
    {
        return $this->getElement('*')->getMimeType();
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

    /**
     * Returns the DOM structure of the Media object as an XML string.
     *
     * @param bool $pretty
     *   TRUE if the XML should be prettified.
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
     *   (Optional) If specified, filters only the entries of the specified severity level.
     *
     * @return array
     *   An array of Monolog entries.
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

    public function getStopwatch(): Stopwatch
    {
        return $this->stopWatch;
    }
}
