<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\JpegSegment;
use ExifEye\core\Block\Jpeg;

class MisplacedExifTest extends ExifEyeTestCaseBase
{
    // NOTE: this test relies on the assumption that internal Jpeg::sections order is kept between segment
    // manipulations. It may fail it this changes.
    public function testRead()
    {
        // Image contains non-EXIF APP1 segment ahead of the EXIF one.
        $jpeg = new Jpeg(dirname(__FILE__) . '/broken_images/misplaced-exif.jpg');

        // Assert we just have loaded correct file for the test.
        $app1 = $jpeg->query("segment[@name='APP1']");
        $this->assertCount(2, $app1);
        $this->assertNull($app1[0]->first("exif"));
        $this->assertInstanceOf('ExifEye\core\Block\Exif', $app1[1]->first("exif"));

        // Add a new APP1 segment.
        $app1_segment = new JpegSegment(0xE1, $jpeg);
        $newExif = new Exif($app1_segment);

        // Ensure new APP1 segment is set to correct position among segments.
        $app1 = $jpeg->query("segment[@name='APP1']");
        $this->assertCount(3, $app1);
        $this->assertNull($app1[0]->first("exif"));
        $this->assertInstanceOf('ExifEye\core\Block\Exif', $app1[1]->first("exif"));
        $this->assertInstanceOf('ExifEye\core\Block\Exif', $app1[2]->first("exif"));
        $this->assertSame($newExif, $app1[2]->first("exif"));

        // Remove the first APP1 segment containing a valid EXIF block.
        $jpeg->remove("segment[exif]");

        // Assert that only EXIF section is gone and all other shifted correctly.
        $app1 = $jpeg->query("segment[@name='APP1']");
        $this->assertCount(2, $app1);
        $this->assertNull($app1[0]->first("exif"));
        $this->assertInstanceOf('ExifEye\core\Block\Exif', $app1[1]->first("exif"));
        $this->assertSame($newExif, $app1[1]->first("exif"));
    }
}
