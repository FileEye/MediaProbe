<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for holding signed longs.
 *
 * This class can hold longs, either just a single long or an array of
 * longs.
 */
class SignedLong extends NumberBase
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'SignedLong';

    /**
     * {@inheritdoc}
     */
    protected $formatName = 'SignedLong';

    /**
     * {@inheritdoc}
     */
    protected $format;

    /**
     * {@inheritdoc}
     */
    protected $min = -2147483648;

    /**
     * {@inheritdoc}
     */
    protected $max = 2147483647;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData(BlockBase $parent_block, $format, $components, DataWindow $data_window, $data_offset)
    {
        $args = [];
        for ($i = 0; $i < $components; $i ++) {
            $args[] = $data_window->getSignedLong($data_offset + ($i * 4));
        }
        return $args;
    }

    /**
     * {@inheritdoc}
     */
    public function numberToBytes($number, $order)
    {
        return ConvertBytes::fromSignedLong($number, $order);
    }
}
