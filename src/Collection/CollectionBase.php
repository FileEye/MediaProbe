<?php

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Model\ElementInterface;

/**
 * Class holding metadata specification information as a collection of properties.
 */
abstract class CollectionBase implements CollectionInterface
{
    /**
     * The collection map.
     */
    protected static $map;

    /**
     * The overridden properties with their overriden values.
     */
    protected array $overrides;

    /**
     * Constructs a Collection object.
     *
     * @param array $overrides
     *   (Optional) If defined, overrides properties defined in the collection.
     */
    public function __construct(array $overrides = [])
    {
        $this->overrides = $overrides;
    }

    public function getProperties(): array
    {
        return static::$map;
    }

    public function hasProperty(string $property): bool
    {
        if (array_key_exists($property, $this->overrides)) {
            return true;
        }
        return array_key_exists($property, $this->getProperties());
    }

    public function getPropertyValue(string $property): mixed
    {
        if (array_key_exists($property, $this->overrides)) {
            return $this->overrides[$property];
        }
        return $this->getProperties()[$property] ?? null;
    }

    public function listItemIds(): array
    {
        return array_keys($this->getPropertyValue('items') ?? []);
    }

    /**
     * Returns the collection index of an item, resolved in relation to the context.
     *
     * @param string $item_id
     *   The item id.
     * @param int|null $components_count
     *   The number of components for the item.
     * @param ElementInterface $context
     *   An element that can be used to provide context.
     *
     * @return mixed
     *   The item collection index.
     */
    private function getItemCollectionIndex(string $item_id, ?int $components_count, ElementInterface $context): mixed
    {
        $entry_class = $this->getPropertyValue('items')[$item_id][0]['entryClass'] ?? null;
        return $entry_class ? $entry_class::resolveItemCollectionIndex($components_count, $context) : 0;
    }

    public function getItemCollection(
        string $item, $index = 0,
        ?string $default_id = null,
        array $default_properties = [],
        ?int $components_count = null,
        ?ElementInterface $context = null,
    ): CollectionInterface
    {
        if ($index === null) {
            if ($context === null) {
                $index = 0;
            } else {
                $index = $this->getItemCollectionIndex($item, $components_count, $context);
            }
        }

        if (!isset($this->getPropertyValue('items')[$item][$index]['collection'])) {
            if (isset($default_id)) {
                return CollectionFactory::get($default_id, $default_properties);
            }
            throw new CollectionException('Missing collection for item \'%s\' in \'%s\'', $item, $this->getPropertyValue('id'));
        }
        $item_properties = $this->getPropertyValue('items')[$item][$index];
        unset($item_properties['collection']);
        $item_properties['item'] = $item;
        return CollectionFactory::get($this->getPropertyValue('items')[$item][$index]['collection'], $item_properties);
    }

    public function getItemCollectionByName(string $item_name, mixed $index = 0): CollectionInterface
    {
        if (!isset($this->getPropertyValue('itemsByName')[$item_name][$index])) {
            throw new CollectionException('Missing collection for item \'%s\' in \'%s\'', $item_name, $this->getPropertyValue('id'));
        }
        return $this->getItemCollection($this->getPropertyValue('itemsByName')[$item_name][$index]);
    }
}
