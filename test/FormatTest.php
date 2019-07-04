<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Block\IfdFormat;
use FileEye\ImageInfo\core\ImageInfo;

class FormatTest extends ImageInfoTestCaseBase
{
    public function testGetName()
    {
        $this->assertEquals('Ascii', IfdFormat::getName(2));
        $this->assertEquals('Float', IfdFormat::getName(11));
        $this->assertEquals('Undefined', IfdFormat::getName(7));
        $this->assertNull(IfdFormat::getName(100));
    }

    public function testGetIdFromName()
    {
        $this->assertEquals(2, IfdFormat::getFromName('Ascii'));
        $this->assertEquals(11, IfdFormat::getFromName('Float'));
        $this->assertEquals(7, IfdFormat::getFromName('Undefined'));
        $this->assertNull(IfdFormat::getFromName('UnexistingFormat'));
    }

    public function testGetSize()
    {
        $this->assertEquals(1, IfdFormat::getSize(IfdFormat::getFromName('Ascii')));
        $this->assertEquals(4, IfdFormat::getSize(IfdFormat::getFromName('Float')));
        $this->assertEquals(1, IfdFormat::getSize(IfdFormat::getFromName('Undefined')));
        $this->assertNull(IfdFormat::getSize(100));
    }
}
