<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Entry\Exception\EntryException;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class to hold version information.
 */
class VersionBase extends Undefined
{
    /**
     * The string element part of the long text description.
     *
     * @var string
     */
    protected $stringElement = '';

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $version = $data_window->getBytes($data_offset, $components);
        if (!is_numeric($version)) {
            ExifEye::maybeThrow(new EntryException('Incorrect version data for (%s)', static::$stringElement));
            $version = 0;
        }
        return [$version / 100];
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $version = isset($data[0]) ? $data[0] : 0.0;
        $major = floor($version);
        $minor = ($version - $major) * 100;
        $bytes = sprintf('%02.0f%02.0f', $major, $minor);

        $this->value = (string) ($version . ($minor === 0.0 ? '.0' : ''));
        $this->components = strlen($bytes);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        $major = floor($this->getValue());
        $minor = ($this->getValue() - $major) * 100;
        return sprintf('%02.0f%02.0f', $major, $minor);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $short = isset($options['short']) ? $options['short'] : false;
        if ($short) {
            return $this->getValue();
        } else {
            return ExifEye::fmt('%s Version %s', $this->stringElement, $this->getValue());
        }
    }
}
