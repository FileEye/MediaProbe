<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Entry\Byte;
use lsolesen\pel\PelIfd;
use lsolesen\pel\PelTiff;
use lsolesen\pel\PelExif;
use lsolesen\pel\PelJpeg;
use ExifEye\core\Format;
use ExifEye\core\Entry\SignedByte;
use ExifEye\core\Entry\Short;
use ExifEye\core\Entry\SignedShort;
use ExifEye\core\Entry\Long;
use ExifEye\core\Entry\SignedLong;
use ExifEye\core\Entry\Ascii;

class WriteEntryTest extends ExifEyeTestCaseBase
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
        $ifd = new PelIfd(PelIfd::IFD0);
        $this->assertTrue($ifd->isLastIfd());

        foreach ($entries as $entry) {
            $ifd->addEntry($entry);
        }

        $tiff = new PelTiff();
        $this->assertNull($tiff->getIfd());
        $tiff->setIfd($ifd);
        $this->assertNotNull($tiff->getIfd());

        $exif = new PelExif();
        $this->assertNull($exif->getTiff());
        $exif->setTiff($tiff);
        $this->assertNotNull($exif->getTiff());

        $jpeg = new PelJpeg(dirname(__FILE__) . '/images/no-exif.jpg');
        $this->assertNull($jpeg->getExif());
        $jpeg->setExif($exif);
        $this->assertNotNull($jpeg->getExif());

        $jpeg->saveFile('test-output.jpg');
        $this->assertTrue(file_exists('test-output.jpg'));
        $this->assertTrue(filesize('test-output.jpg') > 0);

        /* Now read the file and see if the entries are still there. */
        $jpeg = new PelJpeg('test-output.jpg');

        $exif = $jpeg->getExif();
        $this->assertInstanceOf('lsolesen\pel\PelExif', $exif);

        $tiff = $exif->getTiff();
        $this->assertInstanceOf('lsolesen\pel\PelTiff', $tiff);

        $ifd = $tiff->getIfd();
        $this->assertInstanceOf('lsolesen\pel\PelIfd', $ifd);

        $this->assertEquals($ifd->getType(), PelIfd::IFD0);
        $this->assertTrue($ifd->isLastIfd());

        foreach ($entries as $entry) {
            $ifdEntry = $ifd->getEntry($entry->getTag());
            if ($ifdEntry->getFormat() == Format::ASCII) {
                $ifdValue = $ifd->getEntry($entry->getTag())->getValue();
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
                $this->assertEquals($ifdEntry
                ->getValue(), $entry->getValue());
            }
        }

        unlink('test-output.jpg');
    }

    public function writeEntryProvider()
    {
        return [
            'PEL Byte Read/Write Tests' => [
                [
                    new Byte(0xF001, 0),
                    new Byte(0xF002, 1),
                    new Byte(0xF003, 2),
                    new Byte(0xF004, 253),
                    new Byte(0xF005, 254),
                    new Byte(0xF006, 255),
                    new Byte(0xF007, 0, 1, 2, 253, 254, 255),
                    new Byte(0xF008),
                ],
            ],
            'PEL SByte Read/Write Tests' => [
                [
                    new SignedByte(0xF101, - 128),
                    new SignedByte(0xF102, - 127),
                    new SignedByte(0xF103, - 1),
                    new SignedByte(0xF104, 0),
                    new SignedByte(0xF105, 1),
                    new SignedByte(0xF106, 126),
                    new SignedByte(0xF107, 127),
                    new SignedByte(0xF108, - 128, - 1, 0, 1, 127),
                    new SignedByte(0xF109),
                ],
            ],
            'PEL Short Read/Write Tests' => [
                [
                    new Short(0xF201, 0),
                    new Short(0xF202, 1),
                    new Short(0xF203, 2),
                    new Short(0xF204, 65533),
                    new Short(0xF205, 65534),
                    new Short(0xF206, 65535),
                    new Short(0xF208, 0, 1, 65534, 65535),
                    new Short(0xF209),
                ],
            ],
            'PEL SShort Read/Write Tests' => [
                [
                    new SignedShort(0xF301, - 32768),
                    new SignedShort(0xF302, - 32767),
                    new SignedShort(0xF303, - 1),
                    new SignedShort(0xF304, 0),
                    new SignedShort(0xF305, 1),
                    new SignedShort(0xF306, 32766),
                    new SignedShort(0xF307, 32767),
                    new SignedShort(0xF308, - 32768, - 1, 0, 1, 32767),
                    new SignedShort(0xF309),
                ],
            ],
            'PEL Long Read/Write Tests' => [
                [
                    new Long(0xF401, 0),
                    new Long(0xF402, 1),
                    new Long(0xF403, 2),
                    new Long(0xF404, 4294967293),
                    new Long(0xF405, 4294967294),
                    new Long(0xF406, 4294967295),
                    new Long(0xF408, 0, 1, 4294967295),
                    new Long(0xF409),
                ],
            ],
            'PEL SLong Read/Write Tests' => [
                [
                    new SignedLong(0xF501, - 2147483648),
                    new SignedLong(0xF502, - 2147483647),
                    new SignedLong(0xF503, - 1),
                    new SignedLong(0xF504, 0),
                    new SignedLong(0xF505, 1),
                    new SignedLong(0xF506, 2147483646),
                    new SignedLong(0xF507, 2147483647),
                    new SignedLong(0xF508, - 2147483648, 0, 2147483647),
                    new SignedLong(0xF509),
                ],
            ],
            'PEL Ascii Read/Write Tests' => [
                [
                    new Ascii(0xF601),
                    new Ascii(0xF602, ''),
                    new Ascii(0xF603, 'Hello World!'),
                    new Ascii(0xF604, "\x00\x01\x02...\xFD\xFE\xFF"),
                ],
            ],
        ];
    }
}
