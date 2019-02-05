<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Long;

class NumberLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new Long($this->mockParentElement, []);
        $this->min = 0;
        $this->max = 4294967295;
    }
}
