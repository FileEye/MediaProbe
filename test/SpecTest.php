<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\IfdFormat;
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
        $ifd_0 = new Ifd(Collection::get('ifd0'), new IfdItem(Collection::get('tiff'), 0, IfdFormat::getFromName('Long')), $tiff_mock);
        $ifd_exif = new Ifd(Collection::get('ifdExif'), new IfdItem(Collection::get('ifd0'), 0x8769, IfdFormat::getFromName('Long')), $ifd_0);
        $ifd_canon_camera_settings = new Index(Collection::get('ifdMakerNotesCanonCameraSettings'), new IfdItem(Collection::get('ifdMakerNotesCanon'), 1, IfdFormat::getFromName('Long')), $tiff_mock);

        // Test retrieving IFD id by name.
        $this->assertEquals(Collection::getByName('IFD0'), Collection::getByName('0'));
        $this->assertEquals(Collection::getByName('IFD0'), Collection::getByName('Main'));
        $this->assertNotNull(Collection::getByName('Canon'));

        // Test retrieving IFD class.
        $this->assertEquals('ExifEye\core\Block\Ifd', $ifd_0->getCollection()->getPropertyValue('class'));
        $this->assertEquals('ExifEye\core\Block\Index', $ifd_canon_camera_settings->getCollection()->getPropertyValue('class'));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals([
            'ExifEye\core\Block\Ifd::thumbnailToBlock',
            'ExifEye\core\Block\Ifd::makerNoteToBlock',
        ], $ifd_0->getCollection()->getPropertyValue('postLoad'));
        $this->assertNull($ifd_canon_camera_settings->getCollection()->getPropertyValue('postLoad'));

        // Test retrieving TAG name.
        $this->assertEquals('Exif', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('name'));
        $this->assertEquals('ExposureTime', $ifd_exif->getCollection()->getItemCollection(0x829A)->getPropertyValue('name'));
        $this->assertEquals('Compression', $ifd_0->getCollection()->getItemCollection(0x0103)->getPropertyValue('name'));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, $ifd_0->getCollection()->getItemCollectionByName('Exif')->getPropertyValue('item'));
        $this->assertEquals(0x829A, $ifd_exif->getCollection()->getItemCollectionByName('ExposureTime')->getPropertyValue('item'));
        $this->assertEquals(0x0103, $ifd_0->getCollection()->getItemCollectionByName('Compression')->getPropertyValue('item'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertSame('ifdExif', $ifd_0->getCollection()->getItemCollection(0x8769)->getId());
        $this->assertSame('Exif', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('name'));

        // Check getTagFormat.
        $this->assertEquals([IfdFormat::getFromName('Undefined')], $ifd_exif->getCollection()->getItemCollection(0x9286)->getPropertyValue('format'));
        $this->assertEquals([IfdFormat::getFromName('Short'), IfdFormat::getFromName('Long')], $ifd_exif->getCollection()->getItemCollection(0xA002)->getPropertyValue('format'));

        // Check getTagTitle.
        $this->assertEquals('IFD Exif', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('title'));
        $this->assertEquals('Exposure Time', $ifd_exif->getCollection()->getItemCollection(0x829A)->getPropertyValue('title'));
        $this->assertEquals('Compression', $ifd_0->getCollection()->getItemCollection(0x0103)->getPropertyValue('title'));
    }

    /**
     * Tests the Spec::getEntryClass method.
     */
    public function testGetEntryClass()
    {
        //@todo change below to xxxx::class once PHP 5.4 support is removed.
        $this->assertEquals('ExifEye\core\Entry\ExifUserComment', Collection::get('ifdExif')->getItemCollection(0x9286)->getPropertyValue('entryClass'));
        $this->assertEquals('ExifEye\core\Entry\Time', Collection::get('ifdExif')->getItemCollection(0x9003)->getPropertyValue('entryClass'));
        $this->assertNull(Collection::get('ifdMakerNotesCanonPictureInformation')->getItemCollection(0x0003)->getPropertyValue('entryClass'));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     *
     * @dataProvider getTagTextProvider
     */
    public function testGetTagText($expected_text, $expected_class, $collection_id, $tag_name, array $args, $brief = false)
    {
        $ifd = $this->getMockBuilder('ExifEye\core\Block\Ifd')
                    ->disableOriginalConstructor()
                    ->setMethods(['getCollection'])
                    ->getMock();

        $collection = Collection::get($collection_id);
        $ifd->expects($this->any())
          ->method('getCollection')
          ->will($this->returnValue($collection));

        $tag_collection = $collection->getItemCollectionByName($tag_name);
        $ifd_item = new IfdItem($collection, $tag_collection->getPropertyValue('item'));
        $entry_class_name = $ifd_item->getEntryClass();
        $tag = new Tag($tag_collection, $ifd_item, $ifd);
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
        $collection = Collection::get('jpeg');
        $this->assertEquals(0xC0, $collection->getItemCollectionByName('SOF0')->getPropertyValue('item'));
        $this->assertEquals(0xD3, $collection->getItemCollectionByName('RST3')->getPropertyValue('item'));
        $this->assertEquals(0xE3, $collection->getItemCollectionByName('APP3')->getPropertyValue('item'));
        $this->assertEquals(0xFB, $collection->getItemCollectionByName('JPG11')->getPropertyValue('item'));
        $this->assertEquals(0xD8, $collection->getItemCollectionByName('SOI')->getPropertyValue('item'));
        $this->assertEquals(0xD9, $collection->getItemCollectionByName('EOI')->getPropertyValue('item'));
        $this->assertEquals(0xDA, $collection->getItemCollectionByName('SOS')->getPropertyValue('item'));
        $this->assertNull($collection->getItemCollectionByName('missing'));
    }

    public function testJpegSegmentNames()
    {
        $collection = Collection::get('jpeg');
        $this->assertEquals('SOF0', $collection->getItemCollection(0xC0)->getPropertyValue('name'));
        $this->assertEquals('RST3', $collection->getItemCollection(0xD3)->getPropertyValue('name'));
        $this->assertEquals('APP3', $collection->getItemCollection(0xE3)->getPropertyValue('name'));
        $this->assertEquals('JPG11', $collection->getItemCollection(0xFB)->getPropertyValue('name'));
        $this->assertNull($collection->getItemCollection(100));
    }

    public function testJpegSegmentTitles()
    {
        $collection = Collection::get('jpeg');
        $this->assertEquals('Start of frame (baseline DCT)', $collection->getItemCollection(0xC0)->getPropertyValue('title'));
        $this->assertEquals(ExifEye::fmt('Restart %d', 3), $collection->getItemCollection(0xD3)->getPropertyValue('title'));
        $this->assertEquals(ExifEye::fmt('Application segment %d', 3), $collection->getItemCollection(0xE3)->getPropertyValue('title'));
        $this->assertEquals(ExifEye::fmt('Extension %d', 11), $collection->getItemCollection(0xFB)->getPropertyValue('title'));
    }
}
