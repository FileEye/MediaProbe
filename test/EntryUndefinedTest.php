<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\Collection;

class EntryUndefinedTest extends EntryTestBase
{
    public function testReturnValues()
    {
        $entry = new Undefined($this->mockParentElement, ['foo bar baz']);
        $this->assertEquals(11, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }
}
