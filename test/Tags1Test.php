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

        $ratingPercent = $ifd0->xxGetSubBlockByName('Tag', 'RatingPercent');
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Short', $ratingPercent->getEntry());
        $this->assertEquals(78, $ratingPercent->getEntry()->getValue());

        $exifIfd = $ifd0->xxGetSubBlockByName('Ifd', 'Exif');
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $exifIfd);

        $offsetTime = $exifIfd->xxGetSubBlockByName('Tag', 'OffsetTime');
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTime->getEntry());
        $this->assertEquals('-09:00', $offsetTime->getEntry()->getValue());

        $offsetTimeDigitized = $exifIfd->xxGetSubBlockByName('Tag', 'OffsetTimeDigitized');
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTimeDigitized->getEntry());
        $this->assertEquals('-10:00', $offsetTimeDigitized->getEntry()->getValue());

        $offsetTimeOriginal = $exifIfd->xxGetSubBlockByName('Tag', 'OffsetTimeOriginal');
        $this->assertInstanceOf('ExifEye\core\Entry\Core\Ascii', $offsetTimeOriginal->getEntry());
        $this->assertEquals('-11:00', $offsetTimeOriginal->getEntry()->getValue());
    }
}
