<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedLong64;
use FileEye\MediaProbe\Utility\ConvertBytes;

class NumberSignedLong64Test extends NumberTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->num = new SignedLong64($this->mockParentElement, $this->mockDataElement);
        $this->min = -9223372036854775808;
        $this->max = 9223372036854775807;
    }

    protected function convertValueToBytes(int|float|array $value): string
    {
        assert(is_int($value) || is_float($value));
        return ConvertBytes::fromSignedLong64($value);
    }

    public function testBase()
    {
        $this->num->setDataElement($this->toDataString([0]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame(0, $this->num->getValue());

        $this->markTestIncomplete('Large numbers do not work well, explore using BCMath');

        $this->num->setDataElement($this->toDataString([$this->min, $this->max]));
        $this->assertTrue($this->num->isValid());
        $this->assertSame([$this->min, $this->max], $this->num->getValue());
    }

    public function testUnderflow()
    {
        $this->markTestIncomplete('Large numbers do not work well, explore using BCMath');
    }

    public function testUnderflowMultiComponent()
    {
        $this->markTestIncomplete('Large numbers do not work well, explore using BCMath');
    }

    public function testOverflow()
    {
        $this->markTestIncomplete('Large numbers do not work well, explore using BCMath');
    }

    public function testOverflowMultiComponent()
    {
        $this->markTestIncomplete('Large numbers do not work well, explore using BCMath');
    }

    public function testReturnValues()
    {
        $this->num->setDataElement($this->toDataString([1, 2, 3]));
        $this->assertSame([1, 2, 3], $this->num->getValue());
        $this->assertSame('1 2 3', $this->num->toString());

        $this->num->setDataElement($this->toDataString([1]));
        $this->assertSame(1, $this->num->getValue());
        $this->assertSame('1', $this->num->toString());

        $this->markTestIncomplete('Large numbers do not work well, explore using BCMath');

        $this->num->setDataElement($this->toDataString([$this->max]));
        $this->assertSame($this->max, $this->num->getValue());
        $this->assertSame((string) $this->max, $this->num->toString());

        $this->num->setDataElement($this->toDataString([$this->min]));
        $this->assertSame($this->min, $this->num->getValue());
        $this->assertSame((string) $this->min, $this->num->toString());
    }
}
