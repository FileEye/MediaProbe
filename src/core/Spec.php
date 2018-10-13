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
class Spec
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
    public static function getTypes()
    {
        return array_keys(self::getMap()['types']);
    }

    /**
     * Returns the id of a type given its name.
     *
     * @param string $type_name
     *            the type.
     *
     * @return int|string|null
     *            the type id.
     */
    public static function getTypeIdByName($type_name)
    {
        return isset(self::getMap()['typesByName'][$type_name]) ? self::getMap()['typesByName'][$type_name] : null;
    }

    /**
     * Returns the property value of a type.
     *
     * @param string $type
     *            the type.
     *
     * @return string|null
     *            the element handling class.
     */
    public static function getTypePropertyValue($type, $property)
    {
        return isset(self::getMap()['types'][$type][$property]) ? self::getMap()['types'][$type][$property] : null;
    }

    /**
     * Returns the element ids supported by a type.
     *
     * @param string $type
     *            the type.
     *
     * @return array
     *            an simple array, with values the element ids supported by
     *            the type.
     */
    public static function getTypeSupportedElementIds($type)
    {
        return array_keys(self::getMap()['elements'][$type]);
    }

    /**
     * Returns the type's PHP handling class.
     *
     * @param string $type
     *            the type.
     *
     * @return string
     *            a fully qualified class name.
     */
    public static function getTypeHandlingClass($type)
    {
        return self::getTypePropertyValue($type, 'class');
    }

    /**
     * Returns the property value of an element.
     *
     * @param string $type
     *            the type where this element is placed.
     * @param string|int $element_id
     *            the element id.
     * @param string $property
     *            the property.
     *
     * @return string|null
     *            the element property value or null if not found.
     */
    public static function getElementPropertyValue($type, $element_id, $property)
    {
        if (isset(self::getMap()['elements'][$type][$element_id][$property])) {
            return self::getMap()['elements'][$type][$element_id][$property];
        }
        $element_type = self::getElementType($type, $element_id);
        if ($element_type !== null) {
            return isset(self::getMap()['types'][$element_type][$property]) ? self::getMap()['types'][$element_type][$property] : null;
        }
        return null;
    }

    /**
     * Returns the type of an element.
     *
     * @param string $type
     *            the type where this element is placed.
     * @param string|int $element_id
     *            the element id.
     *
     * @return string|null
     *            the element type.
     */
    public static function getElementType($type, $element_id)
    {
        if (isset(self::getMap()['elements'][$type][$element_id]['type'])) {
            return self::getMap()['elements'][$type][$element_id]['type'];
        }
        return null;
    }

    /**
     * Returns the name of an element.
     *
     * @param string $type
     *            the type where this element is placed.
     * @param string|int $element_id
     *            the element id.
     *
     * @return string|null
     *            the element name.
     */
    public static function getElementName($type, $element_id)
    {
        return self::getElementPropertyValue($type, $element_id, 'name');
    }

    /**
     * Returns the id of an element given its name.
     *
     * @param string $type
     *            the type where this element is placed.
     * @param string $element_name
     *            the element id.
     *
     * @return int|string|null
     *            the element id.
     */
    public static function getElementIdByName($type, $element_name)
    {
        return isset(self::getMap()['elementsByName'][$type][$element_name]) ? self::getMap()['elementsByName'][$type][$element_name] : null;
    }

    /**
     * Returns the title of an element.
     *
     * @param string $type
     *            the type where this element is placed.
     * @param string|int $element_id
     *            the element id.
     *
     * @return string|null
     *            the element title.
     */
    public static function getElementTitle($type, $element_id)
    {
        return self::getElementPropertyValue($type, $element_id, 'title');
    }

    /**
     * Returns the handling class of an element.
     *
     * @param string $type
     *            the type where this element is placed.
     * @param string|int $element_id
     *            the element id.
     *
     * @return string|null
     *            the element handling class.
     */
    public static function getElementHandlingClass($type, $element_id, $format = null)
    {
        // Return the element class, if defined.
        $class = self::getElementPropertyValue($type, $element_id, 'class');
        if ($class !== null) {
            return $class;
        }

        // If format is not passed in, try getting it from the spec.
        if ($format === null) {
            $formats = self::getElementPropertyValue($type, $element_id, 'format');
            if (empty($formats)) {
                throw new ExifEyeException(
                    'No format can be derived for tag: 0x%04X (%s) in ifd: \'%s\'',
                    $element_id,
                    self::getElementName($type, $element_id),
                    $type
                );
            }
            $format = $formats[0];
        }

        $default_entry_class = Spec::getElementPropertyValue('format', $format, 'class');
        if (!$default_entry_class) {
            throw new ExifEyeException('Unsupported format: %d', $format);
        }
        return $default_entry_class;
    }

    /**
     * Returns the text of an element.
     *
     * @param string $type
     *            the element type.
     * @param string $id
     *            the element id.
     * @param mixed $value
     *            the element value.
     * @param array $options
     *            (Optional) an array of options to format the value.
     *
     * @return string|null
     *            the element text, or NULL if not applicable.
     */
    public static function getElementText($type, $id, $value, $options = [])
    {
        if (isset(self::getMap()['elements'][$type][$id]['text']['mapping']) && is_scalar($value)) {
            $map = self::getMap()['elements'][$type][$id]['text']['mapping'];
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
    public static function getMakerNoteIfdType($make, $model)
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
        return static::getElementName('format', $type);
    }

    /**
     * Returns the id of a format from its name.
     *
     * @param string $name
     *
     * @return integer|null
     */
    public static function getFormatIdFromName($name)
    {
        return static::getElementIdByName('format', $name);
    }

    /**
     * @todo fix one line
     * Return the size of components in a given format in bytes needed to store
     * one component with the given format.
     *
     * @param integer $type
     *
     * @return integer|null
     */
    public static function getFormatSize($type)
    {
        return static::getElementPropertyValue('format', $type, 'length');
    }
}
