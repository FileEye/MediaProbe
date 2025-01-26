<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class FaceDetect2 extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonFaceDetect2',
  'title' => 'Canon FaceDetect2',
  'handler' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 1,
  ),
  'defaultItemCollection' => 'Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\FaceDetect2',
  'itemsByName' =>
  array (
    'FaceWidth' =>
    array (
      0 => 1,
    ),
    'FacesDetected' =>
    array (
      0 => 2,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:FaceWidth' =>
    array (
      0 => 1,
    ),
    'Canon:FacesDetected' =>
    array (
      0 => 2,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FaceWidth',
        'title' => 'Face Width',
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'Canon:FaceWidth',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FacesDetected',
        'title' => 'Faces Detected',
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'Canon:FacesDetected',
      ),
    ),
  ),
);
}
