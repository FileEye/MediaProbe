<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Maker\Apple\Exif;

use FileEye\MediaProbe\Collection\CollectionBase;

class MakerNote extends CollectionBase {

  protected static $map = array (
  'name' => 'Apple',
  'title' => 'Apple Maker Notes',
  'DOMNode' => 'makerNote',
  'defaultItemCollection' => 'Media\\Tiff\\Tag',
  'id' => 'Maker\\Apple\\Exif\\MakerNote',
  'handler' => 'FileEye\\MediaProbe\\Block\\Maker\\Apple\\Exif\\MakerNote',
  'itemsByName' =>
  array (
    'AEAverage' =>
    array (
      0 => 6,
    ),
    'AEMatrix' =>
    array (
      0 => 2,
    ),
    'AEStable' =>
    array (
      0 => 4,
    ),
    'AETarget' =>
    array (
      0 => 5,
    ),
    'AFConfidence' =>
    array (
      0 => 61,
    ),
    'AFMeasuredDepth' =>
    array (
      0 => 56,
    ),
    'AFPerformance' =>
    array (
      0 => 35,
    ),
    'AFStable' =>
    array (
      0 => 7,
    ),
    'AccelerationVector' =>
    array (
      0 => 8,
    ),
    'AppleRuntime' =>
    array (
      0 => 3,
    ),
    'Apple_0x004e' =>
    array (
      0 => 78,
    ),
    'Apple_0x004f' =>
    array (
      0 => 79,
    ),
    'BurstUUID' =>
    array (
      0 => 11,
    ),
    'CameraType' =>
    array (
      0 => 46,
    ),
    'ColorCorrectionMatrix' =>
    array (
      0 => 62,
    ),
    'ColorTemperature' =>
    array (
      0 => 45,
    ),
    'ContentIdentifier' =>
    array (
      0 => 17,
    ),
    'FocusDistanceRange' =>
    array (
      0 => 12,
    ),
    'FocusPosition' =>
    array (
      0 => 47,
    ),
    'GreenGhostMitigationStatus' =>
    array (
      0 => 63,
    ),
    'HDRGain' =>
    array (
      0 => 48,
    ),
    'HDRHeadroom' =>
    array (
      0 => 33,
    ),
    'HDRImageType' =>
    array (
      0 => 10,
    ),
    'ImageCaptureRequestID' =>
    array (
      0 => 32,
    ),
    'ImageCaptureType' =>
    array (
      0 => 20,
    ),
    'ImageProcessingFlags' =>
    array (
      0 => 25,
    ),
    'ImageUniqueID' =>
    array (
      0 => 21,
    ),
    'LivePhotoVideoIndex' =>
    array (
      0 => 23,
    ),
    'LuminanceNoiseAmplitude' =>
    array (
      0 => 29,
    ),
    'MakerNoteVersion' =>
    array (
      0 => 1,
    ),
    'OISMode' =>
    array (
      0 => 15,
    ),
    'PhotoIdentifier' =>
    array (
      0 => 43,
    ),
    'PhotosAppFeatureFlags' =>
    array (
      0 => 31,
    ),
    'QualityHint' =>
    array (
      0 => 26,
    ),
    'SceneFlags' =>
    array (
      0 => 37,
    ),
    'SemanticStyle' =>
    array (
      0 => 64,
    ),
    'SemanticStylePreset' =>
    array (
      0 => 66,
    ),
    'SemanticStyleRenderingVer' =>
    array (
      0 => 65,
    ),
    'SignalToNoiseRatio' =>
    array (
      0 => 39,
    ),
    'SignalToNoiseRatioType' =>
    array (
      0 => 38,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Apple:AEAverage' =>
    array (
      0 => 6,
    ),
    'Apple:AEMatrix' =>
    array (
      0 => 2,
    ),
    'Apple:AEStable' =>
    array (
      0 => 4,
    ),
    'Apple:AETarget' =>
    array (
      0 => 5,
    ),
    'Apple:AFConfidence' =>
    array (
      0 => 61,
    ),
    'Apple:AFMeasuredDepth' =>
    array (
      0 => 56,
    ),
    'Apple:AFPerformance' =>
    array (
      0 => 35,
    ),
    'Apple:AFStable' =>
    array (
      0 => 7,
    ),
    'Apple:AccelerationVector' =>
    array (
      0 => 8,
    ),
    'Apple:Apple_0x004e' =>
    array (
      0 => 78,
    ),
    'Apple:Apple_0x004f' =>
    array (
      0 => 79,
    ),
    'Apple:BurstUUID' =>
    array (
      0 => 11,
    ),
    'Apple:CameraType' =>
    array (
      0 => 46,
    ),
    'Apple:ColorCorrectionMatrix' =>
    array (
      0 => 62,
    ),
    'Apple:ColorTemperature' =>
    array (
      0 => 45,
    ),
    'Apple:ContentIdentifier' =>
    array (
      0 => 17,
    ),
    'Apple:FocusDistanceRange' =>
    array (
      0 => 12,
    ),
    'Apple:FocusPosition' =>
    array (
      0 => 47,
    ),
    'Apple:GreenGhostMitigationStatus' =>
    array (
      0 => 63,
    ),
    'Apple:HDRGain' =>
    array (
      0 => 48,
    ),
    'Apple:HDRHeadroom' =>
    array (
      0 => 33,
    ),
    'Apple:HDRImageType' =>
    array (
      0 => 10,
    ),
    'Apple:ImageCaptureRequestID' =>
    array (
      0 => 32,
    ),
    'Apple:ImageCaptureType' =>
    array (
      0 => 20,
    ),
    'Apple:ImageProcessingFlags' =>
    array (
      0 => 25,
    ),
    'Apple:ImageUniqueID' =>
    array (
      0 => 21,
    ),
    'Apple:LivePhotoVideoIndex' =>
    array (
      0 => 23,
    ),
    'Apple:LuminanceNoiseAmplitude' =>
    array (
      0 => 29,
    ),
    'Apple:MakerNoteVersion' =>
    array (
      0 => 1,
    ),
    'Apple:OISMode' =>
    array (
      0 => 15,
    ),
    'Apple:PhotoIdentifier' =>
    array (
      0 => 43,
    ),
    'Apple:PhotosAppFeatureFlags' =>
    array (
      0 => 31,
    ),
    'Apple:QualityHint' =>
    array (
      0 => 26,
    ),
    'Apple:SceneFlags' =>
    array (
      0 => 37,
    ),
    'Apple:SemanticStyle' =>
    array (
      0 => 64,
    ),
    'Apple:SemanticStylePreset' =>
    array (
      0 => 66,
    ),
    'Apple:SemanticStyleRenderingVer' =>
    array (
      0 => 65,
    ),
    'Apple:SignalToNoiseRatio' =>
    array (
      0 => 39,
    ),
    'Apple:SignalToNoiseRatioType' =>
    array (
      0 => 38,
    ),
  ),
  'items' =>
  array (
    1 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'MakerNoteVersion',
        'title' => 'Maker Note Version',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:MakerNoteVersion',
      ),
    ),
    2 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AEMatrix',
        'title' => 'AE Matrix',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:AEMatrix',
      ),
    ),
    3 =>
    array (
      0 =>
      array (
        'name' => 'AppleRuntime',
        'collection' => 'ExifMakerNotes\\Apple\\RunTime',
      ),
    ),
    4 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AEStable',
        'title' => 'AE Stable',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'No',
            1 => 'Yes',
          ),
        ),
        'exiftoolDOMNode' => 'Apple:AEStable',
      ),
    ),
    5 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AETarget',
        'title' => 'AE Target',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:AETarget',
      ),
    ),
    6 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AEAverage',
        'title' => 'AE Average',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:AEAverage',
      ),
    ),
    7 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AFStable',
        'title' => 'AF Stable',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'No',
            1 => 'Yes',
          ),
        ),
        'exiftoolDOMNode' => 'Apple:AFStable',
      ),
    ),
    8 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AccelerationVector',
        'title' => 'Acceleration Vector',
        'components' => 3,
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Apple:AccelerationVector',
      ),
    ),
    10 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'HDRImageType',
        'title' => 'HDR Image Type',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            3 => 'HDR Image',
            4 => 'Original Image',
          ),
        ),
        'exiftoolDOMNode' => 'Apple:HDRImageType',
      ),
    ),
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'BurstUUID',
        'title' => 'Burst UUID',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:BurstUUID',
      ),
    ),
    12 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Apple\\Exif\\FocusDistanceRange',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FocusDistanceRange',
        'title' => 'Focus Distance Range',
        'components' => 2,
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Apple:FocusDistanceRange',
      ),
    ),
    15 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'OISMode',
        'title' => 'OIS Mode',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:OISMode',
      ),
    ),
    17 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ContentIdentifier',
        'title' => 'Content Identifier',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:ContentIdentifier',
      ),
    ),
    20 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Apple\\Exif\\ImageCaptureType',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ImageCaptureType',
        'title' => 'Image Capture Type',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'ProRAW',
            2 => 'Portrait',
            10 => 'Photo',
            11 => 'Manual Focus',
            12 => 'Scene',
          ),
        ),
        'exiftoolDOMNode' => 'Apple:ImageCaptureType',
      ),
    ),
    21 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ImageUniqueID',
        'title' => 'Image Unique ID',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:ImageUniqueID',
      ),
    ),
    23 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'LivePhotoVideoIndex',
        'title' => 'Live Photo Video Index',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:LivePhotoVideoIndex',
      ),
    ),
    25 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ImageProcessingFlags',
        'title' => 'Image Processing Flags',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:ImageProcessingFlags',
      ),
    ),
    26 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'QualityHint',
        'title' => 'Quality Hint',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:QualityHint',
      ),
    ),
    29 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'LuminanceNoiseAmplitude',
        'title' => 'Luminance Noise Amplitude',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Apple:LuminanceNoiseAmplitude',
      ),
    ),
    31 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'PhotosAppFeatureFlags',
        'title' => 'Photos App Feature Flags',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:PhotosAppFeatureFlags',
      ),
    ),
    32 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ImageCaptureRequestID',
        'title' => 'Image Capture Request ID',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:ImageCaptureRequestID',
      ),
    ),
    33 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'HDRHeadroom',
        'title' => 'HDR Headroom',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Apple:HDRHeadroom',
      ),
    ),
    35 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Vendor\\Apple\\Exif\\AFPerformance',
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AFPerformance',
        'title' => 'AF Performance',
        'components' => 2,
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:AFPerformance',
      ),
    ),
    37 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SceneFlags',
        'title' => 'Scene Flags',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:SceneFlags',
      ),
    ),
    38 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SignalToNoiseRatioType',
        'title' => 'Signal To Noise Ratio Type',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:SignalToNoiseRatioType',
      ),
    ),
    39 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SignalToNoiseRatio',
        'title' => 'Signal To Noise Ratio',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Apple:SignalToNoiseRatio',
      ),
    ),
    43 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'PhotoIdentifier',
        'title' => 'Photo Identifier',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'Apple:PhotoIdentifier',
      ),
    ),
    45 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ColorTemperature',
        'title' => 'Color Temperature',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:ColorTemperature',
      ),
    ),
    46 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'CameraType',
        'title' => 'Camera Type',
        'format' =>
        array (
          0 => 9,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Back Wide Angle',
            1 => 'Back Normal',
            6 => 'Front',
          ),
        ),
        'exiftoolDOMNode' => 'Apple:CameraType',
      ),
    ),
    47 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'FocusPosition',
        'title' => 'Focus Position',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:FocusPosition',
      ),
    ),
    48 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'HDRGain',
        'title' => 'HDR Gain',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'Apple:HDRGain',
      ),
    ),
    56 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AFMeasuredDepth',
        'title' => 'AF Measured Depth',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:AFMeasuredDepth',
      ),
    ),
    61 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'AFConfidence',
        'title' => 'AF Confidence',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:AFConfidence',
      ),
    ),
    62 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'ColorCorrectionMatrix',
        'title' => 'Color Correction Matrix',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:ColorCorrectionMatrix',
      ),
    ),
    63 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'GreenGhostMitigationStatus',
        'title' => 'Green Ghost Mitigation Status',
        'format' =>
        array (
          0 => 9,
        ),
        'exiftoolDOMNode' => 'Apple:GreenGhostMitigationStatus',
      ),
    ),
    64 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SemanticStyle',
        'title' => 'Semantic Style',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:SemanticStyle',
      ),
    ),
    65 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SemanticStyleRenderingVer',
        'title' => 'Semantic Style Rendering Ver',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:SemanticStyleRenderingVer',
      ),
    ),
    66 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'SemanticStylePreset',
        'title' => 'Semantic Style Preset',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:SemanticStylePreset',
      ),
    ),
    78 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'Apple_0x004e',
        'title' => 'Apple 0x004e',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:Apple_0x004e',
      ),
    ),
    79 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Tiff\\Tag',
        'name' => 'Apple_0x004f',
        'title' => 'Apple 0x004f',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'Apple:Apple_0x004f',
      ),
    ),
  ),
);
}
