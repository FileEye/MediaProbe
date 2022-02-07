<?php
namespace FileEye\MediaProbe\Test;

use Symfony\Component\Filesystem\Filesystem;

// PHPUnit compatibility trait for PHPUnit 8.
trait PhpUnitTrait
{
    public function setUp(): void
    {
        parent::setUp();
        $this->tempWorkDirectory = dirname(__FILE__) . '/workdir-test';
        $this->fileSystem = new Filesystem();
        $this->fileSystem->mkdir($this->tempWorkDirectory);
        if (method_exists($this, 'fcSetUp')) {
            $this->fcSetUp();
        }
    }

    public function tearDown(): void
    {
        if (method_exists($this, 'fcTearDown')) {
            $this->fcTearDown();
        }
        parent::tearDown();
    }
}
