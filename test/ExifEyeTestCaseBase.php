<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version;

// In order to manage different method signatures between PHPUnit versions, we
// dynamically load a compatibility trait dependent on the PHPUnit runner
// version.
// phpcs:disable
if (class_exists('PHPUnit\Runner\Version') && version_compare(Version::id(), '8.0.0') >= 0) {
    require_once __DIR__ . '/ExifEyePhpUnit8Trait.php';
} else {
    require_once __DIR__ . '/ExifEyePhpUnitTrait.php';
}
// phpcs:enable

class ExifEyeTestCaseBase extends TestCase
{
    use PhpUnitTrait;

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
