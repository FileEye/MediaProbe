<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class LightingOpt extends CollectionBase {

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
    'AutoLightingOptimizer' =>
    array (
      0 => 2,
    ),
    'HighISONoiseReduction' =>
    array (
      0 => 5,
    ),
    'HighlightTonePriority' =>
    array (
      0 => 3,
    ),
    'LongExposureNoiseReduction' =>
    array (
      0 => 4,
    ),
    'PeripheralIlluminationCorr' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AutoLightingOptimizer' =>
    array (
      0 => 2,
    ),
    'Canon:HighISONoiseReduction' =>
    array (
      0 => 5,
    ),
    'Canon:HighlightTonePriority' =>
    array (
      0 => 3,
    ),
    'Canon:LongExposureNoiseReduction' =>
    array (
      0 => 4,
    ),
    'Canon:PeripheralIlluminationCorr' =>
    array (
      0 => 1,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
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
    ),
    2 =>
    array (
      0 =>
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
    ),
    3 =>
    array (
      0 =>
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
    ),
    4 =>
    array (
      0 =>
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
    ),
    5 =>
    array (
      0 =>
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
  ),
);
}
