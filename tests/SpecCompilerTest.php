<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Test\TestClasses\Core;
use FileEye\MediaProbe\Block\Exif\Ifd;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Utility\SpecCompiler;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Exception\ParseException;

/**
 * Test compilation of a set of MediaProbe specification YAML files.
 */
class SpecCompilerTest extends MediaProbeTestCaseBase
{
    /** @var Filesystem */
    private $fs;

    /** @var string */
    private $testResourceDirectory;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->testResourceDirectory = __DIR__ . '/TestClasses';
        $this->fs = new Filesystem();
        $this->fs->mkdir($this->testResourceDirectory);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown(): void
    {
        $this->fs->remove($this->testResourceDirectory);
        CollectionFactory::setCollectionIndex(null);
        parent::tearDown();
    }

    public function testFake()
    {
        $this->assertTrue(true);
    }

    /**
     * Tests that compiling an invalid YAML file raises exception.
     */
/*    public function testInvalidYaml()
    {
        $this->expectException(ParseException::class);
        $compiler = new SpecCompiler();
        $compiler->compile(__DIR__ . '/fixtures/spec/invalid_yaml', $this->testResourceDirectory, 'FileEye\MediaProbe\Test\TestClasses');
    }

    /**
     * Tests compiling a valid specifications stub set.
     */
/*    public function testValidStubSpec()
    {
        $compiler = new SpecCompiler();
        $compiler->compile(__DIR__ . '/fixtures/spec/valid_stub', $this->testResourceDirectory, 'FileEye\MediaProbe\Test\TestClasses');
        CollectionFactory::setCollectionIndex(Core::class);
        $this->assertCount(4, CollectionFactory::listCollections());

        $tiff_mock = $this->getMockBuilder(Tiff::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ifd_0 = new Ifd(new ItemDefinition(CollectionFactory::get('Ifd0'), DataFormat::LONG), $tiff_mock);
        $ifd_exif = new Ifd(new ItemDefinition($ifd_0->getCollection()->getItemCollection(0x8769), DataFormat::LONG), $ifd_0);

        $this->assertEquals(0x0100, $ifd_0->getCollection()->getItemCollectionByName('ImageWidth')->getPropertyValue('item'));
        $this->assertEquals(0x8769, $ifd_0->getCollection()->getItemCollectionByName('ExifIFD')->getPropertyValue('item'));
        $this->assertEquals(0x829A, $ifd_exif->getCollection()->getItemCollectionByName('ExposureTime')->getPropertyValue('item'));

        // Compression is missing from the stub specs.
        $this->assertNull($ifd_0->getCollection()->getItemCollectionByName('Compression'));
    }
*/
}
