<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Ifd;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Collection;

/**
 * Test the Spec class.
 */
class SpecTest extends MediaProbeTestCaseBase
{
    /**
     * Tests the pre-compiled default specifications set.
     */
    public function testDefaultSpec()
    {
        $tiff_mock = $this->getMockBuilder('FileEye\MediaProbe\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();
        $ifd_0 = new Ifd(new ItemDefinition(Collection::get('Ifd\\Ifd0'), ItemFormat::LONG), $tiff_mock);
        $ifd_exif = new Ifd(new ItemDefinition($ifd_0->getCollection()->getItemCollection(0x8769), ItemFormat::LONG), $ifd_0);
        $ifd_canon_camera_settings = new Index(new ItemDefinition(Collection::get('MakerNotes\\Canon\\Main')->getItemCollection(1), ItemFormat::LONG), $tiff_mock);

        // Test retrieving IFD id by name.
        $this->assertEquals(Collection::getByName('IFD0'), Collection::getByName('0'));
        $this->assertEquals(Collection::getByName('IFD0'), Collection::getByName('Main'));
        $this->assertNotNull(Collection::getByName('Canon'));

        // Test retrieving IFD class.
        $this->assertEquals(Ifd::class, $ifd_0->getCollection()->getPropertyValue('class'));
        $this->assertEquals(Index::class, $ifd_canon_camera_settings->getCollection()->getPropertyValue('class'));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals([
            'FileEye\MediaProbe\Block\Ifd::thumbnailToBlock',
            'FileEye\MediaProbe\Block\Ifd::makerNoteToBlock',
        ], $ifd_0->getCollection()->getPropertyValue('postLoad'));
        $this->assertNull($ifd_canon_camera_settings->getCollection()->getPropertyValue('postLoad'));

        // Test retrieving TAG name.
        $this->assertEquals('ExifIFD', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('name'));
        $this->assertEquals('ExposureTime', $ifd_exif->getCollection()->getItemCollection(0x829A)->getPropertyValue('name'));
        $this->assertEquals('Compression', $ifd_0->getCollection()->getItemCollection(0x0103)->getPropertyValue('name'));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, $ifd_0->getCollection()->getItemCollectionByName('ExifIFD')->getPropertyValue('item'));
        $this->assertEquals(0x829A, $ifd_exif->getCollection()->getItemCollectionByName('ExposureTime')->getPropertyValue('item'));
        $this->assertEquals(0x0103, $ifd_0->getCollection()->getItemCollectionByName('Compression')->getPropertyValue('item'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertSame('Ifd\\Exif', $ifd_0->getCollection()->getItemCollection(0x8769)->getId());
        $this->assertSame('ExifIFD', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('name'));

        // Check getTagFormat.
        $this->assertEquals([ItemFormat::UNDEFINED], $ifd_exif->getCollection()->getItemCollection(0x9286)->getPropertyValue('format'));
        $this->assertEquals([ItemFormat::SHORT, ItemFormat::LONG], $ifd_exif->getCollection()->getItemCollection(0xA002)->getPropertyValue('format'));

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
        $this->assertEquals('FileEye\MediaProbe\Entry\ExifUserComment', Collection::get('Ifd\Exif')->getItemCollection(0x9286)->getPropertyValue('entryClass'));
        $this->assertEquals('FileEye\MediaProbe\Entry\Time', Collection::get('Ifd\Exif')->getItemCollection(0x9003)->getPropertyValue('entryClass'));
        $this->assertNull(Collection::get('MakerNotes\\Canon\\CameraSettings')->getItemCollection(0)->getPropertyValue('entryClass'));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     *
     * @dataProvider getTagTextProvider
     */
    public function testGetTagText($expected_text, $expected_class, $parent_collection_id, $tag_name, array $args, $brief = false)
    {
        $ifd = $this->getMockBuilder(Ifd::class)
                    ->disableOriginalConstructor()
                    ->setMethods(['getCollection'])
                    ->getMock();

        $parent_collection = Collection::get($parent_collection_id);
        $ifd->expects($this->any())
          ->method('getCollection')
          ->will($this->returnValue($parent_collection));

        $item_collection = $parent_collection->getItemCollectionByName($tag_name);
        $item_format = $item_collection->getPropertyValue('format')[0];
        $item_definition = new ItemDefinition($item_collection, $item_format);
        $entry_class_name = $item_definition->getEntryClass();
        $tag = new Tag($item_definition, $ifd);
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
                'Chunky', 'FileEye\MediaProbe\Entry\Core\Short', 'Ifd\\Ifd0', 'PlanarConfiguration', [1],
            ],
            'IFD0/PlanarConfiguration - missing mapping' => [
                6.1, 'FileEye\MediaProbe\Entry\Core\Short', 'Ifd\\Ifd0', 'PlanarConfiguration', [6.1],
            ],
            'CanonPanoramaInformation/PanoramaDirection - value 4' => [
                '2x2 Matrix (Clockwise)', 'FileEye\MediaProbe\Entry\Core\SignedShort', 'MakerNotes\\Canon\\Panorama', 'PanoramaDirection', [4],
            ],
            'CanonCameraSettings/LensType - value 493' => [
                'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM', 'FileEye\MediaProbe\Entry\Core\Short', 'MakerNotes\\Canon\\CameraSettings', 'LensType', [493],
            ],
            'CanonCameraSettings/LensType - value 493.1' => [
                'Canon EF 24-105mm f/4L IS USM', 'FileEye\MediaProbe\Entry\Core\Short', 'MakerNotes\\Canon\\CameraSettings', 'LensType', [493.1],
            ],
            'IFD0/YCbCrSubSampling - value 2, 1' => [
                'YCbCr4:2:2', 'FileEye\MediaProbe\Entry\IfdYCbCrSubSampling', 'Ifd\\Ifd0', 'YCbCrSubSampling', [2, 1],
            ],
            'IFD0/YCbCrSubSampling - value 2, 2' => [
                'YCbCr4:2:0', 'FileEye\MediaProbe\Entry\IfdYCbCrSubSampling', 'Ifd\\Ifd0', 'YCbCrSubSampling', [2, 2],
            ],
            'IFD0/YCbCrSubSampling - value 6, 7' => [
                '6, 7', 'FileEye\MediaProbe\Entry\IfdYCbCrSubSampling', 'Ifd\\Ifd0', 'YCbCrSubSampling', [6, 7],
            ],
            'Exif/SubjectArea - value 6, 7' => [
                '(x,y) = (6,7)', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Ifd\\Exif', 'SubjectArea', [6, 7],
            ],
            'Exif/SubjectArea - value 5, 6, 7' => [
                'Within distance 5 of (x,y) = (6,7)', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Ifd\\Exif', 'SubjectArea', [5, 6, 7],
            ],
            'Exif/SubjectArea - value 4, 5, 6, 7' => [
                'Within rectangle (width 4, height 5) around (x,y) = (6,7)', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Ifd\\Exif', 'SubjectArea', [4, 5, 6, 7],
            ],
            'Exif/SubjectArea - wrong components' => [
                'Unexpected number of components (1, expected 2, 3, or 4).', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Ifd\\Exif', 'SubjectArea', [6],
            ],
            'Exif/FNumber - value 60, 10' => [
                'f/6.0', 'FileEye\MediaProbe\Entry\ExifFNumber', 'Ifd\\Exif', 'FNumber', [[60, 10]],
            ],
            'Exif/FNumber - value 26, 10' => [
                'f/2.6', 'FileEye\MediaProbe\Entry\ExifFNumber', 'Ifd\\Exif', 'FNumber', [[26, 10]],
            ],
            'Exif/ApertureValue - value 60, 10' => [
                '8.0', 'FileEye\MediaProbe\Entry\ExifApertureValue', 'Ifd\\Exif', 'ApertureValue', [[60, 10]],
            ],
            'Exif/ApertureValue - value 26, 10' => [
                '2.5', 'FileEye\MediaProbe\Entry\ExifApertureValue', 'Ifd\\Exif', 'ApertureValue', [[26, 10]],
            ],
            'Exif/FocalLength - value 60, 10' => [
                '6.0 mm', 'FileEye\MediaProbe\Entry\ExifFocalLength', 'Ifd\\Exif', 'FocalLength', [[60, 10]],
            ],
            'Exif/FocalLength - value 26, 10' => [
                '2.6 mm', 'FileEye\MediaProbe\Entry\ExifFocalLength', 'Ifd\\Exif', 'FocalLength', [[26, 10]],
            ],
            'Exif/SubjectDistance - value 60, 10' => [
                '6.0 m', 'FileEye\MediaProbe\Entry\ExifSubjectDistance', 'Ifd\\Exif', 'SubjectDistance', [[60, 10]],
            ],
            'Exif/SubjectDistance - value 26, 10' => [
                '2.6 m', 'FileEye\MediaProbe\Entry\ExifSubjectDistance', 'Ifd\\Exif', 'SubjectDistance', [[26, 10]],
            ],
            'Exif/ExposureTime - value 60, 10' => [
                '6 sec.', 'FileEye\MediaProbe\Entry\ExifExposureTime', 'Ifd\\Exif', 'ExposureTime', [[60, 10]],
            ],
            'Exif/ExposureTime - value 5, 10' => [
                '1/2 sec.', 'FileEye\MediaProbe\Entry\ExifExposureTime', 'Ifd\\Exif', 'ExposureTime', [[5, 10]],
            ],
            'GPS/GPSLongitude' => [
                '30° 45\' 28" (30.76°)', 'FileEye\MediaProbe\Entry\GPSDegrees', 'Ifd\\Gps', 'GPSLongitude', [[30, 1], [45, 1], [28, 1]],
            ],
            'GPS/GPSLatitude' => [
                '50° 33\' 12" (50.55°)', 'FileEye\MediaProbe\Entry\GPSDegrees', 'Ifd\\Gps', 'GPSLatitude', [[50, 1], [33, 1], [12, 1]],
            ],
            'Exif/ShutterSpeedValue - value 5, 10' => [
                '5/10 sec. (APEX: 1)', 'FileEye\MediaProbe\Entry\ExifShutterSpeedValue', 'Ifd\\Exif', 'ShutterSpeedValue', [[5, 10]],
            ],
            'Exif/BrightnessValue - value 5, 10' => [
                '0.5', 'FileEye\MediaProbe\Entry\ExifBrightnessValue', 'Ifd\\Exif', 'BrightnessValue', [[5, 10]],
            ],
            'Exif/ExposureBiasValue - value 5, 10' => [
                '+0.5', 'FileEye\MediaProbe\Entry\ExifExposureBiasValue', 'Ifd\\Exif', 'ExposureCompensation', [[5, 10]],
            ],
            'Exif/ExposureBiasValue - value -5, 10' => [
                '-0.5', 'FileEye\MediaProbe\Entry\ExifExposureBiasValue', 'Ifd\\Exif', 'ExposureCompensation', [[-5, 10]],
            ],
            'Exif/ExifVersion - short' => [
                '2.2', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Ifd\\Exif', 'ExifVersion', [2.2], true,
            ],
            'Exif/FlashPixVersion - short' => [
                '2.5', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Ifd\\Exif', 'FlashpixVersion', [2.5], true,
            ],
            'Interoperability/InteropVersion - short' => [
                '1.0', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Ifd\\Interoperability', 'InteropVersion', [1], true,
            ],
            'Exif/ComponentsConfiguration' => [
                'Y Cb Cr -', 'FileEye\MediaProbe\Entry\ExifComponentsConfiguration', 'Ifd\\Exif', 'ComponentsConfiguration', ["\x01\x02\x03\0"],
            ],
            'Exif/FileSource' => [
                'Digital Camera', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Ifd\\Exif', 'FileSource', ["\x03"],
            ],
            'Exif/FileSource - unmatched' => [
                '1 byte(s) of data', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Ifd\\Exif', 'FileSource', ["\x07"],
            ],
//            'Exif/FileSource - Sigma Digital Camera' => [
//                'Sigma Digital Camera', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Ifd\\Exif', 'FileSource', ["\x03\x00\x00\x00"],
//            ],
            'Exif/SceneType' => [
                'Directly photographed', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Ifd\\Exif', 'SceneType', ["\x01"],
            ],
        ];
    }

    public function testJpegSegmentIds()
    {
        $collection = Collection::get('Jpeg');
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
        $collection = Collection::get('Jpeg');
        $this->assertEquals('SOF0', $collection->getItemCollection(0xC0)->getPropertyValue('name'));
        $this->assertEquals('RST3', $collection->getItemCollection(0xD3)->getPropertyValue('name'));
        $this->assertEquals('APP3', $collection->getItemCollection(0xE3)->getPropertyValue('name'));
        $this->assertEquals('JPG11', $collection->getItemCollection(0xFB)->getPropertyValue('name'));
        $this->assertNull($collection->getItemCollection(100));
    }

    public function testJpegSegmentTitles()
    {
        $collection = Collection::get('Jpeg');
        $this->assertEquals('Start of frame (baseline DCT)', $collection->getItemCollection(0xC0)->getPropertyValue('title'));
        $this->assertEquals(MediaProbe::fmt('Restart %d', 3), $collection->getItemCollection(0xD3)->getPropertyValue('title'));
        $this->assertEquals(MediaProbe::fmt('Application segment %d', 3), $collection->getItemCollection(0xE3)->getPropertyValue('title'));
        $this->assertEquals(MediaProbe::fmt('Extension %d', 11), $collection->getItemCollection(0xFB)->getPropertyValue('title'));
    }
}
