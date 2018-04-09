<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEyeException;

/**
 * Base class for EntryInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all entries.
 *
 * If you have data coming from an image (some raw bytes), then the static
 * method ::getInstanceArgumentsFromTagData is helpful --- it looks at the data
 * and gives back an array of arguments that can be used in the descendent
 * constructor.
 */
abstract class EntryBase implements EntryInterface
{
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
     * The value held by this entry.
     *
     * A representation of the value of the entry which is more suitable for
     * handling than the bytes.
     *
     * @var mixed
     */
    protected $value;

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
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        throw new ExifEyeException('getInstanceArgumentsFromTagData() must be implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value;
    }
}
