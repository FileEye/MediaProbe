<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Base class for a MediaProbe leaf block.
 *
 * A leaf block only contains an Entry object.
 */
abstract class LeafBlockBase extends BlockBase
{
    public function getValue(array $options = []): mixed
    {
        $entry = $this->getElement("entry");
        if ($entry === null) {
            return null;
        }
        assert($entry instanceof EntryInterface);
        return $entry->getValue($options);
    }

    public function toString(array $options = []): string
    {
        return $this->getElement("entry") ? $this->getElement("entry")->toString($options) : '';
    }

    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        return $this->getElement("entry") ? $this->getElement("entry")->toBytes($order, $offset) : '';
    }

    public function getFormat(): int
    {
        $entry = $this->getElement("entry");
        if (!$entry) {
            return $this->getDefinition()->format;
        }
        assert($entry instanceof EntryInterface, get_class($entry));
        return $entry->getFormat();
    }

    public function getComponents(): int
    {
        $entry = $this->getElement("entry");
        if (!$entry) {
            return $this->getDefinition()->valuesCount;
        }
        assert($entry instanceof EntryInterface, get_class($entry));
        return $entry->getComponents();
    }

    protected function getContextPathSegmentPattern(): string
    {
        if ($this->getAttribute('name') !== '') {
            return '/{DOMNode}:{name}:{id}';
        }
        return '/{DOMNode}:{id}';
    }
}
