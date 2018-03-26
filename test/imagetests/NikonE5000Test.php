<?php

namespace ExifEye\Test\core\imagetests;

use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use lsolesen\pel\PelJpeg;
use ExifEye\Test\core\ExifEyeTestCaseBase;

class NikonE5000Test extends ExifEyeTestCaseBase
{
    public function testRead()
    {
        $jpeg = new PelJpeg(dirname(__FILE__) . '/nikon-e5000.jpg');

        $exif = $jpeg->getExif();
        $this->assertInstanceOf('lsolesen\pel\PelExif', $exif);

        $tiff = $exif->getTiff();
        $this->assertInstanceOf('ExifEye\core\Block\Tiff', $tiff);

        /* The first IFD. */
        $ifd0 = $tiff->getIfd();
        $this->assertInstanceOf('lsolesen\pel\PelIfd', $ifd0);

        /* Start of IDF $ifd0. */
        $this->assertEquals(count($ifd0->getEntries()), 9);

        $entry = $ifd0->getEntry(270); // ImageDescription
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), '          ');
        $this->assertEquals($entry->getText(), '          ');

        $entry = $ifd0->getEntry(271); // Make
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'NIKON');
        $this->assertEquals($entry->getText(), 'NIKON');

        $entry = $ifd0->getEntry(272); // Model
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'E5000');
        $this->assertEquals($entry->getText(), 'E5000');

        $entry = $ifd0->getEntry(282); // XResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 300,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '300/1');

        $entry = $ifd0->getEntry(283); // YResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 300,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '300/1');

        $entry = $ifd0->getEntry(296); // ResolutionUnit
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'Inch');

        $entry = $ifd0->getEntry(305); // Software
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'E5000v1.6');
        $this->assertEquals($entry->getText(), 'E5000v1.6');

        $entry = $ifd0->getEntry(306); // DateTime
        $this->assertInstanceOf('ExifEye\core\Entry\Time', $entry);
        $this->assertEquals($entry->getValue(), 1021992832);
        $this->assertEquals($entry->getText(), '2002:05:21 14:53:52');

        $entry = $ifd0->getEntry(531); // YCbCrPositioning
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'centered');

        /* Sub IFDs of $ifd0. */
        $this->assertEquals(count($ifd0->getSubIfds()), 2);
        $ifd0_0 = $ifd0->getSubIfd(2); // IFD Exif
        $this->assertInstanceOf('lsolesen\pel\PelIfd', $ifd0_0);

        /* Start of IDF $ifd0_0. */
        $this->assertEquals(count($ifd0_0->getEntries()), 22);

        $entry = $ifd0_0->getEntry(33434); // ExposureTime
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 1642036,
            1 => 100000000
        ]);
        $this->assertEquals($entry->getText(), '1/60 sec.');

        $entry = $ifd0_0->getEntry(33437); // FNumber
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 28,
            1 => 10
        ]);
        $this->assertEquals($entry->getText(), 'f/2.8');

        $entry = $ifd0_0->getEntry(34850); // ExposureProgram
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'Normal program');

        $entry = $ifd0_0->getEntry(34855); // ISOSpeedRatings
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 100);
        $this->assertEquals($entry->getText(), '100');

        $entry = $ifd0_0->getEntry(36864); // ExifVersion
        $this->assertInstanceOf('ExifEye\core\Entry\Version', $entry);
        $this->assertEquals($entry->getValue(), 2.1);
        $this->assertEquals($entry->getText(), 'Exif Version 2.1');

        $entry = $ifd0_0->getEntry(36867); // DateTimeOriginal
        $this->assertInstanceOf('ExifEye\core\Entry\Time', $entry);
        $this->assertEquals($entry->getValue(), 1021992832);
        $this->assertEquals($entry->getText(), '2002:05:21 14:53:52');

        $entry = $ifd0_0->getEntry(36868); // DateTimeDigitized
        $this->assertInstanceOf('ExifEye\core\Entry\Time', $entry);
        $this->assertEquals($entry->getValue(), 1021992832);
        $this->assertEquals($entry->getText(), '2002:05:21 14:53:52');

        $entry = $ifd0_0->getEntry(37121); // ComponentsConfiguration
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $this->assertEquals($entry->getValue(), "\x01\x02\x03\0");
        $this->assertEquals($entry->getText(), 'Y Cb Cr -');

        $entry = $ifd0_0->getEntry(37380); // ExposureBiasValue
        $this->assertInstanceOf('ExifEye\core\Entry\SignedRational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 0,
            1 => 10
        ]);
        $this->assertEquals($entry->getText(), '0.0');

        $entry = $ifd0_0->getEntry(37381); // MaxApertureValue
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 3,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '3/1');

        $entry = $ifd0_0->getEntry(37383); // MeteringMode
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 5);
        $this->assertEquals($entry->getText(), 'Pattern');

        $entry = $ifd0_0->getEntry(37384); // LightSource
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 0);
        $this->assertEquals($entry->getText(), 'Unknown');

        $entry = $ifd0_0->getEntry(37385); // Flash
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 0);
        $this->assertEquals($entry->getText(), 'Flash did not fire.');

        $entry = $ifd0_0->getEntry(37386); // FocalLength
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 71,
            1 => 10
        ]);
        $this->assertEquals($entry->getText(), '7.1 mm');

        $entry = $ifd0_0->getEntry(37500); // MakerNote
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $expected = "\x15\0\x01\0\x07\0\x04\0\0\0\0\x01\0\0\x02\0\x03\0\x02\0\0\0\0\0\0\0\x03\0\x02\0\x06\0\0\0\xbc\x03\0\0\x04\0\x02\0\x08\0\0\0\xc2\x03\0\0\x05\0\x02\0\x0d\0\0\0\xca\x03\0\0\x06\0\x02\0\x07\0\0\0\xd8\x03\0\0\x07\0\x02\0\x07\0\0\0\xe0\x03\0\0\x08\0\x02\0\x0d\0\0\0\xe8\x03\0\0\x0a\0\x05\0\x01\0\0\0\xf6\x03\0\0\x0f\0\x02\0\x07\0\0\0\xfe\x03\0\0\x11\0\x04\0\x01\0\0\0\x14\x05\0\0\x80\0\x02\0\x0e\0\0\0\x06\x04\0\0\x82\0\x02\0\x0d\0\0\0\x14\x04\0\0\x85\0\x05\0\x01\0\0\0\x22\x04\0\0\x86\0\x05\0\x01\0\0\0\x2a\x04\0\0\x88\0\x07\0\x04\0\0\0\0\0\0\0\x8f\0\x02\0\x11\0\0\0\x32\x04\0\0\x94\0\x08\0\x01\0\0\0\0\0\0\0\x95\0\x02\0\x05\0\0\0\x44\x04\0\0\0\x0e\x07\0\xca\0\0\0\x4a\x04\0\0\x10\x0e\x04\0\x01\0\0\0\x72\x05\0\0\0\0\0\0\x43\x4f\x4c\x4f\x52\0\x46\x49\x4e\x45\x20\x20\x20\0\x41\x55\x54\x4f\x20\x20\x20\x20\x20\x20\x20\x20\0\x31\x41\x55\x54\x4f\x20\x20\0\0\x41\x46\x2d\x43\x20\x20\0\x3a\x4e\x4f\x52\x4d\x41\x4c\x20\x20\x20\x20\x20\x20\0\0\x80\x22\0\0\xe8\x03\0\0\x41\x55\x54\x4f\x20\x20\0\0\x41\x55\x54\x4f\x20\x20\x20\x20\x20\x20\x20\x20\x20\0\x4f\x46\x46\x20\x20\x20\x20\x20\x20\x20\x20\x20\0\x20\0\0\0\0\0\0\0\0\x01\0\0\0\x01\0\0\0\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\0\x20\x4f\x46\x46\x20\0\x20\x50\x72\x69\x6e\x74\x49\x4d\0\x30\x31\x30\x30\0\0\x0d\0\x01\0\x16\0\x16\0\x02\0\x01\0\0\0\x03\0\x5e\0\0\0\x07\0\0\0\0\0\x08\0\0\0\0\0\x09\0\0\0\0\0\x0a\0\0\0\0\0\x0b\0\xa6\0\0\0\x0c\0\0\0\0\0\x0d\0\0\0\0\0\x0e\0\xbe\0\0\0\0\x01\x05\0\0\0\x01\x01\x01\0\0\0\x09\x11\0\0\x10\x27\0\0\x0b\x0f\0\0\x10\x27\0\0\x97\x05\0\0\x10\x27\0\0\xb0\x08\0\0\x10\x27\0\0\x01\x1c\0\0\x10\x27\0\0\x5e\x02\0\0\x10\x27\0\0\x8b\0\0\0\x10\x27\0\0\xcb\x03\0\0\x10\x27\0\0\xe5\x1b\0\0\x10\x27\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\x06\0";
        $this->assertEquals($entry->getValue(), $expected);
        $this->assertEquals($entry->getText(), '604 bytes unknown MakerNote data');

        $entry = $ifd0_0->getEntry(37510); // UserComment
        $this->assertInstanceOf('ExifEye\core\Entry\UserComment', $entry);
        $this->assertEquals($entry->getValue(), '                                                                                                                     ');
        $this->assertEquals($entry->getText(), '                                                                                                                     ');

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
        $this->assertEquals($entry->getValue(), 1600);
        $this->assertEquals($entry->getText(), '1600');

        $entry = $ifd0_0->getEntry(40963); // PixelYDimension
        $this->assertInstanceOf('ExifEye\core\Entry\Long', $entry);
        $this->assertEquals($entry->getValue(), 1200);
        $this->assertEquals($entry->getText(), '1200');

        $entry = $ifd0_0->getEntry(41728); // FileSource
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $this->assertEquals($entry->getValue(), "\x03");
        $this->assertEquals($entry->getText(), 'DSC');

        $entry = $ifd0_0->getEntry(41729); // SceneType
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $this->assertEquals($entry->getValue(), "\x01");
        $this->assertEquals($entry->getText(), 'Directly photographed');

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
        $this->assertInstanceOf('lsolesen\pel\PelIfd', $ifd1);
        /* End of IFD $ifd0. */

        /* Start of IDF $ifd1. */
        $this->assertEquals(count($ifd1->getEntries()), 4);

        $entry = $ifd1->getEntry(259); // Compression
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 6);
        $this->assertEquals($entry->getText(), 'JPEG compression');

        $entry = $ifd1->getEntry(282); // XResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 72,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '72/1');

        $entry = $ifd1->getEntry(283); // YResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 72,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '72/1');

        $entry = $ifd1->getEntry(296); // ResolutionUnit
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'Inch');

        /* Sub IFDs of $ifd1. */
        $this->assertEquals(count($ifd1->getSubIfds()), 0);

        $thumb_data = file_get_contents(dirname(__FILE__) . '/nikon-e5000-thumb.jpg');
        $this->assertEquals($ifd1->getThumbnailData(), $thumb_data);

        /* Next IFD. */
        $ifd2 = $ifd1->getNextIfd();
        $this->assertNull($ifd2);
        /* End of IFD $ifd1. */

        $exceptions = ExifEye::getExceptions();
        $this->assertInstanceOf('ExifEye\core\ExifEyeException', $exceptions[0]);
        $this->assertEquals($exceptions[0]->getMessage(), 'Found trailing content after EOI: 1396 bytes');
    }
}
