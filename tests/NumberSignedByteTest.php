<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedByte;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedByte($this->mockParentElement, $this->mockDataElement);
        $this->min = -128;
        $this->max = 127;
    }

    protected function convertValueToBytes(int|float|array $value): string
    {
        assert(is_int($value));
        return ConvertBytes::fromSignedByte($value);
    }
}
