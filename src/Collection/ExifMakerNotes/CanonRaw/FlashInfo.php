<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection\CollectionBase;

class FlashInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonRawFlashInfo',
  'title' => 'CanonRaw FlashInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\CanonRaw\\FlashInfo',
  'itemsByName' =>
  array (
    'FlashGuideNumber' =>
    array (
      0 => 0,
    ),
    'FlashThreshold' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonRaw:FlashGuideNumber' =>
    array (
      0 => 0,
    ),
    'CanonRaw:FlashThreshold' =>
    array (
      0 => 1,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FlashGuideNumber',
        'title' => 'Flash Guide Number',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'CanonRaw:FlashGuideNumber',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FlashThreshold',
        'title' => 'Flash Threshold',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'CanonRaw:FlashThreshold',
      ),
    ),
  ),
);
}
