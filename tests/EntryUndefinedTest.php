<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\Core\Undefined;

class EntryUndefinedTest extends EntryTestBase
{
    public function testReturnValues()
    {
        $entry = new Undefined($this->mockParentElement, new DataString('foo bar baz'));
        $this->assertEquals(11, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }
}
