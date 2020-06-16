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
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:BlueCurvePoints' => 121,
    'CanonVRD:GreenCurvePoints' => 83,
    'CanonVRD:RGBCurvePoints' => 7,
    'CanonVRD:RedCurvePoints' => 45,
    'CanonVRD:ToneCurveColorSpace' => 0,
    'CanonVRD:ToneCurveInputRange' => 3,
    'CanonVRD:ToneCurveOutputRange' => 5,
    'CanonVRD:ToneCurveShape' => 1,
    'CanonVRD:ToneCurveX' => 10,
    'CanonVRD:ToneCurveY' => 11,
  ),
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
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveColorSpace',
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
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveShape',
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
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveInputRange',
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
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveOutputRange',
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
      'exiftoolDOMNode' => 'CanonVRD:RGBCurvePoints',
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
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveX',
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
      'exiftoolDOMNode' => 'CanonVRD:ToneCurveY',
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
      'exiftoolDOMNode' => 'CanonVRD:RedCurvePoints',
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
      'exiftoolDOMNode' => 'CanonVRD:GreenCurvePoints',
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
      'exiftoolDOMNode' => 'CanonVRD:BlueCurvePoints',
    ),
  ),
);
}
