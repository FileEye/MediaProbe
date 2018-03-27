<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Undefined;
use ExifEye\core\Spec;

class EntryUndefinedTest extends ExifEyeTestCaseBase
{
    public function testReturnValues()
    {
        $entry = new Undefined(Spec::getIfdIdByType('Exif'), 0xA302, ['foo bar baz']);
        $this->assertEquals(11, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }
}
