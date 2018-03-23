<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use lsolesen\pel\PelJpeg;
use PHPUnit\Framework\TestCase;

class NoExifTest extends TestCase
{
    public function testRead()
    {
        ExifEye::clearExceptions();
        ExifEye::setStrictParsing(false);
        $jpeg = new PelJpeg(dirname(__FILE__) . '/images/no-exif.jpg');

        $exif = $jpeg->getExif();
        $this->assertNull($exif);

        $this->assertTrue(count(ExifEye::getExceptions()) == 0);
    }
}
