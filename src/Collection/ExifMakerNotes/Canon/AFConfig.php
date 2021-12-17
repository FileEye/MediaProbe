<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

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
  'itemsByName' =>
  array (
    'AFAccelDecelTracking' =>
    array (
      0 => 3,
    ),
    'AFAreaSelectionMethod' =>
    array (
      0 => 13,
    ),
    'AFAssistBeam' =>
    array (
      0 => 8,
    ),
    'AFConfigTool' =>
    array (
      0 => 1,
    ),
    'AFPointDisplayDuringFocus' =>
    array (
      0 => 16,
    ),
    'AFPointSwitching' =>
    array (
      0 => 4,
    ),
    'AFStatusViewfinder' =>
    array (
      0 => 18,
    ),
    'AFTrackingSensitivity' =>
    array (
      0 => 2,
    ),
    'AIServoFirstImage' =>
    array (
      0 => 5,
    ),
    'AIServoSecondImage' =>
    array (
      0 => 6,
    ),
    'AutoAFPointSelEOSiTRAF' =>
    array (
      0 => 10,
    ),
    'InitialAFPointInServo' =>
    array (
      0 => 19,
    ),
    'LensDriveWhenAFImpossible' =>
    array (
      0 => 11,
    ),
    'ManualAFPointSelPattern' =>
    array (
      0 => 15,
    ),
    'OneShotAFRelease' =>
    array (
      0 => 9,
    ),
    'OrientationLinkedAF' =>
    array (
      0 => 14,
    ),
    'SelectAFAreaSelectionMode' =>
    array (
      0 => 12,
    ),
    'USMLensElectronicMF' =>
    array (
      0 => 7,
    ),
    'VFDisplayIllumination' =>
    array (
      0 => 17,
    ),
    'indexSize' =>
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
        'collection' => 'RawData',
        'name' => 'indexSize',
        'format' =>
        array (
          0 => 4,
        ),
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFConfigTool',
        'title' => 'AF Config Tool',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Canon:AFConfigTool',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFTrackingSensitivity',
        'title' => 'AF Tracking Sensitivity',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Canon:AFTrackingSensitivity',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFAccelDecelTracking',
        'title' => 'AF Accel/Decel Tracking',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Canon:AFAccelDecelTracking',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFPointSwitching',
        'title' => 'AF Point Switching',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Canon:AFPointSwitching',
      ),
    ),
    5 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AIServoFirstImage',
      ),
    ),
    6 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AIServoSecondImage',
      ),
    ),
    7 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:USMLensElectronicMF',
      ),
    ),
    8 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AFAssistBeam',
      ),
    ),
    9 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:OneShotAFRelease',
      ),
    ),
    10 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AutoAFPointSelEOSiTRAF',
      ),
    ),
    11 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:LensDriveWhenAFImpossible',
      ),
    ),
    12 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:SelectAFAreaSelectionMode',
      ),
    ),
    13 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AFAreaSelectionMethod',
      ),
    ),
    14 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:OrientationLinkedAF',
      ),
    ),
    15 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:ManualAFPointSelPattern',
      ),
    ),
    16 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AFPointDisplayDuringFocus',
      ),
    ),
    17 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:VFDisplayIllumination',
      ),
    ),
    18 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AFStatusViewfinder',
      ),
    ),
    19 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:InitialAFPointInServo',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AFAccelDecelTracking' =>
    array (
      0 => 3,
    ),
    'Canon:AFAreaSelectionMethod' =>
    array (
      0 => 13,
    ),
    'Canon:AFAssistBeam' =>
    array (
      0 => 8,
    ),
    'Canon:AFConfigTool' =>
    array (
      0 => 1,
    ),
    'Canon:AFPointDisplayDuringFocus' =>
    array (
      0 => 16,
    ),
    'Canon:AFPointSwitching' =>
    array (
      0 => 4,
    ),
    'Canon:AFStatusViewfinder' =>
    array (
      0 => 18,
    ),
    'Canon:AFTrackingSensitivity' =>
    array (
      0 => 2,
    ),
    'Canon:AIServoFirstImage' =>
    array (
      0 => 5,
    ),
    'Canon:AIServoSecondImage' =>
    array (
      0 => 6,
    ),
    'Canon:AutoAFPointSelEOSiTRAF' =>
    array (
      0 => 10,
    ),
    'Canon:InitialAFPointInServo' =>
    array (
      0 => 19,
    ),
    'Canon:LensDriveWhenAFImpossible' =>
    array (
      0 => 11,
    ),
    'Canon:ManualAFPointSelPattern' =>
    array (
      0 => 15,
    ),
    'Canon:OneShotAFRelease' =>
    array (
      0 => 9,
    ),
    'Canon:OrientationLinkedAF' =>
    array (
      0 => 14,
    ),
    'Canon:SelectAFAreaSelectionMode' =>
    array (
      0 => 12,
    ),
    'Canon:USMLensElectronicMF' =>
    array (
      0 => 7,
    ),
    'Canon:VFDisplayIllumination' =>
    array (
      0 => 17,
    ),
  ),
);
}