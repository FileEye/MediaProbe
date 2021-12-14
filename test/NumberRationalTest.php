<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\Entry\Exception\OverflowException;

class NumberRationalTest extends NumberTestCase
{
    public function testOverflow()
    {
        $entry = new Rational($this->mockParentElement, [[1, 2]]);
        $this->assertTrue($entry->isParsed());
        $this->assertSame([1, 2], $entry->getValue(['format' => 'parsed']));
        $this->assertSame(0.5, $entry->getValue());

        $entry->setValue([[3, 4], [-1, 2], [7, 8]]);
        $this->assertFalse($entry->isParsed());
        $this->assertSame([[3, 4], [0, 2], [7, 8]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0, 7 / 8], $entry->getValue());

        $entry->setValue([[3, 4], [1, 4294967296]]);
        $this->assertFalse($entry->isParsed());
        $this->assertSame([[3, 4], [1, 0]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $entry->getValue());

        $entry->setValue([[3, 4], [4294967296, 1]]);
        $this->assertFalse($entry->isParsed());
        $this->assertSame([[3, 4], [0, 1]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $entry->getValue());

        $entry->setValue([[3, 4], [0, 4294967295]]);
        $this->assertTrue($entry->isParsed());
        $this->assertSame([[3, 4], [0, 4294967295]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $entry->getValue());
    }

    public function testReturnValues()
    {
        $entry = new Rational($this->mockParentElement);

        $entry->setValue([]);
        $this->assertNull($entry->getValue(['format' => 'parsed']));
        $this->assertNull($entry->getValue());
        $this->assertSame('', $entry->toString());

        $entry->setValue([[1, 2], [3, 4], [5, 6]]);
        $this->assertSame([[1, 2], [3, 4], [5, 6]], $entry->getValue(['format' => 'parsed']));
        $this->assertSame([0.5, 0.75, 5 / 6], $entry->getValue());
        $this->assertSame('0.5 0.75 ' . (string) (5 / 6), $entry->toString());

        $entry->setValue([[7, 8]]);
        $this->assertSame([7, 8], $entry->getValue(['format' => 'parsed']));
        $this->assertSame(7 / 8, $entry->getValue());
        $this->assertSame((string) (7 / 8), $entry->toString());

        $entry->setValue([[0, 4294967295]]);
        $this->assertSame([0, 4294967295], $entry->getValue(['format' => 'parsed']));
        $this->assertSame(0, $entry->getValue());
        $this->assertSame('0', $entry->toString());
    }
}
