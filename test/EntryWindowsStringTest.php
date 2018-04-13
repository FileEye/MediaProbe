<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\WindowsString;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

class EntryWindowsStringTest extends ExifEyeTestCaseBase
{
    public function testWindowsString()
    {
        $test_str = 'Tést';
        $test_str_ucs2 = mb_convert_encoding($test_str, 'UCS-2LE', 'UTF-8');
        $test_str_ucs2_zt = $test_str_ucs2 . WindowsString::ZEROES;

        $entry = new WindowsString([$test_str]);
        $this->assertEquals(10, $entry->getComponents());
        $this->assertEquals([$test_str, $test_str_ucs2], $entry->getValue());
        $this->assertEquals($test_str_ucs2_zt, $entry->toBytes());

        $test_str = "Превед, медвед!";
        $test_str_ucs2 = mb_convert_encoding($test_str, 'UCS-2LE', 'UTF-8');
        $test_str_ucs2_zt = $test_str_ucs2 . WindowsString::ZEROES;

        $entry = new WindowsString([$test_str]);
        $this->assertEquals(10, $entry->getComponents());
        $this->assertEquals([$test_str, $test_str_ucs2], $entry->getValue());
        $this->assertEquals($test_str_ucs2_zt, $entry->toBytes());
    }
}
