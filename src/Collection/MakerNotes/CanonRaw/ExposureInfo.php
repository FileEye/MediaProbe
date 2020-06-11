<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection;

class ExposureInfo extends Collection {

  protected static $map = array (
  'name' => 'CanonRawExposureInfo',
  'title' => 'CanonRaw ExposureInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ApertureValue' => 2,
    'ExposureCompensation' => 0,
    'ShutterSpeedValue' => 1,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureCompensation',
      'title' => 'Exposure Compensation',
      'format' =>
      array (
        0 => 11,
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterSpeedValue',
      'title' => 'Shutter Speed Value',
      'format' =>
      array (
        0 => 11,
      ),
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'ApertureValue',
      'title' => 'Aperture Value',
      'format' =>
      array (
        0 => 11,
      ),
    ),
  ),
);
}
