<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class FocalLength extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonFocalLength',
  'title' => 'Canon Focal Length',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'id' => 'ExifMakerNotes\\Canon\\FocalLength',
  'itemsByName' =>
  array (
    'FocalLength' =>
    array (
      0 => 1,
    ),
    'FocalPlaneXSize' =>
    array (
      0 => 2,
    ),
    'FocalPlaneXUnknown' =>
    array (
      0 => 2,
    ),
    'FocalPlaneYSize' =>
    array (
      0 => 3,
    ),
    'FocalPlaneYUnknown' =>
    array (
      0 => 3,
    ),
    'FocalType' =>
    array (
      0 => 0,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FocalLength' =>
    array (
      0 => 1,
    ),
    'Canon:FocalPlaneXSize' =>
    array (
      0 => 2,
    ),
    'Canon:FocalPlaneXUnknown' =>
    array (
      0 => 2,
    ),
    'Canon:FocalPlaneYSize' =>
    array (
      0 => 3,
    ),
    'Canon:FocalPlaneYUnknown' =>
    array (
      0 => 3,
    ),
    'Canon:FocalType' =>
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
        'text' =>
        array (
          'default' => 'Unknown ({value})',
          'mapping' =>
          array (
            1 => 'Fixed',
            2 => 'Zoom',
          ),
        ),
        'collection' => 'Tag',
        'name' => 'FocalType',
        'title' => 'Focal Type',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocalType',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FLFocalLength',
        'collection' => 'Tag',
        'name' => 'FocalLength',
        'title' => 'Focal Length',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocalLength',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FocalPlaneSize',
        'collection' => 'Tag',
        'name' => 'FocalPlaneXSize',
        'title' => 'Focal Plane X Size',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocalPlaneXSize',
      ),
      1 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FocalPlaneSize',
        'collection' => 'Tag',
        'name' => 'FocalPlaneXUnknown',
        'title' => 'Focal Plane X Unknown',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocalPlaneXUnknown',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FocalPlaneSize',
        'collection' => 'Tag',
        'name' => 'FocalPlaneYSize',
        'title' => 'Focal Plane Y Size',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocalPlaneYSize',
      ),
      1 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Canon\\Exif\\FocalPlaneSize',
        'collection' => 'Tag',
        'name' => 'FocalPlaneYUnknown',
        'title' => 'Focal Plane Y Unknown',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FocalPlaneYUnknown',
      ),
    ),
  ),
);
}
