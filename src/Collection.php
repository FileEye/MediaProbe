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
        return new $class($id, $overrides);;
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
     * Returns the Collection object of an item.
     *
     * @param string $item
     *   The item id.
     *
     * @return Collection
     *   The item collection object.
     *
     * @throws MediaProbeException
     *   When item is not in collection and no default given.
     */
    public function getItemCollection(string $item, string $default_id = null, array $default_properties = []): Collection
    {
        if (!isset(static::$map['items'][$item]['collection'])) {
            if (isset($default_id)) {
                return static::get($default_id, $default_properties);
            }
            throw new MediaProbeException('Missing collection for item \'%s\' in \'%s\'', $item, $this->getId());
        }
        $item_properties = static::$map['items'][$item];
        unset($item_properties['collection']);
        $item_properties['item'] = $item;
        return static::get(static::$map['items'][$item]['collection'], $item_properties);
    }

    /**
     * Returns the Collection object of an item given its name.
     *
     * @param string $item_name
     *   The item name.
     *
     * @return Collection|null
     *   The item collection object, or null if missing.
     */
    public function getItemCollectionByName($item_name)
    {
        if (!isset(static::$map['itemsByName'][$item_name])) {
            return null;
        }
        return $this->getItemCollection(static::$map['itemsByName'][$item_name]);
    }
}
