<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Ifd;

use FileEye\MediaProbe\Collection;

class Gps extends Collection {

  protected static $map = array (
  'name' => 'GPS',
  'title' => 'IFD GPS',
  'class' => 'FileEye\\MediaProbe\\Block\\Ifd',
  'DOMNode' => 'ifd',
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSVersionId',
      'collection' => 'Tag',
      'name' => 'GPSVersionID',
      'title' => 'GPS Version ID',
      'components' => 4,
      'format' =>
      array (
        0 => 1,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
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
    ),
    2 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSDegrees',
      'collection' => 'Tag',
      'name' => 'GPSLatitude',
      'title' => 'GPS Latitude',
      'components' => 3,
      'format' =>
      array (
        0 => 5,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
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
    ),
    4 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\GPSDegrees',
      'collection' => 'Tag',
      'name' => 'GPSLongitude',
      'title' => 'GPS Longitude',
      'components' => 3,
      'format' =>
      array (
        0 => 5,
      ),
    ),
    5 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
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
    ),
    6 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'GPSAltitude',
      'title' => 'GPS Altitude',
      'format' =>
      array (
        0 => 5,
      ),
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSTimeStamp',
      'title' => 'GPS Time Stamp',
      'components' => 3,
      'format' =>
      array (
        0 => 5,
      ),
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSSatellites',
      'title' => 'GPS Satellites',
      'format' =>
      array (
        0 => 2,
      ),
    ),
    9 =>
    array (
      'collection' => 'Tag',
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
    ),
    10 =>
    array (
      'collection' => 'Tag',
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
    ),
    11 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'GPSDOP',
      'title' => 'GPS Dilution Of Precision',
      'format' =>
      array (
        0 => 5,
      ),
    ),
    12 =>
    array (
      'collection' => 'Tag',
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
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSSpeed',
      'title' => 'GPS Speed',
      'format' =>
      array (
        0 => 5,
      ),
    ),
    14 =>
    array (
      'collection' => 'Tag',
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
    ),
    15 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'GPSTrack',
      'title' => 'GPS Track',
      'format' =>
      array (
        0 => 5,
      ),
    ),
    16 =>
    array (
      'collection' => 'Tag',
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
    ),
    17 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'GPSImgDirection',
      'title' => 'GPS Img Direction',
      'format' =>
      array (
        0 => 5,
      ),
    ),
    18 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSMapDatum',
      'title' => 'GPS Map Datum',
      'format' =>
      array (
        0 => 2,
      ),
    ),
    19 =>
    array (
      'collection' => 'Tag',
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
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSDestLatitude',
      'title' => 'GPS Dest Latitude',
      'components' => 3,
      'format' =>
      array (
        0 => 5,
      ),
    ),
    21 =>
    array (
      'collection' => 'Tag',
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
    ),
    22 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSDestLongitude',
      'title' => 'GPS Dest Longitude',
      'components' => 3,
      'format' =>
      array (
        0 => 5,
      ),
    ),
    23 =>
    array (
      'collection' => 'Tag',
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
    ),
    24 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'GPSDestBearing',
      'title' => 'GPS Dest Bearing',
      'format' =>
      array (
        0 => 5,
      ),
    ),
    25 =>
    array (
      'collection' => 'Tag',
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
    ),
    26 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'GPSDestDistance',
      'title' => 'GPS Dest Distance',
      'format' =>
      array (
        0 => 5,
      ),
    ),
    27 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSProcessingMethod',
      'title' => 'GPS Processing Method',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    28 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSAreaInformation',
      'title' => 'GPS Area Information',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    29 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSDateStamp',
      'title' => 'GPS Date Stamp',
      'components' => 11,
      'format' =>
      array (
        0 => 2,
      ),
    ),
    30 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
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
    ),
    31 =>
    array (
      'collection' => 'Tag',
      'name' => 'GPSHPositioningError',
      'title' => 'GPS Horizontal Positioning Error',
      'format' =>
      array (
        0 => 5,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'GPSAltitude' => 6,
    'GPSAltitudeRef' => 5,
    'GPSAreaInformation' => 28,
    'GPSDOP' => 11,
    'GPSDateStamp' => 29,
    'GPSDestBearing' => 24,
    'GPSDestBearingRef' => 23,
    'GPSDestDistance' => 26,
    'GPSDestDistanceRef' => 25,
    'GPSDestLatitude' => 20,
    'GPSDestLatitudeRef' => 19,
    'GPSDestLongitude' => 22,
    'GPSDestLongitudeRef' => 21,
    'GPSDifferential' => 30,
    'GPSHPositioningError' => 31,
    'GPSImgDirection' => 17,
    'GPSImgDirectionRef' => 16,
    'GPSLatitude' => 2,
    'GPSLatitudeRef' => 1,
    'GPSLongitude' => 4,
    'GPSLongitudeRef' => 3,
    'GPSMapDatum' => 18,
    'GPSMeasureMode' => 10,
    'GPSProcessingMethod' => 27,
    'GPSSatellites' => 8,
    'GPSSpeed' => 13,
    'GPSSpeedRef' => 12,
    'GPSStatus' => 9,
    'GPSTimeStamp' => 7,
    'GPSTrack' => 15,
    'GPSTrackRef' => 14,
    'GPSVersionID' => 0,
  ),
);
}
