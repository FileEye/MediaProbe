<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\Short;
use FileEye\ImageInfo\core\ImageInfo;

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
                return ImageInfo::fmt('(x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1]);
            case 3:
                return ImageInfo::fmt('Within distance %d of (x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1], $this->getValue()[2]);
            case 4:
                return ImageInfo::fmt('Within rectangle (width %d, height %d) around (x,y) = (%d,%d)', $this->getValue()[0], $this->getValue()[1], $this->getValue()[2], $this->getValue()[3]);
            default:
                return ImageInfo::fmt('Unexpected number of components (%d, expected 2, 3, or 4).', $this->getComponents());
        }
    }
}
