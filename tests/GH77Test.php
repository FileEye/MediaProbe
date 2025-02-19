<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Media;

class GH77Test extends MediaProbeTestCaseBase
{
    public function testReturnModel()
    {
        $file = dirname(__FILE__) . '/media-samples/image/gh-77.jpg';

        $media = Media::createFromFile($file);
        $input_jpeg = $media->getElement("jpeg");

        $app1 = $input_jpeg->getElement("jpegSegment/exif");

        $ifd0 = $app1->getElement("tiff/ifd[@name='IFD0']");

        $modelTag = $ifd0->getElement("tag[@name='Model']");
        $this->assertInstanceOf(Tag::class, $modelTag);
        $model = $modelTag->getValue();
        $this->assertEquals($model, "Canon EOS 5D Mark III");

        $copyright_entry = $ifd0->getElement("tag[@name='Copyright']/entry");
        $this->assertInstanceOf('FileEye\MediaProbe\Entry\IfdCopyright', $copyright_entry);
        $this->assertEquals(['Copyright 2016', ''], $copyright_entry->getValue());
        $this->assertEquals('Copyright 2016 (Photographer)', $copyright_entry->toString());
    }
}
