<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions350D extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions350D',
  'title' => 'CanonCustom Functions350D',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AFAssistBeam' => 4,
    'ETTLII' => 7,
    'ExposureLevelIncrements' => 5,
    'FlashSyncSpeedAv' => 2,
    'LongExposureNoiseReduction' => 1,
    'MirrorLockup' => 6,
    'SetButtonCrossKeysFunc' => 0,
    'Shutter-AELock' => 3,
    'ShutterCurtainSync' => 8,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonCustom:AFAssistBeam' => 4,
    'CanonCustom:ETTLII' => 7,
    'CanonCustom:ExposureLevelIncrements' => 5,
    'CanonCustom:FlashSyncSpeedAv' => 2,
    'CanonCustom:LongExposureNoiseReduction' => 1,
    'CanonCustom:MirrorLockup' => 6,
    'CanonCustom:SetButtonCrossKeysFunc' => 0,
    'CanonCustom:Shutter-AELock' => 3,
    'CanonCustom:ShutterCurtainSync' => 8,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'SetButtonCrossKeysFunc',
      'title' => 'Set Button Cross Keys Func',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Set: Quality',
          2 => 'Set: Parameter',
          3 => 'Set: Playback',
          4 => 'Cross keys: AF point select',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:SetButtonCrossKeysFunc',
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
          1 => '1/200 Fixed',
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
    7 =>
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
      'exiftoolDOMNode' => 'CanonCustom:ShutterCurtainSync',
    ),
  ),
);
}
