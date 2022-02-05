<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\ExifUserComment;

class EntryUserCommentTest extends EntryTestBase
{

    public function testUsercomment()
    {
        $entry = new ExifUserComment($this->mockParentElement);
        $entry->setValue(["\x0\x0\x0\x0\x0\x0\x0\x0"]);
        $this->assertEquals(8, $entry->getComponents());
        $this->assertEquals('', $entry->getValue());
        $this->assertEquals('', $entry->toString());
        $this->assertEquals("\x0\x0\x0\x0\x0\x0\x0\x0", $entry->toBytes());

        $entry->setValue(["ASCII\x0\x0\x0Hello!"]);
        $this->assertEquals(14, $entry->getComponents());
        $this->assertEquals('Hello!', $entry->getValue());
        $this->assertEquals("ASCII\x0\x0\x0Hello!", $entry->toBytes());
    }
}