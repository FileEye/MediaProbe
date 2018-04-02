<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Version;
use ExifEye\core\Spec;
use ExifEye\core\Utility\Convert;

class EntryVersionTest extends ExifEyeTestCaseBase
{
    public function testVersion()
    {
        $entry = new Version([]);

        $this->assertEquals(0.0, $entry->getValue());

        $entry->setValue([2.0]);
        $this->assertEquals(2.0, $entry->getValue());
        $this->assertEquals('Version 2.0', $entry->toString(false));
        $this->assertEquals('2.0', $entry->toString(true));
        $this->assertEquals('0200', $entry->toBytes(Convert::LITTLE_ENDIAN));

        $entry->setValue([2.1]);
        $this->assertEquals(2.1, $entry->getValue());
        $this->assertEquals('Version 2.1', $entry->toString(false));
        $this->assertEquals('2.1', $entry->toString(true));
        $this->assertEquals('0210', $entry->toBytes(Convert::LITTLE_ENDIAN));

        $entry->setValue([2.01]);
        $this->assertEquals(2.01, $entry->getValue());
        $this->assertEquals('Version 2.01', $entry->toString(false));
        $this->assertEquals('2.01', $entry->toString(true));
        $this->assertEquals('0201', $entry->toBytes(Convert::LITTLE_ENDIAN));
    }
}
