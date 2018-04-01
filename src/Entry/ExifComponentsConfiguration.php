<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\Undefined;

/**
 * Decode text for an Exif/ComponentsConfiguration tag.
 */
class ExifComponentsConfiguration extends Undefined
{
    /**
     * {@inheritdoc}
     */
    public function getText($short = false)
    {
        $value = $this->getValue();
        $v = '';
        for ($i = 0; $i < 4; $i ++) {
            switch (ord($value{$i})) {
                case 0:
                    $v .= '-';
                    break;
                case 1:
                    $v .= 'Y';
                    break;
                case 2:
                    $v .= 'Cb';
                    break;
                case 3:
                    $v .= 'Cr';
                    break;
                case 4:
                    $v .= 'R';
                    break;
                case 5:
                    $v .= 'G';
                    break;
                case 6:
                    $v .= 'B';
                    break;
                default:
                    $v .= 'reserved';
                    break;
            }
            if ($i < 3) {
                $v .= ' ';
            }
        }
        return $v;
    }
}
