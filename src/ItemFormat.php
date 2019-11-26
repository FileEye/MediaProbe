<?php

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Collection;

/**
 * Class to retrieve item format information.
 */
class ItemFormat
{
    const BYTE = 1;
    const ASCII = 2;
    const SHORT = 3;
    const LONG = 4;
    const RATIONAL = 5;
    const SIGNED_BYTE = 6;
    const UNDEFINED = 7;
    const SIGNED_SHORT = 8;
    const SIGNED_LONG = 9;
    const SIGNED_RATIONAL = 10;
    const FLOAT = 11;
    const DOUBLE = 12;
    const SHORT_REV = 1000;
    const SHORT_RATIONAL = 1001;
    const SHORT_SIGNED_RATIONAL = 1002;

    /**
     * Returns the name of a format like 'Ascii' for the ASCII format.
     *
     * @param integer $id
     *
     * @return string|null
     */
    public static function getName(int $id): ?string
    {
        $collection = Collection::get('Format')->getItemCollection($id);
        return $collection ? $collection->getPropertyValue('name') : null;
    }

    /**
     * Returns the id of a format from its name.
     *
     * @param string $name
     *
     * @return int|null
     */
    public static function getFromName(string $name): ?int
    {
        $collection = Collection::get('Format')->getItemCollectionByName($name);
        $id = $collection ? $collection->getPropertyValue('item') : null;
        return $id !== null ? (int) $id : null;
    }

    /**
     * Returns the size, in bytes, of a component in a given format.
     *
     * @param integer $id
     *
     * @return int|null
     */
    public static function getSize(int $id): ?int
    {
        $collection = Collection::get('Format')->getItemCollection($id);
        $size = $collection ? $collection->getPropertyValue('length') : null;
        return $size !== null ? (int) $size : null;
    }

    /**
     * Returns the handling class of a format.
     *
     * @param integer $id
     *
     * @return string|null
     */
    public static function getClass(int $id): ?string
    {
        $collection = Collection::get('Format')->getItemCollection($id);
        return $collection ? $collection->getPropertyValue('class') : null;
    }
}
