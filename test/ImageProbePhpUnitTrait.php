<?php
namespace FileEye\ImageProbe\Test\core;

// PHPUnit compatibility trait for PHPUnit versions before 8.
trait PhpUnitTrait
{
    public function setUp()
    {
        parent::setUp();
        if (method_exists($this, 'fcSetUp')) {
            $this->fcSetUp();
        }
    }

    public function tearDown()
    {
        if (method_exists($this, 'fcTearDown')) {
            $this->fcTearDown();
        }
        parent::tearDown();
    }
}
