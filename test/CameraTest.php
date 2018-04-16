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

        if (isset($expected['tags'])) {
            $tags = $ifd->xxGetSubBlocks();
            $this->assertCount(count($expected['tags']), $tags, "IFD: '{$ifd->getName()}' - TAGs count");
            for ($i = 0; $i < count($tags); $i++) {
                $this->assertEquals($expected['tags'][$i]['id'], $tags[$i]->getId(), "Ifd: '{$ifd->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected['tags'][$i]['name'], $tags[$i]->getName(), "Ifd: '{$ifd->getName()}' Tag: '{$tags[$i]->getId()}'");
                $entry = $tags[$i]->getEntry();
                $this->assertInstanceOf($expected['tags'][$i]['entry']['class'], $entry, "Ifd: '{$ifd->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected['tags'][$i]['entry']['components'], $entry->getComponents(), "Ifd: '{$ifd->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected['tags'][$i]['entry']['format'], Format::getName($entry->getFormat()), "Ifd: '{$ifd->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals(unserialize(base64_decode($expected['tags'][$i]['entry']['value'])), $tags[$i]->getEntry()->getValue(), "Ifd: '{$ifd->getName()}' Tag: '{$tags[$i]->getId()}'");
                $this->assertEquals($expected['tags'][$i]['entry']['text'], $tags[$i]->getEntry()->getText(), "Ifd: '{$ifd->getName()}' Tag: '{$tags[$i]->getId()}'");
            }
        }

        if (isset($expected['blocks'])) {
            $this->assertCount(count($expected['blocks']), $ifd->getSubIfds(), "Block: '{$ifd->getName()}' - sub-blocks count");
            foreach ($expected['blocks'] as $test_block => $test_block_data) {
                $block = $ifd->getSubIfd(Spec::getIfdIdByType($test_block));
                $this->assertIfd($test_block_data, $block);
            }
        }
    }
}
