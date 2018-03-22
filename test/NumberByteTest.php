<?php

namespace ExifEye\Test\core;

use \lsolesen\pel\PelEntryByte;

class NumberByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new PelEntryByte(42);
        $this->min = 0;
        $this->max = 255;
    }
}
