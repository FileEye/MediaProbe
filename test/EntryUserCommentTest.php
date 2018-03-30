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
        $this->assertEquals('', $entry->getValue());
        $this->assertEquals('ASCII', $entry->getEncoding());

        $entry->setValue(['Hello!']);
        $this->assertEquals(14, $entry->getComponents());
        $this->assertEquals('Hello!', $entry->getValue());
        $this->assertEquals('ASCII', $entry->getEncoding());
    }
}
