<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Media\Tiff\Ifd;
use FileEye\MediaProbe\Block\Media\Tiff\IfdEntryValueObject;
use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\WindowsString;
use FileEye\MediaProbe\Media;

class GH16Test extends MediaProbeTestCaseBase
{
    protected string $file;

    public function setUp(): void
    {
        parent::setUp();
        $this->file = dirname(__FILE__) . '/media-samples/image/gh-16-tmp.jpg';
        $file = dirname(__FILE__) . '/media-samples/image/gh-16.jpg';
        copy($file, $this->file);
    }

    public function tearDown(): void
    {
        unlink($this->file);
        parent::tearDown();
    }

    public function testThisDoesNotWorkAsExpected()
    {
        // Parse test file.
        $media = Media::createFromFile($this->file);
        $jpeg = $media->getElement("jpeg");
        $exif = $jpeg->getElement("jpegSegment/exif");
        $ifd0 = $exif->getElement("tiff/ifd[@name='IFD0']");
        $this->assertInstanceOf(Ifd::class, $ifd0);
        $this->assertCount(1, $ifd0->getMultipleElements("tag"));
        $this->assertEquals('Ïðåâåä, ìåäâåä!', $ifd0->getElement("tag[@name='XPSubject']")->toString());

        // Change the value of the Tag's entry and save the file to disk.
        $ifd0->removeElement("tag[@name='XPSubject']");
        $new_entry_value = "Превед, медвед!";
        $tag = new Tag(
            ifdEntry: new IfdEntryValueObject(
                collection: $ifd0->getCollection()->getItemCollection(0x9C9F),
                dataFormat: DataFormat::BYTE,
            ),
            parent: $ifd0,
        );
        $ifd0->graftBlock($tag);
        new WindowsString($tag, new DataString(mb_convert_encoding($new_entry_value, 'UCS-2LE', 'UTF-8') . "\x00\x00"));
        $this->assertCount(1, $ifd0->getMultipleElements('tag'));
        $this->assertEquals($new_entry_value, $ifd0->getElement("tag[@name='XPSubject']")->toString());
        $media->saveToFile($this->file);

        // Parse the test file again and check the Tag's new value was saved.
        $r_media = Media::createFromFile($this->file);
        $r_jpeg = $r_media->getElement("jpeg");
        $r_exif = $r_jpeg->getElement("jpegSegment/exif");
        $r_ifd0 = $r_exif->getElement("tiff/ifd[@name='IFD0']");
        $this->assertCount(1, $r_exif->getMultipleElements("tiff/ifd[@name='IFD0']/tag"));
        $this->assertEquals($new_entry_value, $r_ifd0->getElement("tag[@name='XPSubject']")->toString());
    }
}
