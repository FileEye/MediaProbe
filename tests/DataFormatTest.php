<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Collection\CollectionException;
use FileEye\MediaProbe\Data\DataFormat;

class DataFormatTest extends MediaProbeTestCaseBase
{
    public function testGetName()
    {
        $this->assertSame('Ascii', DataFormat::getName(DataFormat::ASCII));
        $this->assertSame('Float', DataFormat::getName(DataFormat::FLOAT));
        $this->assertSame('Undefined', DataFormat::getName(DataFormat::UNDEFINED));
        $this->expectException(CollectionException::class);
        $this->expectExceptionMessage('Missing collection for item \'100\' in \'Format\'');
        $format = DataFormat::getName(100);
    }

    public function testGetIdFromName()
    {
        $this->assertSame(DataFormat::ASCII, DataFormat::getFromName('Ascii'));
        $this->assertSame(DataFormat::FLOAT, DataFormat::getFromName('Float'));
        $this->assertSame(DataFormat::UNDEFINED, DataFormat::getFromName('Undefined'));
        $this->expectException(CollectionException::class);
        $this->expectExceptionMessage('Missing collection for item \'UnexistingFormat\' in \'Format\'');
        $format = DataFormat::getFromName('UnexistingFormat');
    }

    public function testGetSize()
    {
        $this->assertSame(1, DataFormat::getSize(DataFormat::ASCII));
        $this->assertSame(4, DataFormat::getSize(DataFormat::FLOAT));
        $this->assertSame(1, DataFormat::getSize(DataFormat::UNDEFINED));
        $this->expectException(CollectionException::class);
        $this->expectExceptionMessage('Missing collection for item \'100\' in \'Format\'');
        $format = DataFormat::getSize(100);
    }
}
