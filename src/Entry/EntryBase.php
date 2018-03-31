<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
use ExifEye\core\Spec;

/**
 * Base class for EntryInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all entries. The
 * most important methods are ::getValue() and ::setValue(), both of which are
 * abstract in this class. The descendants give concrete implementations for
 * them.
 *
 * If you have data coming from an image (some raw bytes), then the static
 * method ::getInstanceArgumentsFromTagData is helpful --- it looks at the data
 * and gives back an array of arguments that can be used in the descendent
 * constructor.
 */
abstract class EntryBase
{
    /**
     * The bytes representing this entry.
     *
     * Subclasses must maintain this property so that it always contains a true
     * representation of the entry.
     *
     * @var string
     */
    protected $bytes = '';

    /**
     * The format of this entry.
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
     * Constructs an EntryInterface object.
     *
     * @param array $data
     *            the data that this entry will be holding.
     */
    public function __construct(array $data)
    {
        $this->setValue($data);
    }

    /**
     * Creates a new EntryBase of the required subclass.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param array $arguments
     *            a list or arguments to be passed to the EntryBase subclass
     *            constructor.
     *
     * @return EntryBase a newly created entry, holding the data given.
     */
    final public static function createNew($ifd_id, $tag_id, array $arguments)
    {
        $class = Spec::getTagClass($ifd_id, $tag_id);
        return new $class($arguments);
    }

    /**
     * Get arguments for the instance constructor from raw TAG data.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param int $format
     *            the format of the entry.
     * @param int $components
     *            the components in the entry.
     * @param DataWindow $data
     *            the data which will be used to construct the entry.
     * @param int $data_offset
     *            the offset of the main DataWindow where data is stored.
     *
     * @return array a list or arguments to be passed to the EntryBase subclass
     *            constructor.
     */
    public static function getInstanceArgumentsFromTagData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        throw new ExifEyeException('getInstanceArgumentsFromTagData() must be implemented.');
    }

    /**
     * Returns the format of this entry.
     *
     * @return int
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Returns the number of components of this entry.
     *
     * @return int
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Returns the bytes representing this entry.
     *
     * @return string
     */
    public function getBytes($o) // xx remove $o here
    {
        return $this->bytes;
    }

    /**
     * Returns the value of this entry.
     *
     * The value returned will generally be the same as the one supplied to the
     * constructor or with ::setValue(). For a formatted version of the value,
     * use ::getText() instead.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->getBytes();
    }

    /**
     * Set the value of this entry.
     *
     * @param array
     *            the new value.
     *
     * @return $this
     */
    abstract public function setValue(array $value);

    /**
     * Get the value of this entry as text.
     *
     * The value will be returned in a format suitable for presentation, e.g.
     * rationals will be returned as 'x/y', ASCII strings will be returned as
     * themselves etc.
     *
     * @return string
     */
    public function getText()
    {
        return implode(' ', $this->getBytes());
    }
}
