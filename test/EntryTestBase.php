<?php

namespace ExifEye\Test\core;

use ExifEye\core\ElementBase;

class EntryTestBase extends ExifEyeTestCaseBase
{
    protected $mockParentElement;

    public function setUp()
    {
        parent::setUp();
        $this->mockParentElement = $this->getMockBuilder('ExifEye\core\ElementBase')->disableOriginalConstructor()->getMock();
    }
}
