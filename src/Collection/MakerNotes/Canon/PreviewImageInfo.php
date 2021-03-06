<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class PreviewImageInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonPreviewImageInfo',
  'title' => 'Canon PreviewImageInfo',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'PreviewImageHeight' => 4,
    'PreviewImageLength' => 2,
    'PreviewImageStart' => 5,
    'PreviewImageWidth' => 3,
    'PreviewQuality' => 1,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:PreviewImageHeight' => 4,
    'Canon:PreviewImageLength' => 2,
    'Canon:PreviewImageStart' => 5,
    'Canon:PreviewImageWidth' => 3,
    'Canon:PreviewQuality' => 1,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewQuality',
      'title' => 'Preview Quality',
      'format' =>
      array (
        0 => 4,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'n/a',
          1 => 'Economy',
          2 => 'Normal',
          3 => 'Fine',
          4 => 'RAW',
          5 => 'Superfine',
          7 => 'CRAW',
          130 => 'Normal Movie',
          131 => 'Movie (2)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:PreviewQuality',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewImageLength',
      'title' => 'Preview Image Length',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:PreviewImageLength',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewImageWidth',
      'title' => 'Preview Image Width',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:PreviewImageWidth',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewImageHeight',
      'title' => 'Preview Image Height',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:PreviewImageHeight',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewImageStart',
      'title' => 'Preview Image Start',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:PreviewImageStart',
    ),
  ),
);
}
