<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class LightingOpt extends Collection {

  protected static $map = array (
  'name' => 'CanonLightingOpt',
  'title' => 'Canon LightingOpt',
  'class' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AutoLightingOptimizer' => 2,
    'HighISONoiseReduction' => 5,
    'HighlightTonePriority' => 3,
    'LongExposureNoiseReduction' => 4,
    'PeripheralIlluminationCorr' => 1,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AutoLightingOptimizer' => 2,
    'Canon:HighISONoiseReduction' => 5,
    'Canon:HighlightTonePriority' => 3,
    'Canon:LongExposureNoiseReduction' => 4,
    'Canon:PeripheralIlluminationCorr' => 1,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'PeripheralIlluminationCorr',
      'title' => 'Peripheral Illumination Corr',
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
      'exiftoolDOMNode' => 'Canon:PeripheralIlluminationCorr',
    ),
    2 =>
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
          3 => 'Off',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:AutoLightingOptimizer',
    ),
    3 =>
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
          0 => 'Off',
          1 => 'On',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:HighlightTonePriority',
    ),
    4 =>
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
      'exiftoolDOMNode' => 'Canon:LongExposureNoiseReduction',
    ),
    5 =>
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
      'exiftoolDOMNode' => 'Canon:HighISONoiseReduction',
    ),
  ),
);
}
