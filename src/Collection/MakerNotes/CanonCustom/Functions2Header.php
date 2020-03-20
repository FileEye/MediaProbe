<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\CanonCustom;

use FileEye\MediaProbe\Collection;

class Functions2Header extends Collection {

  protected static $map = array (
  'name' => 'CanonCustomFunctions2Header',
  'title' => 'CanonCustom Functions2 Header',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\CustomFunctions2Header',
  'DOMNode' => 'index',
  'defaultItemCollection' => 'MakerNotes\\CanonCustom\\Functions2',
  'items' =>
  array (
    1 =>
    array (
      'name' => 'Exposure',
      'title' => 'Exposure (0x0101-0x010f)',
      'collection' => 'MakerNotes\\CanonCustom\\Functions2',
    ),
    2 =>
    array (
      'name' => 'ImageFlashExposureDisplay',
      'title' => 'Image (0x0201-0x0203), Flash Exposure (0x0304-0x0306) and Display (0x0407-0x0409)',
      'collection' => 'MakerNotes\\CanonCustom\\Functions2',
    ),
    3 =>
    array (
      'name' => 'AutoFocusDrive',
      'title' => 'Auto Focus (0x0501-0x050e) and Drive (0x060f-0x0611)',
      'collection' => 'MakerNotes\\CanonCustom\\Functions2',
    ),
    4 =>
    array (
      'name' => 'OperationOthers',
      'title' => 'Operation (0x0701-0x070a) and Others (0x080b-0x0810)',
      'collection' => 'MakerNotes\\CanonCustom\\Functions2',
    ),
  ),
  'itemsByName' =>
  array (
    'AutoFocusDrive' => 3,
    'Exposure' => 1,
    'ImageFlashExposureDisplay' => 2,
    'OperationOthers' => 4,
  ),
);
}
