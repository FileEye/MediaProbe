<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Undefined;
use ExifEye\core\Entry\UserComment;
use ExifEye\core\Utility\Convert;

class PelEntryUndefinedTest extends ExifEyeTestCaseBase
{

    public function testReturnValues()
    {
        new Undefined(42);

        $entry = new Undefined(42, 'foo bar baz');
        $this->assertEquals($entry->getComponents(), 11);
        $this->assertEquals($entry->getValue(), 'foo bar baz');
    }

    public function testUsercomment()
    {
        $entry = new UserComment();
        $this->assertEquals($entry->getComponents(), 8);
        $this->assertEquals($entry->getValue(), '');
        $this->assertEquals($entry->getEncoding(), 'ASCII');

        $entry->setValue('Hello!');
        $this->assertEquals($entry->getComponents(), 14);
        $this->assertEquals($entry->getValue(), 'Hello!');
        $this->assertEquals($entry->getEncoding(), 'ASCII');
    }
}
