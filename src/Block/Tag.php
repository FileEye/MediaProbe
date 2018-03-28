<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;

/**
 * Class representing an Exif TAG.
 */
class Tag
{
    /**
     * The type of this block.
     *
     * @var string
     */
    protected $type = 'TAG';

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
     */
    public static function loadFromData(DataWindow $data_window, $offset, $nesting_level = 0)
    {
        $tag_id = $data_window->getShort($offset);
        $tag_format = $data_window->getShort($offset + 2);
        $tag_components = $data_window->getLong($offset + 4);
        $tag_value = $data_window->getLong($offset + 8);
        ExifEye::debug(
            str_repeat("  ", $nesting_level) . "ID: 0x%04X, FMT: %d, COMP: %d, VAL: %d",
            $tag_id,
            $tag_format,
            $tag_components,
            $tag_value
        );
    }

    /**
     * Returns the type of this block.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}
