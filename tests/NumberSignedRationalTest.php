<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Entry\Core\SignedRational;
use FileEye\MediaProbe\Entry\Exception\OverflowException;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedRationalTest extends NumberTestCase
{
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new SignedRational($this->mockParentElement, $this->mockDataElement);
        $this->min = -2147483648;
        $this->max = 2147483647;
    }

    public function testBase()
    {
        $this->num->setDataElement($this->toDataString([[-1, 2]]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame([-1, 2], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame(-0.5, $this->num->getValue());

        $this->num->setDataElement($this->toDataString([[3, 4], [0, 2147483647]]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame([[3, 4], [0, 2147483647]], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame([0.75, 0], $this->num->getValue());
    }

    public function testUnderflow()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[-1, -2147483649]]));
    }

    public function testUnderflowMultiComponent()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[-10, -20], [-1, -2147483649]]));
    }

    public function testOverflow()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[1, 2147483648]]));
    }

    public function testOverflowMultiComponent()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([[3, 4], [1, 2147483648]]));
    }

    public function testReturnValues()
    {
        $this->num->setDataElement($this->toDataString([[-1, 2], [3, 4], [5, -6]]));
        $this->assertSame([[-1, 2], [3, 4], [5, -6]], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame([-0.5, 0.75, 5 / -6], $this->num->getValue());
        $this->assertSame('-0.5 0.75 ' . (string) (5 / -6), $this->num->toString());

        $this->num->setDataElement($this->toDataString([[-7, -8]]));
        $this->assertSame([-7, -8], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame(-7 / -8, $this->num->getValue());
        $this->assertSame((string) (-7 / -8), $this->num->toString());

        $this->num->setDataElement($this->toDataString([[0, 2147483647]]));
        $this->assertSame([0, 2147483647], $this->num->getValue(['format' => 'parsed']));
        $this->assertSame(0, $this->num->getValue());
        $this->assertSame('0', $this->num->toString());
    }

    protected function convertValueToBytes(array $value): string
    {
        return ConvertBytes::fromSignedRational($value);
    }
}
