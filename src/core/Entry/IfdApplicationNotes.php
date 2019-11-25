<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Byte;

/**
 * Decode text for an Ifd/ApplicationNotes tag.
 */
class IfdApplicationNotes extends Byte
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $str = '';
        for ($i = 0; $i < $this->getComponents(); $i++) {
            $str .= chr($this->getValue()[$i]);
        }
        return $str;
    }
}
