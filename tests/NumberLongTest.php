<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberLongTest extends NumberTestCase
{
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new Long($this->mockParentElement, $this->mockDataElement);
        $this->min = 0;
        $this->max = 4294967295;
    }

    protected function convertValueToBytes(int $value): string
    {
        return ConvertBytes::fromLong($value);
    }
}
