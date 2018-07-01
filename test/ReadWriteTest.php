<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\JpegSegment;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\Entry\Core\Byte;
use ExifEye\core\Entry\Core\Long;
use ExifEye\core\Entry\Core\Short;
use ExifEye\core\Entry\Core\SignedByte;
use ExifEye\core\Entry\Core\SignedLong;
use ExifEye\core\Entry\Core\SignedShort;
use ExifEye\core\ExifEye;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Format;
use ExifEye\core\Spec;
use ExifEye\core\Image;

class ReadWriteTest extends ExifEyeTestCaseBase
{
    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        parent::tearDown();
        unlink(dirname(__FILE__) . '/test-output.jpg');
        gc_collect_cycles();
    }

    /**
     * @dataProvider writeEntryProvider
     */
    public function testWriteRead(array $entries)
    {
        $image = Image::loadFromFile(dirname(__FILE__) . '/image_files/no-exif.jpg', null, 'error');
        $jpeg = $image->getElement("jpeg");

        $this->assertNull($jpeg->getElement("segment/exif"));

        // Find the COM segment.
        $com_segment = $jpeg->getElement("segment[@name='COM']");

        // Insert the APP1 segment before the COM one.
        $app1_segment = new JpegSegment(0xE1, $jpeg, $com_segment);

        $exif = new Exif($app1_segment);
        $this->assertNotNull($jpeg->getElement("segment/exif"));
        $this->assertNull($exif->getElement("tiff"));

        $tiff = new Tiff($exif);
        $this->assertNotNull($exif->getElement("tiff"));
        $this->assertNull($tiff->getElement("ifd[@name='IFD0']"));

        $ifd = new Ifd($tiff, 'IFD0');
        foreach ($entries as $entry) {
            new Tag($ifd, $entry[0], $entry[1], $entry[2]);
        }
        $this->assertNotNull($tiff->getElement("ifd[@name='IFD0']"));

        $this->assertFalse(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $image->saveToFile(dirname(__FILE__) . '/test-output.jpg');
        $this->assertTrue(file_exists(dirname(__FILE__) . '/test-output.jpg'));
        $this->assertTrue(filesize(dirname(__FILE__) . '/test-output.jpg') > 0);

        // Release the object loaded while reading from file.
        $jpeg = null;

        // Now read the file and see if the entries are still there.
        $r_image = Image::loadFromFile(dirname(__FILE__) . '/test-output.jpg', null, 'error');
        $r_jpeg = $r_image->getElement("jpeg");


        $this->assertInstanceOf('ExifEye\core\Block\Exif', $r_jpeg->getElement("segment/exif"));

        $tiff = $r_jpeg->getElement("segment/exif/tiff");
        $this->assertInstanceOf('ExifEye\core\Block\Tiff', $tiff);
        $this->assertCount(1, $tiff->getMultipleElements("ifd"));

        $ifd = $tiff->getElement("ifd[@name='IFD0']");
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd);
        $this->assertEquals($ifd->getAttribute('name'), 'IFD0');

        foreach ($entries as $entry_name => $entry) {
            $tagEntry = $ifd->getElement('tag[@id="' . (int) $entry[0] . '"]/entry');
            if ($tagEntry->getFormat() == Format::ASCII) {
                $ifdValue = $tagEntry->getValue();
                $entryValue = $entry[3];
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
                $this->assertEquals($tagEntry->getValue(), $entry[3]);
            }
        }
    }

    public function writeEntryProvider()
    {
        return [
            'PEL Byte Read/Write Tests' => [
                [
                    [0xF001, 'ExifEye\core\Entry\Core\Byte', [0], 0],
                    [0xF002, 'ExifEye\core\Entry\Core\Byte', [1], 1],
                    [0xF003, 'ExifEye\core\Entry\Core\Byte', [2], 2],
                    [0xF004, 'ExifEye\core\Entry\Core\Byte', [253], 253],
                    [0xF005, 'ExifEye\core\Entry\Core\Byte', [254], 254],
                    [0xF006, 'ExifEye\core\Entry\Core\Byte', [255], 255],
                    [0xF007, 'ExifEye\core\Entry\Core\Byte', [0, 1, 2, 253, 254, 255], [0, 1, 2, 253, 254, 255]],
                    [0xF008, 'ExifEye\core\Entry\Core\Byte', [], []],
                ],
            ],
            'PEL SignedByte Read/Write Tests' => [
                [
                    [0xF101, 'ExifEye\core\Entry\Core\SignedByte', [-128], -128],
                    [0xF102, 'ExifEye\core\Entry\Core\SignedByte', [-127], -127],
                    [0xF103, 'ExifEye\core\Entry\Core\SignedByte', [-1], -1],
                    [0xF104, 'ExifEye\core\Entry\Core\SignedByte', [0], 0],
                    [0xF105, 'ExifEye\core\Entry\Core\SignedByte', [1], 1],
                    [0xF106, 'ExifEye\core\Entry\Core\SignedByte', [126], 126],
                    [0xF107, 'ExifEye\core\Entry\Core\SignedByte', [127], 127],
                    [0xF108, 'ExifEye\core\Entry\Core\SignedByte', [-128, -1, 0, 1, 127], [-128, -1, 0, 1, 127]],
                    [0xF109, 'ExifEye\core\Entry\Core\SignedByte', [], []],
                ],
            ],
            'PEL Short Read/Write Tests' => [
                [
                    [0xF201, 'ExifEye\core\Entry\Core\Short', [0], 0],
                    [0xF202, 'ExifEye\core\Entry\Core\Short', [1], 1],
                    [0xF203, 'ExifEye\core\Entry\Core\Short', [2], 2],
                    [0xF204, 'ExifEye\core\Entry\Core\Short', [65533], 65533],
                    [0xF205, 'ExifEye\core\Entry\Core\Short', [65534], 65534],
                    [0xF206, 'ExifEye\core\Entry\Core\Short', [65535], 65535],
                    [0xF207, 'ExifEye\core\Entry\Core\Short', [0, 1, 65534, 65535], [0, 1, 65534, 65535]],
                    [0xF208, 'ExifEye\core\Entry\Core\Short', [], []],
                ],
            ],
            'PEL SignedShort Read/Write Tests' => [
                [
                    [0xF301, 'ExifEye\core\Entry\Core\SignedShort', [-32768], -32768],
                    [0xF302, 'ExifEye\core\Entry\Core\SignedShort', [-32767], -32767],
                    [0xF303, 'ExifEye\core\Entry\Core\SignedShort', [-1], -1],
                    [0xF304, 'ExifEye\core\Entry\Core\SignedShort', [0], 0],
                    [0xF305, 'ExifEye\core\Entry\Core\SignedShort', [1], 1],
                    [0xF306, 'ExifEye\core\Entry\Core\SignedShort', [32766], 32766],
                    [0xF307, 'ExifEye\core\Entry\Core\SignedShort', [32767], 32767],
                    [0xF308, 'ExifEye\core\Entry\Core\SignedShort', [- 32768, - 1, 0, 1, 32767], [- 32768, - 1, 0, 1, 32767]],
                    [0xF309, 'ExifEye\core\Entry\Core\SignedShort', [], []],
                ],
            ],
            'PEL Long Read/Write Tests' => [
                [
                    [0xF401, 'ExifEye\core\Entry\Core\Long', [0], 0],
                    [0xF402, 'ExifEye\core\Entry\Core\Long', [1], 1],
                    [0xF403, 'ExifEye\core\Entry\Core\Long', [2], 2],
                    [0xF404, 'ExifEye\core\Entry\Core\Long', [4294967293], 4294967293],
                    [0xF405, 'ExifEye\core\Entry\Core\Long', [4294967294], 4294967294],
                    [0xF406, 'ExifEye\core\Entry\Core\Long', [4294967295], 4294967295],
                    [0xF407, 'ExifEye\core\Entry\Core\Long', [0, 1, 4294967295], [0, 1, 4294967295]],
                    [0xF408, 'ExifEye\core\Entry\Core\Long', [], []],
                ],
            ],
            'PEL SLong Read/Write Tests' => [
                [
                    [0xF501, 'ExifEye\core\Entry\Core\SignedLong', [-2147483648], -2147483648],
                    [0xF502, 'ExifEye\core\Entry\Core\SignedLong', [-2147483647], -2147483647],
                    [0xF503, 'ExifEye\core\Entry\Core\SignedLong', [-1], -1],
                    [0xF504, 'ExifEye\core\Entry\Core\SignedLong', [0], 0],
                    [0xF505, 'ExifEye\core\Entry\Core\SignedLong', [1], 1],
                    [0xF506, 'ExifEye\core\Entry\Core\SignedLong', [2147483646], 2147483646],
                    [0xF507, 'ExifEye\core\Entry\Core\SignedLong', [2147483647], 2147483647],
                    [0xF508, 'ExifEye\core\Entry\Core\SignedLong', [-2147483648, 0, 2147483647], [-2147483648, 0, 2147483647]],
                    [0xF509, 'ExifEye\core\Entry\Core\SignedLong', [], []],
                ],
            ],
            'PEL Ascii Read/Write Tests' => [
                [
                    [0xF601, 'ExifEye\core\Entry\Core\Ascii', [], ''],
                    [0xF602, 'ExifEye\core\Entry\Core\Ascii', [''], ''],
                    [0xF603, 'ExifEye\core\Entry\Core\Ascii', ['Hello World!'], 'Hello World!'],
                    [0xF604, 'ExifEye\core\Entry\Core\Ascii', ["\x00\x01\x02...\xFD\xFE\xFF"], "\x00\x01\x02...\xFD\xFE\xFF"],  // xx for some reason this generates data window overflow
                ],
            ],
        ];
    }
}
