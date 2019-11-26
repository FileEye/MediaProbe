<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Apple;

use FileEye\MediaProbe\Collection;

class RunTime extends Collection {

  protected static $map = array (
  'name' => 'AppleRuntime',
  'title' => 'Apple Runtime',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Apple\\RunTime',
  'DOMNode' => 'plist',
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    'epoch' =>
    array (
      'format' =>
      array (
        0 => 2,
      ),
      'collection' => 'Tag',
      'name' => 'RunTimeEpoch',
      'title' => 'Run Time Epoch',
    ),
    'flags' =>
    array (
      'format' =>
      array (
        0 => 2,
      ),
      'collection' => 'Tag',
      'name' => 'RunTimeFlags',
      'title' => 'Run Time Flags',
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Valid',
          2 => 'Has been rounded',
          4 => 'Positive infinity',
          8 => 'Negative infinity',
          16 => 'Indefinite',
        ),
      ),
    ),
    'timescale' =>
    array (
      'format' =>
      array (
        0 => 2,
      ),
      'collection' => 'Tag',
      'name' => 'RunTimeScale',
      'title' => 'Run Time Scale',
    ),
    'value' =>
    array (
      'format' =>
      array (
        0 => 2,
      ),
      'collection' => 'Tag',
      'name' => 'RunTimeValue',
      'title' => 'Run Time Value',
    ),
  ),
  'itemsByName' =>
  array (
    'RunTimeEpoch' => 'epoch',
    'RunTimeFlags' => 'flags',
    'RunTimeScale' => 'timescale',
    'RunTimeValue' => 'value',
  ),
);
}
