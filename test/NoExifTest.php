<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Block\Jpeg;

class NoExifTest extends ExifEyeTestCaseBase
{
    public function testRead()
    {
        $jpeg = new Jpeg(dirname(__FILE__) . '/images/no-exif.jpg');

        $exif = $jpeg->getExif();
        $this->assertNull($exif);

        $this->assertTrue(count(ExifEye::getExceptions()) == 0);
    }
}
