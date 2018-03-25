<?php

namespace ExifEye\Test\core;

use ExifEye\core\DataWindow;
use lsolesen\pel\PelJpeg;
use ExifEye\core\Entry\WindowsString;

class GH16Test extends ExifEyeTestCaseBase
{
    protected $file;

    public function setUp()
    {
        $this->file = dirname(__FILE__) . '/images/gh-16-tmp.jpg';
        $file = dirname(__FILE__) . '/images/gh-16.jpg';
        copy($file, $this->file);
    }

    public function tearDown()
    {
        unlink($this->file);
    }

    public function testThisDoesNotWorkAsExpected()
    {
        $subject = "Превед, медвед!";

        $data = new DataWindow(file_get_contents($this->file));

        if (PelJpeg::isValid($data)) {
            $jpeg = new PelJpeg();
            $jpeg->load($data);
            $exif = $jpeg->getExif();

            if (null === $exif) {
                $exif = new PelExif();
                $jpeg->setExif($exif);
                $tiff = new PelTiff();
                $exif->setTiff($tiff);
            }

            $tiff = $exif->getTiff();

            $ifd0 = $tiff->getIfd();
            if (null === $ifd0) {
                $ifd0 = new PelIfd(PelIfd::IFD0);
                $tiff->setIfd($ifd0);
            }
        }
        $ifd0->addEntry(new EntryWindowsString(0x9C9F, $subject));

        file_put_contents($this->file, $jpeg->getBytes());

        $jpeg = new PelJpeg($this->file);
        $exif = $jpeg->getExif();
        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();
        $written_subject = $ifd0->getEntry(0x9C9F);
        $this->assertEquals($subject, $written_subject->getValue());
    }
}
