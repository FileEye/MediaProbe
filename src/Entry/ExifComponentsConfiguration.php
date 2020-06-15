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
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $v = '';
            for ($i = 0; $i < 4; $i ++) {
                $v .= ord($this->value[$i]);
                if ($i < 3) {
                    $v .= ' ';
                }
            }
            return $v;
        }
        return parent::getValue($options);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $format = $options['format'] ?? null;
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
