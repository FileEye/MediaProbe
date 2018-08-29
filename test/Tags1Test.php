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
        $image = Image::createFromFile(dirname(__FILE__) . '/image_files/test-tags-1.jpg', null, 'error');
        $jpeg = $image->getElement("jpeg");

        $this->assertInstanceOf('ExifEye\core\Block\Exif', $jpeg->getElement("jpegSegment/exif"));
        $this->assertInstanceOf('ExifEye\core\Block\Tiff', $jpeg->getElement("jpegSegment/exif/tiff"));

        $ifd0 = $jpeg->getElement("jpegSegment/exif/tiff/ifd[@name='IFD0']");
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd0);

        $ratingPercent = $ifd0->getElement("tag[@name='RatingPercent']/entry");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Short', $ratingPercent);
        $this->assertEquals(78, $ratingPercent->getValue());

        $exifIfd = $ifd0->getElement("ifd[@name='Exif']");
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $exifIfd);

        $offsetTime = $exifIfd->getElement("tag[@name='OffsetTime']/entry");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTime);
        $this->assertEquals('-09:00', $offsetTime->getValue());

        $offsetTimeDigitized = $exifIfd->getElement("tag[@name='OffsetTimeDigitized']/entry");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTimeDigitized);
        $this->assertEquals('-10:00', $offsetTimeDigitized->getValue());

        $offsetTimeOriginal = $exifIfd->getElement("tag[@name='OffsetTimeOriginal']/entry");
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTimeOriginal);
        $this->assertEquals('-11:00', $offsetTimeOriginal->getValue());
    }
}
