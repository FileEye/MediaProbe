<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\Image;
use FileEye\ImageInfo\core\Block\Ifd;
use FileEye\ImageInfo\core\Block\Jpeg;
use FileEye\ImageInfo\core\Collection;

class Tags1Test extends ImageInfoTestCaseBase
{
    public function testTags()
    {
        $image = Image::createFromFile(dirname(__FILE__) . '/image_files/test-tags-1.jpg', null, 'error');
        $jpeg = $image->getElement("jpeg");

        $this->assertInstanceOf('FileEye\ImageInfo\core\Block\Exif', $jpeg->getElement("jpegSegment/exif"));
        $this->assertInstanceOf('FileEye\ImageInfo\core\Block\Tiff', $jpeg->getElement("jpegSegment/exif/tiff"));

        $ifd0 = $jpeg->getElement("jpegSegment/exif/tiff/ifd[@name='IFD0']");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Block\Ifd', $ifd0);

        $ratingPercent = $ifd0->getElement("tag[@name='RatingPercent']/entry");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Entry\Core\Short', $ratingPercent);
        $this->assertEquals(78, $ratingPercent->getValue());

        $exifIfd = $ifd0->getElement("ifd[@name='Exif']");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Block\Ifd', $exifIfd);

        $offsetTime = $exifIfd->getElement("tag[@name='OffsetTime']/entry");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Entry\Core\Ascii', $offsetTime);
        $this->assertEquals('-09:00', $offsetTime->getValue());

        $offsetTimeDigitized = $exifIfd->getElement("tag[@name='OffsetTimeDigitized']/entry");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Entry\Core\Ascii', $offsetTimeDigitized);
        $this->assertEquals('-10:00', $offsetTimeDigitized->getValue());

        $offsetTimeOriginal = $exifIfd->getElement("tag[@name='OffsetTimeOriginal']/entry");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Entry\Core\Ascii', $offsetTimeOriginal);
        $this->assertEquals('-11:00', $offsetTimeOriginal->getValue());
    }
}
