<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use PHPUnit\Framework\TestCase;

class ExifEyeTestCaseBase extends ExifEyeTestCaseBase
{
    public function setUp()
    {
        parent::setUp();
        ExifEye::setStrictParsing(false);
        ExifEye::clearExceptions();
    }
}
