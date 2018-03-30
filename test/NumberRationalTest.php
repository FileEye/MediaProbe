<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Rational;
use ExifEye\core\Entry\Exception\OverflowException;

class NumberRationalTest extends NumberTestCase
{
    public function testOverflow()
    {
        $entry = new Rational([[1, 2]]);
        $this->assertEquals($entry->getValue(), [1, 2]);

        $caught = false;
        try {
            $entry->setValue([[3, 4], [-1, 2], [7, 8]]);
        } catch (OverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertEquals($entry->getValue(), [1, 2]);

        $caught = false;
        try {
            $entry->setValue([[3, 4], [1, 4294967296]]);
        } catch (OverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertEquals($entry->getValue(), [1, 2]);

        $caught = false;
        try {
            $entry->setValue([[3, 4], [4294967296, 1]]);
        } catch (OverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertEquals($entry->getValue(), [1, 2]);
    }

    public function testReturnValues()
    {
        $entry = new Rational([]);
        $this->assertEquals($entry->getValue(), []);
        $this->assertEquals($entry->getText(), '');

        $entry->setValue([[1, 2], [3, 4], [5, 6]]);
        $this->assertEquals($entry->getValue(), [[1, 2], [3, 4], [5, 6]]);
        $this->assertEquals($entry->getText(), '1/2, 3/4, 5/6');

        $entry->setValue([[7, 8]]);
        $this->assertEquals($entry->getValue(), [7, 8]);
        $this->assertEquals($entry->getText(), '7/8');

        $entry->setValue([[0, 4294967295]]);
        $this->assertEquals($entry->getValue(), [0, 4294967295]);
        $this->assertEquals($entry->getText(), '0/4294967295');
    }
}
