<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Block\Jpeg;
use ExifEye\Test\core\ExifEyeTestCaseBase;
use ExifEye\core\Image;
use ExifEye\core\Spec;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Test camera images stored in the imagetest directory.
 */
class ImageFilesTest extends ExifEyeTestCaseBase
{
    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        parent::tearDown();
        gc_collect_cycles();
    }

    public function imageFileProvider()
    {
        $finder = new Finder();
        $finder->files()->in(dirname(__FILE__) . '/image_files')->name('*.dump.yml');
        $result = [];
        foreach ($finder as $file) {
            $result[$file->getBasename()] = [$file];
        }
        return $result;
    }

    /**
     * @dataProvider imageFileProvider
     */
    public function testParse($imageDumpFile)
    {
        $test_file_content = $imageDumpFile->getContents();
        $test = Yaml::parse($test_file_content);
        $image = Image::createFromFile($imageDumpFile->getPath() . '/' . $test['fileName']);

        $this->assertEquals($test['mimeType'], $image->getMimeType());

        if (isset($test['elements'])) {
            $this->assertElement($test['elements'], $image);
        }

        foreach (['ERROR', 'WARNING', 'NOTICE'] as $level) {
            if (isset($test['log'][$level])) {
                $this->assertEquals(count($test['log'][$level]), count($image->dumpLog($level)));
            }
        }
    }

    /**
     * @dataProvider imageFileProvider
     */
    public function testRewriteThroughGd($imageDumpFile)
    {
        $test = Yaml::parse($imageDumpFile->getContents());
        $original_image = Image::createFromFile($imageDumpFile->getPath() . '/' . $test['fileName']);
        $original_image->saveToFile($imageDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite-gd.img');

        // Test via getimagesize.
        $gd_info = getimagesize($imageDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite-gd.img');
        $this->assertEquals($test['gdInfo'], $gd_info);

        if ($test['mimeType'] === 'image/tiff') {
            $this->markTestIncomplete($test['fileName'] . ' of MIME type ' . $test['mimeType'] . ' can not be tested via GD.');
        }

        // Test loading the image to GD; it fails hard in case of errors.
        $gd_resource = imagecreatefromstring($original_image->toBytes());
        $this->assertNotFalse($gd_resource);
        $this->assertEquals($test['gdInfo'][0], imagesx($gd_resource));
        $this->assertEquals($test['gdInfo'][1], imagesy($gd_resource));
        imagedestroy($gd_resource);

        $gd_resource = imagecreatefromjpeg($imageDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite-gd.img');
        $this->assertNotFalse($gd_resource);
        $this->assertEquals($test['gdInfo'][0], imagesx($gd_resource));
        $this->assertEquals($test['gdInfo'][1], imagesy($gd_resource));
        imagedestroy($gd_resource);
    }

    /**
     * @dataProvider imageFileProvider
     */
    public function testRewrite($imageDumpFile)
    {
        $test_file_content = $imageDumpFile->getContents();
        $test = Yaml::parse($test_file_content);
        $original_image = Image::createFromFile($imageDumpFile->getPath() . '/' . $test['fileName']);
        $original_image->saveToFile($imageDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite.img');
        $image = Image::createFromFile($imageDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite.img');

        $this->assertEquals($test['mimeType'], $image->getMimeType());

        if (isset($test['elements'])) {
            $this->assertElement($test['elements'], $image, true);
        }
    }

    protected function assertElement($expected, $element, $rewritten = false)
    {
        $this->assertInstanceOf($expected['class'], $element, $expected['path']);

        // Check entry.
        if ($element instanceof EntryInterface) {
            // No sub elements in the element being tested.
            $this->assertNull($element->getElement('*'));
            $this->assertEquals($expected['path'], $element->getContextPath());
            $this->assertEquals($expected['format'], Spec::getFormatName($element->getFormat()), $element->getContextPath());
            $this->assertEquals($expected['components'], $element->getComponents(), $element->getContextPath());
            $this->assertEquals($expected['text'], $element->toString(), $element->getContextPath());
            $this->assertEquals($expected['bytesHash'], hash('sha256', $element->toBytes()), $element->getContextPath());
        }

        // Recursively check sub-blocks.
        if (isset($expected['elements'])) {
            foreach ($expected['elements'] as $i => $expected_element) {
                $test = $element->getMultipleElements('*');
                $this->assertArrayHasKey($i, $test, $expected_element['path']);
                $this->assertElement($expected_element, $test[$i], $rewritten);
            }
        }
    }
}
