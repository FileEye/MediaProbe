<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions2 extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions2',
  'title' => 'CanonCustom Functions2 - a set of custom function tags which are (reasonably) consistent across models',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\CustomFunctions2',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    257 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureLevelIncrements',
      'title' => 'Exposure Level Increments',
      'format' =>
      array (
        0 => 9,
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
    ),
    258 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISOSpeedIncrements',
      'title' => 'ISO Speed Increments',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '1/3 Stop',
          1 => '1 Stop',
        ),
      ),
    ),
    259 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISOSpeedRange',
      'title' => 'ISO Speed Range',
      'components' => 3,
      'format' =>
      array (
        0 => 9,
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
    260 =>
    array (
      'collection' => 'Tag',
      'name' => 'AEBAutoCancel',
      'title' => 'AEB Auto Cancel',
      'format' =>
      array (
        0 => 9,
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
    261 =>
    array (
      'collection' => 'Tag',
      'name' => 'AEBSequence',
      'title' => 'AEB Sequence',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '0,-,+',
          1 => '-,0,+',
          2 => '+,0,-',
        ),
      ),
    ),
    262 =>
    array (
      'collection' => 'Tag',
      'name' => 'AEBShotCount',
      'title' => 'AEB Shot Count',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '3 shots',
          1 => '2 shots',
          2 => '5 shots',
          3 => '7 shots',
        ),
      ),
    ),
    263 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpotMeterLinkToAFPoint',
      'title' => 'Spot Meter Link To AF Point',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable (use center AF point)',
          1 => 'Enable (use active AF point)',
        ),
      ),
    ),
    264 =>
    array (
      'collection' => 'Tag',
      'name' => 'SafetyShift',
      'title' => 'Safety Shift',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Enable (Tv/Av)',
          2 => 'Enable (ISO speed)',
        ),
      ),
    ),
    265 =>
    array (
      'collection' => 'Tag',
      'name' => 'UsableShootingModes',
      'title' => 'Usable Shooting Modes',
      'components' => 2,
      'format' =>
      array (
        0 => 9,
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
    266 =>
    array (
      'collection' => 'Tag',
      'name' => 'UsableMeteringModes',
      'title' => 'Usable Metering Modes',
      'components' => 2,
      'format' =>
      array (
        0 => 9,
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
    267 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureModeInManual',
      'title' => 'Exposure Mode In Manual',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Specified metering mode',
          1 => 'Evaluative metering',
          2 => 'Partial metering',
          3 => 'Spot metering',
          4 => 'Center-weighted average',
        ),
      ),
    ),
    268 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterSpeedRange',
      'title' => 'Shutter Speed Range',
      'components' => 3,
      'format' =>
      array (
        0 => 9,
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
    269 =>
    array (
      'collection' => 'Tag',
      'name' => 'ApertureRange',
      'title' => 'Aperture Range',
      'components' => 3,
      'format' =>
      array (
        0 => 9,
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
    270 =>
    array (
      'collection' => 'Tag',
      'name' => 'ApplyShootingMeteringMode',
      'title' => 'Apply Shooting Metering Mode',
      'components' => 8,
      'format' =>
      array (
        0 => 9,
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
    271 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashSyncSpeedAv',
      'title' => 'Flash Sync Speed Av',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => '1/250 Fixed',
        ),
      ),
    ),
    272 =>
    array (
      'collection' => 'Tag',
      'name' => 'AEMicroadjustment',
      'title' => 'AE Microadjustment',
      'components' => 3,
      'format' =>
      array (
        0 => 9,
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
    273 =>
    array (
      'collection' => 'Tag',
      'name' => 'FEMicroadjustment',
      'title' => 'FE Microadjustment',
      'components' => 3,
      'format' =>
      array (
        0 => 9,
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
    274 =>
    array (
      'collection' => 'Tag',
      'name' => 'SameExposureForNewAperture',
      'title' => 'Same Exposure For New Aperture',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'ISO Speed',
          2 => 'Shutter Speed',
        ),
      ),
    ),
    275 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureCompAutoCancel',
      'title' => 'Exposure Comp Auto Cancel',
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
    276 =>
    array (
      'collection' => 'Tag',
      'name' => 'AELockMeterModeAfterFocus',
      'title' => 'AE Lock Meter Mode After Focus',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Evaluative',
          2 => 'Partial',
          4 => 'Spot',
          8 => 'Center-weighted',
        ),
      ),
    ),
    513 =>
    array (
      'collection' => 'Tag',
      'name' => 'LongExposureNoiseReduction',
      'title' => 'Long Exposure Noise Reduction',
      'format' =>
      array (
        0 => 9,
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
    ),
    514 =>
    array (
      'collection' => 'Tag',
      'name' => 'HighISONoiseReduction',
      'title' => 'High ISO Noise Reduction',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Standard',
          1 => 'Low',
          2 => 'Strong',
          3 => 'Off',
        ),
      ),
    ),
    515 =>
    array (
      'collection' => 'Tag',
      'name' => 'HighlightTonePriority',
      'title' => 'Highlight Tone Priority',
      'format' =>
      array (
        0 => 9,
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
    516 =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoLightingOptimizer',
      'title' => 'Auto Lighting Optimizer',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Standard',
          1 => 'Low',
          2 => 'Strong',
          3 => 'Disable',
        ),
      ),
    ),
    772 =>
    array (
      'collection' => 'Tag',
      'name' => 'ETTLII',
      'title' => 'E-TTL II',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Evaluative',
          1 => 'Average',
        ),
      ),
    ),
    773 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterCurtainSync',
      'title' => 'Shutter Curtain Sync',
      'format' =>
      array (
        0 => 9,
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
    774 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashFiring',
      'title' => 'Flash Firing',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Fires',
          1 => 'Does not fire',
        ),
      ),
    ),
    1031 =>
    array (
      'collection' => 'Tag',
      'name' => 'ViewInfoDuringExposure',
      'title' => 'View Info During Exposure',
      'format' =>
      array (
        0 => 9,
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
    1032 =>
    array (
      'collection' => 'Tag',
      'name' => 'LCDIlluminationDuringBulb',
      'title' => 'LCD Illumination During Bulb',
      'format' =>
      array (
        0 => 9,
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
    1033 =>
    array (
      'collection' => 'Tag',
      'name' => 'InfoButtonWhenShooting',
      'title' => 'Info Button When Shooting',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Displays camera settings',
          1 => 'Displays shooting functions',
        ),
      ),
    ),
    1034 =>
    array (
      'collection' => 'Tag',
      'name' => 'ViewfinderWarnings',
      'title' => 'Viewfinder Warnings',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Monochrome',
          2 => 'WB corrected',
          4 => 'One-touch image quality',
          8 => 'ISO expansion',
          16 => 'Spot metering',
        ),
      ),
    ),
    1035 =>
    array (
      'collection' => 'Tag',
      'name' => 'LVShootingAreaDisplay',
      'title' => 'LV Shooting Area Display',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Masked',
          1 => 'Outlined',
        ),
      ),
    ),
    1036 =>
    array (
      'collection' => 'Tag',
      'name' => 'LVShootingAreaDisplay',
      'title' => 'LV Shooting Area Display',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Masked',
          1 => 'Outlined',
        ),
      ),
    ),
    1281 =>
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
          0 => 'Enable after one-shot AF',
          1 => 'Disable after one-shot AF',
          2 => 'Disable in AF mode',
        ),
      ),
    ),
    1282 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoTrackingSensitivity',
      'title' => 'AI Servo Tracking Sensitivity',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -2 => 'Slow',
          -1 => 'Medium Slow',
          0 => 'Standard',
          1 => 'Medium Fast',
          2 => 'Fast',
        ),
      ),
    ),
    1283 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoImagePriority',
      'title' => 'AI Servo Image Priority',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '1: AF, 2: Tracking',
          1 => '1: AF, 2: Drive speed',
          2 => '1: Release, 2: Drive speed',
          3 => '1: Release, 2: Tracking',
        ),
      ),
    ),
    1284 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoTrackingMethod',
      'title' => 'AI Servo Tracking Method',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Main focus point priority',
          1 => 'Continuous AF track priority',
        ),
      ),
    ),
    1285 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensDriveNoAF',
      'title' => 'Lens Drive No AF',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Focus search on',
          1 => 'Focus search off',
        ),
      ),
    ),
    1286 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensAFStopButton',
      'title' => 'Lens AF Stop Button',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'AF stop',
          1 => 'AF start',
          2 => 'AE lock',
          3 => 'AF point: M->Auto/Auto->ctr',
          4 => 'One Shot <-> AI servo',
          5 => 'IS start',
          6 => 'Switch to registered AF point',
          7 => 'Spot AF',
        ),
      ),
    ),
    1287 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFMicroadjustment',
      'title' => 'AF Microadjustment',
      'components' => 5,
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Adjust all by same amount',
          2 => 'Adjust by lens',
        ),
      ),
    ),
    1288 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointAreaExpansion',
      'title' => 'AF Point Area Expansion',
      'format' =>
      array (
        0 => 9,
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
    1289 =>
    array (
      'collection' => 'Tag',
      'name' => 'SelectableAFPoint',
      'title' => 'Selectable AF Point',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '45 points',
          1 => '19 points',
          2 => '11 points',
          3 => 'Inner 9 points',
          4 => 'Outer 9 points',
        ),
      ),
    ),
    1290 =>
    array (
      'collection' => 'Tag',
      'name' => 'SwitchToRegisteredAFPoint',
      'title' => 'Switch To Registered AF Point',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Switch with multi-controller',
          2 => 'Only while AEL is pressed',
        ),
      ),
    ),
    1291 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointAutoSelection',
      'title' => 'AF Point Auto Selection',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Control-direct:disable/Main:enable',
          1 => 'Control-direct:disable/Main:disable',
          2 => 'Control-direct:enable/Main:enable',
        ),
      ),
    ),
    1292 =>
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
          0 => 'On',
          1 => 'Off',
          2 => 'On (when focus achieved)',
        ),
      ),
    ),
    1293 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointBrightness',
      'title' => 'AF Point Brightness',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Brighter',
        ),
      ),
    ),
    1294 =>
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
          0 => 'Emits',
          1 => 'Does not emit',
          2 => 'IR AF assist beam only',
        ),
      ),
    ),
    1295 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPointSelectionMethod',
      'title' => 'AF Point Selection Method',
      'format' =>
      array (
        0 => 9,
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
    ),
    1296 =>
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
    1297 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFDuringLiveView',
      'title' => 'AF During Live View',
      'format' =>
      array (
        0 => 9,
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
    1298 =>
    array (
      'collection' => 'Tag',
      'name' => 'SelectAFAreaSelectMode',
      'title' => 'Select AF Area Select Mode',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Enable',
          2 => 'Register',
          3 => 'Select AF-modes',
        ),
      ),
    ),
    1299 =>
    array (
      'collection' => 'Tag',
      'name' => 'ManualAFPointSelectPattern',
      'title' => 'Manual AF Point Select Pattern',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Stops at AF area edges',
          1 => 'Continuous',
        ),
      ),
    ),
    1300 =>
    array (
      'collection' => 'Tag',
      'name' => 'DisplayAllAFPoints',
      'title' => 'Display All AF Points',
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
    1301 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusDisplayAIServoAndMF',
      'title' => 'Focus Display AI Servo And MF',
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
    1302 =>
    array (
      'collection' => 'Tag',
      'name' => 'OrientationLinkedAFPoint',
      'title' => 'Orientation Linked AF Point',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Same for vertical and horizontal',
          1 => 'Select different AF points',
        ),
      ),
    ),
    1303 =>
    array (
      'collection' => 'Tag',
      'name' => 'MultiControllerWhileMetering',
      'title' => 'Multi Controller While Metering',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'AF point selection',
        ),
      ),
    ),
    1304 =>
    array (
      'collection' => 'Tag',
      'name' => 'AccelerationTracking',
      'title' => 'Acceleration Tracking',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    1305 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoFirstImagePriority',
      'title' => 'AI Servo First Image Priority',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Release priority',
          0 => 'Equal priority',
          1 => 'Focus priority',
        ),
      ),
    ),
    1306 =>
    array (
      'collection' => 'Tag',
      'name' => 'AIServoSecondImagePriority',
      'title' => 'AI Servo Second Image Priority',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Shooting speed priority',
          0 => 'Equal priority',
          1 => 'Focus priority',
        ),
      ),
    ),
    1307 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFAreaSelectMethod',
      'title' => 'AF Area Select Method',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'AF area selection button',
          1 => 'Main dial',
        ),
      ),
    ),
    1308 =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoAFPointColorTracking',
      'title' => 'Auto AF Point Color Tracking',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'On-Shot AF only',
          1 => 'Disable',
        ),
      ),
    ),
    1309 =>
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
    1310 =>
    array (
      'collection' => 'Tag',
      'name' => 'InitialAFPointAIServoAF',
      'title' => 'Initial AF Point AI Servo AF',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => 'Initial AF point selected',
          2 => 'Manual AF point',
        ),
      ),
    ),
    1551 =>
    array (
      'collection' => 'Tag',
      'name' => 'MirrorLockup',
      'title' => 'Mirror Lockup',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Enable',
          2 => 'Enable: Down with Set',
        ),
      ),
    ),
    1552 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContinuousShootingSpeed',
      'title' => 'Continuous Shooting Speed',
      'components' => 3,
      'format' =>
      array (
        0 => 9,
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
    1553 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContinuousShotLimit',
      'title' => 'Continuous Shot Limit',
      'components' => 2,
      'format' =>
      array (
        0 => 9,
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
    1554 =>
    array (
      'collection' => 'Tag',
      'name' => 'RestrictDriveModes',
      'title' => 'Restrict Drive Modes',
      'components' => 2,
      'format' =>
      array (
        0 => 9,
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
    1793 =>
    array (
      'collection' => 'Tag',
      'name' => 'Shutter-AELock',
      'title' => 'Shutter-AE Lock',
      'format' =>
      array (
        0 => 9,
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
    ),
    1794 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFOnAELockButtonSwitch',
      'title' => 'AF On AE Lock Button Switch',
      'format' =>
      array (
        0 => 9,
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
    1795 =>
    array (
      'collection' => 'Tag',
      'name' => 'QuickControlDialInMeter',
      'title' => 'Quick Control Dial In Meter',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Exposure comp/Aperture',
          1 => 'AF point selection',
          2 => 'ISO speed',
          3 => 'AF point selection swapped with Exposure comp',
          4 => 'ISO speed swapped with Exposure comp',
        ),
      ),
    ),
    1796 =>
    array (
      'collection' => 'Tag',
      'name' => 'SetButtonWhenShooting',
      'title' => 'Set Button When Shooting',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal (disabled)',
          1 => 'Image quality',
          2 => 'Picture style',
          3 => 'Menu display',
          4 => 'Image playback',
          5 => 'Quick control screen',
          6 => 'Record movie (Live View)',
        ),
      ),
    ),
    1797 =>
    array (
      'collection' => 'Tag',
      'name' => 'ManualTv',
      'title' => 'Manual Tv/Av For M',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Tv=Main/Av=Control',
          1 => 'Tv=Control/Av=Main',
        ),
      ),
    ),
    1798 =>
    array (
      'collection' => 'Tag',
      'name' => 'DialDirectionTvAv',
      'title' => 'Dial Direction Tv Av',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Reversed',
        ),
      ),
    ),
    1799 =>
    array (
      'collection' => 'Tag',
      'name' => 'AvSettingWithoutLens',
      'title' => 'Av Setting Without Lens',
      'format' =>
      array (
        0 => 9,
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
    1800 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBMediaImageSizeSetting',
      'title' => 'WB Media Image Size Setting',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Rear LCD panel',
          1 => 'LCD monitor',
          2 => 'Off (disable button)',
        ),
      ),
    ),
    1801 =>
    array (
      'collection' => 'Tag',
      'name' => 'LockMicrophoneButton',
      'title' => 'Lock Microphone Button',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Protect (hold:record memo)',
          1 => 'Record memo (protect:disable)',
          2 => 'Play memo (hold:record memo)',
          3 => 'Rating (protect/memo:disable)',
        ),
      ),
    ),
    1802 =>
    array (
      'collection' => 'Tag',
      'name' => 'ButtonFunctionControlOff',
      'title' => 'Button Function Control Off',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal (enable)',
          1 => 'Disable main, Control, Multi-control',
        ),
      ),
    ),
    1803 =>
    array (
      'collection' => 'Tag',
      'name' => 'AssignFuncButton',
      'title' => 'Assign Func Button',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'LCD brightness',
          1 => 'Image quality',
          2 => 'Exposure comp./AEB setting',
          3 => 'Image jump with main dial',
          4 => 'Live view function settings',
        ),
      ),
    ),
    1804 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomControls',
      'title' => 'Custom Controls',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    1805 =>
    array (
      'collection' => 'Tag',
      'name' => 'StartMovieShooting',
      'title' => 'Start Movie Shooting',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Default (from LV)',
          1 => 'Quick start (FEL button)',
        ),
      ),
    ),
    1806 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashButtonFunction',
      'title' => 'Flash Button Function',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Raise built-in flash',
          1 => 'ISO speed',
        ),
      ),
    ),
    1807 =>
    array (
      'collection' => 'Tag',
      'name' => 'MultiFunctionLock',
      'title' => 'Multi Function Lock',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'On',
          2 => 'On (quick control dial)',
          3 => 'On (main dial and quick control dial)',
        ),
      ),
    ),
    1808 =>
    array (
      'collection' => 'Tag',
      'name' => 'TrashButtonFunction',
      'title' => 'Trash Button Function',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal (set center AF point)',
          1 => 'Depth-of-field preview',
        ),
      ),
    ),
    1809 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterReleaseWithoutLens',
      'title' => 'Shutter Release Without Lens',
      'format' =>
      array (
        0 => 9,
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
    1810 =>
    array (
      'collection' => 'Tag',
      'name' => 'ControlRingRotation',
      'title' => 'Control Ring Rotation',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Reversed',
        ),
      ),
    ),
    1811 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusRingRotation',
      'title' => 'Focus Ring Rotation',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Reversed',
        ),
      ),
    ),
    1812 =>
    array (
      'collection' => 'Tag',
      'name' => 'RFLensMFFocusRingSensitivity',
      'title' => 'RF Lens MF Focus Ring Sensitivity',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Varies With Rotation Speed',
          1 => 'Linked To Rotation Angle',
        ),
      ),
    ),
    1813 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomizeDials',
      'title' => 'Customize Dials',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    2059 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusingScreen',
      'title' => 'Focusing Screen',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Ef-A',
          1 => 'Ef-D',
          2 => 'Ef-S',
        ),
      ),
    ),
    2060 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimerLength',
      'title' => 'Timer Length',
      'components' => 4,
      'format' =>
      array (
        0 => 9,
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
    2061 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShortReleaseTimeLag',
      'title' => 'Short Release Time Lag',
      'format' =>
      array (
        0 => 9,
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
    2062 =>
    array (
      'collection' => 'Tag',
      'name' => 'AddAspectRatioInfo',
      'title' => 'Add Aspect Ratio Info',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => '6:6',
          2 => '3:4',
          3 => '4:5',
          4 => '6:7',
          5 => '10:12',
          6 => '5:7',
        ),
      ),
    ),
    2063 =>
    array (
      'collection' => 'Tag',
      'name' => 'AddOriginalDecisionData',
      'title' => 'Add Original Decision Data',
      'format' =>
      array (
        0 => 9,
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
    2064 =>
    array (
      'collection' => 'Tag',
      'name' => 'LiveViewExposureSimulation',
      'title' => 'Live View Exposure Simulation',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable (LCD auto adjust)',
          1 => 'Enable (simulates exposure)',
        ),
      ),
    ),
    2065 =>
    array (
      'collection' => 'Tag',
      'name' => 'LCDDisplayAtPowerOn',
      'title' => 'LCD Display At Power On',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Display',
          1 => 'Retain power off status',
        ),
      ),
    ),
    2066 =>
    array (
      'collection' => 'Tag',
      'name' => 'MemoAudioQuality',
      'title' => 'Memo Audio Quality',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'High (48 kHz)',
          1 => 'Low (8 kHz)',
        ),
      ),
    ),
    2067 =>
    array (
      'collection' => 'Tag',
      'name' => 'DefaultEraseOption',
      'title' => 'Default Erase Option',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Cancel selected',
          1 => 'Erase selected',
        ),
      ),
    ),
    2068 =>
    array (
      'collection' => 'Tag',
      'name' => 'RetractLensOnPowerOff',
      'title' => 'Retract Lens On Power Off',
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
    2069 =>
    array (
      'collection' => 'Tag',
      'name' => 'AddIPTCInformation',
      'title' => 'Add IPTC Information',
      'format' =>
      array (
        0 => 9,
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
  ),
  'itemsByName' =>
  array (
    'AEBAutoCancel' => 260,
    'AEBSequence' => 261,
    'AEBShotCount' => 262,
    'AELockMeterModeAfterFocus' => 276,
    'AEMicroadjustment' => 272,
    'AFAreaSelectMethod' => 1307,
    'AFAssistBeam' => 1294,
    'AFDuringLiveView' => 1297,
    'AFMicroadjustment' => 1287,
    'AFOnAELockButtonSwitch' => 1794,
    'AFPointAreaExpansion' => 1288,
    'AFPointAutoSelection' => 1291,
    'AFPointBrightness' => 1293,
    'AFPointDisplayDuringFocus' => 1292,
    'AFPointSelectionMethod' => 1295,
    'AIServoFirstImagePriority' => 1305,
    'AIServoImagePriority' => 1283,
    'AIServoSecondImagePriority' => 1306,
    'AIServoTrackingMethod' => 1284,
    'AIServoTrackingSensitivity' => 1282,
    'AccelerationTracking' => 1304,
    'AddAspectRatioInfo' => 2062,
    'AddIPTCInformation' => 2069,
    'AddOriginalDecisionData' => 2063,
    'ApertureRange' => 269,
    'ApplyShootingMeteringMode' => 270,
    'AssignFuncButton' => 1803,
    'AutoAFPointColorTracking' => 1308,
    'AutoLightingOptimizer' => 516,
    'AvSettingWithoutLens' => 1799,
    'ButtonFunctionControlOff' => 1802,
    'ContinuousShootingSpeed' => 1552,
    'ContinuousShotLimit' => 1553,
    'ControlRingRotation' => 1810,
    'CustomControls' => 1804,
    'CustomizeDials' => 1813,
    'DefaultEraseOption' => 2067,
    'DialDirectionTvAv' => 1798,
    'DisplayAllAFPoints' => 1300,
    'ETTLII' => 772,
    'ExposureCompAutoCancel' => 275,
    'ExposureLevelIncrements' => 257,
    'ExposureModeInManual' => 267,
    'FEMicroadjustment' => 273,
    'FlashButtonFunction' => 1806,
    'FlashFiring' => 774,
    'FlashSyncSpeedAv' => 271,
    'FocusDisplayAIServoAndMF' => 1301,
    'FocusRingRotation' => 1811,
    'FocusingScreen' => 2059,
    'HighISONoiseReduction' => 514,
    'HighlightTonePriority' => 515,
    'ISOSpeedIncrements' => 258,
    'ISOSpeedRange' => 259,
    'InfoButtonWhenShooting' => 1033,
    'InitialAFPointAIServoAF' => 1310,
    'LCDDisplayAtPowerOn' => 2065,
    'LCDIlluminationDuringBulb' => 1032,
    'LVShootingAreaDisplay' => 1036,
    'LensAFStopButton' => 1286,
    'LensDriveNoAF' => 1285,
    'LiveViewExposureSimulation' => 2064,
    'LockMicrophoneButton' => 1801,
    'LongExposureNoiseReduction' => 513,
    'ManualAFPointSelectPattern' => 1299,
    'ManualTv' => 1797,
    'MemoAudioQuality' => 2066,
    'MirrorLockup' => 1551,
    'MultiControllerWhileMetering' => 1303,
    'MultiFunctionLock' => 1807,
    'OrientationLinkedAFPoint' => 1302,
    'QuickControlDialInMeter' => 1795,
    'RFLensMFFocusRingSensitivity' => 1812,
    'RestrictDriveModes' => 1554,
    'RetractLensOnPowerOff' => 2068,
    'SafetyShift' => 264,
    'SameExposureForNewAperture' => 274,
    'SelectAFAreaSelectMode' => 1298,
    'SelectableAFPoint' => 1289,
    'SetButtonWhenShooting' => 1796,
    'ShortReleaseTimeLag' => 2061,
    'Shutter-AELock' => 1793,
    'ShutterCurtainSync' => 773,
    'ShutterReleaseWithoutLens' => 1809,
    'ShutterSpeedRange' => 268,
    'SpotMeterLinkToAFPoint' => 263,
    'StartMovieShooting' => 1805,
    'SwitchToRegisteredAFPoint' => 1290,
    'TimerLength' => 2060,
    'TrashButtonFunction' => 1808,
    'USMLensElectronicMF' => 1281,
    'UsableMeteringModes' => 266,
    'UsableShootingModes' => 265,
    'VFDisplayIllumination' => 1309,
    'ViewInfoDuringExposure' => 1031,
    'ViewfinderWarnings' => 1034,
    'WBMediaImageSizeSetting' => 1800,
  ),
);
}