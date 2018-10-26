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
    private static $map;

    /**
     * Returns the compiled ExifEye specification map.
     *
     * In case the map is not yet initialized, defaults to the pre-compiled
     * one.
     *
     * @return array
     *            the ExifEye specification map.
     */
    private static function getMap()
    {
        if (!isset(self::$map)) {
            self::setMap(__DIR__ . '/../../resources/spec.php');
        }
        return self::$map;
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
            self::$map = null;
        } else {
            self::$map = include $file;
        }
    }

    /**
     * Returns the types in the specification.
     *
     * @return array
     *            an simple array, with the specification types.
     */
    public static function getCollections()
    {
        return array_keys(self::getMap()['collections']);
    }

    /**
     * Returns the id of a collection given its name.
     *
     * @param string $collection_name
     *            the collection.
     *
     * @return int|string|null
     *            the collection id.
     */
    public static function getIdByName($collection_name)
    {
        return isset(self::getMap()['collectionsByName'][$collection_name]) ? self::getMap()['collectionsByName'][$collection_name] : null;
    }

    /**
     * Returns the value of a collection's property.
     *
     * @param string $collection
     *            the collection.
     *
     * @return mixed|null
     *            the value of the property.
     */
    public static function getPropertyValue($collection, $property)
    {
        return isset(self::getMap()['collections'][$collection][$property]) ? self::getMap()['collections'][$collection][$property] : null;
    }

    /**
     * Returns the the collection items' ids.
     *
     * @param string $collection
     *            the collection.
     *
     * @return array
     *            an simple array, with values the items ids included in
     *            the collection.
     */
    public static function getItemsIds($collection)
    {
        return isset(self::getMap()['items'][$collection]) ? array_keys(self::getMap()['items'][$collection]) : [];
    }

    /**
     * Returns the collection's PHP handling class.
     *
     * @param string $collection
     *            the collection.
     *
     * @return string
     *            a fully qualified class name.
     */
    public static function getClass($collection)
    {
        return self::getPropertyValue($collection, 'class');
    }

    /**
     * Returns the property value of an element.
     *
     * @param string $collection
     *            the collection where this element is placed.
     * @param string|int $item
     *            the element id.
     * @param string $property
     *            the property.
     *
     * @return mixed|null
     *            the element property value or null if not found.
     */
    public static function getItemPropertyValue($collection, $item, $property)
    {
        if (isset(self::getMap()['items'][$collection][$item][$property])) {
            return self::getMap()['items'][$collection][$item][$property];
        }
        $item_collection = self::getItemCollection($collection, $item);
        if ($item_collection !== null) {
            return isset(self::getMap()['collections'][$item_collection][$property]) ? self::getMap()['collections'][$item_collection][$property] : null;
        }
        return null;
    }

    /**
     * Returns the collection of an element.
     *
     * @param string $collection
     *            the collection where this element is placed.
     * @param string|int $item
     *            the element id.
     *
     * @return string|null
     *            the element collection.
     */
    public static function getItemCollection($collection, $item)
    {
        if (isset(self::getMap()['items'][$collection][$item]['collection'])) {
            return self::getMap()['items'][$collection][$item]['collection'];
        }
        return null;
    }

    /**
     * Returns the name of an element.
     *
     * @param string $collection
     *            the collection where this element is placed.
     * @param string|int $item
     *            the element id.
     *
     * @return string|null
     *            the element name.
     */
    public static function getItemName($collection, $item)
    {
        return self::getItemPropertyValue($collection, $item, 'name');
    }

    /**
     * Returns the id of an item given its name.
     *
     * @param string $collection
     *            the collection where this element is placed.
     * @param string $item_name
     *            the item name.
     *
     * @return mixed|null
     *            the item id.
     */
    public static function getItemIdByName($collection, $item_name)
    {
        return isset(self::getMap()['itemsByName'][$collection][$item_name]) ? self::getMap()['itemsByName'][$collection][$item_name] : null;
    }

    /**
     * Returns the title of an item.
     *
     * @param string $collection
     *            the collection where this item is placed.
     * @param string|int $item
     *            the item id.
     *
     * @return string|null
     *            the item title.
     */
    public static function getItemTitle($collection, $item)
    {
        return self::getItemPropertyValue($collection, $item, 'title');
    }

    /**
     * Returns the handling class of an item.
     *
     * @param string $collection
     *            the collection where this item is placed.
     * @param string|int $item
     *            the item id.
     *
     * @return string|null
     *            the item handling class.
     */
    public static function getItemClass($collection, $item, $format = null)
    {
        // Return the item class, if defined.
        $class = self::getItemPropertyValue($collection, $item, 'class');
        if ($class !== null) {
            return $class;
        }

        // If format is not passed in, try getting it from the spec.
        if ($format === null) {
            $formats = self::getItemPropertyValue($collection, $item, 'format');
            if (empty($formats)) {
                throw new ExifEyeException(
                    'No format can be derived for tag: 0x%04X (%s) in ifd: \'%s\'',
                    $item,
                    self::getItemName($collection, $item),
                    $collection
                );
            }
            $format = $formats[0];
        }

        $default_entry_class = self::getItemPropertyValue('format', $format, 'class');
        if (!$default_entry_class) {
            throw new ExifEyeException('Unsupported format: %d', $format);
        }
        return $default_entry_class;
    }

    /**
     * Returns the text of an item.
     *
     * @param string $collection
     *            the item collection.
     * @param string $id
     *            the item id.
     * @param mixed $value
     *            the item value.
     *
     * @return string|null
     *            the item text, or NULL if not applicable.
     */
    public static function getItemText($collection, $id, $value)
    {
        if (isset(self::getMap()['items'][$collection][$id]['text']['mapping']) && is_scalar($value)) {
            $map = self::getMap()['items'][$collection][$id]['text']['mapping'];
            // If the code to be mapped is a non-int, change to string.
            $id = is_int($value) ? $value : (string) $value;
            return isset($map[$id]) ? ExifEye::tra($map[$id]) : null;
        }
        return null;
    }

    /**
     * xx
     *
     * @return int|null
     *            an IFD element id.
     */
    public static function getMakerNoteCollection($make, $model)
    {
        return isset(self::getMap()['makerNotes'][$make]) ? self::getMap()['makerNotes'][$make] : null;
    }

    /**
     * Returns the name of a format like 'Ascii' for the ASCII format.
     *
     * @param integer $type
     *
     * @return string|null
     */
    public static function getFormatName($type)
    {
        return static::getItemName('format', $type);
    }

    /**
     * Returns the id of a format from its name.
     *
     * @param string $name
     *
     * @return int|null
     */
    public static function getFormatIdFromName($name)
    {
        $id = static::getItemIdByName('format', $name);
        return $id !== null ? (int) $id : null;
    }

    /**
     * Returns the size, in bytes, of a component in a given format.
     *
     * @param integer $id
     *
     * @return int|null
     */
    public static function getFormatSize($id)
    {
        $size = static::getItemPropertyValue('format', $id, 'length');
        return $size !== null ? (int) $size : null;
    }
}
