<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class AFConfig extends Collection {

  protected static $map = array (
  'name' => 'CanonAFConfig',
  'title' => 'Canon AF Config',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'hasIndexSize' => true,
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'RawData',
      'name' => 'indexSize',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFConfigTool',
      'title' => 'AF Config Tool',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFTrackingSensitivity',
      'title' => 'AF Tracking Sensitivity',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFAccelDecelTracking',
      'title' => 'AF Accel/Decel Tracking',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointSwitching',
      'title' => 'AF Point Switching',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoFirstImage',
      'title' => 'AI Servo First Image',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Equal Priority',
          1 => 'Release Priority',
          2 => 'Focus Priority',
        ),
      ),
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoSecondImage',
      'title' => 'AI Servo Second Image',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Equal Priority',
          1 => 'Release Priority',
          2 => 'Focus Priority',
          3 => 'Release High Priority',
          4 => 'Focus High Priority',
        ),
      ),
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'USMLensElectronicMF',
      'title' => 'USM Lens Electronic MF',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Enable After AF',
          1 => 'Disable After AF',
          2 => 'Disable in AF Mode',
        ),
      ),
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFAssistBeam',
      'title' => 'AF Assist Beam',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Enable',
          1 => 'Disable',
          2 => 'IR AF Assist Beam Only',
        ),
      ),
    ),
    9 =>
    array (
      'collection' => 'Tag',
      'name' => 'OneShotAFRelease',
      'title' => 'One Shot AF Release',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Focus Priority',
          1 => 'Release Priority',
        ),
      ),
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoAFPointSelEOSiTRAF',
      'title' => 'Auto AF Point Sel EOS iTR AF',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Enable',
          1 => 'Disable',
        ),
      ),
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensDriveWhenAFImpossible',
      'title' => 'Lens Drive When AF Impossible',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Continue Focus Search',
          1 => 'Stop Focus Search',
        ),
      ),
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'SelectAFAreaSelectionMode',
      'title' => 'Select AF Area Selection Mode',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Single-point AF',
          2 => 'Auto',
          4 => 'Zone AF',
          8 => 'AF Point Expansion (4 point)',
          16 => 'Spot AF',
          32 => 'AF Point Expansion (8 point)',
        ),
      ),
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFAreaSelectionMethod',
      'title' => 'AF Area Selection Method',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'M-Fn Button',
          1 => 'Main Dial',
        ),
      ),
    ),
    14 =>
    array (
      'collection' => 'Tag',
      'name' => 'OrientationLinkedAF',
      'title' => 'Orientation Linked AF',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Same for Vert/Horiz Points',
          1 => 'Separate Vert/Horiz Points',
          2 => 'Separate Area+Points',
        ),
      ),
    ),
    15 =>
    array (
      'collection' => 'Tag',
      'name' => 'ManualAFPointSelPattern',
      'title' => 'Manual AF Point Sel Pattern',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Stops at AF Area Edges',
          1 => 'Continuous',
        ),
      ),
    ),
    16 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointDisplayDuringFocus',
      'title' => 'AF Point Display During Focus',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Selected (constant)',
          1 => 'All (constant)',
          2 => 'Selected (pre-AF, focused)',
          3 => 'Selected (focused)',
          4 => 'Disabled',
        ),
      ),
    ),
    17 =>
    array (
      'collection' => 'Tag',
      'name' => 'VFDisplayIllumination',
      'title' => 'VF Display Illumination',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => 'Enable',
          2 => 'Disable',
        ),
      ),
    ),
    18 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFStatusViewfinder',
      'title' => 'AF Status Viewfinder',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Show in Field of View',
          1 => 'Show Outside View',
        ),
      ),
    ),
    19 =>
    array (
      'collection' => 'Tag',
      'name' => 'InitialAFPointInServo',
      'title' => 'Initial AF Point In Servo',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Initial AF Point Selected',
          1 => 'Manual AF Point',
          2 => 'Auto',
        ),
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'AFAccelDecelTracking' => 3,
    'AFAreaSelectionMethod' => 13,
    'AFAssistBeam' => 8,
    'AFConfigTool' => 1,
    'AFPointDisplayDuringFocus' => 16,
    'AFPointSwitching' => 4,
    'AFStatusViewfinder' => 18,
    'AFTrackingSensitivity' => 2,
    'AIServoFirstImage' => 5,
    'AIServoSecondImage' => 6,
    'AutoAFPointSelEOSiTRAF' => 10,
    'InitialAFPointInServo' => 19,
    'LensDriveWhenAFImpossible' => 11,
    'ManualAFPointSelPattern' => 15,
    'OneShotAFRelease' => 9,
    'OrientationLinkedAF' => 14,
    'SelectAFAreaSelectionMode' => 12,
    'USMLensElectronicMF' => 7,
    'VFDisplayIllumination' => 17,
    'indexSize' => 0,
  ),
);
}
