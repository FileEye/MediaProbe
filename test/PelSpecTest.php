<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\EntryBase;
use ExifEye\core\Format;
use lsolesen\pel\PelSpec;

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
        // Test retrieving IFD type.
        $this->assertEquals('0', PelSpec::getIfdType(0));
        $this->assertEquals('Exif', PelSpec::getIfdType(2));
        $this->assertNotNull(PelSpec::getIfdType(5));

        // Test retrieving IFD id by type.
        $this->assertEquals(0, PelSpec::getIfdIdByType('0'));
        $this->assertEquals(0, PelSpec::getIfdIdByType('IFD0'));
        $this->assertEquals(0, PelSpec::getIfdIdByType('Main'));
        $this->assertEquals(2, PelSpec::getIfdIdByType('Exif'));
        $this->assertNotNull(PelSpec::getIfdIdByType('Canon Maker Notes'));

        // Test retrieving IFD class.
        $this->assertEquals('ExifEye\core\Block\Ifd', PelSpec::getIfdClass(PelSpec::getIfdIdByType('0')));
        $this->assertEquals('ExifEye\core\Block\IfdIndexShort', PelSpec::getIfdClass(PelSpec::getIfdIdByType('Canon Camera Settings')));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals(['ExifEye\core\Entry\MakerNote::tagToIfd'], PelSpec::getIfdPostLoadCallbacks(PelSpec::getIfdIdByType('0')));
        $this->assertEquals([], PelSpec::getIfdPostLoadCallbacks(PelSpec::getIfdIdByType('Canon Camera Settings')));

        // Test retrieving maker note IFD.
        $this->assertEquals(PelSpec::getIfdIdByType('Canon Maker Notes'), PelSpec::getMakerNoteIfd('Canon', 'any'));
        $this->assertNull(PelSpec::getMakerNoteIfd('Minolta', 'any'));

        // Test retrieving TAG name.
        $this->assertEquals('ExifIFDPointer', PelSpec::getTagName(0, 0x8769));
        $this->assertEquals('ExposureTime', PelSpec::getTagName(2, 0x829A));
        $this->assertEquals('Compression', PelSpec::getTagName(0, 0x0103));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, PelSpec::getTagIdByName(0, 'ExifIFDPointer'));
        $this->assertEquals(0x829A, PelSpec::getTagIdByName(2, 'ExposureTime'));
        $this->assertEquals(0x0103, PelSpec::getTagIdByName(0, 'Compression'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertTrue(PelSpec::isTagAnIfdPointer(0, 0x8769));
        $this->assertEquals(2, PelSpec::getIfdIdFromTag(0, 0x8769));
        $this->assertFalse(PelSpec::isTagAnIfdPointer(2, 0x829A));
        $this->assertNull(PelSpec::getIfdIdFromTag(0, 0x829A));

        // Check getTagFormat.
        $this->assertEquals([Format::UNDEFINED], PelSpec::getTagFormat(2, 0x9286));
        $this->assertEquals([Format::SHORT, Format::LONG], PelSpec::getTagFormat(2, 0xA002));

        // Check getTagTitle.
        $this->assertEquals('Exif IFD Pointer', PelSpec::getTagTitle(0, 0x8769));
        $this->assertEquals('Exposure Time', PelSpec::getTagTitle(2, 0x829A));
        $this->assertEquals('Compression', PelSpec::getTagTitle(0, 0x0103));
    }

    /**
     * Tests the PelSpec::getTagClass method.
     */
    public function testGetTagClass()
    {
        $this->assertEquals('ExifEye\core\Entry\UserComment', PelSpec::getTagClass(2, 0x9286));
        $this->assertEquals('ExifEye\core\Entry\Time', PelSpec::getTagClass(2, 0x9003));
        //@todo drop the else part once PHP < 5.6 (hence PHPUnit 4.8.36) support is removed.
        //@todo change below to ExifEyeException::class once PHP 5.4 support is removed.
        if (method_exists($this, 'expectException')) {
            $this->expectException('ExifEye\core\ExifEyeException');
            $this->expectExceptionMessage("No format can be derived for tag: 'ImageHeight' in ifd: 'Canon Picture Information'");
        } else {
            $this->setExpectedException('ExifEye\core\ExifEyeException', "No format can be derived for tag: 'ImageHeight' in ifd: 'Canon Picture Information'");
        }
        $this->assertNull(PelSpec::getTagClass(PelSpec::getIfdIdByType('Canon Picture Information'), 0x0003));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     *
     * @dataProvider getTagTextProvider
     */
    public function testGetTagText($expected_text, $expected_class, $ifd, $tag, array $args, $brief = false)
    {
        $ifd_id = PelSpec::getIfdIdByType($ifd);
        $tag_id = PelSpec::getTagIdByName($ifd_id, $tag);
        $entry = EntryBase::createNew($ifd_id, $tag_id, $args);
        $this->assertInstanceOf($expected_class, $entry);
        $this->assertEquals($expected_text, PelSpec::getTagText($entry, $brief));
    }

    /**
     * Data provider for testGetTagText.
     */
    public function getTagTextProvider()
    {
        return [
          'IFD0/PlanarConfiguration - value 1' => [
              'chunky format', 'ExifEye\core\Entry\Short', 'IFD0', 'PlanarConfiguration', [1],
          ],
          'IFD0/PlanarConfiguration - missing mapping' => [
              null, 'ExifEye\core\Entry\Short', 'IFD0', 'PlanarConfiguration', [6.1],
          ],
          'Canon Panorama Information/PanoramaDirection - value 4' => [
              '2x2 Matrix (Clockwise)', 'ExifEye\core\Entry\SignedShort', 'Canon Panorama Information', 'PanoramaDirection', [4],
          ],
          'Canon Camera Settings/LensType - value 493' => [
              'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM', 'ExifEye\core\Entry\Short', 'Canon Camera Settings', 'LensType', [493],
          ],
          'Canon Camera Settings/LensType - value 493.1' => [
              'Canon EF 24-105mm f/4L IS USM', 'ExifEye\core\Entry\Short', 'Canon Camera Settings', 'LensType', [493.1],
          ],
          'IFD0/YCbCrSubSampling - value 2, 1' => [
              'YCbCr4:2:2', 'ExifEye\core\Entry\Short', 'IFD0', 'YCbCrSubSampling', [2, 1],
          ],
          'IFD0/YCbCrSubSampling - value 2, 2' => [
              'YCbCr4:2:0', 'ExifEye\core\Entry\Short', 'IFD0', 'YCbCrSubSampling', [2, 2],
          ],
          'IFD0/YCbCrSubSampling - value 6, 7' => [
              '6, 7', 'ExifEye\core\Entry\Short', 'IFD0', 'YCbCrSubSampling', [6, 7],
          ],
          'Exif/SubjectArea - value 6, 7' => [
              '(x,y) = (6,7)', 'ExifEye\core\Entry\Short', 'Exif', 'SubjectArea', [6, 7],
          ],
          'Exif/SubjectArea - value 5, 6, 7' => [
              'Within distance 5 of (x,y) = (6,7)', 'ExifEye\core\Entry\Short', 'Exif', 'SubjectArea', [5, 6, 7],
          ],
          'Exif/SubjectArea - value 4, 5, 6, 7' => [
              'Within rectangle (width 4, height 5) around (x,y) = (6,7)', 'ExifEye\core\Entry\Short', 'Exif', 'SubjectArea', [4, 5, 6, 7],
          ],
          'Exif/SubjectArea - wrong components' => [
              'Unexpected number of components (1, expected 2, 3, or 4).', 'ExifEye\core\Entry\Short', 'Exif', 'SubjectArea', [6],
          ],
          'Exif/FNumber - value 60, 10' => [
              'f/6.0', 'ExifEye\core\Entry\Rational', 'Exif', 'FNumber', [[60, 10]],
          ],
          'Exif/FNumber - value 26, 10' => [
              'f/2.6', 'ExifEye\core\Entry\Rational', 'Exif', 'FNumber', [[26, 10]],
          ],
          'Exif/ApertureValue - value 60, 10' => [
              'f/8.0', 'ExifEye\core\Entry\Rational', 'Exif', 'ApertureValue', [[60, 10]],
          ],
          'Exif/ApertureValue - value 26, 10' => [
              'f/2.5', 'ExifEye\core\Entry\Rational', 'Exif', 'ApertureValue', [[26, 10]],
          ],
          'Exif/FocalLength - value 60, 10' => [
              '6.0 mm', 'ExifEye\core\Entry\Rational', 'Exif', 'FocalLength', [[60, 10]],
          ],
          'Exif/FocalLength - value 26, 10' => [
              '2.6 mm', 'ExifEye\core\Entry\Rational', 'Exif', 'FocalLength', [[26, 10]],
          ],
          'Exif/SubjectDistance - value 60, 10' => [
              '6.0 m', 'ExifEye\core\Entry\SignedRational', 'Exif', 'SubjectDistance', [[60, 10]],
          ],
          'Exif/SubjectDistance - value 26, 10' => [
              '2.6 m', 'ExifEye\core\Entry\SignedRational', 'Exif', 'SubjectDistance', [[26, 10]],
          ],
          'Exif/ExposureTime - value 60, 10' => [
              '6 sec.', 'ExifEye\core\Entry\Rational', 'Exif', 'ExposureTime', [[60, 10]],
          ],
          'Exif/ExposureTime - value 5, 10' => [
              '1/2 sec.', 'ExifEye\core\Entry\Rational', 'Exif', 'ExposureTime', [[5, 10]],
          ],
          'GPS/GPSLongitude' => [
              '30° 45\' 28" (30.76°)', 'ExifEye\core\Entry\Rational', 'GPS', 'GPSLongitude', [[30, 1], [45, 1], [28, 1]],
          ],
          'GPS/GPSLatitude' => [
              '50° 33\' 12" (50.55°)', 'ExifEye\core\Entry\Rational', 'GPS', 'GPSLatitude', [[50, 1], [33, 1], [12, 1]],
          ],
          'Exif/ShutterSpeedValue - value 5, 10' => [
              '5/10 sec. (APEX: 1)', 'ExifEye\core\Entry\SignedRational', 'Exif', 'ShutterSpeedValue', [[5, 10]],
          ],
          'Exif/BrightnessValue - value 5, 10' => [
              '5/10', 'ExifEye\core\Entry\SignedRational', 'Exif', 'BrightnessValue', [[5, 10]],
          ],
          'Exif/ExposureBiasValue - value 5, 10' => [
              '+0.5', 'ExifEye\core\Entry\SignedRational', 'Exif', 'ExposureBiasValue', [[5, 10]],
          ],
          'Exif/ExposureBiasValue - value -5, 10' => [
              '-0.5', 'ExifEye\core\Entry\SignedRational', 'Exif', 'ExposureBiasValue', [[-5, 10]],
          ],
          'Exif/ExifVersion - short' => [
              'Exif 2.2', 'ExifEye\core\Entry\Version', 'Exif', 'ExifVersion', [2.2], true,
          ],
          'Exif/ExifVersion - long' => [
              'Exif Version 2.2', 'ExifEye\core\Entry\Version', 'Exif', 'ExifVersion', [2.2],
          ],
          'Exif/FlashPixVersion - short' => [
              'FlashPix 2.5', 'ExifEye\core\Entry\Version', 'Exif', 'FlashPixVersion', [2.5], true,
          ],
          'Exif/FlashPixVersion - long' => [
              'FlashPix Version 2.5', 'ExifEye\core\Entry\Version', 'Exif', 'FlashPixVersion', [2.5],
          ],
          'Interoperability/InteroperabilityVersion - short' => [
              'Interoperability 1.0', 'ExifEye\core\Entry\Version', 'Interoperability', 'InteroperabilityVersion', [1], true,
          ],
          'Interoperability/InteroperabilityVersion - long' => [
              'Interoperability Version 1.0', 'ExifEye\core\Entry\Version', 'Interoperability', 'InteroperabilityVersion', [1],
          ],
          'Exif/ComponentsConfiguration' => [
              'Y Cb Cr -', 'ExifEye\core\Entry\Undefined', 'Exif', 'ComponentsConfiguration', ["\x01\x02\x03\0"],
          ],
          'Exif/FileSource' => [
              'DSC', 'ExifEye\core\Entry\Undefined', 'Exif', 'FileSource', ["\x03"],
          ],
          'Exif/SceneType' => [
              'Directly photographed', 'ExifEye\core\Entry\Undefined', 'Exif', 'SceneType', ["\x01"],
          ],
        ];
    }
}
