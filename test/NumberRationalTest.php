<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Rational;
use ExifEye\core\Entry\Exception\OverflowException;

class NumberRationalTest extends NumberTestCase
{
    public function testOverflow()
    {
        $entry = new Rational([[1, 2]]);
        $this->assertTrue($this->num->isValid());
        $this->assertEquals([1, 2], $entry->getValue());

        $entry->setValue([[3, 4], [-1, 2], [7, 8]]);
        $this->assertFalse($this->num->isValid());
        $this->assertEquals([[3, 4], [0, 2], [7, 8]], $entry->getValue());

        $entry->setValue([[3, 4], [1, 4294967296]]);
        $this->assertFalse($this->num->isValid());
        $this->assertEquals([[3, 4], [1, 0]], $entry->getValue());

        $entry->setValue([[3, 4], [4294967296, 1]]);
        $this->assertFalse($this->num->isValid());
        $this->assertEquals([[3, 4], [0, 1]], $entry->getValue());

        $entry->setValue([[3, 4], [0, 4294967295]]);
        $this->assertTrue($this->num->isValid());
        $this->assertEquals([[3, 4], [0, 4294967295]], $entry->getValue());
    }

    public function testReturnValues()
    {
        $entry = new Rational([]);
        $this->assertEquals($entry->getValue(), []);
        $this->assertEquals($entry->toString(), '');

        $entry->setValue([[1, 2], [3, 4], [5, 6]]);
        $this->assertEquals($entry->getValue(), [[1, 2], [3, 4], [5, 6]]);
        $this->assertEquals($entry->toString(), '1/2, 3/4, 5/6');

        $entry->setValue([[7, 8]]);
        $this->assertEquals($entry->getValue(), [7, 8]);
        $this->assertEquals($entry->toString(), '7/8');

        $entry->setValue([[0, 4294967295]]);
        $this->assertEquals($entry->getValue(), [0, 4294967295]);
        $this->assertEquals($entry->toString(), '0/4294967295');
    }
}
