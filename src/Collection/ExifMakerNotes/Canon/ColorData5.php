<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class ColorData5 extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonColorData5',
  'title' => 'Canon Color Data5',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\ColorData5',
  'itemsByName' =>
  array (
    'ColorDataVersion' =>
    array (
      0 => 0,
    ),
    'NormalWhiteLevel' =>
    array (
      0 => 1385,
    ),
    'PerChannelBlackLevel' =>
    array (
      0 => 264,
      1 => 333,
    ),
    'SpecularWhiteLevel' =>
    array (
      0 => 662,
      1 => 1386,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorDataVersion' =>
    array (
      0 => 0,
    ),
    'Canon:NormalWhiteLevel' =>
    array (
      0 => 1385,
    ),
    'Canon:PerChannelBlackLevel' =>
    array (
      0 => 264,
      1 => 333,
    ),
    'Canon:SpecularWhiteLevel' =>
    array (
      0 => 662,
      1 => 1386,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    264 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    333 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    662 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SpecularWhiteLevel',
        'title' => 'Specular White Level',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:SpecularWhiteLevel',
      ),
    ),
    1385 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'NormalWhiteLevel',
        'title' => 'Normal White Level',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:NormalWhiteLevel',
      ),
    ),
    1386 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SpecularWhiteLevel',
        'title' => 'Specular White Level',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:SpecularWhiteLevel',
      ),
    ),
  ),
);
}
