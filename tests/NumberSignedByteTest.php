<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedByte;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new SignedByte($this->mockParentElement, $this->mockDataElement);
        $this->min = -128;
        $this->max = 127;
    }

    protected function convertValueToBytes(int $value): string
    {
        return ConvertBytes::fromSignedByte($value);
    }
}
