<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Spec;

class Bug3017880Test extends ExifEyeTestCaseBase
{
    public function testThisDoesNotWorkAsExpected()
    {
        $filename = dirname(__FILE__) . '/images/bug3017880.jpg';
        try {
            $exif = null;
            $success = 1; // return true by default, as this function may not resave the file, but it's still success
            $resave_file = 0;
            $jpeg = new Jpeg($filename);
            $this->assertInstanceOf('\ExifEye\core\Block\Jpeg', $jpeg);

            // should all exif data on photo be cleared (gd and iu will always strip it anyway, so only
            // force strip if you know the image you're branding is an original)
            // $jpeg->clearExif();

            if ($exif === null) {
                $exif = new Exif();
                $jpeg->setExif($exif);
                $tiff = new Tiff();
                $exif->setTiff($tiff);
            }

            $tiff = $exif->getTiff();
            $ifd0 = $tiff->getIfd();
            if ($ifd0 === null) {
                $ifd0 = new Ifd(Spec::getIfdIdByType('IFD0'));
                $tiff->xxAddSubBlock($ifd0);
            }

            $software_name = 'Example V2';
            $software_tag = $ifd0->xxGetSubBlockByName('Tag', 'Software');

            if ($software_tag === null) {
                $ifd0->xxAddSubBlock(new Tag($ifd0, 0x0131, 'ExifEye\core\Entry\Core\Ascii', [$software_name]));
                $resave_file = 1;
            } else {
                $software_tag->getEntry()->setValue([$software_name]);
                $resave_file = 1;
            }

            if ($resave_file == 1 && ! file_put_contents($filename, $jpeg->getBytes())) {
                // if it was okay to resave the file, but it did not save correctly
            }
        } catch (Exception $e) {
            $this->fail('Test should not throw an exception');
        }
    }
}
