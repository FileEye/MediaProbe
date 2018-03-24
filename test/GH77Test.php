<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelJpeg;
use lsolesen\pel\PelTiff;
use ExifEye\core\ExifEye;

class GH77Test extends ExifEyeTestCaseBase
{
    public function testReturnModel()
    {
        $file = dirname(__FILE__) . '/images/gh-77.jpg';

        $input_jpeg = new PelJpeg($file);
        $app1 = $input_jpeg->getExif();

        $tiff = $app1->getTiff();
        $ifd0 = $tiff->getIfd();

        $model = $ifd0->getEntry(0x0110);

        $this->assertEquals($model->getValue(), "Canon EOS 5D Mark III");

        $copyright = $ifd0->getEntry(0x8298);
        $this->assertInstanceOf('ExifEye\core\Entry\Copyright', $copyright);
        $this->assertEquals(['Copyright 2016', ''], $copyright->getValue());
        $this->assertEquals('Copyright 2016 (Photographer)', $copyright->getText());
    }
}
