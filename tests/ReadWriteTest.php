<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Block\Jpeg\Exif;
use FileEye\MediaProbe\Block\Tiff\Ifd;
use FileEye\MediaProbe\Block\Jpeg\Jpeg;
use FileEye\MediaProbe\Block\Jpeg\SegmentApp1;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Block\Tiff\Tiff;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\Entry\Core\SignedByte;
use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Entry\Core\SignedShort;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;
use PHPUnit\Framework\Attributes\DataProvider;

class ReadWriteTest extends MediaProbeTestCaseBase
{
    public function tearDown(): void
    {
        unlink(dirname(__FILE__) . '/test-output.jpg');
        gc_collect_cycles();
        parent::tearDown();
    }

    #[DataProvider('writeEntryProvider')]
    public function testWriteRead(array $entries)
    {
        $media = Media::parseFromFile(dirname(__FILE__) . '/media-samples/image/no-exif.jpg', null, 'error');
        $jpeg = $media->getElement("jpeg");

        $this->assertNull($jpeg->getElement("jpegSegment/exif"));

        // Find the COM segment.
        $com_segment = $jpeg->getElement("jpegSegment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $app1_segment_definition = new ItemDefinition($jpeg->getCollection()->getItemCollectionByName('APP1'));
        $app1_segment = new SegmentApp1($app1_segment_definition, $jpeg, $com_segment);

        $exif = new Exif(new ItemDefinition($app1_segment->getCollection()->getItemCollection('Exif')), $app1_segment);
        $this->assertNotNull($jpeg->getElement("jpegSegment/exif"));
        $this->assertNull($exif->getElement("tiff"));

        $tiff = new Tiff(new ItemDefinition($exif->getCollection()->getItemCollection('Tiff')), $exif);
        $tiff->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $this->assertNotNull($exif->getElement("tiff"));
        $this->assertNull($tiff->getElement("ifd[@name='IFD0']"));

        $ifd = new Ifd(new ItemDefinition($tiff->getCollection()->getItemCollection('0'), DataFormat::LONG), $tiff);
        foreach ($entries as $entry) {
            $item_collection = $ifd->getCollection()->getItemCollection($entry[0], 0, 'Tiff\UnknownTag', [
                'item' => $entry[0],
                'DOMNode' => 'tag',
            ]);
            $tag = new Tag(new ItemDefinition($item_collection, $entry[2]), $ifd);
            new $entry[1]($tag, new DataString($entry[3]));
        }
        $this->assertNotNull($tiff->getElement("ifd[@name='IFD0']"));

        $this->assertFalse(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $media->saveToFile(dirname(__FILE__) . '/test-output.jpg');
        $this->assertTrue(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $this->assertTrue(filesize(dirname(__FILE__) . '/test-output.jpg') > 0);

        // Release the object loaded while reading from file.
        $jpeg = null;

        // Now read the file and see if the entries are still there.
        $r_media = Media::parseFromFile(dirname(__FILE__) . '/test-output.jpg', null, 'error');
        $r_jpeg = $r_media->getElement("jpeg");

        $this->assertInstanceOf('FileEye\MediaProbe\Block\Jpeg\Exif', $r_jpeg->getElement("jpegSegment/exif"));

        $tiff = $r_jpeg->getElement("jpegSegment/exif/tiff");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Tiff\Tiff', $tiff);
        $this->assertCount(1, $tiff->getMultipleElements("ifd"));

        $ifd = $tiff->getElement("ifd[@name='IFD0']");
        $this->assertInstanceOf('FileEye\MediaProbe\Block\Tiff\Ifd', $ifd);
        $this->assertEquals($ifd->getAttribute('name'), 'IFD0');

        foreach ($entries as $entry_name => $entry) {
            $tagEntry = $ifd->getElement('tag[@id="' . (int) $entry[0] . '"]/entry');
            $this->assertEquals($tagEntry->toBytes(), $entry[3]);
            $this->assertEquals($tagEntry->toString(), is_array($entry[4]) ? implode(' ', $entry[4]) : $entry[4]);
        }
    }

    public static function writeEntryProvider()
    {
        return [
            'Byte Read/Write Tests' => [
                [
                    [0xF001, Byte::class, 1, ConvertBytes::fromByte(0), 0],
                    [0xF002, Byte::class, 1, ConvertBytes::fromByte(1), 1],
                    [0xF003, Byte::class, 1, ConvertBytes::fromByte(2), 2],
                    [0xF004, Byte::class, 1, ConvertBytes::fromByte(253), 253],
                    [0xF005, Byte::class, 1, ConvertBytes::fromByte(254), 254],
                    [0xF006, Byte::class, 1, ConvertBytes::fromByte(255), 255],
                    [0xF007, Byte::class, 1, ConvertBytes::fromByte(0) . ConvertBytes::fromByte(1) . ConvertBytes::fromByte(2) . ConvertBytes::fromByte(253) . ConvertBytes::fromByte(254) . ConvertBytes::fromByte(255), [0, 1, 2, 253, 254, 255]],
                ],
            ],
            'SignedByte Read/Write Tests' => [
                [
                    [0xF101, SignedByte::class, 6, ConvertBytes::fromSignedByte(-128), -128],
                    [0xF102, SignedByte::class, 6, ConvertBytes::fromSignedByte(-127), -127],
                    [0xF103, SignedByte::class, 6, ConvertBytes::fromSignedByte(-1), -1],
                    [0xF104, SignedByte::class, 6, ConvertBytes::fromSignedByte(0), 0],
                    [0xF105, SignedByte::class, 6, ConvertBytes::fromSignedByte(1), 1],
                    [0xF106, SignedByte::class, 6, ConvertBytes::fromSignedByte(126), 126],
                    [0xF107, SignedByte::class, 6, ConvertBytes::fromSignedByte(127), 127],
                    [0xF108, SignedByte::class, 6, ConvertBytes::fromSignedByte(-128) . ConvertBytes::fromSignedByte(-1) . ConvertBytes::fromSignedByte(0) . ConvertBytes::fromSignedByte(1) . ConvertBytes::fromSignedByte(127), [-128, -1, 0, 1, 127]],
                ],
            ],
            'Short Read/Write Tests' => [
                [
                    [0xF201, Short::class, 3, ConvertBytes::fromShort(0), 0],
                    [0xF202, Short::class, 3, ConvertBytes::fromShort(1), 1],
                    [0xF203, Short::class, 3, ConvertBytes::fromShort(2), 2],
                    [0xF204, Short::class, 3, ConvertBytes::fromShort(65533), 65533],
                    [0xF205, Short::class, 3, ConvertBytes::fromShort(65534), 65534],
                    [0xF206, Short::class, 3, ConvertBytes::fromShort(65535), 65535],
                    [0xF207, Short::class, 3, ConvertBytes::fromShort(0) . ConvertBytes::fromShort(1) . ConvertBytes::fromShort(65534) . ConvertBytes::fromShort(65535), [0, 1, 65534, 65535]],
                ],
            ],
            'SignedShort Read/Write Tests' => [
                [
                    [0xF301, SignedShort::class, 8, ConvertBytes::fromSignedShort(-32768), -32768],
                    [0xF302, SignedShort::class, 8, ConvertBytes::fromSignedShort(-32767), -32767],
                    [0xF303, SignedShort::class, 8, ConvertBytes::fromSignedShort(-1), -1],
                    [0xF304, SignedShort::class, 8, ConvertBytes::fromSignedShort(0), 0],
                    [0xF305, SignedShort::class, 8, ConvertBytes::fromSignedShort(1), 1],
                    [0xF306, SignedShort::class, 8, ConvertBytes::fromSignedShort(32766), 32766],
                    [0xF307, SignedShort::class, 8, ConvertBytes::fromSignedShort(32767), 32767],
                    [0xF308, SignedShort::class, 8, ConvertBytes::fromSignedShort(-32768) . ConvertBytes::fromSignedShort(-1) . ConvertBytes::fromSignedShort(0) . ConvertBytes::fromSignedShort(1) . ConvertBytes::fromSignedShort(32767), [-32768, -1, 0, 1, 32767]],
                ],
            ],
            'Long Read/Write Tests' => [
                [
                    [0xF401, Long::class, 4, ConvertBytes::fromLong(0), 0],
                    [0xF402, Long::class, 4, ConvertBytes::fromLong(1), 1],
                    [0xF403, Long::class, 4, ConvertBytes::fromLong(2), 2],
                    [0xF404, Long::class, 4, ConvertBytes::fromLong(4294967293), 4294967293],
                    [0xF405, Long::class, 4, ConvertBytes::fromLong(4294967294), 4294967294],
                    [0xF406, Long::class, 4, ConvertBytes::fromLong(4294967295), 4294967295],
                    [0xF407, Long::class, 4, ConvertBytes::fromLong(0) . ConvertBytes::fromLong(1) . ConvertBytes::fromLong(4294967295), [0, 1, 4294967295]],
                ],
            ],
            'SignedLong Read/Write Tests' => [
                [
                    [0xF501, SignedLong::class, 9, ConvertBytes::fromSignedLong(-2147483648), -2147483648],
                    [0xF502, SignedLong::class, 9, ConvertBytes::fromSignedLong(-2147483647), -2147483647],
                    [0xF503, SignedLong::class, 9, ConvertBytes::fromSignedLong(-1), -1],
                    [0xF504, SignedLong::class, 9, ConvertBytes::fromSignedLong(0), 0],
                    [0xF505, SignedLong::class, 9, ConvertBytes::fromSignedLong(1), 1],
                    [0xF506, SignedLong::class, 9, ConvertBytes::fromSignedLong(2147483646), 2147483646],
                    [0xF507, SignedLong::class, 9, ConvertBytes::fromSignedLong(2147483647), 2147483647],
                    [0xF508, SignedLong::class, 9, ConvertBytes::fromSignedLong(-2147483648) . ConvertBytes::fromSignedLong(0) . ConvertBytes::fromSignedLong(2147483647), [-2147483648, 0, 2147483647]],
                ],
            ],
            'Ascii Read/Write Tests' => [
                [
                    [0xF602, Ascii::class, 2, '' . chr(0), ''],
                    [0xF603, Ascii::class, 2, 'Hello World!' . chr(0), 'Hello World!'],
                    // The first byte being 0x00 means the output is empty string.
                    // @todo xxx potentially revisit when decoupling
                    [0xF604, Ascii::class, 2, "\x00\x01\x02...\xFD\xFE\xFF\x00", ""],
                ],
            ],
        ];
    }
}
