<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Undefined;
use ExifEye\core\Spec;

class EntryUndefinedTest extends ExifEyeTestCaseBase
{
    public function testReturnValues()
    {
        $entry = new Undefined(Spec::getIfdIdByType('Exif'), 0xA302, ['foo bar baz']);
        $this->assertEquals($entry->getComponents(), 11);
        $this->assertEquals($entry->getValue(), 'foo bar baz');
    }
}
