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
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
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
            if ($sub_block->getId() === $this->xxGetSubBlockByIndex($type, $i)->getId()) {
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

    public function xxGetSubBlock($type, $id)
    {
        foreach ($this->xxGetSubBlocks($type) as $sub_block) {
            if ($sub_block->getId() === $id) {
                return $sub_block;
            }
        }
        return null;
    }

    public function xxGetSubBlockByName($type, $name)
    {
        foreach ($this->xxGetSubBlocks($type) as $sub_block) {
            if ($sub_block->getName() === $name) {
                return $sub_block;
            }
        }
        return null;
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
    public function xxGetSubBlockByIndex($type, $index)
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
        if ($type === null) {
            return $this->subBlocks;
        } else {
            return isset($this->subBlocks[$type]) ? $this->subBlocks[$type] : [];
        }
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

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $dump = parent::toDumpArray();

        // Dump Entry if existing.
        if ($this->getEntry()) {
            $dump['Entry'] = $this->getEntry()->toDumpArray();
        }

        // Dump sub-Blocks.
        foreach ($this->xxGetSubBlocks() as $type => $sub_blocks) {
            $dump['blocks'][$type] = [];
            foreach ($sub_blocks as $sub_block) {
                $dump['blocks'][$type][] = $sub_block->toDumpArray();
            }
        }

        return $dump;
    }
}
