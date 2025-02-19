<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class ShotInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonShotInfo',
  'title' => 'Shot Information',
  'handler' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\ShotInfo',
  'itemsByName' =>
  array (
    'AEBBracketValue' =>
    array (
      0 => 17,
    ),
    'AFPointsInFocus' =>
    array (
      0 => 14,
    ),
    'AutoExposureBracketing' =>
    array (
      0 => 16,
    ),
    'AutoISO' =>
    array (
      0 => 1,
    ),
    'AutoRotate' =>
    array (
      0 => 27,
    ),
    'BaseISO' =>
    array (
      0 => 2,
    ),
    'BulbDuration' =>
    array (
      0 => 24,
    ),
    'CameraTemperature' =>
    array (
      0 => 12,
    ),
    'CameraType' =>
    array (
      0 => 26,
    ),
    'ControlMode' =>
    array (
      0 => 18,
    ),
    'ExposureCompensation' =>
    array (
      0 => 6,
    ),
    'ExposureTime' =>
    array (
      0 => 22,
    ),
    'FNumber' =>
    array (
      0 => 21,
    ),
    'FlashExposureComp' =>
    array (
      0 => 15,
    ),
    'FlashGuideNumber' =>
    array (
      0 => 13,
    ),
    'FlashOutput' =>
    array (
      0 => 33,
    ),
    'FocusDistanceLower' =>
    array (
      0 => 20,
    ),
    'FocusDistanceUpper' =>
    array (
      0 => 19,
    ),
    'MeasuredEV' =>
    array (
      0 => 3,
    ),
    'MeasuredEV2' =>
    array (
      0 => 23,
    ),
    'NDFilter' =>
    array (
      0 => 28,
    ),
    'OpticalZoomCode' =>
    array (
      0 => 10,
    ),
    'SelfTimer2' =>
    array (
      0 => 29,
    ),
    'SequenceNumber' =>
    array (
      0 => 9,
    ),
    'SlowShutter' =>
    array (
      0 => 8,
    ),
    'TargetAperture' =>
    array (
      0 => 4,
    ),
    'TargetExposureTime' =>
    array (
      0 => 5,
    ),
    'WhiteBalance' =>
    array (
      0 => 7,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AEBBracketValue' =>
    array (
      0 => 17,
    ),
    'Canon:AFPointsInFocus' =>
    array (
      0 => 14,
    ),
    'Canon:AutoExposureBracketing' =>
    array (
      0 => 16,
    ),
    'Canon:AutoISO' =>
    array (
      0 => 1,
    ),
    'Canon:AutoRotate' =>
    array (
      0 => 27,
    ),
    'Canon:BaseISO' =>
    array (
      0 => 2,
    ),
    'Canon:BulbDuration' =>
    array (
      0 => 24,
    ),
    'Canon:CameraTemperature' =>
    array (
      0 => 12,
    ),
    'Canon:CameraType' =>
    array (
      0 => 26,
    ),
    'Canon:ControlMode' =>
    array (
      0 => 18,
    ),
    'Canon:ExposureCompensation' =>
    array (
      0 => 6,
    ),
    'Canon:ExposureTime' =>
    array (
      0 => 22,
    ),
    'Canon:FNumber' =>
    array (
      0 => 21,
    ),
    'Canon:FlashExposureComp' =>
    array (
      0 => 15,
    ),
    'Canon:FlashGuideNumber' =>
    array (
      0 => 13,
    ),
    'Canon:FlashOutput' =>
    array (
      0 => 33,
    ),
    'Canon:FocusDistanceLower' =>
    array (
      0 => 20,
    ),
    'Canon:FocusDistanceUpper' =>
    array (
      0 => 19,
    ),
    'Canon:MeasuredEV' =>
    array (
      0 => 3,
    ),
    'Canon:MeasuredEV2' =>
    array (
      0 => 23,
    ),
    'Canon:NDFilter' =>
    array (
      0 => 28,
    ),
    'Canon:OpticalZoomCode' =>
    array (
      0 => 10,
    ),
    'Canon:SelfTimer2' =>
    array (
      0 => 29,
    ),
    'Canon:SequenceNumber' =>
    array (
      0 => 9,
    ),
    'Canon:SlowShutter' =>
    array (
      0 => 8,
    ),
    'Canon:TargetAperture' =>
    array (
      0 => 4,
    ),
    'Canon:TargetExposureTime' =>
    array (
      0 => 5,
    ),
    'Canon:WhiteBalance' =>
    array (
      0 => 7,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\AutoIso',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AutoISO',
        'title' => 'Auto ISO',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AutoISO',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\BaseIso',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'BaseISO',
        'title' => 'Base ISO',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BaseISO',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\MeasuredEV',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MeasuredEV',
        'title' => 'Measured EV',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:MeasuredEV',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ApertureValue',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'TargetAperture',
        'title' => 'Target Aperture',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:TargetAperture',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\TargetExposureTime',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'TargetExposureTime',
        'title' => 'Target Exposure Time',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:TargetExposureTime',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ExposureCompensation',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ExposureCompensation',
        'title' => 'Exposure Compensation',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:ExposureCompensation',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'WhiteBalance',
        'title' => 'White Balance',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Auto',
            1 => 'Daylight',
            2 => 'Cloudy',
            3 => 'Tungsten',
            4 => 'Fluorescent',
            5 => 'Flash',
            6 => 'Custom',
            7 => 'Black & White',
            8 => 'Shade',
            9 => 'Manual Temperature (Kelvin)',
            10 => 'PC Set1',
            11 => 'PC Set2',
            12 => 'PC Set3',
            14 => 'Daylight Fluorescent',
            15 => 'Custom 1',
            16 => 'Custom 2',
            17 => 'Underwater',
            18 => 'Custom 3',
            19 => 'Custom 4',
            20 => 'PC Set4',
            21 => 'PC Set5',
            23 => 'Auto (ambience priority)',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:WhiteBalance',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SlowShutter',
        'title' => 'Slow Shutter',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'n/a',
            0 => 'Off',
            1 => 'Night Scene',
            2 => 'On',
            3 => 'None',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:SlowShutter',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SequenceNumber',
        'title' => 'Shot Number In Continuous Burst',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SequenceNumber',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ShotInfo\\OpticalZoomCode',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'OpticalZoomCode',
        'title' => 'Optical Zoom Code',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:OpticalZoomCode',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\CameraTemperature',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'CameraTemperature',
        'title' => 'Camera Temperature',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:CameraTemperature',
      ),
    ),
    13 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FlashGuideNumber',
        'title' => 'Flash Guide Number',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:FlashGuideNumber',
      ),
    ),
    14 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ShotInfo\\AFPointsInFocus',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AFPointsInFocus',
        'title' => 'AF Points In Focus',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            12288 => 'None (MF)',
            12289 => 'Right',
            12290 => 'Center',
            12291 => 'Center+Right',
            12292 => 'Left',
            12293 => 'Left+Right',
            12294 => 'Left+Center',
            12295 => 'All',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:AFPointsInFocus',
      ),
    ),
    15 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FlashExposureComp',
        'title' => 'Flash Exposure Compensation',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:FlashExposureComp',
      ),
    ),
    16 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AutoExposureBracketing',
        'title' => 'Auto Exposure Bracketing',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'On',
            0 => 'Off',
            1 => 'On (shot 1)',
            2 => 'On (shot 2)',
            3 => 'On (shot 3)',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:AutoExposureBracketing',
      ),
    ),
    17 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AEBBracketValue',
        'title' => 'AEB Bracket Value',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:AEBBracketValue',
      ),
    ),
    18 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ControlMode',
        'title' => 'Control Mode',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'n/a',
            1 => 'Camera Local Control',
            3 => 'Computer Remote Control',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:ControlMode',
      ),
    ),
    19 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ShotInfo\\FocusDistanceUpper',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FocusDistanceUpper',
        'title' => 'Focus Distance Upper',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocusDistanceUpper',
      ),
    ),
    20 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ShotInfo\\FocusDistanceLower',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FocusDistanceLower',
        'title' => 'Focus Distance Lower',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocusDistanceLower',
      ),
    ),
    21 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ShotInfo\\FNumber',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FNumber',
        'title' => 'F Number',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:FNumber',
      ),
    ),
    22 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ExposureTime',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ExposureTime',
        'title' => 'Exposure Time',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:ExposureTime',
      ),
      1 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\ExposureTime',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ExposureTime',
        'title' => 'Exposure Time',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:ExposureTime',
      ),
    ),
    23 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\MeasuredEV2',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MeasuredEV2',
        'title' => 'Measured EV 2',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:MeasuredEV2',
      ),
    ),
    24 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\BulbDuration',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'BulbDuration',
        'title' => 'Bulb Duration',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:BulbDuration',
      ),
    ),
    26 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'CameraType',
        'title' => 'Camera Type',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'n/a',
            248 => 'EOS High-end',
            250 => 'Compact',
            252 => 'EOS Mid-range',
            255 => 'DV Camera',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:CameraType',
      ),
    ),
    27 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AutoRotate',
        'title' => 'Auto Rotate',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'n/a',
            0 => 'None',
            1 => 'Rotate 90 CW',
            2 => 'Rotate 180',
            3 => 'Rotate 270 CW',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:AutoRotate',
      ),
    ),
    28 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'NDFilter',
        'title' => 'ND Filter',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'n/a',
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:NDFilter',
      ),
    ),
    29 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SelfTimer2',
        'title' => 'Self Timer 2',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:SelfTimer2',
      ),
    ),
    33 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FlashOutput',
        'title' => 'Flash Output',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:FlashOutput',
      ),
    ),
  ),
);
}
