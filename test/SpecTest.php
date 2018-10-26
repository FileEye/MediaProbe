<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\IfdItem;
use ExifEye\core\Block\Index;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\ExifEye;
use ExifEye\core\Collection;

/**
 * Test the Spec class.
 */
class SpecTest extends ExifEyeTestCaseBase
{
    /**
     * Tests the pre-compiled default specifications set.
     */
    public function testDefaultSpec()
    {
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();
        $ifd_0 = new Ifd($tiff_mock, new IfdItem('tiff', 0, Collection::getFormatIdFromName('Long')));
        $ifd_exif = new Ifd($ifd_0, new IfdItem('ifd0', 0x8769, Collection::getFormatIdFromName('Long')));
        $ifd_canon_camera_settings = new Index($tiff_mock, new IfdItem('ifdMakerNotesCanon', 1, Collection::getFormatIdFromName('Long')));

        // Test retrieving IFD id by name.
        $this->assertEquals(Collection::getIdByName('IFD0'), Collection::getIdByName('0'));
        $this->assertEquals(Collection::getIdByName('IFD0'), Collection::getIdByName('Main'));
        $this->assertNotNull(Collection::getIdByName('Canon'));

        // Test retrieving IFD class.
        $this->assertEquals('ExifEye\core\Block\Ifd', Collection::getClass('ifd0'));
        $this->assertEquals('ExifEye\core\Block\Index', Collection::getClass('ifdMakerNotesCanonCameraSettings'));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals([
            'ExifEye\core\Block\Ifd::thumbnailToBlock',
            'ExifEye\core\Block\Ifd::makerNoteToBlock',
        ], Collection::getPropertyValue($ifd_0->getType(), 'postLoad'));
        $this->assertNull(Collection::getPropertyValue($ifd_canon_camera_settings->getType(), 'postLoad'));

        // Test retrieving maker note IFD.
        $this->assertEquals('ifdMakerNotesCanon', Collection::getMakerNoteCollection('Canon', 'any'));
        $this->assertNull(Collection::getMakerNoteCollection('Minolta', 'any'));

        // Test retrieving TAG name.
        $this->assertEquals('Exif', Collection::getItemName($ifd_0->getType(), 0x8769));
        $this->assertEquals('ExposureTime', Collection::getItemName($ifd_exif->getType(), 0x829A));
        $this->assertEquals('Compression', Collection::getItemName($ifd_0->getType(), 0x0103));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, Collection::getItemIdByName($ifd_0->getType(), 'Exif'));
        $this->assertEquals(0x829A, Collection::getItemIdByName($ifd_exif->getType(), 'ExposureTime'));
        $this->assertEquals(0x0103, Collection::getItemIdByName($ifd_0->getType(), 'Compression'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertSame('ifdExif', Collection::getItemCollection($ifd_0->getType(), 0x8769));
        $this->assertSame('Exif', Collection::getItemName($ifd_0->getType(), 0x8769));

        // Check getTagFormat.
        $this->assertEquals([Collection::getFormatIdFromName('Undefined')], Collection::getItemPropertyValue($ifd_exif->getType(), 0x9286, 'format'));
        $this->assertEquals([Collection::getFormatIdFromName('Short'), Collection::getFormatIdFromName('Long')], Collection::getItemPropertyValue($ifd_exif->getType(), 0xA002, 'format'));

        // Check getTagTitle.
        $this->assertEquals('IFD Exif', Collection::getItemTitle($ifd_0->getType(), 0x8769));
        $this->assertEquals('Exposure Time', Collection::getItemTitle($ifd_exif->getType(), 0x829A));
        $this->assertEquals('Compression', Collection::getItemTitle($ifd_0->getType(), 0x0103));
    }

    /**
     * Tests the Spec::getEntryClass method.
     */
    public function testGetEntryClass()
    {
        $ifd_exif = $this->getMockBuilder('ExifEye\core\Block\Ifd')
                    ->disableOriginalConstructor()
                    ->setMethods(['getType'])
                    ->getMock();
        $ifd_exif->expects($this->any())
          ->method('getType')
          ->will($this->returnValue('ifdExif'));

        $ifd_canon_picture_information = $this->getMockBuilder('ExifEye\core\Block\Index')
                    ->disableOriginalConstructor()
                    ->setMethods(['getType'])
                    ->getMock();
        $ifd_canon_picture_information->expects($this->any())
          ->method('getType')
          ->will($this->returnValue('ifdMakerNotesCanonPictureInformation'));

        //@todo change below to xxxx::class once PHP 5.4 support is removed.
        $this->assertEquals('ExifEye\core\Entry\ExifUserComment', Collection::getItemClass($ifd_exif->getType(), 0x9286));
        $this->assertEquals('ExifEye\core\Entry\Time', Collection::getItemClass($ifd_exif->getType(), 0x9003));
        $this->fcExpectException('ExifEye\core\ExifEyeException', "No format can be derived for tag: 0x0003 (ImageHeight) in ifd: 'ifdMakerNotesCanonPictureInformation'");
        $this->assertNull(Collection::getItemClass($ifd_canon_picture_information->getType(), 0x0003));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     *
     * @dataProvider getTagTextProvider
     */
    public function testGetTagText($expected_text, $expected_class, $collection, $tag, array $args, $brief = false)
    {
        $ifd = $this->getMockBuilder('ExifEye\core\Block\Ifd')
                    ->disableOriginalConstructor()
                    ->setMethods(['getType'])
                    ->getMock();
        $ifd->expects($this->any())
          ->method('getType')
          ->will($this->returnValue($collection));

        $tag_id = Collection::getItemIdByName($collection, $tag);
        $tag_format = Collection::getItemPropertyValue($collection, $tag_id, 'format')[0];
        $entry_class_name = Collection::getItemClass($collection, $tag_id);
        $tag = new Tag($ifd, new IfdItem($collection, $tag_id, $tag_format));
        new $entry_class_name($tag, $args);

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
                'Chunky format', 'ExifEye\core\Entry\Core\Short', 'ifd0', 'PlanarConfiguration', [1],
            ],
            'IFD0/PlanarConfiguration - missing mapping' => [
                6.1, 'ExifEye\core\Entry\Core\Short', 'ifd0', 'PlanarConfiguration', [6.1],
            ],
            'CanonPanoramaInformation/PanoramaDirection - value 4' => [
                '2x2 Matrix (Clockwise)', 'ExifEye\core\Entry\Core\SignedShort', 'ifdMakerNotesCanonPanoramaInformation', 'PanoramaDirection', [4],
            ],
            'CanonCameraSettings/LensType - value 493' => [
                'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM', 'ExifEye\core\Entry\Core\Short', 'ifdMakerNotesCanonCameraSettings', 'LensType', [493],
            ],
            'CanonCameraSettings/LensType - value 493.1' => [
                'Canon EF 24-105mm f/4L IS USM', 'ExifEye\core\Entry\Core\Short', 'ifdMakerNotesCanonCameraSettings', 'LensType', [493.1],
            ],
            'IFD0/YCbCrSubSampling - value 2, 1' => [
                'YCbCr4:2:2', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'ifd0', 'YCbCrSubSampling', [2, 1],
            ],
            'IFD0/YCbCrSubSampling - value 2, 2' => [
                'YCbCr4:2:0', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'ifd0', 'YCbCrSubSampling', [2, 2],
            ],
            'IFD0/YCbCrSubSampling - value 6, 7' => [
                '6, 7', 'ExifEye\core\Entry\IfdYCbCrSubSampling', 'ifd0', 'YCbCrSubSampling', [6, 7],
            ],
            'Exif/SubjectArea - value 6, 7' => [
                '(x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'SubjectArea', [6, 7],
            ],
            'Exif/SubjectArea - value 5, 6, 7' => [
                'Within distance 5 of (x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'SubjectArea', [5, 6, 7],
            ],
            'Exif/SubjectArea - value 4, 5, 6, 7' => [
                'Within rectangle (width 4, height 5) around (x,y) = (6,7)', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'SubjectArea', [4, 5, 6, 7],
            ],
            'Exif/SubjectArea - wrong components' => [
                'Unexpected number of components (1, expected 2, 3, or 4).', 'ExifEye\core\Entry\ExifSubjectArea', 'ifdExif', 'SubjectArea', [6],
            ],
            'Exif/FNumber - value 60, 10' => [
                'f/6.0', 'ExifEye\core\Entry\ExifFNumber', 'ifdExif', 'FNumber', [[60, 10]],
            ],
            'Exif/FNumber - value 26, 10' => [
                'f/2.6', 'ExifEye\core\Entry\ExifFNumber', 'ifdExif', 'FNumber', [[26, 10]],
            ],
            'Exif/ApertureValue - value 60, 10' => [
                '8.0', 'ExifEye\core\Entry\ExifApertureValue', 'ifdExif', 'ApertureValue', [[60, 10]],
            ],
            'Exif/ApertureValue - value 26, 10' => [
                '2.5', 'ExifEye\core\Entry\ExifApertureValue', 'ifdExif', 'ApertureValue', [[26, 10]],
            ],
            'Exif/FocalLength - value 60, 10' => [
                '6.0 mm', 'ExifEye\core\Entry\ExifFocalLength', 'ifdExif', 'FocalLength', [[60, 10]],
            ],
            'Exif/FocalLength - value 26, 10' => [
                '2.6 mm', 'ExifEye\core\Entry\ExifFocalLength', 'ifdExif', 'FocalLength', [[26, 10]],
            ],
            'Exif/SubjectDistance - value 60, 10' => [
                '6.0 m', 'ExifEye\core\Entry\ExifSubjectDistance', 'ifdExif', 'SubjectDistance', [[60, 10]],
            ],
            'Exif/SubjectDistance - value 26, 10' => [
                '2.6 m', 'ExifEye\core\Entry\ExifSubjectDistance', 'ifdExif', 'SubjectDistance', [[26, 10]],
            ],
            'Exif/ExposureTime - value 60, 10' => [
                '6 sec.', 'ExifEye\core\Entry\ExifExposureTime', 'ifdExif', 'ExposureTime', [[60, 10]],
            ],
            'Exif/ExposureTime - value 5, 10' => [
                '1/2 sec.', 'ExifEye\core\Entry\ExifExposureTime', 'ifdExif', 'ExposureTime', [[5, 10]],
            ],
            'GPS/GPSLongitude' => [
                '30° 45\' 28" (30.76°)', 'ExifEye\core\Entry\GPSDegrees', 'ifdGps', 'GPSLongitude', [[30, 1], [45, 1], [28, 1]],
            ],
            'GPS/GPSLatitude' => [
                '50° 33\' 12" (50.55°)', 'ExifEye\core\Entry\GPSDegrees', 'ifdGps', 'GPSLatitude', [[50, 1], [33, 1], [12, 1]],
            ],
            'Exif/ShutterSpeedValue - value 5, 10' => [
                '5/10 sec. (APEX: 1)', 'ExifEye\core\Entry\ExifShutterSpeedValue', 'ifdExif', 'ShutterSpeedValue', [[5, 10]],
            ],
            'Exif/BrightnessValue - value 5, 10' => [
                '0.5', 'ExifEye\core\Entry\ExifBrightnessValue', 'ifdExif', 'BrightnessValue', [[5, 10]],
            ],
            'Exif/ExposureBiasValue - value 5, 10' => [
                '+0.5', 'ExifEye\core\Entry\ExifExposureBiasValue', 'ifdExif', 'ExposureBiasValue', [[5, 10]],
            ],
            'Exif/ExposureBiasValue - value -5, 10' => [
                '-0.5', 'ExifEye\core\Entry\ExifExposureBiasValue', 'ifdExif', 'ExposureBiasValue', [[-5, 10]],
            ],
            'Exif/ExifVersion - short' => [
                '2.2', 'ExifEye\core\Entry\Core\Undefined', 'ifdExif', 'ExifVersion', [2.2], true,
            ],
            'Exif/FlashPixVersion - short' => [
                '2.5', 'ExifEye\core\Entry\Core\Undefined', 'ifdExif', 'FlashPixVersion', [2.5], true,
            ],
            'Interoperability/InteroperabilityVersion - short' => [
                '1.0', 'ExifEye\core\Entry\Core\Undefined', 'ifdInteroperability', 'InteroperabilityVersion', [1], true,
            ],
            'Exif/ComponentsConfiguration' => [
                'Y Cb Cr -', 'ExifEye\core\Entry\ExifComponentsConfiguration', 'ifdExif', 'ComponentsConfiguration', ["\x01\x02\x03\0"],
            ],
            'Exif/FileSource' => [
                'DSC', 'ExifEye\core\Entry\ExifFileSource', 'ifdExif', 'FileSource', ["\x03"],
            ],
            'Exif/SceneType' => [
                'Directly photographed', 'ExifEye\core\Entry\ExifSceneType', 'ifdExif', 'SceneType', ["\x01"],
            ],
        ];
    }

    public function testJpegSegmentIds()
    {
        $this->assertEquals(0xC0, Collection::getItemIdByName('jpeg', 'SOF0'));
        $this->assertEquals(0xD3, Collection::getItemIdByName('jpeg', 'RST3'));
        $this->assertEquals(0xE3, Collection::getItemIdByName('jpeg', 'APP3'));
        $this->assertEquals(0xFB, Collection::getItemIdByName('jpeg', 'JPG11'));
        $this->assertEquals(0xD8, Collection::getItemIdByName('jpeg', 'SOI'));
        $this->assertEquals(0xD9, Collection::getItemIdByName('jpeg', 'EOI'));
        $this->assertEquals(0xDA, Collection::getItemIdByName('jpeg', 'SOS'));
        $this->assertEquals(null, Collection::getItemIdByName('jpeg', 'missing'));
    }

    public function testJpegSegmentNames()
    {
        $this->assertEquals('SOF0', Collection::getItemName('jpeg', 0xC0));
        $this->assertEquals('RST3', Collection::getItemName('jpeg', 0xD3));
        $this->assertEquals('APP3', Collection::getItemName('jpeg', 0xE3));
        $this->assertEquals('JPG11', Collection::getItemName('jpeg', 0xFB));
        $this->assertEquals(null, Collection::getItemName('jpeg', 100));
    }

    public function testJpegSegmentTitles()
    {
        $this->assertEquals('Start of frame (baseline DCT)', Collection::getItemTitle('jpeg', 0xC0));
        $this->assertEquals(ExifEye::fmt('Restart %d', 3), Collection::getItemTitle('jpeg', 0xD3));
        $this->assertEquals(ExifEye::fmt('Application segment %d', 3), Collection::getItemTitle('jpeg', 0xE3));
        $this->assertEquals(ExifEye::fmt('Extension %d', 11), Collection::getItemTitle('jpeg', 0xFB));
        $this->assertEquals(null, Collection::getItemTitle('jpeg', 100));
    }
}
