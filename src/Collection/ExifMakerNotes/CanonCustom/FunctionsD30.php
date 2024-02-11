<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection\CollectionBase;

class FunctionsD30 extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonCustomFunctionsD30',
  'title' => 'CanonCustom FunctionsD30',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\CanonCustom\\FunctionsD30',
  'itemsByName' =>
  array (
    'AEBSequenceAutoCancel' =>
    array (
      0 => 7,
    ),
    'AFAssist' =>
    array (
      0 => 5,
    ),
    'ExposureLevelIncrements' =>
    array (
      0 => 4,
    ),
    'FillFlashAutoReduction' =>
    array (
      0 => 10,
    ),
    'FlashSyncSpeedAv' =>
    array (
      0 => 6,
    ),
    'LensAFStopButton' =>
    array (
      0 => 9,
    ),
    'LongExposureNoiseReduction' =>
    array (
      0 => 1,
    ),
    'MenuButtonReturn' =>
    array (
      0 => 11,
    ),
    'MirrorLockup' =>
    array (
      0 => 3,
    ),
    'SensorCleaning' =>
    array (
      0 => 13,
    ),
    'SetButtonWhenShooting' =>
    array (
      0 => 12,
    ),
    'Shutter-AELock' =>
    array (
      0 => 2,
    ),
    'ShutterCurtainSync' =>
    array (
      0 => 8,
    ),
    'ShutterReleaseNoCFCard' =>
    array (
      0 => 15,
    ),
    'SuperimposedDisplay' =>
    array (
      0 => 14,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonCustom:AEBSequenceAutoCancel' =>
    array (
      0 => 7,
    ),
    'CanonCustom:AFAssist' =>
    array (
      0 => 5,
    ),
    'CanonCustom:ExposureLevelIncrements' =>
    array (
      0 => 4,
    ),
    'CanonCustom:FillFlashAutoReduction' =>
    array (
      0 => 10,
    ),
    'CanonCustom:FlashSyncSpeedAv' =>
    array (
      0 => 6,
    ),
    'CanonCustom:LensAFStopButton' =>
    array (
      0 => 9,
    ),
    'CanonCustom:LongExposureNoiseReduction' =>
    array (
      0 => 1,
    ),
    'CanonCustom:MenuButtonReturn' =>
    array (
      0 => 11,
    ),
    'CanonCustom:MirrorLockup' =>
    array (
      0 => 3,
    ),
    'CanonCustom:SensorCleaning' =>
    array (
      0 => 13,
    ),
    'CanonCustom:SetButtonWhenShooting' =>
    array (
      0 => 12,
    ),
    'CanonCustom:Shutter-AELock' =>
    array (
      0 => 2,
    ),
    'CanonCustom:ShutterCurtainSync' =>
    array (
      0 => 8,
    ),
    'CanonCustom:ShutterReleaseNoCFCard' =>
    array (
      0 => 15,
    ),
    'CanonCustom:SuperimposedDisplay' =>
    array (
      0 => 14,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:Shutter-AELock',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:ExposureLevelIncrements',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:AFAssist',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:LensAFStopButton',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:FillFlashAutoReduction',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:MenuButtonReturn',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:SetButtonWhenShooting',
      ),
    ),
    13 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:SensorCleaning',
      ),
    ),
    14 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    15 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
        'exiftoolDOMNode' => 'CanonCustom:ShutterReleaseNoCFCard',
      ),
    ),
  ),
);
}
