<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Spec;

class EntryUndefinedTest extends ExifEyeTestCaseBase
{
    public function testReturnValues()
    {
        $entry = new Undefined(['foo bar baz']);
        $this->assertEquals(11, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }
}
