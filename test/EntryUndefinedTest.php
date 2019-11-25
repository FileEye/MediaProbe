<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Entry\Core\Undefined;
use FileEye\ImageProbe\core\Collection;

class EntryUndefinedTest extends EntryTestBase
{
    public function testReturnValues()
    {
        $entry = new Undefined($this->mockParentElement, ['foo bar baz']);
        $this->assertEquals(11, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }
}
