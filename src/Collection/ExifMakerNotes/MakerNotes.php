<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes;

use FileEye\MediaProbe\Collection\CollectionBase;

class MakerNotes extends CollectionBase {

  protected static $map = array (
  'id' => 'ExifMakerNotes\\MakerNotes',
  'handler' => 'FileEye\\MediaProbe\\Block\\ExifMakerNotes\\MakerNotes',
  'itemsByName' =>
  array (
    'Apple' =>
    array (
      0 => 'Apple',
    ),
    'Canon' =>
    array (
      0 => 'Canon',
    ),
  ),
  'items' =>
  array (
    'Apple' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Apple\\Main',
        'name' => 'Apple',
        'make' => 'Apple',
        'model' => '.*',
      ),
    ),
    'Canon' =>
    array (
      0 =>
      array (
        'collection' => 'Maker\\Canon\\Exif\\MakerNote',
        'name' => 'Canon',
        'make' => 'Canon',
        'model' => '.*',
      ),
    ),
  ),
);
}
