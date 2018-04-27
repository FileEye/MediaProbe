<?php

namespace ExifEye\Test\core;

use ExifEye\core\Utility\ConvertBytes;

class ConvertTest extends ExifEyeTestCaseBase
{

    private $bytes = "\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF";

    public function testLongLittle()
    {
        $o = ConvertBytes::LITTLE_ENDIAN;

        $this->assertEquals(ConvertBytes::toLong($this->bytes, 0, $o), 0x00000000);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 1, $o), 0x01000000);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 2, $o), 0x23010000);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 3, $o), 0x45230100);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 4, $o), 0x67452301);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 5, $o), 0x89674523);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 6, $o), 0xAB896745);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 7, $o), 0xCDAB8967);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 8, $o), 0xEFCDAB89);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 9, $o), 0xFFEFCDAB);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 10, $o), 0xFFFFEFCD);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 11, $o), 0xFFFFFFEF);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 12, $o), 0xFFFFFFFF);
    }

    public function testLongBig()
    {
        $o = ConvertBytes::BIG_ENDIAN;

        $this->assertEquals(ConvertBytes::toLong($this->bytes, 0, $o), 0x00000000);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 1, $o), 0x00000001);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 2, $o), 0x00000123);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 3, $o), 0x00012345);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 4, $o), 0x01234567);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 5, $o), 0x23456789);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 6, $o), 0x456789AB);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 7, $o), 0x6789ABCD);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 8, $o), 0x89ABCDEF);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 9, $o), 0xABCDEFFF);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 10, $o), 0xCDEFFFFF);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 11, $o), 0xEFFFFFFF);
        $this->assertEquals(ConvertBytes::toLong($this->bytes, 12, $o), 0xFFFFFFFF);
    }

    public function testSignedLongLittle()
    {
        $o = ConvertBytes::LITTLE_ENDIAN;

        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 0, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 1, $o), 16777216);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 2, $o), 587268096);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 3, $o), 1159921920);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 4, $o), 1732584193);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 5, $o), -1989720797);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 6, $o), 0xAB << 24 | 0x89 << 16 | 0x67 << 8 | 0x45);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 7, $o), 0xCD << 24 | 0xAB << 16 | 0x89 << 8 | 0x67);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 8, $o), 0xEF << 24 | 0xCD << 16 | 0xAB << 8 | 0x89);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 9, $o), 0xFF << 24 | 0xEF << 16 | 0xCD << 8 | 0xAB);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 10, $o), 0xFF << 24 | 0xFF << 16 | 0xEF << 8 | 0xCD);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 11, $o), 0xFF << 24 | 0xFF << 16 | 0xFF << 8 | 0xEF);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 12, $o), 0xFF << 24 | 0xFF << 16 | 0xFF << 8 | 0xFF);
    }

    public function testSignedLongBig()
    {
        $o = ConvertBytes::BIG_ENDIAN;

        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 0, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 1, $o), 1);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 2, $o), 291);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 3, $o), 74565);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 4, $o), 19088743);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 5, $o), 591751049);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 6, $o), 1164413355);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 7, $o), 1737075661);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 8, $o), -1985229329);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 9, $o), -1412567041);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 10, $o), -839909377);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 11, $o), -268435457);
        $this->assertEquals(ConvertBytes::toSignedLong($this->bytes, 12, $o), -1);
    }

    public function testShortLittle()
    {
        $o = ConvertBytes::LITTLE_ENDIAN;

        $this->assertEquals(ConvertBytes::toShort($this->bytes, 0, $o), 0x0000);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 1, $o), 0x0000);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 2, $o), 0x0000);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 3, $o), 0x0100);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 4, $o), 0x2301);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 5, $o), 0x4523);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 6, $o), 0x6745);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 7, $o), 0x8967);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 8, $o), 0xAB89);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 9, $o), 0xCDAB);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 10, $o), 0xEFCD);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 11, $o), 0xFFEF);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 12, $o), 0xFFFF);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 13, $o), 0xFFFF);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 14, $o), 0xFFFF);
    }

    public function testShortBig()
    {
        $o = ConvertBytes::BIG_ENDIAN;

        $this->assertEquals(ConvertBytes::toShort($this->bytes, 0, $o), 0x0000);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 1, $o), 0x0000);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 2, $o), 0x0000);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 3, $o), 0x0001);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 4, $o), 0x0123);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 5, $o), 0x2345);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 6, $o), 0x4567);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 7, $o), 0x6789);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 8, $o), 0x89AB);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 9, $o), 0xABCD);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 10, $o), 0xCDEF);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 11, $o), 0xEFFF);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 12, $o), 0xFFFF);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 13, $o), 0xFFFF);
        $this->assertEquals(ConvertBytes::toShort($this->bytes, 14, $o), 0xFFFF);
    }

    public function testSignedShortLittle()
    {
        $o = ConvertBytes::LITTLE_ENDIAN;

        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 0, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 1, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 2, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 3, $o), 256);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 4, $o), 8961);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 5, $o), 17699);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 6, $o), 26437);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 7, $o), -30361);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 8, $o), -21623);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 9, $o), -12885);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 10, $o), -4147);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 11, $o), -17);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 12, $o), -1);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 13, $o), -1);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 14, $o), -1);
    }

    public function testSignedShortBig()
    {
        $o = ConvertBytes::BIG_ENDIAN;

        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 0, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 1, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 2, $o), 0);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 3, $o), 1);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 4, $o), 291);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 5, $o), 9029);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 6, $o), 17767);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 7, $o), 26505);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 8, $o), -30293);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 9, $o), -21555);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 10, $o), -12817);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 11, $o), -4097);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 12, $o), -1);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 13, $o), -1);
        $this->assertEquals(ConvertBytes::toSignedShort($this->bytes, 14, $o), -1);
    }

    public function testByte()
    {
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 0), 0x00);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 1), 0x00);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 2), 0x00);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 3), 0x00);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 4), 0x01);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 5), 0x23);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 6), 0x45);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 7), 0x67);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 8), 0x89);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 9), 0xAB);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 10), 0xCD);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 11), 0xEF);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 12), 0xFF);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 13), 0xFF);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 14), 0xFF);
        $this->assertEquals(ConvertBytes::toByte($this->bytes, 15), 0xFF);
    }

    public function testSignedByte()
    {
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 0), 0);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 1), 0);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 2), 0);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 3), 0);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 4), 1);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 5), 35);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 6), 69);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 7), 103);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 8), -119);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 9), -85);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 10), -51);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 11), -17);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 12), -1);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 13), -1);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 14), -1);
        $this->assertEquals(ConvertBytes::toSignedByte($this->bytes, 15), -1);
    }
}
