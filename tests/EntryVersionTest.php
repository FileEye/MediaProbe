<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\Version;

class EntryVersionTest extends EntryTestBase
{
    public function testVersion()
    {
        $entry = new Version($this->mockParentElement, new DataString('0000'));
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('0.0', $entry->toString());
        $this->assertEquals('0000', $entry->toBytes());

        $entry->setDataElement(new DataString('0200'));
        $this->assertEquals(2.0, $entry->getValue());
        $this->assertEquals('2.0', $entry->toString());
        $this->assertEquals('0200', $entry->toBytes());

        $entry->setDataElement(new DataString('0210'));
        $this->assertEquals(2.1, $entry->getValue());
        $this->assertEquals('2.1', $entry->toString());
        $this->assertEquals('0210', $entry->toBytes());

        $entry->setDataElement(new DataString('0201'));
        $this->assertEquals(2.01, $entry->getValue());
        $this->assertEquals('2.01', $entry->toString());
        $this->assertEquals('0201', $entry->toBytes());

        // Invalid version data.
        $entry->setDataElement(new DataString('afol'));
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('0.0', $entry->toString());
        $this->assertEquals('afol', $entry->toBytes());

        // Invalid version data.
        $entry->setDataElement(new DataString('\xDC000'));
        $this->assertEquals(0.0, $entry->getValue());
        $this->assertEquals('0.0', $entry->toString());
        $this->assertEquals('\xDC000', $entry->toBytes());
    }
}
