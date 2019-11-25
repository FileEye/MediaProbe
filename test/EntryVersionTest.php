<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Entry\Version;

class EntryVersionTest extends EntryTestBase
{
    public function testVersion()
    {
        $entry = new Version($this->mockParentElement);

        $entry->setValue([]);
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('0.0', $entry->toString());
        $this->assertEquals('0000', $entry->toBytes());

        $entry->setValue([2.0]);
        $this->assertEquals(2.0, $entry->getValue());
        $this->assertEquals('2.0', $entry->toString());
        $this->assertEquals('0200', $entry->toBytes());

        $entry->setValue([2.1]);
        $this->assertEquals(2.1, $entry->getValue());
        $this->assertEquals('2.1', $entry->toString());
        $this->assertEquals('0210', $entry->toBytes());

        $entry->setValue([2.01]);
        $this->assertEquals(2.01, $entry->getValue());
        $this->assertEquals('2.01', $entry->toString());
        $this->assertEquals('0201', $entry->toBytes());

        // Invalid version data.
        $entry->setValue(['afol']);
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('0.0', $entry->toString());
        $this->assertEquals('0000', $entry->toBytes());
    }
}
