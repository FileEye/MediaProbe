<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\MediaProbe;

abstract class NumberTestCase extends EntryTestBase
{
    protected $min;
    protected $max;
    protected $num;

    public function testOverflow()
    {
        $this->num->setValue([0]);
        $this->assertTrue($this->num->isParsed());
        $this->assertSame(0, $this->num->getValue());

        $this->num->setValue([$this->min - 1]);
        $this->assertFalse($this->num->isParsed());
        $this->assertSame(0, $this->num->getValue());

        $this->num->setValue([$this->max + 1]);
        $this->assertFalse($this->num->isParsed());
        $this->assertSame(0, $this->num->getValue());

        $this->num->setValue([0, $this->max + 1]);
        $this->assertFalse($this->num->isParsed());
        $this->assertSame([0, 0], $this->num->getValue());

        $this->num->setValue([0, $this->min - 1]);
        $this->assertFalse($this->num->isParsed());
        $this->assertSame([0, 0], $this->num->getValue());

        $this->num->setValue([$this->min, $this->max]);
        $this->assertTrue($this->num->isParsed());
        $this->assertSame([$this->min, $this->max], $this->num->getValue());
    }

    public function testReturnValues()
    {
        $this->num->setValue([1, 2, 3]);
        $this->assertSame([1, 2, 3], $this->num->getValue());
        $this->assertSame('1, 2, 3', $this->num->toString());

        $this->num->setValue([1]);
        $this->assertSame(1, $this->num->getValue());
        $this->assertSame(1, $this->num->toString());

        $this->num->setValue([$this->max]);
        $this->assertSame($this->max, $this->num->getValue());
        $this->assertSame($this->max, $this->num->toString());

        $this->num->setValue([$this->min]);
        $this->assertSame($this->min, $this->num->getValue());
        $this->assertSame($this->min, $this->num->toString());
    }
}
