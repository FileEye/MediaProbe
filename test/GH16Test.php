<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\DataWindow;
use ExifEye\core\Entry\WindowsString;
use ExifEye\core\Block\Jpeg;

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

        if (Jpeg::isValid($data)) {
            $jpeg = new Jpeg();
            $jpeg->load($data);
            $exif = $jpeg->getExif();

            if (null === $exif) {
                $exif = new Exif();
                $jpeg->setExif($exif);
                $tiff = new Tiff();
                $exif->setTiff($tiff);
            }

            $tiff = $exif->getTiff();

            $ifd0 = $tiff->getIfd();
            if (null === $ifd0) {
                $ifd0 = new Ifd(Ifd::IFD0);
                $tiff->setIfd($ifd0);
            }
        }
        $entry = new WindowsString($ifd0->getType(), 0x9C9F, [$subject, true]); /* xx */
        $tag = new Tag($ifd0->getType(), 0x9C9F, $entry->getFormat(), $entry->getComponents(), null/* xx */);
        $ifd0->xxAddSubBlock($tag);
        $tag->xxAddEntry($entry);

        file_put_contents($this->file, $jpeg->getBytes());

        $jpeg = new Jpeg($this->file);
        $exif = $jpeg->getExif();
        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();
        $written_subject = $ifd0->xxGetTagByName('WindowsXPSubject')->xxGetEntry()->getValue();
        $this->assertEquals($subject, $written_subject);
    }
}
