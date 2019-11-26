<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class FaceDetect3 extends Collection {

  protected static $map = array (
  'name' => 'CanonFaceDetect3',
  'title' => 'Canon FaceDetect3',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'items' =>
  array (
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'FacesDetected',
      'title' => 'Faces Detected',
      'format' =>
      array (
        0 => 3,
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'FacesDetected' => 3,
  ),
);
}
