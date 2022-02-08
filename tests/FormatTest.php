<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;

class FormatTest extends MediaProbeTestCaseBase
{
    public function testGetName()
    {
        $this->assertSame('Ascii', ItemFormat::getName(ItemFormat::ASCII));
        $this->assertSame('Float', ItemFormat::getName(ItemFormat::FLOAT));
        $this->assertSame('Undefined', ItemFormat::getName(ItemFormat::UNDEFINED));
        $this->expectException(MediaProbeException::class);
        $this->assertNull(ItemFormat::getName(100));
    }

    public function testGetIdFromName()
    {
        $this->assertSame(ItemFormat::ASCII, ItemFormat::getFromName('Ascii'));
        $this->assertSame(ItemFormat::FLOAT, ItemFormat::getFromName('Float'));
        $this->assertSame(ItemFormat::UNDEFINED, ItemFormat::getFromName('Undefined'));
        $this->assertNull(ItemFormat::getFromName('UnexistingFormat'));
    }

    public function testGetSize()
    {
        $this->assertSame(1, ItemFormat::getSize(ItemFormat::ASCII));
        $this->assertSame(4, ItemFormat::getSize(ItemFormat::FLOAT));
        $this->assertSame(1, ItemFormat::getSize(ItemFormat::UNDEFINED));
        $this->expectException(MediaProbeException::class);
        $this->assertNull(ItemFormat::getSize(100));
    }
}
