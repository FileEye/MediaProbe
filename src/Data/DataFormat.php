<?php

namespace FileEye\MediaProbe\Data;

use FileEye\MediaProbe\Collection;

/**
 * Class to retrieve data format information.
 */
abstract class DataFormat
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
    const CHAR = 2000;

    /**
     * Returns the name of a format like 'Ascii' for the ASCII format.
     *
     * @throws CollectionException
     */
    public static function getName(int $id): string
    {
        return Collection::get('Format')->getItemCollection($id)->getPropertyValue('name');
    }

    /**
     * Returns the id of a format from its name.
     *
     * @throws CollectionException
     */
    public static function getFromName(string $name): int
    {
        return (int) Collection::get('Format')->getItemCollectionByName($name)->getPropertyValue('item');
    }

    /**
     * Returns the size, in bytes, of a component in a given format.
     *
     * @throws CollectionException
     */
    public static function getSize(int $id): int
    {
        return (int) Collection::get('Format')->getItemCollection($id)->getPropertyValue('length');
    }

    /**
     * Returns the handling class of a format.
     *
     * @throws CollectionException
     */
    public static function getClass(int $id): string
    {
        return Collection::get('Format')->getItemCollection($id)->getPropertyValue('class');
    }
}
