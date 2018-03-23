<?php

namespace ExifEye\Test\core;

use \lsolesen\pel\Pel;
use \lsolesen\pel\PelOverflowException;
use PHPUnit\Framework\TestCase;

abstract class NumberTestCase extends TestCase
{
    protected $min;
    protected $max;
    protected $num;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        ExifEye::setStrictParsing(true);
    }

    public function testOverflow()
    {
        $this->num->setValue(0);
        $this->assertSame(0, $this->num->getValue());

        $caught = false;
        try {
            $this->num->setValue($this->min - 1);
        } catch (PelOverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertSame(0, $this->num->getValue());

        $caught = false;
        try {
            $this->num->setValue($this->max + 1);
        } catch (PelOverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertSame(0, $this->num->getValue());

        $caught = false;
        try {
            $this->num->setValue(0, $this->max + 1);
        } catch (PelOverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertSame(0, $this->num->getValue());

        $caught = false;
        try {
            $this->num->setValue(0, $this->min - 1);
        } catch (PelOverflowException $e) {
            $caught = true;
        }
        $this->assertTrue($caught);
        $this->assertSame(0, $this->num->getValue());
    }

    public function testReturnValues()
    {
        $this->num->setValue(1, 2, 3);
        $this->assertSame([1, 2, 3], $this->num->getValue());
        $this->assertSame('1, 2, 3', $this->num->getText());

        $this->num->setValue(1);
        $this->assertSame(1, $this->num->getValue());
        $this->assertSame(1, $this->num->getText());

        $this->num->setValue($this->max);
        $this->assertSame($this->max, $this->num->getValue());
        $this->assertSame($this->max, $this->num->getText());

        $this->num->setValue($this->min);
        $this->assertSame($this->min, $this->num->getValue());
        $this->assertSame($this->min, $this->num->getText());
    }
}
