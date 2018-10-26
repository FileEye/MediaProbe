<?php

namespace ExifEye\core\Entry\Core;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ElementBase;
use ExifEye\core\ElementInterface;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Collection;

/**
 * Base class for EntryInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all entries.
 */
abstract class EntryBase extends ElementBase implements EntryInterface
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'entry';

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
     * @param ElementInterface $parent
     *            xx
     * @param array $data
     *            the data that this entry will be holding.
     */
    public function __construct(ElementInterface $parent, array $data = [])
    {
        parent::__construct('entry', $parent);
        if (!empty($data)) {
            $this->setValue($data);
        }
        $this->format = Collection::getFormatIdFromName($this->formatName);
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
        // xx this is assuming an entry is within a tag within an ifd...
        $parent = $this->getParentElement();
        if ($parent !== null && $parent->getCollection() !== null) {
            return Collection::getItemText($parent->getCollection(), $parent->getAttribute('id'), $this->getValue(), $options);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $dump = array_merge(parent::toDumpArray(), [
            'format' => Collection::getFormatName($this->getFormat()),
            'components' => $this->getComponents(),
            'bytesHash' => hash('sha256', $this->toBytes()),
            'text' => $this->toString(),
        ]);
        return $dump;
    }
}
