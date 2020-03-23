<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Exif;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\JpegSegmentApp1;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\Utility\ConvertBytes;

class GH21Test extends MediaProbeTestCaseBase
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
        $input_media = Media::createFromFile($this->file);
        $input_jpeg = $input_media->getElement("jpeg");
        $input_exif = $input_jpeg->getElement("jpegSegment/exif");
        
        $original = ImageCreateFromString($input_jpeg->toBytes());
        $original_w = ImagesX($original);
        $original_h = ImagesY($original);

        $scale = 0.75;
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

        $out_media = Media::createFromData(new DataString($scaled_bytes));
        $out_jpeg = $out_media->getElement("jpeg");

        // Find the COM segment in the output file.
        $out_com_segment = $out_jpeg->getElement("jpegSegment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $out_app1_segment = new JpegSegmentApp1($out_jpeg->getCollection()->getItemCollectionByName('APP1'), $out_jpeg, $out_com_segment);

        // Add the EXIF block to the APP1 segment.
        $exif_block = new Exif(Collection::get('Exif'), $out_app1_segment);
        $exif_data = 'xx' . $input_exif->toBytes(); // xx todo the first two fake bytes are evil, remove
        $data_string = new DataString($exif_data);
        $data_string->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $exif_block->loadFromData($data_string, 0, strlen($exif_data) - 2); // xx todo two fake bytes are evil, remove

        $out_media->saveToFile($this->file);

        $media = Media::createFromFile($this->file);
        $jpeg = $media->getElement("jpeg");
        $exifin = $jpeg->getElement("jpegSegment/exif");
        $this->assertEquals($input_exif, $exifin);
    }
}
