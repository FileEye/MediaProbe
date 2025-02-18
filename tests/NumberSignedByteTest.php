<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedByte;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedByteTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedByte($this->mockParentElement, $this->mockDataElement);
        $this->min = '-128';
        $this->max = '127';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_int($value) || is_string($value));
        return ConvertBytes::fromSignedByte((int) $value);
    }
}
