<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Block\Tiff\Ifd;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Block\Tiff\Tiff;
use FileEye\MediaProbe\Collection\CollectionException;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\ExifUserComment;
use FileEye\MediaProbe\Entry\Time;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Utility\ConvertBytes;
use PHPUnit\Framework\Attributes\DataProvider;

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
        $tiff_mock = $this->createMock(Tiff::class);
        $ifd_0 = new Ifd(new ItemDefinition(CollectionFactory::get('Tiff\Ifd0'), DataFormat::LONG), $tiff_mock);
        $ifd_exif = new Ifd(new ItemDefinition($ifd_0->getCollection()->getItemCollection(0x8769), DataFormat::LONG), $ifd_0);
        $ifd_canon_camera_settings = new Index(new ItemDefinition(CollectionFactory::get('ExifMakerNotes\\Canon\\Main')->getItemCollection(1), DataFormat::LONG), $tiff_mock);

        // Test retrieving IFD id by name.
        $this->assertEquals(CollectionFactory::getByName('IFD0'), CollectionFactory::getByName('0'));
        $this->assertEquals(CollectionFactory::getByName('IFD0'), CollectionFactory::getByName('Main'));
        $this->assertNotNull(CollectionFactory::getByName('Canon'));

        // Test retrieving IFD class.
        $this->assertEquals(Ifd::class, $ifd_0->getCollection()->getPropertyValue('handler'));
        $this->assertEquals(Map::class, $ifd_canon_camera_settings->getCollection()->getPropertyValue('handler'));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals([
            'FileEye\MediaProbe\Block\Tiff\Ifd::thumbnailToBlock',
        ], $ifd_0->getCollection()->getPropertyValue('postParse'));
        $this->assertNull($ifd_canon_camera_settings->getCollection()->getPropertyValue('postParse'));

        // Test retrieving TAG name.
        $this->assertEquals('ExifIFD', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('name'));
        $this->assertEquals('ExposureTime', $ifd_exif->getCollection()->getItemCollection(0x829A)->getPropertyValue('name'));
        $this->assertEquals('Compression', $ifd_0->getCollection()->getItemCollection(0x0103)->getPropertyValue('name'));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, $ifd_0->getCollection()->getItemCollectionByName('ExifIFD')->getPropertyValue('item'));
        $this->assertEquals(0x829A, $ifd_exif->getCollection()->getItemCollectionByName('ExposureTime')->getPropertyValue('item'));
        $this->assertEquals(0x0103, $ifd_0->getCollection()->getItemCollectionByName('Compression')->getPropertyValue('item'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertSame('Tiff\IfdExif', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('id'));
        $this->assertSame('ExifIFD', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('name'));

        // Check getTagFormat.
        $this->assertEquals([DataFormat::UNDEFINED], $ifd_exif->getCollection()->getItemCollection(0x9286)->getPropertyValue('format'));
        $this->assertEquals([DataFormat::SHORT, DataFormat::LONG], $ifd_exif->getCollection()->getItemCollection(0xA002)->getPropertyValue('format'));

        // Check getTagTitle.
        $this->assertEquals('Exif IFD', $ifd_0->getCollection()->getItemCollection(0x8769)->getPropertyValue('title'));
        $this->assertEquals('Exposure Time', $ifd_exif->getCollection()->getItemCollection(0x829A)->getPropertyValue('title'));
        $this->assertEquals('Compression', $ifd_0->getCollection()->getItemCollection(0x0103)->getPropertyValue('title'));
    }

    /**
     * Tests the Spec::getEntryClass method.
     */
    public function testGetEntryClass()
    {
        $this->assertEquals(ExifUserComment::class, CollectionFactory::get('Tiff\IfdExif')->getItemCollection(0x9286)->getPropertyValue('entryClass'));
        $this->assertEquals(Time::class, CollectionFactory::get('Tiff\IfdExif')->getItemCollection(0x9003)->getPropertyValue('entryClass'));
        $this->assertNull(CollectionFactory::get('ExifMakerNotes\\Canon\\CameraSettings')->getItemCollection(1)->getPropertyValue('entryClass'));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     */
    #[DataProvider('getTagTextProvider')]
    public function testGetTagText($expected_text, $expected_class, $parent_collection_id, $tag_name, string $args, $brief = false)
    {
        $stubRoot = $this->getStubRoot();
        $ifd = new Ifd(new ItemDefinition(CollectionFactory::get($parent_collection_id)), $stubRoot);

        $parent_collection = CollectionFactory::get($parent_collection_id);
        $item_collection = $parent_collection->getItemCollectionByName($tag_name);
        $item_format = $item_collection->getPropertyValue('format')[0];
        $item_definition = new ItemDefinition($item_collection, $item_format);
        $entry_class_name = $item_definition->getEntryClass();
        $tag = new Tag($item_definition, $ifd);
        new $entry_class_name($tag, new DataString($args));

        $this->assertInstanceOf($expected_class, $tag->getElement("entry"));
        $options['short'] = $brief;  // xx
        $this->assertEquals($expected_text, $tag->getElement("entry")->toString($options));
    }

    /**
     * Data provider for testGetTagText.
     */
    public static function getTagTextProvider()
    {
        return [
            'IFD0/PlanarConfiguration - value 1' => [
                'Chunky', 'FileEye\MediaProbe\Entry\Core\Short', 'Tiff\Ifd0', 'PlanarConfiguration', ConvertBytes::fromShort(1),
            ],
            'IFD0/PlanarConfiguration - missing mapping' => [
                '6', 'FileEye\MediaProbe\Entry\Core\Short', 'Tiff\Ifd0', 'PlanarConfiguration', ConvertBytes::fromShort(6),
            ],
            'CanonPanoramaInformation/PanoramaDirection - value 4' => [
                '2x2 Matrix (Clockwise)', 'FileEye\MediaProbe\Entry\Core\SignedShort', 'ExifMakerNotes\\Canon\\Panorama', 'PanoramaDirection', ConvertBytes::fromSignedShort(4),
            ],
            'CanonCameraSettings/LensType - value 493' => [
                'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM', 'FileEye\MediaProbe\Entry\Core\Short', 'ExifMakerNotes\\Canon\\CameraSettings', 'LensType', ConvertBytes::fromShort(493),
            ],
            'IFD0/YCbCrSubSampling - value 2, 1' => [
                'YCbCr4:2:2', 'FileEye\MediaProbe\Entry\IfdYCbCrSubSampling', 'Tiff\Ifd0', 'YCbCrSubSampling', ConvertBytes::fromShort(2) . ConvertBytes::fromShort(1),
            ],
            'IFD0/YCbCrSubSampling - value 2, 2' => [
                'YCbCr4:2:0', 'FileEye\MediaProbe\Entry\IfdYCbCrSubSampling', 'Tiff\Ifd0', 'YCbCrSubSampling', ConvertBytes::fromShort(2) . ConvertBytes::fromShort(2),
            ],
            'IFD0/YCbCrSubSampling - value 6, 7' => [
                '6, 7', 'FileEye\MediaProbe\Entry\IfdYCbCrSubSampling', 'Tiff\Ifd0', 'YCbCrSubSampling', ConvertBytes::fromShort(6) . ConvertBytes::fromShort(7),
            ],
            'Exif/SubjectArea - value 6, 7' => [
                '(x,y) = (6,7)', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Tiff\IfdExif', 'SubjectArea', ConvertBytes::fromShort(6) . ConvertBytes::fromShort(7),
            ],
            'Exif/SubjectArea - value 5, 6, 7' => [
                'Within distance 5 of (x,y) = (6,7)', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Tiff\IfdExif', 'SubjectArea', ConvertBytes::fromShort(5) . ConvertBytes::fromShort(6) . ConvertBytes::fromShort(7),
            ],
            'Exif/SubjectArea - value 4, 5, 6, 7' => [
                'Within rectangle (width 4, height 5) around (x,y) = (6,7)', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Tiff\IfdExif', 'SubjectArea', ConvertBytes::fromShort(4) . ConvertBytes::fromShort(5) . ConvertBytes::fromShort(6) . ConvertBytes::fromShort(7),
            ],
            'Exif/SubjectArea - wrong components' => [
                'Unexpected number of components (1, expected 2, 3, or 4).', 'FileEye\MediaProbe\Entry\ExifSubjectArea', 'Tiff\IfdExif', 'SubjectArea', ConvertBytes::fromShort(6),
            ],
            'Exif/FNumber - value 60, 10' => [
                'f/6.0', 'FileEye\MediaProbe\Entry\ExifFNumber', 'Tiff\IfdExif', 'FNumber', ConvertBytes::fromRational([60, 10]),
            ],
            'Exif/FNumber - value 26, 10' => [
                'f/2.6', 'FileEye\MediaProbe\Entry\ExifFNumber', 'Tiff\IfdExif', 'FNumber', ConvertBytes::fromRational([26, 10]),
            ],
            'Exif/ApertureValue - value 60, 10' => [
                '8.0', 'FileEye\MediaProbe\Entry\ExifApertureValue', 'Tiff\IfdExif', 'ApertureValue', ConvertBytes::fromRational([60, 10]),
            ],
            'Exif/ApertureValue - value 26, 10' => [
                '2.5', 'FileEye\MediaProbe\Entry\ExifApertureValue', 'Tiff\IfdExif', 'ApertureValue', ConvertBytes::fromRational([26, 10]),
            ],
            'Exif/FocalLength - value 60, 10' => [
                '6.0 mm', 'FileEye\MediaProbe\Entry\ExifFocalLength', 'Tiff\IfdExif', 'FocalLength', ConvertBytes::fromRational([60, 10]),
            ],
            'Exif/FocalLength - value 26, 10' => [
                '2.6 mm', 'FileEye\MediaProbe\Entry\ExifFocalLength', 'Tiff\IfdExif', 'FocalLength', ConvertBytes::fromRational([26, 10]),
            ],
            'Exif/SubjectDistance - value 60, 10' => [
                '6.0 m', 'FileEye\MediaProbe\Entry\ExifSubjectDistance', 'Tiff\IfdExif', 'SubjectDistance', ConvertBytes::fromRational([60, 10]),
            ],
            'Exif/SubjectDistance - value 26, 10' => [
                '2.6 m', 'FileEye\MediaProbe\Entry\ExifSubjectDistance', 'Tiff\IfdExif', 'SubjectDistance', ConvertBytes::fromRational([26, 10]),
            ],
            'Exif/ExposureTime - value 60, 10' => [
                '6 sec.', 'FileEye\MediaProbe\Entry\ExifExposureTime', 'Tiff\IfdExif', 'ExposureTime', ConvertBytes::fromRational([60, 10]),
            ],
            'Exif/ExposureTime - value 5, 10' => [
                '1/2 sec.', 'FileEye\MediaProbe\Entry\ExifExposureTime', 'Tiff\IfdExif', 'ExposureTime', ConvertBytes::fromRational([5, 10]),
            ],
            'GPS/GPSLongitude' => [
                '30° 45\' 28" (30.76°)', 'FileEye\MediaProbe\Entry\GPSDegrees', 'Tiff\IfdGps', 'GPSLongitude', ConvertBytes::fromRational([30, 1]) . ConvertBytes::fromRational([45, 1]) . ConvertBytes::fromRational([28, 1]),
            ],
            'GPS/GPSLatitude' => [
                '50° 33\' 12" (50.55°)', 'FileEye\MediaProbe\Entry\GPSDegrees', 'Tiff\IfdGps', 'GPSLatitude', ConvertBytes::fromRational([50, 1]) . ConvertBytes::fromRational([33, 1]) . ConvertBytes::fromRational([12, 1]),
            ],
            'Exif/ShutterSpeedValue - value 5, 10' => [
                '5/10 sec. (APEX: 1)', 'FileEye\MediaProbe\Entry\ExifShutterSpeedValue', 'Tiff\IfdExif', 'ShutterSpeedValue', ConvertBytes::fromSignedRational([5, 10]),
            ],
            'Exif/ExposureBiasValue - value 5, 10' => [
                '+0.5', 'FileEye\MediaProbe\Entry\ExifExposureBiasValue', 'Tiff\IfdExif', 'ExposureCompensation', ConvertBytes::fromSignedRational([5, 10]),
            ],
            'Exif/ExposureBiasValue - value -5, 10' => [
                '-0.5', 'FileEye\MediaProbe\Entry\ExifExposureBiasValue', 'Tiff\IfdExif', 'ExposureCompensation', ConvertBytes::fromSignedRational([-5, 10]),
            ],
            'Exif/ExifVersion - short' => [
                '2.2', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Tiff\IfdExif', 'ExifVersion', '0220', true,
            ],
            'Exif/FlashPixVersion - short' => [
                '2.5', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Tiff\IfdExif', 'FlashpixVersion', '0250', true,
            ],
            'Interoperability/InteropVersion - short' => [
                '1.0', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Tiff\IfdInteroperability', 'InteropVersion', '0100', true,
            ],
            'Exif/ComponentsConfiguration' => [
                'Y, Cb, Cr, -', 'FileEye\MediaProbe\Entry\ExifComponentsConfiguration', 'Tiff\IfdExif', 'ComponentsConfiguration', "\x01\x02\x03\x00",
            ],
            'Exif/FileSource' => [
                'Digital Camera', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Tiff\IfdExif', 'FileSource', "\x03",
            ],
            'Exif/FileSource - unmatched' => [
                '1 byte(s) of data', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Tiff\IfdExif', 'FileSource', "\x07",
            ],
//            'Exif/FileSource - Sigma Digital Camera' => [
//                'Sigma Digital Camera', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Tiff\IfdExif', 'FileSource', "\x03\x00\x00\x00",
//            ],
            'Exif/SceneType' => [
                'Directly photographed', 'FileEye\MediaProbe\Entry\Core\Undefined', 'Tiff\IfdExif', 'SceneType', "\x01",
            ],
        ];
    }

    public function testJpegSegmentIds()
    {
        $collection = CollectionFactory::get('Jpeg\Jpeg');
        $this->assertEquals(0xC0, $collection->getItemCollectionByName('SOF0')->getPropertyValue('item'));
        $this->assertEquals(0xD3, $collection->getItemCollectionByName('RST3')->getPropertyValue('item'));
        $this->assertEquals(0xE3, $collection->getItemCollectionByName('APP3')->getPropertyValue('item'));
        $this->assertEquals(0xFB, $collection->getItemCollectionByName('JPG11')->getPropertyValue('item'));
        $this->assertEquals(0xD8, $collection->getItemCollectionByName('SOI')->getPropertyValue('item'));
        $this->assertEquals(0xD9, $collection->getItemCollectionByName('EOI')->getPropertyValue('item'));
        $this->assertEquals(0xDA, $collection->getItemCollectionByName('SOS')->getPropertyValue('item'));
        $this->expectException(CollectionException::class);
        $this->expectExceptionMessage('Missing collection for item \'missing\' in \'Jpeg\Jpeg\'');
        $item_collection = $collection->getItemCollectionByName('missing');
    }

    public function testJpegSegmentNames()
    {
        $collection = CollectionFactory::get('Jpeg\Jpeg');
        $this->assertEquals('SOF0', $collection->getItemCollection(0xC0)->getPropertyValue('name'));
        $this->assertEquals('RST3', $collection->getItemCollection(0xD3)->getPropertyValue('name'));
        $this->assertEquals('APP3', $collection->getItemCollection(0xE3)->getPropertyValue('name'));
        $this->assertEquals('JPG11', $collection->getItemCollection(0xFB)->getPropertyValue('name'));
        $this->expectException(CollectionException::class);
        $this->expectExceptionMessage('Missing collection for item \'100\' in \'Jpeg\Jpeg\'');
        $item_collection = $collection->getItemCollection(100);
    }

    public function testJpegSegmentTitles()
    {
        $collection = CollectionFactory::get('Jpeg\Jpeg');
        $this->assertEquals('Start of frame (baseline DCT)', $collection->getItemCollection(0xC0)->getPropertyValue('title'));
        $this->assertEquals('Restart 3', $collection->getItemCollection(0xD3)->getPropertyValue('title'));
        $this->assertEquals('Application segment 3', $collection->getItemCollection(0xE3)->getPropertyValue('title'));
        $this->assertEquals('Extension 11', $collection->getItemCollection(0xFB)->getPropertyValue('title'));
    }
}
