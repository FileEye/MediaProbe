<?php

namespace ExifEye\Test\core;

use ExifEye\core\Block\Exif;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tag;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Entry\Ascii;
use ExifEye\core\Entry\Byte;
use ExifEye\core\Entry\Long;
use ExifEye\core\Entry\Short;
use ExifEye\core\Entry\SignedByte;
use ExifEye\core\Entry\SignedLong;
use ExifEye\core\Entry\SignedShort;
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
            $tag = new Tag($entry->getIfdType(), $entry->getId(), $entry->getFormat(), $entry->getComponents(), null/* xx */);
            $ifd->xxAddSubBlock($tag);
            $tag->xxAddEntry($entry);
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
            $ifdEntry = $ifd->getEntry($entry->getId());
            if ($ifdEntry->getFormat() == Format::ASCII) {
                $ifdValue = $ifd->getEntry($entry->getId())->getValue();
                $entryValue = $entry->getValue();
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
                $this->assertEquals($ifdEntry->getValue(), $entry->getValue());
            }
        }

        unlink('test-output.jpg');
    }

    public function writeEntryProvider()
    {
        return [
            'PEL Byte Read/Write Tests' => [
                [
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF001, [0]),
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF002, [1]),
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF003, [2]),
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF004, [253]),
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF005, [254]),
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF006, [255]),
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF007, [0, 1, 2, 253, 254, 255]),
                    new Byte(Spec::getIfdIdByType('IFD0'), 0xF008, []),
                ],
            ],
            'PEL SByte Read/Write Tests' => [
                [
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF101, [-128]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF102, [-127]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF103, [-1]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF104, [0]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF105, [1]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF106, [126]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF107, [127]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF108, [-128, -1, 0, 1, 127]),
                    new SignedByte(Spec::getIfdIdByType('IFD0'), 0xF109, []),
                ],
            ],
            'PEL Short Read/Write Tests' => [
                [
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF201, [0]),
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF202, [1]),
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF203, [2]),
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF204, [65533]),
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF205, [65534]),
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF206, [65535]),
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF208, [0, 1, 65534, 65535]),
                    new Short(Spec::getIfdIdByType('IFD0'), 0xF209, []),
                ],
            ],
            'PEL SShort Read/Write Tests' => [
                [
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF301, [-32768]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF302, [-32767]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF303, [-1]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF304, [0]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF305, [1]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF306, [32766]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF307, [32767]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF308, [- 32768, - 1, 0, 1, 32767]),
                    new SignedShort(Spec::getIfdIdByType('IFD0'), 0xF309, []),
                ],
            ],
            'PEL Long Read/Write Tests' => [
                [
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF401, [0]),
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF402, [1]),
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF403, [2]),
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF404, [4294967293]),
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF405, [4294967294]),
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF406, [4294967295]),
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF408, [0, 1, 4294967295]),
                    new Long(Spec::getIfdIdByType('IFD0'), 0xF409, []),
                ],
            ],
            'PEL SLong Read/Write Tests' => [
                [
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF501, [-2147483648]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF502, [-2147483647]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF503, [-1]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF504, [0]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF505, [1]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF506, [2147483646]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF507, [2147483647]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF508, [-2147483648, 0, 2147483647]),
                    new SignedLong(Spec::getIfdIdByType('IFD0'), 0xF509, []),
                ],
            ],
            'PEL Ascii Read/Write Tests' => [
                [
                    new Ascii(Spec::getIfdIdByType('IFD0'), 0xF601, []),
                    new Ascii(Spec::getIfdIdByType('IFD0'), 0xF602, ['']),
                    new Ascii(Spec::getIfdIdByType('IFD0'), 0xF603, ['Hello World!']),
                    new Ascii(Spec::getIfdIdByType('IFD0'), 0xF604, ["\x00\x01\x02...\xFD\xFE\xFF"]),
                ],
            ],
        ];
    }
}
