<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\SignedLong;

class NumberSignedLongTest extends NumberTestCase
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
