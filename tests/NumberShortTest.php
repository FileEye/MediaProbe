<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberShortTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Short($this->mockParentElement, $this->mockDataElement);
        $this->min = '0';
        $this->max = '65535';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_int($value) || is_string($value));
        return ConvertBytes::fromShort((int) $value);
    }
}
