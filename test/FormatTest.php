<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        ExifEye::setStrictParsing(true);
    }

    public function testGetName()
    {
        $this->assertEquals('Ascii', Format::getName(Format::ASCII));
        $this->assertEquals('Float', Format::getName(Format::FLOAT));
        $this->assertEquals('Undefined', Format::getName(Format::UNDEFINED));
        //@todo drop the else part once PHP < 5.6 (hence PHPUnit 4.8.36) support is removed.
        //@todo change below to ExifEyeException::class once PHP 5.4 support is removed.
        if (method_exists($this, 'expectException')) {
            $this->expectException('ExifEye\core\ExifEyeException');
            $this->expectExceptionMessage("No format can be derived for tag: 'ImageHeight' in ifd: 'Canon Picture Information'");
        } else {
            $this->setExpectedException('ExifEye\core\ExifEyeException', "No format can be derived for tag: 'ImageHeight' in ifd: 'Canon Picture Information'");
        }
        Format::getName(100);
    }

    public function testGetIdFromName()
    {
        $this->assertEquals(Format::ASCII, Format::getIdFromName('Ascii'));
        $this->assertEquals(Format::FLOAT, Format::getIdFromName('Float'));
        $this->assertEquals(Format::UNDEFINED, Format::getIdFromName('Undefined'));
        $this->assertNull(Format::getIdFromName('UnexistingFormat'));
    }

    public function testGetSize()
    {
        $this->assertEquals(1, Format::getSize(Format::ASCII));
        $this->assertEquals(4, Format::getSize(Format::FLOAT));
        $this->assertEquals(1, Format::getSize(Format::UNDEFINED));
        //@todo drop the else part once PHP < 5.6 (hence PHPUnit 4.8.36) support is removed.
        //@todo change below to ExifEyeException::class once PHP 5.4 support is removed.
        if (method_exists($this, 'expectException')) {
            $this->expectException('ExifEye\core\ExifEyeException');
            $this->expectExceptionMessage("No format can be derived for tag: 'ImageHeight' in ifd: 'Canon Picture Information'");
        } else {
            $this->setExpectedException('ExifEye\core\ExifEyeException', "No format can be derived for tag: 'ImageHeight' in ifd: 'Canon Picture Information'");
        }
        Format::getSize(100);
    }
}
