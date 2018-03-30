<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Spec;

class Tags1Test extends ExifEyeTestCaseBase
{
    public function testTags()
    {
        ExifEye::setStrictParsing(true);
        $jpeg = new Jpeg(dirname(__FILE__) . '/images/test-tags-1.jpg');

        $exif = $jpeg->getExif();
        $this->assertInstanceOf('ExifEye\core\Block\Exif', $exif);

        $tiff = $exif->getTiff();
        $this->assertInstanceOf('ExifEye\core\Block\Tiff', $tiff);

        $ifd0 = $tiff->getIfd();
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd0);

        $ratingPercent = $ifd0->getTagByName('RatingPercent');
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $ratingPercent->getEntry());
        $this->assertEquals(78, $ratingPercent->xxGetValue());

        $exifIfd = $ifd0->getSubIfd(Spec::getIfdIdByType('Exif'));
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $exifIfd);

        $offsetTime = $exifIfd->getTagByName('OffsetTime');
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $offsetTime->getEntry());
        $this->assertEquals('-09:00', $offsetTime->xxGetValue());

        $offsetTimeDigitized = $exifIfd->getTagByName('OffsetTimeDigitized');
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $offsetTimeDigitized->getEntry());
        $this->assertEquals('-10:00', $offsetTimeDigitized->xxGetValue());

        $offsetTimeOriginal = $exifIfd->getTagByName('OffsetTimeOriginal');
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $offsetTimeOriginal->getEntry());
        $this->assertEquals('-11:00', $offsetTimeOriginal->xxGetValue());
    }
}
