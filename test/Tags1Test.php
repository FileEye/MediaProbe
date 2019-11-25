<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\Image;
use FileEye\ImageProbe\core\Block\Ifd;
use FileEye\ImageProbe\core\Block\Jpeg;
use FileEye\ImageProbe\core\Collection;

class Tags1Test extends ImageProbeTestCaseBase
{
    public function testTags()
    {
        $image = Image::createFromFile(dirname(__FILE__) . '/image_files/test-tags-1.jpg', null, 'error');
        $jpeg = $image->getElement("jpeg");

        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Exif', $jpeg->getElement("jpegSegment/exif"));
        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Tiff', $jpeg->getElement("jpegSegment/exif/tiff"));

        $ifd0 = $jpeg->getElement("jpegSegment/exif/tiff/ifd[@name='IFD0']");
        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Ifd', $ifd0);

        $ratingPercent = $ifd0->getElement("tag[@name='RatingPercent']/entry");
        $this->assertInstanceOf('FileEye\ImageProbe\core\Entry\Core\Short', $ratingPercent);
        $this->assertEquals(78, $ratingPercent->getValue());

        $exifIfd = $ifd0->getElement("ifd[@name='Exif']");
        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Ifd', $exifIfd);

        $offsetTime = $exifIfd->getElement("tag[@name='OffsetTime']/entry");
        $this->assertInstanceOf('FileEye\ImageProbe\core\Entry\Core\Ascii', $offsetTime);
        $this->assertEquals('-09:00', $offsetTime->getValue());

        $offsetTimeDigitized = $exifIfd->getElement("tag[@name='OffsetTimeDigitized']/entry");
        $this->assertInstanceOf('FileEye\ImageProbe\core\Entry\Core\Ascii', $offsetTimeDigitized);
        $this->assertEquals('-10:00', $offsetTimeDigitized->getValue());

        $offsetTimeOriginal = $exifIfd->getElement("tag[@name='OffsetTimeOriginal']/entry");
        $this->assertInstanceOf('FileEye\ImageProbe\core\Entry\Core\Ascii', $offsetTimeOriginal);
        $this->assertEquals('-11:00', $offsetTimeOriginal->getValue());
    }
}
