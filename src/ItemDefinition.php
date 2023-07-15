<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataFormat;

/**
 * A value object defining a ListBase item.
 */
class ItemDefinition
{
    /**
     * @param CollectionInterface $collection
     *   The MediaProbe collection of this item.
     * @param int $format
     *   The format of the item.
     * @param int $valuesCount
     *   The count of values of the item.
     * @param int $dataOffset
     *   The offset of the item data in the data window.
     * @param int $itemDefinitionOffset
     *   The offset of the item definition in the data window.
     * @param int $sequence
     *   The sequence of the item on its parent list.
     */
    public function __construct(
        protected CollectionInterface $collection,
        protected int $format = DataFormat::BYTE,
        protected int $valuesCount = 1,
        protected int $dataOffset = 0,
        protected int $itemDefinitionOffset = 0,
        protected int $sequence = 0,
    )
    {
    }

    public function getCollection(): CollectionInterface
    {
        return $this->collection;
    }

    public function getFormat(): int
    {
        return $this->format;
    }

    public function getValuesCount(): int
    {
        return $this->valuesCount;
    }

    public function getDataOffset(): int
    {
        return $this->dataOffset;
    }

    public function getItemDefinitionOffset(): int
    {
        return $this->itemDefinitionOffset;
    }

    public function getSequence(): int
    {
        return $this->sequence;
    }

    /**
     * @todo
     */
    public function getSize(): int
    {
        return DataFormat::getSize($this->getFormat()) * $this->getValuesCount();
    }

    /**
     * Returns the class to manage the entry value.
     * @todo
     */
    public function getEntryClass(): string
    {
        // Return the specific entry class if defined, or fall back to
        // default class for the format.
        if (!$entry_class = $this->collection->getPropertyValue('entryClass')) {
            if (empty($this->getFormat())) {
                throw new MediaProbeException(
                    'No format can be derived for item: %s (%s)',
                    $this->collection->getPropertyValue('item') ?? 'n/a',
                    $this->collection->getPropertyValue('name') ?? 'n/a'
                );
            }

            if (!$entry_class = DataFormat::getClass($this->getFormat())) {
                throw new MediaProbeException(
                    'Unsupported format %d for item: %s (%s)',
                    $this->getFormat(),
                    $this->collection->getPropertyValue('item') ?? 'n/a',
                    $this->collection->getPropertyValue('name') ?? 'n/a'
                );
            }
        }

        return $entry_class;
    }
}
