<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Exif\Exif;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\Block\Exif\Ifd;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Media;

class Bug3017880Test extends MediaProbeTestCaseBase
{
    public function testThisDoesNotWorkAsExpected()
    {
        $filename = dirname(__FILE__) . '/image_files/bug3017880.jpg';
        try {
            $exif = null;
            $resave_file = 0;
            $media = Media::createFromFile($filename);
            $jpeg = $media->getElement("jpeg");
            $this->assertInstanceOf(Jpeg::class, $jpeg);

            // should all exif data on photo be cleared (gd and iu will always strip it anyway, so only
            // force strip if you know the image you're branding is an original)
            // $jpeg->clearExif();

            if ($exif === null) {
                $app1_segment_mock = $this->getMockBuilder('FileEye\MediaProbe\Block\JpegSegmentApp1')
                    ->disableOriginalConstructor()
                    ->getMock();

                $exif = new Exif(Collection::get('Exif'), $app1_segment_mock);
                new Tiff(Collection::get('Tiff'), $exif);
            }

            $tiff = $exif->getElement("tiff");
            $ifd0 = $exif->getElement("tiff/ifd[@name='IFD0']");
            if ($ifd0 === null) {
                $ifd0 = new Ifd(new ItemDefinition(Collection::get('Ifd\Ifd0'), ItemFormat::LONG));
            }

            $software_name = 'Example V2';
            $software_tag = $ifd0->getElement("tag[@name='Software']");

            if ($software_tag === null) {
                $tag = new Tag(new ItemDefinition($ifd0->getCollection()->getItemCollection(0x0131), ItemFormat::ASCII), $ifd0);
                new Ascii($tag, [$software_name]);
                $resave_file = 1;
            } else {
                $software_tag->getElement("entry")->setValue([$software_name]);
                $resave_file = 1;
            }

            if ($resave_file == 1 && !$media->saveToFile($filename)) {
                // if it was okay to resave the file, but it did not save correctly
            }
        } catch (Exception $e) {
            $this->fail('Test should not throw an exception');
        }
    }
}
