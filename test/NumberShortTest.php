<?php

namespace ExifEye\Test\core;

use \lsolesen\pel\PelEntryShort;

class NumberShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new PelEntryShort(42);
        $this->min = 0;
        $this->max = 65535;
    }
}
