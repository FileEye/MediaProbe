<?php

namespace ExifEye\Test\core;

use ExifEye\core\DataWindow;
use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\JpegSegment;

class GH21Test extends ExifEyeTestCaseBase
{
    protected $file;

    public function setUp()
    {
        parent::setUp();
        $this->file = dirname(__FILE__) . '/images/gh-21-tmp.jpg';
        $file = dirname(__FILE__) . '/images/gh-21.jpg';
        copy($file, $this->file);
    }

    public function tearDown()
    {
        unlink($this->file);
    }

    public function testThisDoesNotWorkAsExpected()
    {
        $scale = 0.75;
        $input_jpeg = new Jpeg($this->file);

        $original = ImageCreateFromString($input_jpeg->getBytes());
        $original_w = ImagesX($original);
        $original_h = ImagesY($original);

        $scaled_w = $original_w * $scale;
        $scaled_h = $original_h * $scale;

        $scaled = ImageCreateTrueColor($scaled_w, $scaled_h);
        ImageCopyResampled(
            $scaled,
            $original,
            0,
            0, /* dst (x,y) */
            0,
            0, /* src (x,y) */
            $scaled_w,
            $scaled_h,
            $original_w,
            $original_h
        );

        $out_jpeg = new Jpeg($scaled);

        $exif = $input_jpeg->first("segment/exif");

        // Find the COM segment in the output file.
        $out_com_segment = $out_jpeg->first("segment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $out_app1_segment = new JpegSegment(0xE1, $out_jpeg, $out_com_segment);

        // Add the EXIF block to the APP1 segment.
        $exif_block = new Exif($out_app1_segment);
        $exif_block->loadFromData(new DataWindow($exif->toBytes()));

        file_put_contents($this->file, $out_jpeg->getBytes());
        
        $jpeg = new Jpeg($this->file);
        $exifin = $jpeg->first("segment/exif");
        $this->assertEquals($exif, $exifin);
    }
}
