<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
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

        $jpeg = new Jpeg();
        $jpeg->load($data);
        $exif = $jpeg->getExif();
        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();
        $this->assertCount(1, $ifd0->xxGetSubBlocks());

        $entry = new WindowsString([$subject]);
        $ifd0->xxAddSubBlock(new Tag($ifd0->getType(), 0x9C9F, $entry->getFormat(), $entry->getComponents(), $entry));
        $this->assertCount(1, $ifd0->xxGetSubBlocks());

        file_put_contents($this->file, $jpeg->getBytes());

        $jpeg = new Jpeg($this->file);
        $exif = $jpeg->getExif();
        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();
        $this->assertCount(1, $ifd0->xxGetSubBlocks());
        $written_subject = $ifd0->getTagByName('WindowsXPSubject')->getEntry()->getValue();
        $this->assertEquals($subject, $written_subject);
    }
}
