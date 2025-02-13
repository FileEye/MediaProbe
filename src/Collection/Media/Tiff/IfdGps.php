<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Media\Tiff;

use FileEye\MediaProbe\Collection\CollectionBase;

class IfdGps extends CollectionBase {

  protected static $map = array (
  'name' => 'GPS',
  'title' => 'GPS IFD',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Tiff\\Ifd',
  'DOMNode' => 'ifd',
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'Media\\Tiff\\IfdGps',
  'itemsByName' =>
  array (
    'GPSAltitude' =>
    array (
      0 => 6,
    ),
    'GPSAltitudeRef' =>
    array (
      0 => 5,
    ),
    'GPSAreaInformation' =>
    array (
      0 => 28,
    ),
    'GPSDOP' =>
    array (
      0 => 11,
    ),
    'GPSDateStamp' =>
    array (
      0 => 29,
    ),
    'GPSDestBearing' =>
    array (
      0 => 24,
    ),
    'GPSDestBearingRef' =>
    array (
      0 => 23,
    ),
    'GPSDestDistance' =>
    array (
      0 => 26,
    ),
    'GPSDestDistanceRef' =>
    array (
      0 => 25,
    ),
    'GPSDestLatitude' =>
    array (
      0 => 20,
    ),
    'GPSDestLatitudeRef' =>
    array (
      0 => 19,
    ),
    'GPSDestLongitude' =>
    array (
      0 => 22,
    ),
    'GPSDestLongitudeRef' =>
    array (
      0 => 21,
    ),
    'GPSDifferential' =>
    array (
      0 => 30,
    ),
    'GPSHPositioningError' =>
    array (
      0 => 31,
    ),
    'GPSImgDirection' =>
    array (
      0 => 17,
    ),
    'GPSImgDirectionRef' =>
    array (
      0 => 16,
    ),
    'GPSLatitude' =>
    array (
      0 => 2,
    ),
    'GPSLatitudeRef' =>
    array (
      0 => 1,
    ),
    'GPSLongitude' =>
    array (
      0 => 4,
    ),
    'GPSLongitudeRef' =>
    array (
      0 => 3,
    ),
    'GPSMapDatum' =>
    array (
      0 => 18,
    ),
    'GPSMeasureMode' =>
    array (
      0 => 10,
    ),
    'GPSProcessingMethod' =>
    array (
      0 => 27,
    ),
    'GPSSatellites' =>
    array (
      0 => 8,
    ),
    'GPSSpeed' =>
    array (
      0 => 13,
    ),
    'GPSSpeedRef' =>
    array (
      0 => 12,
    ),
    'GPSStatus' =>
    array (
      0 => 9,
    ),
    'GPSTimeStamp' =>
    array (
      0 => 7,
    ),
    'GPSTrack' =>
    array (
      0 => 15,
    ),
    'GPSTrackRef' =>
    array (
      0 => 14,
    ),
    'GPSVersionID' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByPhpExifTag' =>
  array (
    'GPSAltitude' =>
    array (
      0 => 6,
    ),
    'GPSAltitudeRef' =>
    array (
      0 => 5,
    ),
    'GPSAreaInformation' =>
    array (
      0 => 28,
    ),
    'GPSDOP' =>
    array (
      0 => 11,
    ),
    'GPSDateStamp' =>
    array (
      0 => 29,
    ),
    'GPSDestBearing' =>
    array (
      0 => 24,
    ),
    'GPSDestBearingRef' =>
    array (
      0 => 23,
    ),
    'GPSDestDistance' =>
    array (
      0 => 26,
    ),
    'GPSDestDistanceRef' =>
    array (
      0 => 25,
    ),
    'GPSDestLatitude' =>
    array (
      0 => 20,
    ),
    'GPSDestLatitudeRef' =>
    array (
      0 => 19,
    ),
    'GPSDestLongitude' =>
    array (
      0 => 22,
    ),
    'GPSDestLongitudeRef' =>
    array (
      0 => 21,
    ),
    'GPSDifferential' =>
    array (
      0 => 30,
    ),
    'GPSImgDirection' =>
    array (
      0 => 17,
    ),
    'GPSImgDirectionRef' =>
    array (
      0 => 16,
    ),
    'GPSLatitude' =>
    array (
      0 => 2,
    ),
    'GPSLatitudeRef' =>
    array (
      0 => 1,
    ),
    'GPSLongitude' =>
    array (
      0 => 4,
    ),
    'GPSLongitudeRef' =>
    array (
      0 => 3,
    ),
    'GPSMapDatum' =>
    array (
      0 => 18,
    ),
    'GPSMeasureMode' =>
    array (
      0 => 10,
    ),
    'GPSProcessingMode' =>
    array (
      0 => 27,
    ),
    'GPSSatellites' =>
    array (
      0 => 8,
    ),
    'GPSSpeed' =>
    array (
      0 => 13,
    ),
    'GPSSpeedRef' =>
    array (
      0 => 12,
    ),
    'GPSStatus' =>
    array (
      0 => 9,
    ),
    'GPSTimeStamp' =>
    array (
      0 => 7,
    ),
    'GPSTrack' =>
    array (
      0 => 15,
    ),
    'GPSTrackRef' =>
    array (
      0 => 14,
    ),
    'GPSVersion' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'GPS:GPSAltitude' =>
    array (
      0 => 6,
    ),
    'GPS:GPSAltitudeRef' =>
    array (
      0 => 5,
    ),
    'GPS:GPSAreaInformation' =>
    array (
      0 => 28,
    ),
    'GPS:GPSDOP' =>
    array (
      0 => 11,
    ),
    'GPS:GPSDateStamp' =>
    array (
      0 => 29,
    ),
    'GPS:GPSDestBearing' =>
    array (
      0 => 24,
    ),
    'GPS:GPSDestBearingRef' =>
    array (
      0 => 23,
    ),
    'GPS:GPSDestDistance' =>
    array (
      0 => 26,
    ),
    'GPS:GPSDestDistanceRef' =>
    array (
      0 => 25,
    ),
    'GPS:GPSDestLatitude' =>
    array (
      0 => 20,
    ),
    'GPS:GPSDestLatitudeRef' =>
    array (
      0 => 19,
    ),
    'GPS:GPSDestLongitude' =>
    array (
      0 => 22,
    ),
    'GPS:GPSDestLongitudeRef' =>
    array (
      0 => 21,
    ),
    'GPS:GPSDifferential' =>
    array (
      0 => 30,
    ),
    'GPS:GPSHPositioningError' =>
    array (
      0 => 31,
    ),
    'GPS:GPSImgDirection' =>
    array (
      0 => 17,
    ),
    'GPS:GPSImgDirectionRef' =>
    array (
      0 => 16,
    ),
    'GPS:GPSLatitude' =>
    array (
      0 => 2,
    ),
    'GPS:GPSLatitudeRef' =>
    array (
      0 => 1,
    ),
    'GPS:GPSLongitude' =>
    array (
      0 => 4,
    ),
    'GPS:GPSLongitudeRef' =>
    array (
      0 => 3,
    ),
    'GPS:GPSMapDatum' =>
    array (
      0 => 18,
    ),
    'GPS:GPSMeasureMode' =>
    array (
      0 => 10,
    ),
    'GPS:GPSProcessingMethod' =>
    array (
      0 => 27,
    ),
    'GPS:GPSSatellites' =>
    array (
      0 => 8,
    ),
    'GPS:GPSSpeed' =>
    array (
      0 => 13,
    ),
    'GPS:GPSSpeedRef' =>
    array (
      0 => 12,
    ),
    'GPS:GPSStatus' =>
    array (
      0 => 9,
    ),
    'GPS:GPSTimeStamp' =>
    array (
      0 => 7,
    ),
    'GPS:GPSTrack' =>
    array (
      0 => 15,
    ),
    'GPS:GPSTrackRef' =>
    array (
      0 => 14,
    ),
    'GPS:GPSVersionID' =>
    array (
      0 => 0,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSVersionId',
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSVersionID',
        'title' => 'GPS Version ID',
        'components' => 4,
        'format' =>
        array (
          0 => 1,
        ),
        'phpExifTag' => 'GPSVersion',
        'exiftoolDOMNode' => 'GPS:GPSVersionID',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSLatitudeRef',
        'title' => 'GPS Latitude Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'N' => 'North',
            'S' => 'South',
          ),
        ),
        'phpExifTag' => 'GPSLatitudeRef',
        'exiftoolDOMNode' => 'GPS:GPSLatitudeRef',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSDegrees',
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSLatitude',
        'title' => 'GPS Latitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSLatitude',
        'exiftoolDOMNode' => 'GPS:GPSLatitude',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSLongitudeRef',
        'title' => 'GPS Longitude Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'E' => 'East',
            'W' => 'West',
          ),
        ),
        'phpExifTag' => 'GPSLongitudeRef',
        'exiftoolDOMNode' => 'GPS:GPSLongitudeRef',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSDegrees',
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSLongitude',
        'title' => 'GPS Longitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSLongitude',
        'exiftoolDOMNode' => 'GPS:GPSLongitude',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSAltitudeRef',
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSAltitudeRef',
        'title' => 'GPS Altitude Ref',
        'format' =>
        array (
          0 => 1,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Above Sea Level',
            1 => 'Below Sea Level',
          ),
        ),
        'phpExifTag' => 'GPSAltitudeRef',
        'exiftoolDOMNode' => 'GPS:GPSAltitudeRef',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSAltitude',
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSAltitude',
        'title' => 'GPS Altitude',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSAltitude',
        'exiftoolDOMNode' => 'GPS:GPSAltitude',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSTimeStamp',
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSTimeStamp',
        'title' => 'GPS Time Stamp',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSTimeStamp',
        'exiftoolDOMNode' => 'GPS:GPSTimeStamp',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSSatellites',
        'title' => 'GPS Satellites',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'GPSSatellites',
        'exiftoolDOMNode' => 'GPS:GPSSatellites',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSStatus',
        'title' => 'GPS Status',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'A' => 'Measurement Active',
            'V' => 'Measurement Void',
          ),
        ),
        'phpExifTag' => 'GPSStatus',
        'exiftoolDOMNode' => 'GPS:GPSStatus',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSMeasureMode',
        'title' => 'GPS Measure Mode',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            2 => '2-Dimensional Measurement',
            3 => '3-Dimensional Measurement',
          ),
        ),
        'phpExifTag' => 'GPSMeasureMode',
        'exiftoolDOMNode' => 'GPS:GPSMeasureMode',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDOP',
        'title' => 'GPS Dilution Of Precision',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSDOP',
        'exiftoolDOMNode' => 'GPS:GPSDOP',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSSpeedRef',
        'title' => 'GPS Speed Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'K' => 'km/h',
            'M' => 'mph',
            'N' => 'knots',
          ),
        ),
        'phpExifTag' => 'GPSSpeedRef',
        'exiftoolDOMNode' => 'GPS:GPSSpeedRef',
      ),
    ),
    13 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSSpeed',
        'title' => 'GPS Speed',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSSpeed',
        'exiftoolDOMNode' => 'GPS:GPSSpeed',
      ),
    ),
    14 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSTrackRef',
        'title' => 'GPS Track Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'M' => 'Magnetic North',
            'T' => 'True North',
          ),
        ),
        'phpExifTag' => 'GPSTrackRef',
        'exiftoolDOMNode' => 'GPS:GPSTrackRef',
      ),
    ),
    15 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSTrack',
        'title' => 'GPS Track',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSTrack',
        'exiftoolDOMNode' => 'GPS:GPSTrack',
      ),
    ),
    16 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSImgDirectionRef',
        'title' => 'GPS Img Direction Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'M' => 'Magnetic North',
            'T' => 'True North',
          ),
        ),
        'phpExifTag' => 'GPSImgDirectionRef',
        'exiftoolDOMNode' => 'GPS:GPSImgDirectionRef',
      ),
    ),
    17 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSImgDirection',
        'title' => 'GPS Img Direction',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSImgDirection',
        'exiftoolDOMNode' => 'GPS:GPSImgDirection',
      ),
    ),
    18 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSMapDatum',
        'title' => 'GPS Map Datum',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'GPSMapDatum',
        'exiftoolDOMNode' => 'GPS:GPSMapDatum',
      ),
    ),
    19 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestLatitudeRef',
        'title' => 'GPS Dest Latitude Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'N' => 'North',
            'S' => 'South',
          ),
        ),
        'phpExifTag' => 'GPSDestLatitudeRef',
        'exiftoolDOMNode' => 'GPS:GPSDestLatitudeRef',
      ),
    ),
    20 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestLatitude',
        'title' => 'GPS Dest Latitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSDestLatitude',
        'exiftoolDOMNode' => 'GPS:GPSDestLatitude',
      ),
    ),
    21 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestLongitudeRef',
        'title' => 'GPS Dest Longitude Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'E' => 'East',
            'W' => 'West',
          ),
        ),
        'phpExifTag' => 'GPSDestLongitudeRef',
        'exiftoolDOMNode' => 'GPS:GPSDestLongitudeRef',
      ),
    ),
    22 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestLongitude',
        'title' => 'GPS Dest Longitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSDestLongitude',
        'exiftoolDOMNode' => 'GPS:GPSDestLongitude',
      ),
    ),
    23 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestBearingRef',
        'title' => 'GPS Dest Bearing Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'M' => 'Magnetic North',
            'T' => 'True North',
          ),
        ),
        'phpExifTag' => 'GPSDestBearingRef',
        'exiftoolDOMNode' => 'GPS:GPSDestBearingRef',
      ),
    ),
    24 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestBearing',
        'title' => 'GPS Dest Bearing',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSDestBearing',
        'exiftoolDOMNode' => 'GPS:GPSDestBearing',
      ),
    ),
    25 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestDistanceRef',
        'title' => 'GPS Dest Distance Ref',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            'K' => 'Kilometers',
            'M' => 'Miles',
            'N' => 'Nautical Miles',
          ),
        ),
        'phpExifTag' => 'GPSDestDistanceRef',
        'exiftoolDOMNode' => 'GPS:GPSDestDistanceRef',
      ),
    ),
    26 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDestDistance',
        'title' => 'GPS Dest Distance',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'GPSDestDistance',
        'exiftoolDOMNode' => 'GPS:GPSDestDistance',
      ),
    ),
    27 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSProcessingMethod',
        'title' => 'GPS Processing Method',
        'format' =>
        array (
          0 => 7,
        ),
        'phpExifTag' => 'GPSProcessingMode',
        'exiftoolDOMNode' => 'GPS:GPSProcessingMethod',
      ),
    ),
    28 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSAreaInformation',
        'title' => 'GPS Area Information',
        'format' =>
        array (
          0 => 7,
        ),
        'phpExifTag' => 'GPSAreaInformation',
        'exiftoolDOMNode' => 'GPS:GPSAreaInformation',
      ),
    ),
    29 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDateStamp',
        'title' => 'GPS Date Stamp',
        'components' => 11,
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'GPSDateStamp',
        'exiftoolDOMNode' => 'GPS:GPSDateStamp',
      ),
    ),
    30 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSDifferential',
        'title' => 'GPS Differential',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'No Correction',
            1 => 'Differential Corrected',
          ),
        ),
        'phpExifTag' => 'GPSDifferential',
        'exiftoolDOMNode' => 'GPS:GPSDifferential',
      ),
    ),
    31 =>
    array (
      0 =>
      array (
        'text' =>
        array (
          'default' => '{value} m',
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'GPSHPositioningError',
        'title' => 'GPS Horizontal Positioning Error',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'GPS:GPSHPositioningError',
      ),
    ),
  ),
);
}
