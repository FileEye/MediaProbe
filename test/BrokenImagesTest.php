<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Jpeg;

class BrokenImagesTest extends ExifEyeTestCaseBase
{
    public function testWindowWindowExceptionIsCaught()
    {
        $jpeg = new Jpeg(dirname(__FILE__) . '/broken_images/gh-10-a.jpg');
        $this->assertInstanceOf('ExifEye\core\Block\Jpeg', $jpeg);
    }

    public function testWindowOffsetExceptionIsCaught()
    {
        $jpeg = new Jpeg(dirname(__FILE__) . '/broken_images/gh-10-b.jpg');
        $this->assertInstanceOf('ExifEye\core\Block\Jpeg', $jpeg);
    }

    public function testParsingNotFailingOnRecursingIfd()
    {
        $jpeg = new Jpeg(dirname(__FILE__) . '/broken_images/gh-11.jpg');
        $this->assertInstanceOf('ExifEye\core\Block\Jpeg', $jpeg);
    }
}
