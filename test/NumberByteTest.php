<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Byte;

class NumberByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new Byte($this->mockParentElement, []);
        $this->min = 0;
        $this->max = 255;
    }
}
