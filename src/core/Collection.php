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
     * The compiled ExifEye specification map.
     *
     * @var array
     */
    protected static $map;

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
     *            the ExifEye specification map.
     */
    protected static function getMap()
    {
        if (!isset(static::$map)) {
            static::setMap(__DIR__ . '/../../resources/spec.php');
        }
        return static::$map;
    }

    /**
     * Sets the compiled ExifEye specification map.
     *
     * @param string $file
     *            the file containing the ExifEye specification map.
     */
    public static function setMap($file)
    {
        if ($file === null) {
            static::$map = null;
        } else {
            static::$map = include $file;
        }
    }

    /**
     * Returns the ids of the defined collections.
     *
     * @return array
     *            an simple array, with the list of the collection ids.
     */
    public static function listIds()
    {
        return array_keys(static::getMap()['collections']);
    }

    /**
     * Returns the requested collection.
     *
     * @return Collection
     *            an simple array, with the specification collections.
     */
    public static function get($id, $overrides = [])
    {
        return new static($id, $overrides);
    }

    /**
     * Returns a collection given its name.
     *
     * @param string $collection_name
     *            the collection name.
     *
     * @return Collection|null
     *            the collection object or null if non existent.
     */
    public static function getByName($collection_name, $overrides = [])
    {
        if (!isset(static::getMap()['collectionsByName'][$collection_name])) {
            return null;
        }
        return static::get(static::getMap()['collectionsByName'][$collection_name], $overrides);
    }

    /**
     * Constructs a Collection object.
     *
     * @param string $id
     *            The id of the collection.
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
     *            the id of the collection.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value a property.
     *
     * @param string $property
     *            the property.
     *
     * @return mixed|null
     *            the value of the property.
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
     *            an simple array, with values the items ids included in
     *            the collection.
     */
    public function listItemIds()
    {
        return isset(static::getMap()['items'][$this->id]) ? array_keys(static::getMap()['items'][$this->id]) : [];
    }

    /**
     * Returns the Collection object of an item.
     *
     * @param string $item
     *            the item id.
     *
     * @return Collection|null
     *            the item collection object.
     */
    public function getItemCollection($item)
    {
        $item_collection_id = $this->getItemCollectionId($item);
        if ($item_collection_id === null) {
            return null;
        }
        $overrides = static::getMap()['items'][$this->id][$item];
        unset($overrides['collection']);
        $overrides['item'] = $item;
        return new static($item_collection_id, $overrides);
    }

    /**
     * Returns the collection id of an item.
     *
     * @param string $item
     *            the item id.
     *
     * @return string|null
     *            the item collection id.
     */
    protected function getItemCollectionId($item)
    {
        if (isset(static::getMap()['items'][$this->id][$item]['collection'])) {
            return static::getMap()['items'][$this->id][$item]['collection'];
        }
        return null;
    }

    /**
     * Returns the Collection object of an item given its name.
     *
     * @param string $item_name
     *            the item name.
     *
     * @return Collection|null
     *            the item collection object.
     */
    public function getItemCollectionByName($item_name)
    {
        $item = isset(static::getMap()['itemsByName'][$this->id][$item_name]) ? static::getMap()['itemsByName'][$this->id][$item_name] : null;
        if ($item === null) {
            return null;
        }
        return $this->getItemCollection($item);
    }
}
