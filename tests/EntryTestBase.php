<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Model\ElementBase;

class EntryTestBase extends MediaProbeTestCaseBase
{
    protected $mockParentElement;
    protected $mockDataElement;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockParentElement = $this->getMockBuilder(ElementBase::class)
          ->disableOriginalConstructor()
          ->getMock();
        $this->mockDataElement = $this->getMockBuilder(DataElement::class)
          ->disableOriginalConstructor()
          ->getMock();
    }
}
