<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\VersionBase;

class EntryVersionTest extends EntryTestBase
{
    public function testVersion()
    {
        $entry = new VersionBase($this->mockParentElement, []);
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('Version 0.0', $entry->toString());
        $this->assertEquals('0.0', $entry->toString(['short' => true]));
        $this->assertEquals('0000', $entry->toBytes());

        $entry->setValue([2.0]);
        $this->assertEquals(2.0, $entry->getValue());
        $this->assertEquals('Version 2.0', $entry->toString());
        $this->assertEquals('2.0', $entry->toString(['short' => true]));
        $this->assertEquals('0200', $entry->toBytes());

        $entry->setValue([2.1]);
        $this->assertEquals(2.1, $entry->getValue());
        $this->assertEquals('Version 2.1', $entry->toString(['short' => false]));
        $this->assertEquals('2.1', $entry->toString(['short' => true]));
        $this->assertEquals('0210', $entry->toBytes());

        $entry->setValue([2.01]);
        $this->assertEquals(2.01, $entry->getValue());
        $this->assertEquals('Version 2.01', $entry->toString(['short' => false]));
        $this->assertEquals('2.01', $entry->toString(['short' => true]));
        $this->assertEquals('0201', $entry->toBytes());

        // Invalid version data.
        $entry->setValue(['afol']);
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('Version 0.0', $entry->toString(['short' => false]));
        $this->assertEquals('0.0', $entry->toString(['short' => true]));
        $this->assertEquals('0000', $entry->toBytes());
    }
}
