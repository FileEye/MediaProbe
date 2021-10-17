<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ContrastInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonContrastInfo',
  'title' => 'Canon ContrastInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'IntelligentContrast' =>
    array (
      0 => 4,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:IntelligentContrast' =>
    array (
      0 => 4,
    ),
  ),
  'items' =>
  array (
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'IntelligentContrast',
        'title' => 'Intelligent Contrast',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            8 => 'On',
            65535 => 'n/a',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:IntelligentContrast',
      ),
    ),
  ),
);
}
