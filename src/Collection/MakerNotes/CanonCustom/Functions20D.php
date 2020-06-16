<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions20D extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions20D',
  'title' => 'CanonCustom Functions20D',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AEBSequenceAutoCancel' => 8,
    'AFAssistBeam' => 4,
    'AFPointSelectionMethod' => 12,
    'AddOriginalDecisionData' => 17,
    'ETTLII' => 13,
    'ExposureLevelIncrements' => 5,
    'FlashFiring' => 6,
    'FlashSyncSpeedAv' => 2,
    'ISOExpansion' => 7,
    'LensAFStopButton' => 16,
    'LongExposureNoiseReduction' => 1,
    'MenuButtonDisplayPosition' => 10,
    'MirrorLockup' => 11,
    'SafetyShiftInAvOrTv' => 15,
    'SetFunctionWhenShooting' => 0,
    'Shutter-AELock' => 3,
    'ShutterCurtainSync' => 14,
    'SuperimposedDisplay' => 9,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonCustom:AEBSequenceAutoCancel' => 8,
    'CanonCustom:AFAssistBeam' => 4,
    'CanonCustom:AFPointSelectionMethod' => 12,
    'CanonCustom:AddOriginalDecisionData' => 17,
    'CanonCustom:ETTLII' => 13,
    'CanonCustom:ExposureLevelIncrements' => 5,
    'CanonCustom:FlashFiring' => 6,
    'CanonCustom:FlashSyncSpeedAv' => 2,
    'CanonCustom:ISOExpansion' => 7,
    'CanonCustom:LensAFStopButton' => 16,
    'CanonCustom:LongExposureNoiseReduction' => 1,
    'CanonCustom:MenuButtonDisplayPosition' => 10,
    'CanonCustom:MirrorLockup' => 11,
    'CanonCustom:SafetyShiftInAvOrTv' => 15,
    'CanonCustom:SetFunctionWhenShooting' => 0,
    'CanonCustom:Shutter-AELock' => 3,
    'CanonCustom:ShutterCurtainSync' => 14,
    'CanonCustom:SuperimposedDisplay' => 9,
  ),
  'items' =>
  array (
    0 =>
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
    1 =>
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
          1 => 'On',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:LongExposureNoiseReduction',
    ),
    2 =>
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
          1 => '1/250 Fixed',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:FlashSyncSpeedAv',
    ),
    3 =>
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
    4 =>
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
          2 => 'Only ext. flash emits',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFAssistBeam',
    ),
    5 =>
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
    6 =>
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
    7 =>
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
    8 =>
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
    9 =>
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
    10 =>
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
    11 =>
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
    12 =>
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
    13 =>
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
    14 =>
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
    15 =>
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
    16 =>
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
    17 =>
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
