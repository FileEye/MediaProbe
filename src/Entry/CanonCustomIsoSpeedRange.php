<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\SignedLong;

/**
 * Handler for CanonCustom tags representing ISO speed range.
 */
class CanonCustomIsoSpeedRange extends SignedLong
{
    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $v = [];
            $v[0] = $this->value[0];
            $v[1] = $this->value[1] < 2 ? $this->value[1] : ($this->value[1] < 1000 ? exp(($this->value[1] / 8 - 9) * log(2)) * 100 : 0);
            $v[2] = $this->value[2] < 2 ? $this->value[2] : ($this->value[2] < 1000 ? exp(($this->value[2] / 8 - 9) * log(2)) * 100 : 0);
//                # this may also be set to "H" (Hi6400) -- is this the -1 value I see? - PH
//                '$val < 2 ? $val : ($val < 1000 ? exp(($val/8-9)*log(2))*100 : 0)', # (educated guess)
//                # this may also be set to "L" (Lo50) -- is this the 1 value I see? - PH
//                '$val < 2 ? $val : ($val < 1000 ? exp(($val/8-9)*log(2))*100 : 0)', # (educated guess)
            return implode(' ', $v);
        }
        return parent::getValue();
    }
}
