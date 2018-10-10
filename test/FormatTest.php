<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Spec;

class FormatTest extends ExifEyeTestCaseBase
{
    public function testGetName()
    {
        $this->assertEquals('Ascii', Spec::getFormatName(2));
        $this->assertEquals('Float', Spec::getFormatName(11));
        $this->assertEquals('Undefined', Spec::getFormatName(7));
        $this->assertNull(Spec::getFormatName(100));
    }

    public function testGetIdFromName()
    {
        $this->assertEquals(2, Spec::getFormatIdFromName('Ascii'));
        $this->assertEquals(11, Spec::getFormatIdFromName('Float'));
        $this->assertEquals(7, Spec::getFormatIdFromName('Undefined'));
        $this->assertNull(Spec::getFormatIdFromName('UnexistingFormat'));
    }

    public function testGetSize()
    {
        $this->assertEquals(1, Spec::getFormatSize(Spec::getFormatIdFromName('Ascii')));
        $this->assertEquals(4, Spec::getFormatSize(Spec::getFormatIdFromName('Float')));
        $this->assertEquals(1, Spec::getFormatSize(Spec::getFormatIdFromName('Undefined')));
        $this->assertNull(Spec::getFormatSize(100));
    }
}
