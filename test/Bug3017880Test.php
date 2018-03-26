<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Entry\Ascii;
use lsolesen\pel\PelIfd;
use ExifEye\core\Block\Jpeg;

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
                $ifd0 = new PelIfd(PelIfd::IFD0);
                $tiff->setIfd($ifd0);
            }

            $software_name = 'Example V2';
            $software = $ifd0->getEntry(0x0131);

            if ($software === null) {
                $software = new Ascii(0x0131, $software_name);
                $ifd0->addEntry($software);
                $resave_file = 1;
            } else {
                $software->setValue($software_name);
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
