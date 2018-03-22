<?php

namespace ExifEye\Test\core;

use \lsolesen\pel\PelEntrySLong;

class NumberSLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new PelEntrySLong(42);
        $this->min = -2147483648;
        $this->max = 2147483647;
    }
}
