<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class Ambience extends Collection {

  protected static $map = array (
  'name' => 'CanonAmbience',
  'title' => 'Canon Ambience',
  'class' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 4,
  ),
  'hasIndexSize' => true,
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AmbienceSelection' =>
    array (
      0 => 1,
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
        'format' =>
        array (
          0 => 4,
        ),
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AmbienceSelection',
        'title' => 'Ambience Selection',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Standard',
            1 => 'Vivid',
            2 => 'Warm',
            3 => 'Soft',
            4 => 'Cool',
            5 => 'Intense',
            6 => 'Brighter',
            7 => 'Darker',
            8 => 'Monochrome',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:AmbienceSelection',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AmbienceSelection' =>
    array (
      0 => 1,
    ),
  ),
);
}
