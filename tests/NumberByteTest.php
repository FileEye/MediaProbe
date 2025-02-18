<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberByteTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Byte($this->mockParentElement, $this->mockDataElement);
        $this->min = '0';
        $this->max = '255';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_int($value) || is_string($value));
        return ConvertBytes::fromByte((int) $value);
    }
}
