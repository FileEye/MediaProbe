<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorData5 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorData5',
  'title' => 'Canon Color Data5',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ColorDataVersion' => 0,
    'PerChannelBlackLevel' => 333,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorDataVersion' => 0,
    'Canon:PerChannelBlackLevel' => 333,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorDataVersion',
      'title' => 'Color Data Version',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -4 => '-4 (M100/M5/M6)',
          -3 => '-3 (M10/M3)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorDataVersion',
    ),
    264 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:PerChannelBlackLevel',
    ),
    333 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:PerChannelBlackLevel',
    ),
  ),
);
}
