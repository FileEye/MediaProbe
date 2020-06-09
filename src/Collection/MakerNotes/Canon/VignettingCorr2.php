<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class VignettingCorr2 extends Collection {

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
    'ChromaticAberrationSetting' => 6,
    'PeripheralLightingSetting' => 5,
    'indexSize' => 0,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'RawData',
      'name' => 'indexSize',
    ),
    5 =>
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
    ),
    6 =>
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
    ),
  ),
);
}
