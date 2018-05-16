<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Spec;

class EntryUndefinedTest extends EntryTestBase
{
    public function testReturnValues()
    {
        $entry = new Undefined($this->mockParentElement, ['foo bar baz']);
        $this->assertEquals(11, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }
}
