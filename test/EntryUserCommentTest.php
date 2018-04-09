<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\UserComment;
use ExifEye\core\Spec;

class EntryUserCommentTest extends ExifEyeTestCaseBase
{

    public function testUsercomment()
    {
        $entry = new UserComment([]);
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
