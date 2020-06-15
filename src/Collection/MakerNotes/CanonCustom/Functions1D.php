<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions1D extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions1D',
  'title' => 'CanonCustom Functions1D',
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
    'AFPointActivationArea' => 17,
    'AFPointIllumination' => 10,
    'AFPointSelection' => 11,
    'AFPointSpotMetering' => 13,
    'AIServoContinuousShooting' => 21,
    'AIServoTrackingSensitivity' => 20,
    'ExposureLevelIncrements' => 6,
    'FillFlashAutoReduction' => 14,
    'FinderDisplayDuringExposure' => 1,
    'FocusingScreen' => 0,
    'ISOSpeedExpansion' => 3,
    'LCDPanels' => 8,
    'LensAFStopButton' => 19,
    'ManualTv' => 5,
    'MirrorLockup' => 12,
    'SafetyShiftInAvOrTv' => 16,
    'ShutterAELButton' => 4,
    'ShutterCurtainSync' => 15,
    'ShutterReleaseNoCFCard' => 2,
    'SwitchToRegisteredAFPoint' => 18,
    'USMLensElectronicMF' => 7,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonCustom:AEBSequenceAutoCancel' => 9,
    'CanonCustom:AFPointActivationArea' => 17,
    'CanonCustom:AFPointIllumination' => 10,
    'CanonCustom:AFPointSelection' => 11,
    'CanonCustom:AFPointSpotMetering' => 13,
    'CanonCustom:AIServoContinuousShooting' => 21,
    'CanonCustom:AIServoTrackingSensitivity' => 20,
    'CanonCustom:ExposureLevelIncrements' => 6,
    'CanonCustom:FillFlashAutoReduction' => 14,
    'CanonCustom:FinderDisplayDuringExposure' => 1,
    'CanonCustom:FocusingScreen' => 0,
    'CanonCustom:ISOSpeedExpansion' => 3,
    'CanonCustom:LCDPanels' => 8,
    'CanonCustom:LensAFStopButton' => 19,
    'CanonCustom:ManualTv' => 5,
    'CanonCustom:MirrorLockup' => 12,
    'CanonCustom:SafetyShiftInAvOrTv' => 16,
    'CanonCustom:ShutterAELButton' => 4,
    'CanonCustom:ShutterCurtainSync' => 15,
    'CanonCustom:ShutterReleaseNoCFCard' => 2,
    'CanonCustom:SwitchToRegisteredAFPoint' => 18,
    'CanonCustom:USMLensElectronicMF' => 7,
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
          0 => 'Ec-N, R',
          1 => 'Ec-A,B,C,CII,CIII,D,H,I,L',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:FocusingScreen',
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'FinderDisplayDuringExposure',
      'title' => 'Finder Display During Exposure',
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
      'exiftoolDOMNode' => 'CanonCustom:FinderDisplayDuringExposure',
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
      'name' => 'ISOSpeedExpansion',
      'title' => 'ISO Speed Expansion',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ISOSpeedExpansion',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterAELButton',
      'title' => 'Shutter Button/AEL Button',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'AF/AE lock stop',
          1 => 'AE lock/AF',
          2 => 'AF/AF lock, No AE lock',
          3 => 'AE/AF, No AE lock',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ShutterAELButton',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'ManualTv',
      'title' => 'Manual Tv/Av For M',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Tv=Main/Av=Control',
          1 => 'Tv=Control/Av=Main',
          2 => 'Tv=Main/Av=Main w/o lens',
          3 => 'Tv=Control/Av=Main w/o lens',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ManualTv',
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
          0 => '1/3-stop set, 1/3-stop comp.',
          1 => '1-stop set, 1/3-stop comp.',
          2 => '1/2-stop set, 1/2-stop comp.',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:ExposureLevelIncrements',
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'USMLensElectronicMF',
      'title' => 'USM Lens Electronic MF',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Turns on after one-shot AF',
          1 => 'Turns off after one-shot AF',
          2 => 'Always turned off',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:USMLensElectronicMF',
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'LCDPanels',
      'title' => 'Top/Back LCD Panels',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Remain. shots/File no.',
          1 => 'ISO/Remain. shots',
          2 => 'ISO/File no.',
          3 => 'Shots in folder/Remain. shots',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:LCDPanels',
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
      'name' => 'AFPointIllumination',
      'title' => 'AF Point Illumination',
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
          2 => 'On without dimming',
          3 => 'Brighter',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFPointIllumination',
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointSelection',
      'title' => 'AF Point Selection',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'H=AF+Main/V=AF+Command',
          1 => 'H=Comp+Main/V=Comp+Command',
          2 => 'H=Command only/V=Assist+Main',
          3 => 'H=FEL+Main/V=FEL+Command',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFPointSelection',
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
      'name' => 'AFPointSpotMetering',
      'title' => 'No. AF Points/Spot Metering',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '45/Center AF point',
          1 => '11/Active AF point',
          2 => '11/Center AF point',
          3 => '9/Active AF point',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFPointSpotMetering',
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
          0 => 'Single AF point',
          1 => 'Expanded (TTL. of 7 AF points)',
          2 => 'Automatic expanded (max. 13)',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AFPointActivationArea',
    ),
    18 =>
    array (
      'collection' => 'Tag',
      'name' => 'SwitchToRegisteredAFPoint',
      'title' => 'Switch To Registered AF Point',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Assist + AF',
          1 => 'Assist',
          2 => 'Only while pressing assist',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:SwitchToRegisteredAFPoint',
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
          4 => 'AF mode: ONE SHOT <-> AI SERVO',
          5 => 'IS start',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:LensAFStopButton',
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoTrackingSensitivity',
      'title' => 'AI Servo Tracking Sensitivity',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Standard',
          1 => 'Slow',
          2 => 'Moderately slow',
          3 => 'Moderately fast',
          4 => 'Fast',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AIServoTrackingSensitivity',
    ),
    21 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoContinuousShooting',
      'title' => 'AI Servo Continuous Shooting',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Shooting not possible without focus',
          1 => 'Shooting possible without focus',
        ),
      ),
      'exiftoolDOMNode' => 'CanonCustom:AIServoContinuousShooting',
    ),
  ),
);
}
