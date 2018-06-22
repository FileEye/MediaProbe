<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ElementBase;
use ExifEye\core\Entry\Core\EntryInterface;

/**
 * Class representing an Exif TAG.
 */
abstract class BlockBase extends ElementBase
{
    /**
     * The block has a specification description.
     *
     * @var string
     */
    protected $hasSpecification = false;

    public function hasSpecification()
    {
        return $this->hasSpecification;
    }

    /**
     * Loads data into a block.
     *
     * @param DataWindow $data_window
     *            the data window that will provide the data.
     * @param int $offset
     *            (Optional) the offset within the window where the block will
     *            be found.
     * @param array $options
     *            (Optional) an array with additional options for the load.
     *
     * @returns BlockBase
     */
    abstract public function loadFromData(DataWindow $data_window, $offset = 0, array $options = []);

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $dump = array_merge(parent::toDumpArray(), $this->getAttributes());

        // Dump sub-Blocks.
        foreach ($this->query("*") as $sub_element) {
            $dump['elements'][$sub_element->getType()][] = $sub_element->toDumpArray();
        }

        return $dump;
    }
}
