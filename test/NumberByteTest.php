<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Byte;

class NumberByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new Byte([]);
        $this->min = 0;
        $this->max = 255;
    }
}
