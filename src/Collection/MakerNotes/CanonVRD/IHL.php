<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class IHL extends Collection {

  protected static $map = array (
  'name' => 'CanonVRDIHL',
  'title' => 'CanonVRD IHL',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'CRCDevelParams' => 6,
    'IHL_EXIF' => 1,
    'PreviewImage' => 4,
    'RawCodecVersion' => 5,
    'ThumbnailImage' => 3,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:CRCDevelParams' => 6,
    'CanonVRD:IHL_EXIF' => 1,
    'CanonVRD:PreviewImage' => 4,
    'CanonVRD:RawCodecVersion' => 5,
    'CanonVRD:ThumbnailImage' => 3,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'IHL_EXIF',
      'title' => 'IHL EXIF',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'CanonVRD:IHL_EXIF',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'ThumbnailImage',
      'title' => 'Thumbnail Image',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'CanonVRD:ThumbnailImage',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewImage',
      'title' => 'Preview Image',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'CanonVRD:PreviewImage',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawCodecVersion',
      'title' => 'Raw Codec Version',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'CanonVRD:RawCodecVersion',
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'CRCDevelParams',
      'title' => 'CRC Devel Params',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'CanonVRD:CRCDevelParams',
    ),
  ),
);
}
