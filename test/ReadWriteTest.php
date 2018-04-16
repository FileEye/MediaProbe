<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
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

class ReadWriteTest extends ExifEyeTestCaseBase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        ExifEye::setStrictParsing(true);
    }

    /**
     * @dataProvider writeEntryProvider
     */
    public function testWriteRead(array $entries)
    {
        $ifd = new Ifd(Spec::getIfdIdByType('IFD0'));
        $this->assertTrue($ifd->isLastIfd());

        foreach ($entries as $entry) {
            $ifd->xxAppendSubBlock(new Tag($ifd->getType(), $entry[0], $entry[1], $entry[1]->getFormat(), $entry[1]->getComponents()));
        }

        $tiff = new Tiff();
        $this->assertNull($tiff->getIfd());
        $tiff->setIfd($ifd);
        $this->assertNotNull($tiff->getIfd());

        $exif = new Exif();
        $this->assertNull($exif->getTiff());
        $exif->setTiff($tiff);
        $this->assertNotNull($exif->getTiff());

        $jpeg = new Jpeg(dirname(__FILE__) . '/images/no-exif.jpg');
        $this->assertNull($jpeg->getExif());
        $jpeg->setExif($exif);
        $this->assertNotNull($jpeg->getExif());

        $jpeg->saveFile('test-output.jpg');
        $this->assertTrue(file_exists('test-output.jpg'));
        $this->assertTrue(filesize('test-output.jpg') > 0);

        /* Now read the file and see if the entries are still there. */
        $jpeg = new Jpeg('test-output.jpg');

        $exif = $jpeg->getExif();
        $this->assertInstanceOf('ExifEye\core\Block\Exif', $exif);

        $tiff = $exif->getTiff();
        $this->assertInstanceOf('ExifEye\core\Block\Tiff', $tiff);

        $ifd = $tiff->getIfd();
        $this->assertInstanceOf('ExifEye\core\Block\Ifd', $ifd);

        $this->assertEquals($ifd->getType(), Spec::getIfdIdByType('IFD0'));
        $this->assertTrue($ifd->isLastIfd());

        foreach ($entries as $entry) {
            $ifdTag = $ifd->xxGetTagById($entry[0]);
            $ifdEntry = $ifdTag->getEntry();
            if ($ifdEntry->getFormat() == Format::ASCII) {
                $ifdValue = $ifdTag->getEntry()->getValue();
                $entryValue = $entry[1]->getValue();
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
                $this->assertEquals($ifdTag->getEntry()->getValue(), $entry[1]->getValue());
            }
        }

        unlink('test-output.jpg');
    }

    public function writeEntryProvider()
    {
        return [
            'PEL Byte Read/Write Tests' => [
                [
                    [0xF001, new Byte([0])],
                    [0xF002, new Byte([1])],
                    [0xF003, new Byte([2])],
                    [0xF004, new Byte([253])],
                    [0xF005, new Byte([254])],
                    [0xF006, new Byte([255])],
                    [0xF007, new Byte([0, 1, 2, 253, 254, 255])],
                    [0xF008, new Byte([])],
                ],
            ],
            'PEL SignedByte Read/Write Tests' => [
                [
                    [0xF101, new SignedByte([-128])],
                    [0xF102, new SignedByte([-127])],
                    [0xF103, new SignedByte([-1])],
                    [0xF104, new SignedByte([0])],
                    [0xF105, new SignedByte([1])],
                    [0xF106, new SignedByte([126])],
                    [0xF107, new SignedByte([127])],
                    [0xF108, new SignedByte([-128, -1, 0, 1, 127])],
                    [0xF109, new SignedByte([])],
                ],
            ],
            'PEL Short Read/Write Tests' => [
                [
                    [0xF201, new Short([0])],
                    [0xF202, new Short([1])],
                    [0xF203, new Short([2])],
                    [0xF204, new Short([65533])],
                    [0xF205, new Short([65534])],
                    [0xF206, new Short([65535])],
                    [0xF207, new Short([0, 1, 65534, 65535])],
                    [0xF208, new Short([])],
                ],
            ],
            'PEL SignedShort Read/Write Tests' => [
                [
                    [0xF301, new SignedShort([-32768])],
                    [0xF302, new SignedShort([-32767])],
                    [0xF303, new SignedShort([-1])],
                    [0xF304, new SignedShort([0])],
                    [0xF305, new SignedShort([1])],
                    [0xF306, new SignedShort([32766])],
                    [0xF307, new SignedShort([32767])],
                    [0xF308, new SignedShort([- 32768, - 1, 0, 1, 32767])],
                    [0xF309, new SignedShort([])],
                ],
            ],
            'PEL Long Read/Write Tests' => [
                [
                    [0xF401, new Long([0])],
                    [0xF402, new Long([1])],
                    [0xF403, new Long([2])],
                    [0xF404, new Long([4294967293])],
                    [0xF405, new Long([4294967294])],
                    [0xF406, new Long([4294967295])],
                    [0xF407, new Long([0, 1, 4294967295])],
                    [0xF408, new Long([])],
                ],
            ],
            'PEL SLong Read/Write Tests' => [
                [
                    [0xF501, new SignedLong([-2147483648])],
                    [0xF502, new SignedLong([-2147483647])],
                    [0xF503, new SignedLong([-1])],
                    [0xF504, new SignedLong([0])],
                    [0xF505, new SignedLong([1])],
                    [0xF506, new SignedLong([2147483646])],
                    [0xF507, new SignedLong([2147483647])],
                    [0xF508, new SignedLong([-2147483648, 0, 2147483647])],
                    [0xF509, new SignedLong([])],
                ],
            ],
            'PEL Ascii Read/Write Tests' => [
                [
                    [0xF601, new Ascii([])],
                    [0xF602, new Ascii([''])],
                    [0xF603, new Ascii(['Hello World!'])],
                    [0xF604, new Ascii(["\x00\x01\x02...\xFD\xFE\xFF"])],  // xx for some reason this generates data window overflow
                ],
            ],
        ];
    }
}
