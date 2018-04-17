<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use PHPUnit\Framework\TestCase;

class ExifEyeTestCaseBase extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        ExifEye::setStrictParsing(false);
        ExifEye::clearLogger();
    }
}
