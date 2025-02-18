<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Long64;
use FileEye\MediaProbe\Utility\ConvertBytes;
use PHPUnit\Framework\Attributes\RequiresPhpExtension;

#[RequiresPhpExtension('bcmath')]
class NumberLong64Test extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Long64($this->mockParentElement, $this->mockDataElement);
        $this->min = '0';
        $this->max = '18446744073709551615';
    }

    protected function convertValueToBytes(int|string|array $value): string
    {
        assert(is_string($value) || is_int($value));
        return ConvertBytes::fromLong64((string) $value);
    }
}
