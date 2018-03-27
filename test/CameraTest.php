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
    protected function assertIfd($expected, $ifd)
    {
        $this->assertInstanceOf($expected['class'], $ifd);

        if (isset($expected['entries'])) {
            $this->assertCount(count($expected['entries']), $ifd->getEntries());
            foreach ($expected['entries'] as $test_entry => $test_entry_data) {
                $entry = $ifd->getEntry(Spec::getTagIdByName($ifd->getType(), $test_entry));
                $this->assertInstanceOf($test_entry_data['class'], $entry, "IFD: {$ifd->getName} TAG: $test_entry");
                $this->assertEquals(unserialize($test_entry_data['value']), $entry->getValue(), "IFD: {$ifd->getName} TAG: $test_entry");
                $this->assertEquals($test_entry_data['text'], $entry->getText().'xx', "IFD: {$ifd->getName} TAG: $test_entry");
            }
        }

        if (isset($expected['blocks'])) {
            $this->assertCount(count($expected['blocks']), $ifd->getSubIfds());
        }
    }

    public function imageFileProvider()
    {
        $finder = new Finder();
        $finder->files()->in(dirname(__FILE__) . '/imagetests')->name('*.test.yml');
        $result = [];
        foreach ($finder as $file) {
            $result[] = [$file];
        }
        return $result;
    }

    /**
     * @dataProvider imageFileProvider
     */
    public function testParse($imageDumpFile)
    {
        $test = Yaml::parseFile($imageDumpFile);

        // $test = Yaml::parseFile(dirname(__FILE__) . '/imagetests/canon-eos-650d.jpg.test.yml');

        $jpeg = new Jpeg(dirname(__FILE__) . '/imagetests/' . $test['jpeg']);

        $exif = $jpeg->getExif();
        $tiff = $exif->getTiff();
        $ifd0 = $tiff->getIfd();

        if (isset($test['blocks']['IFD0'])) {
            $this->assertIfd($test['blocks']['IFD0'], $ifd0);
        }
    }
}
