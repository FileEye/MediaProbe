<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class FunctionsD30 extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctionsD30',
  'title' => 'CanonCustom FunctionsD30',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
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
    ),
    2 =>
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
          2 => 'AF/AF lock',
          3 => 'AE+release/AE+AF',
        ),
      ),
    ),
    3 =>
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
    ),
    4 =>
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
          0 => '1/2 Stop',
          1 => '1/3 Stop',
        ),
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFAssist',
      'title' => 'AF Assist',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Emits/Fires',
          1 => 'Does not emit/Fires',
          2 => 'Only ext. flash emits/Fires',
          3 => 'Emits/Does not fire',
        ),
      ),
    ),
    6 =>
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
    ),
    7 =>
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
    ),
    8 =>
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
    ),
    9 =>
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
          0 => 'AF Stop',
          1 => 'Operate AF',
          2 => 'Lock AE and start timer',
        ),
      ),
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'FillFlashAutoReduction',
      'title' => 'Fill Flash Auto Reduction',
      'format' =>
      array (
        0 => 1,
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
      'name' => 'MenuButtonReturn',
      'title' => 'Menu Button Return',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Top',
          1 => 'Previous (volatile)',
          2 => 'Previous',
        ),
      ),
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'SetButtonWhenShooting',
      'title' => 'Set Button When Shooting',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Default (no function)',
          1 => 'Image quality',
          2 => 'Change ISO speed',
          3 => 'Change parameters',
        ),
      ),
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'SensorCleaning',
      'title' => 'Sensor Cleaning',
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
    ),
    14 =>
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
    ),
    15 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterReleaseNoCFCard',
      'title' => 'Shutter Release W/O CF Card',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Yes',
          1 => 'No',
        ),
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'AEBSequenceAutoCancel' => 7,
    'AFAssist' => 5,
    'ExposureLevelIncrements' => 4,
    'FillFlashAutoReduction' => 10,
    'FlashSyncSpeedAv' => 6,
    'LensAFStopButton' => 9,
    'LongExposureNoiseReduction' => 1,
    'MenuButtonReturn' => 11,
    'MirrorLockup' => 3,
    'SensorCleaning' => 13,
    'SetButtonWhenShooting' => 12,
    'Shutter-AELock' => 2,
    'ShutterCurtainSync' => 8,
    'ShutterReleaseNoCFCard' => 15,
    'SuperimposedDisplay' => 14,
  ),
);
}
