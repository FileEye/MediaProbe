<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Entry\Core\Short;

/**
 * Handler for Canon Camera ISO tags.
 */
class FocalLength extends Short
{
    public function getValue(array $options = []): mixed
    {
        // Get the Focal Units.
        $tag = $this->getRootElement()->getElement("//makerNote[@name='Canon']//tag[@name='FocalUnits']");
        if (!$tag) {
            $denominator = 1;
        } else {
            assert($tag instanceof Tag);
            $denominator = $tag->getValue() ?: 1;
        }

        return parent::getValue() / $denominator;
    }
}
