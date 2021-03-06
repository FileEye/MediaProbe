<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions5D extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions5D',
  'title' => 'CanonCustom Functions5D',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AEBSequenceAutoCancel' => 9,
    'AFAssistBeam' => 5,
    'AFPointActivationArea' => 17,
    'AFPointSelectionMethod' => 13,
    'AddOriginalDecisionData' => 20,
    'ETTLII' => 14,
    'ExposureLevelIncrements' => 6,
    'FlashFiring' => 7,
    'FlashSyncSpeedAv' => 3,
    'FocusingScreen' => 0,
    'ISOExpansion' => 8,
    'LCDDisplayReturnToShoot' => 18,
    'LensAFStopButton' => 19,
    'LongExposureNoiseReduction' => 2,
    'MenuButtonDisplayPosition' => 11,
    'MirrorLockup' => 12,
    'SafetyShiftInAvOrTv' => 16,
    'SetFunctionWhenShooting' => 1,
    'Shutter-AELock' => 4,
    'ShutterCurtainSync' => 15,
    'SuperimposedDisplay' => 10,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonCustom:AEBSequenceAutoCancel' => 9,
    'CanonCustom:AFAssistBeam' => 5,
    'CanonCustom:AFPointActivationArea' => 17,
    'CanonCustom:AFPointSelectionMethod' => 13,
    'CanonCustom:AddOriginalDecisionData' => 20,
    'CanonCustom:ETTLII' => 14,
    'CanonCustom:ExposureLevelIncrements' => 6,
    'CanonCustom:FlashFiring' => 7,
    'CanonCustom:FlashSyncSpeedAv' => 3,
    'CanonCustom:FocusingScreen' => 0,
    'CanonCustom:ISOExpansion' => 8,
    'CanonCustom:LCDDisplayReturnToShoot' => 18,
    'CanonCustom:LensAFStopButton' => 19,
    'CanonCustom:LongExposureNoiseReduction' => 2,
    'CanonCustom:MenuButtonDisplayPosition' => 11,
    'CanonCustom:MirrorLockup' => 12,
    'CanonCustom:SafetyShiftInAvOrTv' => 16,
    'CanonCustom:SetFunctionWhenShooting' => 1,
    'CanonCustom:Shutter-AELock' => 4,
    'CanonCustom:ShutterCurtainSync' => 15,
    'CanonCustom:SuperimposedDisplay' => 10,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusingScreen',
      'title' => 'Focusing Screen',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Ee-A',
          1 => 'Ee-D',
          2 => 'Ee-S',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:FocusingScreen',
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'SetFunctionWhenShooting',
      'title' => 'Set Function When Shooting',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Default (no function)',
          1 => 'Change quality',
          2 => 'Change Parameters',
          3 => 'Menu display',
          4 => 'Image replay',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:SetFunctionWhenShooting',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'LongExposureNoiseReduction',
      'title' => 'Long Exposure Noise Reduction',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'Auto',
          2 => 'On',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:LongExposureNoiseReduction',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashSyncSpeedAv',
      'title' => 'Flash Sync Speed Av',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => '1/200 Fixed',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:FlashSyncSpeedAv',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'Shutter-AELock',
      'title' => 'Shutter-AE Lock',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'AF/AE lock',
          1 => 'AE lock/AF',
          2 => 'AF/AF lock, No AE lock',
          3 => 'AE/AF, No AE lock',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:Shutter-AELock',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFAssistBeam',
      'title' => 'AF Assist Beam',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Emits',
          1 => 'Does not emit',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFAssistBeam',
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureLevelIncrements',
      'title' => 'Exposure Level Increments',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '1/3 Stop',
          1 => '1/2 Stop',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ExposureLevelIncrements',
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashFiring',
      'title' => 'Flash Firing',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Fires',
          1 => 'Does not fire',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:FlashFiring',
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISOExpansion',
      'title' => 'ISO Expansion',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'On',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ISOExpansion',
    ),
    9 =>
    array (
      'collection' => 'Tag',
      'name' => 'AEBSequenceAutoCancel',
      'title' => 'AEB Sequence/Auto Cancel',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '0,-,+/Enabled',
          1 => '0,-,+/Disabled',
          2 => '-,0,+/Enabled',
          3 => '-,0,+/Disabled',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AEBSequenceAutoCancel',
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'SuperimposedDisplay',
      'title' => 'Superimposed Display',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'On',
          1 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:SuperimposedDisplay',
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'MenuButtonDisplayPosition',
      'title' => 'Menu Button Display Position',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Previous (top if power off)',
          1 => 'Previous',
          2 => 'Top',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:MenuButtonDisplayPosition',
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'MirrorLockup',
      'title' => 'Mirror Lockup',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Enable',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:MirrorLockup',
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointSelectionMethod',
      'title' => 'AF Point Selection Method',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Multi-controller direct',
          2 => 'Quick Control Dial direct',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFPointSelectionMethod',
    ),
    14 =>
    array (
      'collection' => 'Tag',
      'name' => 'ETTLII',
      'title' => 'E-TTL II',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Evaluative',
          1 => 'Average',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ETTLII',
    ),
    15 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterCurtainSync',
      'title' => 'Shutter Curtain Sync',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '1st-curtain sync',
          1 => '2nd-curtain sync',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ShutterCurtainSync',
    ),
    16 =>
    array (
      'collection' => 'Tag',
      'name' => 'SafetyShiftInAvOrTv',
      'title' => 'Safety Shift In Av Or Tv',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Enable',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:SafetyShiftInAvOrTv',
    ),
    17 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointActivationArea',
      'title' => 'AF Point Activation Area',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Standard',
          1 => 'Expanded',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFPointActivationArea',
    ),
    18 =>
    array (
      'collection' => 'Tag',
      'name' => 'LCDDisplayReturnToShoot',
      'title' => 'LCD Display Return To Shoot',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'With Shutter Button only',
          1 => 'Also with * etc.',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:LCDDisplayReturnToShoot',
    ),
    19 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensAFStopButton',
      'title' => 'Lens AF Stop Button',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'AF stop',
          1 => 'AF start',
          2 => 'AE lock while metering',
          3 => 'AF point: M -> Auto / Auto -> Ctr.',
          4 => 'ONE SHOT <-> AI SERVO',
          5 => 'IS start',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:LensAFStopButton',
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'AddOriginalDecisionData',
      'title' => 'Add Original Decision Data',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'On',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AddOriginalDecisionData',
    ),
  ),
);
}
