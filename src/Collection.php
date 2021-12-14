<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;

/**
 * Class to retrieve IFD and TAG information from YAML specs.
 */
abstract class Collection
{
    /**
     * Default namespace for concrete Collection classes.
     */
    const DEFAULT_COLLECTION_NAMESPACE = 'FileEye\\MediaProbe\\Collection';

    /**
     * The collection mapper class.
     *
     * @var string
     */
    protected static $mapperClass;

    /**
     * The collection id.
     *
     * @var string
     */
    protected $id;

    /**
     * The overridden properties with their values.
     *
     * @var array
     */
    protected $overrides;

    /**
     * Returns the compiled MediaProbe specification map.
     *
     * In case the map is not yet initialized, defaults to the pre-compiled
     * one.
     *
     * @return array
     *   The MediaProbe specification map.
     */
    protected static function getMap()
    {
        if (!isset(static::$mapperClass)) {
            static::setMapperClass(null);
        }
        $class = static::$mapperClass;
        return $class::$map;
    }

    /**
     * Sets the compiled MediaProbe collection mapper class.
     *
     * @param string $class
     *   The file containing the MediaProbe specification map.
     */
    public static function setMapperClass($class)
    {
        if ($class === null) {
            static::$mapperClass = static::DEFAULT_COLLECTION_NAMESPACE . '\\Core';
        } else {
            static::$mapperClass = $class;
        }
    }

    /**
     * Returns the ids of the defined collections.
     *
     * @return array
     *   A simple array, with the list of the collection ids.
     */
    public static function listIds()
    {
        return array_keys(static::getMap()['collections']);
    }

    /**
     * Returns the requested collection.
     *
     * @param string $id
     *   The id of the collection.
     * @param array $overrides
     *   (Optional) If defined, overrides properties defined in the collection.
     *
     * @return Collection
     *   A simple array, with the specification collections.
     */
    public static function get($id, array $overrides = [])
    {
        $class = static::DEFAULT_COLLECTION_NAMESPACE . '\\' . $id;
        return new $class($id, $overrides);
    }

    /**
     * Returns a collection given its name.
     *
     * @param string $collection_name
     *   The collection name.
     *
     * @return Collection|null
     *   The collection object or null if non existent.
     */
    public static function getByName($collection_name)
    {
        if (!isset(static::getMap()['collectionsByName'][$collection_name])) {
            return null;
        }
        return static::get(static::getMap()['collectionsByName'][$collection_name]);
    }

    /**
     * Constructs a Collection object.
     *
     * @param string $id
     *   The id of the collection.
     * @param array $overrides
     *   (Optional) If defined, overrides properties defined in the collection.
     */
    public function __construct($id, array $overrides = [])
    {
        $this->id = $id;
        $this->overrides = $overrides;
    }

    /**
     * Returns the id of the collection.
     *
     * @return mixed
     *   The id of the collection.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Determines if a property exists.
     *
     * @param string $property
     *   The property.
     *
     * @return bool
     *   TRUE if the property exists, FALSE otherwise.
     */
    public function hasProperty($property)
    {
        if (array_key_exists($property, $this->overrides)) {
            return true;
        }
        return array_key_exists($property, static::$map);
    }

    /**
     * Returns the value a property.
     *
     * @param string $property
     *   The property.
     *
     * @return mixed|null
     *   The value of the property.
     */
    public function getPropertyValue($property)
    {
        if (array_key_exists($property, $this->overrides)) {
            return $this->overrides[$property];
        }
        return static::$map[$property] ?? null;
    }

    /**
     * Returns the collection items' ids.
     *
     * @return array
     *   A simple array, with values the items ids included in the collection.
     */
    public function listItemIds()
    {
        return array_keys(static::$map['items'] ?? []);
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
    private function getItemCollectionIndex(string $item_id, ?int $components_count, ElementInterface $context)
    {
        $entry_class = static::$map['items'][$item_id][0]['entryClass'] ?? null;

        return $entry_class ? $entry_class::resolveItemCollectionIndex($components_count, $context) : 0;
    }

    /**
     * Returns the Collection object of an item.
     *
     * @param string $item
     *   The item id.
     * @param mixed $index
     *   The item id index.
     *
     * @return Collection
     *   The item collection object.
     *
     * @throws MediaProbeException
     *   When item is not in collection and no default given.
     */
    public function getItemCollection(string $item, $index = 0, string $default_id = null, array $default_properties = [], int $components_count = null, ElementInterface $context = null): Collection
    {
        if ($index === null) {
            if ($context === null) {
                $index = 0;
            } else {
                $index = $this->getItemCollectionIndex($item, $components_count, $context);
            }
        }

        if (!isset(static::$map['items'][$item][$index]['collection'])) {
            if (isset($default_id)) {
                return static::get($default_id, $default_properties);
            }
            throw new MediaProbeException('Missing collection for item \'%s\' in \'%s\'', $item, $this->getId());
        }
        $item_properties = static::$map['items'][$item][$index];
        unset($item_properties['collection']);
        $item_properties['item'] = $item;
        return static::get(static::$map['items'][$item][$index]['collection'], $item_properties);
    }

    /**
     * Returns the Collection object of an item given its name.
     *
     * @param string $item_name
     *   The item name.
     * @param mixed $index
     *   The item name index.
     *
     * @return Collection|null
     *   The item collection object, or null if missing.
     *
     * @todo throw Exception if missing, do not return null
     */
    public function getItemCollectionByName(string $item_name, $index = 0): ?Collection
    {
        if (!isset(static::$map['itemsByName'][$item_name][$index])) {
            return null;
        }
        return $this->getItemCollection(static::$map['itemsByName'][$item_name][$index]);
    }
}
