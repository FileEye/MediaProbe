<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ShotInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonShotInfo',
  'title' => 'Shot Information',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AEBBracketValue' => 17,
    'AFPointsInFocus' => 14,
    'AutoExposureBracketing' => 16,
    'AutoISO' => 1,
    'AutoRotate' => 27,
    'BaseISO' => 2,
    'BulbDuration' => 24,
    'CameraTemperature' => 12,
    'CameraType' => 26,
    'ControlMode' => 18,
    'ExposureCompensation' => 6,
    'ExposureTime' => 22,
    'FNumber' => 21,
    'FlashExposureComp' => 15,
    'FlashGuideNumber' => 13,
    'FlashOutput' => 33,
    'FocusDistanceLower' => 20,
    'FocusDistanceUpper' => 19,
    'MeasuredEV' => 3,
    'MeasuredEV2' => 23,
    'NDFilter' => 28,
    'OpticalZoomCode' => 10,
    'SelfTimer2' => 29,
    'SequenceNumber' => 9,
    'SlowShutter' => 8,
    'TargetAperture' => 4,
    'TargetExposureTime' => 5,
    'WhiteBalance' => 7,
    'indexSize' => 0,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'RawData',
      'name' => 'indexSize',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoISO',
      'title' => 'Auto ISO',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:AutoISO',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'BaseISO',
      'title' => 'Base ISO',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:BaseISO',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'MeasuredEV',
      'title' => 'Measured EV',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:MeasuredEV',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'TargetAperture',
      'title' => 'Target Aperture',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:TargetAperture',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'TargetExposureTime',
      'title' => 'Target Exposure Time',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:TargetExposureTime',
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureCompensation',
      'title' => 'Exposure Compensation',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ExposureCompensation',
    ),
    7 =>
    array (
      'collection' => 'Tag',
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
    8 =>
    array (
      'collection' => 'Tag',
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
    9 =>
    array (
      'collection' => 'Tag',
      'name' => 'SequenceNumber',
      'title' => 'Shot Number In Continuous Burst',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:SequenceNumber',
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'OpticalZoomCode',
      'title' => 'Optical Zoom Code',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:OpticalZoomCode',
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraTemperature',
      'title' => 'Camera Temperature',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:CameraTemperature',
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashGuideNumber',
      'title' => 'Flash Guide Number',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:FlashGuideNumber',
    ),
    14 =>
    array (
      'collection' => 'Tag',
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
    15 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashExposureComp',
      'title' => 'Flash Exposure Compensation',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:FlashExposureComp',
    ),
    16 =>
    array (
      'collection' => 'Tag',
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
    17 =>
    array (
      'collection' => 'Tag',
      'name' => 'AEBBracketValue',
      'title' => 'AEB Bracket Value',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:AEBBracketValue',
    ),
    18 =>
    array (
      'collection' => 'Tag',
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
    19 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusDistanceUpper',
      'title' => 'Focus Distance Upper',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FocusDistanceUpper',
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusDistanceLower',
      'title' => 'Focus Distance Lower',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FocusDistanceLower',
    ),
    21 =>
    array (
      'collection' => 'Tag',
      'name' => 'FNumber',
      'title' => 'F Number',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:FNumber',
    ),
    22 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureTime',
      'title' => 'Exposure Time',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ExposureTime',
    ),
    23 =>
    array (
      'collection' => 'Tag',
      'name' => 'MeasuredEV2',
      'title' => 'Measured EV 2',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:MeasuredEV2',
    ),
    24 =>
    array (
      'collection' => 'Tag',
      'name' => 'BulbDuration',
      'title' => 'Bulb Duration',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:BulbDuration',
    ),
    26 =>
    array (
      'collection' => 'Tag',
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
    27 =>
    array (
      'collection' => 'Tag',
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
    28 =>
    array (
      'collection' => 'Tag',
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
    29 =>
    array (
      'collection' => 'Tag',
      'name' => 'SelfTimer2',
      'title' => 'Self Timer 2',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:SelfTimer2',
    ),
    33 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashOutput',
      'title' => 'Flash Output',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:FlashOutput',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AEBBracketValue' => 17,
    'Canon:AFPointsInFocus' => 14,
    'Canon:AutoExposureBracketing' => 16,
    'Canon:AutoISO' => 1,
    'Canon:AutoRotate' => 27,
    'Canon:BaseISO' => 2,
    'Canon:BulbDuration' => 24,
    'Canon:CameraTemperature' => 12,
    'Canon:CameraType' => 26,
    'Canon:ControlMode' => 18,
    'Canon:ExposureCompensation' => 6,
    'Canon:ExposureTime' => 22,
    'Canon:FNumber' => 21,
    'Canon:FlashExposureComp' => 15,
    'Canon:FlashGuideNumber' => 13,
    'Canon:FlashOutput' => 33,
    'Canon:FocusDistanceLower' => 20,
    'Canon:FocusDistanceUpper' => 19,
    'Canon:MeasuredEV' => 3,
    'Canon:MeasuredEV2' => 23,
    'Canon:NDFilter' => 28,
    'Canon:OpticalZoomCode' => 10,
    'Canon:SelfTimer2' => 29,
    'Canon:SequenceNumber' => 9,
    'Canon:SlowShutter' => 8,
    'Canon:TargetAperture' => 4,
    'Canon:TargetExposureTime' => 5,
    'Canon:WhiteBalance' => 7,
  ),
);
}
