<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Entry\IfdCopyright;
use ExifEye\core\Entry\Time;
use ExifEye\core\Spec;

class EntryAsciiTest extends EntryTestBase
{
    public function testReturnValues()
    {
        $entry = new Ascii($this->mockParentElement, ['foo bar baz']);
        $this->assertEquals(12, $entry->getComponents());
        $this->assertEquals('foo bar baz', $entry->getValue());
    }

    public function testTime()
    {
        $entry = new Time($this->mockParentElement, [10, Time::UNIX_TIMESTAMP]);
        $this->assertEquals(20, $entry->getComponents());
        $this->assertEquals('1970:01:01 00:00:10', $entry->getValue());
        $this->assertEquals(10, $entry->getValue(['type' => Time::UNIX_TIMESTAMP]));
        $this->assertEquals('1970:01:01 00:00:10', $entry->getValue(['type' => Time::EXIF_STRING]));
        $this->assertEquals(2440588 + 10 / 86400, $entry->getValue(['type' => Time::JULIAN_DAY_COUNT]));
        $this->assertEquals('1970:01:01 00:00:10', $entry->toString());
        $this->assertEquals('1970:01:01 00:00:10' . chr(0), $entry->toBytes());

        // Malformed Exif timestamp.
        $entry->setValue(['1970!01-01 00 00 30']);
        $this->assertEquals('1970:01:01 00:00:30', $entry->getValue());
        $this->assertEquals('1970!01-01 00 00 30' . chr(0), $entry->toBytes());

        $entry->setValue([2415021.75, Time::JULIAN_DAY_COUNT]);
        // This is Jan 1st 1900 at 18:00, outside the range of a UNIX
        // timestamp:
        $this->assertFalse($entry->getValue(['type' => Time::UNIX_TIMESTAMP]));
        $this->assertEquals('1900:01:01 18:00:00', $entry->getValue());
        $this->assertEquals('1900:01:01 18:00:00' . chr(0), $entry->toBytes());
        $this->assertEquals(2415021.75, $entry->getValue(['type' => Time::JULIAN_DAY_COUNT]));

        $entry->setValue(['0000:00:00 00:00:00']);
        $this->assertFalse($entry->getValue(['type' => Time::UNIX_TIMESTAMP]));
        $this->assertEquals('0000:00:00 00:00:00', $entry->getValue());
        $this->assertEquals('0000:00:00 00:00:00' . chr(0), $entry->toBytes());
        $this->assertEquals(0, $entry->getValue(['type' => Time::JULIAN_DAY_COUNT]));

        $entry->setValue(['9999:12:31 23:59:59']);
        // this test will fail on 32bit machines
        $this->assertEquals(253402300799, $entry->getValue(['type' => Time::UNIX_TIMESTAMP]));
        $this->assertEquals('9999:12:31 23:59:59', $entry->getValue());
        $this->assertEquals('9999:12:31 23:59:59' . chr(0), $entry->toBytes());
        $this->assertEquals(5373484 + 86399 / 86400, $entry->getValue(['type' => Time::JULIAN_DAY_COUNT]));

        // Check day roll-over for SF bug #1699489.
        $entry->setValue(['2007:04:23 23:30:00']);
        $t = $entry->getValue(['type' => Time::UNIX_TIMESTAMP]);
        $entry->setValue([$t + 3600, Time::UNIX_TIMESTAMP]);
        $this->assertEquals('2007:04:24 00:30:00', $entry->getValue());
        $this->assertEquals('2007:04:24 00:30:00' . chr(0), $entry->toBytes());
    }

    public function testCopyright()
    {
        $entry = new IfdCopyright($this->mockParentElement, []);
        $value = $entry->getValue();
        $this->assertEquals('', $value[0]);
        $this->assertEquals('', $value[1]);
        $this->assertEquals('', $entry->toString());
        $this->assertEquals('', $entry->toString(['short' => false]));
        $this->assertEquals('', $entry->toString(['short' => true]));

        $entry->setValue(['A']);
        $value = $entry->getValue();
        $this->assertEquals('A', $value[0]);
        $this->assertEquals('', $value[1]);
        $this->assertEquals('A (Photographer)', $entry->toString(['short' => false]));
        $this->assertEquals('A', $entry->toString(['short' => true]));
        $this->assertEquals('A' . chr(0), $entry->toBytes());

        $entry->setValue(['', 'B']);
        $value = $entry->getValue();
        $this->assertEquals('', $value[0]);
        $this->assertEquals('B', $value[1]);
        $this->assertEquals('B (Editor)', $entry->toString(['short' => false]));
        $this->assertEquals('B', $entry->toString(['short' => true]));
        $this->assertEquals(chr(0) . 'B' . chr(0), $entry->toBytes());

        $entry->setValue(['A', 'B']);
        $value = $entry->getValue();
        $this->assertEquals('A', $value[0]);
        $this->assertEquals('B', $value[1]);
        $this->assertEquals('A (Photographer) - B (Editor)', $entry->toString(['short' => false]));
        $this->assertEquals('A - B', $entry->toString(['short' => true]));
        $this->assertEquals('A' . chr(0) . 'B' . chr(0), $entry->toBytes());
    }
}
