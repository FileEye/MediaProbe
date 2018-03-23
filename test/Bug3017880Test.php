<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelJpeg;
use lsolesen\pel\PelExif;
use lsolesen\pel\PelTiff;
use lsolesen\pel\PelIfd;
use lsolesen\pel\PelTag;
use lsolesen\pel\PelEntryAscii;

class Bug3017880Test extends ExifEyeTestCaseBase
{
    public function testThisDoesNotWorkAsExpected()
    {
        $filename = dirname(__FILE__) . '/images/bug3017880.jpg';
        try {
            $exif = null;
            $success = 1; // return true by default, as this function may not resave the file, but it's still success
            $resave_file = 0;
            $jpeg = new PelJpeg($filename);
            $this->assertInstanceOf('\lsolesen\pel\PelJpeg', $jpeg);

            // should all exif data on photo be cleared (gd and iu will always strip it anyway, so only
            // force strip if you know the image you're branding is an original)
            // $jpeg->clearExif();

            if ($exif === null) {
                $exif = new PelExif();
                $jpeg->setExif($exif);
                $tiff = new PelTiff();
                $exif->setTiff($tiff);
            }

            $tiff = $exif->getTiff();
            $ifd0 = $tiff->getIfd();
            if ($ifd0 === null) {
                $ifd0 = new PelIfd(PelIfd::IFD0);
                $tiff->setIfd($ifd0);
            }

            $software_name = 'Example V2';
            $software = $ifd0->getEntry(PelTag::SOFTWARE);

            if ($software === null) {
                $software = new PelEntryAscii(PelTag::SOFTWARE, $software_name);
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
