<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\ElementBase;

class EntryTestBase extends ImageInfoTestCaseBase
{
    protected $mockParentElement;

    public function fcSetUp()
    {
        $this->mockParentElement = $this->getMockBuilder('FileEye\ImageInfo\core\ElementBase')->disableOriginalConstructor()->getMock();
    }
}
