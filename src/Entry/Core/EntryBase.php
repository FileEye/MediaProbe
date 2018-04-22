<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\DataWindow;
use ExifEye\core\ElementBase;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
use ExifEye\core\Spec;

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
abstract class EntryBase extends ElementBase implements EntryInterface
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'Entry';

    /**
     * {@inheritdoc}
     */
    protected $id = 0;

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
    public function getElementPathFragment()
    {
        return $this->getType() . '+' . $this->getName();
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
    public function setValue(array $value)
    {
        $this->valid = true;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        if ($parent = $this->getParentElement()) {
            return Spec::getTagText($parent, $this, $options); // xx
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $dump = array_merge(parent::toDumpArray(), [
            'format' => Format::getName($this->getFormat()),
            'components' => $this->getComponents(),
            'value' => base64_encode(serialize($this->getValue())),
            'clear_value' => serialize($this->getValue()),
            'text' => $this->toString(),
        ]);
        unset($dump['id'], $dump['name']);
        return $dump;
    }
}
