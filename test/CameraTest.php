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

        // @todo readd testing of thumbnail correctness

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
        if (isset($expected['blocks'])) {
            foreach ($expected['blocks'] as $block_type => $expected_blocks) {
                foreach ($expected_blocks as $i => $expected_block) {
dump([$block->getElementPath(), $expected_block, (bool) $block->xxGetSubBlockByIndex($block_type, $i)]);
                    $this->assertBlock($expected_block, $block->xxGetSubBlockByIndex($block_type, $i));
                }
            }
        }
/*        if (empty($expected)) {
            return;
        }

        $this->assertInstanceOf($expected['class'], $block);

        if (isset($expected['blocks']['Tag'])) {
            $expected_tags = $expected['blocks']['Tag'];
            $tags = $block->xxGetSubBlocks('Tag');
            $this->assertCount(count($expected_tags), $tags, "IFD: '{$block->getName()}' - TAGs count");
            for ($i = 0; $i < count($tags); $i++) {
                $this->assertEquals($expected_tags[$i]['id'], $tags[$i]->getId(), "Ifd: '{$block->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected_tags[$i]['name'], $tags[$i]->getName(), "Ifd: '{$block->getName()}' Tag: '{$tags[$i]->getId()}'");
                $entry = $tags[$i]->getEntry();
                $this->assertInstanceOf($expected_tags[$i]['Entry']['class'], $entry, "Ifd: '{$block->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected_tags[$i]['Entry']['components'], $entry->getComponents(), "Ifd: '{$block->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected_tags[$i]['Entry']['format'], Format::getName($entry->getFormat()), "Ifd: '{$block->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals(unserialize(base64_decode($expected_tags[$i]['Entry']['value'])), $tags[$i]->getEntry()->getValue(), "Ifd: '{$block->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected_tags[$i]['Entry']['text'], $tags[$i]->getEntry()->toString(), "Ifd: '{$block->getName()}' Tag: '{$tags[$i]->getId()}'");
            }
        }

/*        if (isset($expected['blocks']['Ifd'])) {
            $expected_ifds = $expected['blocks']['Ifd'];
            $this->assertCount(count($expected_ifds), $block->xxGetSubBlocks('Ifd'), "Block: '{$block->getName()}' - sub-blocks count");
            foreach ($expected_ifds as $test_block_data) {
                $block = $block->xxGetSubBlock('Ifd', $test_block_data['id']);
foreach($block->xxGetSubBlocks('Ifd') as $x){
  $xxx[] = $x->getId();
  $xxy[] = $x->getName();
  $xxz[] = $x->getElementPath();
}
//dump([$block->getElementPath(), $test_block_data['id'], implode('-', $xxx), (bool) $block]);
dump([$block->getName(), $block->getElementPath(), $test_block_data['id'], implode('-', $xxx), implode('-', $xxy), implode('-', $xxz), (bool) $block]);
//                $this->assertBlock($test_block_data, $block);
            }
        }*/
    }
}
