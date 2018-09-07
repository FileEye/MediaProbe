<?php

namespace ExifEye\Test\core;

use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
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
//$this->assertEquals($test['fileContentHash'], hash('sha256', $test_file_content));

        if (isset($test['elements'])) {
            $this->assertElement($test['elements'], $image);
        }

        foreach (['ERROR', 'WARNING', 'NOTICE'] as $level) {
            if (isset($test['log'][$level])) {
                $this->assertEquals(count($test['log'][$level]), count($image->dumpLog($level)));
            }
        }

        // Test loading the image to GD; it fails hard in case of errors.
/*        $gd_resource = imagecreatefromstring($image->toBytes());
        imagedestroy($gd_resource);*/
    }

    protected function assertElement($expected, $element)
    {
        $this->assertInstanceOf($expected['class'], $element, $expected['path']);

        // xx
//        $this->assertNotNull($element->toBytes(), $element->getContextPath());

        // Check entry.
        if ($element instanceof EntryInterface) {
            // No sub elements in the element being tested.
            $this->assertNull($element->getElement('*'));
            $this->assertEquals($expected['path'], $element->getContextPath());
            $this->assertEquals($expected['format'], Format::getName($element->getFormat()), $element->getContextPath());
            $this->assertEquals($expected['components'], $element->getComponents(), $element->getContextPath());
            $this->assertEquals($expected['text'], $element->toString(), $element->getContextPath());
            $this->assertEquals($expected['bytesHash'], hash('sha256', $element->toBytes()), $element->getContextPath());
        }

        // Recursively check sub-blocks.
        if (isset($expected['elements'])) {
            foreach ($expected['elements'] as $i => $expected_element) {
                $test = $element->getMultipleElements('*');
                $this->assertArrayHasKey($i, $test, $expected_element['path']);
                $this->assertElement($expected_element, $test[$i]);
            }
        }
    }
}
