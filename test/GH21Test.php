<?php

namespace ExifEye\Test\core;

use ExifEye\core\Data\DataString;
use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\JpegSegmentApp1;
use ExifEye\core\Image;

class GH21Test extends ExifEyeTestCaseBase
{
    protected $file;

    public function setUp()
    {
        parent::setUp();
        $this->file = dirname(__FILE__) . '/image_files/gh-21-tmp.jpg';
        $file = dirname(__FILE__) . '/image_files/gh-21.jpg';
        copy($file, $this->file);
    }

    public function tearDown()
    {
        unlink($this->file);
    }

    public function testThisDoesNotWorkAsExpected()
    {
        $scale = 0.75;
        $input_image = Image::createFromFile($this->file);
        $input_jpeg = $input_image->getElement("jpeg");

        $original = ImageCreateFromString($input_jpeg->toBytes());
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
        ob_start();
        imagejpeg($scaled, null);
        $scaled_bytes = ob_get_clean();

        $out_image = Image::createFromData(new DataString($scaled_bytes));
        $out_jpeg = $out_image->getElement("jpeg");

        $exif = $input_jpeg->getElement("jpegSegment/exif");

        // Find the COM segment in the output file.
        $out_com_segment = $out_jpeg->getElement("jpegSegment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $out_app1_segment = new JpegSegmentApp1(0xE1, $out_jpeg, $out_com_segment);

        // Add the EXIF block to the APP1 segment.
        $exif_block = new Exif($out_app1_segment);
        $data_string = new DataString($exif->toBytes());
        $exif_block->loadFromData($data_string, 0, $data_string->getSize());

        $out_image->saveToFile($this->file);

        $image = Image::createFromFile($this->file);
        $jpeg = $image->getElement("jpeg");
        $exifin = $jpeg->getElement("jpegSegment/exif");
        $this->assertEquals($exif, $exifin);
    }
}
