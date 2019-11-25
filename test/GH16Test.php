<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Block\Exif;
use FileEye\ImageProbe\core\Block\Ifd;
use FileEye\ImageProbe\core\Block\IfdFormat;
use FileEye\ImageProbe\core\Block\IfdItem;
use FileEye\ImageProbe\core\Block\Tag;
use FileEye\ImageProbe\core\Block\Tiff;
use FileEye\ImageProbe\core\Collection;
use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\Image;
use FileEye\ImageProbe\core\Entry\WindowsString;
use FileEye\ImageProbe\core\Block\Jpeg;

class GH16Test extends ImageProbeTestCaseBase
{
    protected $file;

    public function fcSetUp()
    {
        $this->file = dirname(__FILE__) . '/image_files/gh-16-tmp.jpg';
        $file = dirname(__FILE__) . '/image_files/gh-16.jpg';
        copy($file, $this->file);
    }

    public function fcTearDown()
    {
        unlink($this->file);
    }

    public function testThisDoesNotWorkAsExpected()
    {
        // Parse test file.
        $image = Image::createFromFile($this->file);
        $jpeg = $image->getElement("jpeg");
        $exif = $jpeg->getElement("jpegSegment/exif");
        $ifd0 = $exif->getElement("tiff/ifd[@name='IFD0']");
        $this->assertCount(1, $ifd0->getMultipleElements("tag"));
        $this->assertEquals('Ïðåâåä, ìåäâåä!', $ifd0->getElement("tag[@name='WindowsXPSubject']")->toString());

        // Change the value of the Tag's entry and save the file to disk.
        $ifd0->removeElement("tag[@name='WindowsXPSubject']");
        $new_entry_value = "Превед, медвед!";
        $tag = new Tag(new IfdItem($ifd0->getCollection()->getItemCollection(0x9C9F), IfdFormat::getFromName('Byte')), $ifd0);
        new WindowsString($tag, [$new_entry_value]);
        $this->assertCount(1, $ifd0->getMultipleElements('tag'));
        $this->assertEquals($new_entry_value, $ifd0->getElement("tag[@name='WindowsXPSubject']")->toString());
        $image->saveToFile($this->file);

        // Parse the test file again and check the Tag's new value was saved.
        $r_image = Image::createFromFile($this->file);
        $r_jpeg = $r_image->getElement("jpeg");
        $r_exif = $r_jpeg->getElement("jpegSegment/exif");
        $r_ifd0 = $r_exif->getElement("tiff/ifd[@name='IFD0']");
        $this->assertCount(1, $r_exif->getMultipleElements("tiff/ifd[@name='IFD0']/tag"));
        $this->assertEquals($new_entry_value, $r_ifd0->getElement("tag[@name='WindowsXPSubject']")->toString());
    }
}
