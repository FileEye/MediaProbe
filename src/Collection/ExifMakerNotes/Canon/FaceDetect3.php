<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class FaceDetect3 extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonFaceDetect3',
  'title' => 'Canon FaceDetect3',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\FaceDetect3',
  'itemsByName' =>
  array (
    'FacesDetected' =>
    array (
      0 => 3,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FacesDetected' =>
    array (
      0 => 3,
    ),
  ),
  'items' =>
  array (
    3 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FacesDetected',
        'title' => 'Faces Detected',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'Canon:FacesDetected',
      ),
    ),
  ),
);
}
