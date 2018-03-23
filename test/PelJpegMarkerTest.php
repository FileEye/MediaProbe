<?php

namespace ExifEye\Test\core;

use PHPUnit\Framework\TestCase;
use lsolesen\pel\PelJpegMarker;
use ExifEye\core\ExifEye;
use lsolesen\pel\PelJpegInvalidMarkerException;

class PelJpegMarkerTest extends TestCase
{

    public function testNames()
    {
        $jpegMarker = new PelJpegMarker();
        $this->assertEquals($jpegMarker::getName(PelJpegMarker::SOF0), 'SOF0');
        $this->assertEquals($jpegMarker::getName(PelJpegMarker::RST3), 'RST3');
        $this->assertEquals($jpegMarker::getName(PelJpegMarker::APP3), 'APP3');
        $this->assertEquals($jpegMarker::getName(PelJpegMarker::JPG11), 'JPG11');
        $this->assertEquals($jpegMarker::getName(100), ExifEye::fmt('Unknown marker: 0x%02X', 100));
    }

    public function testDescriptions()
    {
        $jpegMarker = new PelJpegMarker();
        $this->assertEquals($jpegMarker::getDescription(PelJpegMarker::SOF0), 'Encoding (baseline)');
        $this->assertEquals($jpegMarker::getDescription(PelJpegMarker::RST3), ExifEye::fmt('Restart %d', 3));
        $this->assertEquals($jpegMarker::getDescription(PelJpegMarker::APP3), ExifEye::fmt('Application segment %d', 3));
        $this->assertEquals($jpegMarker::getDescription(PelJpegMarker::JPG11), ExifEye::fmt('Extension %d', 11));
        $this->assertEquals($jpegMarker::getDescription(100), ExifEye::fmt('Unknown marker: 0x%02X', 100));
    }

    /**
     * @expectedException lsolesen\pel\PelJpegInvalidMarkerException
     * @throws PelJpegInvalidMarkerException
     */
    public function testInvalidMarkerException()
    {
        throw new PelJpegInvalidMarkerException(1, 2);
    }
}
