<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class DecoderTable extends Collection {

  protected static $map = array (
  'name' => 'CanonRawDecoderTable',
  'title' => 'CanonRaw DecoderTable',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'CompressedDataLength' => 3,
    'CompressedDataOffset' => 2,
    'DecoderTableNumber' => 0,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'DecoderTableNumber',
      'title' => 'Decoder Table Number',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'CompressedDataOffset',
      'title' => 'Compressed Data Offset',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'CompressedDataLength',
      'title' => 'Compressed Data Length',
      'format' =>
      array (
        0 => 4,
      ),
    ),
  ),
);
}
