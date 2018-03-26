<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Block\Jpeg;
use ExifEye\Test\core\ExifEyeTestCaseBase;
use ExifEye\core\Spec;
use Symfony\Component\Yaml\Yaml;

/**
 * Test camera images stored in the imagetest directory.
 */
class CameraTest extends ExifEyeTestCaseBase
{
    public function testParse()
    {
        $test = Yaml::parseFile(dirname(__FILE__) . '/imagetests/apple-iphone7.JPG.test.yml');

        $jpeg = new Jpeg(dirname(__FILE__) . '/imagetests/' . $test['jpeg']);

        $exif = $jpeg->getExif();
        $this->assertInstanceOf($test['exif']['class'], $exif);

        $tiff = $exif->getTiff();
        $this->assertInstanceOf($test['exif']['tiff']['class'], $tiff);

        $ifd0 = $tiff->getIfd();
        $this->assertInstanceOf($test['exif']['tiff']['IFD0']['class'], $ifd0);

        $this->assertCount($test['exif']['tiff']['IFD0']['counts']['entries'], $ifd0->getEntries());
        $this->assertCount($test['exif']['tiff']['IFD0']['counts']['subIfds'], $ifd0->getSubIfds());
        
        foreach ($test['exif']['tiff']['IFD0']['entries'] as $test_entry => $test_entry_data) {
            $entry = $ifd0->getEntry(Spec::getTagIdByName($ifd0->getType(), $test_entry));
            $this->assertInstanceOf($test_entry_data['class'], $entry);
            $this->assertEquals($test_entry_data['value'], $entry->getValue());
            $this->assertEquals($test_entry_data['text'], $entry->getText());
        }

/*        $entry = $ifd0->getEntry(271); // Make
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'Canon');
        $this->assertEquals($entry->getText(), 'Canon');

        $entry = $ifd0->getEntry(272); // Model
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'Canon DIGITAL IXUS II');
        $this->assertEquals($entry->getText(), 'Canon DIGITAL IXUS II');

        $entry = $ifd0->getEntry(274); // Orientation
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 6);
        $this->assertEquals($entry->getText(), 'right - top');

        $entry = $ifd0->getEntry(282); // XResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 180,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '180/1');

        $entry = $ifd0->getEntry(283); // YResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 180,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '180/1');

        $entry = $ifd0->getEntry(296); // ResolutionUnit
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'Inch');

        $entry = $ifd0->getEntry(306); // DateTime
        $this->assertInstanceOf('ExifEye\core\Entry\Time', $entry);
        $this->assertEquals($entry->getValue(), 1089488628);
        $this->assertEquals($entry->getText(), '2004:07:10 19:43:48');

        $entry = $ifd0->getEntry(531); // YCbCrPositioning
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'centered');

        $this->assertEquals(count($ifd0->getSubIfds()), 1);
        $ifd0_0 = $ifd0->getSubIfd(Spec::getIfdIdByType('Exif')); // IFD Exif
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd0_0);

        $this->assertEquals(count($ifd0_0->getEntries()), 29);

        $entry = $ifd0_0->getEntry(33434); // ExposureTime
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 1,
            1 => 30
        ]);
        $this->assertEquals($entry->getText(), '1/30 sec.');

        $entry = $ifd0_0->getEntry(33437); // FNumber
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 32,
            1 => 10
        ]);
        $this->assertEquals($entry->getText(), 'f/3.2');

        $entry = $ifd0_0->getEntry(36864); // ExifVersion
        $this->assertInstanceOf('ExifEye\core\Entry\Version', $entry);
        $this->assertEquals($entry->getValue(), 2.2);
        $this->assertEquals($entry->getText(), 'Exif Version 2.2');

        $entry = $ifd0_0->getEntry(36867); // DateTimeOriginal
        $this->assertInstanceOf('ExifEye\core\Entry\Time', $entry);
        $this->assertEquals($entry->getValue(), 1089488628);
        $this->assertEquals($entry->getText(), '2004:07:10 19:43:48');

        $entry = $ifd0_0->getEntry(36868); // DateTimeDigitized
        $this->assertInstanceOf('ExifEye\core\Entry\Time', $entry);
        $this->assertEquals($entry->getValue(), 1089488628);
        $this->assertEquals($entry->getText(), '2004:07:10 19:43:48');

        $entry = $ifd0_0->getEntry(37121); // ComponentsConfiguration
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $this->assertEquals($entry->getValue(), "\x01\x02\x03\0");
        $this->assertEquals($entry->getText(), 'Y Cb Cr -');

        $entry = $ifd0_0->getEntry(37122); // CompressedBitsPerPixel
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 2,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '2/1');

        $entry = $ifd0_0->getEntry(37377); // ShutterSpeedValue
        $this->assertInstanceOf('ExifEye\core\Entry\SignedRational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 157,
            1 => 32
        ]);
        $this->assertEquals($entry->getText(), '157/32 sec. (APEX: 5)');

        $entry = $ifd0_0->getEntry(37378); // ApertureValue
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 107,
            1 => 32
        ]);
        $this->assertEquals($entry->getText(), 'f/3.2');

        $entry = $ifd0_0->getEntry(37380); // ExposureBiasValue
        $this->assertInstanceOf('ExifEye\core\Entry\SignedRational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => - 1,
            1 => 3
        ]);
        $this->assertEquals($entry->getText(), '-0.3');

        $entry = $ifd0_0->getEntry(37381); // MaxApertureValue
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 107,
            1 => 32
        ]);
        $this->assertEquals($entry->getText(), '107/32');

        $entry = $ifd0_0->getEntry(37383); // MeteringMode
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 5);
        $this->assertEquals($entry->getText(), 'Pattern');

        $entry = $ifd0_0->getEntry(37385); // Flash
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 16);
        $this->assertEquals($entry->getText(), 'Flash did not fire, compulsory flash mode.');

        $entry = $ifd0_0->getEntry(37386); // FocalLength
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 215,
            1 => 32
        ]);
        $this->assertEquals($entry->getText(), '6.7 mm');

        $entry = $ifd0_0->getEntry(37500); // MakerNote
        $this->assertNull($entry);

        $entry = $ifd0_0->getEntry(37510); // UserComment
        $this->assertInstanceOf('ExifEye\core\Entry\UserComment', $entry);

        $expected = "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0";
        $this->assertEquals($entry->getValue(), $expected);

        $expected = "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0";
        $this->assertEquals($entry->getText(), $expected);

        $entry = $ifd0_0->getEntry(40960); // FlashPixVersion
        $this->assertInstanceOf('ExifEye\core\Entry\Version', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'FlashPix Version 1.0');

        $entry = $ifd0_0->getEntry(40961); // ColorSpace
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'sRGB');

        $entry = $ifd0_0->getEntry(40962); // PixelXDimension
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 640);
        $this->assertEquals($entry->getText(), '640');

        $entry = $ifd0_0->getEntry(40963); // PixelYDimension
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 480);
        $this->assertEquals($entry->getText(), '480');

        $entry = $ifd0_0->getEntry(41486); // FocalPlaneXResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 640000,
            1 => 208
        ]);
        $this->assertEquals($entry->getText(), '640000/208');

        $entry = $ifd0_0->getEntry(41487); // FocalPlaneYResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 480000,
            1 => 156
        ]);
        $this->assertEquals($entry->getText(), '480000/156');

        $entry = $ifd0_0->getEntry(41488); // FocalPlaneResolutionUnit
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'Inch');

        $entry = $ifd0_0->getEntry(41495); // SensingMethod
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'One-chip color area sensor');

        $entry = $ifd0_0->getEntry(41728); // FileSource
        $this->assertInstanceOf('ExifEye\core\Entry\Undefined', $entry);
        $this->assertEquals($entry->getValue(), "\x03");
        $this->assertEquals($entry->getText(), 'DSC');

        $entry = $ifd0_0->getEntry(41985); // CustomRendered
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 0);
        $this->assertEquals($entry->getText(), 'Normal process');

        $entry = $ifd0_0->getEntry(41986); // ExposureMode
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'Manual exposure');

        $entry = $ifd0_0->getEntry(41987); // WhiteBalance
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'Manual white balance');

        $entry = $ifd0_0->getEntry(41988); // DigitalZoomRatio
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 2048,
            1 => 2048
        ]);
        $this->assertEquals($entry->getText(), '2048/2048');

        $entry = $ifd0_0->getEntry(41990); // SceneCaptureType
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 0);
        $this->assertEquals($entry->getText(), 'Standard');

        $this->assertEquals(count($ifd0_0->getSubIfds()), 2);
        $ifd0_0_0 = $ifd0_0->getSubIfd(4); // IFD Interoperability
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd0_0_0);

        $this->assertEquals(count($ifd0_0_0->getEntries()), 4);

        $entry = $ifd0_0_0->getEntry(1); // InteroperabilityIndex
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'R98');
        $this->assertEquals($entry->getText(), 'R98');

        $entry = $ifd0_0_0->getEntry(2); // InteroperabilityVersion
        $this->assertInstanceOf('ExifEye\core\Entry\Version', $entry);
        $this->assertEquals($entry->getValue(), 1);
        $this->assertEquals($entry->getText(), 'Interoperability Version 1.0');

        $entry = $ifd0_0_0->getEntry(4097); // RelatedImageWidth
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 640);
        $this->assertEquals($entry->getText(), '640');

        $entry = $ifd0_0_0->getEntry(4098); // RelatedImageLength
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 480);
        $this->assertEquals($entry->getText(), '480');

        $this->assertEquals(count($ifd0_0_0->getSubIfds()), 0);

        $this->assertEquals($ifd0_0_0->getThumbnailData(), '');

        $ifd0_0_1 = $ifd0_0_0->getNextIfd();
        $this->assertNull($ifd0_0_1);

        $this->assertEquals($ifd0_0->getThumbnailData(), '');

        $ifd0_1 = $ifd0_0->getNextIfd();
        $this->assertNull($ifd0_1);

        $this->assertEquals($ifd0->getThumbnailData(), '');

        $ifd1 = $ifd0->getNextIfd();
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd1);

        $this->assertEquals(count($ifd1->getEntries()), 4);

        $entry = $ifd1->getEntry(259); // Compression
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 6);
        $this->assertEquals($entry->getText(), 'JPEG compression');

        $entry = $ifd1->getEntry(282); // XResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 180,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '180/1');

        $entry = $ifd1->getEntry(283); // YResolution
        $this->assertInstanceOf('ExifEye\core\Entry\Rational', $entry);
        $this->assertEquals($entry->getValue(), [
            0 => 180,
            1 => 1
        ]);
        $this->assertEquals($entry->getText(), '180/1');

        $entry = $ifd1->getEntry(296); // ResolutionUnit
        $this->assertInstanceOf('ExifEye\core\Entry\Short', $entry);
        $this->assertEquals($entry->getValue(), 2);
        $this->assertEquals($entry->getText(), 'Inch');

        $this->assertEquals(count($ifd1->getSubIfds()), 0);

        $thumb_data = file_get_contents(dirname(__FILE__) . '/canon-ixus-ii-thumb.jpg');
        $this->assertEquals($ifd1->getThumbnailData(), $thumb_data);

        $ifd2 = $ifd1->getNextIfd();
        $this->assertNull($ifd2);

        $ifd0_mn = $ifd0_0->getSubIfd(Spec::getIfdIdByType('CanonMakerNotes')); // IFD MakerNotes
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd0_mn);

        $entry = $ifd0_mn->getEntry(6); // ImageType
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'IMG:DIGITAL IXUS II JPEG');

        $entry = $ifd0_mn->getEntry(7); // FirmwareVersion
        $this->assertInstanceOf('ExifEye\core\Entry\Ascii', $entry);
        $this->assertEquals($entry->getValue(), 'Firmware Version 1.00');

        $entry = $ifd0_mn->getEntry(8); // FileNumber
        $this->assertInstanceOf('ExifEye\core\Entry\Long', $entry);
        $this->assertEquals($entry->getValue(), '1202044');

        $ifd0_mn_cs = $ifd0_mn->getSubIfd(Spec::getIfdIdByType('CanonCameraSettings')); // CameraSettings
        $this->assertInstanceOf('ExifEye\core\Block\IfdIndexShort', $ifd0_mn_cs);
        $this->assertEquals(count($ifd0_mn_cs->getEntries()), 37);

        $entry = $ifd0_mn_cs->getEntry(1); // MacroMode
        $this->assertInstanceOf('ExifEye\core\Entry\SignedShort', $entry);
        $this->assertEquals($entry->getValue(), '2');
        $this->assertEquals($entry->getText(), 'Normal');

        $entry = $ifd0_mn_cs->getEntry(9); // RecordMode
        $this->assertInstanceOf('ExifEye\core\Entry\SignedShort', $entry);
        $this->assertEquals($entry->getValue(), '1');
        $this->assertEquals($entry->getText(), 'JPEG');

        $this->assertCount(3, ExifEye::getExceptions());
*/
    }
}
