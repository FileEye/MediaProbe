<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelIfd;
use lsolesen\pel\PelEntryAscii;
use lsolesen\pel\PelTag;
use lsolesen\pel\PelEntryTime;
use PHPUnit\Framework\TestCase;

class IfdTest extends TestCase
{
    public function testIteratorAggretate()
    {
        $ifd = new PelIfd(PelIfd::IFD0);

        $this->assertEquals(sizeof($ifd->getIterator()), 0);

        $desc = new PelEntryAscii(PelTag::IMAGE_DESCRIPTION, 'Hello?');
        $date = new PelEntryTime(PelTag::DATE_TIME, 12345678);

        $ifd->addEntry($desc);
        $ifd->addEntry($date);

        $this->assertEquals(sizeof($ifd->getIterator()), 2);

        $entries = [];
        foreach ($ifd as $tag => $entry) {
            $entries[$tag] = $entry;
        }

        $this->assertSame($entries[PelTag::IMAGE_DESCRIPTION], $desc);
        $this->assertSame($entries[PelTag::DATE_TIME], $date);
    }

    public function testArrayAccess()
    {
        $ifd = new PelIfd(PelIfd::IFD0);

        $this->assertEquals(sizeof($ifd->getIterator()), 0);

        $desc = new PelEntryAscii(PelTag::IMAGE_DESCRIPTION, 'Hello?');
        $date = new PelEntryTime(PelTag::DATE_TIME, 12345678);

        $ifd[] = $desc;
        $ifd[] = $date;

        $this->assertSame($ifd[PelTag::IMAGE_DESCRIPTION], $desc);
        $this->assertSame($ifd[PelTag::DATE_TIME], $date);

        unset($ifd[PelTag::DATE_TIME]);

        $this->assertFalse(isset($ifd[PelTag::DATE_TIME]));
    }
}
