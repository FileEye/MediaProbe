<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\Block\Exif\Ifd;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Collection;

class Tags1Test extends MediaProbeTestCaseBase
{
    public function testTags()
    {
        $media = Media::createFromFile(dirname(__FILE__) . '/image_files/test-tags-1.jpg', null, 'error');
        $jpeg = $media->getElement("jpeg");

        $this->assertInstanceOf('FileEye\MediaProbe\Block\Exif\Exif', $jpeg->getElement("jpegSegment/exif"));
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Tiff', $jpeg->getElement("jpegSegment/exif/tiff"));

        $ifd0 = $jpeg->getElement("jpegSegment/exif/tiff/ifd[@name='IFD0']");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Exif\Ifd', $ifd0);

        $ratingPercent = $ifd0->getElement("tag[@name='RatingPercent']/entry");
        $this->assertInstanceOf('FileEye\MediaProbe\Entry\Core\Short', $ratingPercent);
        $this->assertEquals(78, $ratingPercent->getValue());

        $exifIfd = $ifd0->getElement("ifd[@name='ExifIFD']");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Exif\Ifd', $exifIfd);

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
