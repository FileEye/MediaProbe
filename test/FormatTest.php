<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Format;

class FormatTest extends ExifEyeTestCaseBase
{
    public function testGetName()
    {
        $this->assertEquals('Ascii', Format::getName(Format::ASCII));
        $this->assertEquals('Float', Format::getName(Format::FLOAT));
        $this->assertEquals('Undefined', Format::getName(Format::UNDEFINED));
        $this->assertNull(Format::getName(100));
    }

    public function testGetIdFromName()
    {
        $this->assertEquals(Format::ASCII, Format::getIdFromName('Ascii'));
        $this->assertEquals(Format::FLOAT, Format::getIdFromName('Float'));
        $this->assertEquals(Format::UNDEFINED, Format::getIdFromName('Undefined'));
        $this->assertNull(Format::getIdFromName('UnexistingFormat'));
    }

    public function testGetSize()
    {
        $this->assertEquals(1, Format::getSize(Format::ASCII));
        $this->assertEquals(4, Format::getSize(Format::FLOAT));
        $this->assertEquals(1, Format::getSize(Format::UNDEFINED));
        $this->assertNull(Format::getSize(100));
    }
}
