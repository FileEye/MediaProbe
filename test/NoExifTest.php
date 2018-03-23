<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use lsolesen\pel\PelJpeg;

class NoExifTest extends ExifEyeTestCaseBase
{
    public function testRead()
    {
        $jpeg = new PelJpeg(dirname(__FILE__) . '/images/no-exif.jpg');

        $exif = $jpeg->getExif();
        $this->assertNull($exif);

        $this->assertTrue(count(ExifEye::getExceptions()) == 0);
    }
}
