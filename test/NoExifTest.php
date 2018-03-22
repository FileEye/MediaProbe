<?php

namespace ExifEye\Test\core;

use lsolesen\pel\Pel;
use lsolesen\pel\PelJpeg;
use PHPUnit\Framework\TestCase;

class NoExifTest extends TestCase
{
    public function testRead()
    {
        Pel::clearExceptions();
        Pel::setStrictParsing(false);
        $jpeg = new PelJpeg(dirname(__FILE__) . '/images/no-exif.jpg');

        $exif = $jpeg->getExif();
        $this->assertNull($exif);

        $this->assertTrue(count(Pel::getExceptions()) == 0);
    }
}
