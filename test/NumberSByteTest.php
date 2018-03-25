<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\SignedByte;

class NumberSByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new SignedByte(42);
        $this->min = -128;
        $this->max = 127;
    }
}
