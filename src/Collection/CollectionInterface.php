<?php

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\ElementInterface;

/**
 * Interface for objects holding metadata specification information as a collection of properties.
 */
interface CollectionInterface
{
    /**
     * Returns the static properties of the collection.
     */
    public function getProperties(): array;

    /**
     * Determines if a property exists, taking overrides into account.
     */
    public function hasProperty(string $property): bool;

    /**
     * Returns the value a property, taking overrides into account.
     *
     * @return mixed
     */
    public function getPropertyValue(string $property);

    /**
     * Returns the collection items' ids.
     *
     * @return array
     */
    public function listItemIds(): array;

    /**
     * Returns the Collection object of an item.
     *
     * @param string $item
     *   The item id.
     * @param mixed $index
     *   The item id index.
     * @todo xxx
     *
     * @throws CollectionException
     *   When item is not in collection and no default given.
     */
    public function getItemCollection(string $item, $index = 0, string $default_id = null, array $default_properties = [], int $components_count = null, ElementInterface $context = null): CollectionInterface;

    /**
     * Returns the Collection object of an item given its name.
     *
     * @param string $item_name
     *   The item name.
     * @param mixed $index
     *   The item name index.
     *
     * @throws CollectionException
     *   When item is not in collection.
     */
    public function getItemCollectionByName(string $item_name, $index = 0): CollectionInterface;
}
