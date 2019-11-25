<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Data\DataString;
use FileEye\ImageProbe\core\Block\Exif;
use FileEye\ImageProbe\core\Block\Jpeg;
use FileEye\ImageProbe\core\Block\JpegSegmentApp1;
use FileEye\ImageProbe\core\Collection;
use FileEye\ImageProbe\core\Image;

class GH21Test extends ImageProbeTestCaseBase
{
    protected $file;

    public function fcSetUp()
    {
        $this->file = dirname(__FILE__) . '/image_files/gh-21-tmp.jpg';
        $file = dirname(__FILE__) . '/image_files/gh-21.jpg';
        copy($file, $this->file);
    }

    public function fcTearDown()
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
        $out_app1_segment = new JpegSegmentApp1($out_jpeg->getCollection()->getItemCollectionByName('APP1'), $out_jpeg, $out_com_segment);

        // Add the EXIF block to the APP1 segment.
        $exif_block = new Exif(Collection::get('exif'), $out_app1_segment);
        $data_string = new DataString($exif->toBytes());
        $exif_block->loadFromData($data_string);

        $out_image->saveToFile($this->file);

        $image = Image::createFromFile($this->file);
        $jpeg = $image->getElement("jpeg");
        $exifin = $jpeg->getElement("jpegSegment/exif");
        $this->assertEquals($exif, $exifin);
    }
}
