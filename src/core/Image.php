<?php

namespace ExifEye\core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataString;
use ExifEye\core\Utility\ConvertBytes;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\TestHandler;
use Monolog\Processor\PsrLogMessageProcessor;

/**
 * Class to handle image data.
 */
class Image extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'image';

    /**
     * The Block handling class for the image.
     *
     * @var string
     */
    protected $imageClass;

    /**
     * The internal logger instance for this Image object.
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
     * ExifEye normally intercepts and logs image parsing issues without
     * breaking the flow. However it is possible to enable hard failures by
     * defining the minimum log level at which the parsing process will breaking
     * and throw an ExifEyeException.
     *
     * @var int
     */
    protected $failLevel;

    /**
     * Creates an Image object from a file.
     *
     * @param string $path
     *            the path to an image file on the file system.
     * @param \Psr\Log\LoggerInterface $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force image parsing to stop.
     *
     * @returns Image|false
     *            the Image object if successful, or false if the file cannot
     *            be parsed.
     */
    public static function createFromFile($path, LoggerInterface $external_logger = null, $fail_level = false)
    {
        $handling_class = static::determineImageHandlingClass(new DataString(file_get_contents($path, false, null, 0, 10)));

        if ($handling_class !== false) {
            $image = new static($handling_class, $external_logger, $fail_level);
            $data_element = new DataString(file_get_contents($path));
            $image->loadFromData($data_element, 0, $data_element->getSize());
            return $image;
        }

        return false;
    }

    /**
     * Creates an Image object from data.
     *
     * @param DataElement $data_element
     *            the data string object providing the data.
     * @param \Psr\Log\LoggerInterface $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force image parsing to stop.
     *
     * @returns Image|false
     *            the Image object if successful, or false if the data cannot
     *            be parsed.
     */
    public static function createFromData(DataElement $data_element, LoggerInterface $external_logger = null, $fail_level = false)
    {
        $handling_class = static::determineImageHandlingClass($data_element);

        if ($handling_class !== false) {
            $image = new static($handling_class, $external_logger, $fail_level);
            $image->loadFromData($data_element, 0, $data_element->getSize());
            return $image;
        }

        return false;
    }

    /**
     * Determines the PHP class to use for parsing the image data.
     *
     * @param DataElement $data_element
     *            the data element that will provide the data.
     *
     * @returns string|false
     *            the PHP fully qualified class name if successful, or false if
     *            the data cannot be parsed.
     */
    protected static function determineImageHandlingClass(DataElement $data_element)
    {
        // JPEG image?
        if ($data_element->getBytes(0, 3) === Jpeg::JPEG_HEADER) {
            return '\ExifEye\core\Block\Jpeg';
        }

        // TIFF image?
        $byte_order = Tiff::getTiffSegmentByteOrder($data_element);
        if ($byte_order !== null) {
            return '\ExifEye\core\Block\Tiff';
        }

        return false;
    }

    /**
     * Constructs an Image object.
     *
     * @param string $image_class
     *            The handling class for the image.
     * @param \Psr\Log\LoggerInterface $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force image parsing to stop.
     */
    public function __construct($image_class, LoggerInterface $external_logger = null, $fail_level = false)
    {
        // Set the element type to 'image' in the constructor.
        parent::__construct('image');
        $this->imageClass = $image_class;
        $this->logger = (new Logger('exifeye'))
          ->pushHandler(new TestHandler(Logger::INFO))
          ->pushProcessor(new PsrLogMessageProcessor());
        $this->externalLogger = $external_logger;
        $this->failLevel = $fail_level !== false ? Logger::toMonologLevel($fail_level) : false;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        $image_handler = new $this->imageClass($this);
        $image_handler->loadFromData($data_element, $offset, $size, $options);
        return $this;
    }

    /**
     * Determines the MIME type of the image.
     *
     * @returns string
     */
    public function getMimeType()
    {
        return $this->getElement('*')->getMimeType();
    }

    /**
     * Save the Image object as a file.
     *
     * @param string $path
     *            the path to the image file on the file system.
     *
     * @return int|false
     *            The number of bytes that were written to the file, or FALSE on
     *            failure.
     */
    public function saveToFile($path)
    {
        return file_put_contents($path, $this->toBytes());
    }

    /**
     * Returns the DOM structure of the Image object as an XML string.
     *
     * @returns string
     */
    public function toXML()
    {
        return $this->DOMNode->ownerDocument->saveXML();
    }

    /**
     * Returns the log entries of the Image.
     *
     * @param string $level_name
     *            (Optional) If specified, filters only the entries
     *            of the specified severity level.
     *
     * @returns array
     *            An array of Monolog entries.
     */
    public function dumpLog($level_name = null)
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
