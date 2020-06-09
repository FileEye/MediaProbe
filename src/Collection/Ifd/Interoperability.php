<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Ifd;

use FileEye\MediaProbe\Collection;

class Interoperability extends Collection {

  protected static $map = array (
  'name' => 'InteropIFD',
  'title' => 'Interoperability IFD',
  'class' => 'FileEye\\MediaProbe\\Block\\Ifd',
  'DOMNode' => 'ifd',
  'alias' =>
  array (
    0 => 'Interop',
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'InteropIndex' => 1,
    'InteropVersion' => 2,
    'RelatedImageFileFormat' => 4096,
    'RelatedImageHeight' => 4098,
    'RelatedImageWidth' => 4097,
  ),
  'itemsByPhpExifTag' =>
  array (
    'InterOperabilityIndex' => 1,
    'InterOperabilityVersion' => 2,
    'RelatedFileFormat' => 4096,
    'RelatedImageHeight' => 4098,
    'RelatedImageWidth' => 4097,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'InteropIFD:InteropIndex' => 1,
    'InteropIFD:InteropVersion' => 2,
    'InteropIFD:RelatedImageFileFormat' => 4096,
    'InteropIFD:RelatedImageHeight' => 4098,
    'InteropIFD:RelatedImageWidth' => 4097,
  ),
  'items' =>
  array (
    1 =>
    array (
      'components' => 4,
      'collection' => 'Tag',
      'name' => 'InteropIndex',
      'title' => 'Interoperability Index',
      'format' =>
      array (
        0 => 2,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          'R03' => 'R03 - DCF option file (Adobe RGB)',
          'R98' => 'R98 - DCF basic file (sRGB)',
          'THM' => 'THM - DCF thumbnail file',
        ),
      ),
      'phpExifTag' => 'InterOperabilityIndex',
      'exiftoolDOMNode' => 'InteropIFD:InteropIndex',
    ),
    2 =>
    array (
      'components' => 4,
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Version',
      'collection' => 'Tag',
      'name' => 'InteropVersion',
      'title' => 'Interoperability Version',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'InterOperabilityVersion',
      'exiftoolDOMNode' => 'InteropIFD:InteropVersion',
    ),
    4096 =>
    array (
      'collection' => 'Tag',
      'name' => 'RelatedImageFileFormat',
      'title' => 'Related Image File Format',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'RelatedFileFormat',
      'exiftoolDOMNode' => 'InteropIFD:RelatedImageFileFormat',
    ),
    4097 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'RelatedImageWidth',
      'title' => 'Related Image Width',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'RelatedImageWidth',
      'exiftoolDOMNode' => 'InteropIFD:RelatedImageWidth',
    ),
    4098 =>
    array (
      'alias' =>
      array (
        0 => 'RelatedImageLength',
      ),
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'RelatedImageHeight',
      'title' => 'Related Image Height',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'RelatedImageHeight',
      'exiftoolDOMNode' => 'InteropIFD:RelatedImageHeight',
    ),
  ),
);
}
