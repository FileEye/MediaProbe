<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use lsolesen\pel\PelJpeg;

class Tags1Test extends ExifEyeTestCaseBase
{
    public function testTags()
    {
        ExifEye::setStrictParsing(true);
        $jpeg = new PelJpeg(dirname(__FILE__) . '/images/test-tags-1.jpg');

        $exif = $jpeg->getExif();
        $this->assertInstanceOf('\lsolesen\pel\PelExif', $exif);

        $tiff = $exif->getTiff();
        $this->assertInstanceOf('\lsolesen\pel\PelTiff', $tiff);

        $ifd0 = $tiff->getIfd();
        $this->assertInstanceOf('\lsolesen\pel\PelIfd', $ifd0);

        $ratingPercent = $ifd0->getEntry(\lsolesen\pel\PelTag::RATING_PERCENT);
        $this->assertInstanceOf('\lsolesen\pel\PelEntry', $ratingPercent);
        $this->assertEquals(78, $ratingPercent->getValue());

        $exifIfd = $ifd0->getSubIfd(\lsolesen\pel\PelIfd::EXIF);
        $this->assertInstanceOf('\lsolesen\pel\PelIfd', $exifIfd);

        $offsetTime = $exifIfd->getEntry(\lsolesen\pel\PelTag::OFFSET_TIME);
        $this->assertInstanceOf('\lsolesen\pel\PelEntry', $offsetTime);
        $this->assertEquals('-09:00', $offsetTime->getValue());

        $offsetTimeDigitized = $exifIfd->getEntry(\lsolesen\pel\PelTag::OFFSET_TIME_DIGITIZED);
        $this->assertInstanceOf('\lsolesen\pel\PelEntry', $offsetTimeDigitized);
        $this->assertEquals('-10:00', $offsetTimeDigitized->getValue());

        $offsetTimeOriginal = $exifIfd->getEntry(\lsolesen\pel\PelTag::OFFSET_TIME_ORIGINAL);
        $this->assertInstanceOf('\lsolesen\pel\PelEntry', $offsetTimeOriginal);
        $this->assertEquals('-11:00', $offsetTimeOriginal->getValue());
    }
}
