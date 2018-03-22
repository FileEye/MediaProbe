<?php

namespace ExifEye\Test\core;

use \lsolesen\pel\PelEntryLong;

class NumberLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new PelEntryLong(42);
        $this->min = 0;
        $this->max = 4294967295;
    }
}
