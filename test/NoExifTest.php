<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Image;
use ExifEye\core\Block\Jpeg;

class NoExifTest extends ExifEyeTestCaseBase
{
    public function testRead()
    {
        $image = Image::loadFromFile(dirname(__FILE__) . '/image_files/no-exif.jpg');
        $jpeg = $image->first("jpeg");

        $exif = $jpeg->first("segment/exif");
        $this->assertNull($exif);

        $handler = ExifEye::logger()->getHandlers()[0]; // xx
        $this->assertEmpty($handler->getRecords());
    }
}
