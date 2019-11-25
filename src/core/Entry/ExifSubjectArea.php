<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Short;
use FileEye\ImageProbe\core\ImageProbe;

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
        switch ($this->getComponents()) {
            case 2:
                return ImageProbe::fmt('(x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1]);
            case 3:
                return ImageProbe::fmt('Within distance %d of (x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1], $this->getValue()[2]);
            case 4:
                return ImageProbe::fmt('Within rectangle (width %d, height %d) around (x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1], $this->getValue()[2], $this->getValue()[3]);
            default:
                return ImageProbe::fmt('Unexpected number of components (%d, expected 2, 3, or 4).', $this->getComponents());
        }
    }
}
