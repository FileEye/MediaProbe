<?php

namespace ExifEye\Test\core;

use ExifEye\core\ExifEye;
use ExifEye\core\JpegInvalidMarkerException;
use ExifEye\core\JpegMarker;

class PelJpegMarkerTest extends ExifEyeTestCaseBase
{

    public function testNames()
    {
        $jpegMarker = new JpegMarker();
        $this->assertEquals($jpegMarker::getName(JpegMarker::SOF0), 'SOF0');
        $this->assertEquals($jpegMarker::getName(JpegMarker::RST3), 'RST3');
        $this->assertEquals($jpegMarker::getName(JpegMarker::APP3), 'APP3');
        $this->assertEquals($jpegMarker::getName(JpegMarker::JPG11), 'JPG11');
        $this->assertEquals($jpegMarker::getName(100), ExifEye::fmt('Unknown marker: 0x%02X', 100));
    }

    public function testDescriptions()
    {
        $jpegMarker = new JpegMarker();
        $this->assertEquals($jpegMarker::getDescription(JpegMarker::SOF0), 'Encoding (baseline)');
        $this->assertEquals($jpegMarker::getDescription(JpegMarker::RST3), ExifEye::fmt('Restart %d', 3));
        $this->assertEquals($jpegMarker::getDescription(JpegMarker::APP3), ExifEye::fmt('Application segment %d', 3));
        $this->assertEquals($jpegMarker::getDescription(JpegMarker::JPG11), ExifEye::fmt('Extension %d', 11));
        $this->assertEquals($jpegMarker::getDescription(100), ExifEye::fmt('Unknown marker: 0x%02X', 100));
    }

    /**
     * @expectedException ExifEye\core\JpegInvalidMarkerException
     */
    public function testInvalidMarkerException()
    {
        throw new JpegInvalidMarkerException(1, 2);
    }
}
