<?php

namespace ExifEye\Test\core;

use ExifEye\core\Utility\Convert;
use ExifEye\core\Entry\Ascii;
use ExifEye\core\Entry\Copyright;
use ExifEye\core\Entry\Time;
use lsolesen\pel\PelTag;

class AsciiTest extends ExifEyeTestCaseBase
{
    public function testReturnValues()
    {
        $entry = new Ascii(42);

        $entry = new Ascii(42, 'foo bar baz');
        $this->assertEquals($entry->getComponents(), 12);
        $this->assertEquals($entry->getValue(), 'foo bar baz');
    }

    public function testTime()
    {
        $entry = new Time(42, 10);

        $this->assertEquals($entry->getComponents(), 20);
        $this->assertEquals($entry->getValue(), 10);
        $this->assertEquals($entry->getValue(Time::UNIX_TIMESTAMP), 10);
        $this->assertEquals($entry->getValue(Time::EXIF_STRING), '1970:01:01 00:00:10');
        $this->assertEquals($entry->getValue(Time::JULIAN_DAY_COUNT), 2440588 + 10 / 86400);
        $this->assertEquals($entry->getText(), '1970:01:01 00:00:10');

        // Malformed Exif timestamp.
        $entry->setValue('1970!01-01 00 00 30', Time::EXIF_STRING);
        $this->assertEquals($entry->getValue(), 30);

        $entry->setValue(2415021.75, Time::JULIAN_DAY_COUNT);
        // This is Jan 1st 1900 at 18:00, outside the range of a UNIX
        // timestamp:
        $this->assertEquals($entry->getValue(), false);
        $this->assertEquals($entry->getValue(Time::EXIF_STRING), '1900:01:01 18:00:00');
        $this->assertEquals($entry->getValue(Time::JULIAN_DAY_COUNT), 2415021.75);

        $entry->setValue('0000:00:00 00:00:00', Time::EXIF_STRING);

        $this->assertEquals($entry->getValue(), false);
        $this->assertEquals($entry->getValue(Time::EXIF_STRING), '0000:00:00 00:00:00');
        $this->assertEquals($entry->getValue(Time::JULIAN_DAY_COUNT), 0);

        $entry->setValue('9999:12:31 23:59:59', Time::EXIF_STRING);

        // this test will fail on 32bit machines
        $this->assertEquals($entry->getValue(), 253402300799);
        $this->assertEquals($entry->getValue(Time::EXIF_STRING), '9999:12:31 23:59:59');
        $this->assertEquals($entry->getValue(Time::JULIAN_DAY_COUNT), 5373484 + 86399 / 86400);

        // Check day roll-over for SF bug #1699489.
        $entry->setValue('2007:04:23 23:30:00', Time::EXIF_STRING);
        $t = $entry->getValue(Time::UNIX_TIMESTAMP);
        $entry->setValue($t + 3600);

        $this->assertEquals($entry->getValue(Time::EXIF_STRING), '2007:04:24 00:30:00');
    }

    public function testCopyright()
    {
        $entry = new Copyright();
        $this->assertEquals($entry->getTag(), 0x8298);
        $value = $entry->getValue();
        $this->assertEquals($value[0], '');
        $this->assertEquals($value[1], '');
        $this->assertEquals($entry->getText(false), '');
        $this->assertEquals($entry->getText(true), '');

        $entry->setValue('A');
        $value = $entry->getValue();
        $this->assertEquals($value[0], 'A');
        $this->assertEquals($value[1], '');
        $this->assertEquals($entry->getText(false), 'A (Photographer)');
        $this->assertEquals($entry->getText(true), 'A');
        $this->assertEquals($entry->getBytes(Convert::LITTLE_ENDIAN), 'A' . chr(0));

        $entry->setValue('', 'B');
        $value = $entry->getValue();
        $this->assertEquals($value[0], '');
        $this->assertEquals($value[1], 'B');
        $this->assertEquals($entry->getText(false), 'B (Editor)');
        $this->assertEquals($entry->getText(true), 'B');
        $this->assertEquals($entry->getBytes(Convert::LITTLE_ENDIAN), ' ' . chr(0) . 'B' . chr(0));

        $entry->setValue('A', 'B');
        $value = $entry->getValue();
        $this->assertEquals($value[0], 'A');
        $this->assertEquals($value[1], 'B');
        $this->assertEquals($entry->getText(false), 'A (Photographer) - B (Editor)');
        $this->assertEquals($entry->getText(true), 'A - B');
        $this->assertEquals($entry->getBytes(Convert::LITTLE_ENDIAN), 'A' . chr(0) . 'B' . chr(0));
    }
}
