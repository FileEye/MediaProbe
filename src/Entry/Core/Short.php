<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\Convert;

/**
 * Class for holding unsigned shorts.
 *
 * This class can hold shorts, either just a single short or an array
 * of shorts.
 */
class Short extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::SHORT;

    /**
     * {@inheritdoc}
     */
    protected $min = 0;

    /**
     * {@inheritdoc}
     */
    protected $max = 65535;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getShort($data_offset + ($i * 2));
        }
        return $args;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return Convert::shortToBytes($number, $order);
    }
}
