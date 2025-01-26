<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection\CollectionBase;

class IHL extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVRDIHL',
  'title' => 'CanonVRD IHL',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\CanonVRD\\IHL',
  'handler' => 'FileEye\\MediaProbe\\Block\\ExifMakerNotes\\CanonVRD\\IHL',
  'itemsByName' =>
  array (
    'CRCDevelParams' =>
    array (
      0 => 6,
    ),
    'IHL_EXIF' =>
    array (
      0 => 1,
    ),
    'PreviewImage' =>
    array (
      0 => 4,
    ),
    'RawCodecVersion' =>
    array (
      0 => 5,
    ),
    'ThumbnailImage' =>
    array (
      0 => 3,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:CRCDevelParams' =>
    array (
      0 => 6,
    ),
    'CanonVRD:IHL_EXIF' =>
    array (
      0 => 1,
    ),
    'CanonVRD:PreviewImage' =>
    array (
      0 => 4,
    ),
    'CanonVRD:RawCodecVersion' =>
    array (
      0 => 5,
    ),
    'CanonVRD:ThumbnailImage' =>
    array (
      0 => 3,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'IHL_EXIF',
        'title' => 'IHL EXIF',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'CanonVRD:IHL_EXIF',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ThumbnailImage',
        'title' => 'Thumbnail Image',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'CanonVRD:ThumbnailImage',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImage',
        'title' => 'Preview Image',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'CanonVRD:PreviewImage',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RawCodecVersion',
        'title' => 'Raw Codec Version',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'CanonVRD:RawCodecVersion',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CRCDevelParams',
        'title' => 'CRC Devel Params',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'CanonVRD:CRCDevelParams',
      ),
    ),
  ),
);
}
