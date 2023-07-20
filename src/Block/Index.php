<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
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
                $expected_format_names[] = DataFormat::getName($expected_format_id);
            }
            $this->warning("Found {format_name} data format, expected {expected_format_names}", [
                'format_name' => DataFormat::getName($this->getFormat()),
                'expected_format_names' => implode(', ', $expected_format_names),
            ]);
        }

        // If the 'hasIndexSize' property is true, the index begins with an
        // entry representing the entire size of the index (included the entry
        // itself). This should match the size determined in the parent IFD.
        if ($this->getCollection()->getPropertyValue('hasIndexSize')) {
            $offset = 0;
            $index_size = $this->getValueFromData($data_element, $offset, $this->getCollection()->getPropertyValue('format')[0]);
            if ($index_size !== $this->getDefinition()->getSize()) {
                $this->error("Size mismatch between IFD and index header");
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        $this->validate($data);

        // Loop through the index and parse the tags. If the 'hasIndexSize'
        // property is true, the first entry is a special case that is handled
        // by opening a 'rawData' node instead of a 'tag'.
        $offset = 0;
        $index_components = $this->getDefinition()->getValuesCount();
        assert($this->debugInfo(['dataElement' => $data, 'itemsCount' => $index_components]));

        for ($i = 0; $i < $index_components; $i++) {
            $item_definition = $this->getItemDefinitionFromData($i, $i, $data, $offset);

            // Check if this tag should be skipped.
            if ($item_definition->getCollection()->getPropertyValue('skip')) {
                $this->debug("Skipped");
                continue;
            };

            $index_components -= ($item_definition->getValuesCount() - 1);

            // Adds the 'tag'.
            $this->addBlock($item_definition)->parseData($data, $item_definition->getDataOffset(), $item_definition->getSize());

            $offset += $item_definition->getSize();
        }
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
        $item_collection = $this->getCollection()->getItemCollection($id, 0, 'UnknownTag', [
            'item' => $id,
            'DOMNode' => 'tag',
        ]);
        $item_format = $item_collection->getPropertyValue('format')[0] ?? $this->getFormat();
        $item_components = $item_collection->getPropertyValue('components') ?? 1;
        return new ItemDefinition($item_collection, $item_format, $item_components, $offset, 0, $seq);
    }

    /**
     * @todo xxx
     */
    protected function getValueFromData(DataElement $data_element, int &$offset, int $format, int $count = 1): mixed
    {
        $dataWindow = $this->getDataWindowFromData($data_element, $offset, $format, $count);
        switch ($format) {
            case DataFormat::BYTE:
                return $dataWindow->getByte();
            case DataFormat::SHORT:
                return $dataWindow->getShort();
            case DataFormat::SHORT_REV:
                return $dataWindow->getShortRev();
            case DataFormat::SIGNED_SHORT:
                return $dataWindow->getSignedShort();
            case DataFormat::LONG:
                return $dataWindow->getLong();
            case DataFormat::SIGNED_LONG:
                return $dataWindow->getSignedLong();
            case DataFormat::RATIONAL:
                return $dataWindow->getRational();
            case DataFormat::SIGNED_RATIONAL:
                return $dataWindow->getSignedRational();
            default:
                $this->error("Unsupported format.");
        }
    }

    /**
     * @todo xxx
     */
    protected function getDataWindowFromData(DataElement $data_element, int &$offset, int $format, int $count = 1): DataWindow
    {
        switch ($format) {
            case DataFormat::ASCII:
            case DataFormat::BYTE:
            case DataFormat::UNDEFINED:
                $size = 1;
                break;
            case DataFormat::SHORT:
            case DataFormat::SHORT_REV:
            case DataFormat::SIGNED_SHORT:
                $size = 2;
                break;
            case DataFormat::LONG:
            case DataFormat::SIGNED_LONG:
                $size = 4;
                break;
            case DataFormat::RATIONAL:
            case DataFormat::SIGNED_RATIONAL:
                $size = 8;
                break;
            default:
                $this->error("Unsupported format.");
        }
        $value = new DataWindow($data_element, $offset, $count * $size);
        $offset += ($count * $size);
        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
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
        } else {
            return $data_bytes;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents(): int
    {
        $components = 0;
        foreach ($this->getMultipleElements('tag') as $sub) {
            $sub_size = DataFormat::getSize($sub->getFormat()) * $sub->getComponents();
            // Components are in Shorts, $sub_size is in Bytes, so normalize.
            $components += $sub_size / 2;
        }
        if ($this->getCollection()->getPropertyValue('hasIndexSize')) {
            $components++;
        }
        return $components;
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];

        $parentInfo = parent::collectInfo($context);

        $msg = '#{seq} {node}:{name}';

        $info['seq'] = $this->getDefinition()->getSequence() + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $info['seq'] = $parent_name . '.' . $info['seq'];
        }

        if (isset($parentInfo['item'])) {
            $msg .= ' ({item})';
            $info['item'] = is_numeric($item) ?$info['item'] . '/0x' . strtoupper(dechex($info['item'])) : $info['item'];
        }

        if (isset($parentInfo['size'])) {
            $msg .= isset($parentInfo['offset']) ? ' @{offset}, {tags} entries, f {format}, s {size}' : ' {tags} entries, format ?xxx, size {size}';
        }

        $info['tags'] = $context['itemsCount'] ?? 'n/a';
        $info['format'] = DataFormat::getName($this->getDefinition()->getFormat());
        $info['_msg'] = $msg;

        return array_merge($parentInfo, $info);
    }
}
