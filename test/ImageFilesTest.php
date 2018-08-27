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

        $image = Image::loadFromFile($imageDumpFile->getPath() . '/' . $test['fileName']);

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

        // Check entry.
        if ($element instanceof EntryInterface) {
            $this->assertEquals($expected['format'], Format::getName($element->getFormat()), $element->getContextPath());
            $this->assertEquals($expected['components'], $element->getComponents(), $element->getContextPath());
            if (isset($expected['bytesHash'])) {
                $this->assertEquals($expected['bytesHash'], hash('sha256', $element->toBytes()), $element->getContextPath());
            }
            $this->assertEquals($expected['text'], $element->toString(), $element->getContextPath());
        }

        // Recursively check sub-blocks.
        // xx @todo add checking count of blocks by type
        if (isset($expected['elements'])) {
            foreach ($expected['elements'] as $type => $expected_type_elements) {
                foreach ($expected_type_elements as $i => $expected_element) {
                    $this->assertElement($expected_element, $element->getMultipleElements($type)[$i]);
                }
            }
        }
    }
}
