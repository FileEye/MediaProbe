<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class Ver1 extends Collection {

  protected static $map = array (
  'name' => 'CanonVRDVer1',
  'title' => 'CanonVRD Ver1',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'BlueCurveLimits' => 510,
    'BlueCurvePoints' => 468,
    'BrightnessAdj' => 276,
    'CheckMark' => 618,
    'ColorToneAdj' => 286,
    'ConstrainedCropHeight' => 614,
    'ConstrainedCropWidth' => 610,
    'ContrastAdj' => 277,
    'CropActive' => 580,
    'CropAspectRatio' => 608,
    'CropHeight' => 588,
    'CropLeft' => 582,
    'CropTop' => 584,
    'CropWidth' => 586,
    'DynamicRangeMax' => 124,
    'DynamicRangeMin' => 122,
    'GreenCurveLimits' => 452,
    'GreenCurvePoints' => 410,
    'LuminanceCurveLimits' => 336,
    'LuminanceCurvePoints' => 294,
    'RGBCurveLimits' => 568,
    'RGBCurvePoints' => 526,
    'RawBrightnessAdj' => 56,
    'RawColorAdj' => 46,
    'RawCustomSaturation' => 48,
    'RawCustomTone' => 52,
    'RedCurveLimits' => 394,
    'RedCurvePoints' => 352,
    'Rotation' => 622,
    'SaturationAdj' => 278,
    'SharpnessAdj' => 602,
    'ToneCurveActive' => 272,
    'ToneCurveInterpolation' => 345,
    'ToneCurveMode' => 275,
    'ToneCurveProperty' => 60,
    'VRDVersion' => 2,
    'WBAdjColorTemp' => 26,
    'WBAdjRGGBLevels' => 6,
    'WBFineTuneActive' => 36,
    'WBFineTuneSaturation' => 40,
    'WBFineTuneTone' => 44,
    'WhiteBalanceAdj' => 24,
    'WorkColorSpace' => 624,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:BlueCurveLimits' => 510,
    'CanonVRD:BlueCurvePoints' => 468,
    'CanonVRD:BrightnessAdj' => 276,
    'CanonVRD:CheckMark' => 618,
    'CanonVRD:ColorToneAdj' => 286,
    'CanonVRD:ConstrainedCropHeight' => 614,
    'CanonVRD:ConstrainedCropWidth' => 610,
    'CanonVRD:ContrastAdj' => 277,
    'CanonVRD:CropActive' => 580,
    'CanonVRD:CropAspectRatio' => 608,
    'CanonVRD:CropHeight' => 588,
    'CanonVRD:CropLeft' => 582,
    'CanonVRD:CropTop' => 584,
    'CanonVRD:CropWidth' => 586,
    'CanonVRD:DynamicRangeMax' => 124,
    'CanonVRD:DynamicRangeMin' => 122,
    'CanonVRD:GreenCurveLimits' => 452,
    'CanonVRD:GreenCurvePoints' => 410,
    'CanonVRD:LuminanceCurveLimits' => 336,
    'CanonVRD:LuminanceCurvePoints' => 294,
    'CanonVRD:RGBCurveLimits' => 568,
    'CanonVRD:RGBCurvePoints' => 526,
    'CanonVRD:RawBrightnessAdj' => 56,
    'CanonVRD:RawColorAdj' => 46,
    'CanonVRD:RawCustomSaturation' => 48,
    'CanonVRD:RawCustomTone' => 52,
    'CanonVRD:RedCurveLimits' => 394,
    'CanonVRD:RedCurvePoints' => 352,
    'CanonVRD:Rotation' => 622,
    'CanonVRD:SaturationAdj' => 278,
    'CanonVRD:SharpnessAdj' => 602,
    'CanonVRD:ToneCurveActive' => 272,
    'CanonVRD:ToneCurveInterpolation' => 345,
    'CanonVRD:ToneCurveMode' => 275,
    'CanonVRD:ToneCurveProperty' => 60,
    'CanonVRD:VRDVersion' => 2,
    'CanonVRD:WBAdjColorTemp' => 26,
    'CanonVRD:WBAdjRGGBLevels' => 6,
    'CanonVRD:WBFineTuneActive' => 36,
    'CanonVRD:WBFineTuneSaturation' => 40,
    'CanonVRD:WBFineTuneTone' => 44,
    'CanonVRD:WhiteBalanceAdj' => 24,
    'CanonVRD:WorkColorSpace' => 624,
  ),
  'items' =>
  array (
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'VRDVersion',
      'title' => 'VRD Version',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:VRDVersion',
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBAdjRGGBLevels',
      'title' => 'WB Adj RGGB Levels',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:WBAdjRGGBLevels',
    ),
    24 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteBalanceAdj',
      'title' => 'White Balance Adj',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => 'Daylight',
          2 => 'Cloudy',
          3 => 'Tungsten',
          4 => 'Fluorescent',
          5 => 'Flash',
          8 => 'Shade',
          9 => 'Kelvin',
          30 => 'Manual (Click)',
          31 => 'Shot Settings',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:WhiteBalanceAdj',
    ),
    26 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBAdjColorTemp',
      'title' => 'WB Adj Color Temp',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:WBAdjColorTemp',
    ),
    36 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBFineTuneActive',
      'title' => 'WB Fine Tune Active',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:WBFineTuneActive',
    ),
    40 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBFineTuneSaturation',
      'title' => 'WB Fine Tune Saturation',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:WBFineTuneSaturation',
    ),
    44 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBFineTuneTone',
      'title' => 'WB Fine Tune Tone',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:WBFineTuneTone',
    ),
    46 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawColorAdj',
      'title' => 'Raw Color Adj',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Shot Settings',
          1 => 'Faithful',
          2 => 'Custom',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:RawColorAdj',
    ),
    48 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawCustomSaturation',
      'title' => 'Raw Custom Saturation',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RawCustomSaturation',
    ),
    52 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawCustomTone',
      'title' => 'Raw Custom Tone',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RawCustomTone',
    ),
    56 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawBrightnessAdj',
      'title' => 'Raw Brightness Adj',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RawBrightnessAdj',
    ),
    60 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveProperty',
      'title' => 'Tone Curve Property',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Shot Settings',
          1 => 'Linear',
          2 => 'Custom 1',
          3 => 'Custom 2',
          4 => 'Custom 3',
          5 => 'Custom 4',
          6 => 'Custom 5',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveProperty',
    ),
    122 =>
    array (
      'collection' => 'Tag',
      'name' => 'DynamicRangeMin',
      'title' => 'Dynamic Range Min',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:DynamicRangeMin',
    ),
    124 =>
    array (
      'collection' => 'Tag',
      'name' => 'DynamicRangeMax',
      'title' => 'Dynamic Range Max',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:DynamicRangeMax',
    ),
    272 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveActive',
      'title' => 'Tone Curve Active',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveActive',
    ),
    275 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveMode',
      'title' => 'Tone Curve Mode',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'RGB',
          1 => 'Luminance',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveMode',
    ),
    276 =>
    array (
      'collection' => 'Tag',
      'name' => 'BrightnessAdj',
      'title' => 'Brightness Adj',
      'format' =>
      array (
        0 => 6,
      ),
      'exiftoolDOMNode' => 'CanonVRD:BrightnessAdj',
    ),
    277 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastAdj',
      'title' => 'Contrast Adj',
      'format' =>
      array (
        0 => 6,
      ),
      'exiftoolDOMNode' => 'CanonVRD:ContrastAdj',
    ),
    278 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationAdj',
      'title' => 'Saturation Adj',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'CanonVRD:SaturationAdj',
    ),
    286 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneAdj',
      'title' => 'Color Tone Adj',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'CanonVRD:ColorToneAdj',
    ),
    294 =>
    array (
      'collection' => 'Tag',
      'name' => 'LuminanceCurvePoints',
      'title' => 'Luminance Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:LuminanceCurvePoints',
    ),
    336 =>
    array (
      'collection' => 'Tag',
      'name' => 'LuminanceCurveLimits',
      'title' => 'Luminance Curve Limits',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:LuminanceCurveLimits',
    ),
    345 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveInterpolation',
      'title' => 'Tone Curve Interpolation',
      'format' =>
      array (
        0 => 1,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Curve',
          1 => 'Straight',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveInterpolation',
    ),
    352 =>
    array (
      'collection' => 'Tag',
      'name' => 'RedCurvePoints',
      'title' => 'Red Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RedCurvePoints',
    ),
    394 =>
    array (
      'collection' => 'Tag',
      'name' => 'RedCurveLimits',
      'title' => 'Red Curve Limits',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RedCurveLimits',
    ),
    410 =>
    array (
      'collection' => 'Tag',
      'name' => 'GreenCurvePoints',
      'title' => 'Green Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:GreenCurvePoints',
    ),
    452 =>
    array (
      'collection' => 'Tag',
      'name' => 'GreenCurveLimits',
      'title' => 'Green Curve Limits',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:GreenCurveLimits',
    ),
    468 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlueCurvePoints',
      'title' => 'Blue Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:BlueCurvePoints',
    ),
    510 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlueCurveLimits',
      'title' => 'Blue Curve Limits',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:BlueCurveLimits',
    ),
    526 =>
    array (
      'collection' => 'Tag',
      'name' => 'RGBCurvePoints',
      'title' => 'RGB Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RGBCurvePoints',
    ),
    568 =>
    array (
      'collection' => 'Tag',
      'name' => 'RGBCurveLimits',
      'title' => 'RGB Curve Limits',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RGBCurveLimits',
    ),
    580 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropActive',
      'title' => 'Crop Active',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:CropActive',
    ),
    582 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropLeft',
      'title' => 'Crop Left',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:CropLeft',
    ),
    584 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropTop',
      'title' => 'Crop Top',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:CropTop',
    ),
    586 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropWidth',
      'title' => 'Crop Width',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:CropWidth',
    ),
    588 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropHeight',
      'title' => 'Crop Height',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:CropHeight',
    ),
    602 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessAdj',
      'title' => 'Sharpness Adj',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonVRD:SharpnessAdj',
    ),
    608 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropAspectRatio',
      'title' => 'Crop Aspect Ratio',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Free',
          1 => '3:2',
          2 => '2:3',
          3 => '4:3',
          4 => '3:4',
          5 => 'A-size Landscape',
          6 => 'A-size Portrait',
          7 => 'Letter-size Landscape',
          8 => 'Letter-size Portrait',
          9 => '4:5',
          10 => '5:4',
          11 => '1:1',
          12 => 'Circle',
          65535 => 'Custom',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:CropAspectRatio',
    ),
    610 =>
    array (
      'collection' => 'Tag',
      'name' => 'ConstrainedCropWidth',
      'title' => 'Constrained Crop Width',
      'format' =>
      array (
        0 => 11,
      ),
      'exiftoolDOMNode' => 'CanonVRD:ConstrainedCropWidth',
    ),
    614 =>
    array (
      'collection' => 'Tag',
      'name' => 'ConstrainedCropHeight',
      'title' => 'Constrained Crop Height',
      'format' =>
      array (
        0 => 11,
      ),
      'exiftoolDOMNode' => 'CanonVRD:ConstrainedCropHeight',
    ),
    618 =>
    array (
      'collection' => 'Tag',
      'name' => 'CheckMark',
      'title' => 'Check Mark',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Clear',
          1 => '1',
          2 => '2',
          3 => '3',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:CheckMark',
    ),
    622 =>
    array (
      'collection' => 'Tag',
      'name' => 'Rotation',
      'title' => 'Rotation',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '0',
          1 => '90',
          2 => '180',
          3 => '270',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:Rotation',
    ),
    624 =>
    array (
      'collection' => 'Tag',
      'name' => 'WorkColorSpace',
      'title' => 'Work Color Space',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'sRGB',
          1 => 'Adobe RGB',
          2 => 'Wide Gamut RGB',
          3 => 'Apple RGB',
          4 => 'ColorMatch RGB',
        ),
      ),
      'exiftoolDOMNode' => 'CanonVRD:WorkColorSpace',
    ),
  ),
);
}
