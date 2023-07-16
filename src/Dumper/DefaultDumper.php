<?php declare(strict_types=1);

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
    public function dumpElement(ElementInterface $element): array
    {
        return [
            'node' => $element->getNodeName(),
            'path' => $element->getContextPath(),
            'class' => get_class($element),
            'valid' => $element->isValid(),
        ];
    }

    public function dumpEntry(EntryInterface $entry): array
    {
        $dump = [
            'format' => DataFormat::getName($entry->getFormat()),
            'components' => $entry->getComponents(),
            'bytesHash' => hash('sha256', $entry->toBytes()),
            'text' => $entry->toString(),
        ];
        return array_merge($this->dumpElement($entry), $dump);
    }

    public function dumpBlock(BlockBase $block): array
    {
        $attributes = [];
        if ($block->getAttribute('name') !== '') {
            $attributes['name'] = $block->getAttribute('name');
        }
        if ($block->getAttribute('id') !== '') {
            $attributes['id'] = $block->getAttribute('id');
        }
        $dump = array_merge($this->dumpElement($block), $attributes, ['collection' => $block->getCollection()->getPropertyValue('id')]);
        // xx todo restore $dump = array_merge(parent::asArray(), $block->getAttributes(), ['collection' => $block->getCollection()->getPropertyValue('id')]);
        foreach ($block->getMultipleElements("*") as $sub_element) {
            $dump['elements'][] = $sub_element->asArray($this);
        }
        return $dump;
    }
}
