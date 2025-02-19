<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class VignettingCorr2 extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonVignettingCorr2',
  'title' => 'Canon VignettingCorr2',
  'handler' => 'FileEye\\MediaProbe\\Block\\Map',
  'DOMNode' => 'map',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 4,
  ),
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'ExifMakerNotes\\Canon\\VignettingCorr2',
  'itemsByName' =>
  array (
    'ChromaticAberrationSetting' =>
    array (
      0 => 6,
    ),
    'DigitalLensOptimizerSetting' =>
    array (
      0 => 9,
    ),
    'DistortionCorrectionSetting' =>
    array (
      0 => 7,
    ),
    'PeripheralLightingSetting' =>
    array (
      0 => 5,
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
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'PeripheralLightingSetting',
        'title' => 'Peripheral Lighting Setting',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:PeripheralLightingSetting',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ChromaticAberrationSetting',
        'title' => 'Chromatic Aberration Setting',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:ChromaticAberrationSetting',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'DistortionCorrectionSetting',
        'title' => 'Distortion Correction Setting',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:DistortionCorrectionSetting',
      ),
    ),
    9 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'DigitalLensOptimizerSetting',
        'title' => 'Digital Lens Optimizer Setting',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
        'exiftoolDOMNode' => 'Canon:DigitalLensOptimizerSetting',
      ),
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ChromaticAberrationSetting' =>
    array (
      0 => 6,
    ),
    'Canon:DigitalLensOptimizerSetting' =>
    array (
      0 => 9,
    ),
    'Canon:DistortionCorrectionSetting' =>
    array (
      0 => 7,
    ),
    'Canon:PeripheralLightingSetting' =>
    array (
      0 => 5,
    ),
  ),
);
}
