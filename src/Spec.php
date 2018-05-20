<?php

namespace ExifEye\core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\Tag;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;

/**
 * Class to retrieve IFD and TAG information from YAML specs.
 */
class Spec
{
    /**
     * The compiled PEL specification map.
     *
     * @var array
     */
    private static $map;

    /**
     * The default tag classes.
     *
     * @var array
     */
    private static $defaultTagClasses = [
        Format::ASCII => 'ExifEye\\core\\Entry\\Core\\Ascii',
        Format::BYTE => 'ExifEye\\core\\Entry\\Core\\Byte',
        Format::SHORT => 'ExifEye\\core\\Entry\\Core\\Short',
        Format::LONG => 'ExifEye\\core\\Entry\\Core\\Long',
        Format::RATIONAL => 'ExifEye\\core\\Entry\\Core\\Rational',
        Format::SBYTE => 'ExifEye\\core\\Entry\\Core\\SignedByte',
        Format::SSHORT => 'ExifEye\\core\\Entry\\Core\\SignedShort',
        Format::SLONG => 'ExifEye\\core\\Entry\\Core\\SignedLong',
        Format::SRATIONAL => 'ExifEye\\core\\Entry\\Core\\SignedRational',
        Format::UNDEFINED => 'ExifEye\\core\\Entry\\Core\\Undefined',
    ];

    /**
     * Returns the compiled PEL specification map.
     *
     * In case the map is not yet initialized, defaults to the pre-compiled
     * one.
     *
     * @return array
     *            the PEL specification map.
     */
    private static function getMap()
    {
        if (!isset(self::$map)) {
            self::setMap(__DIR__ . '/../resources/spec.php');
        }
        return self::$map;
    }

    /**
     * Sets the compiled PEL specification map.
     *
     * @param string $file
     *            the file containing the PEL specification map.
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
     * Returns the IFD types in the specification.
     *
     * @return array
     *            an associative array, with keys the IFD identifiers, and
     *            values the IFD types.
     */
    public static function getIfdTypes()
    {
        return self::getMap()['ifds'];
    }

    /**
     * Returns the TAG ids supported in an IFD.
     *
     * @param int $ifd_id
     *            the IFD id.
     *
     * @return array
     *            an simple array, with values the TAG identifiers supported by
     *            the IFD.
     */
    public static function getIfdSupportedTagIds(BlockBase $block)
    {
        $xx_block_id = self::getIfdIdByType($block->getAttribute('name'));

        return array_keys(self::getMap()['tags'][$xx_block_id]);
    }

    /**
     * Returns the IFD id given its type.
     *
     * @param string $ifd_type
     *            the IFD type.
     *
     * @return int|null
     *            the IFD id.
     */
    public static function getIfdIdByType($ifd_type)
    {
        return isset(self::getMap()['ifdsByType'][$ifd_type]) ? self::getMap()['ifdsByType'][$ifd_type] : null;
    }

    /**
     * Returns the IFD class.
     *
     * @param int $ifd_id
     *            the IFD id.
     *
     * @return string|null
     *            the IFD class.
     */
    public static function getIfdClass($block_name)
    {
        $xx_block_id = self::getIfdIdByType($block_name);

        return isset(self::getMap()['ifdClasses'][$xx_block_id]) ? self::getMap()['ifdClasses'][$xx_block_id] : null;
    }

    /**
     * Returns a Pel IFD to use for loading maker notes.
     *
     * @param string $ifd_id
     *            the IFD id.
     *
     * @return int|null
     *            an IFD id.
     */
    public static function getMakerNoteIfdName($make, $model)
    {
        $ifd_id = isset(self::getMap()['makerNotes'][$make]) ? self::getMap()['makerNotes'][$make] : null;
        if ($ifd_id !== null) {
            return self::getMap()['ifds'][$ifd_id];
        }
        return null;
    }

    /**
     * Determines if the TAG is an IFD pointer.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return bool
     *            TRUE or FALSE.
     */
    public static function isTagAnIfdPointer(BlockBase $parent_block, $tag_id)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        return isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['ifd']);
    }

    /**
     * Returns the IFD id the TAG points to.
     *
     * @param int $xx_parent_block_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return int|null
     *            the IFD id, or null if the TAG is not an IFD pointer.
     */
    public static function getIfdNameFromTag(BlockBase $parent_block, $tag_id)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        $ifd_id = isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['ifd']) ? self::getMap()['tags'][$xx_parent_block_id][$tag_id]['ifd'] : null;

        if ($ifd_id !== null) {
            return self::getMap()['ifds'][$ifd_id];
        }
        return null;
    }

    /**
     * Returns the IFD post-load callbacks.
     *
     * @param int $xx_parent_block_id
     *            the IFD id.
     *
     * @return array
     *            the post-load callbacks.
     */
    public static function getIfdPostLoadCallbacks(BlockBase $block)
    {
        $xx_block_id = self::getIfdIdByType($block->getAttribute('name'));

        return self::getMap()['ifdPostLoadCallbacks'][$xx_block_id];
    }

    /**
     * Returns the TAG name.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return string|null
     *            the TAG name.
     */
    public static function getTagName(BlockBase $parent_block, $tag_id)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        return isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['name']) ? self::getMap()['tags'][$xx_parent_block_id][$tag_id]['name'] : null;
    }

    /**
     * Returns the TAG id given its name.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param string $tag_name
     *            the TAG name.
     *
     * @return int|null
     *            the TAG id.
     */
    public static function getTagIdByName(BlockBase $parent_block, $tag_name)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        return isset(self::getMap()['tagsByName'][$xx_parent_block_id][$tag_name]) ? self::getMap()['tagsByName'][$xx_parent_block_id][$tag_name] : null;
    }

    /**
     * Returns the TAG format.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return array
     *            the array of formats supported by the TAG.
     */
    public static function getTagFormat(BlockBase $parent_block, $tag_id)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        $format = isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['format']) ? self::getMap()['tags'][$xx_parent_block_id][$tag_id]['format'] : [];
        return empty($format) ? null : $format;
    }

    /**
     * Returns the TAG components.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return int|null
     *            the TAG count of data components.
     */
    public static function getTagComponents(BlockBase $parent_block, $tag_id)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        return isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['components']) ? self::getMap()['tags'][$xx_parent_block_id][$tag_id]['components'] : null;
    }

    /**
     * Returns whether the TAG should be skipped.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return bool
     */
    public static function getTagSkip(BlockBase $parent_block, $tag_id)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        return isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['skip']) ? self::getMap()['tags'][$xx_parent_block_id][$tag_id]['skip'] : false;
    }

    /**
     * Returns the TAG class.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return string
     *            the TAG class.
     */
    public static function getEntryClass(BlockBase $parent_block, $tag_id, $format = null)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        // Return the specific tag class, if defined.
        if (isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['class'])) {
            return self::getMap()['tags'][$xx_parent_block_id][$tag_id]['class'];
        }

        // If format is not passed in, try getting it from the spec.
        if ($format === null) {
            $formats = self::getTagFormat($parent_block, $tag_id);
            if (empty($formats)) {
                throw new ExifEyeException(
                    'No format can be derived for tag: 0x%04X (%s) in ifd: \'%s\'',
                    $tag_id,
                    self::getTagName($parent_block, $tag_id),
                    $parent_block->getAttribute('name')
                );
            }
            $format = $formats[0];
        }

        if (!isset(self::$defaultTagClasses[$format])) {
            throw new ExifEyeException('Unsupported format: %s', Format::getName($format));
        }
        return self::$defaultTagClasses[$format];
    }

    /**
     * Returns the TAG title.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     *
     * @return string|null
     *            the TAG title.
     */
    public static function getTagTitle(BlockBase $parent_block, $tag_id)
    {
        $xx_parent_block_id = self::getIfdIdByType($parent_block->getAttribute('name'));

        return isset(self::getMap()['tags'][$xx_parent_block_id][$tag_id]['title']) ? self::getMap()['tags'][$xx_parent_block_id][$tag_id]['title'] : null;
    }

    /**
     * Returns the TAG text.
     *
     * @param \ExifEye\core\Block\Tag $tag
     *            the TAG.
     * @param EntryInterface $entry
     *            the TAG entry.
     * @param array $options
     *            (optional) an array of options to format the value.
     *
     * @return string|null
     *            the TAG text, or NULL if not applicable.
     */
    public static function getTagText(BlockBase $tag, EntryInterface $entry, $options = []) // xx move to generic element
    {
        // Return a text from a mapping list if defined.
        $ifd_name = $tag->getParentElement()->getAttribute('name');
        $ifd_id = self::getIfdIdByType($ifd_name);
        $tag_id = $tag->getAttribute('id');
        if (isset(self::getMap()['tags'][$ifd_id][$tag_id]['text']['mapping'])) {
            $value = $entry->getValue();
            if (is_scalar($value)) {
                $map = self::getMap()['tags'][$ifd_id][$tag_id]['text']['mapping'];
                // If the code to be mapped is a non-int, change to string.
                $id = is_int($value) ? $value : (string) $value;
                return isset($map[$id]) ? ExifEye::tra($map[$id]) : null;
            }
        }

        return null;
    }
}
