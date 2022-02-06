<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\ElementBase;

class EntryTestBase extends MediaProbeTestCaseBase
{
    protected $mockParentElement;
    protected $mockDataElement;

    public function fcSetUp()
    {
        $this->mockParentElement = $this->getMockBuilder(ElementBase::class)
          ->disableOriginalConstructor()
          ->getMock();
        $this->mockDataElement = $this->getMockBuilder(DataElement::class)
          ->disableOriginalConstructor()
          ->getMock();
    }
}
