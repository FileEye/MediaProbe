<?php

namespace ExifEye\Test\core\imagetests;

use ExifEye\core\ExifEye;
use ExifEye\core\Block\Jpeg;
use ExifEye\Test\core\ExifEyeTestCaseBase;

class NikonCoolscanIVTest extends ExifEyeTestCaseBase
{
    public function testRead()
    {
        $jpeg = new Jpeg(dirname(__FILE__) . '/nikon-coolscan-iv.jpg');

        $exif = $jpeg->getExif();
        $this->assertInstanceOf('ExifEye\core\Block\Exif', $exif);

        $tiff = $exif->getTiff();
        $this->assertInstanceOf('ExifEye\core\Block\Tiff', $tiff);

        /* The first IFD. */
        $ifd0 = $tiff->getIfd();
        $this->assertInstanceOf('lsolesen\pel\PelIfd', $ifd0);

        /* Start of IDF $ifd0. */
        $this->assertEquals(count($ifd0->getEntries()), 6);

        $entry = $ifd0->getEntry(271); // Make
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'Nikon');
        $this->assertEquals($entry->getText(), 'Nikon');

        $entry = $ifd0->getEntry(282); // XResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 2000,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '2000/1');

        $entry = $ifd0->getEntry(283); // YResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 2000,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '2000/1');

        $entry = $ifd0->getEntry(296); // ResolutionUnit
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'Inch');

        $entry = $ifd0->getEntry(306); // DateTime
        $this->assertInstanceOf('ExifEye\core\Entry\Time', $entry);
        $this->assertEquals($entry->getValue(), 1090023875);
        $this->assertEquals($entry->getText(), '2004:07:17 00:24:35');

        $entry = $ifd0->getEntry(531); // YCbCrPositioning
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'centered');

        /* Sub IFDs of $ifd0. */
        $this->assertEquals(count($ifd0->getSubIfds()), 2);
        $ifd0_0 = $ifd0->getSubIfd(2); // IFD Exif
        $this->assertInstanceOf('lsolesen\pel\PelIfd', $ifd0_0);

        /* Start of IDF $ifd0_0. */
        $this->assertEquals(count($ifd0_0->getEntries()), 7);

        $entry = $ifd0_0->getEntry(36864); // ExifVersion
        $this->assertInstanceOf('ExifEye\core\Entry\Version', $entry);
        $this->assertEquals($entry->getValue(), 2.1);
        $this->assertEquals($entry->getText(), 'Exif Version 2.1');

        $entry = $ifd0_0->getEntry(37121); // ComponentsConfiguration
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $this->assertEquals($entry->getValue(), "\x01\x02\x03\0");
        $this->assertEquals($entry->getText(), 'Y Cb Cr -');

        $entry = $ifd0_0->getEntry(37500); // MakerNote
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $expected = "\x02\0\x01\0\x07\0\x04\0\0\0\x30\x31\x30\x30\x10\x0e\x04\0\x01\0\0\0\x16\x01\0\0\0\0\0\0\x05\0";
        $this->assertEquals($entry->getValue(), $expected);
        $this->assertEquals($entry->getText(), '32 bytes unknown MakerNote data');

        $entry = $ifd0_0->getEntry(40960); // FlashPixVersion
        $this->assertInstanceOf('ExifEye\core\Entry\Version', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'FlashPix Version 1.0');

        $entry = $ifd0_0->getEntry(40961); // ColorSpace
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'sRGB');

        $entry = $ifd0_0->getEntry(40962); // PixelXDimension
        $this->assertInstanceOf('ExifEye\core\Entry\Long', $entry);
        $this->assertEquals($entry->getValue(), 960);
        $this->assertEquals($entry->getText(), '960');

        $entry = $ifd0_0->getEntry(40963); // PixelYDimension
        $this->assertInstanceOf('ExifEye\core\Entry\Long', $entry);
        $this->assertEquals($entry->getValue(), 755);
        $this->assertEquals($entry->getText(), '755');

        /* Sub IFDs of $ifd0_0. */
        $this->assertEquals(count($ifd0_0->getSubIfds()), 0);

        $this->assertEquals($ifd0_0->getThumbnailData(), '');

        /* Next IFD. */
        $ifd0_1 = $ifd0_0->getNextIfd();
        $this->assertNull($ifd0_1);
        /* End of IFD $ifd0_0. */
        $ifd0_1 = $ifd0->getSubIfd(3); // IFD GPS
        $this->assertInstanceOf('lsolesen\pel\PelIfd', $ifd0_1);

        /* Start of IDF $ifd0_1. */
        $this->assertEquals(count($ifd0_1->getEntries()), 0);

        /* Sub IFDs of $ifd0_1. */
        $this->assertEquals(count($ifd0_1->getSubIfds()), 0);

        $this->assertEquals($ifd0_1->getThumbnailData(), '');

        /* Next IFD. */
        $ifd0_2 = $ifd0_1->getNextIfd();
        $this->assertNull($ifd0_2);
        /* End of IFD $ifd0_1. */

        $this->assertEquals($ifd0->getThumbnailData(), '');

        /* Next IFD. */
        $ifd1 = $ifd0->getNextIfd();
        $this->assertNull($ifd1);
        /* End of IFD $ifd0. */

        $this->assertTrue(count(ExifEye::getExceptions()) == 0);
    }
}
