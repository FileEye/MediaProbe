<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelJpeg;

class BrokenImagesTest extends ExifEyeTestCaseBase
{
    public function testWindowWindowExceptionIsCaught()
    {
        $jpeg = new PelJpeg(dirname(__FILE__) . '/broken_images/gh-10-a.jpg');
        $this->assertInstanceOf('\lsolesen\pel\PelJpeg', $jpeg);
    }

    public function testWindowOffsetExceptionIsCaught()
    {
        $jpeg = new PelJpeg(dirname(__FILE__) . '/broken_images/gh-10-b.jpg');
        $this->assertInstanceOf('\lsolesen\pel\PelJpeg', $jpeg);
    }

    public function testParsingNotFailingOnRecursingIfd()
    {
        $jpeg = new PelJpeg(dirname(__FILE__) . '/broken_images/gh-11.jpg');
        $this->assertInstanceOf('\lsolesen\pel\PelJpeg', $jpeg);
    }
}
