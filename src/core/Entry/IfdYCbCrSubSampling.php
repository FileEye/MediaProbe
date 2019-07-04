<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Entry\Core\Short;

/**
 * Decode text for a IFD0/YCbCrSubSampling tag.
 */
class IfdYCbCrSubSampling extends Short
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        if ($this->getValue()[0] == 2 && $this->getValue()[1] == 1) {
            return 'YCbCr4:2:2';
        }
        if ($this->getValue()[0] == 2 && $this->getValue()[1] == 2) {
            return 'YCbCr4:2:0';
        }
        return $this->getValue()[0] . ', ' . $this->getValue()[1];
    }
}
