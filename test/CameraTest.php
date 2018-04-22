<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Block\Jpeg;
use ExifEye\Test\core\ExifEyeTestCaseBase;
use ExifEye\core\Spec;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Test camera images stored in the imagetest directory.
 */
class CameraTest extends ExifEyeTestCaseBase
{
    public function imageFileProvider()
    {
        $finder = new Finder();
        $finder->files()->in(dirname(__FILE__) . '/imagetests')->name('*.test.yml');
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
        $test = Yaml::parse($imageDumpFile->getContents());

        $jpeg = new Jpeg(dirname(__FILE__) . '/imagetests/' . $test['jpeg']);

        $exif = $jpeg->getExif();
        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();

        if (isset($test['blocks']['IFD0'])) {
            $this->assertBlock($test['blocks']['IFD0'], $ifd0);
        }

        if (isset($test['blocks']['IFD1'])) {
            $this->assertBlock($test['blocks']['IFD1'], $ifd0->getNextIfd());
        }

        $handler = ExifEye::logger()->getHandlers()[0]; // xx
        $errors = 0;
        $warnings = 0;
        foreach ($handler->getRecords() as $record) {
            switch ($record['level_name']) {
                case 'WARNING':
                    ++$warnings;
                    break;
                case 'ERROR':
                    ++$errors;
                    break;
                default:
                    continue;
            }
        }

        if (isset($test['errors'])) {
            $this->assertEquals(count($test['errors']), $errors);
        }
        if (isset($test['warnings'])) {
            $this->assertEquals(count($test['warnings']), $warnings);
        }
    }

    protected function assertBlock($expected, $block)
    {
        $this->assertInstanceOf($expected['class'], $block);

        // Check entry.
        if (isset($expected['Entry'])) {
            $entry = $block->getEntry();
            $this->assertInstanceOf($expected['Entry']['class'], $entry, $block->getElementPath());
            $this->assertEquals($expected['Entry']['components'], $entry->getComponents(), $block->getElementPath());
            $this->assertEquals($expected['Entry']['format'], Format::getName($entry->getFormat()), $block->getElementPath());
            $this->assertEquals(unserialize(base64_decode($expected['Entry']['value'])), $entry->getValue(), $block->getElementPath());
            $this->assertEquals($expected['Entry']['text'], $entry->toString(), $block->getElementPath());
        }

        // Recursively check sub-blocks.
        // xx @todo add checking count of blocks by type
        if (isset($expected['blocks'])) {
            foreach ($expected['blocks'] as $block_type => $expected_blocks) {
                foreach ($expected_blocks as $i => $expected_block) {
                    $this->assertBlock($expected_block, $block->xxGetSubBlockByIndex($block_type, $i));
                }
            }
        }
    }
}
