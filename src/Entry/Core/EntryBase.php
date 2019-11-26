<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementBase;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Collection;

/**
 * Base class for EntryInterface objects.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as a common ancestor to define the methods common to all entries.
 */
abstract class EntryBase extends ElementBase implements EntryInterface
{
    /**
     * The DOM name for EntryInterface nodes.
     */
    const DOM_NODE_NAME = 'entry';

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
     * @param \FileEye\MediaProbe\ElementInterface $parent
     *            xx
     * @param array $data
     *            the data that this entry will be holding.
     * @param \FileEye\MediaProbe\ElementInterface|null $reference
     *            (Optional) if specified, the new element will be inserted
     *            before the reference element.
     */
    public function __construct(ElementInterface $parent, array $data = [], ElementInterface $reference = null)
    {
        parent::__construct(static::DOM_NODE_NAME, $parent, $reference);
        if (!empty($data)) {
            $this->setValue($data);
        }
        $this->format = ItemFormat::getFromName($this->formatName);
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

    public function getTextMap()
    {
        $text_config = $this->getParentElement()->getCollection()->getPropertyValue('text');
        if ($text_config && isset($text_config['mapping'])) {
            return $text_config['mapping'];
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        if (!$this->getParentElement()) {
            return null;
        }
        $value = $options['value'] ?? $this->getValue();
        $text_map = $this->getTextMap();
        if ($text_map && is_scalar($value)) {
            // If the code to be mapped is a non-int, change to string.
            $id = is_int($value) ? $value : (string) $value;
            return isset($text_map[$id]) ? MediaProbe::tra($text_map[$id]) : null;
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function toDumpArray()
    {
        $dump = [
            'format' => ItemFormat::getName($this->getFormat()),
            'components' => $this->getComponents(),
            'bytesHash' => hash('sha256', $this->toBytes()),
            'text' => $this->toString(),
        ];
        if (($exiftool_text = $this->toString(['format' => 'exiftool'])) !== $dump['text']) {
            $dump['exiftool_text'] = $exiftool_text;
        }
        return array_merge(parent::toDumpArray(), $dump);
    }
}
