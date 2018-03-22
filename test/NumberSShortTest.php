<?php

namespace ExifEye\Test\core;

use \lsolesen\pel\PelEntrySShort;

class NumberSShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new PelEntrySShort(42);
        $this->min = -32768;
        $this->max = 32767;
    }
}
