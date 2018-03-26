<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Jpeg;

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

        $ratingPercent = $ifd0->getEntry(0x4749);
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $ratingPercent);
        $this->assertEquals(78, $ratingPercent->getValue());

        $exifIfd = $ifd0->getSubIfd(Spec::getIfdIdByType('Exif'));
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $exifIfd);

        $offsetTime = $exifIfd->getEntry(0x9010);
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $offsetTime);
        $this->assertEquals('-09:00', $offsetTime->getValue());

        $offsetTimeDigitized = $exifIfd->getEntry(0x9012);
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $offsetTimeDigitized);
        $this->assertEquals('-10:00', $offsetTimeDigitized->getValue());

        $offsetTimeOriginal = $exifIfd->getEntry(0x9011);
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $offsetTimeOriginal);
        $this->assertEquals('-11:00', $offsetTimeOriginal->getValue());
    }
}
