<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class AFMicroAdj extends Collection {

  protected static $map = array (
  'name' => 'CanonAFMicroAdj',
  'title' => 'Canon AF Micro Adj',
  'class' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 4,
  ),
  'hasIndexSize' => true,
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'RawData',
      'name' => 'indexSize',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFMicroAdjMode',
      'title' => 'AF Micro Adj Mode',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Disable',
          1 => 'Adjust all by the same amount',
          2 => 'Adjust by lens',
        ),
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFMicroAdjValue',
      'title' => 'AF Micro Adj Value',
      'format' =>
      array (
        0 => 10,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'AFMicroAdjMode' => 1,
    'AFMicroAdjValue' => 2,
    'indexSize' => 0,
  ),
);
}
