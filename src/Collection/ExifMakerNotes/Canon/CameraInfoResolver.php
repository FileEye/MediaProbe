<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\ExifMakerNotes\Canon;

use FileEye\MediaProbe\Collection\CollectionBase;

class CameraInfoResolver extends CollectionBase {

  protected static $map = array (
  'name' => 'CanonCameraInfoResolver',
  'title' => 'Canon Camera Info Resolver',
  'handler' => 'FileEye\\MediaProbe\\Block\\Exif\\Vendor\\Canon\\CameraInfoMap',
  'DOMNode' => 'map',
  'id' => 'ExifMakerNotes\\Canon\\CameraInfoResolver',
  'itemsByName' =>
  array (
    'CanonCameraInfo1000D' =>
    array (
      0 => 'CanonCameraInfo1000D',
    ),
    'CanonCameraInfo1D' =>
    array (
      0 => 'CanonCameraInfo1D',
    ),
    'CanonCameraInfo1DX' =>
    array (
      0 => 'CanonCameraInfo1DX',
    ),
    'CanonCameraInfo1DmkII' =>
    array (
      0 => 'CanonCameraInfo1DmkII',
    ),
    'CanonCameraInfo1DmkIII' =>
    array (
      0 => 'CanonCameraInfo1DmkIII',
    ),
    'CanonCameraInfo1DmkIIN' =>
    array (
      0 => 'CanonCameraInfo1DmkIIN',
    ),
    'CanonCameraInfo1DmkIV' =>
    array (
      0 => 'CanonCameraInfo1DmkIV',
    ),
    'CanonCameraInfo40D' =>
    array (
      0 => 'CanonCameraInfo40D',
    ),
    'CanonCameraInfo450D' =>
    array (
      0 => 'CanonCameraInfo450D',
    ),
    'CanonCameraInfo500D' =>
    array (
      0 => 'CanonCameraInfo500D',
    ),
    'CanonCameraInfo50D' =>
    array (
      0 => 'CanonCameraInfo50D',
    ),
    'CanonCameraInfo550D' =>
    array (
      0 => 'CanonCameraInfo550D',
    ),
    'CanonCameraInfo5D' =>
    array (
      0 => 'CanonCameraInfo5D',
    ),
    'CanonCameraInfo5DmkII' =>
    array (
      0 => 'CanonCameraInfo5DmkII',
    ),
    'CanonCameraInfo5DmkIII' =>
    array (
      0 => 'CanonCameraInfo5DmkIII',
    ),
    'CanonCameraInfo600D' =>
    array (
      0 => 'CanonCameraInfo600D',
    ),
    'CanonCameraInfo60D' =>
    array (
      0 => 'CanonCameraInfo60D',
    ),
    'CanonCameraInfo650D' =>
    array (
      0 => 'CanonCameraInfo650D',
    ),
    'CanonCameraInfo6D' =>
    array (
      0 => 'CanonCameraInfo6D',
    ),
    'CanonCameraInfo70D' =>
    array (
      0 => 'CanonCameraInfo70D',
    ),
    'CanonCameraInfo750D' =>
    array (
      0 => 'CanonCameraInfo750D',
    ),
    'CanonCameraInfo7D' =>
    array (
      0 => 'CanonCameraInfo7D',
    ),
    'CanonCameraInfo80D' =>
    array (
      0 => 'CanonCameraInfo80D',
    ),
    'CanonCameraInfoPowerShot' =>
    array (
      0 => 'CanonCameraInfoPowerShot',
    ),
    'CanonCameraInfoPowerShot2' =>
    array (
      0 => 'CanonCameraInfoPowerShot2',
    ),
    'CanonCameraInfoUnknown' =>
    array (
      0 => 'CanonCameraInfoUnknown',
    ),
    'CanonCameraInfoUnknown32' =>
    array (
      0 => 'CanonCameraInfoUnknown32',
    ),
  ),
  'items' =>
  array (
    'CanonCameraInfo1000D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo1000D',
        'name' => 'CanonCameraInfo1000D',
        'condition' =>
        array (
          0 => '/\\b(1000D|REBEL XS|Kiss F)\\b/',
        ),
      ),
    ),
    'CanonCameraInfo1D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo1D',
        'name' => 'CanonCameraInfo1D',
        'condition' =>
        array (
          0 => '/\\b1DS?$/',
        ),
      ),
    ),
    'CanonCameraInfo1DX' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo1DX',
        'name' => 'CanonCameraInfo1DX',
        'condition' =>
        array (
          0 => '/EOS-1D X$/',
        ),
      ),
    ),
    'CanonCameraInfo1DmkII' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkII',
        'name' => 'CanonCameraInfo1DmkII',
        'condition' =>
        array (
          0 => '/\\b1Ds? Mark II$/',
        ),
      ),
    ),
    'CanonCameraInfo1DmkIII' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIII',
        'name' => 'CanonCameraInfo1DmkIII',
        'condition' =>
        array (
          0 => '/\\b1Ds? Mark III$/',
        ),
      ),
    ),
    'CanonCameraInfo1DmkIIN' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIIN',
        'name' => 'CanonCameraInfo1DmkIIN',
        'condition' =>
        array (
          0 => '/\\b1Ds? Mark II N$/',
        ),
      ),
    ),
    'CanonCameraInfo1DmkIV' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIV',
        'name' => 'CanonCameraInfo1DmkIV',
        'condition' =>
        array (
          0 => '/\\b1D Mark IV$/',
        ),
      ),
    ),
    'CanonCameraInfo40D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo40D',
        'name' => 'CanonCameraInfo40D',
        'condition' =>
        array (
          0 => '/EOS 40D$/',
        ),
      ),
    ),
    'CanonCameraInfo450D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo450D',
        'name' => 'CanonCameraInfo450D',
        'condition' =>
        array (
          0 => '/\\b(450D|REBEL XSi|Kiss X2)\\b/',
        ),
      ),
    ),
    'CanonCameraInfo500D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo500D',
        'name' => 'CanonCameraInfo500D',
        'condition' =>
        array (
          0 => '/\\b(500D|REBEL T1i|Kiss X3)\\b/',
        ),
      ),
    ),
    'CanonCameraInfo50D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo50D',
        'name' => 'CanonCameraInfo50D',
        'condition' =>
        array (
          0 => '/EOS 50D$/',
        ),
      ),
    ),
    'CanonCameraInfo550D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo550D',
        'name' => 'CanonCameraInfo550D',
        'condition' =>
        array (
          0 => '/\\b(550D|REBEL T2i|Kiss X4)\\b/',
        ),
      ),
    ),
    'CanonCameraInfo5D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo5D',
        'name' => 'CanonCameraInfo5D',
        'condition' =>
        array (
          0 => '/EOS 5D$/',
        ),
      ),
    ),
    'CanonCameraInfo5DmkII' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo5DmkII',
        'name' => 'CanonCameraInfo5DmkII',
        'condition' =>
        array (
          0 => '/EOS 5D Mark II$/',
        ),
      ),
    ),
    'CanonCameraInfo5DmkIII' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo5DmkIII',
        'name' => 'CanonCameraInfo5DmkIII',
        'condition' =>
        array (
          0 => '/EOS 5D Mark III$/',
        ),
      ),
    ),
    'CanonCameraInfo600D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo600D',
        'name' => 'CanonCameraInfo600D',
        'condition' =>
        array (
          0 => '/\\b(600D|REBEL T3i|Kiss X5)\\b/',
        ),
      ),
    ),
    'CanonCameraInfo60D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo60D',
        'name' => 'CanonCameraInfo60D',
        'condition' =>
        array (
          0 => '/EOS 60D$/',
        ),
      ),
    ),
    'CanonCameraInfo650D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo650D',
        'name' => 'CanonCameraInfo650D',
        'condition' =>
        array (
          0 => '/\\b(650D|REBEL T4i|Kiss X6i)\\b/',
        ),
      ),
    ),
    'CanonCameraInfo6D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo6D',
        'name' => 'CanonCameraInfo6D',
        'condition' =>
        array (
          0 => '/EOS 6D$/',
        ),
      ),
    ),
    'CanonCameraInfo70D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo70D',
        'name' => 'CanonCameraInfo70D',
        'condition' =>
        array (
          0 => '/EOS 70D$/',
        ),
      ),
    ),
    'CanonCameraInfo750D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo750D',
        'name' => 'CanonCameraInfo750D',
        'condition' =>
        array (
          0 => '/\\b(750D|Rebel T6i|Kiss X8i)\\b/',
        ),
      ),
    ),
    'CanonCameraInfo7D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo7D',
        'name' => 'CanonCameraInfo7D',
        'condition' =>
        array (
          0 => '/EOS 7D$/',
        ),
      ),
    ),
    'CanonCameraInfo80D' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfo80D',
        'name' => 'CanonCameraInfo80D',
        'condition' =>
        array (
          0 => '/EOS 80D$/',
        ),
      ),
    ),
    'CanonCameraInfoPowerShot' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfoPowerShot',
        'name' => 'CanonCameraInfoPowerShot',
        'condition' =>
        array (
          0 => '/complex/',
        ),
      ),
    ),
    'CanonCameraInfoPowerShot2' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfoPowerShot2',
        'name' => 'CanonCameraInfoPowerShot2',
        'condition' =>
        array (
          0 => '/complex/',
        ),
      ),
    ),
    'CanonCameraInfoUnknown' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfoUnknown',
        'name' => 'CanonCameraInfoUnknown',
        'condition' =>
        array (
          0 => '/complex/',
        ),
      ),
    ),
    'CanonCameraInfoUnknown32' =>
    array (
      0 =>
      array (
        'collection' => 'ExifMakerNotes\\Canon\\CameraInfoUnknown32',
        'name' => 'CanonCameraInfoUnknown32',
        'condition' =>
        array (
          0 => '/complex/',
        ),
      ),
    ),
  ),
);
}
