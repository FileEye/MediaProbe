<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Exif;
use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\JpegSegmentApp1;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\Entry\Core\SignedByte;
use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Block\Ifd;
use FileEye\MediaProbe\Media;

class ReadWriteTest extends MediaProbeTestCaseBase
{
    /**
     * {@inheritdoc}
     */
    public function fcTearDown()
    {
        unlink(dirname(__FILE__) . '/test-output.jpg');
        gc_collect_cycles();
    }

    /**
     * @dataProvider writeEntryProvider
     */
    public function testWriteRead(array $entries)
    {
        $media = Media::createFromFile(dirname(__FILE__) . '/image_files/no-exif.jpg', null, 'error');
        $jpeg = $media->getElement("jpeg");

        $this->assertNull($jpeg->getElement("jpegSegment/exif"));

        // Find the COM segment.
        $com_segment = $jpeg->getElement("jpegSegment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $app1_segment = new JpegSegmentApp1($jpeg->getCollection()->getItemCollectionByName('APP1'), $jpeg, $com_segment);

        $exif = new Exif($app1_segment->getCollection()->getItemCollection('Exif'), $app1_segment);
        $this->assertNotNull($jpeg->getElement("jpegSegment/exif"));
        $this->assertNull($exif->getElement("tiff"));

        $tiff = new Tiff($exif->getCollection()->getItemCollection('Tiff'), $exif);
        $this->assertNotNull($exif->getElement("tiff"));
        $this->assertNull($tiff->getElement("ifd[@name='IFD0']"));

        $ifd = new Ifd(new ItemDefinition($tiff->getCollection()->getItemCollection('0'), ItemFormat::LONG), $tiff);
        foreach ($entries as $entry) {
            $item_collection = $ifd->getCollection()->getItemCollection($entry[0], 'UnknownTag', [
                'item' => $entry[0],
                'DOMNode' => 'tag',
            ]);
            $tag = new Tag(new ItemDefinition($item_collection, $entry[2]), $ifd);
            new $entry[1]($tag, $entry[3]);
        }
        $this->assertNotNull($tiff->getElement("ifd[@name='IFD0']"));

        $this->assertFalse(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $media->saveToFile(dirname(__FILE__) . '/test-output.jpg');
        $this->assertTrue(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $this->assertTrue(filesize(dirname(__FILE__) . '/test-output.jpg') > 0);

        // Release the object loaded while reading from file.
        $jpeg = null;

        // Now read the file and see if the entries are still there.
        $r_media = Media::createFromFile(dirname(__FILE__) . '/test-output.jpg', null, 'error');
        $r_jpeg = $r_media->getElement("jpeg");

        $this->assertInstanceOf('FileEye\MediaProbe\Block\Exif', $r_jpeg->getElement("jpegSegment/exif"));

        $tiff = $r_jpeg->getElement("jpegSegment/exif/tiff");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Tiff', $tiff);
        $this->assertCount(1, $tiff->getMultipleElements("ifd"));

        $ifd = $tiff->getElement("ifd[@name='IFD0']");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Ifd', $ifd);
        $this->assertEquals($ifd->getAttribute('name'), 'IFD0');

        foreach ($entries as $entry_name => $entry) {
            $tagEntry = $ifd->getElement('tag[@id="' . (int) $entry[0] . '"]/entry');
            if ($tagEntry->getFormat() == ItemFormat::ASCII) {
                $ifdValue = $tagEntry->getValue();
                $entryValue = $entry[4];
                // cut off after the first nul byte
                // since $ifdValue comes from parsed ifd,
                // it is already cut off
                $canonicalEntry = strstr($entryValue, "\0", true);
                // if no nul byte found, use original value
                if ($canonicalEntry === false) {
                    $canonicalEntry = $entryValue;
                }
                $this->assertEquals($ifdValue, $canonicalEntry);
            } else {
                $this->assertEquals($tagEntry->getValue(), $entry[4]);
            }
        }
    }

    public function writeEntryProvider()
    {
        return [
            'Byte Read/Write Tests' => [
                [
                    [0xF001, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [0], 0],
                    [0xF002, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [1], 1],
                    [0xF003, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [2], 2],
                    [0xF004, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [253], 253],
                    [0xF005, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [254], 254],
                    [0xF006, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [255], 255],
                    [0xF007, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [0, 1, 2, 253, 254, 255], [0, 1, 2, 253, 254, 255]],
                    [0xF008, 'FileEye\MediaProbe\Entry\Core\Byte', 1, [], []],
                ],
            ],
            'SignedByte Read/Write Tests' => [
                [
                    [0xF101, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [-128], -128],
                    [0xF102, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [-127], -127],
                    [0xF103, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [-1], -1],
                    [0xF104, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [0], 0],
                    [0xF105, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [1], 1],
                    [0xF106, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [126], 126],
                    [0xF107, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [127], 127],
                    [0xF108, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [-128, -1, 0, 1, 127], [-128, -1, 0, 1, 127]],
                    [0xF109, 'FileEye\MediaProbe\Entry\Core\SignedByte', 6, [], []],
                ],
            ],
            'Short Read/Write Tests' => [
                [
                    [0xF201, 'FileEye\MediaProbe\Entry\Core\Short', 3, [0], 0],
                    [0xF202, 'FileEye\MediaProbe\Entry\Core\Short', 3, [1], 1],
                    [0xF203, 'FileEye\MediaProbe\Entry\Core\Short', 3, [2], 2],
                    [0xF204, 'FileEye\MediaProbe\Entry\Core\Short', 3, [65533], 65533],
                    [0xF205, 'FileEye\MediaProbe\Entry\Core\Short', 3, [65534], 65534],
                    [0xF206, 'FileEye\MediaProbe\Entry\Core\Short', 3, [65535], 65535],
                    [0xF207, 'FileEye\MediaProbe\Entry\Core\Short', 3, [0, 1, 65534, 65535], [0, 1, 65534, 65535]],
                    [0xF208, 'FileEye\MediaProbe\Entry\Core\Short', 3, [], []],
                ],
            ],
            'SignedShort Read/Write Tests' => [
                [
                    [0xF301, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [-32768], -32768],
                    [0xF302, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [-32767], -32767],
                    [0xF303, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [-1], -1],
                    [0xF304, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [0], 0],
                    [0xF305, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [1], 1],
                    [0xF306, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [32766], 32766],
                    [0xF307, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [32767], 32767],
                    [0xF308, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [- 32768, - 1, 0, 1, 32767], [- 32768, - 1, 0, 1, 32767]],
                    [0xF309, 'FileEye\MediaProbe\Entry\Core\SignedShort', 8, [], []],
                ],
            ],
            'Long Read/Write Tests' => [
                [
                    [0xF401, 'FileEye\MediaProbe\Entry\Core\Long', 4, [0], 0],
                    [0xF402, 'FileEye\MediaProbe\Entry\Core\Long', 4, [1], 1],
                    [0xF403, 'FileEye\MediaProbe\Entry\Core\Long', 4, [2], 2],
                    [0xF404, 'FileEye\MediaProbe\Entry\Core\Long', 4, [4294967293], 4294967293],
                    [0xF405, 'FileEye\MediaProbe\Entry\Core\Long', 4, [4294967294], 4294967294],
                    [0xF406, 'FileEye\MediaProbe\Entry\Core\Long', 4, [4294967295], 4294967295],
                    [0xF407, 'FileEye\MediaProbe\Entry\Core\Long', 4, [0, 1, 4294967295], [0, 1, 4294967295]],
                    [0xF408, 'FileEye\MediaProbe\Entry\Core\Long', 4, [], []],
                ],
            ],
            'SignedLong Read/Write Tests' => [
                [
                    [0xF501, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [-2147483648], -2147483648],
                    [0xF502, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [-2147483647], -2147483647],
                    [0xF503, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [-1], -1],
                    [0xF504, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [0], 0],
                    [0xF505, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [1], 1],
                    [0xF506, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [2147483646], 2147483646],
                    [0xF507, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [2147483647], 2147483647],
                    [0xF508, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [-2147483648, 0, 2147483647], [-2147483648, 0, 2147483647]],
                    [0xF509, 'FileEye\MediaProbe\Entry\Core\SignedLong', 9, [], []],
                ],
            ],
            'Ascii Read/Write Tests' => [
                [
                    [0xF601, 'FileEye\MediaProbe\Entry\Core\Ascii', 2, [], ''],
                    [0xF602, 'FileEye\MediaProbe\Entry\Core\Ascii', 2, [''], ''],
                    [0xF603, 'FileEye\MediaProbe\Entry\Core\Ascii', 2, ['Hello World!'], 'Hello World!'],
                    [0xF604, 'FileEye\MediaProbe\Entry\Core\Ascii', 2, ["\x00\x01\x02...\xFD\xFE\xFF"], "\x00\x01\x02...\xFD\xFE\xFF"],  // xx for some reason this generates data window overflow
                ],
            ],
        ];
    }
}
