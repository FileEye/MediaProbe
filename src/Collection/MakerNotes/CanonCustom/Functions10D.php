<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions10D extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions10D',
  'title' => 'CanonCustom Functions10D',
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
    'AFAssist' => 5,
    'AFPointRegistration' => 7,
    'AssistButtonFunction' => 13,
    'ExposureLevelIncrements' => 6,
    'FillFlashAutoReduction' => 14,
    'FlashSyncSpeedAv' => 3,
    'LensAFStopButton' => 17,
    'MenuButtonDisplayPosition' => 11,
    'MirrorLockup' => 12,
    'RawAndJpgRecording' => 8,
    'SafetyShiftInAvOrTv' => 16,
    'SetButtonWhenShooting' => 1,
    'Shutter-AELock' => 4,
    'ShutterCurtainSync' => 15,
    'ShutterReleaseNoCFCard' => 2,
    'SuperimposedDisplay' => 10,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonCustom:AEBSequenceAutoCancel' => 9,
    'CanonCustom:AFAssist' => 5,
    'CanonCustom:AFPointRegistration' => 7,
    'CanonCustom:AssistButtonFunction' => 13,
    'CanonCustom:ExposureLevelIncrements' => 6,
    'CanonCustom:FillFlashAutoReduction' => 14,
    'CanonCustom:FlashSyncSpeedAv' => 3,
    'CanonCustom:LensAFStopButton' => 17,
    'CanonCustom:MenuButtonDisplayPosition' => 11,
    'CanonCustom:MirrorLockup' => 12,
    'CanonCustom:RawAndJpgRecording' => 8,
    'CanonCustom:SafetyShiftInAvOrTv' => 16,
    'CanonCustom:SetButtonWhenShooting' => 1,
    'CanonCustom:Shutter-AELock' => 4,
    'CanonCustom:ShutterCurtainSync' => 15,
    'CanonCustom:ShutterReleaseNoCFCard' => 2,
    'CanonCustom:SuperimposedDisplay' => 10,
  ),
  'items' =>
  array (
    1 =>
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
          0 => 'Normal (disabled)',
          1 => 'Image quality',
          2 => 'Change parameters',
          3 => 'Menu display',
          4 => 'Image playback',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:SetButtonWhenShooting',
    ),
    2 =>
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
      'exiftoolDOMNode' => 'CanonCustom:ShutterReleaseNoCFCard',
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
      'name' => 'AFAssist',
      'title' => 'AF Assist/Flash Firing',
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
          0 => '1/2 Stop',
          1 => '1/3 Stop',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ExposureLevelIncrements',
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointRegistration',
      'title' => 'AF Point Registration',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Center',
          1 => 'Bottom',
          2 => 'Right',
          3 => 'Extreme Right',
          4 => 'Automatic',
          5 => 'Extreme Left',
          6 => 'Left',
          7 => 'Top',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFPointRegistration',
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawAndJpgRecording',
      'title' => 'Raw And Jpg Recording',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'RAW+Small/Normal',
          1 => 'RAW+Small/Fine',
          2 => 'RAW+Medium/Normal',
          3 => 'RAW+Medium/Fine',
          4 => 'RAW+Large/Normal',
          5 => 'RAW+Large/Fine',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:RawAndJpgRecording',
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
      'name' => 'AssistButtonFunction',
      'title' => 'Assist Button Function',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Select Home Position',
          2 => 'Select HP (while pressing)',
          3 => 'Av+/- (AF point by QCD)',
          4 => 'FE lock',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AssistButtonFunction',
    ),
    14 =>
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
      'exiftoolDOMNode' => 'CanonCustom:FillFlashAutoReduction',
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
          3 => 'AF point: M->Auto/Auto->ctr',
          4 => 'One Shot <-> AI servo',
          5 => 'IS start',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:LensAFStopButton',
    ),
  ),
);
}
