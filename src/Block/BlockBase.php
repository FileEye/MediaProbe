<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;

/**
 * Class representing an Exif TAG.
 */
abstract class BlockBase
{
    /**
     * The type of this block.
     *
     * @var string
     */
    protected $type;

    /**
     * Returns the type of this block.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Loads data into a block.
     *
     * @param DataWindow $data_window
     *            the data window that will provide the data.
     * @param int $offset
     *            the offset within the window where the directory will
     *            be found.
     * @param int $nesting_level
     *            (Optional) the level of nesting of this block in the overall
     *            structure.
     *
     * @returns BlockBase
     */
    abstract public static function loadFromData(DataWindow $data_window, $offset, $nesting_level = 0);
}
