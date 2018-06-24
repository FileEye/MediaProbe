<?php

namespace ExifEye\core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Utility\ConvertBytes;
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
    protected $type = 'image';

    /**
     * The MIME type of the image.
     *
     * @var string
     */
    protected $mimeType;

    protected $logger;
    protected $externalLogger;
    protected $failLevel;

    /**
     * Quality setting for encoding JPEG images.
     *
     * This controls the quality used then PHP image resources are
     * encoded into JPEG images. This happens when you create a
     * {@link Jpeg} object based on an image resource.
     *
     * The default is 75 for average quality images, but you can change
     * this to an integer between 0 and 100.
     *
     * @var int
     */
    protected $quality = 75;

    public function __construct($external_logger = null, $fail_level = false)
    {
        parent::__construct();
        $this->logger = (new Logger('exifeye'))
          ->pushHandler(new TestHandler(Logger::INFO))
          ->pushProcessor(new PsrLogMessageProcessor());
        $this->externalLogger = $external_logger;
        $this->failLevel = Logger::toMonologLevel($fail_level);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        // JPEG image?
        if ($data_window->getBytes(0, 3) === "\xFF\xD8\xFF") {
            $this->mimeType = 'image/jpeg';
            $jpeg = new Jpeg($this);
            $jpeg->loadFromData($data_window);
            return;
        }

        // TIFF image?
        $byte_order = $data_window->getBytes(0, 2);
        if ($byte_order === 'II' || $byte_order === 'MM') {
            $data_window->setByteOrder($byte_order === 'II' ? ConvertBytes::LITTLE_ENDIAN : ConvertBytes::BIG_ENDIAN);
            if ($data_window->getShort(2) === Tiff::TIFF_HEADER) {
                $this->mimeType = 'image/tiff';
                $tiff = new Tiff($this);
                $tiff->loadFromData($data_window);
                return;
            }
        }

        throw new ExifEyeException('Unrecognized image format.');
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes()
    {
        return $this->getElement('*')->toBytes();
    }

    /**
     * Set the JPEG encoding quality.
     *
     * @param int $quality
     *            an integer between 0 and 100 with 75 being
     *            average quality and 95 very good quality.
     */
    public function setJPEGQuality($quality)
    {
        $this->$quality = $quality;
    }

    /**
     * Get current setting for JPEG encoding quality.
     *
     * @return int the quality.
     */
    public function getJPEGQuality()
    {
        return $this->$quality;
    }

    public function logger()
    {
        return $this->logger;
    }

    public function externalLogger()
    {
        return $this->externalLogger;
    }

    public function getFailLevel()
    {
        return $this->failLevel;
    }

    /**
     * {@inheritdoc}
     */
    public function dumpLog()
    {
        $handler = $this->logger()->getHandlers()[0]; // xx
        $ret = [];
        foreach ($handler->getRecords() as $record) {
            $ret[$record['level_name']][] = $record;
        }
        return $ret;
    }

    public function getMimeType()
    {
        return $this->mimeType;
    }

    public static function loadFromFile($path, $external_logger = null, $fail_level = false)
    {
        $magic_file_info = new DataWindow(file_get_contents($path, false, null, 0, 10));

        $recognized_format = false;

        // JPEG image?
        if ($magic_file_info->getBytes(0, 3) === "\xFF\xD8\xFF") {
            $recognized_format = true;
        }

        // TIFF image?
        $byte_order = $magic_file_info->getBytes(0, 2);
        if ($byte_order === 'II' || $byte_order === 'MM') {
            $magic_file_info->setByteOrder($byte_order === 'II' ? ConvertBytes::LITTLE_ENDIAN : ConvertBytes::BIG_ENDIAN);
            if ($magic_file_info->getShort(2) === Tiff::TIFF_HEADER) {
                $recognized_format = true;
            }
        }

        if ($recognized_format) {
            $image = new static($external_logger, $fail_level);
            $image->loadFromData(new DataWindow(file_get_contents($path)));
            return $image;
        }

        throw new ExifEyeException('Unrecognized image format.');
    }

    public static function createFromData(DataWindow $data_window, $external_logger = null, $fail_level = false)
    {
        $image = new static($external_logger, $fail_level);
        $image->loadFromData($data_window);
        return $image;
    }

    /**
     * Save the Image object as a file.
     */
    public function saveToFile($path)
    {
        return file_put_contents($path, $this->toBytes());
    }
}
