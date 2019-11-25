<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Block\Exif;
use FileEye\ImageProbe\core\Block\IfdFormat;
use FileEye\ImageProbe\core\Block\Tiff;
use FileEye\ImageProbe\core\Entry\Core\Ascii;
use FileEye\ImageProbe\core\Block\Ifd;
use FileEye\ImageProbe\core\Block\IfdItem;
use FileEye\ImageProbe\core\Block\Tag;
use FileEye\ImageProbe\core\Block\Jpeg;
use FileEye\ImageProbe\core\Collection;
use FileEye\ImageProbe\core\Image;

class Bug3017880Test extends ImageProbeTestCaseBase
{
    public function testThisDoesNotWorkAsExpected()
    {
        $filename = dirname(__FILE__) . '/image_files/bug3017880.jpg';
        try {
            $exif = null;
            $resave_file = 0;
            $image = Image::createFromFile($filename);
            $jpeg = $image->getElement("jpeg");
            $this->assertInstanceOf('\FileEye\ImageProbe\core\Block\Jpeg', $jpeg);

            // should all exif data on photo be cleared (gd and iu will always strip it anyway, so only
            // force strip if you know the image you're branding is an original)
            // $jpeg->clearExif();

            if ($exif === null) {
                $app1_segment_mock = $this->getMockBuilder('FileEye\ImageProbe\core\Block\JpegSegmentApp1')
                    ->disableOriginalConstructor()
                    ->getMock();

                $exif = new Exif(Collection::get('exif'), $app1_segment_mock);
                new Tiff(Collection::get('tiff'), $exif);
            }

            $tiff = $exif->getElement("tiff");
            $ifd0 = $exif->getElement("tiff/ifd[@name='IFD0']");
            if ($ifd0 === null) {
                $ifd0 = new Ifd(new IfdItem(Collection::get('ifd0'), IfdFormat::getFromName('Long')));
            }

            $software_name = 'Example V2';
            $software_tag = $ifd0->getElement("tag[@name='Software']");

            if ($software_tag === null) {
                $tag = new Tag(new IfdItem($ifd0->getCollection()->getItemCollection(0x0131), IfdFormat::getFromName('Ascii')), $ifd0);
                new Ascii($tag, [$software_name]);
                $resave_file = 1;
            } else {
                $software_tag->getElement("entry")->setValue([$software_name]);
                $resave_file = 1;
            }

            if ($resave_file == 1 && !$image->saveToFile($filename)) {
                // if it was okay to resave the file, but it did not save correctly
            }
        } catch (Exception $e) {
            $this->fail('Test should not throw an exception');
        }
    }
}
