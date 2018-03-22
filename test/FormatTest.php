<?php

namespace ExifEye\Test\core;

use PHPUnit\Framework\TestCase;
use lsolesen\pel\Pel;
use ExifEye\core\Format;

class FormatTest extends TestCase
{

    public function testNames()
    {
        $format = new Format();
        $this->assertEquals($format::getName(Format::ASCII), 'Ascii');
        $this->assertEquals($format::getName(Format::FLOAT), 'Float');
        $this->assertEquals($format::getName(Format::UNDEFINED), 'Undefined');
        $this->assertEquals($format::getName(100), Pel::fmt('Unknown format: 0x%X', 100));
    }

    public function testDescriptions()
    {
        $format = new Format();
        $this->assertEquals($format::getSize(Format::ASCII), 1);
        $this->assertEquals($format::getSize(Format::FLOAT), 4);
        $this->assertEquals($format::getSize(Format::UNDEFINED), 1);
        $this->assertEquals($format::getSize(100), Pel::fmt('Unknown format: 0x%X', 100));
    }
}
