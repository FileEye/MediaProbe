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
     * The type of this block.
     *
     * @var string
     */
    protected $type;

    /**
     * The ID of this block.
     *
     * @var int
     */
    protected $id;

    /**
     * The name of this block.
     *
     * @var string
     */
    protected $name;

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

    /**
     * Returns the type of this block.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

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
     *            the offset within the window where the directory will
     *            be found.
     * @param array $options
     *            (Optional) an array with additional options for the load.
     *
     * @returns BlockBase
     */
    public static function loadFromData(DataWindow $data_window, $offset, $options = [])
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
        for ($i = 0; $i < count($this->xxGetSubBlocks()); $i++) {
            if ($sub_block->getId() === $this->xxGetSubBlock($i)->getId()) {
                $this->subBlocks[$i] = $sub_block;
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
        $this->subBlocks[] = $sub_block;
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
    public function xxGetSubBlock($index)
    {
        return isset($this->subBlocks[$index]) ? $this->subBlocks[$index] : null;
    }

    /**
     * Returns all sub-blocks.
     *
     * @return BlockBase[]
     */
    public function xxGetSubBlocks()
    {
        return $this->subBlocks;
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
