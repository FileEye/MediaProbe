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
    protected static $stringElement = '';

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $version = $data_window->getBytes($data_offset, $components);
        return is_numeric($version) ? [$version / 100] : [$version];
    }

    /**
     * {@inheritdoc}
     */
    public function setValue(array $data)
    {
        $this->valid = true;

        $version = isset($data[0]) ? $data[0] : 0.0;
        if (!is_numeric($version)) {
            ExifEye::logger()->error('Incorrect version data for ({element})', [
                'element' => static::$stringElement,
            ]);
            $version = 0;
            $this->valid = false;
        }
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
            return trim(ExifEye::fmt('%s Version %s', static::$stringElement, $this->getValue()));
        }
    }
}
