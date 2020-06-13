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
    protected $testDump;
    protected $exiftoolDump;
    protected $exiftoolRawDump;

    /**
     * {@inheritdoc}
     */
    public function fcTearDown()
    {
        $this->testDump = null;
        $this->exiftoolDump = null;
        $this->exiftoolRawDump = null;
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
        $this->testDump = Yaml::parse($mediaDumpFile->getContents());
        if (isset($this->testDump['exiftool'])) {
            $this->exiftoolDump =new \DOMDocument();
            $this->exiftoolDump->loadXML($this->testDump['exiftool']);
        }
        if (isset($this->testDump['exiftool_raw'])) {
            $this->exiftoolRawDump =new \DOMDocument();
            $this->exiftoolRawDump->loadXML($this->testDump['exiftool_raw']);
        }
        $media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $this->testDump['fileName']);

        $this->assertEquals($this->testDump['mimeType'], $media->getMimeType());

        if (isset($this->testDump['elements'])) {
            $this->assertElement($this->testDump['elements'], $media);
        }

        foreach (['ERROR', 'WARNING', 'NOTICE'] as $level) {
            if (isset($this->testDump['log'][$level])) {
                $this->assertEquals(count($this->testDump['log'][$level]), count($media->dumpLog($level)));
            }
        }
    }

    /**
     * @dataProvider mediaFileProvider
     */
    public function testRewriteThroughGd($mediaDumpFile)
    {
        $this->testDump = Yaml::parse($mediaDumpFile->getContents());
        $original_media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $this->testDump['fileName']);
        $original_media->saveToFile($mediaDumpFile->getPath() . '/' . $this->testDump['fileName'] . '-rewrite-gd.img');

        // Test via getimagesize.
        $gd_info = getimagesize($mediaDumpFile->getPath() . '/' . $this->testDump['fileName'] . '-rewrite-gd.img');
        $this->assertEquals($this->testDump['gdInfo'], $gd_info);

        if ($this->testDump['mimeType'] === 'image/tiff') {
            $this->markTestIncomplete($this->testDump['fileName'] . ' of MIME type ' . $this->testDump['mimeType'] . ' can not be tested via GD.');
        }

        // Test loading the image to GD; it fails hard in case of errors.
        $gd_resource = imagecreatefromstring($original_media->toBytes());
        $this->assertNotFalse($gd_resource);
        $this->assertEquals($this->testDump['gdInfo'][0], imagesx($gd_resource));
        $this->assertEquals($this->testDump['gdInfo'][1], imagesy($gd_resource));
        imagedestroy($gd_resource);

        $gd_resource = imagecreatefromjpeg($mediaDumpFile->getPath() . '/' . $this->testDump['fileName'] . '-rewrite-gd.img');
        $this->assertNotFalse($gd_resource);
        $this->assertEquals($this->testDump['gdInfo'][0], imagesx($gd_resource));
        $this->assertEquals($this->testDump['gdInfo'][1], imagesy($gd_resource));
        imagedestroy($gd_resource);
    }

    /**
     * @dataProvider mediaFileProvider
     */
    public function testRewrite($mediaDumpFile)
    {
        $this->testDump = Yaml::parse($mediaDumpFile->getContents());
        if (isset($this->testDump['exiftool'])) {
            $this->exiftoolDump =new \DOMDocument();
            $this->exiftoolDump->loadXML($this->testDump['exiftool']);
        }
        if (isset($this->testDump['exiftool_raw'])) {
            $this->exiftoolRawDump =new \DOMDocument();
            $this->exiftoolRawDump->loadXML($this->testDump['exiftool_raw']);
        }
        $original_media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $this->testDump['fileName']);
        $original_media->saveToFile($mediaDumpFile->getPath() . '/' . $this->testDump['fileName'] . '-rewrite.img');
        $media = Media::createFromFile($mediaDumpFile->getPath() . '/' . $this->testDump['fileName'] . '-rewrite.img');

        $this->assertEquals($this->testDump['mimeType'], $media->getMimeType());

        if (isset($this->testDump['elements'])) {
            $this->assertElement($this->testDump['elements'], $media, true);
        }
    }

    protected function assertElement($expected, $element, $rewritten = false)
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
                $php_exif_skip = $this->testDump['skip']['phpExif'] ?? [];
                if (!in_array($php_exif_tag, $php_exif_skip)) {
                    $tag = explode('::', $php_exif_tag);
                    if (count($tag) === 1) {
                        $expected_tag_value = $this->testDump['exifReadData'][$tag[0]];
                    } else {
                        $expected_tag_value = $this->testDump['exifReadData'][$tag[0]][$tag[1]];
                    }
//if (($expected['class'] ?? null) === 'FileEye\MediaProbe\Entry\Time') {
/*if ($element->getParentElement() && $element->getParentElement()->getAttribute('name') === 'UserComment') {
  dump(MediaProbe::dumpHexFormatted($expected_tag_value));
  dump(MediaProbe::dumpHexFormatted($element->getValue(['format' => 'phpExif'])));
}*/
                    $this->assertSame($expected_tag_value, $element->getValue(['format' => 'phpExif']), $element->getContextPath());
                }
            }

            // Check Exiftool tag equivalence.
            if ($exiftool_node = $element->getParentElement()->getCollection()->getPropertyValue('exiftoolDOMNode')) {
                $exiftool_node_skip = $this->testDump['skip']['exiftool'] ?? [];
                if (!in_array($exiftool_node, $exiftool_node_skip)) {
                    $XPath = new \DOMXPath($this->exiftoolRawDump);
                    $xml_node = $XPath->query($exiftool_node);
                    //$xml_node = $this->exiftoolRawDump->getElementsByTagName($exiftool_node);
                    dump([$element->getContextPath(), $exiftool_node, $xml_node]);
//                    dump([$element->getContextPath(), $element->getValue(), $xml_node]);
                    //$this->assertSame($expected_tag_value, $element->getValue(['format' => 'phpExif']), $element->getContextPath());
                }
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
                $this->assertElement($expected_element, $sub[$i], $rewritten);
            }
        }
    }
}
