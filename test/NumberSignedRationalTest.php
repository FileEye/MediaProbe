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
        $this->assertSame([-1, 2], $entry->getValue(['format' => 'parsed']));
        $this->assertSame(-0.5, $entry->getValue());

        $entry->setValue([[-10, -20], [-1, -2147483649]]);
        $this->assertFalse($entry->isParsed());
        $this->assertSame([[-10, -20], [-1, 0]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.5, 0], $entry->getValue());

        $entry->setValue([[3, 4], [1, 2147483648]]);
        $this->assertFalse($entry->isParsed());
        $this->assertSame([[3, 4], [1, 0]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $entry->getValue());

        $entry->setValue([[3, 4], [4294967296, 1]]);
        $this->assertFalse($entry->isParsed());
        $this->assertSame([[3, 4], [0, 1]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $entry->getValue());

        $entry->setValue([[3, 4], [0, 2147483647]]);
        $this->assertTrue($entry->isParsed());
        $this->assertSame([[3, 4], [0, 2147483647]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $entry->getValue());
    }

    public function testReturnValues()
    {
        $entry = new SignedRational($this->mockParentElement);

        $entry->setValue([]);
        $this->assertNull($entry->getValue(['format' => 'parsed']));
        $this->assertNull($entry->getValue());
        $this->assertSame('', $entry->toString());

        $entry->setValue([[-1, 2], [3, 4], [5, -6]]);
        $this->assertSame([[-1, 2], [3, 4], [5, -6]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([-0.5, 0.75, 5 / -6], $entry->getValue());
        $this->assertSame('-0.5 0.75 ' . (string) (5 / -6), $entry->toString());

        $entry->setValue([[-7, -8]]);
        $this->assertSame([-7, -8], $entry->getValue(['format' => 'parsed']));
        $this->assertSame(-7 / -8, $entry->getValue());
        $this->assertSame((string) (-7 / -8), $entry->toString());

        $entry->setValue([[0, 2147483647]]);
        $this->assertSame([0, 2147483647], $entry->getValue(['format' => 'parsed']));
        $this->assertSame(0, $entry->getValue());
        $this->assertSame('0', $entry->toString());
    }
}
