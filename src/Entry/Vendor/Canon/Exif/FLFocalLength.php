<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbeException;

/**
 * Handler for Canon Focal Length tags.
 */
class FLFocalLength extends Short
{
    public function getValue(array $options = []): mixed
    {
        $alternate = $this->getRootElement()->getElement("//ifd[@name='ExifIFD']/tag[@name='FocalLength']");
        if ($alternate) {
            assert($alternate instanceof Tag);
            $value = $alternate->getValue(['format' => 'parsed']);
            return $value[0] / $value[1];
        }

        $focal_units = $this->getRootElement()->getElement("//makerNote[@name='Canon']//tag[@name='FocalUnits']");
        if (!$focal_units) {
            $denominator = 1;
        } else {
            assert($focal_units instanceof Tag);
            $denominator = $focal_units->getValue();
        }

        return throw new MediaProbeException('Invalid data');
    }

    public function toString(array $options = []): string
    {
        return $this->getValue() . ' mm';
    }
}
