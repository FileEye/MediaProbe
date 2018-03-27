<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Version;
use ExifEye\core\Spec;
use ExifEye\core\Utility\Convert;

class EntryVersionTest extends ExifEyeTestCaseBase
{
    public function testVersion()
    {
        $entry = new Version(Spec::getIfdIdByType('Exif'), 0x9000, []);

        $this->assertEquals($entry->getValue(), 0.0);

        $entry->setValue([2.0]);
        $this->assertEquals($entry->getValue(), 2.0);
        $this->assertEquals($entry->getText(false), 'Version 2.0');
        $this->assertEquals($entry->getText(true), '2.0');
        $this->assertEquals($entry->getBytes(Convert::LITTLE_ENDIAN), '0200');

        $entry->setValue([2.1]);
        $this->assertEquals($entry->getValue(), 2.1);
        $this->assertEquals($entry->getText(false), 'Version 2.1');
        $this->assertEquals($entry->getText(true), '2.1');
        $this->assertEquals($entry->getBytes(Convert::LITTLE_ENDIAN), '0210');

        $entry->setValue([2.01]);
        $this->assertEquals($entry->getValue(), 2.01);
        $this->assertEquals($entry->getText(false), 'Version 2.01');
        $this->assertEquals($entry->getText(true), '2.01');
        $this->assertEquals($entry->getBytes(Convert::LITTLE_ENDIAN), '0201');
    }
}
