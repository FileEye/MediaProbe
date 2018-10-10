<?php

namespace ExifEye\core;

/**
 * Helper class to determine ExifEye data formats information.
 */
abstract class Format
{
    /**
     * Returns the name of a format like 'Ascii' for the ASCII format.
     *
     * @param integer $type
     *
     * @return string|null
     */
    public static function getName($type)
    {
        return Spec::getElementName('format', $type);
    }

    /**
     * Returns the id of a format from its name.
     *
     * @param string $name
     *
     * @return integer|null
     */
    public static function getIdFromName($name)
    {
        return Spec::getElementIdByName('format', $name);
    }

    /**
     * Return the size of components in a given format in bytes needed to store
     * one component with the given format.
     *
     * @param integer $type
     *
     * @return integer|null
     */
    public static function getSize($type)
    {
        return Spec::getElementPropertyValue('format', $type, 'length');
    }
}
