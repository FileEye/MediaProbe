<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Model\ElementInterface;

/**
 * Handler for CanonCustom AFPointDisplayDuringFocus tags.
 */
class AFPointDisplayDuringFocus extends SignedLong
{
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
    {
        // Gets the Model from IFD0.
        $modelTag = $context->getElement("//ifd[@name='IFD0']/tag[@name='Model']");
        assert($modelTag instanceof Tag);
        $model = $modelTag->getValue();

        if (preg_match('/\b1D\b/', $model) === 1) {
            // 1D models.
            return 0;
        }
        // Other models.
        return 1;
    }
}
