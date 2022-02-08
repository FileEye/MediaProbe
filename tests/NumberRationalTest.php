<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Entry\Core\Rational;
use FileEye\MediaProbe\Entry\Exception\OverflowException;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberRationalTest extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new Rational($this->mockParentElement, $this->mockDataElement);
        $this->min = 0;
        $this->max = 4294967295;
    }

    public function testBase()
    {
        $this->num->setDataElement($this->toDataString([[1, 2]]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame([1, 2], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame(0.5, $this->num->getValue());

        $this->num->setDataElement($this->toDataString([[3, 4], [0, 4294967295]]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame([[3, 4], [0, 4294967295]], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $this->num->getValue());
    }

    public function testUnderflow()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[-1, 2]]));
    }

    public function testUnderflowMultiComponent()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[3, 4], [-1, 2], [7, 8]]));
    }

    public function testOverflow()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[3, 4], [4294967296, 1]]));
    }

    public function testOverflowMultiComponent()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[3, 4], [1, 4294967296]]));
    }

    public function testReturnValues()
    {
        $this->num->setDataElement($this->toDataString([[1, 2], [3, 4], [5, 6]]));
        $this->assertSame([[1, 2], [3, 4], [5, 6]], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame([0.5, 0.75, 5 / 6], $this->num->getValue());
        $this->assertSame('0.5 0.75 ' . (string) (5 / 6), $this->num->toString());

        $this->num->setDataElement($this->toDataString([[7, 8]]));
        $this->assertSame([7, 8], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame(7 / 8, $this->num->getValue());
        $this->assertSame((string) (7 / 8), $this->num->toString());

        $this->num->setDataElement($this->toDataString([[0, 4294967295]]));
        $this->assertSame([0, 4294967295], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame(0, $this->num->getValue());
        $this->assertSame('0', $this->num->toString());
    }

    protected function convertValueToBytes(array $value): string
    {
        return ConvertBytes::fromRational($value);
    }
}
