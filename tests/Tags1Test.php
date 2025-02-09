<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Media\Jpeg\ExifApp;
use FileEye\MediaProbe\Block\Media\Tiff;
use FileEye\MediaProbe\Media;

class Tags1Test extends MediaProbeTestCaseBase
{
    public function testTags()
    {
        $media = Media::createFromFile(dirname(__FILE__) . '/media-samples/image/test-tags-1.jpg', null, 'error');
        $jpeg = $media->getElement("jpeg");

        $this->assertInstanceOf(ExifApp::class, $jpeg->getElement("jpegSegment/exif"));
        $this->assertInstanceOf(Tiff::class, $jpeg->getElement("jpegSegment/exif/tiff"));

        $ifd0 = $jpeg->getElement("jpegSegment/exif/tiff/ifd[@name='IFD0']");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Tiff\Ifd', $ifd0);

        $ratingPercent = $ifd0->getElement("tag[@name='RatingPercent']/entry");
        $this->assertInstanceOf('FileEye\MediaProbe\Entry\Core\Short', $ratingPercent);
        $this->assertEquals(78, $ratingPercent->getValue());

        $exifIfd = $ifd0->getElement("ifd[@name='ExifIFD']");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Tiff\Ifd', $exifIfd);

        $offsetTime = $exifIfd->getElement("tag[@name='OffsetTime']/entry");
        $this->assertInstanceOf('FileEye\MediaProbe\Entry\Core\Ascii', $offsetTime);
        $this->assertEquals('-09:00', $offsetTime->getValue());

        $offsetTimeDigitized = $exifIfd->getElement("tag[@name='OffsetTimeDigitized']/entry");
        $this->assertInstanceOf('FileEye\MediaProbe\Entry\Core\Ascii', $offsetTimeDigitized);
        $this->assertEquals('-10:00', $offsetTimeDigitized->getValue());

        $offsetTimeOriginal = $exifIfd->getElement("tag[@name='OffsetTimeOriginal']/entry");
        $this->assertInstanceOf('FileEye\MediaProbe\Entry\Core\Ascii', $offsetTimeOriginal);
        $this->assertEquals('-11:00', $offsetTimeOriginal->getValue());
    }
}
