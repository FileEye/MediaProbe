<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\SignedLong;

class NumberSLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new SignedLong([]);
        $this->min = -2147483648;
        $this->max = 2147483647;
    }
}
