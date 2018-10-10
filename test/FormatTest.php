<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Format;

class FormatTest extends ExifEyeTestCaseBase
{
    public function testGetName()
    {
        $this->assertEquals('Ascii', Format::getName(2));
        $this->assertEquals('Float', Format::getName(11));
        $this->assertEquals('Undefined', Format::getName(7));
        $this->assertNull(Format::getName(100));
    }

    public function testGetIdFromName()
    {
        $this->assertEquals(2, Format::getIdFromName('Ascii'));
        $this->assertEquals(11, Format::getIdFromName('Float'));
        $this->assertEquals(7, Format::getIdFromName('Undefined'));
        $this->assertNull(Format::getIdFromName('UnexistingFormat'));
    }

    public function testGetSize()
    {
        $this->assertEquals(1, Format::getSize(Format::getIdFromName('Ascii')));
        $this->assertEquals(4, Format::getSize(Format::getIdFromName('Float')));
        $this->assertEquals(1, Format::getSize(Format::getIdFromName('Undefined')));
        $this->assertNull(Format::getSize(100));
    }
}
