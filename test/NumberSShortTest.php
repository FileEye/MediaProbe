<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\SignedShort;

class NumberSignedShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->num = new SignedShort($this->mockParentElement, []);
        $this->min = -32768;
        $this->max = 32767;
    }
}
