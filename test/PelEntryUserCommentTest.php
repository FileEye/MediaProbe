<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelEntryUserComment;

class PelEntryUserCommentTest extends ExifEyeTestCaseBase
{

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
}
