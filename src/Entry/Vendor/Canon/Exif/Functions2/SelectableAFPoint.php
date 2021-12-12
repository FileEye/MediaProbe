<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom SelectableAFPoint tags.
 */
class SelectableAFPoint extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context)
    {
        // Gets the Model from IFD0.
        $model = $context->getElement("//ifd[@name='IFD0']/tag[@name='Model']/entry")->getValue();

        if (preg_match('/\b1D Mark IV\b/', $model) === 1) {
            // 1D Mark IV.
            return 0;
        }
        // Other models.
        return 1;
    }
}
