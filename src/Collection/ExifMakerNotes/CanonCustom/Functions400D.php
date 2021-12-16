<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions400D extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions400D',
  'title' => 'CanonCustom Functions400D',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AFAssistBeam' =>
    array (
      0 => 4,
    ),
    'ETTLII' =>
    array (
      0 => 7,
    ),
    'ExposureLevelIncrements' =>
    array (
      0 => 5,
    ),
    'FlashSyncSpeedAv' =>
    array (
      0 => 2,
    ),
    'LCDDisplayAtPowerOn' =>
    array (
      0 => 10,
    ),
    'LongExposureNoiseReduction' =>
    array (
      0 => 1,
    ),
    'MagnifiedView' =>
    array (
      0 => 9,
    ),
    'MirrorLockup' =>
    array (
      0 => 6,
    ),
    'SetButtonCrossKeysFunc' =>
    array (
      0 => 0,
    ),
    'Shutter-AELock' =>
    array (
      0 => 3,
    ),
    'ShutterCurtainSync' =>
    array (
      0 => 8,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonCustom:AFAssistBeam' =>
    array (
      0 => 4,
    ),
    'CanonCustom:ETTLII' =>
    array (
      0 => 7,
    ),
    'CanonCustom:ExposureLevelIncrements' =>
    array (
      0 => 5,
    ),
    'CanonCustom:FlashSyncSpeedAv' =>
    array (
      0 => 2,
    ),
    'CanonCustom:LCDDisplayAtPowerOn' =>
    array (
      0 => 10,
    ),
    'CanonCustom:LongExposureNoiseReduction' =>
    array (
      0 => 1,
    ),
    'CanonCustom:MagnifiedView' =>
    array (
      0 => 9,
    ),
    'CanonCustom:MirrorLockup' =>
    array (
      0 => 6,
    ),
    'CanonCustom:SetButtonCrossKeysFunc' =>
    array (
      0 => 0,
    ),
    'CanonCustom:Shutter-AELock' =>
    array (
      0 => 3,
    ),
    'CanonCustom:ShutterCurtainSync' =>
    array (
      0 => 8,
    ),
  ),
  'items' =>
  array (
    0 =>
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
            0 => 'Set: Picture Style',
            1 => 'Set: Quality',
            2 => 'Set: Flash Exposure Comp',
            3 => 'Set: Playback',
            4 => 'Cross keys: AF point select',
          ),
        ),
        'exiftoolDOMNode' => 'CanonCustom:SetButtonCrossKeysFunc',
      ),
    ),
    1 =>
    array (
      0 =>
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
    ),
    2 =>
    array (
      0 =>
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
    ),
    3 =>
    array (
      0 =>
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
    ),
    4 =>
    array (
      0 =>
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
    ),
    5 =>
    array (
      0 =>
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
    ),
    6 =>
    array (
      0 =>
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
    ),
    7 =>
    array (
      0 =>
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
    ),
    8 =>
    array (
      0 =>
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
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'MagnifiedView',
        'title' => 'Magnified View',
        'format' =>
        array (
          0 => 1,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Image playback only',
            1 => 'Image review and playback',
          ),
        ),
        'exiftoolDOMNode' => 'CanonCustom:MagnifiedView',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'LCDDisplayAtPowerOn',
        'title' => 'LCD Display At Power On',
        'format' =>
        array (
          0 => 1,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Display',
            1 => 'Retain power off status',
          ),
        ),
        'exiftoolDOMNode' => 'CanonCustom:LCDDisplayAtPowerOn',
      ),
    ),
  ),
);
}
