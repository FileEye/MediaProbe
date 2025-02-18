<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedLongTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedLong($this->mockParentElement, $this->mockDataElement);
        $this->min = '-2147483648';
        $this->max = '2147483647';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_int($value) || is_string($value));
        return ConvertBytes::fromSignedLong((int) $value);
    }
}
