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
    abstract public static function loadFromData(DataWindow $data_window, $offset, $options = []);

    /**
     * Adds a sub-block.
     *
     * @param BlockBase $sub_block
     *            the sub-block that will be added.
     */
    public function addSubBlock(BlockBase $sub_block)
    {
        $this->subBlocks[] = $sub_block;
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
    public function getSubBlock($index)
    {
        return isset($this->subBlocks[$index]) ? $this->subBlocks[$index] : null;
    }

    /**
     * Returns all sub-blocks.
     *
     * @return BlockBase[]
     */
    public function getSubBlocks()
    {
        return $this->subBlocks;
    }
}
