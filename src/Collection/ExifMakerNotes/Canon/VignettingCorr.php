<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class VignettingCorr extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVignettingCorr',
  'title' => 'Canon VignettingCorr',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ChromaticAberrationCorr' =>
    array (
      0 => 4,
      1 => 5,
    ),
    'OriginalImageHeight' =>
    array (
      0 => 12,
    ),
    'OriginalImageWidth' =>
    array (
      0 => 11,
    ),
    'PeripheralLighting' =>
    array (
      0 => 2,
    ),
    'PeripheralLightingValue' =>
    array (
      0 => 6,
    ),
    'VignettingCorrVersion' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ChromaticAberrationCorr' =>
    array (
      0 => 4,
      1 => 5,
    ),
    'Canon:OriginalImageHeight' =>
    array (
      0 => 12,
    ),
    'Canon:OriginalImageWidth' =>
    array (
      0 => 11,
    ),
    'Canon:PeripheralLighting' =>
    array (
      0 => 2,
    ),
    'Canon:PeripheralLightingValue' =>
    array (
      0 => 6,
    ),
    'Canon:VignettingCorrVersion' =>
    array (
      0 => 0,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'VignettingCorrVersion',
        'title' => 'Vignetting Corr Version',
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'Canon:VignettingCorrVersion',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'PeripheralLighting',
        'title' => 'Peripheral Lighting',
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
        'exiftoolDOMNode' => 'Canon:PeripheralLighting',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ChromaticAberrationCorr',
        'title' => 'Chromatic Aberration Corr',
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
        'exiftoolDOMNode' => 'Canon:ChromaticAberrationCorr',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ChromaticAberrationCorr',
        'title' => 'Chromatic Aberration Corr',
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
        'exiftoolDOMNode' => 'Canon:ChromaticAberrationCorr',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'PeripheralLightingValue',
        'title' => 'Peripheral Lighting Value',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:PeripheralLightingValue',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'OriginalImageWidth',
        'title' => 'Original Image Width',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:OriginalImageWidth',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'OriginalImageHeight',
        'title' => 'Original Image Height',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:OriginalImageHeight',
      ),
    ),
  ),
);
}
