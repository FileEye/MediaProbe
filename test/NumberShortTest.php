<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Short;

class NumberShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new Short([]);
        $this->min = 0;
        $this->max = 65535;
    }
}
