<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberLongTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Long($this->mockParentElement, $this->mockDataElement);
        $this->min = '0';
        $this->max = '4294967295';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_int($value) || is_string($value));
        return ConvertBytes::fromLong((int) $value);
    }
}
