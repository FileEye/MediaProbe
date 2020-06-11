<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Version;

class EntryVersionTest extends EntryTestBase
{
    public function testVersion()
    {
        $entry = new Version($this->mockParentElement);

        $entry->setValue(['0000']);
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('0.0', $entry->toString());
        $this->assertEquals('0000', $entry->toBytes());

        $entry->setValue(['0200']);
        $this->assertEquals(2.0, $entry->getValue());
        $this->assertEquals('2.0', $entry->toString());
        $this->assertEquals('0200', $entry->toBytes());

        $entry->setValue(['0210']);
        $this->assertEquals(2.1, $entry->getValue());
        $this->assertEquals('2.1', $entry->toString());
        $this->assertEquals('0210', $entry->toBytes());

        $entry->setValue(['0201']);
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
