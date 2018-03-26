<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Entry\Ascii;
use ExifEye\core\Entry\Time;

class IfdTest extends ExifEyeTestCaseBase
{
    public function testIteratorAggretate()
    {
        $ifd = new Ifd(Spec::getIfdIdByType('IFD0'));

        $this->assertEquals(sizeof($ifd->getIterator()), 0);

        $desc = new Ascii(0x010E, 'Hello?');
        $date = new Time(0x0132, 12345678);

        $ifd->addEntry($desc);
        $ifd->addEntry($date);

        $this->assertEquals(sizeof($ifd->getIterator()), 2);

        $entries = [];
        foreach ($ifd as $tag => $entry) {
            $entries[$tag] = $entry;
        }

        $this->assertSame($entries[0x010E], $desc);
        $this->assertSame($entries[0x0132], $date);
    }

    public function testArrayAccess()
    {
        $ifd = new Ifd(Spec::getIfdIdByType('IFD0'));

        $this->assertEquals(sizeof($ifd->getIterator()), 0);

        $desc = new Ascii(0x010E, 'Hello?');
        $date = new Time(0x0132, 12345678);

        $ifd[] = $desc;
        $ifd[] = $date;

        $this->assertSame($ifd[0x010E], $desc);
        $this->assertSame($ifd[0x0132], $date);

        unset($ifd[0x0132]);

        $this->assertFalse(isset($ifd[0x0132]));
    }
}
