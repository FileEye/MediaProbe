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
        $text_config = $this->getParentElement()->getCollection()->getPropertyValue('text');
        $value = $this->getValue();
        $v = '';
        for ($i = 0; $i < 4; $i ++) {
            $z = ord($value[$i]);
            $v .= $text_config['mapping'][$z] ?? MediaProbe::tra('reserved');
            if ($i < 3) {
                $v .= ' ';
            }
        }
        return $v;
    }
}
