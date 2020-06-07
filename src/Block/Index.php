<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing an index of values.
 */
class Index extends ListBase
{
    /**
     * Validates the list against the specification.
     */
    protected function validate(DataElement $data_element): void
    {
        // Warn if format is not as expected.
        $expected_format = $this->getCollection()->getPropertyValue('format');
        if ($expected_format !== null && $this->getFormat() !== null && !in_array($this->getFormat(), $expected_format)) {
            $expected_format_names = [];
            foreach ($expected_format as $expected_format_id) {
                $expected_format_names[] = ItemFormat::getName($expected_format_id);
            }
            $this->warning("Found {format_name} data format, expected {expected_format_names}", [
                'format_name' => ItemFormat::getName($this->getFormat()),
                'expected_format_names' => implode(', ', $expected_format_names),
            ]);
        }

        // If the 'hasIndexSize' property is true, the index begins with an
        // entry representing the entire size of the index (included the entry
        // itself). This should match the size determined in the parent IFD.
        if ($this->getCollection()->getPropertyValue('hasIndexSize')) {
            $offset = 0;
            $index_size = $this->getValueFromData($data_element, $offset, $this->getCollection()->getPropertyValue('format')[0])[0];
            if ($index_size !== $this->getDefinition()->getSize()) {
                $this->warning("Size mismatch between IFD and index header");
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function parseData(DataElement $data_element): void
    {
        $this->debugBlockInfo($data_element);

        $this->validate($data_element);

        // Loops through the index and loads the tags. If the 'hasIndexSize'
        // property is true, the first entry is a special case that is handled
        // by opening a 'rawData' node instead of a 'tag'.
        $offset = 0;
        $index_components = $this->getDefinition()->getValuesCount();
        for ($i = 0; $i < $index_components; $i++) {
            $item_definition = $this->getItemDefinitionFromData($i, $i, $data_element, $offset);

            // Check if this tag should be skipped.
            if ($item_definition->getCollection()->getPropertyValue('skip')) {
                $this->debug("Skipped");
                continue;
            };

            $index_components -= ($item_definition->getValuesCount() - 1);

            // Adds the 'tag'.
            $this
                ->addItemWithDefinition($item_definition)
                ->parseData(new DataWindow($data_element, $item_definition->getDataOffset(), $item_definition->getSize()));

            $offset += $item_definition->getSize();
        }

        $this->valid = true;

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);
    }

    /**
     * Gets the ItemDefinition object of an index item, from the data.
     *
     * @param int $seq
     *            The sequence (0-index) of the item in the index.
     * @param mixed $id
     *            The id of the item in the index.
     * @param DataElement $data_element
     *            the data element that will provide the data.
     * @param int $offset
     *            the offset within the data element where the count can be
     *            found.
     *
     * @return \FileEye\MediaProbe\ItemDefinition
     *            the ItemDefinition object of the IFD item.
     */
    protected function getItemDefinitionFromData(int $seq, $id, DataElement $data_element, int $offset): ItemDefinition
    {
        // In case the item is not found in the collection for the index,
        // we still load it as a 'tag'.
        $item_collection = $this->getCollection()->getItemCollection($id, 'UnknownTag', [
            'item' => $id,
            'DOMNode' => 'tag',
        ]);
        $item_format = $item_collection->getPropertyValue('format')[0] ?? $this->getFormat();
        $item_components = $item_collection->getPropertyValue('components') ?? 1;
        return new ItemDefinition($item_collection, $item_format, $item_components, $offset, 0, $seq);
    }

    protected function getValueFromData(DataElement $data_element, int &$offset, int $format, int $count = 1): array
    {
        if ($format === ItemFormat::ASCII) {
            $value = $data_element->getBytes($offset, $count);
            $offset += $count;
            return [$value];
        }
        $value = [];
        for ($h = 0; $h < $count; $h++) {
            switch ($format) {
                case ItemFormat::BYTE:
                case ItemFormat::UNDEFINED:
                    $value[] = $data_element->getByte($offset);
                    $offset++;
                    break;
                case ItemFormat::SHORT:
                    $value[] = $data_element->getShort($offset);
                    $offset += 2;
                    break;
                case ItemFormat::SHORT_REV:
                    $value[] = $data_element->getShortRev($offset);
                    $offset += 2;
                    break;
                case ItemFormat::SIGNED_SHORT:
                    $value[] = $data_element->getSignedShort($offset);
                    $offset += 2;
                    break;
                case ItemFormat::LONG:
                    $value[] = $data_element->getLong($offset);
                    $offset += 4;
                    break;
                case ItemFormat::SIGNED_LONG:
                    $value[] = $data_element->getSignedLong($offset);
                    $offset += 4;
                    break;
                case ItemFormat::RATIONAL:
                    $value[] = $data_element->getRational($offset);
                    $offset += 8;
                    break;
                case ItemFormat::SIGNED_RATIONAL:
                    $value[] = $data_element->getSignedRational($offset);
                    $offset += 8;
                    break;
                default:
                    $this->error("Unsupported format.");
            }
        }
        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $data_bytes = '';

        // Get the tags to be written. The index size, if present, is stored in
        // a rawData node.
        foreach ($this->getMultipleElements('tag') as $tag => $sub_block) {
            $data_bytes .= $sub_block->toBytes($byte_order);
        }

        $actual_size = strlen($data_bytes);

        if ($expected_size = $this->getCollection()->getPropertyValue('hasIndexSize')) {
            // When writing back, the index size itself is a short, part of the
            // actual size, so we add 2 to the written value.
            return ConvertBytes::fromShort($actual_size + 2, $byte_order) . $data_bytes;
        }
        else {
            return $data_bytes;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        $components = 0;
        foreach ($this->getMultipleElements('tag') as $sub) {
            $sub_size = ItemFormat::getSize($sub->getFormat()) * $sub->getComponents();
            // Components are in Shorts, $sub_size is in Bytes, so normalize.
            $components += $sub_size / 2;
        }
        if ($this->getCollection()->getPropertyValue('hasIndexSize')) {
            $components++;
        }
        return $components;
    }

    /**
     * {@inheritdoc}
     */
    public function debugBlockInfo(?DataElement $data_element = null, int $items_count = 0)
    {
        $msg = '#{seq} {node}:{name}';
        $seq = $this->getDefinition()->getSequence() + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $seq = $parent_name . '.' . $seq;
        }
        $node = $this->DOMNode->nodeName;
        $name = $this->getAttribute('name');
        $item = $this->getAttribute('id');
        if ($item ==! null) {
            $msg .= ' ({item})';
        }
        if (is_numeric($item)) {
            $item = $item . '/0x' . strtoupper(dechex($item));
        }
        if ($data_element instanceof DataWindow) {
            $msg .= ' @{offset}, {tags} entries, f {format}, s {size}';
            $offset = $data_element->getAbsoluteOffset() . '/0x' . strtoupper(dechex($data_element->getAbsoluteOffset()));
        } else {
            $msg .= ' {tags} entries, format ?xxx, size {size}';
        }
        $this->debug($msg, [
            'seq' => $seq,
            'node' => $node,
            'name' => $name,
            'item' => $item,
            'offset' => $offset ?? null,
            'tags' => $this->getDefinition()->getValuesCount(),
            'format' => ItemFormat::getName($this->getDefinition()->getFormat()),
            'size' => $this->getDefinition()->getSize(),
        ]);
    }

}
