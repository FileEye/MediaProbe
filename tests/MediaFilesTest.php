<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\MediaProbe;
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
        $finder->files()->in(dirname(__FILE__) . '/media-dumps/image')->name('*.dump.yml');
        $result = [];
        foreach ($finder as $file) {
            $result[$file->getBasename()] = [$file];
        }
        return $result;
    }

    /**
     * @dataProvider mediaFileProvider
     */
    public function testLoadFromFile($mediaDumpFile)
    {
        $this->testDump = Yaml::parse($mediaDumpFile->getContents());

        $testFile = dirname(__FILE__) . '/media-samples/image/' . $mediaDumpFile->getRelativePath() . '/' . $this->testDump['fileName'];
        $exiftoolDumpFile = dirname(__FILE__) . '/media-dumps/image/' . $mediaDumpFile->getRelativePath() . '/' . str_replace('.dump.yml', '', $mediaDumpFile->getFileName()) . '.exiftool.xml';
        $exiftoolRawDumpFile = dirname(__FILE__) . '/media-dumps/image/' . $mediaDumpFile->getRelativePath() . '/' . str_replace('.dump.yml', '', $mediaDumpFile->getFileName()) . '.exiftool-raw.xml';

        $this->exiftoolDump =new \DOMDocument();
        $this->exiftoolDump->loadXML(file_get_contents($exiftoolDumpFile));

        $this->exiftoolRawDump =new \DOMDocument();
        $this->exiftoolRawDump->loadXML(file_get_contents($exiftoolRawDumpFile));

        $media = Media::loadFromFile($testFile);

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
    public function testParse($mediaDumpFile)
    {
        $this->testDump = Yaml::parse($mediaDumpFile->getContents());

        $testFile = dirname(__FILE__) . '/media-samples/image/' . $mediaDumpFile->getRelativePath() . '/' . $this->testDump['fileName'];
        $exiftoolDumpFile = dirname(__FILE__) . '/media-dumps/image/' . $mediaDumpFile->getRelativePath() . '/' . str_replace('.dump.yml', '', $mediaDumpFile->getFileName()) . '.exiftool.xml';
        $exiftoolRawDumpFile = dirname(__FILE__) . '/media-dumps/image/' . $mediaDumpFile->getRelativePath() . '/' . str_replace('.dump.yml', '', $mediaDumpFile->getFileName()) . '.exiftool-raw.xml';

        $this->exiftoolDump =new \DOMDocument();
        $this->exiftoolDump->loadXML(file_get_contents($exiftoolDumpFile));

        $this->exiftoolRawDump =new \DOMDocument();
        $this->exiftoolRawDump->loadXML(file_get_contents($exiftoolRawDumpFile));

        $testDataElement = new DataString(file_get_contents($testFile));
        $media = Media::parse($testDataElement);

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

        $testFile = dirname(__FILE__) . '/media-samples/image/' . $mediaDumpFile->getRelativePath() . '/' . $this->testDump['fileName'];

        $original_media = Media::loadFromFile($testFile);
        $original_media->saveToFile($testFile . '-rewrite-gd.img');

        // Test via getimagesize.
        $gd_info = getimagesize($testFile . '-rewrite-gd.img');
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

        $gd_resource = imagecreatefromjpeg($testFile . '-rewrite-gd.img');
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

        $testFile = dirname(__FILE__) . '/media-samples/image/' . $mediaDumpFile->getRelativePath() . '/' . $this->testDump['fileName'];
        $exiftoolDumpFile = dirname(__FILE__) . '/media-dumps/image/' . $mediaDumpFile->getRelativePath() . '/' . str_replace('.dump.yml', '', $mediaDumpFile->getFileName()) . '.exiftool.xml';
        $exiftoolRawDumpFile = dirname(__FILE__) . '/media-dumps/image/' . $mediaDumpFile->getRelativePath() . '/' . str_replace('.dump.yml', '', $mediaDumpFile->getFileName()) . '.exiftool-raw.xml';

        $this->exiftoolDump =new \DOMDocument();
        $this->exiftoolDump->loadXML(file_get_contents($exiftoolDumpFile));

        $this->exiftoolRawDump =new \DOMDocument();
        $this->exiftoolRawDump->loadXML(file_get_contents($exiftoolRawDumpFile));

        $original_media = Media::loadFromFile($testFile);
        $original_media->saveToFile($testFile . '-rewrite.img');
        $media = Media::loadFromFile($testFile . '-rewrite.img');

        $this->assertEquals($this->testDump['mimeType'], $media->getMimeType());

        if (isset($this->testDump['elements'])) {
            $this->assertElement($this->testDump['elements'], $media, true);
        }
    }

    protected function assertElement($expected, $element, $rewritten = false): void
    {
        if (in_array($element->getContextPath(), $this->testDump['skip']['mediaprobe'] ?? [])) {
            return;
        }

        $this->assertInstanceOf($expected['class'], $element, $expected['path']);
        $this->assertSame($expected['path'], $element->getContextPath());
        if (!$rewritten) {
            $this->assertSame($expected['parsed'], $element->isParsed(), $element->getContextPath());
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
                    $this->assertSame($expected_tag_value, $element->getValue(['format' => 'phpExif']), $element->getContextPath());
                }
            }

            // Check Exiftool RAW tag equivalence.
            if ($exiftool_node = $element->getParentElement()->getCollection()->getPropertyValue('exiftoolDOMNode')) {
                $exiftool_node_skip = $this->testDump['skip']['exiftool'] ?? [];
                if (!in_array($exiftool_node, $exiftool_node_skip)) {
                    [$g1, $tag] = explode(':', $exiftool_node);
                    if ($g1 === '*') {
                        $ifd = $element->getParentElement()->getParentElement()->getAttribute('name');
                        $exiftool_node = implode(':', [$ifd, $tag]);
                    }
                    $xml_nodes = $this->exiftoolRawDump->getElementsByTagName('*');
                    $n = null;
                    foreach ($xml_nodes as $node) {
                        if ($node->nodeName === $exiftool_node) {
                            $n = $node;
                        }
                    }
                    $this->assertNotNull($n, 'Exiftool raw missing: ' . $exiftool_node);
                    $valx = rtrim($n->textContent, " ");
                    $vala = $element->getValue(['format' => 'exiftool']);
//if (($expected['class'] ?? null) === 'FileEye\MediaProbe\Entry\Time') {
/*if ($element->getParentElement() && in_array($element->getParentElement()->getAttribute('name'), ['Copyright'])) {
  dump([
    'element_' => $element->getParentElement()->getAttribute('name'),
    'expected' => MediaProbe::dumpHexFormatted($valx),
    'actual__' => MediaProbe::dumpHexFormatted($vala),
  ]);
}*/
                    if ($element->getOutputFormat() === ItemFormat::ASCII) {
                        $this->assertSame($valx, $vala, "Exiftool RAW (expected): '$valx' (actual): '$vala' " . $element->getContextPath());
                    } else {
/*if (stripos($element->getContextPath(), 'tag:GPSVersionID') !== false) {
    dump([$valx, $vala, $this->tokenizeExiftoolString($valx), $element->getValue()])  ;
}*/
                        $tokenized_expected = $this->tokenizeExiftoolString($valx);
                        if (count($tokenized_expected) === 1) {
                            $this->assertEqualsWithDelta($valx, $vala, 0.01, "Exiftool RAW (expected): '$valx' (actual): '$vala' " . $element->getContextPath());
                        } else {
                            $sep = strpos($valx, ':') !== false ? ':' : ' ';
                            $valx_a = explode($sep, $valx);
                            $valx_aa = [];
                            foreach ($valx_a as $v) {
                                $x = is_numeric($v) ? round($v, 2) : $v;
                                $valx_aa[] = $x;
                            }
    //                        $vala_a = explode(', ', $vala);
                            $vala_a = is_array($vala) ? $vala : explode(' ', $vala);
                            $vala_aa = [];
                            foreach ($vala_a as $v) {
                                $x = is_numeric($v) ? round($v, 2) : $v;
                                $vala_aa[] = $x;
                            }
/*if (stripos($element->getContextPath(), 'tag:GPSVersionID') !== false) {
    dump([$valx, $vala, $valx_aa, $vala_aa])  ;
}*/
                            $this->assertEqualsWithDelta($valx_aa, $vala_aa, 0.001, 'Exiftool raw: ' . $element->getContextPath());
                        }
                    }
                }
            }

            // Check Exiftool TEXT tag equivalence.
            if ($exiftool_node = $element->getParentElement()->getCollection()->getPropertyValue('exiftoolDOMNode')) {
                $exiftool_node_skip = $this->testDump['skip']['exiftool'] ?? [];
                if (!in_array($exiftool_node, $exiftool_node_skip)) {
                    [$g1, $tag] = explode(':', $exiftool_node);
                    if ($g1 === '*') {
                        $ifd = $element->getParentElement()->getParentElement()->getAttribute('name');
                        $exiftool_node = implode(':', [$ifd, $tag]);
                    }
                    $xml_nodes = $this->exiftoolDump->getElementsByTagName('*');
                    $n = null;
                    foreach ($xml_nodes as $node) {
                        if ($node->nodeName === $exiftool_node) {
                            $n = $node;
                        }
                    }
                    $this->assertNotNull($n, 'Exiftool text missing: ' . $exiftool_node);
                    $valx = rtrim($n->textContent, " ");
                    $vala = rtrim($element->toString(['format' => 'exiftool']), " ");
                    $valx_a = $this->tokenizeExiftoolString($valx);
                    $vala_a = $this->tokenizeExiftoolString($vala);
                    $this->assertEquals($valx_a, $vala_a, "Exiftool TEXT (expected): '$valx' (actual): '$vala' " . $element->getContextPath());
                }
            }

            if (!$rewritten) {
                $this->assertEquals($expected['text'], $element->toString(), $element->getContextPath());
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

    protected function tokenizeExiftoolString(string $input): array
    {
        preg_match_all('/(\d+\.\d+)|(\d+)/m', $input, $matches, PREG_OFFSET_CAPTURE);
        if (empty($matches[0])) {
            return [$input];
        }
        $ret = [];
        foreach ($matches[0] as $i => $m) {
            if ($i === 0 && $m[1] !== 0) {
                $ret[] = substr($input, 0, $m[1]);
            }
            $ret[] = is_numeric($m[0]) ? round($m[0], 2) : $m[0];
            if (isset($matches[0][$i + 1])) {
                $endpos = $m[1] + strlen($m[0]);
                $ret[] = substr($input, $endpos, $matches[0][$i + 1][1] - $endpos);
            } else {
                $trail = substr($input, $m[1] + strlen($m[0]));
                if ($trail !== '') {
                    $ret[] = $trail;
                }
            }
        }
        return $ret;
    }
}