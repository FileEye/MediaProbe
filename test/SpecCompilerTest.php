<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Ifd;
use ExifEye\core\Block\IfdFormat;
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
    public function fcSetUp()
    {
        $this->testResourceDirectory = __DIR__ . '/TestClasses';
        $this->fs = new Filesystem();
        $this->fs->mkdir($this->testResourceDirectory);
    }

    /**
     * {@inheritdoc}
     */
    public function fcTearDown()
    {
        $this->fs->remove($this->testResourceDirectory);
        Collection::setMapperClass(null);
    }

    /**
     * Tests that compiling an invalid YAML file raises exception.
     */
    public function testInvalidYaml()
    {
        //@todo change below to ParseException::class once PHP 5.4 support is removed.
        $this->fcExpectException('Symfony\Component\Yaml\Exception\ParseException');
        $compiler = new SpecCompiler();
        $compiler->compile(__DIR__ . '/fixtures/spec/invalid_yaml', $this->testResourceDirectory, 'ExifEye\Test\core\TestClasses');
    }

    /**
     * Tests compiling a valid specifications stub set.
     */
    public function testValidStubSpec()
    {
        $compiler = new SpecCompiler();
        $compiler->compile(__DIR__ . '/fixtures/spec/valid_stub', $this->testResourceDirectory, 'ExifEye\Test\core\TestClasses');
        //@todo change below to xxxx::class once PHP 5.4 support is removed.
        Collection::setMapperClass('ExifEye\Test\core\TestClasses\Core');
        $this->assertCount(4, Collection::listIds());

        //@todo change below to xxxx::class once PHP 5.4 support is removed.
        $tiff_mock = $this->getMockBuilder('ExifEye\core\Block\Tiff')
            ->disableOriginalConstructor()
            ->getMock();

        $ifd_0 = new Ifd(Collection::get('ifd0'), new IfdItem(Collection::get('tiff'), 0, IfdFormat::getFromName('Long')), $tiff_mock);
        $ifd_exif = new Ifd(Collection::get('ifdExif'), new IfdItem(Collection::get('ifd0'), 0x8769, IfdFormat::getFromName('Long')), $ifd_0);

        $this->assertEquals(0x0100, $ifd_0->getCollection()->getItemCollectionByName('ImageWidth')->getPropertyValue('item'));
        $this->assertEquals(0x8769, $ifd_0->getCollection()->getItemCollectionByName('Exif')->getPropertyValue('item'));
        $this->assertEquals(0x829A, $ifd_exif->getCollection()->getItemCollectionByName('ExposureTime')->getPropertyValue('item'));

        // Compression is missing from the stub specs.
        $this->assertNull($ifd_0->getCollection()->getItemCollectionByName('Compression'));
    }
}
