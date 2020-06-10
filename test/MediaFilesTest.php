<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Media;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

/**
 * Test sample media files parsing and rewriting.
 */
class MediaFilesTest extends MediaProbeTestCaseBase
{
    /**
     * {@inheritdoc}
     */
    public function fcTearDown()
    {
        gc_collect_cycles();
    }

    public function mediaFileProvider()
    {
        $finder = new Finder();
        $finder->files()->in(dirname(__FILE__) . '/image_files')->name('*.test-dump.yml');
        $result = [];
        foreach ($finder as $file) {
            $result[$file->getBasename()] = [$file];
        }
        return $result;
    }

    /**
     * @dataProvider mediaFileProvider
     */
    public function testParse($mediaDumpFile)
    {
        $test_file_content = $mediaDumpFile->getContents();
        $test = Yaml::parse($test_file_content);
        $media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $test['fileName']);

        $this->assertEquals($test['mimeType'], $media->getMimeType());
//        $this->assertEquals($test['exifReadData'], @exif_read_data($mediaDumpFile->getPath() . '/' . $test['fileName']));

        if (isset($test['elements'])) {
            $this->assertElement($test['elements'], $media, $test);
        }

        foreach (['ERROR', 'WARNING', 'NOTICE'] as $level) {
            if (isset($test['log'][$level])) {
                $this->assertEquals(count($test['log'][$level]), count($media->dumpLog($level)));
            }
        }
    }

    /**
     * @dataProvider mediaFileProvider
     */
    public function testRewriteThroughGd($mediaDumpFile)
    {
        $test = Yaml::parse($mediaDumpFile->getContents());
        $original_media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $test['fileName']);
        $original_media->saveToFile($mediaDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite-gd.img');

        // Test via getimagesize.
        $gd_info = getimagesize($mediaDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite-gd.img');
        $this->assertEquals($test['gdInfo'], $gd_info);

        if ($test['mimeType'] === 'image/tiff') {
            $this->markTestIncomplete($test['fileName'] . ' of MIME type ' . $test['mimeType'] . ' can not be tested via GD.');
        }

        // Test loading the image to GD; it fails hard in case of errors.
        $gd_resource = imagecreatefromstring($original_media->toBytes());
        $this->assertNotFalse($gd_resource);
        $this->assertEquals($test['gdInfo'][0], imagesx($gd_resource));
        $this->assertEquals($test['gdInfo'][1], imagesy($gd_resource));
        imagedestroy($gd_resource);

        $gd_resource = imagecreatefromjpeg($mediaDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite-gd.img');
        $this->assertNotFalse($gd_resource);
        $this->assertEquals($test['gdInfo'][0], imagesx($gd_resource));
        $this->assertEquals($test['gdInfo'][1], imagesy($gd_resource));
        imagedestroy($gd_resource);
    }

    /**
     * @dataProvider mediaFileProvider
     */
    public function testRewrite($mediaDumpFile)
    {
        $test_file_content = $mediaDumpFile->getContents();
        $test = Yaml::parse($test_file_content);
        $original_media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $test['fileName']);
        $original_media->saveToFile($mediaDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite.img');
        $media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite.img');

        $this->assertEquals($test['mimeType'], $media->getMimeType());
//        $this->assertEquals($test['exifReadData'], @exif_read_data($mediaDumpFile->getPath() . '/' . $test['fileName'] . '-rewrite.img'));

        if (isset($test['elements'])) {
            $this->assertElement($test['elements'], $media, $test, true);
        }
    }

    protected function assertElement($expected, $element, $test, $rewritten = false)
    {
        $this->assertInstanceOf($expected['class'], $element, $expected['path']);
        $this->assertSame($expected['path'], $element->getContextPath());
        if (!$rewritten) {
            $this->assertSame($expected['valid'], $element->isValid(), $element->getContextPath());
        }

        // Check entry.
        if ($element instanceof EntryInterface) {
            // No sub elements in the element being tested.
            $this->assertNull($element->getElement('*'));
            $this->assertSame($expected['format'], ItemFormat::getName($element->getFormat()), $element->getContextPath());
            $this->assertSame($expected['components'], $element->getComponents(), $element->getContextPath());
            
            // Check PHP Exif tag equivalence.
            if ($php_exif_tag = $element->getParentElement()->getCollection()->getPropertyValue('phpExifTag')) {
                $tag = explode('::', $php_exif_tag);
                if (count($tag) === 1) {
                    $expected_tag_value = $test['exifReadData'][$tag[0]];
                } else {
                    $expected_tag_value = $test['exifReadData'][$tag[0]][$tag[1]];
                }
// if (($expected['class'] ?? null) === 'FileEye\MediaProbe\Entry\WindowsString') {
if ($element->getParentElement() && $element->getParentElement()->getAttribute('name') === 'UserComment') {
  dump(MediaProbe::dumpHexFormatted($expected_tag_value));
  dump(MediaProbe::dumpHexFormatted($element->getValue(['format' => 'phpExif'])));
}
                $this->assertSame($expected_tag_value, $element->getValue(['format' => 'phpExif']), $element->getContextPath());
            }
            
            if (!$rewritten) {
                $this->assertEquals($expected['text'], $element->toString(), $element->getContextPath());
                if (isset($expected['exiftool_text'])) {
                    $this->assertEquals($expected['exiftool_text'], $element->toString(['format' => 'exiftool']), $element->getContextPath());
                }
                $this->assertSame($expected['bytesHash'], hash('sha256', $element->toBytes()), $element->getContextPath());
            }
        }

        // Recursively check sub-blocks.
        if (isset($expected['elements'])) {
            foreach ($expected['elements'] as $i => $expected_element) {
                $sub = $element->getMultipleElements('*');
                $this->assertArrayHasKey($i, $sub, $expected_element['path']);
                $this->assertElement($expected_element, $sub[$i], $test, $rewritten);
            }
        }
    }
}
