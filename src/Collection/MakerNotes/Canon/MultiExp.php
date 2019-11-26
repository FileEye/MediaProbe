<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class MultiExp extends Collection {

  protected static $map = array (
  'name' => 'CanonMultiExp',
  'title' => 'Canon MultiExp',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'MultiExposure',
      'title' => 'Multi Exposure',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'On',
          2 => 'On (RAW)',
        ),
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'MultiExposureControl',
      'title' => 'Multi Exposure Control',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Additive',
          1 => 'Average',
          2 => 'Bright (comparative)',
          3 => 'Dark (comparative)',
        ),
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'MultiExposureShots',
      'title' => 'Multi Exposure Shots',
      'format' =>
      array (
        0 => 9,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'MultiExposure' => 1,
    'MultiExposureControl' => 2,
    'MultiExposureShots' => 3,
  ),
);
}