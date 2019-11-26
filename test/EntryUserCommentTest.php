<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\ExifUserComment;

class EntryUserCommentTest extends EntryTestBase
{

    public function testUsercomment()
    {
        $entry = new ExifUserComment($this->mockParentElement);
        $entry->setValue([]);
        $this->assertEquals(8, $entry->getComponents());
        $this->assertEquals(['', 'ASCII'], $entry->getValue());
        $this->assertEquals('', $entry->toString());
        $this->assertEquals("ASCII\x0\x0\x0", $entry->toBytes());

        $entry->setValue(['Hello!']);
        $this->assertEquals(14, $entry->getComponents());
        $this->assertEquals(['Hello!', 'ASCII'], $entry->getValue());
        $this->assertEquals("ASCII\x0\x0\x0Hello!", $entry->toBytes());
    }
}
