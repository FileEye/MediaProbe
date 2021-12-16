<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class Flags extends Collection {

  protected static $map = array (
  'name' => 'CanonFlags',
  'title' => 'Canon Flags',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Ifd',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ModifiedParamFlag' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ModifiedParamFlag' =>
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
        'name' => 'ModifiedParamFlag',
        'title' => 'Modified Param Flag',
        'format' =>
        array (
          0 => 8,
        ),
        'exiftoolDOMNode' => 'Canon:ModifiedParamFlag',
      ),
    ),
  ),
);
}
