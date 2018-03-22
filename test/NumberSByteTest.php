<?php

namespace ExifEye\Test\core;

use \lsolesen\pel\PelEntrySByte;

class NumberSByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new PelEntrySByte(42);
        $this->min = -128;
        $this->max = 127;
    }
}
