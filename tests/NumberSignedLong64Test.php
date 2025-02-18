<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedLong64;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedLong64Test extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedLong64($this->mockParentElement, $this->mockDataElement);
        $this->min = '-9223372036854775808';
        $this->max = '9223372036854775807';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_string($value) || is_int($value));
        return ConvertBytes::fromSignedLong64((string) $value);
    }
}
