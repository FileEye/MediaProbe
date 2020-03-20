<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class Ver2 extends Collection {

  protected static $map = array (
  'name' => 'CanonVRDVer2',
  'title' => 'CanonVRD Ver2',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'PictureStyle',
      'title' => 'Picture Style',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Standard',
          1 => 'Portrait',
          2 => 'Landscape',
          3 => 'Neutral',
          4 => 'Faithful',
          5 => 'Monochrome',
          6 => 'Unknown?',
          7 => 'Custom',
        ),
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'IsCustomPictureStyle',
      'title' => 'Is Custom Picture Style',
      'format' =>
      array (
        0 => 8,
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
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawColorTone',
      'title' => 'Standard Raw Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    14 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawSaturation',
      'title' => 'Standard Raw Saturation',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    15 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawContrast',
      'title' => 'Standard Raw Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    16 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawLinear',
      'title' => 'Standard Raw Linear',
      'format' =>
      array (
        0 => 8,
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
    17 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawSharpness',
      'title' => 'Standard Raw Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    18 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawHighlightPoint',
      'title' => 'Standard Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    19 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawShadowPoint',
      'title' => 'Standard Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardOutputHighlightPoint',
      'title' => 'Standard Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    21 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardOutputShadowPoint',
      'title' => 'Standard Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    22 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawColorTone',
      'title' => 'Portrait Raw Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    23 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawSaturation',
      'title' => 'Portrait Raw Saturation',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    24 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawContrast',
      'title' => 'Portrait Raw Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    25 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawLinear',
      'title' => 'Portrait Raw Linear',
      'format' =>
      array (
        0 => 8,
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
    26 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawSharpness',
      'title' => 'Portrait Raw Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    27 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawHighlightPoint',
      'title' => 'Portrait Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    28 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawShadowPoint',
      'title' => 'Portrait Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    29 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitOutputHighlightPoint',
      'title' => 'Portrait Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    30 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitOutputShadowPoint',
      'title' => 'Portrait Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    31 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawColorTone',
      'title' => 'Landscape Raw Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    32 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawSaturation',
      'title' => 'Landscape Raw Saturation',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    33 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawContrast',
      'title' => 'Landscape Raw Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    34 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawLinear',
      'title' => 'Landscape Raw Linear',
      'format' =>
      array (
        0 => 8,
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
    35 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawSharpness',
      'title' => 'Landscape Raw Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    36 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawHighlightPoint',
      'title' => 'Landscape Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    37 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawShadowPoint',
      'title' => 'Landscape Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    38 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeOutputHighlightPoint',
      'title' => 'Landscape Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    39 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeOutputShadowPoint',
      'title' => 'Landscape Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    40 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawColorTone',
      'title' => 'Neutral Raw Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    41 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawSaturation',
      'title' => 'Neutral Raw Saturation',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    42 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawContrast',
      'title' => 'Neutral Raw Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    43 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawLinear',
      'title' => 'Neutral Raw Linear',
      'format' =>
      array (
        0 => 8,
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
    44 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawSharpness',
      'title' => 'Neutral Raw Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    45 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawHighlightPoint',
      'title' => 'Neutral Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    46 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawShadowPoint',
      'title' => 'Neutral Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    47 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralOutputHighlightPoint',
      'title' => 'Neutral Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    48 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralOutputShadowPoint',
      'title' => 'Neutral Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    49 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawColorTone',
      'title' => 'Faithful Raw Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    50 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawSaturation',
      'title' => 'Faithful Raw Saturation',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    51 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawContrast',
      'title' => 'Faithful Raw Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    52 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawLinear',
      'title' => 'Faithful Raw Linear',
      'format' =>
      array (
        0 => 8,
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
    53 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawSharpness',
      'title' => 'Faithful Raw Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    54 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawHighlightPoint',
      'title' => 'Faithful Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    55 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawShadowPoint',
      'title' => 'Faithful Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    56 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulOutputHighlightPoint',
      'title' => 'Faithful Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    57 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulOutputShadowPoint',
      'title' => 'Faithful Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    58 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeFilterEffect',
      'title' => 'Monochrome Filter Effect',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -2 => 'None',
          -1 => 'Yellow',
          0 => 'Orange',
          1 => 'Red',
          2 => 'Green',
        ),
      ),
    ),
    59 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeToningEffect',
      'title' => 'Monochrome Toning Effect',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -2 => 'None',
          -1 => 'Sepia',
          0 => 'Blue',
          1 => 'Purple',
          2 => 'Green',
        ),
      ),
    ),
    60 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeContrast',
      'title' => 'Monochrome Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    61 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeLinear',
      'title' => 'Monochrome Linear',
      'format' =>
      array (
        0 => 8,
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
    62 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeSharpness',
      'title' => 'Monochrome Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    63 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeRawHighlightPoint',
      'title' => 'Monochrome Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    64 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeRawShadowPoint',
      'title' => 'Monochrome Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    65 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeOutputHighlightPoint',
      'title' => 'Monochrome Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    66 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeOutputShadowPoint',
      'title' => 'Monochrome Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    69 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownContrast',
      'title' => 'Unknown Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    70 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownLinear',
      'title' => 'Unknown Linear',
      'format' =>
      array (
        0 => 8,
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
    71 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownSharpness',
      'title' => 'Unknown Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    72 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownRawHighlightPoint',
      'title' => 'Unknown Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    73 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownRawShadowPoint',
      'title' => 'Unknown Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    74 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownOutputHighlightPoint',
      'title' => 'Unknown Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    75 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownOutputShadowPoint',
      'title' => 'Unknown Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    76 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomColorTone',
      'title' => 'Custom Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    77 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomSaturation',
      'title' => 'Custom Saturation',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    78 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomContrast',
      'title' => 'Custom Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    79 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomLinear',
      'title' => 'Custom Linear',
      'format' =>
      array (
        0 => 8,
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
    80 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomSharpness',
      'title' => 'Custom Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    81 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomRawHighlightPoint',
      'title' => 'Custom Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    82 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomRawShadowPoint',
      'title' => 'Custom Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    83 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomOutputHighlightPoint',
      'title' => 'Custom Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    84 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomOutputShadowPoint',
      'title' => 'Custom Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    88 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomPictureStyleData',
      'title' => 'Custom Picture Style Data',
      'format' =>
      array (
        0 => 7,
      ),
    ),
    94 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChrominanceNoiseReduction',
      'title' => 'Chrominance Noise Reduction',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          58 => 'Low',
          100 => 'High',
        ),
      ),
    ),
    95 =>
    array (
      'collection' => 'Tag',
      'name' => 'LuminanceNoiseReduction',
      'title' => 'Luminance Noise Reduction',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          65 => 'Low',
          100 => 'High',
        ),
      ),
    ),
    96 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChrominanceNR_TIFF_JPEG',
      'title' => 'Chrominance NR TIFF JPEG',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          33 => 'Low',
          100 => 'High',
        ),
      ),
    ),
    98 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationOn',
      'title' => 'Chromatic Aberration On',
      'format' =>
      array (
        0 => 8,
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
    99 =>
    array (
      'collection' => 'Tag',
      'name' => 'DistortionCorrectionOn',
      'title' => 'Distortion Correction On',
      'format' =>
      array (
        0 => 8,
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
    100 =>
    array (
      'collection' => 'Tag',
      'name' => 'PeripheralIlluminationOn',
      'title' => 'Peripheral Illumination On',
      'format' =>
      array (
        0 => 8,
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
    101 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorBlur',
      'title' => 'Color Blur',
      'format' =>
      array (
        0 => 8,
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
    102 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberration',
      'title' => 'Chromatic Aberration',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    103 =>
    array (
      'collection' => 'Tag',
      'name' => 'DistortionCorrection',
      'title' => 'Distortion Correction',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    104 =>
    array (
      'collection' => 'Tag',
      'name' => 'PeripheralIllumination',
      'title' => 'Peripheral Illumination',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    105 =>
    array (
      'collection' => 'Tag',
      'name' => 'AberrationCorrectionDistance',
      'title' => 'Aberration Correction Distance',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    106 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationRed',
      'title' => 'Chromatic Aberration Red',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    107 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationBlue',
      'title' => 'Chromatic Aberration Blue',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    109 =>
    array (
      'collection' => 'Tag',
      'name' => 'LuminanceNR_TIFF_JPEG',
      'title' => 'Luminance NR TIFF JPEG',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    110 =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoLightingOptimizerOn',
      'title' => 'Auto Lighting Optimizer On',
      'format' =>
      array (
        0 => 8,
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
    111 =>
    array (
      'collection' => 'Tag',
      'name' => 'AutoLightingOptimizer',
      'title' => 'Auto Lighting Optimizer',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          100 => 'Low',
          200 => 'Standard',
          300 => 'Strong',
          32767 => 'n/a',
        ),
      ),
    ),
    117 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawHighlight',
      'title' => 'Standard Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    118 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawHighlight',
      'title' => 'Portrait Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    119 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawHighlight',
      'title' => 'Landscape Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    120 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawHighlight',
      'title' => 'Neutral Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    121 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawHighlight',
      'title' => 'Faithful Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    122 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeRawHighlight',
      'title' => 'Monochrome Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    123 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownRawHighlight',
      'title' => 'Unknown Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    124 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomRawHighlight',
      'title' => 'Custom Raw Highlight',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    126 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardRawShadow',
      'title' => 'Standard Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    127 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitRawShadow',
      'title' => 'Portrait Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    128 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeRawShadow',
      'title' => 'Landscape Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    129 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralRawShadow',
      'title' => 'Neutral Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    130 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulRawShadow',
      'title' => 'Faithful Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    131 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeRawShadow',
      'title' => 'Monochrome Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    132 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnknownRawShadow',
      'title' => 'Unknown Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    133 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomRawShadow',
      'title' => 'Custom Raw Shadow',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    139 =>
    array (
      'collection' => 'Tag',
      'name' => 'AngleAdj',
      'title' => 'Angle Adj',
      'format' =>
      array (
        0 => 9,
      ),
    ),
    142 =>
    array (
      'collection' => 'Tag',
      'name' => 'CheckMark2',
      'title' => 'Check Mark 2',
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
          4 => '4',
          5 => '5',
        ),
      ),
    ),
    144 =>
    array (
      'collection' => 'Tag',
      'name' => 'UnsharpMask',
      'title' => 'Unsharp Mask',
      'format' =>
      array (
        0 => 8,
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
    146 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardUnsharpMaskStrength',
      'title' => 'Standard Unsharp Mask Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    148 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardUnsharpMaskFineness',
      'title' => 'Standard Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    150 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardUnsharpMaskThreshold',
      'title' => 'Standard Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    152 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitUnsharpMaskStrength',
      'title' => 'Portrait Unsharp Mask Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    154 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitUnsharpMaskFineness',
      'title' => 'Portrait Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    156 =>
    array (
      'collection' => 'Tag',
      'name' => 'PortraitUnsharpMaskThreshold',
      'title' => 'Portrait Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    158 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeUnsharpMaskStrength',
      'title' => 'Landscape Unsharp Mask Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    160 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeUnsharpMaskFineness',
      'title' => 'Landscape Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    162 =>
    array (
      'collection' => 'Tag',
      'name' => 'LandscapeUnsharpMaskThreshold',
      'title' => 'Landscape Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    164 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutraUnsharpMaskStrength',
      'title' => 'Neutra Unsharp Mask Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    166 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralUnsharpMaskFineness',
      'title' => 'Neutral Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    168 =>
    array (
      'collection' => 'Tag',
      'name' => 'NeutralUnsharpMaskThreshold',
      'title' => 'Neutral Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    170 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulUnsharpMaskStrength',
      'title' => 'Faithful Unsharp Mask Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    172 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulUnsharpMaskFineness',
      'title' => 'Faithful Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    174 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaithfulUnsharpMaskThreshold',
      'title' => 'Faithful Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    176 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeUnsharpMaskStrength',
      'title' => 'Monochrome Unsharp Mask Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    178 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeUnsharpMaskFineness',
      'title' => 'Monochrome Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    180 =>
    array (
      'collection' => 'Tag',
      'name' => 'MonochromeUnsharpMaskThreshold',
      'title' => 'Monochrome Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    182 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomUnsharpMaskStrength',
      'title' => 'Custom Unsharp Mask Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    184 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomUnsharpMaskFineness',
      'title' => 'Custom Unsharp Mask Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    186 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomUnsharpMaskThreshold',
      'title' => 'Custom Unsharp Mask Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    188 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomDefaultUnsharpStrength',
      'title' => 'Custom Default Unsharp Strength',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    190 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomDefaultUnsharpFineness',
      'title' => 'Custom Default Unsharp Fineness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    192 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomDefaultUnsharpThreshold',
      'title' => 'Custom Default Unsharp Threshold',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    214 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropCircleActive',
      'title' => 'Crop Circle Active',
      'format' =>
      array (
        0 => 8,
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
    215 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropCircleX',
      'title' => 'Crop Circle X',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    216 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropCircleY',
      'title' => 'Crop Circle Y',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    217 =>
    array (
      'collection' => 'Tag',
      'name' => 'CropCircleRadius',
      'title' => 'Crop Circle Radius',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    220 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOOn',
      'title' => 'DLO On',
      'format' =>
      array (
        0 => 8,
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
    221 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOSetting',
      'title' => 'DLO Setting',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    222 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLOShootingDistance',
      'title' => 'DLO Shooting Distance',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    223 =>
    array (
      'collection' => 'Tag',
      'name' => 'DLODataLength',
      'title' => 'DLO Data Length',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    225 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawColorTone',
      'title' => 'Camera Raw Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    226 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawSaturation',
      'title' => 'Camera Raw Saturation',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    227 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawContrast',
      'title' => 'Camera Raw Contrast',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    228 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawLinear',
      'title' => 'Camera Raw Linear',
      'format' =>
      array (
        0 => 8,
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
    229 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawSharpness',
      'title' => 'Camera Raw Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    230 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawHighlightPoint',
      'title' => 'Camera Raw Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    231 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawShadowPoint',
      'title' => 'Camera Raw Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    232 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawOutputHighlightPoint',
      'title' => 'Camera Raw Output Highlight Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    233 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraRawOutputShadowPoint',
      'title' => 'Camera Raw Output Shadow Point',
      'format' =>
      array (
        0 => 8,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'AberrationCorrectionDistance' => 105,
    'AngleAdj' => 139,
    'AutoLightingOptimizer' => 111,
    'AutoLightingOptimizerOn' => 110,
    'CameraRawColorTone' => 225,
    'CameraRawContrast' => 227,
    'CameraRawHighlightPoint' => 230,
    'CameraRawLinear' => 228,
    'CameraRawOutputHighlightPoint' => 232,
    'CameraRawOutputShadowPoint' => 233,
    'CameraRawSaturation' => 226,
    'CameraRawShadowPoint' => 231,
    'CameraRawSharpness' => 229,
    'CheckMark2' => 142,
    'ChromaticAberration' => 102,
    'ChromaticAberrationBlue' => 107,
    'ChromaticAberrationOn' => 98,
    'ChromaticAberrationRed' => 106,
    'ChrominanceNR_TIFF_JPEG' => 96,
    'ChrominanceNoiseReduction' => 94,
    'ColorBlur' => 101,
    'CropCircleActive' => 214,
    'CropCircleRadius' => 217,
    'CropCircleX' => 215,
    'CropCircleY' => 216,
    'CustomColorTone' => 76,
    'CustomContrast' => 78,
    'CustomDefaultUnsharpFineness' => 190,
    'CustomDefaultUnsharpStrength' => 188,
    'CustomDefaultUnsharpThreshold' => 192,
    'CustomLinear' => 79,
    'CustomOutputHighlightPoint' => 83,
    'CustomOutputShadowPoint' => 84,
    'CustomPictureStyleData' => 88,
    'CustomRawHighlight' => 124,
    'CustomRawHighlightPoint' => 81,
    'CustomRawShadow' => 133,
    'CustomRawShadowPoint' => 82,
    'CustomSaturation' => 77,
    'CustomSharpness' => 80,
    'CustomUnsharpMaskFineness' => 184,
    'CustomUnsharpMaskStrength' => 182,
    'CustomUnsharpMaskThreshold' => 186,
    'DLODataLength' => 223,
    'DLOOn' => 220,
    'DLOSetting' => 221,
    'DLOShootingDistance' => 222,
    'DistortionCorrection' => 103,
    'DistortionCorrectionOn' => 99,
    'FaithfulOutputHighlightPoint' => 56,
    'FaithfulOutputShadowPoint' => 57,
    'FaithfulRawColorTone' => 49,
    'FaithfulRawContrast' => 51,
    'FaithfulRawHighlight' => 121,
    'FaithfulRawHighlightPoint' => 54,
    'FaithfulRawLinear' => 52,
    'FaithfulRawSaturation' => 50,
    'FaithfulRawShadow' => 130,
    'FaithfulRawShadowPoint' => 55,
    'FaithfulRawSharpness' => 53,
    'FaithfulUnsharpMaskFineness' => 172,
    'FaithfulUnsharpMaskStrength' => 170,
    'FaithfulUnsharpMaskThreshold' => 174,
    'IsCustomPictureStyle' => 3,
    'LandscapeOutputHighlightPoint' => 38,
    'LandscapeOutputShadowPoint' => 39,
    'LandscapeRawColorTone' => 31,
    'LandscapeRawContrast' => 33,
    'LandscapeRawHighlight' => 119,
    'LandscapeRawHighlightPoint' => 36,
    'LandscapeRawLinear' => 34,
    'LandscapeRawSaturation' => 32,
    'LandscapeRawShadow' => 128,
    'LandscapeRawShadowPoint' => 37,
    'LandscapeRawSharpness' => 35,
    'LandscapeUnsharpMaskFineness' => 160,
    'LandscapeUnsharpMaskStrength' => 158,
    'LandscapeUnsharpMaskThreshold' => 162,
    'LuminanceNR_TIFF_JPEG' => 109,
    'LuminanceNoiseReduction' => 95,
    'MonochromeContrast' => 60,
    'MonochromeFilterEffect' => 58,
    'MonochromeLinear' => 61,
    'MonochromeOutputHighlightPoint' => 65,
    'MonochromeOutputShadowPoint' => 66,
    'MonochromeRawHighlight' => 122,
    'MonochromeRawHighlightPoint' => 63,
    'MonochromeRawShadow' => 131,
    'MonochromeRawShadowPoint' => 64,
    'MonochromeSharpness' => 62,
    'MonochromeToningEffect' => 59,
    'MonochromeUnsharpMaskFineness' => 178,
    'MonochromeUnsharpMaskStrength' => 176,
    'MonochromeUnsharpMaskThreshold' => 180,
    'NeutraUnsharpMaskStrength' => 164,
    'NeutralOutputHighlightPoint' => 47,
    'NeutralOutputShadowPoint' => 48,
    'NeutralRawColorTone' => 40,
    'NeutralRawContrast' => 42,
    'NeutralRawHighlight' => 120,
    'NeutralRawHighlightPoint' => 45,
    'NeutralRawLinear' => 43,
    'NeutralRawSaturation' => 41,
    'NeutralRawShadow' => 129,
    'NeutralRawShadowPoint' => 46,
    'NeutralRawSharpness' => 44,
    'NeutralUnsharpMaskFineness' => 166,
    'NeutralUnsharpMaskThreshold' => 168,
    'PeripheralIllumination' => 104,
    'PeripheralIlluminationOn' => 100,
    'PictureStyle' => 2,
    'PortraitOutputHighlightPoint' => 29,
    'PortraitOutputShadowPoint' => 30,
    'PortraitRawColorTone' => 22,
    'PortraitRawContrast' => 24,
    'PortraitRawHighlight' => 118,
    'PortraitRawHighlightPoint' => 27,
    'PortraitRawLinear' => 25,
    'PortraitRawSaturation' => 23,
    'PortraitRawShadow' => 127,
    'PortraitRawShadowPoint' => 28,
    'PortraitRawSharpness' => 26,
    'PortraitUnsharpMaskFineness' => 154,
    'PortraitUnsharpMaskStrength' => 152,
    'PortraitUnsharpMaskThreshold' => 156,
    'StandardOutputHighlightPoint' => 20,
    'StandardOutputShadowPoint' => 21,
    'StandardRawColorTone' => 13,
    'StandardRawContrast' => 15,
    'StandardRawHighlight' => 117,
    'StandardRawHighlightPoint' => 18,
    'StandardRawLinear' => 16,
    'StandardRawSaturation' => 14,
    'StandardRawShadow' => 126,
    'StandardRawShadowPoint' => 19,
    'StandardRawSharpness' => 17,
    'StandardUnsharpMaskFineness' => 148,
    'StandardUnsharpMaskStrength' => 146,
    'StandardUnsharpMaskThreshold' => 150,
    'UnknownContrast' => 69,
    'UnknownLinear' => 70,
    'UnknownOutputHighlightPoint' => 74,
    'UnknownOutputShadowPoint' => 75,
    'UnknownRawHighlight' => 123,
    'UnknownRawHighlightPoint' => 72,
    'UnknownRawShadow' => 132,
    'UnknownRawShadowPoint' => 73,
    'UnknownSharpness' => 71,
    'UnsharpMask' => 144,
  ),
);
}
