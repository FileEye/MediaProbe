<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\IfdItem;
use ExifEye\core\Utility\SpecCompiler;
use ExifEye\core\Collection;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Test compilation of a set of ExifEye specification YAML files.
 */
class SpecCompilerTest extends ExifEyeTestCaseBase
{
    /** @var Filesystem */
    private $fs;

    /** @var string */
    private $testResourceDirectory;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->testResourceDirectory = __DIR__ . '/../test_resources';
        $this->fs = new Filesystem();
        $this->fs->mkdir($this->testResourceDirectory);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $this->fs->remove($this->testResourceDirectory);
        Collection::setMap(null);
        parent::tearDown();
    }

    /**
     * Tests that compiling an invalid YAML file raises exception.
     */
    public function testInvalidYaml()
    {
        //@todo change below to ParseException::class once PHP 5.4 support is removed.
        $this->fcExpectException('Symfony\Component\Yaml\Exception\ParseException');
        $compiler = new SpecCompiler();
        $compiler->compile(__DIR__ . '/fixtures/spec/invalid_yaml', $this->testResourceDirectory);
    }

    /**
     * Tests compiling a valid specifications stub set.
     */
    public function testValidStubSpec()
    {
        $compiler = new SpecCompiler();
        $compiler->compile(__DIR__ . '/fixtures/spec/valid_stub', $this->testResourceDirectory);
        Collection::setMap($this->testResourceDirectory . '/spec.php');
        $this->assertCount(4, Collection::getCollections());

        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd_0 = new Ifd($tiff_mock, new IfdItem('tiff', 0, Collection::getFormatIdFromName('Long')));
        $ifd_exif = new Ifd($ifd_0, new IfdItem('ifd0', 0x8769, Collection::getFormatIdFromName('Long')));

        $this->assertEquals(0x0100, Collection::getItemIdByName($ifd_0->getType(), 'ImageWidth'));
        $this->assertEquals(0x8769, Collection::getItemIdByName($ifd_0->getType(), 'Exif'));
        $this->assertEquals(0x829A, Collection::getItemIdByName($ifd_exif->getType(), 'ExposureTime'));

        // Compression is missing from the stub specs.
        $this->assertNull(Collection::getItemIdByName($ifd_0->getType(), 'Compression'));
    }
}
