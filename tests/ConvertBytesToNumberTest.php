<?php
// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Utility\ConvertBytes;

class ConvertBytesToNumberTest extends MediaProbeTestCaseBase
{
    public function testLong64Little()
    {
        $this->assertSame(                   '0', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   '72057594037927936', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(                   '1', ConvertBytes::toLong64("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( '2522297266304188416', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(                 '291', ConvertBytes::toLong64("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( '4981826712313528320', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( '7441392446501552128', ConvertBytes::toLong64("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( '9900958322440273920', ConvertBytes::toLong64("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('12360524198932709376', ConvertBytes::toLong64("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('14820090075427307776', ConvertBytes::toLong64("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('17279655951921914625', ConvertBytes::toLong64("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('18442185135733818659', ConvertBytes::toLong64("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('18446726265358083909', ConvertBytes::toLong64("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        try {
            ConvertBytes::toLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
        try {
            ConvertBytes::toLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF\xAA\x00", ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
    }

    public function testLong64Big()
    {
        $this->assertSame(                   '0', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(                   '1', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   '72057594037927936', ConvertBytes::toLong64("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(                 '291', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( '2522297266304188416', ConvertBytes::toLong64("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(               '74565', ConvertBytes::toLong64("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(            '19088743', ConvertBytes::toLong64("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(          '4886718345', ConvertBytes::toLong64("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(       '1250999896491', ConvertBytes::toLong64("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     '320255973501901', ConvertBytes::toLong64("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   '81985529216486895', ConvertBytes::toLong64("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( '2541551405711093759', ConvertBytes::toLong64("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( '5001117282205695999', ConvertBytes::toLong64("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        try {
            ConvertBytes::toLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
        try {
            ConvertBytes::toLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF\xAA\x00", ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
    }

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
        $this->expectException(\InvalidArgumentException::class);
        ConvertBytes::toLong("\xFF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN);
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
        $this->expectException(\InvalidArgumentException::class);
        ConvertBytes::toLong("\xFF\xFF\xFF", ConvertBytes::BIG_ENDIAN);
    }

    public function testSignedLong64Little()
    {
        $this->assertSame(                   '0', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   '72057594037927936', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(                   '1', ConvertBytes::toSignedLong64("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( '2522297266304188416', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(                 '291', ConvertBytes::toSignedLong64("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( '4981826712313528320', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame( '7441392446501552128', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('-8545785751269277696', ConvertBytes::toSignedLong64("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('-6086219874776842240', ConvertBytes::toSignedLong64("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('-3626653998282243840', ConvertBytes::toSignedLong64("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame('-1167088121787636991', ConvertBytes::toSignedLong64("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(   '-4558937975732957', ConvertBytes::toSignedLong64("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(     '-17808351467707', ConvertBytes::toSignedLong64("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame(     '-17808351467521', ConvertBytes::toSignedLong64("\xFF\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN));
        try {
            ConvertBytes::toSignedLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
        try {
            ConvertBytes::toSignedLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF\xAA\x00", ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
    }

    public function testSignedLong64Big()
    {
        $this->assertSame(                   '0', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(                   '1', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   '72057594037927936', ConvertBytes::toSignedLong64("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(                 '291', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( '2522297266304188416', ConvertBytes::toSignedLong64("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(               '74565', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(            '19088743', ConvertBytes::toSignedLong64("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(          '4886718345', ConvertBytes::toSignedLong64("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(       '1250999896491', ConvertBytes::toSignedLong64("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(     '320255973501901', ConvertBytes::toSignedLong64("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(   '81985529216486895', ConvertBytes::toSignedLong64("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( '2541551405711093759', ConvertBytes::toSignedLong64("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame( '5001117282205695999', ConvertBytes::toSignedLong64("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        $this->assertSame(  '-42914300449259521', ConvertBytes::toSignedLong64("\xFF\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::BIG_ENDIAN));
        try {
            ConvertBytes::toSignedLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
        try {
            ConvertBytes::toSignedLong64("\x67\x89\xAB\xCD\xEF\xFF\xFF\xAA\x00", ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected \\InvalidArgumentException');
        } catch (\InvalidArgumentException) {
            // Continue.
        }
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
        $this->expectException(\InvalidArgumentException::class);
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
        $this->expectException(\InvalidArgumentException::class);
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
        $this->expectException(\InvalidArgumentException::class);
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
        $this->expectException(\InvalidArgumentException::class);
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
        $this->expectException(\InvalidArgumentException::class);
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
        $this->expectException(\InvalidArgumentException::class);
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
        $this->expectException(\InvalidArgumentException::class);
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
        $this->expectException(\InvalidArgumentException::class);
        ConvertBytes::toSignedByte("");
    }
}
