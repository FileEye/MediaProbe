<?php

namespace FileEye\ImageProbe\core;

use FileEye\ImageProbe\core\Block\BlockBase;
use FileEye\ImageProbe\core\Block\Jpeg;
use FileEye\ImageProbe\core\Block\Tiff;
use FileEye\ImageProbe\core\Data\DataElement;
use FileEye\ImageProbe\core\Data\DataString;
use FileEye\ImageProbe\core\Utility\ConvertBytes;
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
     * ImageProbe normally intercepts and logs image parsing issues without
     * breaking the flow. However it is possible to enable hard failures by
     * defining the minimum log level at which the parsing process will breaking
     * and throw an ImageProbeException.
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
     * @param string|false $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force image parsing to stop.
     *
     * @returns Image|false
     *            the Image object if successful, or false if the file cannot
     *            be parsed.
     */
    public static function createFromFile($path, LoggerInterface $external_logger = null, $fail_level = false)
    {
        $magic_data_element = new DataString(file_get_contents($path, false, null, 0, 10));
        if (!$image_format_collection = static::getImageFormatCollection($magic_data_element)) {
            return false;
        }
        $data_element = new DataString(file_get_contents($path));
        return static::doCreate($image_format_collection, $data_element, $external_logger, $fail_level);
    }

    /**
     * Creates an Image object from data.
     *
     * @param DataElement $data_element
     *            the data string object providing the data.
     * @param \Psr\Log\LoggerInterface $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|false $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force image parsing to stop.
     *
     * @returns Image|false
     *            the Image object if successful, or false if the data cannot
     *            be parsed.
     */
    public static function createFromData(DataElement $data_element, LoggerInterface $external_logger = null, $fail_level = false)
    {
        if (!$image_format_collection = static::getImageFormatCollection($data_element)) {
            return false;
        }
        return static::doCreate($image_format_collection, $data_element, $external_logger, $fail_level);
    }

    /**
     * Creates an Image object from data.
     *
     * @param Collection $image_format_collection
     *            The image format collection.
     * @param DataElement $data_element
     *            The data string object providing the data.
     * @param \Psr\Log\LoggerInterface $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|false $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force image parsing to stop.
     *
     * @returns Image|false
     *            the Image object if successful, or false if the data cannot
     *            be parsed.
     */
    protected static function doCreate(Collection $image_format_collection, DataElement $data_element, LoggerInterface $external_logger = null, $fail_level = false)
    {
        // Build the Image object and its immediate child, that represents the
        // image format. Then load the image according to the image format.
        $image = new static($external_logger, $fail_level);
        try {
            $image_format_class = $image_format_collection->getPropertyValue('class');
            $image_format = new $image_format_class($image_format_collection, $image);
            $image_format->loadFromData($data_element);
            $image->valid = $image_format->isValid();
        } catch (\Exception $e) {
            $image->error($e->getMessage());
            $image->valid = false;
        }
        return $image;
    }

    /**
     * Determines the image format collection of the image data.
     *
     * @param DataElement $data_element
     *            the data element that will provide the data.
     *
     * @returns Collection|false
     *   The image format collection if successful, or false if the data cannot
     *   match any format defined.
     */
    protected static function getImageFormatCollection(DataElement $data_element)
    {
        $image_collection = Collection::get('image');

        // Loop through the 'image' collection items, each of which defines an
        // image format collection, and checks if the image matches the format.
        // When a match is found, return the image format collection.
        foreach ($image_collection->listItemIds() as $image_format_collection_id) {
            $format_collection = $image_collection->getItemCollection($image_format_collection_id);
            $format_class = $format_collection->getPropertyValue('class');
            if ($format_class::isDataMatchingFormat($data_element)) {
                return $format_collection;
            }
        }
        return null;
    }

    /**
     * Constructs an Image object.
     *
     * @param \Psr\Log\LoggerInterface $external_logger
     *            (Optional) a PSR-3 compliant logger callback.
     * @param string|false $fail_level
     *            (Optional) a PSR-3 compliant log level. Any log entry at this
     *            level or above will force image parsing to stop.
     */
    public function __construct(LoggerInterface $external_logger = null, $fail_level = false)
    {
        parent::__construct(Collection::get('image'));
        $this->logger = (new Logger('imageprobe'))
          ->pushHandler(new TestHandler(Logger::INFO))
          ->pushProcessor(new PsrLogMessageProcessor());
        $this->externalLogger = $external_logger;
        $this->failLevel = $fail_level !== false ? Logger::toMonologLevel($fail_level) : false;
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
        //$formatter = new \PrettyXml\Formatter();
        //dump($formatter->format($this->DOMNode->ownerDocument->saveXML()));
        return $this->DOMNode->ownerDocument->saveXML();
    }

    /**
     * xx todo
     */
    protected function getLogger()
    {
        return $this->logger;
    }

    /**
     * Returns the log entries of the Image.
     *
     * @param string $level_name
     *            (Optional) If specified, filters only the entries of the
     *            specified severity level.
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
