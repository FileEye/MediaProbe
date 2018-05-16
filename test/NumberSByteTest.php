<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\SignedByte;

class NumberSignedByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new SignedByte($this->mockParentElement, []);
        $this->min = -128;
        $this->max = 127;
    }
}
