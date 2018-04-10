<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for holding signed shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts.
 */
class SignedShort extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::SSHORT;

    /**
     * {@inheritdoc}
     */
    protected $min = -32768;

    /**
     * {@inheritdoc}
     */
    protected $max = 32767;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getSignedShort($data_offset + ($i * 2));
        }
        return $args;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromSignedShort($number, $order);
    }
}
