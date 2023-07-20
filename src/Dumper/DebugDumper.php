<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Dumper;

use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Model\EntryInterface;

/**
 * The element debug dumper visitor.
 */
class DebugDumper implements DumperInterface
{
    public function dumpElement(ElementInterface $element, array $context = []): array
    {
        return [];
    }

    public function dumpEntry(EntryInterface $entry, array $context = []): array
    {
        return [];
    }

    public function dumpBlock(BlockBase $block, array $context = []): array
    {
        return $block->collectInfo($context);
    }
}
