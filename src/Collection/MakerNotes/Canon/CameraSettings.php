<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class CameraSettings extends Collection {

  protected static $map = array (
  'name' => 'CanonCameraSettings',
  'title' => 'Canon Camera Settings',
  'class' => 'FileEye\\MediaProbe\\Block\\Index',
  'DOMNode' => 'index',
  'hasIndexSize' => true,
  'format' =>
  array (
    0 => 3,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'AESetting' => 33,
    'AFPoint' => 19,
    'CameraISO' => 16,
    'CanonExposureMode' => 20,
    'CanonFlashMode' => 4,
    'CanonImageSize' => 10,
    'ColorTone' => 42,
    'ContinuousDrive' => 5,
    'Contrast' => 13,
    'DigitalZoom' => 12,
    'DisplayAperture' => 35,
    'EasyMode' => 11,
    'FlashActivity' => 28,
    'FlashBits' => 29,
    'FocalUnits' => 25,
    'FocusContinuous' => 32,
    'FocusMode' => 7,
    'FocusRange' => 18,
    'ImageStabilization' => 34,
    'LensType' => 22,
    'MacroMode' => 1,
    'ManualFlashOutput' => 41,
    'MaxAperture' => 26,
    'MaxFocalLength' => 23,
    'MeteringMode' => 17,
    'MinAperture' => 27,
    'MinFocalLength' => 24,
    'PhotoEffect' => 40,
    'Quality' => 3,
    'RecordMode' => 9,
    'SRAWQuality' => 46,
    'Saturation' => 14,
    'SelfTimer' => 2,
    'Sharpness' => 15,
    'SpotMeteringMode' => 39,
    'ZoomSourceWidth' => 36,
    'ZoomTargetWidth' => 37,
    'indexSize' => 0,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'RawData',
      'name' => 'indexSize',
    ),
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'MacroMode',
      'title' => 'Macro Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Macro',
          2 => 'Normal',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:MacroMode',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'SelfTimer',
      'title' => 'Self Timer',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:SelfTimer',
    ),
    3 =>
    array (
      'collection' => 'Tag',
      'name' => 'Quality',
      'title' => 'Quality',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'n/a',
          1 => 'Economy',
          2 => 'Normal',
          3 => 'Fine',
          4 => 'RAW',
          5 => 'Superfine',
          7 => 'CRAW',
          130 => 'Normal Movie',
          131 => 'Movie (2)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:Quality',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'CanonFlashMode',
      'title' => 'Canon Flash Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'n/a',
          0 => 'Off',
          1 => 'Auto',
          2 => 'On',
          3 => 'Red-eye reduction',
          4 => 'Slow-sync',
          5 => 'Red-eye reduction (Auto)',
          6 => 'Red-eye reduction (On)',
          16 => 'External flash',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:CanonFlashMode',
    ),
    5 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContinuousDrive',
      'title' => 'Continuous Drive',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Single',
          1 => 'Continuous',
          2 => 'Movie',
          3 => 'Continuous, Speed Priority',
          4 => 'Continuous, Low',
          5 => 'Continuous, High',
          6 => 'Silent Single',
          9 => 'Single, Silent',
          10 => 'Continuous, Silent',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContinuousDrive',
    ),
    7 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusMode',
      'title' => 'Focus Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'One-shot AF',
          1 => 'AI Servo AF',
          2 => 'AI Focus AF',
          3 => 'Manual Focus (3)',
          4 => 'Single',
          5 => 'Continuous',
          6 => 'Manual Focus (6)',
          16 => 'Pan Focus',
          256 => 'AF + MF',
          512 => 'Movie Snap Focus',
          519 => 'Movie Servo AF',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FocusMode',
    ),
    9 =>
    array (
      'collection' => 'Tag',
      'name' => 'RecordMode',
      'title' => 'Record Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'JPEG',
          2 => 'CRW+THM',
          3 => 'AVI+THM',
          4 => 'TIF',
          5 => 'TIF+JPEG',
          6 => 'CR2',
          7 => 'CR2+JPEG',
          9 => 'MOV',
          10 => 'MP4',
          11 => 'CRM',
          12 => 'CR3',
          13 => 'CR3+JPEG',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:RecordMode',
    ),
    10 =>
    array (
      'collection' => 'Tag',
      'name' => 'CanonImageSize',
      'title' => 'Canon Image Size',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'n/a',
          0 => 'Large',
          1 => 'Medium',
          2 => 'Small',
          5 => 'Medium 1',
          6 => 'Medium 2',
          7 => 'Medium 3',
          8 => 'Postcard',
          9 => 'Widescreen',
          10 => 'Medium Widescreen',
          14 => 'Small 1',
          15 => 'Small 2',
          16 => 'Small 3',
          128 => '640x480 Movie',
          129 => 'Medium Movie',
          130 => 'Small Movie',
          137 => '1280x720 Movie',
          142 => '1920x1080 Movie',
          143 => '4096x2160 Movie',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:CanonImageSize',
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'EasyMode',
      'title' => 'Easy Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Full auto',
          1 => 'Manual',
          2 => 'Landscape',
          3 => 'Fast shutter',
          4 => 'Slow shutter',
          5 => 'Night',
          6 => 'Gray Scale',
          7 => 'Sepia',
          8 => 'Portrait',
          9 => 'Sports',
          10 => 'Macro',
          11 => 'Black & White',
          12 => 'Pan focus',
          13 => 'Vivid',
          14 => 'Neutral',
          15 => 'Flash Off',
          16 => 'Long Shutter',
          17 => 'Super Macro',
          18 => 'Foliage',
          19 => 'Indoor',
          20 => 'Fireworks',
          21 => 'Beach',
          22 => 'Underwater',
          23 => 'Snow',
          24 => 'Kids & Pets',
          25 => 'Night Snapshot',
          26 => 'Digital Macro',
          27 => 'My Colors',
          28 => 'Movie Snap',
          29 => 'Super Macro 2',
          30 => 'Color Accent',
          31 => 'Color Swap',
          32 => 'Aquarium',
          33 => 'ISO 3200',
          34 => 'ISO 6400',
          35 => 'Creative Light Effect',
          36 => 'Easy',
          37 => 'Quick Shot',
          38 => 'Creative Auto',
          39 => 'Zoom Blur',
          40 => 'Low Light',
          41 => 'Nostalgic',
          42 => 'Super Vivid',
          43 => 'Poster Effect',
          44 => 'Face Self-timer',
          45 => 'Smile',
          46 => 'Wink Self-timer',
          47 => 'Fisheye Effect',
          48 => 'Miniature Effect',
          49 => 'High-speed Burst',
          50 => 'Best Image Selection',
          51 => 'High Dynamic Range',
          52 => 'Handheld Night Scene',
          53 => 'Movie Digest',
          54 => 'Live View Control',
          55 => 'Discreet',
          56 => 'Blur Reduction',
          57 => 'Monochrome',
          58 => 'Toy Camera Effect',
          59 => 'Scene Intelligent Auto',
          60 => 'High-speed Burst HQ',
          61 => 'Smooth Skin',
          62 => 'Soft Focus',
          257 => 'Spotlight',
          258 => 'Night 2',
          259 => 'Night+',
          260 => 'Super Night',
          261 => 'Sunset',
          263 => 'Night Scene',
          264 => 'Surface',
          265 => 'Low Light 2',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:EasyMode',
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'DigitalZoom',
      'title' => 'Digital Zoom',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'None',
          1 => '2x',
          2 => '4x',
          3 => 'Other',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:DigitalZoom',
    ),
    13 =>
    array (
      'collection' => 'Tag',
      'name' => 'Contrast',
      'title' => 'Contrast',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:Contrast',
    ),
    14 =>
    array (
      'collection' => 'Tag',
      'name' => 'Saturation',
      'title' => 'Saturation',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:Saturation',
    ),
    15 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonSharpness',
      'collection' => 'Tag',
      'name' => 'Sharpness',
      'title' => 'Sharpness',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:Sharpness',
    ),
    16 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonCameraISO',
      'collection' => 'Tag',
      'name' => 'CameraISO',
      'title' => 'Camera ISO',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:CameraISO',
    ),
    17 =>
    array (
      'collection' => 'Tag',
      'name' => 'MeteringMode',
      'title' => 'Metering Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Default',
          1 => 'Spot',
          2 => 'Average',
          3 => 'Evaluative',
          4 => 'Partial',
          5 => 'Center-weighted average',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:MeteringMode',
    ),
    18 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusRange',
      'title' => 'Focus Range',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Manual',
          1 => 'Auto',
          2 => 'Not Known',
          3 => 'Macro',
          4 => 'Very Close',
          5 => 'Close',
          6 => 'Middle Range',
          7 => 'Far Range',
          8 => 'Pan Focus',
          9 => 'Super Macro',
          10 => 'Infinity',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FocusRange',
    ),
    19 =>
    array (
      'collection' => 'Tag',
      'name' => 'AFPoint',
      'title' => 'AF Point',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          8197 => 'Manual AF point selection',
          12288 => 'None (MF)',
          12289 => 'Auto AF point selection',
          12290 => 'Right',
          12291 => 'Center',
          12292 => 'Left',
          16385 => 'Auto AF point selection',
          16390 => 'Face Detect',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:AFPoint',
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'CanonExposureMode',
      'title' => 'Canon Exposure Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Easy',
          1 => 'Program AE',
          2 => 'Shutter speed priority AE',
          3 => 'Aperture-priority AE',
          4 => 'Manual',
          5 => 'Depth-of-field AE',
          6 => 'M-Dep',
          7 => 'Bulb',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:CanonExposureMode',
    ),
    22 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonCameraSettingsLensType',
      'collection' => 'Tag',
      'name' => 'LensType',
      'title' => 'Lens Type',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -1 => 'n/a',
          1 => 'Canon EF 50mm f/1.8',
          2 => 'Canon EF 28mm f/2.8',
          3 => 'Canon EF 135mm f/2.8 Soft',
          4 => 'Canon EF 35-105mm f/3.5-4.5 or Sigma Lens',
          '4.1' => 'Sigma UC Zoom 35-135mm f/4-5.6',
          5 => 'Canon EF 35-70mm f/3.5-4.5',
          6 => 'Canon EF 28-70mm f/3.5-4.5 or Sigma or Tokina Lens',
          '6.1' => 'Sigma 18-50mm f/3.5-5.6 DC',
          '6.2' => 'Sigma 18-125mm f/3.5-5.6 DC IF ASP',
          '6.3' => 'Tokina AF 193-2 19-35mm f/3.5-4.5',
          '6.4' => 'Sigma 28-80mm f/3.5-5.6 II Macro',
          '6.5' => 'Sigma 28-300mm f/3.5-6.3 DG Macro',
          7 => 'Canon EF 100-300mm f/5.6L',
          8 => 'Canon EF 100-300mm f/5.6 or Sigma or Tokina Lens',
          '8.1' => 'Sigma 70-300mm f/4-5.6 [APO] DG Macro',
          '8.2' => 'Tokina AT-X 242 AF 24-200mm f/3.5-5.6',
          9 => 'Canon EF 70-210mm f/4',
          '9.1' => 'Sigma 55-200mm f/4-5.6 DC',
          10 => 'Canon EF 50mm f/2.5 Macro or Sigma Lens',
          '10.1' => 'Sigma 50mm f/2.8 EX',
          '10.2' => 'Sigma 28mm f/1.8',
          '10.3' => 'Sigma 105mm f/2.8 Macro EX',
          '10.4' => 'Sigma 70mm f/2.8 EX DG Macro EF',
          11 => 'Canon EF 35mm f/2',
          13 => 'Canon EF 15mm f/2.8 Fisheye',
          14 => 'Canon EF 50-200mm f/3.5-4.5L',
          15 => 'Canon EF 50-200mm f/3.5-4.5',
          16 => 'Canon EF 35-135mm f/3.5-4.5',
          17 => 'Canon EF 35-70mm f/3.5-4.5A',
          18 => 'Canon EF 28-70mm f/3.5-4.5',
          20 => 'Canon EF 100-200mm f/4.5A',
          21 => 'Canon EF 80-200mm f/2.8L',
          22 => 'Canon EF 20-35mm f/2.8L or Tokina Lens',
          '22.1' => 'Tokina AT-X 280 AF Pro 28-80mm f/2.8 Aspherical',
          23 => 'Canon EF 35-105mm f/3.5-4.5',
          24 => 'Canon EF 35-80mm f/4-5.6 Power Zoom',
          25 => 'Canon EF 35-80mm f/4-5.6 Power Zoom',
          26 => 'Canon EF 100mm f/2.8 Macro or Other Lens',
          '26.1' => 'Cosina 100mm f/3.5 Macro AF',
          '26.2' => 'Tamron SP AF 90mm f/2.8 Di Macro',
          '26.3' => 'Tamron SP AF 180mm f/3.5 Di Macro',
          '26.4' => 'Carl Zeiss Planar T* 50mm f/1.4',
          27 => 'Canon EF 35-80mm f/4-5.6',
          28 => 'Canon EF 80-200mm f/4.5-5.6 or Tamron Lens',
          '28.1' => 'Tamron SP AF 28-105mm f/2.8 LD Aspherical IF',
          '28.2' => 'Tamron SP AF 28-75mm f/2.8 XR Di LD Aspherical [IF] Macro',
          '28.3' => 'Tamron AF 70-300mm f/4-5.6 Di LD 1:2 Macro',
          '28.4' => 'Tamron AF Aspherical 28-200mm f/3.8-5.6',
          29 => 'Canon EF 50mm f/1.8 II',
          30 => 'Canon EF 35-105mm f/4.5-5.6',
          31 => 'Canon EF 75-300mm f/4-5.6 or Tamron Lens',
          '31.1' => 'Tamron SP AF 300mm f/2.8 LD IF',
          32 => 'Canon EF 24mm f/2.8 or Sigma Lens',
          '32.1' => 'Sigma 15mm f/2.8 EX Fisheye',
          33 => 'Voigtlander or Carl Zeiss Lens',
          '33.1' => 'Voigtlander Ultron 40mm f/2 SLII Aspherical',
          '33.2' => 'Voigtlander Color Skopar 20mm f/3.5 SLII Aspherical',
          '33.3' => 'Voigtlander APO-Lanthar 90mm f/3.5 SLII Close Focus',
          '33.4' => 'Carl Zeiss Distagon T* 15mm f/2.8 ZE',
          '33.5' => 'Carl Zeiss Distagon T* 18mm f/3.5 ZE',
          '33.6' => 'Carl Zeiss Distagon T* 21mm f/2.8 ZE',
          '33.7' => 'Carl Zeiss Distagon T* 25mm f/2 ZE',
          '33.8' => 'Carl Zeiss Distagon T* 28mm f/2 ZE',
          '33.9' => 'Carl Zeiss Distagon T* 35mm f/2 ZE',
          '33.10' => 'Carl Zeiss Distagon T* 35mm f/1.4 ZE',
          '33.11' => 'Carl Zeiss Planar T* 50mm f/1.4 ZE',
          '33.12' => 'Carl Zeiss Makro-Planar T* 50mm f/2 ZE',
          '33.13' => 'Carl Zeiss Makro-Planar T* 100mm f/2 ZE',
          '33.14' => 'Carl Zeiss Apo-Sonnar T* 135mm f/2 ZE',
          35 => 'Canon EF 35-80mm f/4-5.6',
          36 => 'Canon EF 38-76mm f/4.5-5.6',
          37 => 'Canon EF 35-80mm f/4-5.6 or Tamron Lens',
          '37.1' => 'Tamron 70-200mm f/2.8 Di LD IF Macro',
          '37.2' => 'Tamron AF 28-300mm f/3.5-6.3 XR Di VC LD Aspherical [IF] Macro Model A20',
          '37.3' => 'Tamron SP AF 17-50mm f/2.8 XR Di II VC LD Aspherical [IF]',
          '37.4' => 'Tamron AF 18-270mm f/3.5-6.3 Di II VC LD Aspherical [IF] Macro',
          38 => 'Canon EF 80-200mm f/4.5-5.6',
          39 => 'Canon EF 75-300mm f/4-5.6',
          40 => 'Canon EF 28-80mm f/3.5-5.6',
          41 => 'Canon EF 28-90mm f/4-5.6',
          42 => 'Canon EF 28-200mm f/3.5-5.6 or Tamron Lens',
          '42.1' => 'Tamron AF 28-300mm f/3.5-6.3 XR Di VC LD Aspherical [IF] Macro Model A20',
          43 => 'Canon EF 28-105mm f/4-5.6',
          44 => 'Canon EF 90-300mm f/4.5-5.6',
          45 => 'Canon EF-S 18-55mm f/3.5-5.6 [II]',
          46 => 'Canon EF 28-90mm f/4-5.6',
          47 => 'Zeiss Milvus 35mm f/2 or 50mm f/2',
          '47.1' => 'Zeiss Milvus 50mm f/2 Makro',
          48 => 'Canon EF-S 18-55mm f/3.5-5.6 IS',
          49 => 'Canon EF-S 55-250mm f/4-5.6 IS',
          50 => 'Canon EF-S 18-200mm f/3.5-5.6 IS',
          51 => 'Canon EF-S 18-135mm f/3.5-5.6 IS',
          52 => 'Canon EF-S 18-55mm f/3.5-5.6 IS II',
          53 => 'Canon EF-S 18-55mm f/3.5-5.6 III',
          54 => 'Canon EF-S 55-250mm f/4-5.6 IS II',
          60 => 'Irix 11mm f/4',
          80 => 'Canon TS-E 50mm f/2.8L Macro',
          81 => 'Canon TS-E 90mm f/2.8L Macro',
          82 => 'Canon TS-E 135mm f/4L Macro',
          94 => 'Canon TS-E 17mm f/4L',
          95 => 'Canon TS-E 24mm f/3.5L II',
          103 => 'Samyang AF 14mm f/2.8 EF or Rokinon Lens',
          '103.1' => 'Rokinon SP 14mm f/2.4',
          '103.2' => 'Rokinon AF 14mm f/2.8 EF',
          124 => 'Canon MP-E 65mm f/2.8 1-5x Macro Photo',
          125 => 'Canon TS-E 24mm f/3.5L',
          126 => 'Canon TS-E 45mm f/2.8',
          127 => 'Canon TS-E 90mm f/2.8',
          129 => 'Canon EF 300mm f/2.8L USM',
          130 => 'Canon EF 50mm f/1.0L USM',
          131 => 'Canon EF 28-80mm f/2.8-4L USM or Sigma Lens',
          '131.1' => 'Sigma 8mm f/3.5 EX DG Circular Fisheye',
          '131.2' => 'Sigma 17-35mm f/2.8-4 EX DG Aspherical HSM',
          '131.3' => 'Sigma 17-70mm f/2.8-4.5 DC Macro',
          '131.4' => 'Sigma APO 50-150mm f/2.8 [II] EX DC HSM',
          '131.5' => 'Sigma APO 120-300mm f/2.8 EX DG HSM',
          '131.6' => 'Sigma 4.5mm f/2.8 EX DC HSM Circular Fisheye',
          '131.7' => 'Sigma 70-200mm f/2.8 APO EX HSM',
          132 => 'Canon EF 1200mm f/5.6L USM',
          134 => 'Canon EF 600mm f/4L IS USM',
          135 => 'Canon EF 200mm f/1.8L USM',
          136 => 'Canon EF 300mm f/2.8L USM',
          137 => 'Canon EF 85mm f/1.2L USM or Sigma or Tamron Lens',
          '137.1' => 'Sigma 18-50mm f/2.8-4.5 DC OS HSM',
          '137.2' => 'Sigma 50-200mm f/4-5.6 DC OS HSM',
          '137.3' => 'Sigma 18-250mm f/3.5-6.3 DC OS HSM',
          '137.4' => 'Sigma 24-70mm f/2.8 IF EX DG HSM',
          '137.5' => 'Sigma 18-125mm f/3.8-5.6 DC OS HSM',
          '137.6' => 'Sigma 17-70mm f/2.8-4 DC Macro OS HSM | C',
          '137.7' => 'Sigma 17-50mm f/2.8 OS HSM',
          '137.8' => 'Sigma 18-200mm f/3.5-6.3 DC OS HSM [II]',
          '137.9' => 'Tamron AF 18-270mm f/3.5-6.3 Di II VC PZD',
          '137.10' => 'Sigma 8-16mm f/4.5-5.6 DC HSM',
          '137.11' => 'Tamron SP 17-50mm f/2.8 XR Di II VC',
          '137.12' => 'Tamron SP 60mm f/2 Macro Di II',
          '137.13' => 'Sigma 10-20mm f/3.5 EX DC HSM',
          '137.14' => 'Tamron SP 24-70mm f/2.8 Di VC USD',
          '137.15' => 'Sigma 18-35mm f/1.8 DC HSM',
          '137.16' => 'Sigma 12-24mm f/4.5-5.6 DG HSM II',
          138 => 'Canon EF 28-80mm f/2.8-4L',
          139 => 'Canon EF 400mm f/2.8L USM',
          140 => 'Canon EF 500mm f/4.5L USM',
          141 => 'Canon EF 500mm f/4.5L USM',
          142 => 'Canon EF 300mm f/2.8L IS USM',
          143 => 'Canon EF 500mm f/4L IS USM or Sigma Lens',
          '143.1' => 'Sigma 17-70mm f/2.8-4 DC Macro OS HSM',
          144 => 'Canon EF 35-135mm f/4-5.6 USM',
          145 => 'Canon EF 100-300mm f/4.5-5.6 USM',
          146 => 'Canon EF 70-210mm f/3.5-4.5 USM',
          147 => 'Canon EF 35-135mm f/4-5.6 USM',
          148 => 'Canon EF 28-80mm f/3.5-5.6 USM',
          149 => 'Canon EF 100mm f/2 USM',
          150 => 'Canon EF 14mm f/2.8L USM or Sigma Lens',
          '150.1' => 'Sigma 20mm EX f/1.8',
          '150.2' => 'Sigma 30mm f/1.4 DC HSM',
          '150.3' => 'Sigma 24mm f/1.8 DG Macro EX',
          '150.4' => 'Sigma 28mm f/1.8 DG Macro EX',
          151 => 'Canon EF 200mm f/2.8L USM',
          152 => 'Canon EF 300mm f/4L IS USM or Sigma Lens',
          '152.1' => 'Sigma 12-24mm f/4.5-5.6 EX DG ASPHERICAL HSM',
          '152.2' => 'Sigma 14mm f/2.8 EX Aspherical HSM',
          '152.3' => 'Sigma 10-20mm f/4-5.6',
          '152.4' => 'Sigma 100-300mm f/4',
          153 => 'Canon EF 35-350mm f/3.5-5.6L USM or Sigma or Tamron Lens',
          '153.1' => 'Sigma 50-500mm f/4-6.3 APO HSM EX',
          '153.2' => 'Tamron AF 28-300mm f/3.5-6.3 XR LD Aspherical [IF] Macro',
          '153.3' => 'Tamron AF 18-200mm f/3.5-6.3 XR Di II LD Aspherical [IF] Macro Model A14',
          '153.4' => 'Tamron 18-250mm f/3.5-6.3 Di II LD Aspherical [IF] Macro',
          154 => 'Canon EF 20mm f/2.8 USM or Zeiss Lens',
          '154.1' => 'Zeiss Milvus 21mm f/2.8',
          155 => 'Canon EF 85mm f/1.8 USM',
          156 => 'Canon EF 28-105mm f/3.5-4.5 USM or Tamron Lens',
          '156.1' => 'Tamron SP 70-300mm f/4-5.6 Di VC USD',
          '156.2' => 'Tamron SP AF 28-105mm f/2.8 LD Aspherical IF',
          160 => 'Canon EF 20-35mm f/3.5-4.5 USM or Tamron or Tokina Lens',
          '160.1' => 'Tamron AF 19-35mm f/3.5-4.5',
          '160.2' => 'Tokina AT-X 124 AF Pro DX 12-24mm f/4',
          '160.3' => 'Tokina AT-X 107 AF DX 10-17mm f/3.5-4.5 Fisheye',
          '160.4' => 'Tokina AT-X 116 AF Pro DX 11-16mm f/2.8',
          '160.5' => 'Tokina AT-X 11-20 F2.8 PRO DX Aspherical 11-20mm f/2.8',
          161 => 'Canon EF 28-70mm f/2.8L USM or Other Lens',
          '161.1' => 'Sigma 24-70mm f/2.8 EX',
          '161.2' => 'Sigma 28-70mm f/2.8 EX',
          '161.3' => 'Sigma 24-60mm f/2.8 EX DG',
          '161.4' => 'Tamron AF 17-50mm f/2.8 Di-II LD Aspherical',
          '161.5' => 'Tamron 90mm f/2.8',
          '161.6' => 'Tamron SP AF 17-35mm f/2.8-4 Di LD Aspherical IF',
          '161.7' => 'Tamron SP AF 28-75mm f/2.8 XR Di LD Aspherical [IF] Macro',
          '161.8' => 'Tokina AT-X 24-70mm f/2.8 PRO FX (IF)',
          162 => 'Canon EF 200mm f/2.8L USM',
          163 => 'Canon EF 300mm f/4L',
          164 => 'Canon EF 400mm f/5.6L',
          165 => 'Canon EF 70-200mm f/2.8L USM',
          166 => 'Canon EF 70-200mm f/2.8L USM + 1.4x',
          167 => 'Canon EF 70-200mm f/2.8L USM + 2x',
          168 => 'Canon EF 28mm f/1.8 USM or Sigma Lens',
          '168.1' => 'Sigma 50-100mm f/1.8 DC HSM | A',
          169 => 'Canon EF 17-35mm f/2.8L USM or Sigma Lens',
          '169.1' => 'Sigma 18-200mm f/3.5-6.3 DC OS',
          '169.2' => 'Sigma 15-30mm f/3.5-4.5 EX DG Aspherical',
          '169.3' => 'Sigma 18-50mm f/2.8 Macro',
          '169.4' => 'Sigma 50mm f/1.4 EX DG HSM',
          '169.5' => 'Sigma 85mm f/1.4 EX DG HSM',
          '169.6' => 'Sigma 30mm f/1.4 EX DC HSM',
          '169.7' => 'Sigma 35mm f/1.4 DG HSM',
          '169.8' => 'Sigma 35mm f/1.5 FF High-Speed Prime | 017',
          170 => 'Canon EF 200mm f/2.8L II USM',
          171 => 'Canon EF 300mm f/4L USM',
          172 => 'Canon EF 400mm f/5.6L USM or Sigma Lens',
          '172.1' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S',
          173 => 'Canon EF 180mm Macro f/3.5L USM or Sigma Lens',
          '173.1' => 'Sigma 180mm EX HSM Macro f/3.5',
          '173.2' => 'Sigma APO Macro 150mm f/2.8 EX DG HSM',
          174 => 'Canon EF 135mm f/2L USM or Other Lens',
          '174.1' => 'Sigma 70-200mm f/2.8 EX DG APO OS HSM',
          '174.2' => 'Sigma 50-500mm f/4.5-6.3 APO DG OS HSM',
          '174.3' => 'Sigma 150-500mm f/5-6.3 APO DG OS HSM',
          '174.4' => 'Zeiss Milvus 100mm f/2 Makro',
          175 => 'Canon EF 400mm f/2.8L USM',
          176 => 'Canon EF 24-85mm f/3.5-4.5 USM',
          177 => 'Canon EF 300mm f/4L IS USM',
          178 => 'Canon EF 28-135mm f/3.5-5.6 IS',
          179 => 'Canon EF 24mm f/1.4L USM',
          180 => 'Canon EF 35mm f/1.4L USM or Other Lens',
          '180.1' => 'Sigma 50mm f/1.4 DG HSM | A',
          '180.2' => 'Sigma 24mm f/1.4 DG HSM | A',
          '180.3' => 'Zeiss Milvus 50mm f/1.4',
          '180.4' => 'Zeiss Milvus 85mm f/1.4',
          '180.5' => 'Zeiss Otus 28mm f/1.4 ZE',
          '180.6' => 'Sigma 24mm f/1.5 FF High-Speed Prime | 017',
          '180.7' => 'Sigma 50mm f/1.5 FF High-Speed Prime | 017',
          '180.8' => 'Sigma 85mm f/1.5 FF High-Speed Prime | 017',
          181 => 'Canon EF 100-400mm f/4.5-5.6L IS USM + 1.4x or Sigma Lens',
          '181.1' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S + 1.4x',
          182 => 'Canon EF 100-400mm f/4.5-5.6L IS USM + 2x or Sigma Lens',
          '182.1' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S + 2x',
          183 => 'Canon EF 100-400mm f/4.5-5.6L IS USM or Sigma Lens',
          '183.1' => 'Sigma 150mm f/2.8 EX DG OS HSM APO Macro',
          '183.2' => 'Sigma 105mm f/2.8 EX DG OS HSM Macro',
          '183.3' => 'Sigma 180mm f/2.8 EX DG OS HSM APO Macro',
          '183.4' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | C',
          '183.5' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S',
          '183.6' => 'Sigma 100-400mm f/5-6.3 DG OS HSM',
          '183.7' => 'Sigma 180mm f/3.5 APO Macro EX DG IF HSM',
          184 => 'Canon EF 400mm f/2.8L USM + 2x',
          185 => 'Canon EF 600mm f/4L IS USM',
          186 => 'Canon EF 70-200mm f/4L USM',
          187 => 'Canon EF 70-200mm f/4L USM + 1.4x',
          188 => 'Canon EF 70-200mm f/4L USM + 2x',
          189 => 'Canon EF 70-200mm f/4L USM + 2.8x',
          190 => 'Canon EF 100mm f/2.8 Macro USM',
          191 => 'Canon EF 400mm f/4 DO IS or Sigma Lens',
          '191.1' => 'Sigma 500mm f/4 DG OS HSM',
          193 => 'Canon EF 35-80mm f/4-5.6 USM',
          194 => 'Canon EF 80-200mm f/4.5-5.6 USM',
          195 => 'Canon EF 35-105mm f/4.5-5.6 USM',
          196 => 'Canon EF 75-300mm f/4-5.6 USM',
          197 => 'Canon EF 75-300mm f/4-5.6 IS USM or Sigma Lens',
          '197.1' => 'Sigma 18-300mm f/3.5-6.3 DC Macro OS HS',
          198 => 'Canon EF 50mm f/1.4 USM or Zeiss Lens',
          '198.1' => 'Zeiss Otus 55mm f/1.4 ZE',
          '198.2' => 'Zeiss Otus 85mm f/1.4 ZE',
          '198.3' => 'Zeiss Milvus 25mm f/1.4',
          199 => 'Canon EF 28-80mm f/3.5-5.6 USM',
          200 => 'Canon EF 75-300mm f/4-5.6 USM',
          201 => 'Canon EF 28-80mm f/3.5-5.6 USM',
          202 => 'Canon EF 28-80mm f/3.5-5.6 USM IV',
          208 => 'Canon EF 22-55mm f/4-5.6 USM',
          209 => 'Canon EF 55-200mm f/4.5-5.6',
          210 => 'Canon EF 28-90mm f/4-5.6 USM',
          211 => 'Canon EF 28-200mm f/3.5-5.6 USM',
          212 => 'Canon EF 28-105mm f/4-5.6 USM',
          213 => 'Canon EF 90-300mm f/4.5-5.6 USM or Tamron Lens',
          '213.1' => 'Tamron SP 150-600mm f/5-6.3 Di VC USD',
          '213.2' => 'Tamron 16-300mm f/3.5-6.3 Di II VC PZD Macro',
          '213.3' => 'Tamron SP 35mm f/1.8 Di VC USD',
          '213.4' => 'Tamron SP 45mm f/1.8 Di VC USD',
          214 => 'Canon EF-S 18-55mm f/3.5-5.6 USM',
          215 => 'Canon EF 55-200mm f/4.5-5.6 II USM',
          217 => 'Tamron AF 18-270mm f/3.5-6.3 Di II VC PZD',
          224 => 'Canon EF 70-200mm f/2.8L IS USM',
          225 => 'Canon EF 70-200mm f/2.8L IS USM + 1.4x',
          226 => 'Canon EF 70-200mm f/2.8L IS USM + 2x',
          227 => 'Canon EF 70-200mm f/2.8L IS USM + 2.8x',
          228 => 'Canon EF 28-105mm f/3.5-4.5 USM',
          229 => 'Canon EF 16-35mm f/2.8L USM',
          230 => 'Canon EF 24-70mm f/2.8L USM',
          231 => 'Canon EF 17-40mm f/4L USM',
          232 => 'Canon EF 70-300mm f/4.5-5.6 DO IS USM',
          233 => 'Canon EF 28-300mm f/3.5-5.6L IS USM',
          234 => 'Canon EF-S 17-85mm f/4-5.6 IS USM or Tokina Lens',
          '234.1' => 'Tokina AT-X 12-28 PRO DX 12-28mm f/4',
          235 => 'Canon EF-S 10-22mm f/3.5-4.5 USM',
          236 => 'Canon EF-S 60mm f/2.8 Macro USM',
          237 => 'Canon EF 24-105mm f/4L IS USM',
          238 => 'Canon EF 70-300mm f/4-5.6 IS USM',
          239 => 'Canon EF 85mm f/1.2L II USM or Rokinon Lens',
          '239.1' => 'Rokinon SP 85mm f/1.2',
          240 => 'Canon EF-S 17-55mm f/2.8 IS USM or Sigma Lens',
          '240.1' => 'Sigma 17-50mm f/2.8 EX DC OS HSM',
          241 => 'Canon EF 50mm f/1.2L USM',
          242 => 'Canon EF 70-200mm f/4L IS USM',
          243 => 'Canon EF 70-200mm f/4L IS USM + 1.4x',
          244 => 'Canon EF 70-200mm f/4L IS USM + 2x',
          245 => 'Canon EF 70-200mm f/4L IS USM + 2.8x',
          246 => 'Canon EF 16-35mm f/2.8L II USM',
          247 => 'Canon EF 14mm f/2.8L II USM',
          248 => 'Canon EF 200mm f/2L IS USM or Sigma Lens',
          '248.1' => 'Sigma 24-35mm f/2 DG HSM | A',
          '248.2' => 'Sigma 135mm f/2 FF High-Speed Prime | 017',
          '248.3' => 'Sigma 24-35mm f/2.2 FF Zoom | 017',
          249 => 'Canon EF 800mm f/5.6L IS USM',
          250 => 'Canon EF 24mm f/1.4L II USM or Sigma Lens',
          '250.1' => 'Sigma 20mm f/1.4 DG HSM | A',
          '250.2' => 'Sigma 20mm f/1.5 FF High-Speed Prime | 017',
          251 => 'Canon EF 70-200mm f/2.8L IS II USM',
          252 => 'Canon EF 70-200mm f/2.8L IS II USM + 1.4x',
          253 => 'Canon EF 70-200mm f/2.8L IS II USM + 2x',
          254 => 'Canon EF 100mm f/2.8L Macro IS USM',
          255 => 'Sigma 24-105mm f/4 DG OS HSM | A or Other Sigma Lens',
          '255.1' => 'Sigma 180mm f/2.8 EX DG OS HSM APO Macro',
          368 => 'Sigma 14-24mm f/2.8 DG HSM | A or other Sigma Lens',
          '368.1' => 'Sigma 20mm f/1.4 DG HSM | A',
          '368.2' => 'Sigma 50mm f/1.4 DG HSM | A',
          '368.3' => 'Sigma 40mm f/1.4 DG HSM | A',
          '368.4' => 'Sigma 60-600mm f/4.5-6.3 DG OS HSM | S',
          488 => 'Canon EF-S 15-85mm f/3.5-5.6 IS USM',
          489 => 'Canon EF 70-300mm f/4-5.6L IS USM',
          490 => 'Canon EF 8-15mm f/4L Fisheye USM',
          491 => 'Canon EF 300mm f/2.8L IS II USM or Tamron Lens',
          '491.1' => 'Tamron SP 70-200mm f/2.8 Di VC USD G2 (A025)',
          '491.2' => 'Tamron 18-400mm f/3.5-6.3 Di II VC HLD (B028)',
          '491.3' => 'Tamron 100-400mm f/4.5-6.3 Di VC USD (A035)',
          '491.4' => 'Tamron 70-210mm f/4 Di VC USD (A034)',
          '491.5' => 'Tamron 70-210mm f/4 Di VC USD (A034) + 1.4x',
          '491.6' => 'Tamron SP 24-70mm f/2.8 Di VC USD G2 (A032)',
          492 => 'Canon EF 400mm f/2.8L IS II USM',
          493 => 'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM',
          '493.1' => 'Canon EF 24-105mm f/4L IS USM',
          494 => 'Canon EF 600mm f/4L IS II USM',
          495 => 'Canon EF 24-70mm f/2.8L II USM or Sigma Lens',
          '495.1' => 'Sigma 24-70mm F2.8 DG OS HSM | A',
          496 => 'Canon EF 200-400mm f/4L IS USM',
          499 => 'Canon EF 200-400mm f/4L IS USM + 1.4x',
          502 => 'Canon EF 28mm f/2.8 IS USM',
          503 => 'Canon EF 24mm f/2.8 IS USM',
          504 => 'Canon EF 24-70mm f/4L IS USM',
          505 => 'Canon EF 35mm f/2 IS USM',
          506 => 'Canon EF 400mm f/4 DO IS II USM',
          507 => 'Canon EF 16-35mm f/4L IS USM',
          508 => 'Canon EF 11-24mm f/4L USM or Tamron Lens',
          '508.1' => 'Tamron 10-24mm f/3.5-4.5 Di II VC HLD',
          747 => 'Canon EF 100-400mm f/4.5-5.6L IS II USM or Tamron Lens',
          '747.1' => 'Tamron SP 150-600mm f/5-6.3 Di VC USD G2',
          748 => 'Canon EF 100-400mm f/4.5-5.6L IS II USM + 1.4x or Tamron Lens',
          '748.1' => 'Tamron 100-400mm f/4.5-6.3 Di VC USD A035E + 1.4x',
          '748.2' => 'Tamron 70-210mm f/4 Di VC USD (A034) + 2x',
          749 => 'Tamron 100-400mm f/4.5-6.3 Di VC USD A035E + 2x',
          750 => 'Canon EF 35mm f/1.4L II USM',
          751 => 'Canon EF 16-35mm f/2.8L III USM',
          752 => 'Canon EF 24-105mm f/4L IS II USM',
          753 => 'Canon EF 85mm f/1.4L IS USM',
          754 => 'Canon EF 70-200mm f/4L IS II USM',
          757 => 'Canon EF 400mm f/2.8L IS III USM',
          758 => 'Canon EF 600mm f/4L IS III USM',
          1136 => 'Sigma 24-70mm f/2.8 DG OS HSM | Art 017',
          4142 => 'Canon EF-S 18-135mm f/3.5-5.6 IS STM',
          4143 => 'Canon EF-M 18-55mm f/3.5-5.6 IS STM or Tamron Lens',
          '4143.1' => 'Tamron 18-200mm f/3.5-6.3 Di III VC',
          4144 => 'Canon EF 40mm f/2.8 STM',
          4145 => 'Canon EF-M 22mm f/2 STM',
          4146 => 'Canon EF-S 18-55mm f/3.5-5.6 IS STM',
          4147 => 'Canon EF-M 11-22mm f/4-5.6 IS STM',
          4148 => 'Canon EF-S 55-250mm f/4-5.6 IS STM',
          4149 => 'Canon EF-M 55-200mm f/4.5-6.3 IS STM',
          4150 => 'Canon EF-S 10-18mm f/4.5-5.6 IS STM',
          4152 => 'Canon EF 24-105mm f/3.5-5.6 IS STM',
          4153 => 'Canon EF-M 15-45mm f/3.5-6.3 IS STM',
          4154 => 'Canon EF-S 24mm f/2.8 STM',
          4155 => 'Canon EF-M 28mm f/3.5 Macro IS STM',
          4156 => 'Canon EF 50mm f/1.8 STM',
          4157 => 'Canon EF-M 18-150mm 1:3.5-6.3 IS STM',
          4158 => 'Canon EF-S 18-55mm f/4-5.6 IS STM',
          4160 => 'Canon EF-S 35mm f/2.8 Macro IS STM',
          36910 => 'Canon EF 70-300mm f/4-5.6 IS II USM',
          36912 => 'Canon EF-S 18-135mm f/3.5-5.6 IS USM',
          61182 => 'Canon RF 35mm F1.8 Macro IS STM or other Canon RF Lens',
          '61182.1' => 'Canon RF 50mm F1.2 L USM',
          '61182.2' => 'Canon RF 24-105mm F4 L IS USM',
          '61182.3' => 'Canon RF 28-70mm F2 L USM',
          61491 => 'Canon CN-E 14mm T3.1 L F',
          61492 => 'Canon CN-E 24mm T1.5 L F',
          61494 => 'Canon CN-E 85mm T1.3 L F',
          61495 => 'Canon CN-E 135mm T2.2 L F',
          61496 => 'Canon CN-E 35mm T1.5 L F',
          65535 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:LensType',
    ),
    23 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonFocalLength',
      'collection' => 'Tag',
      'name' => 'MaxFocalLength',
      'title' => 'Max Focal Length',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:MaxFocalLength',
    ),
    24 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonFocalLength',
      'collection' => 'Tag',
      'name' => 'MinFocalLength',
      'title' => 'Min Focal Length',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'Canon:MinFocalLength',
    ),
    25 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalUnits',
      'title' => 'Focal Units',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:FocalUnits',
    ),
    26 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonApertureValue',
      'collection' => 'Tag',
      'name' => 'MaxAperture',
      'title' => 'Max Aperture',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:MaxAperture',
    ),
    27 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\CanonApertureValue',
      'collection' => 'Tag',
      'name' => 'MinAperture',
      'title' => 'Min Aperture',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:MinAperture',
    ),
    28 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashActivity',
      'title' => 'Flash Activity',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:FlashActivity',
    ),
    29 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashBits',
      'title' => 'Flash Bits',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '(none)',
          1 => 'Manual',
          2 => 'TTL',
          4 => 'A-TTL',
          8 => 'E-TTL',
          16 => 'FP sync enabled',
          128 => '2nd-curtain sync used',
          2048 => 'FP sync used',
          8192 => 'Built-in',
          16384 => 'External',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FlashBits',
    ),
    32 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocusContinuous',
      'title' => 'Focus Continuous',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Single',
          1 => 'Continuous',
          8 => 'Manual',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FocusContinuous',
    ),
    33 =>
    array (
      'collection' => 'Tag',
      'name' => 'AESetting',
      'title' => 'AE Setting',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal AE',
          1 => 'Exposure Compensation',
          2 => 'AE Lock',
          3 => 'AE Lock + Exposure Comp.',
          4 => 'No AE',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:AESetting',
    ),
    34 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageStabilization',
      'title' => 'Image Stabilization',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'On',
          2 => 'Shoot Only',
          3 => 'Panning',
          4 => 'Dynamic',
          256 => 'Off (2)',
          257 => 'On (2)',
          258 => 'Shoot Only (2)',
          259 => 'Panning (2)',
          260 => 'Dynamic (2)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ImageStabilization',
    ),
    35 =>
    array (
      'collection' => 'Tag',
      'name' => 'DisplayAperture',
      'title' => 'Display Aperture',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:DisplayAperture',
    ),
    36 =>
    array (
      'collection' => 'Tag',
      'name' => 'ZoomSourceWidth',
      'title' => 'Zoom Source Width',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ZoomSourceWidth',
    ),
    37 =>
    array (
      'collection' => 'Tag',
      'name' => 'ZoomTargetWidth',
      'title' => 'Zoom Target Width',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'Canon:ZoomTargetWidth',
    ),
    39 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpotMeteringMode',
      'title' => 'Spot Metering Mode',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Center',
          1 => 'AF Point',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SpotMeteringMode',
    ),
    40 =>
    array (
      'collection' => 'Tag',
      'name' => 'PhotoEffect',
      'title' => 'Photo Effect',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'Vivid',
          2 => 'Neutral',
          3 => 'Smooth',
          4 => 'Sepia',
          5 => 'B&W',
          6 => 'Custom',
          100 => 'My Color Data',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:PhotoEffect',
    ),
    41 =>
    array (
      'collection' => 'Tag',
      'name' => 'ManualFlashOutput',
      'title' => 'Manual Flash Output',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'n/a',
          1280 => 'Full',
          1282 => 'Medium',
          1284 => 'Low',
          32767 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ManualFlashOutput',
    ),
    42 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTone',
      'title' => 'Color Tone',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorTone',
    ),
    46 =>
    array (
      'collection' => 'Tag',
      'name' => 'SRAWQuality',
      'title' => 'SRAW Quality',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'n/a',
          1 => 'sRAW1 (mRAW)',
          2 => 'sRAW2 (sRAW)',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SRAWQuality',
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:AESetting' => 33,
    'Canon:AFPoint' => 19,
    'Canon:CameraISO' => 16,
    'Canon:CanonExposureMode' => 20,
    'Canon:CanonFlashMode' => 4,
    'Canon:CanonImageSize' => 10,
    'Canon:ColorTone' => 42,
    'Canon:ContinuousDrive' => 5,
    'Canon:Contrast' => 13,
    'Canon:DigitalZoom' => 12,
    'Canon:DisplayAperture' => 35,
    'Canon:EasyMode' => 11,
    'Canon:FlashActivity' => 28,
    'Canon:FlashBits' => 29,
    'Canon:FocalUnits' => 25,
    'Canon:FocusContinuous' => 32,
    'Canon:FocusMode' => 7,
    'Canon:FocusRange' => 18,
    'Canon:ImageStabilization' => 34,
    'Canon:LensType' => 22,
    'Canon:MacroMode' => 1,
    'Canon:ManualFlashOutput' => 41,
    'Canon:MaxAperture' => 26,
    'Canon:MaxFocalLength' => 23,
    'Canon:MeteringMode' => 17,
    'Canon:MinAperture' => 27,
    'Canon:MinFocalLength' => 24,
    'Canon:PhotoEffect' => 40,
    'Canon:Quality' => 3,
    'Canon:RecordMode' => 9,
    'Canon:SRAWQuality' => 46,
    'Canon:Saturation' => 14,
    'Canon:SelfTimer' => 2,
    'Canon:Sharpness' => 15,
    'Canon:SpotMeteringMode' => 39,
    'Canon:ZoomSourceWidth' => 36,
    'Canon:ZoomTargetWidth' => 37,
  ),
);
}
