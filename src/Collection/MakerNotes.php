<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection;

class MakerNotes extends Collection {

  protected static $map = array (
  'class' => '????',
  'itemsByName' =>
  array (
    'Apple' =>
    array (
      0 => 'Apple',
    ),
    'Canon' =>
    array (
      0 => 'Canon',
    ),
  ),
  'items' =>
  array (
    'Apple' =>
    array (
      0 =>
      array (
        'collection' => 'MakerNotes\\Apple\\Main',
        'name' => 'Apple',
        'make' => 'Apple',
        'model' => '.*',
      ),
    ),
    'Canon' =>
    array (
      0 =>
      array (
        'collection' => 'MakerNotes\\Canon\\Main',
        'name' => 'Canon',
        'make' => 'Canon',
        'model' => '.*',
      ),
    ),
  ),
);
}
