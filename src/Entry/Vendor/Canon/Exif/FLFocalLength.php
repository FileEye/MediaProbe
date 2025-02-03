<?php

namespace FileEye\MediaProbe\Entry\Vendor\Canon\Exif;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbeException;

/**
 * Handler for Canon Focal Length tags.
 */
class FLFocalLength extends Short
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        if ($alternate = $this->getRootElement()->getElement("//ifd[@name='ExifIFD']/tag[@name='FocalLength']/entry")) {
            $value = $alternate->getValue(['format' => 'parsed']);
            return $value[0] / $value[1];
        }

        if (!$focal_units = $this->getRootElement()->getElement("//makerNote[@name='Canon']//tag[@name='FocalUnits']/entry")) {
            $denominator = 1;
        } else {
            $denominator = $focal_units->getValue();
        }

        return throw new MediaProbeException('Invalid data');
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue() . ' mm';
    }
}
