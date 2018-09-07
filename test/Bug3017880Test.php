<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Image;
use ExifEye\core\Spec;

class Bug3017880Test extends ExifEyeTestCaseBase
{
    public function testThisDoesNotWorkAsExpected()
    {
        $filename = dirname(__FILE__) . '/image_files/bug3017880.jpg';
        try {
            $exif = null;
            $success = 1; // return true by default, as this function may not resave the file, but it's still success
            $resave_file = 0;
            $image = Image::createFromFile($filename);
            $jpeg = $image->getElement("jpeg");
            $this->assertInstanceOf('\ExifEye\core\Block\Jpeg', $jpeg);

            // should all exif data on photo be cleared (gd and iu will always strip it anyway, so only
            // force strip if you know the image you're branding is an original)
            // $jpeg->clearExif();

            if ($exif === null) {
                $app1_segment_mock = $this->getMockBuilder('ExifEye\core\Block\JpegSegmentApp1')
                    ->disableOriginalConstructor()
                    ->getMock();

                $exif = new Exif('exif', $app1_segment_mock);
                $tiff = new Tiff($exif);
            }

            $tiff = $exif->getElement("tiff");
            $ifd0 = $exif->getElement("tiff/ifd[@name='IFD0']");
            if ($ifd0 === null) {
                $ifd0 = new Ifd('ifd', 'IFD0', $tiff);
            }

            $software_name = 'Example V2';
            $software_tag = $ifd0->getElement("tag[@name='Software']");

            if ($software_tag === null) {
                new Tag('tag', $ifd0, 0x0131, 'ExifEye\core\Entry\Core\Ascii', [$software_name]);
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
