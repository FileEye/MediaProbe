<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\WindowsString;
use FileEye\MediaProbe\Utility\ConvertBytes;

class EntryWindowsStringTest extends EntryTestBase
{
    public function testWindowsString()
    {
        $test_str = 'Tést' . chr(0);
        $test_str_ucs2 = mb_convert_encoding($test_str, 'UCS-2LE', 'auto');

        $entry = new WindowsString($this->mockParentElement, new DataString($test_str_ucs2));
        $this->assertSame(10, $entry->getComponents());
        $this->assertSame($test_str, $entry->getValue(['type' => 'php']));
        $this->assertSame($test_str_ucs2, $entry->getValue(['type' => 'windows']));
        $this->assertSame($test_str_ucs2, $entry->toBytes());

        $test_str = "Превед, медвед!" . chr(0);
        $test_str_ucs2 = mb_convert_encoding($test_str, 'UCS-2LE', 'auto');

        $entry = new WindowsString($this->mockParentElement, new DataString($test_str_ucs2));
        $this->assertSame(32, $entry->getComponents());
        $this->assertSame($test_str, $entry->getValue(['type' => 'php']));
        $this->assertSame($test_str_ucs2, $entry->getValue(['type' => 'windows']));
        $this->assertSame($test_str_ucs2, $entry->toBytes());
    }
}
