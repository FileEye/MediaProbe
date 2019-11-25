<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Entry\WindowsString;
use FileEye\ImageProbe\core\Collection;
use FileEye\ImageProbe\core\Utility\ConvertBytes;

class EntryWindowsStringTest extends EntryTestBase
{
    public function testWindowsString()
    {
        $test_str = 'Tést';
        $test_str_ucs2 = mb_convert_encoding($test_str, 'UCS-2LE', 'UTF-8');
        $test_str_ucs2_zt = $test_str_ucs2 . "\x0\x0";

        $entry = new WindowsString($this->mockParentElement, [$test_str]);
        $this->assertEquals(10, $entry->getComponents());
        $this->assertEquals([$test_str, $test_str_ucs2], $entry->getValue());
        $this->assertEquals($test_str_ucs2_zt, $entry->toBytes());

        $test_str = "Превед, медвед!";
        $test_str_ucs2 = mb_convert_encoding($test_str, 'UCS-2LE', 'UTF-8');
        $test_str_ucs2_zt = $test_str_ucs2 . "\x0\x0";

        $entry = new WindowsString($this->mockParentElement, [$test_str]);
        $this->assertEquals(32, $entry->getComponents());
        $this->assertEquals([$test_str, $test_str_ucs2], $entry->getValue());
        $this->assertEquals($test_str_ucs2_zt, $entry->toBytes());
    }
}
