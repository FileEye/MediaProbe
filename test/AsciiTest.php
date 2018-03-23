<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelConvert;
use lsolesen\pel\PelEntryAscii;
use lsolesen\pel\PelEntryCopyright;
use lsolesen\pel\PelEntryTime;
use lsolesen\pel\PelTag;

class AsciiTest extends ExifEyeTestCaseBase
{
    public function testReturnValues()
    {
        $entry = new PelEntryAscii(42);

        $entry = new PelEntryAscii(42, 'foo bar baz');
        $this->assertEquals($entry->getComponents(), 12);
        $this->assertEquals($entry->getValue(), 'foo bar baz');
    }

    public function testTime()
    {
        $entry = new PelEntryTime(42, 10);

        $this->assertEquals($entry->getComponents(), 20);
        $this->assertEquals($entry->getValue(), 10);
        $this->assertEquals($entry->getValue(PelEntryTime::UNIX_TIMESTAMP), 10);
        $this->assertEquals($entry->getValue(PelEntryTime::EXIF_STRING), '1970:01:01 00:00:10');
        $this->assertEquals($entry->getValue(PelEntryTime::JULIAN_DAY_COUNT), 2440588 + 10 / 86400);
        $this->assertEquals($entry->getText(), '1970:01:01 00:00:10');

        // Malformed Exif timestamp.
        $entry->setValue('1970!01-01 00 00 30', PelEntryTime::EXIF_STRING);
        $this->assertEquals($entry->getValue(), 30);

        $entry->setValue(2415021.75, PelEntryTime::JULIAN_DAY_COUNT);
        // This is Jan 1st 1900 at 18:00, outside the range of a UNIX
        // timestamp:
        $this->assertEquals($entry->getValue(), false);
        $this->assertEquals($entry->getValue(PelEntryTime::EXIF_STRING), '1900:01:01 18:00:00');
        $this->assertEquals($entry->getValue(PelEntryTime::JULIAN_DAY_COUNT), 2415021.75);

        $entry->setValue('0000:00:00 00:00:00', PelEntryTime::EXIF_STRING);

        $this->assertEquals($entry->getValue(), false);
        $this->assertEquals($entry->getValue(PelEntryTime::EXIF_STRING), '0000:00:00 00:00:00');
        $this->assertEquals($entry->getValue(PelEntryTime::JULIAN_DAY_COUNT), 0);

        $entry->setValue('9999:12:31 23:59:59', PelEntryTime::EXIF_STRING);

        // this test will fail on 32bit machines
        $this->assertEquals($entry->getValue(), 253402300799);
        $this->assertEquals($entry->getValue(PelEntryTime::EXIF_STRING), '9999:12:31 23:59:59');
        $this->assertEquals($entry->getValue(PelEntryTime::JULIAN_DAY_COUNT), 5373484 + 86399 / 86400);

        // Check day roll-over for SF bug #1699489.
        $entry->setValue('2007:04:23 23:30:00', PelEntryTime::EXIF_STRING);
        $t = $entry->getValue(PelEntryTime::UNIX_TIMESTAMP);
        $entry->setValue($t + 3600);

        $this->assertEquals($entry->getValue(PelEntryTime::EXIF_STRING), '2007:04:24 00:30:00');
    }

    public function testCopyright()
    {
        $entry = new PelEntryCopyright();
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
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), 'A' . chr(0));

        $entry->setValue('', 'B');
        $value = $entry->getValue();
        $this->assertEquals($value[0], '');
        $this->assertEquals($value[1], 'B');
        $this->assertEquals($entry->getText(false), 'B (Editor)');
        $this->assertEquals($entry->getText(true), 'B');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), ' ' . chr(0) . 'B' . chr(0));

        $entry->setValue('A', 'B');
        $value = $entry->getValue();
        $this->assertEquals($value[0], 'A');
        $this->assertEquals($value[1], 'B');
        $this->assertEquals($entry->getText(false), 'A (Photographer) - B (Editor)');
        $this->assertEquals($entry->getText(true), 'A - B');
        $this->assertEquals($entry->getBytes(PelConvert::LITTLE_ENDIAN), 'A' . chr(0) . 'B' . chr(0));
    }
}
