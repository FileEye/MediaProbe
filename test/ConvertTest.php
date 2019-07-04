<?php
// @codingStandardsIgnoreFile

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Utility\ConvertBytes;

class ConvertTest extends ImageInfoTestCaseBase
{
    public function testLongLittle()
    {
        $this->assertSame(          0, ConvertBytes::toLong("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   16777216, ConvertBytes::toLong("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(  587268096, ConvertBytes::toLong("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 1159921920, ConvertBytes::toLong("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 1732584193, ConvertBytes::toLong("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 2305246499, ConvertBytes::toLong("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 2877908805, ConvertBytes::toLong("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 3450571111, ConvertBytes::toLong("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 4023233417, ConvertBytes::toLong("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 4293905835, ConvertBytes::toLong("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 4294963149, ConvertBytes::toLong("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 4294967279, ConvertBytes::toLong("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 4294967295, ConvertBytes::toLong("\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toSignedLong("\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN);
    }

    public function testLongBig()
    {
        $this->assertSame(          0, ConvertBytes::toLong("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(          1, ConvertBytes::toLong("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(        291, ConvertBytes::toLong("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(      74565, ConvertBytes::toLong("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   19088743, ConvertBytes::toLong("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(  591751049, ConvertBytes::toLong("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 1164413355, ConvertBytes::toLong("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 1737075661, ConvertBytes::toLong("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 2309737967, ConvertBytes::toLong("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 2882400255, ConvertBytes::toLong("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 3455057919, ConvertBytes::toLong("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 4026531839, ConvertBytes::toLong("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 4294967295, ConvertBytes::toLong("\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toSignedLong("\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN);
    }

    public function testSignedLongLittle()
    {
        $this->assertSame(          0, ConvertBytes::toSignedLong("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   16777216, ConvertBytes::toSignedLong("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(  587268096, ConvertBytes::toSignedLong("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 1159921920, ConvertBytes::toSignedLong("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 1732584193, ConvertBytes::toSignedLong("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(-1989720797, ConvertBytes::toSignedLong("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(-1417058491, ConvertBytes::toSignedLong("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( -844396185, ConvertBytes::toSignedLong("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( -271733879, ConvertBytes::toSignedLong("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   -1061461, ConvertBytes::toSignedLong("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(      -4147, ConvertBytes::toSignedLong("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(        -17, ConvertBytes::toSignedLong("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(         -1, ConvertBytes::toSignedLong("\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toSignedLong("\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN);
    }

    public function testSignedLongBig()
    {
        $this->assertSame(          0, ConvertBytes::toSignedLong("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(          1, ConvertBytes::toSignedLong("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(        291, ConvertBytes::toSignedLong("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(      74565, ConvertBytes::toSignedLong("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   19088743, ConvertBytes::toSignedLong("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(  591751049, ConvertBytes::toSignedLong("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 1164413355, ConvertBytes::toSignedLong("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 1737075661, ConvertBytes::toSignedLong("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(-1985229329, ConvertBytes::toSignedLong("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(-1412567041, ConvertBytes::toSignedLong("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( -839909377, ConvertBytes::toSignedLong("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( -268435457, ConvertBytes::toSignedLong("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(         -1, ConvertBytes::toSignedLong("\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toSignedLong("\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN);
    }

    public function testShortLittle()
    {
        $this->assertSame(     0, ConvertBytes::toShort("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toShort("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toShort("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   256, ConvertBytes::toShort("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(  8961, ConvertBytes::toShort("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 17699, ConvertBytes::toShort("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 26437, ConvertBytes::toShort("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 35175, ConvertBytes::toShort("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 43913, ConvertBytes::toShort("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 52651, ConvertBytes::toShort("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 61389, ConvertBytes::toShort("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 65519, ConvertBytes::toShort("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 65535, ConvertBytes::toShort("\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 65535, ConvertBytes::toShort("\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 65535, ConvertBytes::toShort("\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toShort("\xFF", ConvertBytes::LITTLE_ENDIAN);
    }

    public function testShortBig()
    {
        $this->assertSame(     0, ConvertBytes::toShort("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toShort("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toShort("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     1, ConvertBytes::toShort("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   291, ConvertBytes::toShort("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(  9029, ConvertBytes::toShort("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 17767, ConvertBytes::toShort("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 26505, ConvertBytes::toShort("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 35243, ConvertBytes::toShort("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 43981, ConvertBytes::toShort("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 52719, ConvertBytes::toShort("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 61439, ConvertBytes::toShort("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 65535, ConvertBytes::toShort("\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 65535, ConvertBytes::toShort("\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 65535, ConvertBytes::toShort("\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toShort("\xFF", ConvertBytes::BIG_ENDIAN);
    }

    public function testSignedShortLittle()
    {
        $this->assertSame(     0, ConvertBytes::toSignedShort("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toSignedShort("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toSignedShort("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   256, ConvertBytes::toSignedShort("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(  8961, ConvertBytes::toSignedShort("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 17699, ConvertBytes::toSignedShort("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( 26437, ConvertBytes::toSignedShort("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(-30361, ConvertBytes::toSignedShort("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(-21623, ConvertBytes::toSignedShort("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(-12885, ConvertBytes::toSignedShort("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( -4147, ConvertBytes::toSignedShort("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   -17, ConvertBytes::toSignedShort("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(    -1, ConvertBytes::toSignedShort("\xFF\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(    -1, ConvertBytes::toSignedShort("\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(    -1, ConvertBytes::toSignedShort("\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toSignedShort("\xFF", ConvertBytes::LITTLE_ENDIAN);
    }

    public function testSignedShortBig()
    {
        $this->assertSame(     0, ConvertBytes::toSignedShort("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toSignedShort("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     0, ConvertBytes::toSignedShort("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     1, ConvertBytes::toSignedShort("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   291, ConvertBytes::toSignedShort("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(  9029, ConvertBytes::toSignedShort("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 17767, ConvertBytes::toSignedShort("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( 26505, ConvertBytes::toSignedShort("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(-30293, ConvertBytes::toSignedShort("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(-21555, ConvertBytes::toSignedShort("\xAB\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(-12817, ConvertBytes::toSignedShort("\xCD\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( -4097, ConvertBytes::toSignedShort("\xEF\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(    -1, ConvertBytes::toSignedShort("\xFF\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(    -1, ConvertBytes::toSignedShort("\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(    -1, ConvertBytes::toSignedShort("\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toSignedShort("\xFF", ConvertBytes::BIG_ENDIAN);
    }

    public function testByte()
    {
        $this->assertSame(   0, ConvertBytes::toByte("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   0, ConvertBytes::toByte("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   0, ConvertBytes::toByte("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   0, ConvertBytes::toByte("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   1, ConvertBytes::toByte("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(  35, ConvertBytes::toByte("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(  69, ConvertBytes::toByte("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( 103, ConvertBytes::toByte("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( 137, ConvertBytes::toByte("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( 171, ConvertBytes::toByte("\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( 205, ConvertBytes::toByte("\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( 239, ConvertBytes::toByte("\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( 255, ConvertBytes::toByte("\xFF\xFF\xFF\xFF"));
        $this->assertSame( 255, ConvertBytes::toByte("\xFF\xFF\xFF"));
        $this->assertSame( 255, ConvertBytes::toByte("\xFF\xFF"));
        $this->assertSame( 255, ConvertBytes::toByte("\xFF"));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toByte("");
    }

    public function testSignedByte()
    {
        $this->assertSame(   0, ConvertBytes::toSignedByte("\x00\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   0, ConvertBytes::toSignedByte("\x00\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   0, ConvertBytes::toSignedByte("\x00\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   0, ConvertBytes::toSignedByte("\x00\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(   1, ConvertBytes::toSignedByte("\x01\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(  35, ConvertBytes::toSignedByte("\x23\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(  69, ConvertBytes::toSignedByte("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( 103, ConvertBytes::toSignedByte("\x67\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(-119, ConvertBytes::toSignedByte("\x89\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( -85, ConvertBytes::toSignedByte("\xAB\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( -51, ConvertBytes::toSignedByte("\xCD\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame( -17, ConvertBytes::toSignedByte("\xEF\xFF\xFF\xFF\xFF"));
        $this->assertSame(  -1, ConvertBytes::toSignedByte("\xFF\xFF\xFF\xFF"));
        $this->assertSame(  -1, ConvertBytes::toSignedByte("\xFF\xFF\xFF"));
        $this->assertSame(  -1, ConvertBytes::toSignedByte("\xFF\xFF"));
        $this->assertSame(  -1, ConvertBytes::toSignedByte("\xFF"));
        $this->fcExpectException('InvalidArgumentException');
        ConvertBytes::toSignedByte("");
    }
}
