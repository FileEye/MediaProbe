<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class PreviewImageInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonPreviewImageInfo',
  'title' => 'Canon PreviewImageInfo',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\PreviewImageInfo',
  'itemsByName' =>
  array (
    'PreviewImageHeight' =>
    array (
      0 => 4,
    ),
    'PreviewImageLength' =>
    array (
      0 => 2,
    ),
    'PreviewImageStart' =>
    array (
      0 => 5,
    ),
    'PreviewImageWidth' =>
    array (
      0 => 3,
    ),
    'PreviewQuality' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:PreviewImageHeight' =>
    array (
      0 => 4,
    ),
    'Canon:PreviewImageLength' =>
    array (
      0 => 2,
    ),
    'Canon:PreviewImageStart' =>
    array (
      0 => 5,
    ),
    'Canon:PreviewImageWidth' =>
    array (
      0 => 3,
    ),
    'Canon:PreviewQuality' =>
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
        'collection' => 'Tiff\\Tag',
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
            130 => 'Light (RAW)',
            131 => 'Standard (RAW)',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:PreviewQuality',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageLength',
        'title' => 'Preview Image Length',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:PreviewImageLength',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageWidth',
        'title' => 'Preview Image Width',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:PreviewImageWidth',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageHeight',
        'title' => 'Preview Image Height',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:PreviewImageHeight',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageStart',
        'title' => 'Preview Image Start',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:PreviewImageStart',
      ),
    ),
  ),
);
}
