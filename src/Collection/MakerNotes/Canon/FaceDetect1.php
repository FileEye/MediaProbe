<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class FaceDetect1 extends Collection {

  protected static $map = array (
  'name' => 'CanonFaceDetect1',
  'title' => 'Canon FaceDetect1',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'Face1Position' => 8,
    'Face2Position' => 10,
    'Face3Position' => 12,
    'Face4Position' => 14,
    'Face5Position' => 16,
    'Face6Position' => 18,
    'Face7Position' => 20,
    'Face8Position' => 22,
    'Face9Position' => 24,
    'FaceDetectFrameSize' => 3,
    'FacesDetected' => 2,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:Face1Position' => 8,
    'Canon:Face2Position' => 10,
    'Canon:Face3Position' => 12,
    'Canon:Face4Position' => 14,
    'Canon:Face5Position' => 16,
    'Canon:Face6Position' => 18,
    'Canon:Face7Position' => 20,
    'Canon:Face8Position' => 22,
    'Canon:Face9Position' => 24,
    'Canon:FaceDetectFrameSize' => 3,
    'Canon:FacesDetected' => 2,
  ),
  'items' =>
  array (
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'FacesDetected',
      'title' => 'Faces Detected',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FacesDetected',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaceDetectFrameSize',
      'title' => 'Face Detect Frame Size',
      'components' => 2,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:FaceDetectFrameSize',
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face1Position',
      'title' => 'Face 1 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face1Position',
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face2Position',
      'title' => 'Face 2 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face2Position',
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face3Position',
      'title' => 'Face 3 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face3Position',
    ),
    14 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face4Position',
      'title' => 'Face 4 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face4Position',
    ),
    16 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face5Position',
      'title' => 'Face 5 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face5Position',
    ),
    18 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face6Position',
      'title' => 'Face 6 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face6Position',
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face7Position',
      'title' => 'Face 7 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face7Position',
    ),
    22 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face8Position',
      'title' => 'Face 8 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face8Position',
    ),
    24 =>
    array (
      'collection' => 'Tag',
      'name' => 'Face9Position',
      'title' => 'Face 9 Position',
      'components' => 2,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Face9Position',
    ),
  ),
);
}
