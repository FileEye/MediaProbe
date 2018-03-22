<?php

namespace ExifEye\Test\core;

use lsolesen\pel\PelIfd;
use PHPUnit\Framework\TestCase;
use lsolesen\pel\PelTag;

class PelTagTest extends TestCase
{
    const NONEXISTENT_TAG_NAME = 'nonexistent tag name';
    const NONEXISTENT_EXIF_TAG = 0xFCFC;
    const NONEXISTENT_GPS_TAG = 0xFCFC;
    const EXIF_TAG_NAME = 'ExifVersion';
    const GPS_TAG_NAME = 'GPSLongitude';
    const EXIF_TAG = PelTag::EXIF_VERSION;
    const GPS_TAG = PelTag::GPS_LONGITUDE;

    public function testReverseLookup()
    {
        $this->assertSame(false, PelTag::getExifTagByName(self::NONEXISTENT_TAG_NAME), 'Non-existent EXIF tag name');
        $this->assertSame(false, PelTag::getGpsTagByName(self::NONEXISTENT_TAG_NAME), 'Non-existent GPS tag name');
        $this->assertStringStartsWith(
            'Unknown: ',
            PelTag::getName(PelIfd::IFD0, self::NONEXISTENT_EXIF_TAG),
            'Non-existent EXIF tag'
        );
        $this->assertStringStartsWith(
            'Unknown: ',
            PelTag::getName(PelIfd::GPS, self::NONEXISTENT_GPS_TAG),
            'Non-existent GPS tag'
        );

        $this->assertSame(static::EXIF_TAG, PelTag::getExifTagByName(self::EXIF_TAG_NAME), 'EXIF tag name');
        $this->assertSame(static::GPS_TAG, PelTag::getGpsTagByName(self::GPS_TAG_NAME), 'GPS tag name');
        $this->assertEquals(static::EXIF_TAG_NAME, PelTag::getName(PelIfd::EXIF, self::EXIF_TAG), 'EXIF tag');
        $this->assertEquals(static::GPS_TAG_NAME, PelTag::getName(PelIfd::GPS, self::GPS_TAG), 'GPS tag');
    }
}
