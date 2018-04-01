<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Long;

class NumberLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new Long([]);
        $this->min = 0;
        $this->max = 4294967295;
    }
}
