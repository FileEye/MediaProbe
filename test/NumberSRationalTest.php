<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Entry\Core\SignedRational;
use FileEye\ImageInfo\core\Entry\Exception\OverflowException;

class NumberSignedRationalTest extends NumberTestCase
{
    public function testOverflow()
    {
        $entry = new SignedRational($this->mockParentElement, [[-1, 2]]);
        $this->assertTrue($entry->isValid());
        $this->assertEquals([-1, 2], $entry->getValue());

        $entry->setValue([[-10, -20], [-1, -2147483649]]);
        $this->assertFalse($entry->isValid());
        $this->assertEquals([[-10, -20], [-1, 0]], $entry->getValue());

        $entry->setValue([[3, 4], [1, 2147483648]]);
        $this->assertFalse($entry->isValid());
        $this->assertEquals([[3, 4], [1, 0]], $entry->getValue());

        $entry->setValue([[3, 4], [4294967296, 1]]);
        $this->assertFalse($entry->isValid());
        $this->assertEquals([[3, 4], [0, 1]], $entry->getValue());

        $entry->setValue([[3, 4], [0, 2147483647]]);
        $this->assertTrue($entry->isValid());
        $this->assertEquals([[3, 4], [0, 2147483647]], $entry->getValue());
    }

    public function testReturnValues()
    {
        $entry = new SignedRational($this->mockParentElement);

        $entry->setValue([]);
        $this->assertEquals($entry->getValue(), []);
        $this->assertEquals($entry->toString(), '');

        $entry->setValue([[-1, 2], [3, 4], [5, -6]]);
        $this->assertEquals($entry->getValue(), [[-1, 2], [3, 4], [5, -6]]);
        $this->assertEquals($entry->toString(), '-1/2, 3/4, -5/6');

        $entry->setValue([[-7, -8]]);
        $this->assertEquals($entry->getValue(), [-7, -8]);
        $this->assertEquals($entry->toString(), '7/8');

        $entry->setValue([[0, 2147483647]]);
        $this->assertEquals($entry->getValue(), [0, 2147483647]);
        $this->assertEquals($entry->toString(), '0/2147483647');
    }
}
