<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Block\Jpeg;
use FileEye\ImageInfo\core\Block\Tiff;
use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\Image;

class GH77Test extends ImageInfoTestCaseBase
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
        $this->assertInstanceOf('FileEye\ImageInfo\core\Entry\IfdCopyright', $copyright_entry);
        $this->assertEquals(['Copyright 2016', ''], $copyright_entry->getValue());
        $this->assertEquals('Copyright 2016 (Photographer)', $copyright_entry->toString());
    }
}
