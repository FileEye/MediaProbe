<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Utility\ConvertBytes;

class ConvertBytesFromNumberTest extends MediaProbeTestCaseBase
{
    public function testLong64Little()
    {
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromLong64('0', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::fromLong64('72057594037927936', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromLong64('1', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::fromLong64('2522297266304188416', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::fromLong64('291', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::fromLong64('4981826712313528320', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::fromLong64('7441392446501552128', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::fromLong64('9900958322440273920', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::fromLong64('12360524198932709376', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::fromLong64('14820090075427307776', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::fromLong64('17279655951921914625', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::fromLong64('18442185135733818659', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::fromLong64('18446726265358083909', ConvertBytes::LITTLE_ENDIAN));
        try {
            ConvertBytes::fromLong64('-1', ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromLong64(bcadd('18446744073709551615', '1'), ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testLong64Big()
    {
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromLong64('0', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::fromLong64('1', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromLong64('72057594037927936', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::fromLong64('291', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::fromLong64('2522297266304188416', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::fromLong64('74565', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::fromLong64('19088743', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::fromLong64('4886718345', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::fromLong64('1250999896491', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::fromLong64('320255973501901', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::fromLong64('81985529216486895', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::fromLong64('2541551405711093759', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::fromLong64('5001117282205695999', ConvertBytes::BIG_ENDIAN));
        try {
            ConvertBytes::fromLong64('-1', ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromLong64(bcadd('18446744073709551615', '1'), ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testLongLittle()
    {
        $this->assertSame("\x00\x00\x00\x00", ConvertBytes::fromLong(0, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01", ConvertBytes::fromLong(16777216, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23", ConvertBytes::fromLong(587268096, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45", ConvertBytes::fromLong(1159921920, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67", ConvertBytes::fromLong(1732584193, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89", ConvertBytes::fromLong(2305246499, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB", ConvertBytes::fromLong(2877908805, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x67\x89\xAB\xCD", ConvertBytes::fromLong(3450571111, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x89\xAB\xCD\xEF", ConvertBytes::fromLong(4023233417, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xAB\xCD\xEF\xFF", ConvertBytes::fromLong(4293905835, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xCD\xEF\xFF\xFF", ConvertBytes::fromLong(4294963149, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xEF\xFF\xFF\xFF", ConvertBytes::fromLong(4294967279, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xFF\xFF\xFF\xFF", ConvertBytes::fromLong(4294967295, ConvertBytes::LITTLE_ENDIAN));
        $this->expectException(DataException::class);
        ConvertBytes::fromLong(-1, ConvertBytes::LITTLE_ENDIAN);
    }

    public function testLongBig()
    {
        $this->assertSame("\x00\x00\x00\x00", ConvertBytes::fromLong(0, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01", ConvertBytes::fromLong(1, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23", ConvertBytes::fromLong(291, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45", ConvertBytes::fromLong(74565, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67", ConvertBytes::fromLong(19088743, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89", ConvertBytes::fromLong(591751049, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB", ConvertBytes::fromLong(1164413355, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x67\x89\xAB\xCD", ConvertBytes::fromLong(1737075661, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x89\xAB\xCD\xEF", ConvertBytes::fromLong(2309737967, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xAB\xCD\xEF\xFF", ConvertBytes::fromLong(2882400255, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xCD\xEF\xFF\xFF", ConvertBytes::fromLong(3455057919, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xEF\xFF\xFF\xFF", ConvertBytes::fromLong(4026531839, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xFF\xFF\xFF\xFF", ConvertBytes::fromLong(4294967295, ConvertBytes::BIG_ENDIAN));
        $this->expectException(DataException::class);
        ConvertBytes::fromLong(-1, ConvertBytes::BIG_ENDIAN);
    }

    public function testSignedLong64Little()
    {
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromSignedLong64('0', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::fromSignedLong64('72057594037927936', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromSignedLong64('1', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::fromSignedLong64('2522297266304188416', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::fromSignedLong64('291', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::fromSignedLong64('4981826712313528320', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::fromSignedLong64('7441392446501552128', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::fromSignedLong64('-8545785751269277696', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::fromSignedLong64('-6086219874776842240', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::fromSignedLong64('-3626653998282243840', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::fromSignedLong64('-1167088121787636991', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::fromSignedLong64('-4558937975732957', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::fromSignedLong64('-17808351467707', ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xFF\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::fromSignedLong64('-17808351467521', ConvertBytes::LITTLE_ENDIAN));
        try {
            ConvertBytes::fromSignedLong64(bcsub('-9223372036854775808', '1'), ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromSignedLong64(bcadd('9223372036854775807', '1'), ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testSignedLong64Big()
    {
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromSignedLong64('0', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x00\x01", ConvertBytes::fromSignedLong64('1', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x00\x00\x00\x00\x00\x00\x00", ConvertBytes::fromSignedLong64('72057594037927936', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x00\x01\x23", ConvertBytes::fromSignedLong64('291', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x01\x00\x00\x00\x00\x00\x00", ConvertBytes::fromSignedLong64('2522297266304188416', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x00\x01\x23\x45", ConvertBytes::fromSignedLong64('74565', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x00\x01\x23\x45\x67", ConvertBytes::fromSignedLong64('19088743', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01\x23\x45\x67\x89", ConvertBytes::fromSignedLong64('4886718345', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23\x45\x67\x89\xAB", ConvertBytes::fromSignedLong64('1250999896491', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45\x67\x89\xAB\xCD", ConvertBytes::fromSignedLong64('320255973501901', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67\x89\xAB\xCD\xEF", ConvertBytes::fromSignedLong64('81985529216486895', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89\xAB\xCD\xEF\xFF", ConvertBytes::fromSignedLong64('2541551405711093759', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::fromSignedLong64('5001117282205695999', ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xFF\x67\x89\xAB\xCD\xEF\xFF\xFF", ConvertBytes::fromSignedLong64('-42914300449259521', ConvertBytes::BIG_ENDIAN));
        try {
            ConvertBytes::fromSignedLong64(bcsub('-9223372036854775808', '1'), ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromSignedLong64(bcadd('9223372036854775807', '1'), ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testSignedLongLittle()
    {
        $this->assertSame("\x00\x00\x00\x00", ConvertBytes::fromSignedLong(0, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01", ConvertBytes::fromSignedLong(16777216, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23", ConvertBytes::fromSignedLong(587268096, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45", ConvertBytes::fromSignedLong(1159921920, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67", ConvertBytes::fromSignedLong(1732584193, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89", ConvertBytes::fromSignedLong(-1989720797, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB", ConvertBytes::fromSignedLong(-1417058491, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x67\x89\xAB\xCD", ConvertBytes::fromSignedLong(-844396185, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x89\xAB\xCD\xEF", ConvertBytes::fromSignedLong(-271733879, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xAB\xCD\xEF\xFF", ConvertBytes::fromSignedLong(-1061461, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xCD\xEF\xFF\xFF", ConvertBytes::fromSignedLong(-4147, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xEF\xFF\xFF\xFF", ConvertBytes::fromSignedLong(-17, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xFF\xFF\xFF\xFF", ConvertBytes::fromSignedLong(-1, ConvertBytes::LITTLE_ENDIAN));
    }

    public function testSignedLongBig()
    {
        $this->assertSame("\x00\x00\x00\x00", ConvertBytes::fromSignedLong(0, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x00\x01", ConvertBytes::fromSignedLong(1, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x00\x01\x23", ConvertBytes::fromSignedLong(291, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x01\x23\x45", ConvertBytes::fromSignedLong(74565, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x23\x45\x67", ConvertBytes::fromSignedLong(19088743, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x45\x67\x89", ConvertBytes::fromSignedLong(591751049, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x45\x67\x89\xAB", ConvertBytes::fromSignedLong(1164413355, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x67\x89\xAB\xCD", ConvertBytes::fromSignedLong(1737075661, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x89\xAB\xCD\xEF", ConvertBytes::fromSignedLong(-1985229329, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xAB\xCD\xEF\xFF", ConvertBytes::fromSignedLong(-1412567041, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xCD\xEF\xFF\xFF", ConvertBytes::fromSignedLong(-839909377, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xEF\xFF\xFF\xFF", ConvertBytes::fromSignedLong(-268435457, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xFF\xFF\xFF\xFF", ConvertBytes::fromSignedLong(-1, ConvertBytes::BIG_ENDIAN));
    }

    public function testShortLittle()
    {
        $this->assertSame("\x00\x00", ConvertBytes::fromShort(0, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x01", ConvertBytes::fromShort(256, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x23", ConvertBytes::fromShort(8961, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x45", ConvertBytes::fromShort(17699, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x45\x67", ConvertBytes::fromShort(26437, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x67\x89", ConvertBytes::fromShort(35175, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x89\xAB", ConvertBytes::fromShort(43913, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xAB\xCD", ConvertBytes::fromShort(52651, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xCD\xEF", ConvertBytes::fromShort(61389, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xEF\xFF", ConvertBytes::fromShort(65519, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xFF\xFF", ConvertBytes::fromShort(65535, ConvertBytes::LITTLE_ENDIAN));
        try {
            ConvertBytes::fromShort(-1, ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromShort(\PHP_INT_MAX, ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testShortBig()
    {
        $this->assertSame("\x00\x00", ConvertBytes::fromShort(0, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x01", ConvertBytes::fromShort(1, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x23", ConvertBytes::fromShort(291, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x45", ConvertBytes::fromShort(9029, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x45\x67", ConvertBytes::fromShort(17767, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x67\x89", ConvertBytes::fromShort(26505, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x89\xAB", ConvertBytes::fromShort(35243, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xAB\xCD", ConvertBytes::fromShort(43981, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xCD\xEF", ConvertBytes::fromShort(52719, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xEF\xFF", ConvertBytes::fromShort(61439, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xFF\xFF", ConvertBytes::fromShort(65535, ConvertBytes::BIG_ENDIAN));
        try {
            ConvertBytes::fromShort(-1, ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromShort(\PHP_INT_MAX, ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testSignedShortLittle()
    {
        $this->assertSame("\x00\x00", ConvertBytes::fromSignedShort(0, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x00\x01", ConvertBytes::fromSignedShort(256, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x01\x23", ConvertBytes::fromSignedShort(8961, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x23\x45", ConvertBytes::fromSignedShort(17699, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x45\x67", ConvertBytes::fromSignedShort(26437, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x67\x89", ConvertBytes::fromSignedShort(-30361, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\x89\xAB", ConvertBytes::fromSignedShort(-21623, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xAB\xCD", ConvertBytes::fromSignedShort(-12885, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xCD\xEF", ConvertBytes::fromSignedShort(-4147, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xEF\xFF", ConvertBytes::fromSignedShort(-17, ConvertBytes::LITTLE_ENDIAN));
        $this->assertSame("\xFF\xFF", ConvertBytes::fromSignedShort(-1, ConvertBytes::LITTLE_ENDIAN));
        try {
            ConvertBytes::fromSignedShort(-\PHP_INT_MAX, ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromSignedShort(\PHP_INT_MAX, ConvertBytes::LITTLE_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testSignedShortBig()
    {
        $this->assertSame("\x00\x00", ConvertBytes::fromSignedShort(0, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x00\x01", ConvertBytes::fromSignedShort(1, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x01\x23", ConvertBytes::fromSignedShort(291, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x23\x45", ConvertBytes::fromSignedShort(9029, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x45\x67", ConvertBytes::fromSignedShort(17767, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x67\x89", ConvertBytes::fromSignedShort(26505, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\x89\xAB", ConvertBytes::fromSignedShort(-30293, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xAB\xCD", ConvertBytes::fromSignedShort(-21555, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xCD\xEF", ConvertBytes::fromSignedShort(-12817, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xEF\xFF", ConvertBytes::fromSignedShort(-4097, ConvertBytes::BIG_ENDIAN));
        $this->assertSame("\xFF\xFF", ConvertBytes::fromSignedShort(-1, ConvertBytes::BIG_ENDIAN));
        try {
            ConvertBytes::fromSignedShort(-\PHP_INT_MAX, ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromSignedShort(\PHP_INT_MAX, ConvertBytes::BIG_ENDIAN);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testByte()
    {
        $this->assertSame("\x00", ConvertBytes::fromByte(0));
        $this->assertSame("\x01", ConvertBytes::fromByte(1));
        $this->assertSame("\x23", ConvertBytes::fromByte(35));
        $this->assertSame("\x45", ConvertBytes::fromByte(69));
        $this->assertSame("\x67", ConvertBytes::fromByte(103));
        $this->assertSame("\x89", ConvertBytes::fromByte(137));
        $this->assertSame("\xAB", ConvertBytes::fromByte(171));
        $this->assertSame("\xCD", ConvertBytes::fromByte(205));
        $this->assertSame("\xEF", ConvertBytes::fromByte(239));
        $this->assertSame("\xFF", ConvertBytes::fromByte(255));
        try {
            ConvertBytes::fromByte(-\PHP_INT_MAX);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromByte(\PHP_INT_MAX);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }

    public function testSignedByte()
    {
        $this->assertSame("\x00", ConvertBytes::fromSignedByte(0));
        $this->assertSame("\x01", ConvertBytes::fromSignedByte(1));
        $this->assertSame("\x23", ConvertBytes::fromSignedByte(35));
        $this->assertSame("\x45", ConvertBytes::fromSignedByte(69));
        $this->assertSame("\x67", ConvertBytes::fromSignedByte(103));
        $this->assertSame("\x89", ConvertBytes::fromSignedByte(-119));
        $this->assertSame("\xAB", ConvertBytes::fromSignedByte(-85));
        $this->assertSame("\xCD", ConvertBytes::fromSignedByte(-51));
        $this->assertSame("\xEF", ConvertBytes::fromSignedByte(-17));
        $this->assertSame("\xFF", ConvertBytes::fromSignedByte(-1));
        try {
            ConvertBytes::fromSignedByte(-\PHP_INT_MAX);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
        try {
            ConvertBytes::fromSignedByte(\PHP_INT_MAX);
            $this->fail('Expected DataException');
        } catch (DataException) {
            // Continue.
        }
    }
}
