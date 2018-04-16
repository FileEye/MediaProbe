<?php

namespace ExifEye\Test\core;

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
        // Test retrieving IFD id by type.
        $this->assertEquals(Spec::getIfdIdByType('IFD0'), Spec::getIfdIdByType('0'));
        $this->assertEquals(Spec::getIfdIdByType('IFD0'), Spec::getIfdIdByType('Main'));
        $this->assertNotNull(Spec::getIfdIdByType('CanonMakerNotes'));

        // Test retrieving IFD class.
        $this->assertEquals('ExifEye\core\Block\Ifd', Spec::getIfdClass(Spec::getIfdIdByType('IFD0')));
        $this->assertEquals('ExifEye\core\Block\IfdIndexShort', Spec::getIfdClass(Spec::getIfdIdByType('CanonCameraSettings')));

        // Test retrieving IFD post-load callbacks.
        $this->assertEquals(['ExifEye\core\Entry\ExifMakerNote::tagToIfd'], Spec::getIfdPostLoadCallbacks(Spec::getIfdIdByType('IFD0')));
        $this->assertEquals([], Spec::getIfdPostLoadCallbacks(Spec::getIfdIdByType('CanonCameraSettings')));

        // Test retrieving maker note IFD.
        $this->assertEquals(Spec::getIfdIdByType('CanonMakerNotes'), Spec::getMakerNoteIfd('Canon', 'any'));
        $this->assertNull(Spec::getMakerNoteIfd('Minolta', 'any'));

        // Test retrieving TAG name.
        $this->assertEquals('ExifIFDPointer', Spec::getTagName(Spec::getIfdIdByType('IFD0'), 0x8769));
        $this->assertEquals('ExposureTime', Spec::getTagName(Spec::getIfdIdByType('Exif'), 0x829A));
        $this->assertEquals('Compression', Spec::getTagName(Spec::getIfdIdByType('IFD0'), 0x0103));

        // Test retrieving TAG id by name.
        $this->assertEquals(0x8769, Spec::getTagIdByName(Spec::getIfdIdByType('IFD0'), 'ExifIFDPointer'));
        $this->assertEquals(0x829A, Spec::getTagIdByName(Spec::getIfdIdByType('Exif'), 'ExposureTime'));
        $this->assertEquals(0x0103, Spec::getTagIdByName(Spec::getIfdIdByType('IFD0'), 'Compression'));

        // Check methods identifying an IFD pointer TAG.
        $this->assertTrue(Spec::isTagAnIfdPointer(Spec::getIfdIdByType('IFD0'), 0x8769));
        $this->assertEquals(Spec::getIfdIdByType('Exif'), Spec::getIfdIdFromTag(Spec::getIfdIdByType('IFD0'), 0x8769));
        $this->assertFalse(Spec::isTagAnIfdPointer(Spec::getIfdIdByType('Exif'), 0x829A));
        $this->assertNull(Spec::getIfdIdFromTag(Spec::getIfdIdByType('IFD0'), 0x829A));

        // Check getTagFormat.
        $this->assertEquals([Format::UNDEFINED], Spec::getTagFormat(Spec::getIfdIdByType('Exif'), 0x9286));
        $this->assertEquals([Format::SHORT, Format::LONG], Spec::getTagFormat(Spec::getIfdIdByType('Exif'), 0xA002));

        // Check getTagTitle.
        $this->assertEquals('Exif IFD Pointer', Spec::getTagTitle(Spec::getIfdIdByType('IFD0'), 0x8769));
        $this->assertEquals('Exposure Time', Spec::getTagTitle(Spec::getIfdIdByType('Exif'), 0x829A));
        $this->assertEquals('Compression', Spec::getTagTitle(Spec::getIfdIdByType('IFD0'), 0x0103));
    }

    /**
     * Tests the Spec::getTagClass method.
     */
    public function testGetTagClass()
    {
        $this->assertEquals('ExifEye\core\Entry\ExifUserComment', Spec::getTagClass(Spec::getIfdIdByType('Exif'), 0x9286));
        $this->assertEquals('ExifEye\core\Entry\Time', Spec::getTagClass(Spec::getIfdIdByType('Exif'), 0x9003));
        //@todo drop the else part once PHP < 5.6 (hence PHPUnit 4.8.36) support is removed.
        //@todo change below to ExifEyeException::class once PHP 5.4 support is removed.
        if (method_exists($this, 'expectException')) {
            $this->expectException('ExifEye\core\ExifEyeException');
            $this->expectExceptionMessage("No format can be derived for tag: 0x0003 (ImageHeight) in ifd: 'CanonPictureInformation'");
        } else {
            $this->setExpectedException('ExifEye\core\ExifEyeException', "No format can be derived for tag: 0x0003 (ImageHeight) in ifd: 'CanonPictureInformation'");
        }
        $this->assertNull(Spec::getTagClass(Spec::getIfdIdByType('CanonPictureInformation'), 0x0003));
    }

    /**
     * Tests getting decoded TAG text from TAG values.
     *
     * @dataProvider getTagTextProvider
     */
    public function testGetTagText($expected_text, $expected_class, $ifd, $tag, array $args, $brief = false)
    {
        $ifd_id = Spec::getIfdIdByType($ifd);
        $tag_id = Spec::getTagIdByName($ifd_id, $tag);
        $entry_class_name = Spec::getTagClass($ifd_id, $tag_id);
        $entry = new $entry_class_name($args);
        $this->assertInstanceOf($expected_class, $entry);
        $tag = new Tag($ifd_id, $tag_id, $entry->getFormat(), $entry->getComponents());
        $tag->setEntry($entry);
        $options['short'] = $brief;  // xx
        $this->assertEquals($expected_text, $entry->toString($options));
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
}
