<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Index;
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
        $ifd_0 = new Ifd('ifd0', 'IFD0', $tiff_mock);
        $ifd_exif = new Ifd('ifdExif', 'Exif', $tiff_mock);
        $ifd_canon_camera_settings = new Index('index', 'CanonCameraSettings', $tiff_mock);

        // Test retrieving IFD id by name.
        $this->assertEquals(Spec::getTypeIdByName('IFD0'), Spec::getTypeIdByName('0'));
        $this->assertEquals(Spec::getTypeIdByName('IFD0'), Spec::getTypeIdByName('Main'));
        $this->assertNotNull(Spec::getTypeIdByName('CanonMakerNotes'));

        // Test retrieving IFD class.
        $this->assertEquals('ExifEye\core\Block\Ifd', Spec::getTypeHandlingClass('ifd0'));
        $this->assertEquals('ExifEye\core\Block\Index', Spec::getTypeHandlingClass('ifdMakerNotesCanonCameraSettings'));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals([
            'ExifEye\core\Block\Ifd::thumbnailToBlock',
            'ExifEye\core\Block\Ifd::makerNoteToBlock',
        ], Spec::getTypePropertyValue($ifd_0->getType(), 'postLoad'));
        $this->assertNull(Spec::getTypePropertyValue($ifd_canon_camera_settings->getType(), 'postLoad'));

        // Test retrieving maker note IFD.
        $this->assertEquals('ifdMakerNotesCanon', Spec::getMakerNoteIfdType('Canon', 'any'));
        $this->assertNull(Spec::getMakerNoteIfdType('Minolta', 'any'));

        // Test retrieving TAG name.
        $this->assertEquals('Exif', Spec::getElementName($ifd_0->getType(), 0x8769));
        $this->assertEquals('ExposureTime', Spec::getElementName($ifd_exif->getType(), 0x829A));
        $this->assertEquals('Compression', Spec::getElementName($ifd_0->getType(), 0x0103));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, Spec::getElementIdByName($ifd_0->getType(), 'Exif'));
        $this->assertEquals(0x829A, Spec::getElementIdByName($ifd_exif->getType(), 'ExposureTime'));
        $this->assertEquals(0x0103, Spec::getElementIdByName($ifd_0->getType(), 'Compression'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertSame('ifdExif', Spec::getElementType($ifd_0->getType(), 0x8769));
        $this->assertSame('Exif', Spec::getElementName($ifd_0->getType(), 0x8769));

        // Check getTagFormat.
        $this->assertEquals([Format::getIdFromName('Undefined')], Spec::getElementPropertyValue($ifd_exif->getType(), 0x9286, 'format'));
        $this->assertEquals([Format::getIdFromName('Short'), Format::getIdFromName('Long')], Spec::getElementPropertyValue($ifd_exif->getType(), 0xA002, 'format'));

        // Check getTagTitle.
        $this->assertEquals('Exif IFD', Spec::getElementTitle($ifd_0->getType(), 0x8769));
        $this->assertEquals('Exposure Time', Spec::getElementTitle($ifd_exif->getType(), 0x829A));
        $this->assertEquals('Compression', Spec::getElementTitle($ifd_0->getType(), 0x0103));
    }

    /**
     * Tests the Spec::getEntryClass method.
     */
    public function testGetEntryClass()
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();
        $ifd_exif = new Ifd('ifdExif', 'Exif', $tiff_mock);
        $ifd_canon_picture_information = new Index('ifdMakerNotesCanonPictureInformation', 'CanonPictureInformation', $tiff_mock);

        $this->assertEquals('ExifEye\core\Entry\ExifUserComment', Spec::getElementHandlingClass($ifd_exif->getType(), 0x9286));
        $this->assertEquals('ExifEye\core\Entry\Time', Spec::getElementHandlingClass($ifd_exif->getType(), 0x9003));
        //@todo change below to ExifEyeException::class once PHP 5.4 support is removed.
        $this->fcExpectException('ExifEye\core\ExifEyeException', "No format can be derived for tag: 0x0003 (ImageHeight) in ifd: 'ifdMakerNotesCanonPictureInformation'");
        $this->assertNull(Spec::getElementHandlingClass($ifd_canon_picture_information->getType(), 0x0003));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     *
     * @dataProvider getTagTextProvider
     */
    public function testGetTagText($expected_text, $expected_class, $ifd_type, $ifd_name, $tag, array $args, $brief = false)
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd = new Ifd($ifd_type, $ifd_name, $tiff_mock);

        $tag_id = Spec::getElementIdByName($ifd->getType(), $tag);
        $entry_class_name = Spec::getElementHandlingClass($ifd->getType(), $tag_id);
        $tag = new Tag('tag', $ifd, $tag_id, $entry_class_name, $args);

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
              'Chunky format', 'ExifEye\core\Entry\Core\Short', 'ifd0', 'IFD0', 'PlanarConfiguration', [1],
          ],
          'IFD0/PlanarConfiguration - missing mapping' => [
              6.1, 'ExifEye\core\Entry\Core\Short', 'ifd0', 'IFD0', 'PlanarConfiguration', [6.1],
          ],
          'CanonPanoramaInformation/PanoramaDirection - value 4' => [
              '2x2 Matrix (Clockwise)', 'ExifEye\core\Entry\Core\SignedShort', 'ifdMakerNotesCanonPanoramaInformation', 'CanonPanoramaInformation', 'PanoramaDirection', [4],
          ],
          'CanonCameraSettings/LensType - value 493' => [
              'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM', 'ExifEye\core\Entry\Core\Short', 'ifdMakerNotesCanonCameraSettings', 'CanonCameraSettings', 'LensType', [493],
          ],
          'CanonCameraSettings/LensType - value 493.1' => [
              'Canon EF 24-105mm f/4L IS USM', 'ExifEye\core\Entry\Core\Short', 'ifdMakerNotesCanonCameraSettings', 'CanonCameraSettings', 'LensType', [493.1],
          ],
          'IFD0/YCbCrSubSampling - value 2, 1' => [
              'YCbCr4:2:2', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'ifd0', 'IFD0', 'YCbCrSubSampling', [2, 1],
          ],
          'IFD0/YCbCrSubSampling - value 2, 2' => [
              'YCbCr4:2:0', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'ifd0', 'IFD0', 'YCbCrSubSampling', [2, 2],
          ],
          'IFD0/YCbCrSubSampling - value 6, 7' => [
              '6, 7', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'ifd0', 'IFD0', 'YCbCrSubSampling', [6, 7],
          ],
          'Exif/SubjectArea - value 6, 7' => [
              '(x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'Exif', 'SubjectArea', [6, 7],
          ],
          'Exif/SubjectArea - value 5, 6, 7' => [
              'Within distance 5 of (x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'Exif', 'SubjectArea', [5, 6, 7],
          ],
          'Exif/SubjectArea - value 4, 5, 6, 7' => [
              'Within rectangle (width 4, height 5) around (x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'Exif', 'SubjectArea', [4, 5, 6, 7],
          ],
          'Exif/SubjectArea - wrong components' => [
              'Unexpected number of components (1, expected 2, 3, or 4).', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'Exif', 'SubjectArea', [6],
          ],
          'Exif/FNumber - value 60, 10' => [
              'f/6.0', 'ExifEye\core\Entry\ExifFNumber', 'ifdExif', 'Exif', 'FNumber', [[60, 10]],
          ],
          'Exif/FNumber - value 26, 10' => [
              'f/2.6', 'ExifEye\core\Entry\ExifFNumber', 'ifdExif', 'Exif', 'FNumber', [[26, 10]],
          ],
          'Exif/ApertureValue - value 60, 10' => [
              '8.0', 'ExifEye\core\Entry\ExifApertureValue', 'ifdExif', 'Exif', 'ApertureValue', [[60, 10]],
          ],
          'Exif/ApertureValue - value 26, 10' => [
              '2.5', 'ExifEye\core\Entry\ExifApertureValue', 'ifdExif', 'Exif', 'ApertureValue', [[26, 10]],
          ],
          'Exif/FocalLength - value 60, 10' => [
              '6.0 mm', 'ExifEye\core\Entry\ExifFocalLength', 'ifdExif', 'Exif', 'FocalLength', [[60, 10]],
          ],
          'Exif/FocalLength - value 26, 10' => [
              '2.6 mm', 'ExifEye\core\Entry\ExifFocalLength', 'ifdExif', 'Exif', 'FocalLength', [[26, 10]],
          ],
          'Exif/SubjectDistance - value 60, 10' => [
              '6.0 m', 'ExifEye\core\Entry\ExifSubjectDistance', 'ifdExif', 'Exif', 'SubjectDistance', [[60, 10]],
          ],
          'Exif/SubjectDistance - value 26, 10' => [
              '2.6 m', 'ExifEye\core\Entry\ExifSubjectDistance', 'ifdExif', 'Exif', 'SubjectDistance', [[26, 10]],
          ],
          'Exif/ExposureTime - value 60, 10' => [
              '6 sec.', 'ExifEye\core\Entry\ExifExposureTime', 'ifdExif', 'Exif', 'ExposureTime', [[60, 10]],
          ],
          'Exif/ExposureTime - value 5, 10' => [
              '1/2 sec.', 'ExifEye\core\Entry\ExifExposureTime', 'ifdExif', 'Exif', 'ExposureTime', [[5, 10]],
          ],
          'GPS/GPSLongitude' => [
              '30° 45\' 28" (30.76°)', 'ExifEye\core\Entry\GPSDegrees', 'ifdGps', 'GPS', 'GPSLongitude', [[30, 1], [45, 1], [28, 1]],
          ],
          'GPS/GPSLatitude' => [
              '50° 33\' 12" (50.55°)', 'ExifEye\core\Entry\GPSDegrees', 'ifdGps', 'GPS', 'GPSLatitude', [[50, 1], [33, 1], [12, 1]],
          ],
          'Exif/ShutterSpeedValue - value 5, 10' => [
              '5/10 sec. (APEX: 1)', 'ExifEye\core\Entry\ExifShutterSpeedValue', 'ifdExif', 'Exif', 'ShutterSpeedValue', [[5, 10]],
          ],
          'Exif/BrightnessValue - value 5, 10' => [
              '0.5', 'ExifEye\core\Entry\ExifBrightnessValue', 'ifdExif', 'Exif', 'BrightnessValue', [[5, 10]],
          ],
          'Exif/ExposureBiasValue - value 5, 10' => [
              '+0.5', 'ExifEye\core\Entry\ExifExposureBiasValue', 'ifdExif', 'Exif', 'ExposureBiasValue', [[5, 10]],
          ],
          'Exif/ExposureBiasValue - value -5, 10' => [
              '-0.5', 'ExifEye\core\Entry\ExifExposureBiasValue', 'ifdExif', 'Exif', 'ExposureBiasValue', [[-5, 10]],
          ],
          'Exif/ExifVersion - short' => [
              '2.2', 'ExifEye\core\Entry\Core\Undefined', 'ifdExif', 'Exif', 'ExifVersion', [2.2], true,
          ],
          'Exif/ExifVersion - long' => [
              'Exif Version 2.2', 'ExifEye\core\Entry\Core\Undefined', 'ifdExif', 'Exif', 'ExifVersion', [2.2],
          ],
          'Exif/FlashPixVersion - short' => [
              '2.5', 'ExifEye\core\Entry\Core\Undefined', 'ifdExif', 'Exif', 'FlashPixVersion', [2.5], true,
          ],
          'Exif/FlashPixVersion - long' => [
              'FlashPix Version 2.5', 'ExifEye\core\Entry\Core\Undefined', 'ifdExif', 'Exif', 'FlashPixVersion', [2.5],
          ],
          'Interoperability/InteroperabilityVersion - short' => [
              '1.0', 'ExifEye\core\Entry\Core\Undefined', 'ifdInteroperability', 'Interoperability', 'InteroperabilityVersion', [1], true,
          ],
          'Interoperability/InteroperabilityVersion - long' => [
              'Interoperability Version 1.0', 'ExifEye\core\Entry\Core\Undefined', 'ifdInteroperability', 'Interoperability', 'InteroperabilityVersion', [1],
          ],
          'Exif/ComponentsConfiguration' => [
              'Y Cb Cr -', 'ExifEye\core\Entry\ExifComponentsConfiguration', 'ifdExif', 'Exif', 'ComponentsConfiguration', ["\x01\x02\x03\0"],
          ],
          'Exif/FileSource' => [
              'DSC', 'ExifEye\core\Entry\ExifFileSource', 'ifdExif', 'Exif', 'FileSource', ["\x03"],
          ],
          'Exif/SceneType' => [
              'Directly photographed', 'ExifEye\core\Entry\ExifSceneType', 'ifdExif', 'Exif', 'SceneType', ["\x01"],
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
        $this->assertEquals('Start of frame (baseline DCT)', Spec::getElementTitle('jpeg', 0xC0));
        $this->assertEquals(ExifEye::fmt('Restart %d', 3), Spec::getElementTitle('jpeg', 0xD3));
        $this->assertEquals(ExifEye::fmt('Application segment %d', 3), Spec::getElementTitle('jpeg', 0xE3));
        $this->assertEquals(ExifEye::fmt('Extension %d', 11), Spec::getElementTitle('jpeg', 0xFB));
        $this->assertEquals(null, Spec::getElementTitle('jpeg', 100));
    }
}
