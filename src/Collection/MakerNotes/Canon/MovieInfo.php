<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class MovieInfo extends Collection {

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
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AudioBitrate' => 108,
    'AudioChannels' => 112,
    'AudioSampleRate' => 110,
    'Duration' => 106,
    'FrameCount' => 4,
    'FrameRate' => 6,
    'VideoCodec' => 116,
    'indexSize' => 0,
  ),
  'items' =>
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
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'FrameRate',
      'title' => 'Frame Rate',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FrameRate',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'FrameCount',
      'title' => 'Frame Count',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FrameCount',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'FrameCount',
      'title' => 'Frame Count',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:FrameCount',
    ),
    6 =>
    array (
      'collection' => 'Tag',
      'name' => 'FrameRate',
      'title' => 'Frame Rate',
      'format' =>
      array (
        0 => 1001,
      ),
      'exiftoolDOMNode' => 'Canon:FrameRate',
    ),
    106 =>
    array (
      'collection' => 'Tag',
      'name' => 'Duration',
      'title' => 'Duration',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:Duration',
    ),
    108 =>
    array (
      'collection' => 'Tag',
      'name' => 'AudioBitrate',
      'title' => 'Audio Bitrate',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:AudioBitrate',
    ),
    110 =>
    array (
      'collection' => 'Tag',
      'name' => 'AudioSampleRate',
      'title' => 'Audio Sample Rate',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:AudioSampleRate',
    ),
    112 =>
    array (
      'collection' => 'Tag',
      'name' => 'AudioChannels',
      'title' => 'Audio Channels',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'Canon:AudioChannels',
    ),
    116 =>
    array (
      'collection' => 'Tag',
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
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AudioBitrate' => 108,
    'Canon:AudioChannels' => 112,
    'Canon:AudioSampleRate' => 110,
    'Canon:Duration' => 106,
    'Canon:FrameCount' => 4,
    'Canon:FrameRate' => 6,
    'Canon:VideoCodec' => 116,
  ),
);
}
