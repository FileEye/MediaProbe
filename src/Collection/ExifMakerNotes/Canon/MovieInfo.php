<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class MovieInfo extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonMovieInfo',
  'title' => 'Canon Movie Info',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\MovieInfo',
  'itemsByName' =>
  array (
    'AudioBitrate' =>
    array (
      0 => 108,
    ),
    'AudioChannels' =>
    array (
      0 => 112,
    ),
    'AudioSampleRate' =>
    array (
      0 => 110,
    ),
    'Duration' =>
    array (
      0 => 106,
    ),
    'FrameCount' =>
    array (
      0 => 2,
      1 => 4,
    ),
    'FrameRate' =>
    array (
      0 => 1,
      1 => 6,
    ),
    'VideoCodec' =>
    array (
      0 => 116,
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
          0 => 8,
        ),
      ),
    ),
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FrameRate',
        'title' => 'Frame Rate',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FrameRate',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FrameCount',
        'title' => 'Frame Count',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FrameCount',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FrameCount',
        'title' => 'Frame Count',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:FrameCount',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FrameRate',
        'title' => 'Frame Rate',
        'format' =>
        array (
          0 => 1001,
        ),
        'exiftoolDOMNode' => 'Canon:FrameRate',
      ),
    ),
    106 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'Duration',
        'title' => 'Duration',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:Duration',
      ),
    ),
    108 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AudioBitrate',
        'title' => 'Audio Bitrate',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:AudioBitrate',
      ),
    ),
    110 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AudioSampleRate',
        'title' => 'Audio Sample Rate',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:AudioSampleRate',
      ),
    ),
    112 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AudioChannels',
        'title' => 'Audio Channels',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'Canon:AudioChannels',
      ),
    ),
    116 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'VideoCodec',
        'title' => 'Video Codec',
        'components' => 4,
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Canon:VideoCodec',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AudioBitrate' =>
    array (
      0 => 108,
    ),
    'Canon:AudioChannels' =>
    array (
      0 => 112,
    ),
    'Canon:AudioSampleRate' =>
    array (
      0 => 110,
    ),
    'Canon:Duration' =>
    array (
      0 => 106,
    ),
    'Canon:FrameCount' =>
    array (
      0 => 2,
      1 => 4,
    ),
    'Canon:FrameRate' =>
    array (
      0 => 1,
      1 => 6,
    ),
    'Canon:VideoCodec' =>
    array (
      0 => 116,
    ),
  ),
);
}
