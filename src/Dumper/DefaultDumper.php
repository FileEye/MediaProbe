<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Dumper;

use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Model\EntryInterface;

/**
 * The element default dumper visitor.
 */
class DefaultDumper implements DumperInterface
{
    public function dumpElement(ElementInterface $element, array $context = []): array
    {
        return [
            'path' => $element->getContextPath(),
            'handlerClass' => get_class($element),
            'validationLevel' => $element->validationLevel(),
        ];
    }

    public function dumpEntry(EntryInterface $entry, array $context = []): array
    {
        $dump = [
            'format' => DataFormat::getName($entry->getFormat()),
            'components' => $entry->getComponents(),
            'bytesHash' => hash('sha256', $entry->toBytes()),
            'text' => $entry->toString(),
        ];
        return array_merge($this->dumpElement($entry, $context), $dump);
    }

    public function dumpBlock(BlockBase $block, array $context = []): array
    {
        $attributes = [];
        if ($block->getAttribute('name') !== '') {
            $attributes['name'] = $block->getAttribute('name');
        }
        if ($block->getAttribute('id') !== '') {
            $attributes['id'] = $block->getAttribute('id');
        }
        $dump = array_merge($this->dumpElement($block, $context), $attributes, ['collection' => $block->getCollection()->getPropertyValue('id')]);
        foreach ($block->getMultipleElements("*") as $sub_element) {
            $dump['elements'][] = $sub_element->asArray($this, $context);
        }
        return $dump;
    }
}
