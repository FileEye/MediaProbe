<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing an Exif TAG as an MediaProbe block.
 */
class Tag extends BlockBase
{
    /**
     * Constructs a Tag block object.
     */
    public function __construct(ItemDefinition $definition, BlockBase $parent = null, ElementInterface $reference = null)
    {
        parent::__construct($definition, $parent, $reference);
        $this->validate();
    }

    /**
     * Validates against the specification, if defined.
     */
    public function validate()
    {
        // Check if MediaProbe has a definition for this tag.
        if (in_array($this->getCollection()->getId(), ['VoidCollection', 'UnknownTag'])) {
            $this->notice("Unknown item {item} in '{parent}'", [
                'item' => MediaProbe::dumpIntHex($this->getAttribute('id')),
                'parent' => $this->getParentElement()->getCollection()->getPropertyValue('name') ?? 'n/a',
            ]);
            return;
        }

        // Warn if format is not as expected.
        $expected_format = $this->getCollection()->getPropertyValue('format');
        if ($expected_format !== null && $this->getFormat() !== null && !in_array($this->getFormat(), $expected_format)) {
            $expected_format_names = [];
            foreach ($expected_format as $expected_format_id) {
                $expected_format_names[] = DataFormat::getName($expected_format_id);
            }
            $this->warning("Found {format_name} data format, expected {expected_format_names} for item '{item}' in '{parent}'", [
                'format_name' => DataFormat::getName($this->getFormat()),
                'expected_format_names' => implode(', ', $expected_format_names),
                'item' => $this->getAttribute('name') ?? 'n/a',
                'parent' => $this->getParentElement()->getCollection()->getPropertyValue('name') ?? 'n/a',
            ]);
        }

        // Warn if components are not as expected.
        $expected_components = $this->getCollection()->getPropertyValue('components');
        if ($expected_components !== null && $this->getComponents() !== null && $this->getComponents() !== $expected_components) {
            $this->warning("Found {components} data components, expected {expected_components} for item '{item}' in '{parent}'", [
                'components' => $this->getComponents(),
                'expected_components' => $expected_components,
                'item' => $this->getAttribute('name') ?? 'n/a',
                'parent' => $this->getParentElement() ? $this->getParentElement()->getCollection()->getPropertyValue('name') ?? 'n/a' : 'n/a',
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function doParseData(DataElement $data): void
    {
        try {
            $class = $this->getDefinition()->getEntryClass();
            $entry = new $class($this, $data);
            $this->valid = $entry->isValid();
        } catch (DataException $e) {
            $this->error($e->getMessage());
            $this->valid = false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->getElement("entry") ? $this->getElement("entry")->getValue($options) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getElement("entry") ? $this->getElement("entry")->toString($options) : '';
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        return $this->getElement("entry") ? $this->getElement("entry")->toBytes($order, $offset) : '';
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->getElement("entry") ? $this->getElement("entry")->getFormat() : $this->getDefinition()->getFormat();
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return $this->getElement("entry") ? $this->getElement("entry")->getComponents() : $this->getDefinition()->getValuesCount();
    }

    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern()
    {
        if ($this->getAttribute('name') !== '') {
            return '/{DOMNode}:{name}:{id}';
        }
        return '/{DOMNode}:{id}';
    }

    /**
     * {@inheritdoc}
     */
    public function debugBlockInfo(?DataElement $data_element = null)
    {
        $msg = '#{seq} @{ifdoffset} {node}';
        $seq = $this->getDefinition()->getSequence() + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $seq = $parent_name . '.' . $seq;
        }
        $item_definition_offset = $this->getDefinition()->getItemDefinitionOffset();
        $node = $this->DOMNode->nodeName;
        $name = $this->getAttribute('name');
        if ($name ==! null) {
            $msg .= ':{name}';
        }
        $item = $this->getAttribute('id');
        if ($item ==! null) {
            $msg .= ' ({item})';
        }
        $item = MediaProbe::dumpIntHex($item);
        if ($data_element instanceof DataWindow) {
            $msg .= ' @{offset} s {size}';
            $offset = MediaProbe::dumpIntHex($data_element->getAbsoluteOffset());
        } else {
            $msg .= ' size {size} byte(s)';
        }
        $msg .= ', f {format}, c {components}';
        $this->debug($msg, [
            'seq' => $seq,
            'ifdoffset' => MediaProbe::dumpIntHex($item_definition_offset),
            'format' => DataFormat::getName($this->getDefinition()->getFormat()),
            'components' => $this->getDefinition()->getValuesCount(),
            'node' => $node,
            'name' => $name,
            'item' => $item,
//            'title' => $title,
            'offset' => $offset ?? null,
            'size' => $data_element ? $data_element->getSize() : null,
        ]);
    }
}
