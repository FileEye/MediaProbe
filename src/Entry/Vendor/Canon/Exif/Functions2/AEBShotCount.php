<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Model\ElementInterface;

/**
 * Handler for CanonCustom AEBShotCount tags.
 */
class AEBShotCount extends SignedLong
{
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
    {
        return match ($components_count) {
            1 => 1,
            2 => 2,
        };
    }

    public function toString(array $options = []): string
    {
        $val = $this->getValue($options);
        return $this->getMappedText(is_array($val) ? implode(' ', $val) : $val) ?? '';
    }
}
