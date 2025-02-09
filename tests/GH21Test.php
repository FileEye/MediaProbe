<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Media\Jpeg;
use FileEye\MediaProbe\Block\Media\Jpeg\ExifApp;
use FileEye\MediaProbe\Block\Media\Jpeg\SegmentApp1;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Dumper\DefaultDumper;
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

        $out_media = (new Media())->fromDataElement(new DataString($scaled_bytes));
        $out_jpeg = $out_media->getElement("jpeg");
        $this->assertInstanceOf(Jpeg::class, $out_jpeg);

        // Find the COM segment in the output file.
        $out_com_segment = $out_jpeg->getElement("jpegSegment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $out_app1_segment = new SegmentApp1($out_jpeg->collection->getItemCollectionByName('APP1'), $out_jpeg);
        $out_jpeg->graftBlock($out_app1_segment, $out_com_segment);

        // Add the EXIF block to the APP1 segment.
        $exif_block = new ExifApp(CollectionFactory::get('Media\Jpeg\ExifApp'), $out_app1_segment);
        $data_string = new DataString($input_exif->toBytes());
        $data_string->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $exif_block->fromDataElement($data_string);
        $out_app1_segment->graftBlock($exif_block);

        $out_media->saveToFile($this->file);

        $media = Media::createFromFile($this->file);
        $jpeg = $media->getElement("jpeg");
        $exifin = $jpeg->getElement("jpegSegment/exif");

        $dumper = new DefaultDumper();
        $this->assertEquals($input_exif->asArray($dumper), $exifin->asArray($dumper));
    }
}
