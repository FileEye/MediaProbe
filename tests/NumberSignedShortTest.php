<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedShort($this->mockParentElement, $this->mockDataElement);
        $this->min = -32768;
        $this->max = 32767;
    }

    protected function convertValueToBytes(int $value): string
    {
        return ConvertBytes::fromSignedShort($value);
    }
}
