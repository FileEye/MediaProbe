<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonRaw;

use FileEye\MediaProbe\Collection\CollectionBase;

class ExposureInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonRawExposureInfo',
  'title' => 'CanonRaw ExposureInfo',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\CanonRaw\\ExposureInfo',
  'handler' => 'FileEye\\MediaProbe\\Block\\ExifMakerNotes\\CanonRaw\\ExposureInfo',
  'itemsByName' =>
  array (
    'ApertureValue' =>
    array (
      0 => 2,
    ),
    'ExposureCompensation' =>
    array (
      0 => 0,
    ),
    'ShutterSpeedValue' =>
    array (
      0 => 1,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonRaw:ApertureValue' =>
    array (
      0 => 2,
    ),
    'CanonRaw:ExposureCompensation' =>
    array (
      0 => 0,
    ),
    'CanonRaw:ShutterSpeedValue' =>
    array (
      0 => 1,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ExposureCompensation',
        'title' => 'Exposure Compensation',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'CanonRaw:ExposureCompensation',
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ShutterSpeedValue',
        'title' => 'Shutter Speed Value',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'CanonRaw:ShutterSpeedValue',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ApertureValue',
        'title' => 'Aperture Value',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'CanonRaw:ApertureValue',
      ),
    ),
  ),
);
}
