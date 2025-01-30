<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberLongTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Long($this->mockParentElement, $this->mockDataElement);
        $this->min = 0;
        $this->max = 4294967295;
    }

    protected function convertValueToBytes(int|float|array $value): string
    {
        assert(is_int($value));
        return ConvertBytes::fromLong($value);
    }
}
