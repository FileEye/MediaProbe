<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Byte($this->mockParentElement, $this->mockDataElement);
        $this->min = 0;
        $this->max = 255;
    }

    protected function convertValueToBytes(int|float|array $value): string
    {
        assert(is_int($value));
        return ConvertBytes::fromByte($value);
    }
}
