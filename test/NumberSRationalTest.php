<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\SignedRational;
use lsolesen\pel\PelOverflowException;

class NumberSRationalTest extends NumberTestCase
{
    public function testOverflow()
    {
        $entry = new SignedRational(42, [-1, 2]);
        $this->assertEquals($entry->getValue(), [-1, 2]);

        $caught = false;
        try {
            $entry->setValue([-10, -20], [-1, -2147483649]);
        } catch (PelOverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertEquals($entry->getValue(), [-1, 2]);

        $caught = false;
        try {
            $entry->setValue([3, 4], [1, 2147483648]);
        } catch (PelOverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertEquals($entry->getValue(), [-1, 2]);

        $caught = false;
        try {
            $entry->setValue([3, 4], [4294967296, 1]);
        } catch (PelOverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertEquals($entry->getValue(), [-1, 2]);
    }

    public function testReturnValues()
    {
        $entry = new SignedRational(42);
        $this->assertEquals($entry->getValue(), []);

        $entry->setValue([-1, 2], [3, 4], [5, -6]);
        $this->assertEquals($entry->getValue(), [[-1, 2], [3, 4], [5, -6]]);
        $this->assertEquals($entry->getText(), '-1/2, 3/4, -5/6');

        $entry->setValue([-7, -8]);
        $this->assertEquals($entry->getValue(), [-7, -8]);
        $this->assertEquals($entry->getText(), '7/8');

        $entry->setValue([0, 2147483647]);
        $this->assertEquals($entry->getValue(), [0, 2147483647]);
        $this->assertEquals($entry->getText(), '0/2147483647');
    }
}
