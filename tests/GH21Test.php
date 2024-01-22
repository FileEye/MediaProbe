<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Exif\Exif;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\JpegSegmentApp1;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\Utility\ConvertBytes;

class GH21Test extends MediaProbeTestCaseBase
{
    protected string $file;

    public function setUp(): void
    {
        parent::setUp();
        $this->file = dirname(__FILE__) . '/media-samples/image/gh-21-tmp.jpg';
        $file = dirname(__FILE__) . '/media-samples/image/gh-21.jpg';
        copy($file, $this->file);
    }

    public function tearDown(): void
    {
        unlink($this->file);
        parent::tearDown();
    }

    public function testThisDoesNotWorkAsExpected()
    {
        $input_media = Media::parseFromFile($this->file);
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

        $out_media = Media::parse(new DataString($scaled_bytes));
        $out_jpeg = $out_media->getElement("jpeg");

        // Find the COM segment in the output file.
        $out_com_segment = $out_jpeg->getElement("jpegSegment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $app1_segment_definition = new ItemDefinition($out_jpeg->getCollection()->getItemCollectionByName('APP1'));
        $out_app1_segment = new JpegSegmentApp1($app1_segment_definition, $out_jpeg, $out_com_segment);

        // Add the EXIF block to the APP1 segment.
        $exif_definition = new ItemDefinition(CollectionFactory::get('Exif\Exif'));
        $exif_block = new Exif($exif_definition, $out_app1_segment);
        $exif_data = $input_exif->toBytes();
        $data_string = new DataString($exif_data);
        $data_string->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $exif_block->parseData($data_string);

        $out_media->saveToFile($this->file);

        $media = Media::parseFromFile($this->file);
        $jpeg = $media->getElement("jpeg");
        $exifin = $jpeg->getElement("jpegSegment/exif");
        $this->assertEquals($input_exif, $exifin);
    }
}
