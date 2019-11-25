<?php

namespace FileEye\ImageProbe\core\Entry;

use FileEye\ImageProbe\core\Entry\Core\Undefined;

/**
 * Decode text for an Exif/SceneType tag.
 */
class ExifSceneType extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
    {
        $value = $this->getValue();
        switch (ord($value[0])) {
            case 0x01:
                return 'Directly photographed';
            default:
                return sprintf('0x%02X', ord($value[0]));
        }
    }
}
