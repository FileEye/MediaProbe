<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Image;
use FileEye\ImageProbe\core\Block\Exif;
use FileEye\ImageProbe\core\Block\JpegSegmentApp1;
use FileEye\ImageProbe\core\Block\Jpeg;
use FileEye\ImageProbe\core\Collection;

class MisplacedExifTest extends ImageProbeTestCaseBase
{
    // NOTE: this test relies on the assumption that internal Jpeg::sections order is kept between segment
    // manipulations. It may fail it this changes.
    public function testRead()
    {
        // Image contains non-EXIF APP1 segment ahead of the EXIF one.
        $image = Image::createFromFile(dirname(__FILE__) . '/image_files/broken_images/misplaced-exif.jpg');
        $jpeg = $image->getElement("jpeg");

        // Assert we just have loaded correct file for the test.
        $app1 = $jpeg->getMultipleElements("jpegSegment[@name='APP1']");
        $this->assertCount(2, $app1);
        $this->assertNull($app1[0]->getElement("exif"));
        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Exif', $app1[1]->getElement("exif"));

        // Add a new APP1 segment.
        $app1_segment = new JpegSegmentApp1(Collection::get('jpegSegmentApp1'), $jpeg);
        $newExif = new Exif(Collection::get('exif'), $app1_segment);

        // Ensure new APP1 segment is set to correct position among segments.
        $app1 = $jpeg->getMultipleElements("jpegSegment[@name='APP1']");
        $this->assertCount(3, $app1);
        $this->assertNull($app1[0]->getElement("exif"));
        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Exif', $app1[1]->getElement("exif"));
        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Exif', $app1[2]->getElement("exif"));
        $this->assertSame($newExif, $app1[2]->getElement("exif"));

        // Remove the first APP1 segment containing a valid EXIF block.
        $jpeg->removeElement("jpegSegment[exif][1]");

        // Assert that only EXIF section is gone and all other shifted correctly.
        $app1 = $jpeg->getMultipleElements("jpegSegment[@name='APP1']");
        $this->assertCount(2, $app1);
        $this->assertNull($app1[0]->getElement("exif"));
        $this->assertInstanceOf('FileEye\ImageProbe\core\Block\Exif', $app1[1]->getElement("exif"));
        $this->assertSame($newExif, $app1[1]->getElement("exif"));
    }
}
