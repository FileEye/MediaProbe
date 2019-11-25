<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\ElementBase;

class EntryTestBase extends ImageProbeTestCaseBase
{
    protected $mockParentElement;

    public function fcSetUp()
    {
        $this->mockParentElement = $this->getMockBuilder('FileEye\ImageProbe\core\ElementBase')->disableOriginalConstructor()->getMock();
    }
}
