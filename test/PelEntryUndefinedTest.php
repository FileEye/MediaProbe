<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelEntryUndefined;
use lsolesen\pel\PelEntryUserComment;
use lsolesen\pel\PelEntryVersion;
use lsolesen\pel\PelConvert;

class PelEntryUndefinedTest extends ExifEyeTestCaseBase
{

    public function testReturnValues()
    {
        new PelEntryUndefined(42);

        $entry = new PelEntryUndefined(42, 'foo bar baz');
        $this->assertEquals($entry->getComponents(), 11);
        $this->assertEquals($entry->getValue(), 'foo bar baz');
    }

    public function testUsercomment()
    {
        $entry = new PelEntryUserComment();
        $this->assertEquals($entry->getComponents(), 8);
        $this->assertEquals($entry->getValue(), '');
        $this->assertEquals($entry->getEncoding(), 'ASCII');

        $entry->setValue('Hello!');
        $this->assertEquals($entry->getComponents(), 14);
        $this->assertEquals($entry->getValue(), 'Hello!');
        $this->assertEquals($entry->getEncoding(), 'ASCII');
    }

    public function testVersion()
    {
        $entry = new PelEntryVersion(42);

        $this->assertEquals($entry->getValue(), 0.0);

        $entry->setValue(2.0);
        $this->assertEquals($entry->getValue(), 2.0);
        $this->assertEquals($entry->getText(false), 'Version 2.0');
        $this->assertEquals($entry->getText(true), '2.0');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), '0200');

        $entry->setValue(2.1);
        $this->assertEquals($entry->getValue(), 2.1);
        $this->assertEquals($entry->getText(false), 'Version 2.1');
        $this->assertEquals($entry->getText(true), '2.1');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), '0210');

        $entry->setValue(2.01);
        $this->assertEquals($entry->getValue(), 2.01);
        $this->assertEquals($entry->getText(false), 'Version 2.01');
        $this->assertEquals($entry->getText(true), '2.01');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), '0201');
    }
}
