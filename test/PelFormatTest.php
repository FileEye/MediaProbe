<?php

namespace ExifEye\Test\core;

use PHPUnit\Framework\TestCase;
use lsolesen\pel\Pel;
use lsolesen\pel\PelFormat;

class PelFormatTest extends TestCase
{

    public function testNames()
    {
        $pelFormat = new PelFormat();
        $this->assertEquals($pelFormat::getName(PelFormat::ASCII), 'Ascii');
        $this->assertEquals($pelFormat::getName(PelFormat::FLOAT), 'Float');
        $this->assertEquals($pelFormat::getName(PelFormat::UNDEFINED), 'Undefined');
        $this->assertEquals($pelFormat::getName(100), Pel::fmt('Unknown format: 0x%X', 100));
    }

    public function testDescriptions()
    {
        $pelFormat = new PelFormat();
        $this->assertEquals($pelFormat::getSize(PelFormat::ASCII), 1);
        $this->assertEquals($pelFormat::getSize(PelFormat::FLOAT), 4);
        $this->assertEquals($pelFormat::getSize(PelFormat::UNDEFINED), 1);
        $this->assertEquals($pelFormat::getSize(100), Pel::fmt('Unknown format: 0x%X', 100));
    }
}
