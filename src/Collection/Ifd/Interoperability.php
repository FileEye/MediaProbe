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
  'name' => 'Interoperability',
  'title' => 'IFD Interoperability',
  'class' => 'FileEye\\MediaProbe\\Block\\Ifd',
  'DOMNode' => 'ifd',
  'alias' =>
  array (
    0 => 'Interop',
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    1 =>
    array (
      'alias' =>
      array (
        0 => 'InteroperabilityIndex',
      ),
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
    ),
    2 =>
    array (
      'alias' =>
      array (
        0 => 'InteroperabilityVersion',
      ),
      'components' => 4,
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Version',
      'collection' => 'Tag',
      'name' => 'InteropVersion',
      'title' => 'Interoperability Version',
      'format' =>
      array (
        0 => 7,
      ),
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
    ),
  ),
  'itemsByName' =>
  array (
    'InteropIndex' => 1,
    'InteropVersion' => 2,
    'RelatedImageFileFormat' => 4096,
    'RelatedImageHeight' => 4098,
    'RelatedImageWidth' => 4097,
  ),
);
}
