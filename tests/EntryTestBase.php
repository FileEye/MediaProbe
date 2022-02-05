<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\ElementBase;

class EntryTestBase extends MediaProbeTestCaseBase
{
    protected $mockParentElement;

    public function fcSetUp()
    {
        $this->mockParentElement = $this->getMockBuilder('FileEye\MediaProbe\ElementBase')->disableOriginalConstructor()->getMock();
    }
}
