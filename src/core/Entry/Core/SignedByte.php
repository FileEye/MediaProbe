<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataWindow;

/**
 * Class for holding signed bytes.
 *
 * This class can hold bytes, either just a single byte or an array of
 * bytes.
 */
class SignedByte extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'SignedByte';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'SignedByte';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    protected $min = -128;

    /**
     * {@inheritdoc}
     */
    protected $max = 127;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData(BlockBase $parent_block, $format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getSignedByte($data_offset + $i);
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
