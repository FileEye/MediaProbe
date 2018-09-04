<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use PHPUnit\Framework\TestCase;

class ExifEyeTestCaseBase extends TestCase
{
    public function fcExpectException($exception, $message = null)
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException($exception);
            if ($message !== null) {
                $this->expectExceptionMessage($message);
            }
        } else {
            $this->setExpectedException($exception, $message);
        }
    }
}
