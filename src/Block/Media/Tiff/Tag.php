<?php

namespace FileEye\MediaProbe\Block\Media\Tiff;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Media\Tiff\IfdEntryValueObject;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Model\BlockInterface;
use FileEye\MediaProbe\Model\LeafBlockBase;
use FileEye\MediaProbe\Model\RootBlockBase;
use FileEye\MediaProbe\Utility\HexDump;

/**
 * Class representing an Exif TAG as a MediaProbe block.
 */
class Tag extends LeafBlockBase
{
    public function __construct(
        public readonly IfdEntryValueObject $ifdEntry,
        ListBase|RootBlockBase $parent,
    ) {
        parent::__construct(
            definition: new ItemDefinition(
                collection: $ifdEntry->collection,
                format: $ifdEntry->dataFormat,
                valuesCount: $ifdEntry->countOfComponents,
                dataOffset: $ifdEntry->isOffset ? $ifdEntry->dataOffset() : $ifdEntry->dataValue(),
                sequence: $ifdEntry->sequence,
            ),
            parent: $parent,
            graft: false,
        );
    }

    /**
     * Validates against the specification, if defined.
     */
    public function validate(): void
    {
        $parentElement = $this->getParentElement();
        assert($parentElement instanceof BlockInterface);

        // Check if MediaProbe has a definition for this tag.
        if (in_array($this->getCollection()->getPropertyValue('id'), ['VoidCollection', 'Media\\Tiff\\UnknownTag'])) {
            $this->info("Unknown tag {item} in '{parent}'", [
                'item' => HexDump::dumpIntHex($this->getAttribute('id')),
                'parent' => $parentElement->getCollection()->getPropertyValue('name') ?? 'n/a',
            ]);
            return;
        }

        // Notice if format is not as expected.
        $expected_format = $this->getCollection()->getPropertyValue('format');
        if ($expected_format !== null && $this->getFormat() !== null && !in_array($this->getFormat(), $expected_format)) {
            $expected_format_names = [];
            foreach ($expected_format as $expected_format_id) {
                $expected_format_names[] = DataFormat::getName($expected_format_id);
            }
            $this->notice("Found {format_name} data format, expected {expected_format_names} for tag '{item}' in '{parent}'", [
                'format_name' => DataFormat::getName($this->getFormat()),
                'expected_format_names' => implode(', ', $expected_format_names),
                'item' => $this->getAttribute('name') ?? 'n/a',
                'parent' => $parentElement->getCollection()->getPropertyValue('name') ?? 'n/a',
            ]);
        }

        // Notice if components are not as expected.
        $expected_components = $this->getCollection()->getPropertyValue('components');
        if ($expected_components !== null && $this->getComponents() !== null && $this->getComponents() !== $expected_components) {
            $this->notice("Found {components} data components, expected {expected_components} for tag '{item}' in '{parent}'", [
                'components' => $this->getComponents(),
                'expected_components' => $expected_components,
                'item' => $this->getAttribute('name') ?? 'n/a',
                'parent' => $parentElement ? $parentElement->getCollection()->getPropertyValue('name') ?? 'n/a' : 'n/a',
            ]);
        }
    }

    public function fromDataElement(DataElement $dataElement): Tag
    {
        $this->validate();
        $this->debugInfo(['dataElement' => $dataElement]);
        try {
            $class = $this->getEntryClass();
            $entry = new $class($this, $dataElement);
        } catch (DataException $e) {
            $this->error($e->getMessage());
        }
        return $this;
    }

    public function getEntryClass(): string
    {
        // Return the specific entry class if defined, or fall back to
        // default class for the format.
        if (!$entry_class = $this->ifdEntry->collection->getPropertyValue('entryClass')) {
            if (empty($this->ifdEntry->dataFormat)) {
                throw new MediaProbeException(
                    'No format can be derived for TAG: %s (%s)',
                    $this->ifdEntry->collection->getPropertyValue('item') ?? 'n/a',
                    $this->ifdEntry->collection->getPropertyValue('name') ?? 'n/a'
                );
            }

            if (!$entry_class = DataFormat::getClass($this->ifdEntry->dataFormat)) {
                throw new MediaProbeException(
                    'Unsupported format %d for TAG: %s (%s)',
                    $this->ifdEntry->dataFormat,
                    $this->ifdEntry->collection->getPropertyValue('item') ?? 'n/a',
                    $this->ifdEntry->collection->getPropertyValue('name') ?? 'n/a'
                );
            }
        }
        return $entry_class;
    }

    public function parseData(DataElement $dataElement, int $start = 0, ?int $size = null): void
    {
        throw new \LogicException('removing');
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
