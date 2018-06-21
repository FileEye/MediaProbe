<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Image;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Spec;

class Tags1Test extends ExifEyeTestCaseBase
{
    public function testTags()
    {
        ExifEye::setStrictParsing(true);
        $image = Image::loadFromFile(dirname(__FILE__) . '/image_files/test-tags-1.jpg');
        $jpeg = $image->root();

        $this->assertInstanceOf('ExifEye\core\Block\Exif', $jpeg->first("segment/exif"));
        $this->assertInstanceOf('ExifEye\core\Block\Tiff', $jpeg->first("segment/exif/tiff"));

        $ifd0 = $jpeg->first("segment/exif/tiff/ifd[@name='IFD0']");
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd0);

        $ratingPercent = $ifd0->first("tag[@name='RatingPercent']");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Short', $ratingPercent->getEntry());
        $this->assertEquals(78, $ratingPercent->getEntry()->getValue());

        $exifIfd = $ifd0->first("ifd[@name='Exif']");
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $exifIfd);

        $offsetTime = $exifIfd->first("tag[@name='OffsetTime']");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTime->getEntry());
        $this->assertEquals('-09:00', $offsetTime->getEntry()->getValue());

        $offsetTimeDigitized = $exifIfd->first("tag[@name='OffsetTimeDigitized']");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTimeDigitized->getEntry());
        $this->assertEquals('-10:00', $offsetTimeDigitized->getEntry()->getValue());

        $offsetTimeOriginal = $exifIfd->first("tag[@name='OffsetTimeOriginal']");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTimeOriginal->getEntry());
        $this->assertEquals('-11:00', $offsetTimeOriginal->getEntry()->getValue());
    }
}
