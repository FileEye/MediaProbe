<?php

/**
 * PEL: PHP Exif Library.
 * A library with support for reading and
 * writing all Exif headers in JPEG and TIFF images using PHP.
 *
 * Copyright (C) 2004, 2005, 2006 Martin Geisler.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program in the file COPYING; if not, write to the
 * Free Software Foundation, Inc., 51 Franklin St, Fifth Floor,
 * Boston, MA 02110-1301 USA
 */
namespace lsolesen\pel;

/**
 * Classes for dealing with Exif entries.
 *
 * This file defines two exception classes and the abstract class
 * {@link PelEntry} which provides the basic methods that all Exif
 * entries will have. All Exif entries will be represented by
 * descendants of the {@link PelEntry} class --- the class itself is
 * abstract and so it cannot be instantiated.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public
 *          License (GPL)
 * @package PEL
 */

/**
 * Common ancestor class of all {@link PelIfd} entries.
 *
 * As this class is abstract you cannot instantiate objects from it.
 * It only serves as a common ancestor to define the methods common to
 * all entries. The most important methods are {@link getValue()} and
 * {@link setValue()}, both of which is abstract in this class. The
 * descendants will give concrete implementations for them.
 *
 * If you have some data coming from an image (some raw bytes), then
 * the static method {@link newFromData()} is helpful --- it will look
 * at the data and give you a proper decendent of {@link PelEntry}
 * back.
 *
 * If you instead want to have an entry for some data which take the
 * form of an integer, a string, a byte, or some other PHP type, then
 * don't use this class. You should instead create an object of the
 * right subclass ({@link PelEntryShort} for short integers, {@link
 * PelEntryAscii} for strings, and so on) directly.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 * @package PEL
 */
abstract class PelEntry
{

    /**
     * Type of IFD containing this tag.
     *
     * This must be one of the constants defined in {@link PelIfd}:
     * {@link PelIfd::IFD0} for the main image IFD, {@link PelIfd::IFD1}
     * for the thumbnail image IFD, {@link PelIfd::EXIF} for the Exif
     * sub-IFD, {@link PelIfd::GPS} for the GPS sub-IFD, or {@link
     * PelIfd::INTEROPERABILITY} for the interoperability sub-IFD.
     *
     * @var int
     */
    protected $ifd_type;

    /**
     * The bytes representing this entry.
     *
     * Subclasses must either override {@link getBytes()} or, if
     * possible, maintain this property so that it always contains a
     * true representation of the entry.
     *
     * @var string
     */
    protected $bytes = '';

    /**
     * The {@link PelTag} of this entry.
     *
     * @var int
     */
    protected $tag;

    /**
     * The {@link PelFormat} of this entry.
     *
     * @var int
     */
    protected $format;

    /**
     * The number of components of this entry.
     *
     * @var int
     */
    protected $components;

    /**
     * Creates a new PelEntry of the required subclass.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param array $arguments
     *            a list or arguments to be passed to the PelEntry subclass
     *            constructor.
     *
     * @return PelEntry a newly created entry, holding the data given.
     */
    final public static function createNew($ifd_id, $tag_id, array $arguments)
    {
        $class = PelSpec::getTagClass($ifd_id, $tag_id);
        return call_user_func($class . '::createInstance', $ifd_id, $tag_id, $arguments);
    }

    /**
     * Creates a PelEntry of the required subclass from file data.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param PelDataWindow $data
     *            the data window that will provide the data.
     * @param integer $ifd_offset
     *            the offset within the window where the directory will
     *            be found.
     * @param int $seq
     *            the element's position in the {@link PelDataWindow} $data.
     *
     * @return PelEntry a newly created entry, holding the data given.
     */
    final public static function createFromData($ifd_id, $tag_id, PelDataWindow $data, $ifd_offset, $seq)
    {
        $format = $data->getShort($ifd_offset + 12 * $seq + 2);
        $components = $data->getLong($ifd_offset + 12 * $seq + 4);

        // The data size. If bigger than 4 bytes, the actual data is
        // not in the entry but somewhere else, with the offset stored
        // in the entry.
        $size = PelFormat::getSize($format) * $components;
        if ($size > 0) {
            $data_offset = $ifd_offset + 12 * $seq + 8;
            if ($size > 4) {
                $data_offset = $data->getLong($data_offset);
            }
            $sub_data = $data->getClone($data_offset, $size);
        } else {
            $data_offset = 0;
            $sub_data = new PelDataWindow();
        }

        try {
            $class = PelSpec::getTagClass($ifd_id, $tag_id, $format);
            $arguments = call_user_func($class . '::getInstanceArgumentsFromData', $ifd_id, $tag_id, $format, $components, $sub_data, $data_offset);
            return  call_user_func($class . '::createInstance', $ifd_id, $tag_id, $arguments);
        } catch (PelException $e) {
            // Throw the exception when running in strict mode, store
            // otherwise.
            Pel::maybeThrow($e);
        }
    }

    /**
     * Creates an instance of the entry.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param array $arguments
     *            a list or arguments to be passed to the PelEntry subclass
     *            constructor.
     *
     * @return PelEntry a newly created entry, holding the data given.
     */
    public static function createInstance($ifd_id, $tag_id, $arguments)
    {
        $class = new \ReflectionClass(get_called_class());
        array_unshift($arguments, $tag_id);
        $instance = $class->newInstanceArgs($arguments);
        $instance->setIfdType($ifd_id);
        return $instance;
    }

    /**
     * Get arguments for the instance constructor from file data.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param int $format
     *            the format of the entry as defined in {@link PelFormat}.
     * @param int $components
     *            the components in the entry.
     * @param PelDataWindow $data
     *            the data which will be used to construct the entry.
     * @param int $data_offset
     *            the offset of the main DataWindow where data is stored.
     *
     * @return array a list or arguments to be passed to the PelEntry subclass
     *            constructor.
     */
    public static function getInstanceArgumentsFromData($ifd_id, $tag_id, $format, $components, PelDataWindow $data, $data_offset)
    {
        throw new PelException('getInstanceArgumentsFromData() must be implemented.');
    }

    /**
     * Return the tag of this entry.
     *
     * @return int the tag of this entry.
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Return the type of IFD which holds this entry.
     *
     * @return int one of the constants defined in {@link PelIfd}:
     *         {@link PelIfd::IFD0} for the main image IFD, {@link PelIfd::IFD1}
     *         for the thumbnail image IFD, {@link PelIfd::EXIF} for the Exif
     *         sub-IFD, {@link PelIfd::GPS} for the GPS sub-IFD, or {@link
     *         PelIfd::INTEROPERABILITY} for the interoperability sub-IFD.
     */
    public function getIfdType()
    {
        return $this->ifd_type;
    }

    /**
     * Update the IFD type.
     *
     * @param
     *            int must be one of the constants defined in {@link
     *            PelIfd}: {@link PelIfd::IFD0} for the main image IFD, {@link
     *            PelIfd::IFD1} for the thumbnail image IFD, {@link PelIfd::EXIF}
     *            for the Exif sub-IFD, {@link PelIfd::GPS} for the GPS sub-IFD, or
     *            {@link PelIfd::INTEROPERABILITY} for the interoperability
     *            sub-IFD.
     */
    public function setIfdType($type)
    {
        $this->ifd_type = $type;
    }

    /**
     * Return the format of this entry.
     *
     * @return int the format of this entry.
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Return the number of components of this entry.
     *
     * @return int the number of components of this entry.
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Turn this entry into bytes.
     *
     * @param
     *            PelByteOrder the desired byte order, which must be either
     *            {@link Convert::LITTLE_ENDIAN} or {@link Convert::BIG_ENDIAN}.
     *
     * @return string bytes representing this entry.
     */
    public function getBytes($o)
    {
        return $this->bytes;
    }

    /**
     * Get the value of this entry as text.
     *
     * The value will be returned in a format suitable for presentation,
     * e.g., rationals will be returned as 'x/y', ASCII strings will be
     * returned as themselves etc.
     *
     * @param
     *            boolean some values can be returned in a long or more
     *            brief form, and this parameter controls that.
     *
     * @return string the value as text.
     */
    public function getText($brief = false)
    {
        // If PelSpec can return the text, return it, otherwise implementations
        // will override.
        return PelSpec::getTagText($this, $brief);
    }

    /**
     * Get the value of this entry.
     *
     * The value returned will generally be the same as the one supplied
     * to the constructor or with {@link setValue()}. For a formatted
     * version of the value, one should use {@link getText()} instead.
     *
     * @return mixed the unformatted value.
     */
    abstract public function getValue();

    /**
     * Set the value of this entry.
     *
     * The value should be in the same format as for the constructor.
     *
     * @param
     *            mixed the new value.
     *
     * @abstract
     *
     */
    public function setValue($value)
    {
        /*
         * This (fake) abstract method is here to make it possible for the
         * documentation to refer to PelEntry::setValue().
         * It cannot declared abstract in the proper PHP way, for then PHP
         * wont allow subclasses to define it with two arguments (which is
         * what PelEntryCopyright does).
         */
        throw new PelException('setValue() is abstract.');
    }

    /**
     * Turn this entry into a string.
     *
     * @return string a string representation of this entry. This is
     *         mostly for debugging.
     */
    public function __toString()
    {
        $str = Pel::fmt("  Tag: 0x%04X (%s)\n", $this->tag, PelTag::getName($this->ifd_type, $this->tag));
        $str .= Pel::fmt("    Format    : %d (%s)\n", $this->format, PelFormat::getName($this->format));
        $str .= Pel::fmt("    Components: %d\n", $this->components);
        if ($this->getTag() != PelSpec::getTagIdByName(PelSpec::getIfdIdByType('Exif'), 'MakerNote') && $this->getTag() != PelSpec::getTagIdByName(PelSpec::getIfdIdByType('0'), 'PrintIM')) {
            $str .= Pel::fmt("    Value     : %s\n", print_r($this->getValue(), true));
        }
        $str .= Pel::fmt("    Text      : %s\n", $this->getText());
        return $str;
    }
}
