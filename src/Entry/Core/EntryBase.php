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
     * @todo xxx
     */
    public function getOutputFormat()
    {
        if (!$this->getParentElement()) {
            return $this->format;
        }
        if ($output_format = $this->getParentElement()->getCollection()->getPropertyValue('outputFormat')) {
            return $output_format;
        }
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
        $this->parsed = true;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        return $this->value;
    }

    public function hasMappedText(): bool
    {
        if (!$this->getParentElement()) {
            return false;
        }
        if (!$text_config = $this->getParentElement()->getCollection()->getPropertyValue('text')) {
            return false;
        }
        return isset($text_config['mapping']);
    }

    public function getMappedText($value, $default = null, $variant = 0, $key = 0)
    {
        $text_config = $this->getParentElement()->getCollection()->getPropertyValue('text');
        $id = is_int($value) ? $value : (string) $value;
        return $text_config['mapping'][$id] ?? $default;
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
        if (!is_scalar($value)) {
            return null;
        }
        return $this->hasMappedText() ? $this->getMappedText($value, $value) : null;
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
        return array_merge(parent::toDumpArray(), $dump);
    }
}
