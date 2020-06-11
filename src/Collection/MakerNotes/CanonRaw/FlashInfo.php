<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class FlashInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonRawFlashInfo',
  'title' => 'CanonRaw FlashInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'FlashGuideNumber' => 0,
    'FlashThreshold' => 1,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashGuideNumber',
      'title' => 'Flash Guide Number',
      'format' =>
      array (
        0 => 11,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashThreshold',
      'title' => 'Flash Threshold',
      'format' =>
      array (
        0 => 11,
      ),
    ),
  ),
);
}
