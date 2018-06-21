<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tiff;
use ExifEye\core\ExifEye;
use ExifEye\core\Image;

class GH77Test extends ExifEyeTestCaseBase
{
    public function testReturnModel()
    {
        $file = dirname(__FILE__) . '/image_files/gh-77.jpg';

        $image = Image::loadFromFile($file);
        $input_jpeg = $image->root();

        $app1 = $input_jpeg->first("segment/exif");

        $ifd0 = $app1->first("tiff/ifd[@name='IFD0']");

        $model = $ifd0->first("tag[@name='Model']/entry")->getValue();
        $this->assertEquals($model, "Canon EOS 5D Mark III");

        $copyright_entry = $ifd0->first("tag[@name='Copyright']/entry");
        $this->assertInstanceOf('ExifEye\core\Entry\IfdCopyright', $copyright_entry);
        $this->assertEquals(['Copyright 2016', ''], $copyright_entry->getValue());
        $this->assertEquals('Copyright 2016 (Photographer)', $copyright_entry->toString());
    }
}
