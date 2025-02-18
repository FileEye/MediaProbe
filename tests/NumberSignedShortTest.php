<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedShortTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedShort($this->mockParentElement, $this->mockDataElement);
        $this->min = '-32768';
        $this->max = '32767';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_int($value) || is_string($value));
        return ConvertBytes::fromSignedShort((int) $value);
    }
}
