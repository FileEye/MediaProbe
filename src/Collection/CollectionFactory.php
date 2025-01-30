<?php

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Model\EntryInterface;

/**
 * Class to retrieve metadata specification information from collections.
 */
abstract class CollectionFactory
{
    protected static CollectionIndex $collectionIndex;

    /**
     * Sets the compiled MediaProbe collection mapper class.
     *
     * @param string|null $class
     *   The FQCN of the class containing the MediaProbe specification mapper. If null, the default one will be used.
     */
    public static function setCollectionIndex(?string $class): void
    {
        static::$collectionIndex = $class === null ? new CollectionIndex() : new $class();
    }

    /**
     * Gets the compiled MediaProbe collection mapper class.
     *
     * In case the map is not yet initialized, defaults to the pre-compiled one.
     */
    protected static function getCollectionIndex(): CollectionIndex
    {
        if (!isset(static::$collectionIndex)) {
            static::setCollectionIndex(null);
        }
        return static::$collectionIndex;
    }

    /**
     * Returns the ids of the defined collections.
     *
     * @return array
     *   A simple array, with the list of the collection ids.
     */
    public static function listCollections(): array
    {
        return array_keys(static::getCollectionIndex()->getPropertyValue('collections'));
    }

    /**
     * Returns the requested collection.
     *
     * @param array $overrides
     *   (Optional) If defined, overrides properties defined in the collection.
     *
     * @throws CollectionException
     *   When the collection does not exist.
     */
    public static function get(string $id, array $overrides = []): CollectionInterface
    {
        if (!isset(static::getCollectionIndex()->getPropertyValue('collections')[$id])) {
            throw new CollectionException('Missing collection \'%s\' from the index', $id);
        }
        $class = static::getCollectionIndex()->getNamespace() . '\\' . $id;
        return new $class($overrides);
    }

    /**
     * Returns a collection given its name.
     *
     * @throws CollectionException
     *   When the collection does not exist.
     */
    public static function getByName(string $collection_name): CollectionInterface
    {
        if (!isset(static::getCollectionIndex()->getPropertyValue('collectionsByName')[$collection_name])) {
            throw new CollectionException('Missing collection \'%s\' from the index', $collection_name);
        }
        return static::get(static::getCollectionIndex()->getPropertyValue('collectionsByName')[$collection_name]);
    }
}
