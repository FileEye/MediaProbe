<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataString;

abstract class NumberTestCase extends EntryTestBase
{
    protected $min;
    protected $max;
    protected $num;

    public function testBase()
    {
        $this->num->setDataElement($this->toDataString([0]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame(0, $this->num->getValue());

        $this->num->setDataElement($this->toDataString([$this->min, $this->max]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame([$this->min, $this->max], $this->num->getValue());
    }

    public function testUnderflow()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([$this->min - 1]));
    }

    public function testUnderflowMultiComponent()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([0, $this->min - 1]));
    }

    public function testOverflow()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([$this->max + 1]));
    }

    public function testOverflowMultiComponent()
    {
        $this->expectException(DataException::class);
        $this->num->setDataElement($this->toDataString([0, $this->max + 1]));
    }

    public function testReturnValues()
    {
        $this->num->setDataElement($this->toDataString([1, 2, 3]));
        $this->assertSame([1, 2, 3], $this->num->getValue());
        $this->assertSame('1 2 3', $this->num->toString());

        $this->num->setDataElement($this->toDataString([1]));
        $this->assertSame(1, $this->num->getValue());
        $this->assertSame('1', $this->num->toString());

        $this->num->setDataElement($this->toDataString([$this->max]));
        $this->assertSame($this->max, $this->num->getValue());
        $this->assertSame((string) $this->max, $this->num->toString());

        $this->num->setDataElement($this->toDataString([$this->min]));
        $this->assertSame($this->min, $this->num->getValue());
        $this->assertSame((string) $this->min, $this->num->toString());
    }

    protected function toDataString(array $values): DataString
    {
        $ret = '';
        foreach ($values as $value) {
            $ret .= $this->convertValueToBytes($value);
        }
        return new DataString($ret);
    }

    abstract protected function convertValueToBytes(int|float|array $value): string;
}
