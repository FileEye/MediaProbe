<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif\Functions2;

use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Model\ElementInterface;

/**
 * Handler for CanonCustom FocusingScreen tags.
 */
class FocusingScreen extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public static function resolveItemCollectionIndex(?int $components_count, ElementInterface $context): mixed
    {
        // Gets the Model from IFD0.
        $model = $context->getElement("//ifd[@name='IFD0']/tag[@name='Model']/entry")->getValue();

        if (preg_match('/\b(40D|50D|60D)\b/', $model) === 1) {
            // 40D, 50D and 60D.
            return 0;
        } elseif (preg_match('/\b5D Mark II\b/', $model) === 1) {
            // 5D Mark II.
            return 1;
        } elseif (preg_match('/\b6D\b/', $model) === 1) {
            // 6D.
            return 2;
        } elseif (preg_match('/\b7D Mark II\b/', $model) === 1) {
            // 7D Mark II.
            return 3;
        } elseif (preg_match('/\b1D X\b/', $model) === 1) {
            // 1DX.
            return 4;
        } else {
            // 1DmkIII, 1DSmkIII and 1DmkIV.
            return 5;
        }
    }
}
