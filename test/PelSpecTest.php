<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\IfdIndexShort;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Spec;

/**
 * Test the PelSpec class.
 */
class PelSpecTest extends ExifEyeTestCaseBase
{
    /**
     * Tests the pre-compiled default specifications set.
     */
    public function testDefaultSpec()
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();
        $ifd_0 = new Ifd($tiff_mock, 'IFD0');
        $ifd_exif = new Ifd($tiff_mock, 'Exif');
        $ifd_canon_camera_settings = new IfdIndexShort($tiff_mock, 'CanonCameraSettings');

        // Test retrieving IFD id by type.
        $this->assertEquals(Spec::getIfdIdByType('IFD0'), Spec::getIfdIdByType('0'));
        $this->assertEquals(Spec::getIfdIdByType('IFD0'), Spec::getIfdIdByType('Main'));
        $this->assertNotNull(Spec::getIfdIdByType('CanonMakerNotes'));

        // Test retrieving IFD class.
        $this->assertEquals('ExifEye\core\Block\Ifd', Spec::getIfdClass('IFD0'));
        $this->assertEquals('ExifEye\core\Block\IfdIndexShort', Spec::getIfdClass('CanonCameraSettings'));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals([
            'ExifEye\core\Block\Thumbnail::toBlock',
            'ExifEye\core\Entry\ExifMakerNote::tagToIfd',
        ], Spec::getIfdPostLoadCallbacks($ifd_0));
        $this->assertEquals([], Spec::getIfdPostLoadCallbacks($ifd_canon_camera_settings));

        // Test retrieving maker note IFD.
        $this->assertEquals('CanonMakerNotes', Spec::getMakerNoteIfdName('Canon', 'any'));
        $this->assertNull(Spec::getMakerNoteIfdName('Minolta', 'any'));

        // Test retrieving TAG name.
        $this->assertEquals('ExifIFDPointer', Spec::getTagName($ifd_0, 0x8769));
        $this->assertEquals('ExposureTime', Spec::getTagName($ifd_exif, 0x829A));
        $this->assertEquals('Compression', Spec::getTagName($ifd_0, 0x0103));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, Spec::getTagIdByName($ifd_0, 'ExifIFDPointer'));
        $this->assertEquals(0x829A, Spec::getTagIdByName($ifd_exif, 'ExposureTime'));
        $this->assertEquals(0x0103, Spec::getTagIdByName($ifd_0, 'Compression'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertTrue(Spec::isTagAnIfdPointer($ifd_0, 0x8769));
        $this->assertEquals('Exif', Spec::getIfdNameFromTag($ifd_0, 0x8769));
        $this->assertFalse(Spec::isTagAnIfdPointer($ifd_exif, 0x829A));
        $this->assertNull(Spec::getIfdNameFromTag($ifd_0, 0x829A));

        // Check getTagFormat.
        $this->assertEquals([Format::UNDEFINED], Spec::getTagFormat($ifd_exif, 0x9286));
        $this->assertEquals([Format::SHORT, Format::LONG], Spec::getTagFormat($ifd_exif, 0xA002));

        // Check getTagTitle.
        $this->assertEquals('Exif IFD Pointer', Spec::getTagTitle($ifd_0, 0x8769));
        $this->assertEquals('Exposure Time', Spec::getTagTitle($ifd_exif, 0x829A));
        $this->assertEquals('Compression', Spec::getTagTitle($ifd_0, 0x0103));
    }

    /**
     * Tests the Spec::getEntryClass method.
     */
    public function testgetEntryClass()
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();
        $ifd_exif = new Ifd($tiff_mock, 'Exif');
        $ifd_canon_picture_information = new IfdIndexShort($tiff_mock, 'CanonPictureInformation');

        $this->assertEquals('ExifEye\core\Entry\ExifUserComment', Spec::getEntryClass($ifd_exif, 0x9286));
        $this->assertEquals('ExifEye\core\Entry\Time', Spec::getEntryClass($ifd_exif, 0x9003));
        //@todo drop the else part once PHP < 5.6 (hence PHPUnit 4.8.36) support is removed.
        //@todo change below to ExifEyeException::class once PHP 5.4 support is removed.
        if (method_exists($this, 'expectException')) {
            $this->expectException('ExifEye\core\ExifEyeException');
            $this->expectExceptionMessage("No format can be derived for tag: 0x0003 (ImageHeight) in ifd: 'CanonPictureInformation'");
        } else {
            $this->setExpectedException('ExifEye\core\ExifEyeException', "No format can be derived for tag: 0x0003 (ImageHeight) in ifd: 'CanonPictureInformation'");
        }
        $this->assertNull(Spec::getEntryClass($ifd_canon_picture_information, 0x0003));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     *
     * @dataProvider getTagTextProvider
     */
    public function testGetTagText($expected_text, $expected_class, $ifd_name, $tag, array $args, $brief = false)
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd = new Ifd($tiff_mock, $ifd_name);

        $tag_id = Spec::getTagIdByName($ifd, $tag);
        $entry_class_name = Spec::getEntryClass($ifd, $tag_id);
        $tag = new Tag($ifd, $tag_id, $entry_class_name, $args);

        $this->assertInstanceOf($expected_class, $tag->getElement("entry"));
        $options['short'] = $brief;  // xx
        $this->assertEquals($expected_text, $tag->getElement("entry")->toString($options));
    }

    /**
     * Data provider for testGetTagText.
     */
    public function getTagTextProvider()
    {
        return [
          'IFD0/PlanarConfiguration - value 1' => [
              'chunky format', 'ExifEye\core\Entry\Core\Short', 'IFD0', 'PlanarConfiguration', [1],
          ],
          'IFD0/PlanarConfiguration - missing mapping' => [
              6.1, 'ExifEye\core\Entry\Core\Short', 'IFD0', 'PlanarConfiguration', [6.1],
          ],
          'CanonPanoramaInformation/PanoramaDirection - value 4' => [
              '2x2 Matrix (Clockwise)', 'ExifEye\core\Entry\Core\SignedShort', 'CanonPanoramaInformation', 'PanoramaDirection', [4],
          ],
          'CanonCameraSettings/LensType - value 493' => [
              'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM', 'ExifEye\core\Entry\Core\Short', 'CanonCameraSettings', 'LensType', [493],
          ],
          'CanonCameraSettings/LensType - value 493.1' => [
              'Canon EF 24-105mm f/4L IS USM', 'ExifEye\core\Entry\Core\Short', 'CanonCameraSettings', 'LensType', [493.1],
          ],
          'IFD0/YCbCrSubSampling - value 2, 1' => [
              'YCbCr4:2:2', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'IFD0', 'YCbCrSubSampling', [2, 1],
          ],
          'IFD0/YCbCrSubSampling - value 2, 2' => [
              'YCbCr4:2:0', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'IFD0', 'YCbCrSubSampling', [2, 2],
          ],
          'IFD0/YCbCrSubSampling - value 6, 7' => [
              '6, 7', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'IFD0', 'YCbCrSubSampling', [6, 7],
          ],
          'Exif/SubjectArea - value 6, 7' => [
              '(x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'Exif', 'SubjectArea', [6, 7],
          ],
          'Exif/SubjectArea - value 5, 6, 7' => [
              'Within distance 5 of (x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'Exif', 'SubjectArea', [5, 6, 7],
          ],
          'Exif/SubjectArea - value 4, 5, 6, 7' => [
              'Within rectangle (width 4, height 5) around (x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'Exif', 'SubjectArea', [4, 5, 6, 7],
          ],
          'Exif/SubjectArea - wrong components' => [
              'Unexpected number of components (1, expected 2, 3, or 4).', 'ExifEye\core\Entry\ExifSubjectArea', 'Exif', 'SubjectArea', [6],
          ],
          'Exif/FNumber - value 60, 10' => [
              'f/6.0', 'ExifEye\core\Entry\ExifFNumber', 'Exif', 'FNumber', [[60, 10]],
          ],
          'Exif/FNumber - value 26, 10' => [
              'f/2.6', 'ExifEye\core\Entry\ExifFNumber', 'Exif', 'FNumber', [[26, 10]],
          ],
          'Exif/ApertureValue - value 60, 10' => [
              '8.0', 'ExifEye\core\Entry\ExifApertureValue', 'Exif', 'ApertureValue', [[60, 10]],
          ],
          'Exif/ApertureValue - value 26, 10' => [
              '2.5', 'ExifEye\core\Entry\ExifApertureValue', 'Exif', 'ApertureValue', [[26, 10]],
          ],
          'Exif/FocalLength - value 60, 10' => [
              '6.0 mm', 'ExifEye\core\Entry\ExifFocalLength', 'Exif', 'FocalLength', [[60, 10]],
          ],
          'Exif/FocalLength - value 26, 10' => [
              '2.6 mm', 'ExifEye\core\Entry\ExifFocalLength', 'Exif', 'FocalLength', [[26, 10]],
          ],
          'Exif/SubjectDistance - value 60, 10' => [
              '6.0 m', 'ExifEye\core\Entry\ExifSubjectDistance', 'Exif', 'SubjectDistance', [[60, 10]],
          ],
          'Exif/SubjectDistance - value 26, 10' => [
              '2.6 m', 'ExifEye\core\Entry\ExifSubjectDistance', 'Exif', 'SubjectDistance', [[26, 10]],
          ],
          'Exif/ExposureTime - value 60, 10' => [
              '6 sec.', 'ExifEye\core\Entry\ExifExposureTime', 'Exif', 'ExposureTime', [[60, 10]],
          ],
          'Exif/ExposureTime - value 5, 10' => [
              '1/2 sec.', 'ExifEye\core\Entry\ExifExposureTime', 'Exif', 'ExposureTime', [[5, 10]],
          ],
          'GPS/GPSLongitude' => [
              '30° 45\' 28" (30.76°)', 'ExifEye\core\Entry\GPSDegrees', 'GPS', 'GPSLongitude', [[30, 1], [45, 1], [28, 1]],
          ],
          'GPS/GPSLatitude' => [
              '50° 33\' 12" (50.55°)', 'ExifEye\core\Entry\GPSDegrees', 'GPS', 'GPSLatitude', [[50, 1], [33, 1], [12, 1]],
          ],
          'Exif/ShutterSpeedValue - value 5, 10' => [
              '5/10 sec. (APEX: 1)', 'ExifEye\core\Entry\ExifShutterSpeedValue', 'Exif', 'ShutterSpeedValue', [[5, 10]],
          ],
          'Exif/BrightnessValue - value 5, 10' => [
              '0.5', 'ExifEye\core\Entry\ExifBrightnessValue', 'Exif', 'BrightnessValue', [[5, 10]],
          ],
          'Exif/ExposureBiasValue - value 5, 10' => [
              '+0.5', 'ExifEye\core\Entry\ExifExposureBiasValue', 'Exif', 'ExposureBiasValue', [[5, 10]],
          ],
          'Exif/ExposureBiasValue - value -5, 10' => [
              '-0.5', 'ExifEye\core\Entry\ExifExposureBiasValue', 'Exif', 'ExposureBiasValue', [[-5, 10]],
          ],
          'Exif/ExifVersion - short' => [
              '2.2', 'ExifEye\core\Entry\Core\Undefined', 'Exif', 'ExifVersion', [2.2], true,
          ],
          'Exif/ExifVersion - long' => [
              'Exif Version 2.2', 'ExifEye\core\Entry\Core\Undefined', 'Exif', 'ExifVersion', [2.2],
          ],
          'Exif/FlashPixVersion - short' => [
              '2.5', 'ExifEye\core\Entry\Core\Undefined', 'Exif', 'FlashPixVersion', [2.5], true,
          ],
          'Exif/FlashPixVersion - long' => [
              'FlashPix Version 2.5', 'ExifEye\core\Entry\Core\Undefined', 'Exif', 'FlashPixVersion', [2.5],
          ],
          'Interoperability/InteroperabilityVersion - short' => [
              '1.0', 'ExifEye\core\Entry\Core\Undefined', 'Interoperability', 'InteroperabilityVersion', [1], true,
          ],
          'Interoperability/InteroperabilityVersion - long' => [
              'Interoperability Version 1.0', 'ExifEye\core\Entry\Core\Undefined', 'Interoperability', 'InteroperabilityVersion', [1],
          ],
          'Exif/ComponentsConfiguration' => [
              'Y Cb Cr -', 'ExifEye\core\Entry\ExifComponentsConfiguration', 'Exif', 'ComponentsConfiguration', ["\x01\x02\x03\0"],
          ],
          'Exif/FileSource' => [
              'DSC', 'ExifEye\core\Entry\ExifFileSource', 'Exif', 'FileSource', ["\x03"],
          ],
          'Exif/SceneType' => [
              'Directly photographed', 'ExifEye\core\Entry\ExifSceneType', 'Exif', 'SceneType', ["\x01"],
          ],
        ];
    }

    public function testJpegSegmentIds()
    {
        $this->assertEquals(0xC0, Spec::getElementIdByName('jpeg', 'SOF0'));
        $this->assertEquals(0xD3, Spec::getElementIdByName('jpeg', 'RST3'));
        $this->assertEquals(0xE3, Spec::getElementIdByName('jpeg', 'APP3'));
        $this->assertEquals(0xFB, Spec::getElementIdByName('jpeg', 'JPG11'));
        $this->assertEquals(0xD8, Spec::getElementIdByName('jpeg', 'SOI'));
        $this->assertEquals(0xD9, Spec::getElementIdByName('jpeg', 'EOI'));
        $this->assertEquals(0xDA, Spec::getElementIdByName('jpeg', 'SOS'));
        $this->assertEquals(null, Spec::getElementIdByName('jpeg', 'missing'));
    }

    public function testJpegSegmentNames()
    {
        $this->assertEquals('SOF0', Spec::getElementName('jpeg', 0xC0));
        $this->assertEquals('RST3', Spec::getElementName('jpeg', 0xD3));
        $this->assertEquals('APP3', Spec::getElementName('jpeg', 0xE3));
        $this->assertEquals('JPG11', Spec::getElementName('jpeg', 0xFB));
        $this->assertEquals(null, Spec::getElementName('jpeg', 100));
    }

    public function testJpegSegmentTitles()
    {
        $this->assertEquals('Encoding (baseline)', Spec::getElementTitle('jpeg', 0xC0));
        $this->assertEquals(ExifEye::fmt('Restart %d', 3), Spec::getElementTitle('jpeg', 0xD3));
        $this->assertEquals(ExifEye::fmt('Application segment %d', 3), Spec::getElementTitle('jpeg', 0xE3));
        $this->assertEquals(ExifEye::fmt('Extension %d', 11), Spec::getElementTitle('jpeg', 0xFB));
        $this->assertEquals(null, Spec::getElementTitle('jpeg', 100));
    }
}
