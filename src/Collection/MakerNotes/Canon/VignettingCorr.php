<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class VignettingCorr extends Collection {

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
    'ChromaticAberrationCorr' => 5,
    'OriginalImageHeight' => 12,
    'OriginalImageWidth' => 11,
    'PeripheralLighting' => 2,
    'PeripheralLightingValue' => 6,
    'VignettingCorrVersion' => 0,
  ),
  'items' =>
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
    ),
    2 =>
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
    ),
    4 =>
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
    ),
    5 =>
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
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'PeripheralLightingValue',
      'title' => 'Peripheral Lighting Value',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalImageWidth',
      'title' => 'Original Image Width',
      'format' =>
      array (
        0 => 8,
      ),
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalImageHeight',
      'title' => 'Original Image Height',
      'format' =>
      array (
        0 => 8,
      ),
    ),
  ),
);
}
