<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class LensInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonLensInfo',
  'title' => 'Canon LensInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 7,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'LensSerialNumber' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:LensSerialNumber' =>
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
        'name' => 'LensSerialNumber',
        'title' => 'Lens Serial Number',
        'components' => 5,
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Canon:LensSerialNumber',
      ),
    ),
  ),
);
}
