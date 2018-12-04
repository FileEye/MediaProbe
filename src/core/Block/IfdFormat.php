<?php

namespace ExifEye\core\Block;

use ExifEye\core\Collection;

/**
 * Class to retrieve IFD format information.
 */
class IfdFormat
{
    /**
     * Returns the name of a format like 'Ascii' for the ASCII format.
     *
     * @param integer $id
     *
     * @return string|null
     */
    public static function getName($id)
    {
        $collection = Collection::get('format')->getItemCollection($id);
        return $collection ? $collection->getPropertyValue('name') : null;
    }

    /**
     * Returns the id of a format from its name.
     *
     * @param string $name
     *
     * @return int|null
     */
    public static function getFromName($name)
    {
        $collection = Collection::get('format')->getItemCollectionByName($name);
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
    public static function getSize($id)
    {
        $collection = Collection::get('format')->getItemCollection($id);
        $size = $collection ? $collection->getPropertyValue('length') : null;
        return $size !== null ? (int) $size : null;
    }

    /**
     * Returns the size, in bytes, of a component in a given format.
     *
     * @param integer $id
     *
     * @return int|null
     */
    public static function getClass($id)
    {
        $collection = Collection::get('format')->getItemCollection($id);
        return $collection ? $collection->getPropertyValue('class') : null;
    }
}
