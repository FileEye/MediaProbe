<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Apple;

use FileEye\MediaProbe\Collection\CollectionBase;

class RunTime extends CollectionBase {

  protected static $map = array (
  'name' => 'AppleRuntime',
  'title' => 'Apple Runtime',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Apple\\RunTime',
  'DOMNode' => 'plist',
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Apple\\RunTime',
  'itemsByName' =>
  array (
    'RunTimeEpoch' =>
    array (
      0 => 'epoch',
    ),
    'RunTimeFlags' =>
    array (
      0 => 'flags',
    ),
    'RunTimeScale' =>
    array (
      0 => 'timescale',
    ),
    'RunTimeValue' =>
    array (
      0 => 'value',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Apple:RunTimeEpoch' =>
    array (
      0 => 'epoch',
    ),
    'Apple:RunTimeFlags' =>
    array (
      0 => 'flags',
    ),
    'Apple:RunTimeScale' =>
    array (
      0 => 'timescale',
    ),
    'Apple:RunTimeValue' =>
    array (
      0 => 'value',
    ),
  ),
  'items' =>
  array (
    'epoch' =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 2000,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'RunTimeEpoch',
        'title' => 'Run Time Epoch',
        'exiftoolDOMNode' => 'Apple:RunTimeEpoch',
      ),
    ),
    'flags' =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 2000,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'RunTimeFlags',
        'title' => 'Run Time Flags',
        'text' =>
        array (
          'mapping' =>
          array (
            'Bit0' => 'Valid',
            'Bit1' => 'Has been rounded',
            'Bit2' => 'Positive infinity',
            'Bit3' => 'Negative infinity',
            'Bit4' => 'Indefinite',
          ),
        ),
        'exiftoolDOMNode' => 'Apple:RunTimeFlags',
      ),
    ),
    'timescale' =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 2000,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'RunTimeScale',
        'title' => 'Run Time Scale',
        'exiftoolDOMNode' => 'Apple:RunTimeScale',
      ),
    ),
    'value' =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 2000,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'RunTimeValue',
        'title' => 'Run Time Value',
        'exiftoolDOMNode' => 'Apple:RunTimeValue',
      ),
    ),
  ),
);
}
