<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom AEBShotCount tags.
 */
class AEBShotCount extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
    {
        switch ($components_count) {
            case 1:
                return 0;

            case 2:
                return 1;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $val = $this->getValue($options);
        return $this->getMappedText(is_array($val) ? implode(' ', $val) : $val);
    }
}
