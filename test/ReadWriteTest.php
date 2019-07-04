<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Block\Exif;
use FileEye\ImageInfo\core\Block\IfdFormat;
use FileEye\ImageInfo\core\Block\IfdItem;
use FileEye\ImageInfo\core\Block\Jpeg;
use FileEye\ImageInfo\core\Block\JpegSegmentApp1;
use FileEye\ImageInfo\core\Block\Tag;
use FileEye\ImageInfo\core\Block\Tiff;
use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Entry\Core\Ascii;
use FileEye\ImageInfo\core\Entry\Core\Byte;
use FileEye\ImageInfo\core\Entry\Core\Long;
use FileEye\ImageInfo\core\Entry\Core\Short;
use FileEye\ImageInfo\core\Entry\Core\SignedByte;
use FileEye\ImageInfo\core\Entry\Core\SignedLong;
use FileEye\ImageInfo\core\Entry\Core\SignedShort;
use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\Block\Ifd;
use FileEye\ImageInfo\core\Image;

class ReadWriteTest extends ImageInfoTestCaseBase
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
        $image = Image::createFromFile(dirname(__FILE__) . '/image_files/no-exif.jpg', null, 'error');
        $jpeg = $image->getElement("jpeg");

        $this->assertNull($jpeg->getElement("jpegSegment/exif"));

        // Find the COM segment.
        $com_segment = $jpeg->getElement("jpegSegment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $app1_segment = new JpegSegmentApp1($jpeg->getCollection()->getItemCollectionByName('APP1'), $jpeg, $com_segment);

        $exif = new Exif($app1_segment->getCollection()->getItemCollectionByName('Exif'), $app1_segment);
        $this->assertNotNull($jpeg->getElement("jpegSegment/exif"));
        $this->assertNull($exif->getElement("tiff"));

        $tiff = new Tiff($exif->getCollection()->getItemCollectionByName('Tiff'), $exif);
        $this->assertNotNull($exif->getElement("tiff"));
        $this->assertNull($tiff->getElement("ifd[@name='IFD0']"));

        $ifd = new Ifd(new IfdItem($tiff->getCollection()->getItemCollection('0'), IfdFormat::getFromName('Long')), $tiff);
        foreach ($entries as $entry) {
            $item_collection = $ifd->getCollection()->getItemCollection($entry[0], '__NIL__', [
                'item' => $entry[0],
                'DOMNode' => 'tag',
            ]);
            $tag = new Tag(new IfdItem($item_collection, $entry[2]), $ifd);
            new $entry[1]($tag, $entry[3]);
        }
        $this->assertNotNull($tiff->getElement("ifd[@name='IFD0']"));

        $this->assertFalse(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $image->saveToFile(dirname(__FILE__) . '/test-output.jpg');
        $this->assertTrue(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $this->assertTrue(filesize(dirname(__FILE__) . '/test-output.jpg') > 0);

        // Release the object loaded while reading from file.
        $jpeg = null;

        // Now read the file and see if the entries are still there.
        $r_image = Image::createFromFile(dirname(__FILE__) . '/test-output.jpg', null, 'error');
        $r_jpeg = $r_image->getElement("jpeg");

        $this->assertInstanceOf('FileEye\ImageInfo\core\Block\Exif', $r_jpeg->getElement("jpegSegment/exif"));

        $tiff = $r_jpeg->getElement("jpegSegment/exif/tiff");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Block\Tiff', $tiff);
        $this->assertCount(1, $tiff->getMultipleElements("ifd"));

        $ifd = $tiff->getElement("ifd[@name='IFD0']");
        $this->assertInstanceOf('FileEye\ImageInfo\core\Block\Ifd', $ifd);
        $this->assertEquals($ifd->getAttribute('name'), 'IFD0');

        foreach ($entries as $entry_name => $entry) {
            $tagEntry = $ifd->getElement('tag[@id="' . (int) $entry[0] . '"]/entry');
            if ($tagEntry->getFormat() == IfdFormat::getFromName('Ascii')) {
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
                    [0xF001, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [0], 0],
                    [0xF002, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [1], 1],
                    [0xF003, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [2], 2],
                    [0xF004, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [253], 253],
                    [0xF005, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [254], 254],
                    [0xF006, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [255], 255],
                    [0xF007, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [0, 1, 2, 253, 254, 255], [0, 1, 2, 253, 254, 255]],
                    [0xF008, 'FileEye\ImageInfo\core\Entry\Core\Byte', 1, [], []],
                ],
            ],
            'SignedByte Read/Write Tests' => [
                [
                    [0xF101, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [-128], -128],
                    [0xF102, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [-127], -127],
                    [0xF103, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [-1], -1],
                    [0xF104, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [0], 0],
                    [0xF105, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [1], 1],
                    [0xF106, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [126], 126],
                    [0xF107, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [127], 127],
                    [0xF108, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [-128, -1, 0, 1, 127], [-128, -1, 0, 1, 127]],
                    [0xF109, 'FileEye\ImageInfo\core\Entry\Core\SignedByte', 6, [], []],
                ],
            ],
            'Short Read/Write Tests' => [
                [
                    [0xF201, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [0], 0],
                    [0xF202, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [1], 1],
                    [0xF203, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [2], 2],
                    [0xF204, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [65533], 65533],
                    [0xF205, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [65534], 65534],
                    [0xF206, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [65535], 65535],
                    [0xF207, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [0, 1, 65534, 65535], [0, 1, 65534, 65535]],
                    [0xF208, 'FileEye\ImageInfo\core\Entry\Core\Short', 3, [], []],
                ],
            ],
            'SignedShort Read/Write Tests' => [
                [
                    [0xF301, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [-32768], -32768],
                    [0xF302, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [-32767], -32767],
                    [0xF303, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [-1], -1],
                    [0xF304, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [0], 0],
                    [0xF305, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [1], 1],
                    [0xF306, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [32766], 32766],
                    [0xF307, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [32767], 32767],
                    [0xF308, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [- 32768, - 1, 0, 1, 32767], [- 32768, - 1, 0, 1, 32767]],
                    [0xF309, 'FileEye\ImageInfo\core\Entry\Core\SignedShort', 8, [], []],
                ],
            ],
            'Long Read/Write Tests' => [
                [
                    [0xF401, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [0], 0],
                    [0xF402, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [1], 1],
                    [0xF403, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [2], 2],
                    [0xF404, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [4294967293], 4294967293],
                    [0xF405, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [4294967294], 4294967294],
                    [0xF406, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [4294967295], 4294967295],
                    [0xF407, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [0, 1, 4294967295], [0, 1, 4294967295]],
                    [0xF408, 'FileEye\ImageInfo\core\Entry\Core\Long', 4, [], []],
                ],
            ],
            'SignedLong Read/Write Tests' => [
                [
                    [0xF501, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [-2147483648], -2147483648],
                    [0xF502, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [-2147483647], -2147483647],
                    [0xF503, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [-1], -1],
                    [0xF504, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [0], 0],
                    [0xF505, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [1], 1],
                    [0xF506, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [2147483646], 2147483646],
                    [0xF507, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [2147483647], 2147483647],
                    [0xF508, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [-2147483648, 0, 2147483647], [-2147483648, 0, 2147483647]],
                    [0xF509, 'FileEye\ImageInfo\core\Entry\Core\SignedLong', 9, [], []],
                ],
            ],
            'Ascii Read/Write Tests' => [
                [
                    [0xF601, 'FileEye\ImageInfo\core\Entry\Core\Ascii', 2, [], ''],
                    [0xF602, 'FileEye\ImageInfo\core\Entry\Core\Ascii', 2, [''], ''],
                    [0xF603, 'FileEye\ImageInfo\core\Entry\Core\Ascii', 2, ['Hello World!'], 'Hello World!'],
                    [0xF604, 'FileEye\ImageInfo\core\Entry\Core\Ascii', 2, ["\x00\x01\x02...\xFD\xFE\xFF"], "\x00\x01\x02...\xFD\xFE\xFF"],  // xx for some reason this generates data window overflow
                ],
            ],
        ];
    }
}
