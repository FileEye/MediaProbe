<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedLong($this->mockParentElement, $this->mockDataElement);
        $this->min = -2147483648;
        $this->max = 2147483647;
    }

    protected function convertValueToBytes(int $value): string
    {
        return ConvertBytes::fromSignedLong($value);
    }
}
