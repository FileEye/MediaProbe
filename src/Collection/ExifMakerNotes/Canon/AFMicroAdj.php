<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class AFMicroAdj extends CollectionBase {

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
  'itemsByName' =>
  array (
    'AFMicroAdjMode' =>
    array (
      0 => 1,
    ),
    'AFMicroAdjValue' =>
    array (
      0 => 2,
    ),
    'indexSize' =>
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
        'collection' => 'RawData',
        'name' => 'indexSize',
        'format' =>
        array (
          0 => 4,
        ),
      ),
    ),
    1 =>
    array (
      0 =>
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
        'exiftoolDOMNode' => 'Canon:AFMicroAdjMode',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tag',
        'name' => 'AFMicroAdjValue',
        'title' => 'AF Micro Adj Value',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Canon:AFMicroAdjValue',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AFMicroAdjMode' =>
    array (
      0 => 1,
    ),
    'Canon:AFMicroAdjValue' =>
    array (
      0 => 2,
    ),
  ),
);
}
