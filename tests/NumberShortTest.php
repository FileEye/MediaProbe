<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Short($this->mockParentElement, $this->mockDataElement);
        $this->min = 0;
        $this->max = 65535;
    }

    protected function convertValueToBytes(int $value): string
    {
        return ConvertBytes::fromShort($value);
    }
}
