<?php

namespace FileEye\MediaProbe;

/**
 * A value object defining a ListBase item.
 */
class ItemDefinition
{
    /**
     * The MediaProbe collection of this item.
     *
     * @var Collection
     */
    protected $collection;

    /**
     * The format of the item.
     *
     * @var int
     */
    protected $format;

    /**
     * The count of values of the item.
     *
     * @var int
     */
    protected $valuesCount;

    /**
     * The offset of the item on the data window.
     *
     * @var int
     */
    protected $offset;

    /**
     * Constructor.
     *
     * @todo xxx
     */
    public function __construct(Collection $collection, int $format, int $values_count = 1, int $offset = 0)
    {
        $this->collection = $collection;
        $this->format = $format;
        $this->valuesCount = $values_count;
        $this->offset = $offset;
    }

    /**
     * @todo
     */
    public function getCollection(): Collection
    {
        return $this->collection;
    }

    /**
     * @todo
     */
    public function getFormat(): int
    {
        return $this->format;
    }

    /**
     * @todo
     */
    public function getValuesCount(): int
    {
        return $this->valuesCount;
    }

    /**
     * @todo
     */
    public function getDataOffset(): int
    {
        return $this->offset;
    }

    /**
     * @todo
     */
    public function getSize(): int
    {
        return ItemFormat::getSize($this->getFormat()) * $this->getValuesCount();
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
                throw new MediaProbeException('No format can be derived for item: %s (%s)',
                    $this->collection->getPropertyValue('item') ?? 'n/a',
                    $this->collection->getPropertyValue('name') ?? 'n/a'
                );
            }

            if (!$entry_class = ItemFormat::getClass($this->getFormat())) {
                throw new MediaProbeException('Unsupported format %d for item: %s (%s)',
                    $this->getFormat(),
                    $this->collection->getPropertyValue('item') ?? 'n/a',
                    $this->collection->getPropertyValue('name') ?? 'n/a'
                );
            }
        }

        return $entry_class;
    }
}
