<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class DR4 extends Collection {

  protected static $map = array (
  'name' => 'CanonVRDDR4',
  'title' => 'CanonVRD DR4',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    '0x20310.0' =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessAdjOn',
      'title' => 'Sharpness Adj On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    '0x20400.1' =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveOriginal',
      'title' => 'Tone Curve Original',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    '0x20500.0' =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoLightingOptimizerOn',
      'title' => 'Auto Lighting Optimizer On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    '0x20670.0' =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorMoireReductionOn',
      'title' => 'Color Moire Reduction On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    '0x20702.0' =>
    array (
      'collection' => 'Tag',
      'name' => 'PeripheralIlluminationOn',
      'title' => 'Peripheral Illumination On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    '0x20703.0' =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationOn',
      'title' => 'Chromatic Aberration On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    '0x20705.0' =>
    array (
      'collection' => 'Tag',
      'name' => 'DistortionCorrectionOn',
      'title' => 'Distortion Correction On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    '0x20706.0' =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOOn',
      'title' => 'DLO On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    65538 =>
    array (
      'collection' => 'Tag',
      'name' => 'Rotation',
      'title' => 'Rotation',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    65539 =>
    array (
      'collection' => 'Tag',
      'name' => 'AngleAdj',
      'title' => 'Angle Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    65569 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomPictureStyle',
      'title' => 'Custom Picture Style',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    65793 =>
    array (
      'collection' => 'Tag',
      'name' => 'CheckMark',
      'title' => 'Check Mark',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Clear',
          1 => '1',
          2 => '2',
          3 => '3',
          4 => '4',
          5 => '5',
        ),
      ),
    ),
    66048 =>
    array (
      'collection' => 'Tag',
      'name' => 'WorkColorSpace',
      'title' => 'Work Color Space',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'sRGB',
          2 => 'Adobe RGB',
          3 => 'Wide Gamut RGB',
          4 => 'Apple RGB',
          5 => 'ColorMatch RGB',
        ),
      ),
    ),
    131073 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawBrightnessAdj',
      'title' => 'Raw Brightness Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131329 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteBalanceAdj',
      'title' => 'White Balance Adj',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'Manual (Click)',
          0 => 'Auto',
          1 => 'Daylight',
          2 => 'Cloudy',
          3 => 'Tungsten',
          4 => 'Fluorescent',
          5 => 'Flash',
          8 => 'Shade',
          9 => 'Kelvin',
          255 => 'Shot Settings',
        ),
      ),
    ),
    131330 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBAdjColorTemp',
      'title' => 'WB Adj Color Temp',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131333 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBAdjMagentaGreen',
      'title' => 'WB Adj Magenta Green',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131334 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBAdjBlueAmber',
      'title' => 'WB Adj Blue Amber',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131365 =>
    array (
      'collection' => 'Tag',
      'name' => 'WBAdjRGGBLevels',
      'title' => 'WB Adj RGGB Levels',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131584 =>
    array (
      'collection' => 'Tag',
      'name' => 'GammaLinear',
      'title' => 'Gamma Linear',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    131841 =>
    array (
      'collection' => 'Tag',
      'name' => 'PictureStyle',
      'title' => 'Picture Style',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          129 => 'Standard',
          130 => 'Portrait',
          131 => 'Landscape',
          132 => 'Neutral',
          133 => 'Faithful',
          134 => 'Monochrome',
          135 => 'Auto',
          136 => 'Fine Detail',
          240 => 'Shot Settings',
          255 => 'Custom',
        ),
      ),
    ),
    131843 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastAdj',
      'title' => 'Contrast Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131844 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneAdj',
      'title' => 'Color Tone Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131845 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorSaturationAdj',
      'title' => 'Color Saturation Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131846 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeToningEffect',
      'title' => 'Monochrome Toning Effect',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'None',
          1 => 'Sepia',
          2 => 'Blue',
          3 => 'Purple',
          4 => 'Green',
        ),
      ),
    ),
    131847 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeFilterEffect',
      'title' => 'Monochrome Filter Effect',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'None',
          1 => 'Yellow',
          2 => 'Orange',
          3 => 'Red',
          4 => 'Green',
        ),
      ),
    ),
    131848 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnsharpMaskStrength',
      'title' => 'Unsharp Mask Strength',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131849 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnsharpMaskFineness',
      'title' => 'Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131850 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnsharpMaskThreshold',
      'title' => 'Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131851 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShadowAdj',
      'title' => 'Shadow Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131852 =>
    array (
      'collection' => 'Tag',
      'name' => 'HighlightAdj',
      'title' => 'Highlight Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    131856 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessAdj',
      'title' => 'Sharpness Adj',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Sharpness',
          1 => 'Unsharp Mask',
        ),
      ),
    ),
    131857 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessStrength',
      'title' => 'Sharpness Strength',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132112 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveBrightness',
      'title' => 'Tone Curve Brightness',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132113 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveContrast',
      'title' => 'Tone Curve Contrast',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132352 =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoLightingOptimizer',
      'title' => 'Auto Lighting Optimizer',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Low',
          1 => 'Standard',
          2 => 'Strong',
        ),
      ),
    ),
    132608 =>
    array (
      'collection' => 'Tag',
      'name' => 'LuminanceNoiseReduction',
      'title' => 'Luminance Noise Reduction',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132609 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChrominanceNoiseReduction',
      'title' => 'Chrominance Noise Reduction',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132720 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorMoireReduction',
      'title' => 'Color Moire Reduction',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132865 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShootingDistance',
      'title' => 'Shooting Distance',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132866 =>
    array (
      'collection' => 'Tag',
      'name' => 'PeripheralIllumination',
      'title' => 'Peripheral Illumination',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132867 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberration',
      'title' => 'Chromatic Aberration',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132868 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorBlurOn',
      'title' => 'Color Blur On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    132869 =>
    array (
      'collection' => 'Tag',
      'name' => 'DistortionCorrection',
      'title' => 'Distortion Correction',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132870 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOSetting',
      'title' => 'DLO Setting',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132871 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationRed',
      'title' => 'Chromatic Aberration Red',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132872 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationBlue',
      'title' => 'Chromatic Aberration Blue',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    132873 =>
    array (
      'collection' => 'Tag',
      'name' => 'DistortionEffect',
      'title' => 'Distortion Effect',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Shot Settings',
          1 => 'Emphasize Linearity',
          2 => 'Emphasize Distance',
          3 => 'Emphasize Periphery',
          4 => 'Emphasize Center',
        ),
      ),
    ),
    132875 =>
    array (
      'collection' => 'Tag',
      'name' => 'DiffractionCorrectionOn',
      'title' => 'Diffraction Correction On',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
    ),
    133376 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorHue',
      'title' => 'Color Hue',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133377 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationAdj',
      'title' => 'Saturation Adj',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133392 =>
    array (
      'collection' => 'Tag',
      'name' => 'RedHSL',
      'title' => 'Red HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133393 =>
    array (
      'collection' => 'Tag',
      'name' => 'OrangeHSL',
      'title' => 'Orange HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133394 =>
    array (
      'collection' => 'Tag',
      'name' => 'YellowHSL',
      'title' => 'Yellow HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133395 =>
    array (
      'collection' => 'Tag',
      'name' => 'GreenHSL',
      'title' => 'Green HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133396 =>
    array (
      'collection' => 'Tag',
      'name' => 'AquaHSL',
      'title' => 'Aqua HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133397 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlueHSL',
      'title' => 'Blue HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133398 =>
    array (
      'collection' => 'Tag',
      'name' => 'PurpleHSL',
      'title' => 'Purple HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    133399 =>
    array (
      'collection' => 'Tag',
      'name' => 'MagentaHSL',
      'title' => 'Magenta HSL',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    196865 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropAspectRatio',
      'title' => 'Crop Aspect Ratio',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Free',
          1 => 'Custom',
          2 => '1:1',
          3 => '3:2',
          4 => '2:3',
          5 => '4:3',
          6 => '3:4',
          7 => '5:4',
          8 => '4:5',
          9 => '16:9',
          10 => '9:16',
        ),
      ),
    ),
    196866 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropAspectRatioCustom',
      'title' => 'Crop Aspect Ratio Custom',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    984320 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomPictureStyleData',
      'title' => 'Custom Picture Style Data',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    984338 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensFocalLength',
      'title' => 'Lens Focal Length',
      'format' =>
      array (
        0 => 7,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'AngleAdj' => 65539,
    'AquaHSL' => 133396,
    'AutoLightingOptimizer' => 132352,
    'AutoLightingOptimizerOn' => '0x20500.0',
    'BlueHSL' => 133397,
    'CheckMark' => 65793,
    'ChromaticAberration' => 132867,
    'ChromaticAberrationBlue' => 132872,
    'ChromaticAberrationOn' => '0x20703.0',
    'ChromaticAberrationRed' => 132871,
    'ChrominanceNoiseReduction' => 132609,
    'ColorBlurOn' => 132868,
    'ColorHue' => 133376,
    'ColorMoireReduction' => 132720,
    'ColorMoireReductionOn' => '0x20670.0',
    'ColorSaturationAdj' => 131845,
    'ColorToneAdj' => 131844,
    'ContrastAdj' => 131843,
    'CropAspectRatio' => 196865,
    'CropAspectRatioCustom' => 196866,
    'CustomPictureStyle' => 65569,
    'CustomPictureStyleData' => 984320,
    'DLOOn' => '0x20706.0',
    'DLOSetting' => 132870,
    'DiffractionCorrectionOn' => 132875,
    'DistortionCorrection' => 132869,
    'DistortionCorrectionOn' => '0x20705.0',
    'DistortionEffect' => 132873,
    'GammaLinear' => 131584,
    'GreenHSL' => 133395,
    'HighlightAdj' => 131852,
    'LensFocalLength' => 984338,
    'LuminanceNoiseReduction' => 132608,
    'MagentaHSL' => 133399,
    'MonochromeFilterEffect' => 131847,
    'MonochromeToningEffect' => 131846,
    'OrangeHSL' => 133393,
    'PeripheralIllumination' => 132866,
    'PeripheralIlluminationOn' => '0x20702.0',
    'PictureStyle' => 131841,
    'PurpleHSL' => 133398,
    'RawBrightnessAdj' => 131073,
    'RedHSL' => 133392,
    'Rotation' => 65538,
    'SaturationAdj' => 133377,
    'ShadowAdj' => 131851,
    'SharpnessAdj' => 131856,
    'SharpnessAdjOn' => '0x20310.0',
    'SharpnessStrength' => 131857,
    'ShootingDistance' => 132865,
    'ToneCurveBrightness' => 132112,
    'ToneCurveContrast' => 132113,
    'ToneCurveOriginal' => '0x20400.1',
    'UnsharpMaskFineness' => 131849,
    'UnsharpMaskStrength' => 131848,
    'UnsharpMaskThreshold' => 131850,
    'WBAdjBlueAmber' => 131334,
    'WBAdjColorTemp' => 131330,
    'WBAdjMagentaGreen' => 131333,
    'WBAdjRGGBLevels' => 131365,
    'WhiteBalanceAdj' => 131329,
    'WorkColorSpace' => 66048,
    'YellowHSL' => 133394,
  ),
);
}
