<?php

namespace FileEye\MediaProbe\Block\Tiff;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Model\BlockInterface;
use FileEye\MediaProbe\Model\EntryInterface;
use FileEye\MediaProbe\Utility\ConvertBytes;
use FileEye\MediaProbe\Utility\HexDump;

/**
 * Class representing an Exif TAG as a MediaProbe block.
 */
class Tag extends BlockBase
{
    /**
     * Validates against the specification, if defined.
     */
    public function validate(): void
    {
        $parentElement = $this->getParentElement();
        assert($parentElement instanceof BlockInterface);

        // Check if MediaProbe has a definition for this tag.
        if (in_array($this->getCollection()->getPropertyValue('id'), ['VoidCollection', 'Tiff\UnknownTag'])) {
            $this->notice("Unknown item {item} in '{parent}'", [
                'item' => HexDump::dumpIntHex($this->getAttribute('id')),
                'parent' => $parentElement->getCollection()->getPropertyValue('name') ?? 'n/a',
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
                'parent' => $parentElement->getCollection()->getPropertyValue('name') ?? 'n/a',
            ]);
        }

        // Warn if components are not as expected.
        $expected_components = $this->getCollection()->getPropertyValue('components');
        if ($expected_components !== null && $this->getComponents() !== null && $this->getComponents() !== $expected_components) {
            $this->warning("Found {components} data components, expected {expected_components} for item '{item}' in '{parent}'", [
                'components' => $this->getComponents(),
                'expected_components' => $expected_components,
                'item' => $this->getAttribute('name') ?? 'n/a',
                'parent' => $parentElement ? $parentElement->getCollection()->getPropertyValue('name') ?? 'n/a' : 'n/a',
            ]);
        }
    }

    protected function doParseData(DataElement $data): void
    {
        $this->validate();
        assert($this->debugInfo(['dataElement' => $data]));
        try {
            $class = $this->getDefinition()->getEntryClass();
            $entry = new $class($this, $data);
            $this->level = $entry->level();
        } catch (DataException $e) {
            $this->error($e->getMessage());
        }
    }

    public function getValue(array $options = []): mixed
    {
        return $this->getElement("entry") ? $this->getElement("entry")->getValue($options) : null;
    }

    public function toString(array $options = []): string
    {
        return $this->getElement("entry") ? $this->getElement("entry")->toString($options) : '';
    }

    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        return $this->getElement("entry") ? $this->getElement("entry")->toBytes($order, $offset) : '';
    }

    public function getFormat(): int
    {
        $entry = $this->getElement("entry");
        if (!$entry) {
            return $this->getDefinition()->format;
        }
        assert($entry instanceof EntryInterface, get_class($entry));
        return $entry->getFormat();
    }

    public function getComponents(): int
    {
        $entry = $this->getElement("entry");
        if (!$entry) {
            return $this->getDefinition()->valuesCount;
        }
        assert($entry instanceof EntryInterface, get_class($entry));
        return $entry->getComponents();
    }

    protected function getContextPathSegmentPattern(): string
    {
        if ($this->getAttribute('name') !== '') {
            return '/{DOMNode}:{name}:{id}';
        }
        return '/{DOMNode}:{id}';
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];

        $parentInfo = parent::collectInfo($context);

        $msg = '#{seq} rel@{relativeOffset} {node}';

        $info['seq'] = $this->getDefinition()->sequence + 1;
        if ($this->getParentElement() && ($parent_name = $this->getParentElement()->getAttribute('name'))) {
            $info['seq'] = $parent_name . '.' . $info['seq'];
        }

        $info['relativeOffset'] = HexDump::dumpIntHex($this->getDefinition()->itemDefinitionOffset);

        $msg .= isset($parentInfo['name']) ? ':{name}' : '';

        if (isset($parentInfo['item'])) {
            $msg .= ' ({item})';
            $info['item'] = HexDump::dumpIntHex($parentInfo['item']);
        }

        if (isset($parentInfo['size'])) {
            $msg .= isset($parentInfo['offset']) ? ' @{offset} size {size}' : ' size {size} byte(s)';
        }

        $info['format'] = DataFormat::getName($this->getDefinition()->format);
        $info['components'] = $this->getDefinition()->valuesCount;
        $msg .= ' format {format} count {components}';

        $info['_msg'] = $msg;

        return array_merge($parentInfo, $info);
    }
}
