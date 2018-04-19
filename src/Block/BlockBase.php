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
    protected $hasSpecification;

    /**
     * The child blocks.
     *
     * @var BlockBase[]
     */
    protected $subBlocks = [];

    /**
     * The block's associated entry.
     *
     * @var EntryInterface
     */
    protected $entry;

    public function hasSpecification()
    {
        return $this->hasSpecification;
    }

    /**
     * Loads data into a block.
     *
     * @param BlockBase $parent
     *            the parent Block.
     * @param DataWindow $data_window
     *            the data window that will provide the data.
     * @param int $offset
     *            the offset within the window where the directory will
     *            be found.
     * @param array $options
     *            (Optional) an array with additional options for the load.
     *
     * @returns BlockBase
     */
    public static function loadFromData(BlockBase $parent, DataWindow $data_window, $offset, $options = [])
    {
        // @todo
    }

    /**
     * Adds a sub-block.
     *
     * @param BlockBase $sub_block
     *            the sub-block that will be added.
     */
    public function xxAddSubBlock(BlockBase $sub_block)
    {
        $type = $sub_block->getType();
        for ($i = 0; $i < count($this->xxGetSubBlocks($type)); $i++) {
            if ($sub_block->getId() === $this->xxGetSubBlock($type, $i)->getId()) {
                $this->subBlocks[$type][$i] = $sub_block;
                return $this;
            }
        }
        return $this->xxAppendSubBlock($sub_block);
    }

    /**
     * Appends a sub-block.
     *
     * @param BlockBase $sub_block
     *            the sub-block that will be appended.
     */
    public function xxAppendSubBlock(BlockBase $sub_block)
    {
        $this->subBlocks[$sub_block->getType()][] = $sub_block;
        return $this;
    }

    /**
     * Retrieves a sub-block.
     *
     * @param int $index
     *            the index identifying the sub-block.
     *
     * @return BlockBase the sub-block associated with the index, or null if no
     *         such block exists.
     */
    public function xxGetSubBlock($type, $index)
    {
        return isset($this->subBlocks[$type][$index]) ? $this->subBlocks[$type][$index] : null;
    }

    /**
     * Returns all sub-blocks.
     *
     * @return BlockBase[]
     */
    public function xxGetSubBlocks($type = null)
    {
        return $type !== null ? $this->subBlocks[$type] : $this->subBlocks;
    }

    /**
     * Sets the block's associated entry.
     *
     * @param EntryInterface $entry
     *
     * @return $this
     */
    public function setEntry(EntryInterface $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Gets the block's associated entry.
     *
     * @return EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }
}
