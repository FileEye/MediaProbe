<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Collection;

class FormatTest extends ExifEyeTestCaseBase
{
    public function testGetName()
    {
        $this->assertEquals('Ascii', Collection::getFormatName(2));
        $this->assertEquals('Float', Collection::getFormatName(11));
        $this->assertEquals('Undefined', Collection::getFormatName(7));
        $this->assertNull(Collection::getFormatName(100));
    }

    public function testGetIdFromName()
    {
        $this->assertEquals(2, Collection::getFormatIdFromName('Ascii'));
        $this->assertEquals(11, Collection::getFormatIdFromName('Float'));
        $this->assertEquals(7, Collection::getFormatIdFromName('Undefined'));
        $this->assertNull(Collection::getFormatIdFromName('UnexistingFormat'));
    }

    public function testGetSize()
    {
        $this->assertEquals(1, Collection::getFormatSize(Collection::getFormatIdFromName('Ascii')));
        $this->assertEquals(4, Collection::getFormatSize(Collection::getFormatIdFromName('Float')));
        $this->assertEquals(1, Collection::getFormatSize(Collection::getFormatIdFromName('Undefined')));
        $this->assertNull(Collection::getFormatSize(100));
    }
}
