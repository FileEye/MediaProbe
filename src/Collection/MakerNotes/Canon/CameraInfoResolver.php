<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CameraInfoResolver extends Collection {

  protected static $map = array (
  'name' => 'CanonCameraInfoResolver',
  'title' => 'Canon Camera Info Resolver',
  'class' => 'FileEye\\MediaProbe\\Block\\MakerNotes\\Canon\\CameraInfoMap',
  'DOMNode' => 'map',
  'items' =>
  array (
    'CanonCameraInfo1000D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo1000D',
      'name' => 'CanonCameraInfo1000D',
      'condition' =>
      array (
        0 => '/\\b(1000D|REBEL XS|Kiss F)\\b/',
      ),
    ),
    'CanonCameraInfo1D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo1D',
      'name' => 'CanonCameraInfo1D',
      'condition' =>
      array (
        0 => '/\\b1DS?$/',
      ),
    ),
    'CanonCameraInfo1DX' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo1DX',
      'name' => 'CanonCameraInfo1DX',
      'condition' =>
      array (
        0 => '/EOS-1D X$/',
      ),
    ),
    'CanonCameraInfo1DmkII' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo1DmkII',
      'name' => 'CanonCameraInfo1DmkII',
      'condition' =>
      array (
        0 => '/\\b1Ds? Mark II$/',
      ),
    ),
    'CanonCameraInfo1DmkIII' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo1DmkIII',
      'name' => 'CanonCameraInfo1DmkIII',
      'condition' =>
      array (
        0 => '/\\b1Ds? Mark III$/',
      ),
    ),
    'CanonCameraInfo1DmkIIN' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo1DmkIIN',
      'name' => 'CanonCameraInfo1DmkIIN',
      'condition' =>
      array (
        0 => '/\\b1Ds? Mark II N$/',
      ),
    ),
    'CanonCameraInfo1DmkIV' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo1DmkIV',
      'name' => 'CanonCameraInfo1DmkIV',
      'condition' =>
      array (
        0 => '/\\b1D Mark IV$/',
      ),
    ),
    'CanonCameraInfo40D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo40D',
      'name' => 'CanonCameraInfo40D',
      'condition' =>
      array (
        0 => '/EOS 40D$/',
      ),
    ),
    'CanonCameraInfo450D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo450D',
      'name' => 'CanonCameraInfo450D',
      'condition' =>
      array (
        0 => '/\\b(450D|REBEL XSi|Kiss X2)\\b/',
      ),
    ),
    'CanonCameraInfo500D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo500D',
      'name' => 'CanonCameraInfo500D',
      'condition' =>
      array (
        0 => '/\\b(500D|REBEL T1i|Kiss X3)\\b/',
      ),
    ),
    'CanonCameraInfo50D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo50D',
      'name' => 'CanonCameraInfo50D',
      'condition' =>
      array (
        0 => '/EOS 50D$/',
      ),
    ),
    'CanonCameraInfo550D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo550D',
      'name' => 'CanonCameraInfo550D',
      'condition' =>
      array (
        0 => '/\\b(550D|REBEL T2i|Kiss X4)\\b/',
      ),
    ),
    'CanonCameraInfo5D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo5D',
      'name' => 'CanonCameraInfo5D',
      'condition' =>
      array (
        0 => '/EOS 5D$/',
      ),
    ),
    'CanonCameraInfo5DmkII' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo5DmkII',
      'name' => 'CanonCameraInfo5DmkII',
      'condition' =>
      array (
        0 => '/EOS 5D Mark II$/',
      ),
    ),
    'CanonCameraInfo5DmkIII' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo5DmkIII',
      'name' => 'CanonCameraInfo5DmkIII',
      'condition' =>
      array (
        0 => '/EOS 5D Mark III$/',
      ),
    ),
    'CanonCameraInfo600D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo600D',
      'name' => 'CanonCameraInfo600D',
      'condition' =>
      array (
        0 => '/\\b(600D|REBEL T3i|Kiss X5)\\b/',
      ),
    ),
    'CanonCameraInfo60D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo60D',
      'name' => 'CanonCameraInfo60D',
      'condition' =>
      array (
        0 => '/EOS 60D$/',
      ),
    ),
    'CanonCameraInfo650D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo650D',
      'name' => 'CanonCameraInfo650D',
      'condition' =>
      array (
        0 => '/\\b(650D|REBEL T4i|Kiss X6i)\\b/',
      ),
    ),
    'CanonCameraInfo6D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo6D',
      'name' => 'CanonCameraInfo6D',
      'condition' =>
      array (
        0 => '/EOS 6D$/',
      ),
    ),
    'CanonCameraInfo70D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo70D',
      'name' => 'CanonCameraInfo70D',
      'condition' =>
      array (
        0 => '/EOS 70D$/',
      ),
    ),
    'CanonCameraInfo750D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo750D',
      'name' => 'CanonCameraInfo750D',
      'condition' =>
      array (
        0 => '/\\b(750D|Rebel T6i|Kiss X8i)\\b/',
      ),
    ),
    'CanonCameraInfo7D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo7D',
      'name' => 'CanonCameraInfo7D',
      'condition' =>
      array (
        0 => '/EOS 7D$/',
      ),
    ),
    'CanonCameraInfo80D' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfo80D',
      'name' => 'CanonCameraInfo80D',
      'condition' =>
      array (
        0 => '/EOS 80D$/',
      ),
    ),
    'CanonCameraInfoPowerShot' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfoPowerShot',
      'name' => 'CanonCameraInfoPowerShot',
      'condition' =>
      array (
        0 => '/complex/',
      ),
    ),
    'CanonCameraInfoPowerShot2' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfoPowerShot2',
      'name' => 'CanonCameraInfoPowerShot2',
      'condition' =>
      array (
        0 => '/complex/',
      ),
    ),
    'CanonCameraInfoUnknown' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfoUnknown',
      'name' => 'CanonCameraInfoUnknown',
      'condition' =>
      array (
        0 => '/complex/',
      ),
    ),
    'CanonCameraInfoUnknown32' =>
    array (
      'collection' => 'MakerNotes\\Canon\\CameraInfoUnknown32',
      'name' => 'CanonCameraInfoUnknown32',
      'condition' =>
      array (
        0 => '/complex/',
      ),
    ),
  ),
  'itemsByName' =>
  array (
    'CanonCameraInfo1000D' => 'CanonCameraInfo1000D',
    'CanonCameraInfo1D' => 'CanonCameraInfo1D',
    'CanonCameraInfo1DX' => 'CanonCameraInfo1DX',
    'CanonCameraInfo1DmkII' => 'CanonCameraInfo1DmkII',
    'CanonCameraInfo1DmkIII' => 'CanonCameraInfo1DmkIII',
    'CanonCameraInfo1DmkIIN' => 'CanonCameraInfo1DmkIIN',
    'CanonCameraInfo1DmkIV' => 'CanonCameraInfo1DmkIV',
    'CanonCameraInfo40D' => 'CanonCameraInfo40D',
    'CanonCameraInfo450D' => 'CanonCameraInfo450D',
    'CanonCameraInfo500D' => 'CanonCameraInfo500D',
    'CanonCameraInfo50D' => 'CanonCameraInfo50D',
    'CanonCameraInfo550D' => 'CanonCameraInfo550D',
    'CanonCameraInfo5D' => 'CanonCameraInfo5D',
    'CanonCameraInfo5DmkII' => 'CanonCameraInfo5DmkII',
    'CanonCameraInfo5DmkIII' => 'CanonCameraInfo5DmkIII',
    'CanonCameraInfo600D' => 'CanonCameraInfo600D',
    'CanonCameraInfo60D' => 'CanonCameraInfo60D',
    'CanonCameraInfo650D' => 'CanonCameraInfo650D',
    'CanonCameraInfo6D' => 'CanonCameraInfo6D',
    'CanonCameraInfo70D' => 'CanonCameraInfo70D',
    'CanonCameraInfo750D' => 'CanonCameraInfo750D',
    'CanonCameraInfo7D' => 'CanonCameraInfo7D',
    'CanonCameraInfo80D' => 'CanonCameraInfo80D',
    'CanonCameraInfoPowerShot' => 'CanonCameraInfoPowerShot',
    'CanonCameraInfoPowerShot2' => 'CanonCameraInfoPowerShot2',
    'CanonCameraInfoUnknown' => 'CanonCameraInfoUnknown',
    'CanonCameraInfoUnknown32' => 'CanonCameraInfoUnknown32',
  ),
);
}
