<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class ColorData4 extends Collection {

  protected static $map = array (
  'name' => 'CanonColorData4',
  'title' => 'Canon Color Data4',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\ColorDataMap',
  'DOMNode' => 'map',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AverageBlackLevel' => 231,
    'ColorDataVersion' => 0,
    'LinearityUpperMargin' => 725,
    'NormalWhiteLevel' => 723,
    'PerChannelBlackLevel' => 715,
    'RawMeasuredRGGB' => 640,
    'SpecularWhiteLevel' => 724,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AverageBlackLevel' => 231,
    'Canon:ColorDataVersion' => 0,
    'Canon:LinearityUpperMargin' => 725,
    'Canon:NormalWhiteLevel' => 723,
    'Canon:PerChannelBlackLevel' => 715,
    'Canon:RawMeasuredRGGB' => 640,
    'Canon:SpecularWhiteLevel' => 724,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorDataVersion',
      'title' => 'Color Data Version',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          2 => '2 (1DmkIII)',
          3 => '3 (40D)',
          4 => '4 (1DSmkIII)',
          5 => '5 (450D/1000D)',
          6 => '6 (50D/5DmkII)',
          7 => '7 (500D/550D/7D/1DmkIV)',
          9 => '9 (60D/1100D)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorDataVersion',
    ),
    231 =>
    array (
      'collection' => 'Tag',
      'name' => 'AverageBlackLevel',
      'title' => 'Average Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:AverageBlackLevel',
    ),
    640 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawMeasuredRGGB',
      'title' => 'Raw Measured RGGB',
      'components' => 4,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:RawMeasuredRGGB',
    ),
    692 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:PerChannelBlackLevel',
    ),
    696 =>
    array (
      'collection' => 'Tag',
      'name' => 'NormalWhiteLevel',
      'title' => 'Normal White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:NormalWhiteLevel',
    ),
    697 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpecularWhiteLevel',
      'title' => 'Specular White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:SpecularWhiteLevel',
    ),
    698 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearityUpperMargin',
      'title' => 'Linearity Upper Margin',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:LinearityUpperMargin',
    ),
    715 =>
    array (
      'collection' => 'Tag',
      'name' => 'PerChannelBlackLevel',
      'title' => 'Per Channel Black Level',
      'components' => 4,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:PerChannelBlackLevel',
    ),
    719 =>
    array (
      'collection' => 'Tag',
      'name' => 'NormalWhiteLevel',
      'title' => 'Normal White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:NormalWhiteLevel',
    ),
    720 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpecularWhiteLevel',
      'title' => 'Specular White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:SpecularWhiteLevel',
    ),
    721 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearityUpperMargin',
      'title' => 'Linearity Upper Margin',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:LinearityUpperMargin',
    ),
    723 =>
    array (
      'collection' => 'Tag',
      'name' => 'NormalWhiteLevel',
      'title' => 'Normal White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:NormalWhiteLevel',
    ),
    724 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpecularWhiteLevel',
      'title' => 'Specular White Level',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:SpecularWhiteLevel',
    ),
    725 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearityUpperMargin',
      'title' => 'Linearity Upper Margin',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:LinearityUpperMargin',
    ),
  ),
);
}
