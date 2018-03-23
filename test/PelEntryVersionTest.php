<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelEntryVersion;
use lsolesen\pel\PelConvert;

class PelEntryVersionTest extends ExifEyeTestCaseBase
{
    public function testVersion()
    {
        $entry = new PelEntryVersion(42);

        $this->assertEquals($entry->getValue(), 0.0);

        $entry->setValue(2.0);
        $this->assertEquals($entry->getValue(), 2.0);
        $this->assertEquals($entry->getText(false), 'Version 2.0');
        $this->assertEquals($entry->getText(true), '2.0');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), '0200');

        $entry->setValue(2.1);
        $this->assertEquals($entry->getValue(), 2.1);
        $this->assertEquals($entry->getText(false), 'Version 2.1');
        $this->assertEquals($entry->getText(true), '2.1');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), '0210');

        $entry->setValue(2.01);
        $this->assertEquals($entry->getValue(), 2.01);
        $this->assertEquals($entry->getText(false), 'Version 2.01');
        $this->assertEquals($entry->getText(true), '2.01');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), '0201');
    }
}
