<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\WindowsString;
use ExifEye\core\Spec;
use ExifEye\core\Utility\Convert;

class EntryWindowsStringTest extends ExifEyeTestCaseBase
{

    public function testWindowsString()
    {
        $test_str = 'Tést';
        $test_str_ucs2 = mb_convert_encoding($test_str, 'UCS-2LE', 'auto');
        $test_str_ucs2_zt = $test_str_ucs2 . WindowsString::ZEROES;

        $entry = new WindowsString([$test_str]);
        $this->assertNotEquals($entry->getBytes(Convert::LITTLE_ENDIAN), $entry->getValue());
        $this->assertEquals($test_str, $entry->getValue());
        $this->assertEquals($test_str_ucs2_zt, $entry->getBytes(Convert::LITTLE_ENDIAN));

        // correct zero-terminated data from the exif
        $entry->setValue([$test_str_ucs2_zt, true]);
        $this->assertNotEquals($entry->getBytes(Convert::LITTLE_ENDIAN), $entry->getValue());
        $this->assertEquals($test_str, $entry->getValue());
        $this->assertEquals($test_str_ucs2_zt, $entry->getBytes(Convert::LITTLE_ENDIAN));

        // incorrect data from exif
        $entry->setValue([$test_str_ucs2, true]);
        $this->assertNotEquals($entry->getBytes(Convert::LITTLE_ENDIAN), $entry->getValue());
        $this->assertEquals($test_str, $entry->getValue());
        $this->assertEquals($test_str_ucs2_zt, $entry->getBytes(Convert::LITTLE_ENDIAN));
    }
}
