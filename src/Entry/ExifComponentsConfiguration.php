<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Decode text for an Exif/ComponentsConfiguration tag.
 */
class ExifComponentsConfiguration extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        $v = '';
        for ($i = 0; $i < 4; $i ++) {
            $z = ord($value[$i]);
            $v .= $this->getMappedText($z, $z) ?? MediaProbe::tra('reserved');
            if ($i < 3) {
                $v .= ' ';
            }
        }
        return $v;
    }
}
