<?php

namespace ExifEye\Test\core;

use ExifEye\core\Utility\Convert;
use ExifEye\core\Entry\Ascii;
use ExifEye\core\Entry\Copyright;
use ExifEye\core\Entry\Time;
use ExifEye\core\Spec;

class EntryAsciiTest extends ExifEyeTestCaseBase
{
    public function testReturnValues()
    {
        $entry = new Ascii(Spec::getIfdIdByType('Exif'), 0xFDFD, ['foo bar baz']);
        $this->assertEquals(12, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }

    public function testTime()
    {
        $entry = new Time(Spec::getIfdIdByType('Exif'), 0xFDFD, [10]);

        $this->assertEquals(20, $entry->getComponents());
        $this->assertEquals(10, $entry->getValue());
        $this->assertEquals(10, $entry->getValue(Time::UNIX_TIMESTAMP));
        $this->assertEquals('1970:01:01 00:00:10', $entry->getValue(Time::EXIF_STRING));
        $this->assertEquals(2440588 + 10 / 86400, $entry->getValue(Time::JULIAN_DAY_COUNT));
        $this->assertEquals('1970:01:01 00:00:10'$entry->getText());

        // Malformed Exif timestamp.
        $entry->setValue(['1970!01-01 00 00 30', Time::EXIF_STRING]);
        $this->assertEquals(30, $entry->getValue());

        $entry->setValue([2415021.75, Time::JULIAN_DAY_COUNT]);
        // This is Jan 1st 1900 at 18:00, outside the range of a UNIX
        // timestamp:
        $this->assertFalse($entry->getValue());
        $this->assertEquals('1900:01:01 18:00:00', $entry->getValue(Time::EXIF_STRING));
        $this->assertEquals(2415021.75, $entry->getValue(Time::JULIAN_DAY_COUNT));

        $entry->setValue(['0000:00:00 00:00:00', Time::EXIF_STRING]);

        $this->assertFalse($entry->getValue());
        $this->assertEquals('0000:00:00 00:00:00', $entry->getValue(Time::EXIF_STRING));
        $this->assertEquals(0, $entry->getValue(Time::JULIAN_DAY_COUNT));

        $entry->setValue(['9999:12:31 23:59:59', Time::EXIF_STRING]);

        // this test will fail on 32bit machines
        $this->assertEquals(253402300799, $entry->getValue());
        $this->assertEquals('9999:12:31 23:59:59', $entry->getValue(Time::EXIF_STRING));
        $this->assertEquals(5373484 + 86399 / 86400, $entry->getValue(Time::JULIAN_DAY_COUNT));

        // Check day roll-over for SF bug #1699489.
        $entry->setValue(['2007:04:23 23:30:00', Time::EXIF_STRING]);
        $t = $entry->getValue(Time::UNIX_TIMESTAMP);
        $entry->setValue([$t + 3600]);
        $this->assertEquals('2007:04:24 00:30:00', $entry->getValue(Time::EXIF_STRING));
    }

    public function testCopyright()
    {
        $entry = new Copyright(Spec::getIfdIdByType('IFD0'), 0x8298, []);
        $this->assertEquals($entry->getTag(), 0x8298);
        $value = $entry->getValue();
        $this->assertEquals('', $value[0]);
        $this->assertEquals('', $value[1]);
        $this->assertEquals('', $entry->getText(false));
        $this->assertEquals('', $entry->getText(true));

        $entry->setValue(['A']);
        $value = $entry->getValue();
        $this->assertEquals('A', $value[0]);
        $this->assertEquals('', $value[1]);
        $this->assertEquals('A (Photographer)', $entry->getText(false));
        $this->assertEquals('A', $entry->getText(true));
        $this->assertEquals('A' . chr(0), $entry->getBytes(Convert::LITTLE_ENDIAN));

        $entry->setValue(['', 'B']);
        $value = $entry->getValue();
        $this->assertEquals('', $value[0]);
        $this->assertEquals('B', $value[1]);
        $this->assertEquals('B (Editor)', $entry->getText(false));
        $this->assertEquals('B', $entry->getText(true));
        $this->assertEquals(' ' . chr(0) . 'B' . chr(0), $entry->getBytes(Convert::LITTLE_ENDIAN));

        $entry->setValue(['A', 'B']);
        $value = $entry->getValue();
        $this->assertEquals('A', $value[0]);
        $this->assertEquals('B', $value[1]);
        $this->assertEquals('A (Photographer) - B (Editor)', $entry->getText(false));
        $this->assertEquals('A - B', $entry->getText(true));
        $this->assertEquals('A' . chr(0) . 'B' . chr(0), $entry->getBytes(Convert::LITTLE_ENDIAN));
    }
}
