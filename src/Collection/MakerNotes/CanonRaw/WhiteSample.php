<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class WhiteSample extends Collection {

  protected static $map = array (
  'name' => 'CanonRawWhiteSample',
  'title' => 'CanonRaw WhiteSample',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'WhiteSampleBits' => 5,
    'WhiteSampleHeight' => 2,
    'WhiteSampleLeftBorder' => 3,
    'WhiteSampleTopBorder' => 4,
    'WhiteSampleWidth' => 1,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonRaw:WhiteSampleBits' => 5,
    'CanonRaw:WhiteSampleHeight' => 2,
    'CanonRaw:WhiteSampleLeftBorder' => 3,
    'CanonRaw:WhiteSampleTopBorder' => 4,
    'CanonRaw:WhiteSampleWidth' => 1,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteSampleWidth',
      'title' => 'White Sample Width',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonRaw:WhiteSampleWidth',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteSampleHeight',
      'title' => 'White Sample Height',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonRaw:WhiteSampleHeight',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteSampleLeftBorder',
      'title' => 'White Sample Left Border',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonRaw:WhiteSampleLeftBorder',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteSampleTopBorder',
      'title' => 'White Sample Top Border',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonRaw:WhiteSampleTopBorder',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteSampleBits',
      'title' => 'White Sample Bits',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'CanonRaw:WhiteSampleBits',
    ),
  ),
);
}
