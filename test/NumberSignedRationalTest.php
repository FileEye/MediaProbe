<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedRational;
use FileEye\MediaProbe\Entry\Exception\OverflowException;

class NumberSignedRationalTest extends NumberTestCase
{
    public function testOverflow()
    {
        $entry = new SignedRational($this->mockParentElement, [[-1, 2]]);
        $this->assertTrue($entry->isParsed());
        $this->assertEquals([-1, 2], $entry->getValue());

        $entry->setValue([[-10, -20], [-1, -2147483649]]);
        $this->assertFalse($entry->isParsed());
        $this->assertEquals([[-10, -20], [-1, 0]], $entry->getValue());

        $entry->setValue([[3, 4], [1, 2147483648]]);
        $this->assertFalse($entry->isParsed());
        $this->assertEquals([[3, 4], [1, 0]], $entry->getValue());

        $entry->setValue([[3, 4], [4294967296, 1]]);
        $this->assertFalse($entry->isParsed());
        $this->assertEquals([[3, 4], [0, 1]], $entry->getValue());

        $entry->setValue([[3, 4], [0, 2147483647]]);
        $this->assertTrue($entry->isParsed());
        $this->assertEquals([[3, 4], [0, 2147483647]], $entry->getValue());
    }

    public function testReturnValues()
    {
        $entry = new SignedRational($this->mockParentElement);

        $entry->setValue([]);
        $this->assertEquals($entry->getValue(), []);
        $this->assertEquals($entry->toString(), '');

        $entry->setValue([[-1, 2], [3, 4], [5, -6]]);
        $this->assertEquals([[-1, 2], [3, 4], [5, -6]], $entry->getValue());
        $this->assertEquals('-0.5, 0.75, -0.83333333333333', $entry->toString());

        $entry->setValue([[-7, -8]]);
        $this->assertEquals($entry->getValue(), [-7, -8]);
        $this->assertEquals($entry->toString(), 7 / 8);

        $entry->setValue([[0, 2147483647]]);
        $this->assertEquals($entry->getValue(), [0, 2147483647]);
        $this->assertEquals($entry->toString(), 0);
    }
}
