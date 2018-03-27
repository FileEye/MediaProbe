<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
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
            $result[] = [$file->getFileName()];
        }
        return $result;
    }

    /**
     * @dataProvider imageFileProvider
     */
    public function testParse($imageDumpFile)
    {
        $test = Yaml::parseFile(dirname(__FILE__) . '/imagetests/' . $imageDumpFile);

        $jpeg = new Jpeg(dirname(__FILE__) . '/imagetests/' . $test['jpeg']);

        $exif = $jpeg->getExif();
        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();

        if (isset($test['blocks']['IFD0'])) {
            $this->assertIfd($test['blocks']['IFD0'], $ifd0);
        }

        if (isset($test['blocks']['IFD1'])) {
            $this->assertIfd($test['blocks']['IFD1'], $ifd0->getNextIfd());
        }

        // @todo readd testing of thumbnail correctness

        if (isset($test['errors']['entries'])) {
            $this->assertCount(count($test['errors']['entries']), ExifEye::getExceptions());
        }
    }

    protected function assertIfd($expected, $ifd)
    {
        $this->assertInstanceOf($expected['class'], $ifd);

        if (isset($expected['entries'])) {
            $this->assertCount(count($expected['entries']), $ifd->getEntries());
            foreach ($expected['entries'] as $test_entry => $test_entry_data) {
                $entry = $ifd->getEntry(Spec::getTagIdByName($ifd->getType(), $test_entry));
                $this->assertInstanceOf($test_entry_data['class'], $entry, "Block: '{$ifd->getName()}' Entry: '$test_entry'");
                $this->assertEquals(unserialize($test_entry_data['value']), $entry->getValue(), "Block: '{$ifd->getName()}' Entry: '$test_entry'");
                $this->assertEquals($test_entry_data['text'], $entry->getText(), "Block: '{$ifd->getName()}' Entry: '$test_entry'");
            }
        }

        if (isset($expected['blocks'])) {
            $this->assertCount(count($expected['blocks']), $ifd->getSubIfds());
            foreach ($expected['blocks'] as $test_block => $test_block_data) {
                $block = $ifd->getSubIfd(Spec::getIfdIdByType($test_block));
                $this->assertIfd($test_block_data, $block);
            }
        }
    }
}
