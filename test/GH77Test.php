<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tiff;
use ExifEye\core\ExifEye;

class GH77Test extends ExifEyeTestCaseBase
{
    public function testReturnModel()
    {
        $file = dirname(__FILE__) . '/images/gh-77.jpg';

        $input_jpeg = new Jpeg($file);
        $app1 = $input_jpeg->getExif();

        $tiff = $app1->getTiff();
        $ifd0 = $tiff->getIfd();

        $model = $ifd0->xxGetTagByName('Model')->xxGetEntry()->getValue();
        $this->assertEquals($model, "Canon EOS 5D Mark III");

        $copyright_entry = $ifd0->xxGetTagByName('Model')->xxGetEntry();
        $this->assertInstanceOf('ExifEye\core\Entry\Copyright', $copyright_entry);
        $this->assertEquals(['Copyright 2016', ''], $copyright_entry->getValue());
        $this->assertEquals('Copyright 2016 (Photographer)', $copyright_entry->getText());
    }
}
