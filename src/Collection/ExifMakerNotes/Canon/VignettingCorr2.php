<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class VignettingCorr2 extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVignettingCorr2',
  'title' => 'Canon VignettingCorr2',
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
    'ChromaticAberrationSetting' =>
    array (
      0 => 6,
    ),
    'PeripheralLightingSetting' =>
    array (
      0 => 5,
    ),
    'indexSize' =>
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
        'collection' => 'RawData',
        'name' => 'indexSize',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'PeripheralLightingSetting',
        'title' => 'Peripheral Lighting Setting',
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
        'exiftoolDOMNode' => 'Canon:PeripheralLightingSetting',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'ChromaticAberrationSetting',
        'title' => 'Chromatic Aberration Setting',
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
        'exiftoolDOMNode' => 'Canon:ChromaticAberrationSetting',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ChromaticAberrationSetting' =>
    array (
      0 => 6,
    ),
    'Canon:PeripheralLightingSetting' =>
    array (
      0 => 5,
    ),
  ),
);
}
