<?php

namespace FileEye\MediaProbe\Entry\Core;

use FileEye\MediaProbe\Block\BlockBase;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ElementBase;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
     * The size, in bytes, of each component held.
     *
     * @var int
     */
    protected $formatSize = 1;

    /**
     * The number of components of this entry.
     *
     * @var int
     */
    protected $components;

    /**
     * The data element held by this entry.
     *
     * @var DataElement
     */
    protected $dataElement;

    /**
     * Constructs an EntryInterface object.
     *
     * @param ElementInterface $parent
     *            xx
     * @param DataElement $dataElement
     *            the data that this entry will be holding.
     * @param ElementInterface|null $reference
     *            (Optional) if specified, the new element will be inserted
     *            before the reference element.
     */
    public function __construct(ElementInterface $parent, DataElement $dataElement, ElementInterface $reference = null)
    {
        parent::__construct(static::DOM_NODE_NAME, $parent, $reference);
        $this->setDataElement($dataElement);
        $this->format = ItemFormat::getFromName($this->formatName);
    }

    /**
     * {@inheritdoc}
     */
    public function setDataElement(DataElement $dataElement): void
    {
        $this->dataElement = $dataElement;
        $this->components = (int) ($dataElement->getSize() / $this->formatSize);
        $this->validateDataElement();
    }

    /**
     * Checks validity of the data.
     */
    abstract protected function validateDataElement(): void;

    /**
     * {@inheritdoc}
     */
    public function getDataElement(): DataElement
    {
        return $this->dataElement;
    }

    /**
     * Resolves, in relation to the context, the index of the item collection to be used to instantiate the Entry.
     *
     * @param int|null $components_count
     *   The number of components for the items.
     * @param ElementInterface $context
     *   An element that can be used to provide context.
     *
     * @return mixed
     *   The item collection index.
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context)
    {
        return 0;
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
     * @todo xxx
     */
    protected function hasMappedText(): bool
    {
        if (!$this->getParentElement()) {
            return false;
        }
        if (!$text_config = $this->getParentElement()->getCollection()->getPropertyValue('text')) {
            return false;
        }
        return isset($text_config['mapping']);
    }

    /**
     * @todo xxx
     */
    protected function getMappedText($value)
    {
        $text_config = $this->getParentElement()->getCollection()->getPropertyValue('text');
        $id = is_int($value) ? $value : (string) $value;
        return $text_config['mapping'][$id] ?? null;
    }

    /**
     * @todo xxx
     */
    protected function hasDefaultText(): bool
    {
        if (!$this->getParentElement()) {
            return false;
        }
        if (!$text_config = $this->getParentElement()->getCollection()->getPropertyValue('text')) {
            return false;
        }
        return isset($text_config['default']);
    }

    /**
     * @todo xxx
     */
    protected function resolveValuePlaceholder(string $value, string $source): string
    {
        $tmp = str_replace('{value}', $value, $source);
        $tmp = str_replace('{valuehex}', dechex((int) $value), $tmp);
        return $tmp;
    }

    /**
     * @todo xxx
     */
    public function resolveText($value, bool $null_on_missing = false)
    {
        if (!$this->getParentElement()) {
            return is_array($value) ? implode(' ', $value) : $value;
        }

        if (is_array($value)) {
            $tmp = [];
            foreach ($value as $v) {
                $id = is_int($v) ? $v : (string) $v;
                if ($this->hasMappedText()) {
                    $tmp[] = $this->resolveValuePlaceholder($v, $this->getParentElement()->getCollection()->getPropertyValue('text')['mapping'][$id] ?? (string) $v);
                } elseif ($this->hasDefaultText()) {
                    $tmp[] = $this->resolveValuePlaceholder($v, $this->getParentElement()->getCollection()->getPropertyValue('text')['default']);
                } else {
                    $tmp[] = $v;
                }
            }
            return $tmp;
        }

        $text = null;
        if ($this->hasMappedText()) {
            $id = is_int($value) ? $value : (string) $value;
            $raw = $this->getParentElement()->getCollection()->getPropertyValue('text')['mapping'][$id] ?? null;
            if (!is_null($raw)) {
                $text = $this->resolveValuePlaceholder($value, $raw);
            }
        }
        if (is_null($text) && $this->hasDefaultText()) {
            $text = $this->resolveValuePlaceholder($value, $this->getParentElement()->getCollection()->getPropertyValue('text')['default']);
        }
        if (is_null($text) && $null_on_missing) {
            return null;
        }
        if (!is_null($text)) {
            return $text;
        }

        return is_scalar($value) ? $value : serialize($value);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        return $this->dataElement->getBytes();
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        if (is_null($this->dataElement)) {
            return '';
        }
        $text = $this->resolveText($this->getValue($options));
        if (is_array($text)) {
            if (!$this->hasMappedText() && !$this->hasDefaultText()) {
                return implode(' ', $text);
            }
            if (($options['format'] ?? null) === 'exiftool') {
                return implode('; ', $text);
            }
            return implode(', ', $text);
        }
        return is_null($text) ? null : (string) $text;
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
