<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\MediaProbe;

/**
 * Handler for Color Filter Array (CFA) pattern tags.
 *
 * Indicates the color filter array (CFA) geometric pattern of the image sensor
 * when a one-chip color area sensor is used. It does not apply to all sensing
 * methods.
 *
 * @see https://www.exif.org/Exif2-2.PDF
 * @see https://www.awaresystems.be/imaging/tiff/tifftags/privateifd/exif/cfapattern.html
 */
class ExifCFAPattern extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            // @todo xxx improve, two shorts initially
            $ret = [$this->value[1], $this->value[3]];
            for ($i = 4; $i < $this->getComponents(); $i++) {
                $ret[] = $this->value[$i];
            }
            return $ret;
        }
        return parent::getValue($options);
    }
}
