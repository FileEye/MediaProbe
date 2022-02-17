<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection\CollectionBase;

class DecoderTable extends CollectionBase {

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
    'CompressedDataLength' =>
    array (
      0 => 3,
    ),
    'CompressedDataOffset' =>
    array (
      0 => 2,
    ),
    'DecoderTableNumber' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonRaw:CompressedDataLength' =>
    array (
      0 => 3,
    ),
    'CanonRaw:CompressedDataOffset' =>
    array (
      0 => 2,
    ),
    'CanonRaw:DecoderTableNumber' =>
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
        'name' => 'DecoderTableNumber',
        'title' => 'Decoder Table Number',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:DecoderTableNumber',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CompressedDataOffset',
        'title' => 'Compressed Data Offset',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:CompressedDataOffset',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'CompressedDataLength',
        'title' => 'Compressed Data Length',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonRaw:CompressedDataLength',
      ),
    ),
  ),
);
}
