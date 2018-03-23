<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelJpeg;

class GH21Test extends ExifEyeTestCaseBase
{
    protected $file;

    public function setUp()
    {
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
        $input_jpeg = new PelJpeg($this->file);

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

        $output_jpeg = new PelJpeg($scaled);

        $exif = $input_jpeg->getExif();

        if ($exif !== null) {
            $output_jpeg->setExif($exif);
        }

        file_put_contents($this->file, $output_jpeg->getBytes());

        $jpeg = new PelJpeg($this->file);
        $exifin = $jpeg->getExif();
        $this->assertEquals($exif, $exifin);
    }
}
