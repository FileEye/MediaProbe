<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Model\ElementInterface;

/**
 * Handler for CanonCustom HighISONoiseReduction tags.
 */
class HighISONoiseReduction extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
    {
        // Gets the Model from IFD0.
        $model = $context->getElement("//ifd[@name='IFD0']/tag[@name='Model']/entry")->getValue();

        if (preg_match('/\b(50D|60D|5D Mark II|7D|500D|T1i|Kiss X3|550D|T2i|Kiss X4)\b/', $model) === 1 ||
            preg_match('/\b(600D|T3i|Kiss X5|1100D|T3|Kiss X50)\b/', $model) === 1
        ) {
            // 50D, 60D, 500D, 550D, 600D, 1100D, 5DmkII and 7D.
            return 0;
        }
        // Other models.
        return 1;
    }
}
