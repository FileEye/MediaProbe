<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataString;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Utility\ConvertBytes;

// @todo xxx add a test for negative/zero window size
// @todo xxx add a test for excessive window size

class DataWindowTest extends MediaProbeTestCaseBase
{
    public function testDataWindow()
    {
        $data = new DataString('0123456789ABCDEFGHIJ');
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $this->assertSame(20, $data->getSize());
        $this->assertSame('0123456789ABCDEFGHIJ', $data->getBytes());
        $this->assertSame('0123456789', $data->getBytes(0, 10));
        $this->assertSame('ABCDEFGHIJ', $data->getBytes(10, 10));
        $this->assertSame('123456789A', $data->getBytes(1, 10));

        $window_0 = new DataWindow($data);
        $this->assertSame(20, $window_0->getSize());
        $this->assertSame('0123456789ABCDEFGHIJ', $window_0->getBytes());
        $this->assertSame('0123456789', $window_0->getBytes(0, 10));
        $this->assertSame('ABCDEFGHIJ', $window_0->getBytes(10, 10));
        $this->assertSame('123456789A', $window_0->getBytes(1, 10));

        $window_1 = new DataWindow($data, 5, 10);
        $this->assertSame(10, $window_1->getSize());
        $this->assertSame('56789ABCDE', $window_1->getBytes());
        $this->assertSame('56789', $window_1->getBytes(0, 5));
        $this->assertSame('AB', $window_1->getBytes(5, 2));
        $this->assertSame('67', $window_1->getBytes(1, 2));

        $window_1_sub1 = new DataWindow($window_1, 5, 5);
        $this->assertSame(5, $window_1_sub1->getSize());
        $this->assertSame('ABCDE', $window_1_sub1->getBytes());
        $this->assertSame('BCD', $window_1_sub1->getBytes(1, 3));
        $this->assertSame('DE', $window_1_sub1->getBytes(3, 2));
        $this->assertSame('AB', $window_1_sub1->getBytes(0, 2));

        // No size specified.
        $window_1_sub2 = new DataWindow($window_1, 5);
        $this->assertSame(5, $window_1_sub2->getSize());
        $this->assertSame('ABCDE', $window_1_sub2->getBytes());
        $this->assertSame('BCD', $window_1_sub2->getBytes(1, 3));
        $this->assertSame('DE', $window_1_sub2->getBytes(3, 2));
        $this->assertSame('AB', $window_1_sub2->getBytes(0, 2));
    }

    public function testDataWindowWithNegativeStart()
    {
        $data = new DataString('0123456789ABCDEFGHIJ');
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $window_1 = new DataWindow($data, 5, 10);

        // Negative offset.
        $this->expectException(DataException::class);
        $this->expectExceptionMessage('Invalid negative offset for DataWindow');
        $window_1_sub3 = new DataWindow($window_1, -5);
    }

    public function testDataWindowWithExcessiveSize()
    {
        $data = new DataString('0123456789ABCDEFGHIJ');
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $window_1 = new DataWindow($data, 5, 10);

        $this->expectException(DataException::class);
        $this->expectExceptionMessage('DataWindow (offset: 0 size: 40) out of bounds of DataElement (size: 10)');
        $window_1_sub3 = new DataWindow($window_1, 0, 40);
    }

    public function testReadBytes()
    {
        $data = new DataString('abcdefgh');
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);

        // DataWindow on original data.
        $window = new DataWindow($data);
        $this->assertEquals(8, $window->getSize());
        $this->assertEquals('abcdefgh', $window->getBytes());
        $this->assertEquals('abcdefgh', $window->getBytes(0));
        $this->assertEquals('bcdefgh', $window->getBytes(1));
        $this->assertEquals('h', $window->getBytes(7));
        try {
            $this->assertNull($window->getBytes(8));
            $this->fail('No DataException thrown when offset out of bonds');
        } catch (DataException $e) {
            $this->assertEquals('Offset out of bounds - rel 8 [0, 7], abs 8 [0, 7]', $e->getMessage());
        }
        $this->assertEquals('h', $window->getBytes(-1));
        $this->assertEquals('gh', $window->getBytes(-2));
        $this->assertEquals('bcdefgh', $window->getBytes(-7));
        $this->assertEquals('abcdefgh', $window->getBytes(-8));
        try {
            $this->assertNull($window->getBytes(0, 10));
            $this->fail('No DataException thrown when offset out of bonds');
        } catch (DataException $e) {
            $this->assertEquals('Offset out of bounds - rel 9 [0, 7], abs 9 [0, 7]', $e->getMessage());
        }
        try {
            $this->assertNull($window->getBytes(-10));
            $this->fail('No DataException thrown when offset out of bonds');
        } catch (DataException $e) {
            $this->assertEquals('Offset out of bounds - rel -2 [0, 7], abs -2 [0, 7]', $e->getMessage());
        }

        // DataWindow on another DataWindow.
        $sub_window = new DataWindow($window, 2, 4);
        $this->assertEquals(4, $sub_window->getSize());
        $this->assertEquals('cdef', $sub_window->getBytes());
        $this->assertEquals('cdef', $sub_window->getBytes(0));
        $this->assertEquals('def', $sub_window->getBytes(1));
        $this->assertEquals('f', $sub_window->getBytes(3));
        try {
            $this->assertNull($sub_window->getBytes(4));
            $this->fail('No DataException thrown when offset out of bonds');
        } catch (DataException $e) {
            $this->assertEquals('Offset out of bounds - rel 4 [0, 3], abs 6 [2, 5]', $e->getMessage());
        }
        $this->assertEquals('f', $sub_window->getBytes(-1));
        $this->assertEquals('ef', $sub_window->getBytes(-2));
        $this->assertEquals('def', $sub_window->getBytes(-3));
        $this->assertEquals('cdef', $sub_window->getBytes(-4));
        try {
            $this->assertNull($sub_window->getBytes(0, 6));
            $this->fail('No DataException thrown when offset out of bonds');
        } catch (DataException $e) {
            $this->assertEquals('Offset out of bounds - rel 5 [0, 3], abs 7 [2, 5]', $e->getMessage());
        }
        $this->assertEquals('cdef', $sub_window->getBytes(-4));
        try {
            $this->assertNull($sub_window->getBytes(-7));
            $this->fail('No DataException thrown when offset out of bonds');
        } catch (DataException $e) {
            $this->assertEquals('Offset out of bounds - rel -3 [0, 3], abs -1 [2, 5]', $e->getMessage());
        }
        try {
            $this->assertNull($sub_window->getBytes(-20));
            $this->fail('No DataException thrown when offset out of bonds');
        } catch (DataException $e) {
            $this->assertEquals('Offset out of bounds - rel -16 [0, 3], abs -14 [2, 5]', $e->getMessage());
        }
    }

    public function testReadNumbers1()
    {
        $data = new DataString("\x01\x02\x03\x04");
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $window = new DataWindow($data, 0, $data->getSize());

        // Big endianness.
        $this->assertEquals($window->getSize(), 4);
        $this->assertEquals($window->getBytes(), "\x01\x02\x03\x04");
        $this->assertEquals($window->getByte(0), 0x01);
        $this->assertEquals($window->getByte(1), 0x02);
        $this->assertEquals($window->getByte(2), 0x03);
        $this->assertEquals($window->getByte(3), 0x04);
        $this->assertEquals($window->getShort(0), 0x0102);
        $this->assertEquals($window->getShort(1), 0x0203);
        $this->assertEquals($window->getShort(2), 0x0304);
        $this->assertEquals($window->getLong(0), 0x01020304);

        // Little endianness.
        $window->setByteOrder(ConvertBytes::LITTLE_ENDIAN);
        $this->assertEquals($window->getSize(), 4);
        $this->assertEquals($window->getBytes(), "\x01\x02\x03\x04");
        $this->assertEquals($window->getByte(0), 0x01);
        $this->assertEquals($window->getByte(1), 0x02);
        $this->assertEquals($window->getByte(2), 0x03);
        $this->assertEquals($window->getByte(3), 0x04);
        $this->assertEquals($window->getShort(0), 0x0201);
        $this->assertEquals($window->getShort(1), 0x0302);
        $this->assertEquals($window->getShort(2), 0x0403);
        $this->assertEquals($window->getLong(0), 0x04030201);
    }

    public function testReadNumbers2()
    {
        $data = new DataString("\x89\xAB\xCD\xEF\x10\x11\x12\x13");
        $data->setByteOrder(ConvertBytes::BIG_ENDIAN);
        $window = new DataWindow($data, 0, $data->getSize());

        // Big endianness.
        $this->assertEquals($window->getSize(), 8);
        $this->assertEquals($window->getBytes(), "\x89\xAB\xCD\xEF\x10\x11\x12\x13");
        $this->assertEquals($window->getByte(0), 0x89);
        $this->assertEquals($window->getByte(1), 0xAB);
        $this->assertEquals($window->getByte(2), 0xCD);
        $this->assertEquals($window->getByte(3), 0xEF);
        $this->assertEquals($window->getByte(4), 0x10);
        $this->assertEquals($window->getByte(5), 0x11);
        $this->assertEquals($window->getByte(6), 0x12);
        $this->assertEquals($window->getByte(7), 0x13);
        $this->assertEquals($window->getShort(0), 0x89AB);
        $this->assertEquals($window->getShort(1), 0xABCD);
        $this->assertEquals($window->getShort(2), 0xCDEF);
        $this->assertEquals($window->getShort(3), 0xEF10);
        $this->assertEquals($window->getLong(0), 0x89ABCDEF);
        $this->assertEquals($window->getLong(1), 0xABCDEF10);

        // Little endianness.
        $window->setByteOrder(ConvertBytes::LITTLE_ENDIAN);
        $this->assertEquals($window->getSize(), 8);
        $this->assertEquals($window->getBytes(), "\x89\xAB\xCD\xEF\x10\x11\x12\x13");
        $this->assertEquals($window->getByte(0), 0x89);
        $this->assertEquals($window->getByte(1), 0xAB);
        $this->assertEquals($window->getByte(2), 0xCD);
        $this->assertEquals($window->getByte(3), 0xEF);
        $this->assertEquals($window->getByte(4), 0x10);
        $this->assertEquals($window->getByte(5), 0x11);
        $this->assertEquals($window->getByte(6), 0x12);
        $this->assertEquals($window->getByte(7), 0x13);
        $this->assertEquals($window->getShort(0), 0xAB89);
        $this->assertEquals($window->getShort(1), 0xCDAB);
        $this->assertEquals($window->getShort(2), 0xEFCD);
        $this->assertEquals($window->getShort(3), 0x10EF);
        $this->assertEquals($window->getLong(0), 0xEFCDAB89);
        $this->assertEquals($window->getLong(1), 0x10EFCDAB);
    }
}
