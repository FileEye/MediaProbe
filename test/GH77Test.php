<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelDataWindow;
use lsolesen\pel\PelJpeg;
use lsolesen\pel\PelTiff;
use ExifEye\core\ExifEye;
use lsolesen\pel\PelTag;
use PHPUnit\Framework\TestCase;

class GH77Test extends TestCase
{
    public function testReturnModul()
    {

        $file = dirname(__FILE__) . '/images/gh-77.jpg';

        $input_jpeg = new PelJpeg($file);
        $app1 = $input_jpeg->getExif();

        $tiff = $app1->getTiff();
        $ifd0 = $tiff->getIfd();

        $model = $ifd0->getEntry(PelTag::MODEL);

        $this->assertEquals($model->getValue(), "Canon EOS 5D Mark III");

        $copyright = $ifd0->getEntry(PelTag::COPYRIGHT);
        $this->assertInstanceOf('lsolesen\pel\PelEntryCopyright', $copyright);
        $this->assertEquals(['Copyright 2016', ''], $copyright->getValue());
        $this->assertEquals('Copyright 2016 (Photographer)', $copyright->getText());
    }
}
