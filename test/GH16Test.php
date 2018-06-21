<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\ExifEye;
use ExifEye\core\Image;
use ExifEye\core\Entry\WindowsString;
use ExifEye\core\Block\Jpeg;

class GH16Test extends ExifEyeTestCaseBase
{
    protected $file;

    public function setUp()
    {
        parent::setUp();
        $this->file = dirname(__FILE__) . '/image_files/gh-16-tmp.jpg';
        $file = dirname(__FILE__) . '/image_files/gh-16.jpg';
        copy($file, $this->file);
    }

    public function tearDown()
    {
        unlink($this->file);
    }

    public function testThisDoesNotWorkAsExpected()
    {
        // Parse test file.
        $image = Image::loadFromFile($this->file);
        $jpeg = $image->root();
        $exif = $jpeg->first("segment/exif");
        $ifd0 = $exif->first("tiff/ifd[@name='IFD0']");
        $this->assertCount(1, $ifd0->query("tag"));
        $this->assertEquals('Ïðåâåä, ìåäâåä!', $ifd0->first("tag[@name='WindowsXPSubject']/entry")->toString());

        // Change the value of the Tag's entry and save the file to disk.
        $ifd0->remove("tag[@name='WindowsXPSubject']");
        $new_entry_value = "Превед, медвед!";
        new Tag($ifd0, 0x9C9F, 'ExifEye\core\Entry\WindowsString', [$new_entry_value]);
        $this->assertCount(1, $ifd0->query('tag'));
        $this->assertEquals($new_entry_value, $ifd0->first("tag[@name='WindowsXPSubject']/entry")->toString());
        $image->saveToFile($this->file);

        // Parse the test file again and check the Tag's new value was saved.
        $r_image = Image::loadFromFile($this->file);
        $r_jpeg = $r_image->root();
        $r_exif = $r_jpeg->first("segment/exif");
        $r_ifd0 = $r_exif->first("tiff/ifd[@name='IFD0']");
        $this->assertCount(1, $r_exif->query("tiff/ifd[@name='IFD0']/tag"));
        $this->assertEquals($new_entry_value, $r_ifd0->first("tag[@name='WindowsXPSubject']/entry")->toString());
    }
}
