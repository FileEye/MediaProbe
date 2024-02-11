<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Tiff;

use FileEye\MediaProbe\Collection\CollectionBase;

class IfdInteroperability extends CollectionBase {

  protected static $map = array (
  'name' => 'InteropIFD',
  'title' => 'Interoperability IFD',
  'class' => 'FileEye\\MediaProbe\\Block\\Tiff\\Ifd',
  'DOMNode' => 'ifd',
  'alias' =>
  array (
    0 => 'Interop',
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'Tiff\\IfdInteroperability',
  'itemsByName' =>
  array (
    'InteropIndex' =>
    array (
      0 => 1,
    ),
    'InteropVersion' =>
    array (
      0 => 2,
    ),
    'RelatedImageFileFormat' =>
    array (
      0 => 4096,
    ),
    'RelatedImageHeight' =>
    array (
      0 => 4098,
    ),
    'RelatedImageWidth' =>
    array (
      0 => 4097,
    ),
  ),
  'itemsByPhpExifTag' =>
  array (
    'InterOperabilityIndex' =>
    array (
      0 => 1,
    ),
    'InterOperabilityVersion' =>
    array (
      0 => 2,
    ),
    'RelatedFileFormat' =>
    array (
      0 => 4096,
    ),
    'RelatedImageHeight' =>
    array (
      0 => 4098,
    ),
    'RelatedImageWidth' =>
    array (
      0 => 4097,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'InteropIFD:InteropIndex' =>
    array (
      0 => 1,
    ),
    'InteropIFD:InteropVersion' =>
    array (
      0 => 2,
    ),
    'InteropIFD:RelatedImageFileFormat' =>
    array (
      0 => 4096,
    ),
    'InteropIFD:RelatedImageHeight' =>
    array (
      0 => 4098,
    ),
    'InteropIFD:RelatedImageWidth' =>
    array (
      0 => 4097,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'components' => 4,
        'collection' => 'Tiff\\Tag',
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
    ),
    2 =>
    array (
      0 =>
      array (
        'components' => 4,
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Version',
        'collection' => 'Tiff\\Tag',
        'name' => 'InteropVersion',
        'title' => 'Interoperability Version',
        'format' =>
        array (
          0 => 7,
        ),
        'phpExifTag' => 'InterOperabilityVersion',
        'exiftoolDOMNode' => 'InteropIFD:InteropVersion',
      ),
    ),
    4096 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RelatedImageFileFormat',
        'title' => 'Related Image File Format',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'RelatedFileFormat',
        'exiftoolDOMNode' => 'InteropIFD:RelatedImageFileFormat',
      ),
    ),
    4097 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'RelatedImageWidth',
        'title' => 'Related Image Width',
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'RelatedImageWidth',
        'exiftoolDOMNode' => 'InteropIFD:RelatedImageWidth',
      ),
    ),
    4098 =>
    array (
      0 =>
      array (
        'alias' =>
        array (
          0 => 'RelatedImageLength',
        ),
        'components' => 1,
        'collection' => 'Tiff\\Tag',
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
  ),
);
}
