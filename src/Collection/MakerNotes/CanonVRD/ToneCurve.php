<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection;

class ToneCurve extends Collection {

  protected static $map = array (
  'name' => 'CanonVRDToneCurve',
  'title' => 'CanonVRD ToneCurve',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveColorSpace',
      'title' => 'Tone Curve Color Space',
      'format' =>
      array (
        0 => 4,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'RGB',
          1 => 'Luminance',
        ),
      ),
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveShape',
      'title' => 'Tone Curve Shape',
      'format' =>
      array (
        0 => 4,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Curve',
          1 => 'Straight',
        ),
      ),
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveInputRange',
      'title' => 'Tone Curve Input Range',
      'components' => 2,
      'format' =>
      array (
        0 => 4,
      ),
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveOutputRange',
      'title' => 'Tone Curve Output Range',
      'components' => 2,
      'format' =>
      array (
        0 => 4,
      ),
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'RGBCurvePoints',
      'title' => 'RGB Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 4,
      ),
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveX',
      'title' => 'Tone Curve X',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToneCurveY',
      'title' => 'Tone Curve Y',
      'format' =>
      array (
        0 => 4,
      ),
    ),
    45 =>
    array (
      'collection' => 'Tag',
      'name' => 'RedCurvePoints',
      'title' => 'Red Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 4,
      ),
    ),
    83 =>
    array (
      'collection' => 'Tag',
      'name' => 'GreenCurvePoints',
      'title' => 'Green Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 4,
      ),
    ),
    121 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlueCurvePoints',
      'title' => 'Blue Curve Points',
      'components' => 21,
      'format' =>
      array (
        0 => 4,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'BlueCurvePoints' => 121,
    'GreenCurvePoints' => 83,
    'RGBCurvePoints' => 7,
    'RedCurvePoints' => 45,
    'ToneCurveColorSpace' => 0,
    'ToneCurveInputRange' => 3,
    'ToneCurveOutputRange' => 5,
    'ToneCurveShape' => 1,
    'ToneCurveX' => 10,
    'ToneCurveY' => 11,
  ),
);
}
