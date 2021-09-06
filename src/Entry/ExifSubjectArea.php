<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\MediaProbe;

/**
 * Decode text for an Exif/SubjectArea tag.
 */
class ExifSubjectArea extends Short
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $val = $this->getValue();
        if (($options['format'] ?? null) === 'exiftool') {
            return implode(' ', $val);
        } else {
            switch ($this->getComponents()) {
                case 2:
                    return MediaProbe::fmt('(x,y) = (%d,%d)', $val[0], $val[1]);
                case 3:
                    return MediaProbe::fmt('Within distance %d of (x,y) = (%d,%d)', $val[0], $val[1], $val[2]);
                case 4:
                    return MediaProbe::fmt('Within rectangle (width %d, height %d) around (x,y) = (%d,%d)', $val[0], $val[1], $val[2], $val[3]);
                default:
                    return MediaProbe::fmt('Unexpected number of components (%d, expected 2, 3, or 4).', $this->getComponents());
            }
        }
    }
}
