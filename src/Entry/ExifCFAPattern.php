<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Undefined;

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
    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            // Two shorts initially, then 4 bytes.
            $ret = [$this->dataElement->getByte(1), $this->dataElement->getByte(3)];
            for ($i = 4; $i < $this->getComponents(); $i++) {
                $ret[] = $this->dataElement->getByte($i);
            }
            return $ret;
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        if (($options['format'] ?? null) === 'exiftool') {
            $val = $this->getValue($options);
            // @todo xxx improve, two shorts initially
            array_shift($val);
            array_shift($val);
            return $this->resolveText(implode(' ', $val));
        }
        return parent::toString($options);
    }
}
