<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\SignedShort;

class NumberSShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new SignedShort(42);
        $this->min = -32768;
        $this->max = 32767;
    }
}
