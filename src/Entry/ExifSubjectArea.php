<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Short;

/**
 * Decode text for an Exif/SubjectArea tag.
 */
class ExifSubjectArea extends Short
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        switch ($this->getComponents()) {
            case 2:
                return ExifEye::fmt('(x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1]);
            case 3:
                return ExifEye::fmt('Within distance %d of (x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1], $this->getValue()[2]);
            case 4:
                return ExifEye::fmt('Within rectangle (width %d, height %d) around (x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1], $this->getValue()[2], $this->getValue()[3]);
            default:
                return ExifEye::fmt('Unexpected number of components (%d, expected 2, 3, or 4).', $this->getComponents());
        }
    }
}
