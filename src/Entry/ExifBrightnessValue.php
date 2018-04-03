<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Entry\Core\SignedRational;

/**
 * Decode text for an Exif/BrightnessValue tag.
 */
class ExifBrightnessValue extends SignedRational
{
    /**
     * {@inheritdoc}
     */
    public function toString($short = false)
    {
        // TODO: figure out the APEX thing, or remove this so that it is
        // handled by the default code.
        return sprintf('%d/%d', $this->getValue()[0], $this->getValue()[1]);
        // FIXME: How do I calculate the APEX value?
    }
}
