<?php

namespace ExifEye\core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\Tag;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;

/**
 * Class to retrieve IFD and TAG information from YAML specs.
 */
class Collection
{
    /**
     * Default mapper namespace.
     */
    const DEFAULT_MAP_NAMESPACE = 'ExifEye\CollectionMap';

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
     * Returns the compiled ExifEye specification map.
     *
     * In case the map is not yet initialized, defaults to the pre-compiled
     * one.
     *
     * @return array
     *   The ExifEye specification map.
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
     * Sets the compiled ExifEye collection mapper class.
     *
     * @param string $class
     *   The file containing the ExifEye specification map.
     */
    public static function setMapperClass($class)
    {
        if ($class === null) {
            static::$mapperClass = static::DEFAULT_MAP_NAMESPACE . '\\Core';
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
     * @return Collection
     *   A simple array, with the specification collections.
     */
    public static function get($id)
    {
        return new static($id);
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
        return isset(static::getMap()['collections'][$this->id][$property]) ? static::getMap()['collections'][$this->id][$property] : null;
    }

    /**
     * Returns the collection items' ids.
     *
     * @return array
     *   A simple array, with values the items ids included in the collection.
     */
    public function listItemIds()
    {
        return isset(static::getMap()['items'][$this->id]) ? array_keys(static::getMap()['items'][$this->id]) : [];
    }

    /**
     * Returns the Collection object of an item.
     *
     * @param string $item
     *   The item id.
     *
     * @return Collection|null
     *   The item collection object, or null if missing.
     */
    public function getItemCollection($item, $default_id = null, array $default_properties = [])
    {
        if (!isset(static::getMap()['items'][$this->id][$item]['collection'])) {
            if (isset($default_id)) {
                return new static($default_id, $default_properties);
            }
            return null;
        }
        $item_properties = static::getMap()['items'][$this->id][$item];
        unset($item_properties['collection']);
        $item_properties['item'] = $item;
        return new static(static::getMap()['items'][$this->id][$item]['collection'], $item_properties);
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
        if (!isset(static::getMap()['itemsByName'][$this->id][$item_name])) {
            return null;
        }
        return $this->getItemCollection(static::getMap()['itemsByName'][$this->id][$item_name]);
    }
}
