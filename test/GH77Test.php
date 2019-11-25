<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Block\Jpeg;
use FileEye\ImageProbe\core\Block\Tiff;
use FileEye\ImageProbe\core\ImageProbe;
use FileEye\ImageProbe\core\Image;

class GH77Test extends ImageProbeTestCaseBase
{
    public function testReturnModel()
    {
        $file = dirname(__FILE__) . '/image_files/gh-77.jpg';

        $image = Image::createFromFile($file);
        $input_jpeg = $image->getElement("jpeg");

        $app1 = $input_jpeg->getElement("jpegSegment/exif");

        $ifd0 = $app1->getElement("tiff/ifd[@name='IFD0']");

        $model = $ifd0->getElement("tag[@name='Model']")->getValue();
        $this->assertEquals($model, "Canon EOS 5D Mark III");

        $copyright_entry = $ifd0->getElement("tag[@name='Copyright']/entry");
        $this->assertInstanceOf('FileEye\ImageProbe\core\Entry\IfdCopyright', $copyright_entry);
        $this->assertEquals(['Copyright 2016', ''], $copyright_entry->getValue());
        $this->assertEquals('Copyright 2016 (Photographer)', $copyright_entry->toString());
    }
}
