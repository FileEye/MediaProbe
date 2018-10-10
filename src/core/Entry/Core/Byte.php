<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataWindow;

/**
 * Class for holding unsigned bytes.
 *
 * This class can hold bytes, either just a single byte or an array of bytes.
 */
class Byte extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'Byte';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'Byte';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    protected $min = 0;

    /**
     * {@inheritdoc}
     */
    protected $max = 255;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData(BlockBase $parent_block, $format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getByte($data_offset + $i);
        }
        return $args;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return chr($number);
    }
}
