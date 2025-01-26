<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\CanonVRD;

use FileEye\MediaProbe\Collection\CollectionBase;

class ToneCurve extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVRDToneCurve',
  'title' => 'CanonVRD ToneCurve',
  'class' => 'tbd',
  'DOMNode' => 'tbd',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\CanonVRD\\ToneCurve',
  'handler' => 'FileEye\\MediaProbe\\Block\\ExifMakerNotes\\CanonVRD\\ToneCurve',
  'itemsByName' =>
  array (
    'BlueCurvePoints' =>
    array (
      0 => 121,
    ),
    'GreenCurvePoints' =>
    array (
      0 => 83,
    ),
    'RGBCurvePoints' =>
    array (
      0 => 7,
    ),
    'RedCurvePoints' =>
    array (
      0 => 45,
    ),
    'ToneCurveColorSpace' =>
    array (
      0 => 0,
    ),
    'ToneCurveInputRange' =>
    array (
      0 => 3,
    ),
    'ToneCurveOutputRange' =>
    array (
      0 => 5,
    ),
    'ToneCurveShape' =>
    array (
      0 => 1,
    ),
    'ToneCurveX' =>
    array (
      0 => 10,
    ),
    'ToneCurveY' =>
    array (
      0 => 11,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'CanonVRD:BlueCurvePoints' =>
    array (
      0 => 121,
    ),
    'CanonVRD:GreenCurvePoints' =>
    array (
      0 => 83,
    ),
    'CanonVRD:RGBCurvePoints' =>
    array (
      0 => 7,
    ),
    'CanonVRD:RedCurvePoints' =>
    array (
      0 => 45,
    ),
    'CanonVRD:ToneCurveColorSpace' =>
    array (
      0 => 0,
    ),
    'CanonVRD:ToneCurveInputRange' =>
    array (
      0 => 3,
    ),
    'CanonVRD:ToneCurveOutputRange' =>
    array (
      0 => 5,
    ),
    'CanonVRD:ToneCurveShape' =>
    array (
      0 => 1,
    ),
    'CanonVRD:ToneCurveX' =>
    array (
      0 => 10,
    ),
    'CanonVRD:ToneCurveY' =>
    array (
      0 => 11,
    ),
  ),
  'items' =>
  array (
    0 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
    ),
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ToneCurveInputRange',
        'title' => 'Tone Curve Input Range',
        'components' => 2,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:ToneCurveInputRange',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ToneCurveOutputRange',
        'title' => 'Tone Curve Output Range',
        'components' => 2,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:ToneCurveOutputRange',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RGBCurvePoints',
        'title' => 'RGB Curve Points',
        'components' => 21,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:RGBCurvePoints',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ToneCurveX',
        'title' => 'Tone Curve X',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:ToneCurveX',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ToneCurveY',
        'title' => 'Tone Curve Y',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:ToneCurveY',
      ),
    ),
    45 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RedCurvePoints',
        'title' => 'Red Curve Points',
        'components' => 21,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:RedCurvePoints',
      ),
    ),
    83 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GreenCurvePoints',
        'title' => 'Green Curve Points',
        'components' => 21,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'CanonVRD:GreenCurvePoints',
      ),
    ),
    121 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
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
  ),
);
}
