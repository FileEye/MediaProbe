<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Tiff;

use FileEye\MediaProbe\Collection\CollectionBase;

class Ifd1 extends CollectionBase {

  protected static $map = array (
  'name' => 'IFD1',
  'title' => 'IFD1',
  'handler' => 'FileEye\\MediaProbe\\Block\\Tiff\\Ifd',
  'DOMNode' => 'ifd',
  'defaultItemCollection' => 'Tiff\\Tag',
  'alias' =>
  array (
    0 => '1',
    1 => 'Thumbnail',
  ),
  'postParse' =>
  array (
    0 => 'FileEye\\MediaProbe\\Block\\Tiff\\Ifd::thumbnailToBlock',
  ),
  'id' => 'Tiff\\Ifd1',
  'itemsByName' =>
  array (
    'A100DataOffset' =>
    array (
      0 => 330,
    ),
    'AnalogBalance' =>
    array (
      0 => 50727,
    ),
    'ApplicationNotes' =>
    array (
      0 => 700,
    ),
    'Artist' =>
    array (
      0 => 315,
    ),
    'AsShotICCProfile' =>
    array (
      0 => 50831,
    ),
    'AsShotNeutral' =>
    array (
      0 => 50728,
    ),
    'AsShotPreProfileMatrix' =>
    array (
      0 => 50832,
    ),
    'AsShotProfileName' =>
    array (
      0 => 50934,
    ),
    'AsShotWhiteXY' =>
    array (
      0 => 50729,
    ),
    'BaselineExposure' =>
    array (
      0 => 50730,
    ),
    'BaselineExposureOffset' =>
    array (
      0 => 51109,
    ),
    'BaselineNoise' =>
    array (
      0 => 50731,
    ),
    'BaselineSharpness' =>
    array (
      0 => 50732,
    ),
    'BitsPerSample' =>
    array (
      0 => 258,
    ),
    'CalibrationIlluminant1' =>
    array (
      0 => 50778,
    ),
    'CalibrationIlluminant2' =>
    array (
      0 => 50779,
    ),
    'CalibrationIlluminant3' =>
    array (
      0 => 52529,
    ),
    'CameraCalibration1' =>
    array (
      0 => 50723,
    ),
    'CameraCalibration2' =>
    array (
      0 => 50724,
    ),
    'CameraCalibration3' =>
    array (
      0 => 52530,
    ),
    'CameraCalibrationSig' =>
    array (
      0 => 50931,
    ),
    'CameraLabel' =>
    array (
      0 => 51105,
    ),
    'CameraSerialNumber' =>
    array (
      0 => 50735,
    ),
    'CellLength' =>
    array (
      0 => 265,
    ),
    'CellWidth' =>
    array (
      0 => 264,
    ),
    'ColorMatrix1' =>
    array (
      0 => 50721,
    ),
    'ColorMatrix2' =>
    array (
      0 => 50722,
    ),
    'ColorMatrix3' =>
    array (
      0 => 52531,
    ),
    'ColorimetricReference' =>
    array (
      0 => 50879,
    ),
    'Compression' =>
    array (
      0 => 259,
    ),
    'Copyright' =>
    array (
      0 => 33432,
    ),
    'CurrentICCProfile' =>
    array (
      0 => 50833,
    ),
    'CurrentPreProfileMatrix' =>
    array (
      0 => 50834,
    ),
    'DNGAdobeData' =>
    array (
      0 => 50740,
    ),
    'DNGBackwardVersion' =>
    array (
      0 => 50707,
    ),
    'DNGLensInfo' =>
    array (
      0 => 50736,
    ),
    'DNGPrivateData' =>
    array (
      0 => 50740,
    ),
    'DNGVersion' =>
    array (
      0 => 50706,
    ),
    'DefaultBlackRender' =>
    array (
      0 => 51110,
    ),
    'DepthFar' =>
    array (
      0 => 51179,
    ),
    'DepthFormat' =>
    array (
      0 => 51177,
    ),
    'DepthMeasureType' =>
    array (
      0 => 51181,
    ),
    'DepthNear' =>
    array (
      0 => 51178,
    ),
    'DepthUnits' =>
    array (
      0 => 51180,
    ),
    'DocumentName' =>
    array (
      0 => 269,
    ),
    'EnhanceParams' =>
    array (
      0 => 51182,
    ),
    'ExifIFD' =>
    array (
      0 => 34665,
    ),
    'FillOrder' =>
    array (
      0 => 266,
    ),
    'ForwardMatrix1' =>
    array (
      0 => 50964,
    ),
    'ForwardMatrix2' =>
    array (
      0 => 50965,
    ),
    'ForwardMatrix3' =>
    array (
      0 => 52532,
    ),
    'FrameRate' =>
    array (
      0 => 51044,
    ),
    'GDALMetadata' =>
    array (
      0 => 42112,
    ),
    'GDALNoData' =>
    array (
      0 => 42113,
    ),
    'GPS' =>
    array (
      0 => 34853,
    ),
    'GeoTiffAsciiParams' =>
    array (
      0 => 34737,
    ),
    'GeoTiffDirectory' =>
    array (
      0 => 34735,
    ),
    'GeoTiffDoubleParams' =>
    array (
      0 => 34736,
    ),
    'GrayResponseUnit' =>
    array (
      0 => 290,
    ),
    'HalftoneHints' =>
    array (
      0 => 321,
    ),
    'HostComputer' =>
    array (
      0 => 316,
    ),
    'IPTC-NAA' =>
    array (
      0 => 33723,
    ),
    'IlluminantData1' =>
    array (
      0 => 52533,
    ),
    'IlluminantData2' =>
    array (
      0 => 52534,
    ),
    'IlluminantData3' =>
    array (
      0 => 52535,
    ),
    'ImageDescription' =>
    array (
      0 => 270,
    ),
    'ImageHeight' =>
    array (
      0 => 257,
    ),
    'ImageSequenceInfo' =>
    array (
      0 => 52548,
    ),
    'ImageSourceData' =>
    array (
      0 => 37724,
    ),
    'ImageStats' =>
    array (
      0 => 52550,
    ),
    'ImageWidth' =>
    array (
      0 => 256,
    ),
    'InkSet' =>
    array (
      0 => 332,
    ),
    'IntergraphMatrix' =>
    array (
      0 => 33920,
    ),
    'JXLDecodeSpeed' =>
    array (
      0 => 52555,
    ),
    'JXLDistance' =>
    array (
      0 => 52553,
    ),
    'JXLEffort' =>
    array (
      0 => 52554,
    ),
    'LinearResponseLimit' =>
    array (
      0 => 50734,
    ),
    'LocalizedCameraModel' =>
    array (
      0 => 50709,
    ),
    'Make' =>
    array (
      0 => 271,
    ),
    'MakerNoteSafety' =>
    array (
      0 => 50741,
    ),
    'MaxSampleValue' =>
    array (
      0 => 281,
    ),
    'MinSampleValue' =>
    array (
      0 => 280,
    ),
    'Model' =>
    array (
      0 => 272,
    ),
    'ModelTiePoint' =>
    array (
      0 => 33922,
    ),
    'ModelTransform' =>
    array (
      0 => 34264,
    ),
    'ModifyDate' =>
    array (
      0 => 306,
    ),
    'NewRawImageDigest' =>
    array (
      0 => 51111,
    ),
    'OldSubfileType' =>
    array (
      0 => 255,
    ),
    'Orientation' =>
    array (
      0 => 274,
    ),
    'OriginalBestQualitySize' =>
    array (
      0 => 51090,
    ),
    'OriginalDefaultCropSize' =>
    array (
      0 => 51091,
    ),
    'OriginalDefaultFinalSize' =>
    array (
      0 => 51089,
    ),
    'OriginalRawFileData' =>
    array (
      0 => 50828,
    ),
    'OriginalRawFileDigest' =>
    array (
      0 => 50973,
    ),
    'OriginalRawFileName' =>
    array (
      0 => 50827,
    ),
    'PageName' =>
    array (
      0 => 285,
    ),
    'PageNumber' =>
    array (
      0 => 297,
    ),
    'PanasonicTitle' =>
    array (
      0 => 50898,
    ),
    'PanasonicTitle2' =>
    array (
      0 => 50899,
    ),
    'PhotometricInterpretation' =>
    array (
      0 => 262,
    ),
    'PixelScale' =>
    array (
      0 => 33550,
    ),
    'PlanarConfiguration' =>
    array (
      0 => 284,
    ),
    'Predictor' =>
    array (
      0 => 317,
    ),
    'PreviewApplicationName' =>
    array (
      0 => 50966,
    ),
    'PreviewApplicationVersion' =>
    array (
      0 => 50967,
    ),
    'PreviewColorSpace' =>
    array (
      0 => 50970,
    ),
    'PreviewDateTime' =>
    array (
      0 => 50971,
    ),
    'PreviewImageLength' =>
    array (
      0 => 279,
      1 => 514,
    ),
    'PreviewImageStart' =>
    array (
      0 => 273,
      1 => 513,
    ),
    'PreviewSettingsDigest' =>
    array (
      0 => 50969,
    ),
    'PreviewSettingsName' =>
    array (
      0 => 50968,
    ),
    'PrimaryChromaticities' =>
    array (
      0 => 319,
    ),
    'PrintIM' =>
    array (
      0 => 50341,
    ),
    'ProcessingSoftware' =>
    array (
      0 => 11,
    ),
    'ProfileCalibrationSig' =>
    array (
      0 => 50932,
    ),
    'ProfileCopyright' =>
    array (
      0 => 50942,
    ),
    'ProfileDynamicRange' =>
    array (
      0 => 52551,
    ),
    'ProfileEmbedPolicy' =>
    array (
      0 => 50941,
    ),
    'ProfileGainTableMap2' =>
    array (
      0 => 52544,
    ),
    'ProfileGroupName' =>
    array (
      0 => 52552,
    ),
    'ProfileHueSatMapData1' =>
    array (
      0 => 50938,
    ),
    'ProfileHueSatMapData2' =>
    array (
      0 => 50939,
    ),
    'ProfileHueSatMapData3' =>
    array (
      0 => 52537,
    ),
    'ProfileHueSatMapDims' =>
    array (
      0 => 50937,
    ),
    'ProfileHueSatMapEncoding' =>
    array (
      0 => 51107,
    ),
    'ProfileLookTableData' =>
    array (
      0 => 50982,
    ),
    'ProfileLookTableDims' =>
    array (
      0 => 50981,
    ),
    'ProfileLookTableEncoding' =>
    array (
      0 => 51108,
    ),
    'ProfileName' =>
    array (
      0 => 50936,
    ),
    'ProfileToneCurve' =>
    array (
      0 => 50940,
    ),
    'RGBTables' =>
    array (
      0 => 52543,
    ),
    'Rating' =>
    array (
      0 => 18246,
    ),
    'RatingPercent' =>
    array (
      0 => 18249,
    ),
    'RawDataUniqueID' =>
    array (
      0 => 50781,
    ),
    'RawImageDigest' =>
    array (
      0 => 50972,
    ),
    'RawToPreviewGain' =>
    array (
      0 => 51112,
    ),
    'ReductionMatrix1' =>
    array (
      0 => 50725,
    ),
    'ReductionMatrix2' =>
    array (
      0 => 50726,
    ),
    'ReductionMatrix3' =>
    array (
      0 => 52538,
    ),
    'ReelName' =>
    array (
      0 => 51081,
    ),
    'ReferenceBlackWhite' =>
    array (
      0 => 532,
    ),
    'ResolutionUnit' =>
    array (
      0 => 296,
    ),
    'RowsPerStrip' =>
    array (
      0 => 278,
    ),
    'SEAL' =>
    array (
      0 => 52897,
    ),
    'SEMInfo' =>
    array (
      0 => 34118,
    ),
    'SRawType' =>
    array (
      0 => 50885,
    ),
    'SamplesPerPixel' =>
    array (
      0 => 277,
    ),
    'ShadowScale' =>
    array (
      0 => 50739,
    ),
    'Software' =>
    array (
      0 => 305,
    ),
    'SubfileType' =>
    array (
      0 => 254,
    ),
    'TStop' =>
    array (
      0 => 51058,
    ),
    'TargetPrinter' =>
    array (
      0 => 337,
    ),
    'Thresholding' =>
    array (
      0 => 263,
    ),
    'ThumbnailLength' =>
    array (
      0 => 514,
    ),
    'ThumbnailOffset' =>
    array (
      0 => 513,
    ),
    'TileLength' =>
    array (
      0 => 323,
    ),
    'TileWidth' =>
    array (
      0 => 322,
    ),
    'TimeCodes' =>
    array (
      0 => 51043,
    ),
    'TransferFunction' =>
    array (
      0 => 301,
    ),
    'UniqueCameraModel' =>
    array (
      0 => 50708,
    ),
    'WhitePoint' =>
    array (
      0 => 318,
    ),
    'XPAuthor' =>
    array (
      0 => 40093,
    ),
    'XPComment' =>
    array (
      0 => 40092,
    ),
    'XPKeywords' =>
    array (
      0 => 40094,
    ),
    'XPSubject' =>
    array (
      0 => 40095,
    ),
    'XPTitle' =>
    array (
      0 => 40091,
    ),
    'XPosition' =>
    array (
      0 => 286,
    ),
    'XResolution' =>
    array (
      0 => 282,
    ),
    'YCbCrCoefficients' =>
    array (
      0 => 529,
    ),
    'YCbCrPositioning' =>
    array (
      0 => 531,
    ),
    'YCbCrSubSampling' =>
    array (
      0 => 530,
    ),
    'YPosition' =>
    array (
      0 => 287,
    ),
    'YResolution' =>
    array (
      0 => 283,
    ),
  ),
  'itemsByPhpExifTag' =>
  array (
    'THUMBNAIL::ACDComment' =>
    array (
      0 => 11,
    ),
    'THUMBNAIL::Artist' =>
    array (
      0 => 315,
    ),
    'THUMBNAIL::Author' =>
    array (
      0 => 40093,
    ),
    'THUMBNAIL::BitsPerSample' =>
    array (
      0 => 258,
    ),
    'THUMBNAIL::Comments' =>
    array (
      0 => 40092,
    ),
    'THUMBNAIL::Compression' =>
    array (
      0 => 259,
    ),
    'THUMBNAIL::Copyright' =>
    array (
      0 => 33432,
    ),
    'THUMBNAIL::DateTime' =>
    array (
      0 => 306,
    ),
    'THUMBNAIL::DocumentName' =>
    array (
      0 => 269,
    ),
    'THUMBNAIL::ExtensibleMetadataPlatform' =>
    array (
      0 => 700,
    ),
    'THUMBNAIL::FillOrder' =>
    array (
      0 => 266,
    ),
    'THUMBNAIL::GrayResponseUnit' =>
    array (
      0 => 290,
    ),
    'THUMBNAIL::HalfToneHints' =>
    array (
      0 => 321,
    ),
    'THUMBNAIL::HostComputer' =>
    array (
      0 => 316,
    ),
    'THUMBNAIL::IPTC/NAA' =>
    array (
      0 => 33723,
    ),
    'THUMBNAIL::ImageDescription' =>
    array (
      0 => 270,
    ),
    'THUMBNAIL::ImageLength' =>
    array (
      0 => 257,
    ),
    'THUMBNAIL::ImageSourceData' =>
    array (
      0 => 37724,
    ),
    'THUMBNAIL::ImageWidth' =>
    array (
      0 => 256,
    ),
    'THUMBNAIL::InkSet' =>
    array (
      0 => 332,
    ),
    'THUMBNAIL::JPEGInterchangeFormat' =>
    array (
      0 => 513,
    ),
    'THUMBNAIL::JPEGInterchangeFormatLength' =>
    array (
      0 => 514,
    ),
    'THUMBNAIL::Keywords' =>
    array (
      0 => 40094,
    ),
    'THUMBNAIL::Make' =>
    array (
      0 => 271,
    ),
    'THUMBNAIL::MaxSampleValue' =>
    array (
      0 => 281,
    ),
    'THUMBNAIL::MinSampleValue' =>
    array (
      0 => 280,
    ),
    'THUMBNAIL::Model' =>
    array (
      0 => 272,
    ),
    'THUMBNAIL::NewSubFile' =>
    array (
      0 => 254,
    ),
    'THUMBNAIL::Orientation' =>
    array (
      0 => 274,
    ),
    'THUMBNAIL::PageName' =>
    array (
      0 => 285,
    ),
    'THUMBNAIL::PageNumber' =>
    array (
      0 => 297,
    ),
    'THUMBNAIL::PhotometricInterpretation' =>
    array (
      0 => 262,
    ),
    'THUMBNAIL::PlanarConfiguration' =>
    array (
      0 => 284,
    ),
    'THUMBNAIL::Predictor' =>
    array (
      0 => 317,
    ),
    'THUMBNAIL::PrimaryChromaticities' =>
    array (
      0 => 319,
    ),
    'THUMBNAIL::ReferenceBlackWhite' =>
    array (
      0 => 532,
    ),
    'THUMBNAIL::ResolutionUnit' =>
    array (
      0 => 296,
    ),
    'THUMBNAIL::RowsPerStrip' =>
    array (
      0 => 278,
    ),
    'THUMBNAIL::SamplesPerPixel' =>
    array (
      0 => 277,
    ),
    'THUMBNAIL::Software' =>
    array (
      0 => 305,
    ),
    'THUMBNAIL::StripByteCounts' =>
    array (
      0 => 279,
    ),
    'THUMBNAIL::StripOffsets' =>
    array (
      0 => 273,
    ),
    'THUMBNAIL::SubFile' =>
    array (
      0 => 255,
    ),
    'THUMBNAIL::SubIFD' =>
    array (
      0 => 330,
    ),
    'THUMBNAIL::Subject' =>
    array (
      0 => 40095,
    ),
    'THUMBNAIL::TargetPrinter' =>
    array (
      0 => 337,
    ),
    'THUMBNAIL::TileLength' =>
    array (
      0 => 323,
    ),
    'THUMBNAIL::TileWidth' =>
    array (
      0 => 322,
    ),
    'THUMBNAIL::Title' =>
    array (
      0 => 40091,
    ),
    'THUMBNAIL::TransferFunction' =>
    array (
      0 => 301,
    ),
    'THUMBNAIL::WhitePoint' =>
    array (
      0 => 318,
    ),
    'THUMBNAIL::XPosition' =>
    array (
      0 => 286,
    ),
    'THUMBNAIL::XResolution' =>
    array (
      0 => 282,
    ),
    'THUMBNAIL::YCbCrCoefficients' =>
    array (
      0 => 529,
    ),
    'THUMBNAIL::YCbCrPositioning' =>
    array (
      0 => 531,
    ),
    'THUMBNAIL::YCbCrSubSampling' =>
    array (
      0 => 530,
    ),
    'THUMBNAIL::YPosition' =>
    array (
      0 => 287,
    ),
    'THUMBNAIL::YResolution' =>
    array (
      0 => 283,
    ),
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'IFD1:A100DataOffset' =>
    array (
      0 => 330,
    ),
    'IFD1:AnalogBalance' =>
    array (
      0 => 50727,
    ),
    'IFD1:ApplicationNotes' =>
    array (
      0 => 700,
    ),
    'IFD1:Artist' =>
    array (
      0 => 315,
    ),
    'IFD1:AsShotICCProfile' =>
    array (
      0 => 50831,
    ),
    'IFD1:AsShotNeutral' =>
    array (
      0 => 50728,
    ),
    'IFD1:AsShotPreProfileMatrix' =>
    array (
      0 => 50832,
    ),
    'IFD1:AsShotProfileName' =>
    array (
      0 => 50934,
    ),
    'IFD1:AsShotWhiteXY' =>
    array (
      0 => 50729,
    ),
    'IFD1:BaselineExposure' =>
    array (
      0 => 50730,
    ),
    'IFD1:BaselineExposureOffset' =>
    array (
      0 => 51109,
    ),
    'IFD1:BaselineNoise' =>
    array (
      0 => 50731,
    ),
    'IFD1:BaselineSharpness' =>
    array (
      0 => 50732,
    ),
    'IFD1:BitsPerSample' =>
    array (
      0 => 258,
    ),
    'IFD1:CalibrationIlluminant1' =>
    array (
      0 => 50778,
    ),
    'IFD1:CalibrationIlluminant2' =>
    array (
      0 => 50779,
    ),
    'IFD1:CalibrationIlluminant3' =>
    array (
      0 => 52529,
    ),
    'IFD1:CameraCalibration1' =>
    array (
      0 => 50723,
    ),
    'IFD1:CameraCalibration2' =>
    array (
      0 => 50724,
    ),
    'IFD1:CameraCalibration3' =>
    array (
      0 => 52530,
    ),
    'IFD1:CameraCalibrationSig' =>
    array (
      0 => 50931,
    ),
    'IFD1:CameraLabel' =>
    array (
      0 => 51105,
    ),
    'IFD1:CameraSerialNumber' =>
    array (
      0 => 50735,
    ),
    'IFD1:CellLength' =>
    array (
      0 => 265,
    ),
    'IFD1:CellWidth' =>
    array (
      0 => 264,
    ),
    'IFD1:ColorMatrix1' =>
    array (
      0 => 50721,
    ),
    'IFD1:ColorMatrix2' =>
    array (
      0 => 50722,
    ),
    'IFD1:ColorMatrix3' =>
    array (
      0 => 52531,
    ),
    'IFD1:ColorimetricReference' =>
    array (
      0 => 50879,
    ),
    'IFD1:Compression' =>
    array (
      0 => 259,
    ),
    'IFD1:Copyright' =>
    array (
      0 => 33432,
    ),
    'IFD1:CurrentICCProfile' =>
    array (
      0 => 50833,
    ),
    'IFD1:CurrentPreProfileMatrix' =>
    array (
      0 => 50834,
    ),
    'IFD1:DNGAdobeData' =>
    array (
      0 => 50740,
    ),
    'IFD1:DNGBackwardVersion' =>
    array (
      0 => 50707,
    ),
    'IFD1:DNGLensInfo' =>
    array (
      0 => 50736,
    ),
    'IFD1:DNGPrivateData' =>
    array (
      0 => 50740,
    ),
    'IFD1:DNGVersion' =>
    array (
      0 => 50706,
    ),
    'IFD1:DefaultBlackRender' =>
    array (
      0 => 51110,
    ),
    'IFD1:DepthFar' =>
    array (
      0 => 51179,
    ),
    'IFD1:DepthFormat' =>
    array (
      0 => 51177,
    ),
    'IFD1:DepthMeasureType' =>
    array (
      0 => 51181,
    ),
    'IFD1:DepthNear' =>
    array (
      0 => 51178,
    ),
    'IFD1:DepthUnits' =>
    array (
      0 => 51180,
    ),
    'IFD1:DocumentName' =>
    array (
      0 => 269,
    ),
    'IFD1:EnhanceParams' =>
    array (
      0 => 51182,
    ),
    'IFD1:FillOrder' =>
    array (
      0 => 266,
    ),
    'IFD1:ForwardMatrix1' =>
    array (
      0 => 50964,
    ),
    'IFD1:ForwardMatrix2' =>
    array (
      0 => 50965,
    ),
    'IFD1:ForwardMatrix3' =>
    array (
      0 => 52532,
    ),
    'IFD1:FrameRate' =>
    array (
      0 => 51044,
    ),
    'IFD1:GDALMetadata' =>
    array (
      0 => 42112,
    ),
    'IFD1:GDALNoData' =>
    array (
      0 => 42113,
    ),
    'IFD1:GeoTiffAsciiParams' =>
    array (
      0 => 34737,
    ),
    'IFD1:GeoTiffDirectory' =>
    array (
      0 => 34735,
    ),
    'IFD1:GeoTiffDoubleParams' =>
    array (
      0 => 34736,
    ),
    'IFD1:GrayResponseUnit' =>
    array (
      0 => 290,
    ),
    'IFD1:HalftoneHints' =>
    array (
      0 => 321,
    ),
    'IFD1:HostComputer' =>
    array (
      0 => 316,
    ),
    'IFD1:IPTC-NAA' =>
    array (
      0 => 33723,
    ),
    'IFD1:IlluminantData1' =>
    array (
      0 => 52533,
    ),
    'IFD1:IlluminantData2' =>
    array (
      0 => 52534,
    ),
    'IFD1:IlluminantData3' =>
    array (
      0 => 52535,
    ),
    'IFD1:ImageDescription' =>
    array (
      0 => 270,
    ),
    'IFD1:ImageHeight' =>
    array (
      0 => 257,
    ),
    'IFD1:ImageSequenceInfo' =>
    array (
      0 => 52548,
    ),
    'IFD1:ImageSourceData' =>
    array (
      0 => 37724,
    ),
    'IFD1:ImageStats' =>
    array (
      0 => 52550,
    ),
    'IFD1:ImageWidth' =>
    array (
      0 => 256,
    ),
    'IFD1:InkSet' =>
    array (
      0 => 332,
    ),
    'IFD1:IntergraphMatrix' =>
    array (
      0 => 33920,
    ),
    'IFD1:JXLDecodeSpeed' =>
    array (
      0 => 52555,
    ),
    'IFD1:JXLDistance' =>
    array (
      0 => 52553,
    ),
    'IFD1:JXLEffort' =>
    array (
      0 => 52554,
    ),
    'IFD1:LinearResponseLimit' =>
    array (
      0 => 50734,
    ),
    'IFD1:LocalizedCameraModel' =>
    array (
      0 => 50709,
    ),
    'IFD1:Make' =>
    array (
      0 => 271,
    ),
    'IFD1:MakerNoteSafety' =>
    array (
      0 => 50741,
    ),
    'IFD1:MaxSampleValue' =>
    array (
      0 => 281,
    ),
    'IFD1:MinSampleValue' =>
    array (
      0 => 280,
    ),
    'IFD1:Model' =>
    array (
      0 => 272,
    ),
    'IFD1:ModelTiePoint' =>
    array (
      0 => 33922,
    ),
    'IFD1:ModelTransform' =>
    array (
      0 => 34264,
    ),
    'IFD1:ModifyDate' =>
    array (
      0 => 306,
    ),
    'IFD1:NewRawImageDigest' =>
    array (
      0 => 51111,
    ),
    'IFD1:OldSubfileType' =>
    array (
      0 => 255,
    ),
    'IFD1:Orientation' =>
    array (
      0 => 274,
    ),
    'IFD1:OriginalBestQualitySize' =>
    array (
      0 => 51090,
    ),
    'IFD1:OriginalDefaultCropSize' =>
    array (
      0 => 51091,
    ),
    'IFD1:OriginalDefaultFinalSize' =>
    array (
      0 => 51089,
    ),
    'IFD1:OriginalRawFileData' =>
    array (
      0 => 50828,
    ),
    'IFD1:OriginalRawFileDigest' =>
    array (
      0 => 50973,
    ),
    'IFD1:OriginalRawFileName' =>
    array (
      0 => 50827,
    ),
    'IFD1:PageName' =>
    array (
      0 => 285,
    ),
    'IFD1:PageNumber' =>
    array (
      0 => 297,
    ),
    'IFD1:PanasonicTitle' =>
    array (
      0 => 50898,
    ),
    'IFD1:PanasonicTitle2' =>
    array (
      0 => 50899,
    ),
    'IFD1:PhotometricInterpretation' =>
    array (
      0 => 262,
    ),
    'IFD1:PixelScale' =>
    array (
      0 => 33550,
    ),
    'IFD1:PlanarConfiguration' =>
    array (
      0 => 284,
    ),
    'IFD1:Predictor' =>
    array (
      0 => 317,
    ),
    'IFD1:PreviewApplicationName' =>
    array (
      0 => 50966,
    ),
    'IFD1:PreviewApplicationVersion' =>
    array (
      0 => 50967,
    ),
    'IFD1:PreviewColorSpace' =>
    array (
      0 => 50970,
    ),
    'IFD1:PreviewDateTime' =>
    array (
      0 => 50971,
    ),
    'IFD1:PreviewImageLength' =>
    array (
      0 => 279,
      1 => 514,
    ),
    'IFD1:PreviewImageStart' =>
    array (
      0 => 273,
      1 => 513,
    ),
    'IFD1:PreviewSettingsDigest' =>
    array (
      0 => 50969,
    ),
    'IFD1:PreviewSettingsName' =>
    array (
      0 => 50968,
    ),
    'IFD1:PrimaryChromaticities' =>
    array (
      0 => 319,
    ),
    'IFD1:ProcessingSoftware' =>
    array (
      0 => 11,
    ),
    'IFD1:ProfileCalibrationSig' =>
    array (
      0 => 50932,
    ),
    'IFD1:ProfileCopyright' =>
    array (
      0 => 50942,
    ),
    'IFD1:ProfileDynamicRange' =>
    array (
      0 => 52551,
    ),
    'IFD1:ProfileEmbedPolicy' =>
    array (
      0 => 50941,
    ),
    'IFD1:ProfileGainTableMap2' =>
    array (
      0 => 52544,
    ),
    'IFD1:ProfileGroupName' =>
    array (
      0 => 52552,
    ),
    'IFD1:ProfileHueSatMapData1' =>
    array (
      0 => 50938,
    ),
    'IFD1:ProfileHueSatMapData2' =>
    array (
      0 => 50939,
    ),
    'IFD1:ProfileHueSatMapData3' =>
    array (
      0 => 52537,
    ),
    'IFD1:ProfileHueSatMapDims' =>
    array (
      0 => 50937,
    ),
    'IFD1:ProfileHueSatMapEncoding' =>
    array (
      0 => 51107,
    ),
    'IFD1:ProfileLookTableData' =>
    array (
      0 => 50982,
    ),
    'IFD1:ProfileLookTableDims' =>
    array (
      0 => 50981,
    ),
    'IFD1:ProfileLookTableEncoding' =>
    array (
      0 => 51108,
    ),
    'IFD1:ProfileName' =>
    array (
      0 => 50936,
    ),
    'IFD1:ProfileToneCurve' =>
    array (
      0 => 50940,
    ),
    'IFD1:RGBTables' =>
    array (
      0 => 52543,
    ),
    'IFD1:Rating' =>
    array (
      0 => 18246,
    ),
    'IFD1:RatingPercent' =>
    array (
      0 => 18249,
    ),
    'IFD1:RawDataUniqueID' =>
    array (
      0 => 50781,
    ),
    'IFD1:RawImageDigest' =>
    array (
      0 => 50972,
    ),
    'IFD1:RawToPreviewGain' =>
    array (
      0 => 51112,
    ),
    'IFD1:ReductionMatrix1' =>
    array (
      0 => 50725,
    ),
    'IFD1:ReductionMatrix2' =>
    array (
      0 => 50726,
    ),
    'IFD1:ReductionMatrix3' =>
    array (
      0 => 52538,
    ),
    'IFD1:ReelName' =>
    array (
      0 => 51081,
    ),
    'IFD1:ReferenceBlackWhite' =>
    array (
      0 => 532,
    ),
    'IFD1:ResolutionUnit' =>
    array (
      0 => 296,
    ),
    'IFD1:RowsPerStrip' =>
    array (
      0 => 278,
    ),
    'IFD1:SEAL' =>
    array (
      0 => 52897,
    ),
    'IFD1:SEMInfo' =>
    array (
      0 => 34118,
    ),
    'IFD1:SRawType' =>
    array (
      0 => 50885,
    ),
    'IFD1:SamplesPerPixel' =>
    array (
      0 => 277,
    ),
    'IFD1:ShadowScale' =>
    array (
      0 => 50739,
    ),
    'IFD1:Software' =>
    array (
      0 => 305,
    ),
    'IFD1:SubfileType' =>
    array (
      0 => 254,
    ),
    'IFD1:TStop' =>
    array (
      0 => 51058,
    ),
    'IFD1:TargetPrinter' =>
    array (
      0 => 337,
    ),
    'IFD1:Thresholding' =>
    array (
      0 => 263,
    ),
    'IFD1:ThumbnailLength' =>
    array (
      0 => 514,
    ),
    'IFD1:ThumbnailOffset' =>
    array (
      0 => 513,
    ),
    'IFD1:TileLength' =>
    array (
      0 => 323,
    ),
    'IFD1:TileWidth' =>
    array (
      0 => 322,
    ),
    'IFD1:TimeCodes' =>
    array (
      0 => 51043,
    ),
    'IFD1:TransferFunction' =>
    array (
      0 => 301,
    ),
    'IFD1:UniqueCameraModel' =>
    array (
      0 => 50708,
    ),
    'IFD1:WhitePoint' =>
    array (
      0 => 318,
    ),
    'IFD1:XPAuthor' =>
    array (
      0 => 40093,
    ),
    'IFD1:XPComment' =>
    array (
      0 => 40092,
    ),
    'IFD1:XPKeywords' =>
    array (
      0 => 40094,
    ),
    'IFD1:XPSubject' =>
    array (
      0 => 40095,
    ),
    'IFD1:XPTitle' =>
    array (
      0 => 40091,
    ),
    'IFD1:XPosition' =>
    array (
      0 => 286,
    ),
    'IFD1:XResolution' =>
    array (
      0 => 282,
    ),
    'IFD1:YCbCrCoefficients' =>
    array (
      0 => 529,
    ),
    'IFD1:YCbCrPositioning' =>
    array (
      0 => 531,
    ),
    'IFD1:YCbCrSubSampling' =>
    array (
      0 => 530,
    ),
    'IFD1:YPosition' =>
    array (
      0 => 287,
    ),
    'IFD1:YResolution' =>
    array (
      0 => 283,
    ),
  ),
  'items' =>
  array (
    11 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProcessingSoftware',
        'title' => 'Processing Software',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::ACDComment',
        'exiftoolDOMNode' => 'IFD1:ProcessingSoftware',
      ),
    ),
    254 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SubfileType',
        'title' => 'Subfile Type',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Full-resolution image',
            1 => 'Reduced-resolution image',
            2 => 'Single page of multi-page image',
            3 => 'Single page of multi-page reduced-resolution image',
            4 => 'Transparency mask',
            5 => 'Transparency mask of reduced-resolution image',
            6 => 'Transparency mask of multi-page image',
            7 => 'Transparency mask of reduced-resolution multi-page image',
            8 => 'Depth map',
            9 => 'Depth map of reduced-resolution image',
            16 => 'Enhanced image data',
            65537 => 'Alternate reduced-resolution image',
            65540 => 'Semantic Mask',
            4294967295 => 'invalid',
            'Bit0' => 'Reduced resolution',
            'Bit1' => 'Single page',
            'Bit2' => 'Transparency mask',
            'Bit3' => 'TIFF/IT final page',
            'Bit4' => 'TIFF-FX mixed raster content',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::NewSubFile',
        'exiftoolDOMNode' => 'IFD1:SubfileType',
      ),
    ),
    255 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'OldSubfileType',
        'title' => 'Old Subfile Type',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Full-resolution image',
            2 => 'Reduced-resolution image',
            3 => 'Single page of multi-page image',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::SubFile',
        'exiftoolDOMNode' => 'IFD1:OldSubfileType',
      ),
    ),
    256 =>
    array (
      0 =>
      array (
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'ImageWidth',
        'title' => 'Image Width',
        'phpExifTag' => 'THUMBNAIL::ImageWidth',
        'exiftoolDOMNode' => 'IFD1:ImageWidth',
      ),
    ),
    257 =>
    array (
      0 =>
      array (
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'ImageHeight',
        'title' => 'Image Height',
        'phpExifTag' => 'THUMBNAIL::ImageLength',
        'exiftoolDOMNode' => 'IFD1:ImageHeight',
      ),
    ),
    258 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BitsPerSample',
        'title' => 'Bits Per Sample',
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::BitsPerSample',
        'exiftoolDOMNode' => 'IFD1:BitsPerSample',
      ),
    ),
    259 =>
    array (
      0 =>
      array (
        'components' => 1,
        'text' =>
        array (
          'default' => 'Unknown ({value})',
          'mapping' =>
          array (
            1 => 'Uncompressed',
            2 => 'CCITT 1D',
            3 => 'T4/Group 3 Fax',
            4 => 'T6/Group 4 Fax',
            5 => 'LZW',
            6 => 'JPEG (old-style)',
            7 => 'JPEG',
            8 => 'Adobe Deflate',
            9 => 'JBIG B&W',
            10 => 'JBIG Color',
            99 => 'JPEG',
            262 => 'Kodak 262',
            32766 => 'Next',
            32767 => 'Sony ARW Compressed',
            32769 => 'Packed RAW',
            32770 => 'Samsung SRW Compressed',
            32771 => 'CCIRLEW',
            32772 => 'Samsung SRW Compressed 2',
            32773 => 'PackBits',
            32809 => 'Thunderscan',
            32867 => 'Kodak KDC Compressed',
            32895 => 'IT8CTPAD',
            32896 => 'IT8LW',
            32897 => 'IT8MP',
            32898 => 'IT8BL',
            32908 => 'PixarFilm',
            32909 => 'PixarLog',
            32946 => 'Deflate',
            32947 => 'DCS',
            33003 => 'Aperio JPEG 2000 YCbCr',
            33005 => 'Aperio JPEG 2000 RGB',
            34661 => 'JBIG',
            34676 => 'SGILog',
            34677 => 'SGILog24',
            34712 => 'JPEG 2000',
            34713 => 'Nikon NEF Compressed',
            34715 => 'JBIG2 TIFF FX',
            34718 => 'Microsoft Document Imaging (MDI) Binary Level Codec',
            34719 => 'Microsoft Document Imaging (MDI) Progressive Transform Codec',
            34720 => 'Microsoft Document Imaging (MDI) Vector',
            34887 => 'ESRI Lerc',
            34892 => 'Lossy JPEG',
            34925 => 'LZMA2',
            34926 => 'Zstd',
            34927 => 'WebP',
            34933 => 'PNG',
            34934 => 'JPEG XR',
            52546 => 'JPEG XL',
            65000 => 'Kodak DCR Compressed',
            65535 => 'Pentax PEF Compressed',
          ),
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'Compression',
        'title' => 'Compression',
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::Compression',
        'exiftoolDOMNode' => 'IFD1:Compression',
      ),
    ),
    262 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'PhotometricInterpretation',
        'title' => 'Photometric Interpretation',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'WhiteIsZero',
            1 => 'BlackIsZero',
            2 => 'RGB',
            3 => 'RGB Palette',
            4 => 'Transparency Mask',
            5 => 'CMYK',
            6 => 'YCbCr',
            8 => 'CIELab',
            9 => 'ICCLab',
            10 => 'ITULab',
            32803 => 'Color Filter Array',
            32844 => 'Pixar LogL',
            32845 => 'Pixar LogLuv',
            32892 => 'Sequential Color Filter',
            34892 => 'Linear Raw',
            51177 => 'Depth Map',
            52527 => 'Semantic Mask',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::PhotometricInterpretation',
        'exiftoolDOMNode' => 'IFD1:PhotometricInterpretation',
      ),
    ),
    263 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'Thresholding',
        'title' => 'Thresholding',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'No dithering or halftoning',
            2 => 'Ordered dither or halftone',
            3 => 'Randomized dither',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:Thresholding',
      ),
    ),
    264 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CellWidth',
        'title' => 'Cell Width',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'IFD1:CellWidth',
      ),
    ),
    265 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CellLength',
        'title' => 'Cell Length',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'IFD1:CellLength',
      ),
    ),
    266 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FillOrder',
        'title' => 'Fill Order',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Normal',
            2 => 'Reversed',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::FillOrder',
        'exiftoolDOMNode' => 'IFD1:FillOrder',
      ),
    ),
    269 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DocumentName',
        'title' => 'Document Name',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::DocumentName',
        'exiftoolDOMNode' => 'IFD1:DocumentName',
      ),
    ),
    270 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ImageDescription',
        'title' => 'Image Description',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::ImageDescription',
        'exiftoolDOMNode' => 'IFD1:ImageDescription',
      ),
    ),
    271 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'Make',
        'title' => 'Make',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::Make',
        'exiftoolDOMNode' => 'IFD1:Make',
      ),
    ),
    272 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'Model',
        'title' => 'Camera Model Name',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::Model',
        'exiftoolDOMNode' => 'IFD1:Model',
      ),
    ),
    273 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageStart',
        'title' => 'Preview Image Start',
        'phpExifTag' => 'THUMBNAIL::StripOffsets',
        'exiftoolDOMNode' => 'IFD1:PreviewImageStart',
      ),
      1 =>
      array (
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageStart',
        'title' => 'Preview Image Start',
        'phpExifTag' => 'THUMBNAIL::StripOffsets',
        'exiftoolDOMNode' => 'IFD1:PreviewImageStart',
      ),
    ),
    274 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'Orientation',
        'title' => 'Orientation',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Horizontal (normal)',
            2 => 'Mirror horizontal',
            3 => 'Rotate 180',
            4 => 'Mirror vertical',
            5 => 'Mirror horizontal and rotate 270 CW',
            6 => 'Rotate 90 CW',
            7 => 'Mirror horizontal and rotate 90 CW',
            8 => 'Rotate 270 CW',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::Orientation',
        'exiftoolDOMNode' => 'IFD1:Orientation',
      ),
    ),
    277 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'SamplesPerPixel',
        'title' => 'Samples Per Pixel',
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::SamplesPerPixel',
        'exiftoolDOMNode' => 'IFD1:SamplesPerPixel',
      ),
    ),
    278 =>
    array (
      0 =>
      array (
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'RowsPerStrip',
        'title' => 'Rows Per Strip',
        'phpExifTag' => 'THUMBNAIL::RowsPerStrip',
        'exiftoolDOMNode' => 'IFD1:RowsPerStrip',
      ),
    ),
    279 =>
    array (
      0 =>
      array (
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageLength',
        'title' => 'Preview Image Length',
        'phpExifTag' => 'THUMBNAIL::StripByteCounts',
        'exiftoolDOMNode' => 'IFD1:PreviewImageLength',
      ),
      1 =>
      array (
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageLength',
        'title' => 'Preview Image Length',
        'phpExifTag' => 'THUMBNAIL::StripByteCounts',
        'exiftoolDOMNode' => 'IFD1:PreviewImageLength',
      ),
    ),
    280 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'MinSampleValue',
        'title' => 'Min Sample Value',
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::MinSampleValue',
        'exiftoolDOMNode' => 'IFD1:MinSampleValue',
      ),
    ),
    281 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'MaxSampleValue',
        'title' => 'Max Sample Value',
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::MaxSampleValue',
        'exiftoolDOMNode' => 'IFD1:MaxSampleValue',
      ),
    ),
    282 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'XResolution',
        'title' => 'X Resolution',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::XResolution',
        'exiftoolDOMNode' => 'IFD1:XResolution',
      ),
    ),
    283 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'YResolution',
        'title' => 'Y Resolution',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::YResolution',
        'exiftoolDOMNode' => 'IFD1:YResolution',
      ),
    ),
    284 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'PlanarConfiguration',
        'title' => 'Planar Configuration',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Chunky',
            2 => 'Planar',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::PlanarConfiguration',
        'exiftoolDOMNode' => 'IFD1:PlanarConfiguration',
      ),
    ),
    285 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PageName',
        'title' => 'Page Name',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::PageName',
        'exiftoolDOMNode' => 'IFD1:PageName',
      ),
    ),
    286 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'XPosition',
        'title' => 'X Position',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::XPosition',
        'exiftoolDOMNode' => 'IFD1:XPosition',
      ),
    ),
    287 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'YPosition',
        'title' => 'Y Position',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::YPosition',
        'exiftoolDOMNode' => 'IFD1:YPosition',
      ),
    ),
    290 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GrayResponseUnit',
        'title' => 'Gray Response Unit',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => '0.1',
            2 => '0.001',
            3 => '0.0001',
            4 => '1e-05',
            5 => '1e-06',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::GrayResponseUnit',
        'exiftoolDOMNode' => 'IFD1:GrayResponseUnit',
      ),
    ),
    296 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'ResolutionUnit',
        'title' => 'Resolution Unit',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'None',
            2 => 'inches',
            3 => 'cm',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::ResolutionUnit',
        'exiftoolDOMNode' => 'IFD1:ResolutionUnit',
      ),
    ),
    297 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PageNumber',
        'title' => 'Page Number',
        'components' => 2,
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::PageNumber',
        'exiftoolDOMNode' => 'IFD1:PageNumber',
      ),
    ),
    301 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'TransferFunction',
        'title' => 'Transfer Function',
        'components' => 768,
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::TransferFunction',
        'exiftoolDOMNode' => 'IFD1:TransferFunction',
      ),
    ),
    305 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'Software',
        'title' => 'Software',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::Software',
        'exiftoolDOMNode' => 'IFD1:Software',
      ),
    ),
    306 =>
    array (
      0 =>
      array (
        'components' => 20,
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\Time',
        'collection' => 'Tiff\\Tag',
        'name' => 'ModifyDate',
        'title' => 'Modify Date',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::DateTime',
        'exiftoolDOMNode' => 'IFD1:ModifyDate',
      ),
    ),
    315 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'Artist',
        'title' => 'Artist',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::Artist',
        'exiftoolDOMNode' => 'IFD1:Artist',
      ),
    ),
    316 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'HostComputer',
        'title' => 'Host Computer',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::HostComputer',
        'exiftoolDOMNode' => 'IFD1:HostComputer',
      ),
    ),
    317 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'Predictor',
        'title' => 'Predictor',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'None',
            2 => 'Horizontal differencing',
            3 => 'Floating point',
            34892 => 'Horizontal difference X2',
            34893 => 'Horizontal difference X4',
            34894 => 'Floating point X2',
            34895 => 'Floating point X4',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::Predictor',
        'exiftoolDOMNode' => 'IFD1:Predictor',
      ),
    ),
    318 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'WhitePoint',
        'title' => 'White Point',
        'components' => 2,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::WhitePoint',
        'exiftoolDOMNode' => 'IFD1:WhitePoint',
      ),
    ),
    319 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PrimaryChromaticities',
        'title' => 'Primary Chromaticities',
        'components' => 6,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::PrimaryChromaticities',
        'exiftoolDOMNode' => 'IFD1:PrimaryChromaticities',
      ),
    ),
    321 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'HalftoneHints',
        'title' => 'Halftone Hints',
        'components' => 2,
        'format' =>
        array (
          0 => 3,
        ),
        'phpExifTag' => 'THUMBNAIL::HalfToneHints',
        'exiftoolDOMNode' => 'IFD1:HalftoneHints',
      ),
    ),
    322 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'TileWidth',
        'title' => 'Tile Width',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::TileWidth',
        'exiftoolDOMNode' => 'IFD1:TileWidth',
      ),
    ),
    323 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'TileLength',
        'title' => 'Tile Length',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::TileLength',
        'exiftoolDOMNode' => 'IFD1:TileLength',
      ),
    ),
    330 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'A100DataOffset',
        'title' => 'A100 Data Offset',
        'format' =>
        array (
          0 => 7,
        ),
        'phpExifTag' => 'THUMBNAIL::SubIFD',
        'exiftoolDOMNode' => 'IFD1:A100DataOffset',
      ),
    ),
    332 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'InkSet',
        'title' => 'Ink Set',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'CMYK',
            2 => 'Not CMYK',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::InkSet',
        'exiftoolDOMNode' => 'IFD1:InkSet',
      ),
    ),
    337 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'TargetPrinter',
        'title' => 'Target Printer',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::TargetPrinter',
        'exiftoolDOMNode' => 'IFD1:TargetPrinter',
      ),
    ),
    513 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'ThumbnailOffset',
        'title' => 'Thumbnail Offset',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::JPEGInterchangeFormat',
        'exiftoolDOMNode' => 'IFD1:ThumbnailOffset',
      ),
      1 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'ThumbnailOffset',
        'title' => 'Thumbnail Offset',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::JPEGInterchangeFormat',
        'exiftoolDOMNode' => 'IFD1:ThumbnailOffset',
      ),
      2 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageStart',
        'title' => 'Preview Image Start',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::JPEGInterchangeFormat',
        'exiftoolDOMNode' => 'IFD1:PreviewImageStart',
      ),
    ),
    514 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'ThumbnailLength',
        'title' => 'Thumbnail Length',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::JPEGInterchangeFormatLength',
        'exiftoolDOMNode' => 'IFD1:ThumbnailLength',
      ),
      1 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'ThumbnailLength',
        'title' => 'Thumbnail Length',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::JPEGInterchangeFormatLength',
        'exiftoolDOMNode' => 'IFD1:ThumbnailLength',
      ),
      2 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewImageLength',
        'title' => 'Preview Image Length',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::JPEGInterchangeFormatLength',
        'exiftoolDOMNode' => 'IFD1:PreviewImageLength',
      ),
    ),
    529 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'YCbCrCoefficients',
        'title' => 'Y Cb Cr Coefficients',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::YCbCrCoefficients',
        'exiftoolDOMNode' => 'IFD1:YCbCrCoefficients',
      ),
    ),
    530 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\IfdYCbCrSubSampling',
        'collection' => 'Tiff\\Tag',
        'name' => 'YCbCrSubSampling',
        'title' => 'Y Cb Cr Sub Sampling',
        'components' => 2,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            '1 1' => 'YCbCr4:4:4 (1 1)',
            '1 2' => 'YCbCr4:4:0 (1 2)',
            '1 4' => 'YCbCr4:4:1 (1 4)',
            '2 1' => 'YCbCr4:2:2 (2 1)',
            '2 2' => 'YCbCr4:2:0 (2 2)',
            '2 4' => 'YCbCr4:2:1 (2 4)',
            '4 1' => 'YCbCr4:1:1 (4 1)',
            '4 2' => 'YCbCr4:1:0 (4 2)',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::YCbCrSubSampling',
        'exiftoolDOMNode' => 'IFD1:YCbCrSubSampling',
      ),
    ),
    531 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'YCbCrPositioning',
        'title' => 'Y Cb Cr Positioning',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Centered',
            2 => 'Co-sited',
          ),
        ),
        'phpExifTag' => 'THUMBNAIL::YCbCrPositioning',
        'exiftoolDOMNode' => 'IFD1:YCbCrPositioning',
      ),
    ),
    532 =>
    array (
      0 =>
      array (
        'components' => 6,
        'collection' => 'Tiff\\Tag',
        'name' => 'ReferenceBlackWhite',
        'title' => 'Reference Black White',
        'format' =>
        array (
          0 => 5,
        ),
        'phpExifTag' => 'THUMBNAIL::ReferenceBlackWhite',
        'exiftoolDOMNode' => 'IFD1:ReferenceBlackWhite',
      ),
    ),
    700 =>
    array (
      0 =>
      array (
        '__todo' => 'add ifd for XMP tags',
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\IfdApplicationNotes',
        'collection' => 'Tiff\\Tag',
        'name' => 'ApplicationNotes',
        'title' => 'Application Notes',
        'format' =>
        array (
          0 => 1,
        ),
        'phpExifTag' => 'THUMBNAIL::ExtensibleMetadataPlatform',
        'exiftoolDOMNode' => 'IFD1:ApplicationNotes',
      ),
    ),
    18246 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'Rating',
        'title' => 'Rating',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'IFD1:Rating',
      ),
    ),
    18249 =>
    array (
      0 =>
      array (
        'components' => 1,
        'collection' => 'Tiff\\Tag',
        'name' => 'RatingPercent',
        'title' => 'Rating Percent',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'IFD1:RatingPercent',
      ),
    ),
    33432 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\IfdCopyright',
        'collection' => 'Tiff\\Tag',
        'name' => 'Copyright',
        'title' => 'Copyright',
        'format' =>
        array (
          0 => 2,
        ),
        'phpExifTag' => 'THUMBNAIL::Copyright',
        'exiftoolDOMNode' => 'IFD1:Copyright',
      ),
    ),
    33550 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PixelScale',
        'title' => 'Pixel Scale',
        'components' => 3,
        'format' =>
        array (
          0 => 12,
        ),
        'exiftoolDOMNode' => 'IFD1:PixelScale',
      ),
    ),
    33723 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'IPTC-NAA',
        'title' => 'IPTC-NAA',
        'format' =>
        array (
          0 => 4,
        ),
        'phpExifTag' => 'THUMBNAIL::IPTC/NAA',
        'exiftoolDOMNode' => 'IFD1:IPTC-NAA',
      ),
    ),
    33920 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'IntergraphMatrix',
        'title' => 'Intergraph Matrix',
        'format' =>
        array (
          0 => 12,
        ),
        'exiftoolDOMNode' => 'IFD1:IntergraphMatrix',
      ),
    ),
    33922 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ModelTiePoint',
        'title' => 'Model Tie Point',
        'format' =>
        array (
          0 => 12,
        ),
        'exiftoolDOMNode' => 'IFD1:ModelTiePoint',
      ),
    ),
    34118 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SEMInfo',
        'title' => 'SEM Info',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:SEMInfo',
      ),
    ),
    34264 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ModelTransform',
        'title' => 'Model Transform',
        'components' => 16,
        'format' =>
        array (
          0 => 12,
        ),
        'exiftoolDOMNode' => 'IFD1:ModelTransform',
      ),
    ),
    34665 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\IfdExif',
        'name' => 'ExifIFD',
      ),
    ),
    34735 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GeoTiffDirectory',
        'title' => 'Geo Tiff Directory',
        'format' =>
        array (
          0 => 3,
        ),
        'exiftoolDOMNode' => 'IFD1:GeoTiffDirectory',
      ),
    ),
    34736 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GeoTiffDoubleParams',
        'title' => 'Geo Tiff Double Params',
        'format' =>
        array (
          0 => 12,
        ),
        'exiftoolDOMNode' => 'IFD1:GeoTiffDoubleParams',
      ),
    ),
    34737 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GeoTiffAsciiParams',
        'title' => 'Geo Tiff Ascii Params',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:GeoTiffAsciiParams',
      ),
    ),
    34853 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\IfdGps',
        'name' => 'GPS',
      ),
    ),
    37724 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ImageSourceData',
        'title' => 'Image Source Data',
        'format' =>
        array (
          0 => 7,
        ),
        'phpExifTag' => 'THUMBNAIL::ImageSourceData',
        'exiftoolDOMNode' => 'IFD1:ImageSourceData',
      ),
    ),
    40091 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
        'collection' => 'Tiff\\Tag',
        'name' => 'XPTitle',
        'title' => 'XP Title',
        'format' =>
        array (
          0 => 1,
        ),
        'phpExifTag' => 'THUMBNAIL::Title',
        'exiftoolDOMNode' => 'IFD1:XPTitle',
      ),
    ),
    40092 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
        'collection' => 'Tiff\\Tag',
        'name' => 'XPComment',
        'title' => 'XP Comment',
        'format' =>
        array (
          0 => 1,
        ),
        'phpExifTag' => 'THUMBNAIL::Comments',
        'exiftoolDOMNode' => 'IFD1:XPComment',
      ),
    ),
    40093 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
        'collection' => 'Tiff\\Tag',
        'name' => 'XPAuthor',
        'title' => 'XP Author',
        'format' =>
        array (
          0 => 1,
        ),
        'phpExifTag' => 'THUMBNAIL::Author',
        'exiftoolDOMNode' => 'IFD1:XPAuthor',
      ),
    ),
    40094 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
        'collection' => 'Tiff\\Tag',
        'name' => 'XPKeywords',
        'title' => 'XP Keywords',
        'format' =>
        array (
          0 => 1,
        ),
        'phpExifTag' => 'THUMBNAIL::Keywords',
        'exiftoolDOMNode' => 'IFD1:XPKeywords',
      ),
    ),
    40095 =>
    array (
      0 =>
      array (
        'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
        'collection' => 'Tiff\\Tag',
        'name' => 'XPSubject',
        'title' => 'XP Subject',
        'format' =>
        array (
          0 => 1,
        ),
        'phpExifTag' => 'THUMBNAIL::Subject',
        'exiftoolDOMNode' => 'IFD1:XPSubject',
      ),
    ),
    42112 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GDALMetadata',
        'title' => 'GDAL Metadata',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:GDALMetadata',
      ),
    ),
    42113 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'GDALNoData',
        'title' => 'GDAL No Data',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:GDALNoData',
      ),
    ),
    50341 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PrintIM',
        'title' => 'Print Image Matching',
        'format' =>
        array (
          0 => 7,
        ),
      ),
    ),
    50706 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DNGVersion',
        'title' => 'DNG Version',
        'components' => 4,
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:DNGVersion',
      ),
    ),
    50707 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DNGBackwardVersion',
        'title' => 'DNG Backward Version',
        'components' => 4,
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:DNGBackwardVersion',
      ),
    ),
    50708 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'UniqueCameraModel',
        'title' => 'Unique Camera Model',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:UniqueCameraModel',
      ),
    ),
    50709 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'LocalizedCameraModel',
        'title' => 'Localized Camera Model',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:LocalizedCameraModel',
      ),
    ),
    50721 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ColorMatrix1',
        'title' => 'Color Matrix 1',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ColorMatrix1',
      ),
    ),
    50722 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ColorMatrix2',
        'title' => 'Color Matrix 2',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ColorMatrix2',
      ),
    ),
    50723 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CameraCalibration1',
        'title' => 'Camera Calibration 1',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:CameraCalibration1',
      ),
    ),
    50724 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CameraCalibration2',
        'title' => 'Camera Calibration 2',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:CameraCalibration2',
      ),
    ),
    50725 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ReductionMatrix1',
        'title' => 'Reduction Matrix 1',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ReductionMatrix1',
      ),
    ),
    50726 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ReductionMatrix2',
        'title' => 'Reduction Matrix 2',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ReductionMatrix2',
      ),
    ),
    50727 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AnalogBalance',
        'title' => 'Analog Balance',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:AnalogBalance',
      ),
    ),
    50728 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AsShotNeutral',
        'title' => 'As Shot Neutral',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:AsShotNeutral',
      ),
    ),
    50729 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AsShotWhiteXY',
        'title' => 'As Shot White XY',
        'components' => 2,
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:AsShotWhiteXY',
      ),
    ),
    50730 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BaselineExposure',
        'title' => 'Baseline Exposure',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:BaselineExposure',
      ),
    ),
    50731 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BaselineNoise',
        'title' => 'Baseline Noise',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:BaselineNoise',
      ),
    ),
    50732 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BaselineSharpness',
        'title' => 'Baseline Sharpness',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:BaselineSharpness',
      ),
    ),
    50734 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'LinearResponseLimit',
        'title' => 'Linear Response Limit',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:LinearResponseLimit',
      ),
    ),
    50735 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CameraSerialNumber',
        'title' => 'Camera Serial Number',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:CameraSerialNumber',
      ),
    ),
    50736 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DNGLensInfo',
        'title' => 'DNG Lens Info',
        'components' => 4,
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:DNGLensInfo',
      ),
    ),
    50739 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ShadowScale',
        'title' => 'Shadow Scale',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:ShadowScale',
      ),
    ),
    50740 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DNGPrivateData',
        'title' => 'DNG Private Data',
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:DNGPrivateData',
      ),
      1 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DNGAdobeData',
        'title' => 'DNG Adobe Data',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:DNGAdobeData',
      ),
      2 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DNGPrivateData',
        'title' => 'DNG Private Data',
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:DNGPrivateData',
      ),
    ),
    50741 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'MakerNoteSafety',
        'title' => 'Maker Note Safety',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unsafe',
            1 => 'Safe',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:MakerNoteSafety',
      ),
    ),
    50778 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CalibrationIlluminant1',
        'title' => 'Calibration Illuminant 1',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unknown',
            1 => 'Daylight',
            2 => 'Fluorescent',
            3 => 'Tungsten (Incandescent)',
            4 => 'Flash',
            9 => 'Fine Weather',
            10 => 'Cloudy',
            11 => 'Shade',
            12 => 'Daylight Fluorescent',
            13 => 'Day White Fluorescent',
            14 => 'Cool White Fluorescent',
            15 => 'White Fluorescent',
            16 => 'Warm White Fluorescent',
            17 => 'Standard Light A',
            18 => 'Standard Light B',
            19 => 'Standard Light C',
            20 => 'D55',
            21 => 'D65',
            22 => 'D75',
            23 => 'D50',
            24 => 'ISO Studio Tungsten',
            255 => 'Other',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:CalibrationIlluminant1',
      ),
    ),
    50779 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CalibrationIlluminant2',
        'title' => 'Calibration Illuminant 2',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unknown',
            1 => 'Daylight',
            2 => 'Fluorescent',
            3 => 'Tungsten (Incandescent)',
            4 => 'Flash',
            9 => 'Fine Weather',
            10 => 'Cloudy',
            11 => 'Shade',
            12 => 'Daylight Fluorescent',
            13 => 'Day White Fluorescent',
            14 => 'Cool White Fluorescent',
            15 => 'White Fluorescent',
            16 => 'Warm White Fluorescent',
            17 => 'Standard Light A',
            18 => 'Standard Light B',
            19 => 'Standard Light C',
            20 => 'D55',
            21 => 'D65',
            22 => 'D75',
            23 => 'D50',
            24 => 'ISO Studio Tungsten',
            255 => 'Other',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:CalibrationIlluminant2',
      ),
    ),
    50781 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RawDataUniqueID',
        'title' => 'Raw Data Unique ID',
        'components' => 16,
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:RawDataUniqueID',
      ),
    ),
    50827 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'OriginalRawFileName',
        'title' => 'Original Raw File Name',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:OriginalRawFileName',
      ),
    ),
    50828 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'OriginalRawFileData',
        'title' => 'Original Raw File Data',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:OriginalRawFileData',
      ),
    ),
    50831 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AsShotICCProfile',
        'title' => 'As Shot ICC Profile',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:AsShotICCProfile',
      ),
    ),
    50832 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AsShotPreProfileMatrix',
        'title' => 'As Shot Pre Profile Matrix',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:AsShotPreProfileMatrix',
      ),
    ),
    50833 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CurrentICCProfile',
        'title' => 'Current ICC Profile',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:CurrentICCProfile',
      ),
    ),
    50834 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CurrentPreProfileMatrix',
        'title' => 'Current Pre Profile Matrix',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:CurrentPreProfileMatrix',
      ),
    ),
    50879 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ColorimetricReference',
        'title' => 'Colorimetric Reference',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Scene-referred',
            1 => 'Output-referred (ICC Profile Dynamic Range)',
            2 => 'Output-referred (High Dyanmic Range)',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:ColorimetricReference',
      ),
    ),
    50885 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SRawType',
        'title' => 'SRaw Type',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:SRawType',
      ),
    ),
    50898 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PanasonicTitle',
        'title' => 'Panasonic Title',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:PanasonicTitle',
      ),
    ),
    50899 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PanasonicTitle2',
        'title' => 'Panasonic Title 2',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:PanasonicTitle2',
      ),
    ),
    50931 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CameraCalibrationSig',
        'title' => 'Camera Calibration Sig',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:CameraCalibrationSig',
      ),
    ),
    50932 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileCalibrationSig',
        'title' => 'Profile Calibration Sig',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileCalibrationSig',
      ),
    ),
    50934 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'AsShotProfileName',
        'title' => 'As Shot Profile Name',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:AsShotProfileName',
      ),
    ),
    50936 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileName',
        'title' => 'Profile Name',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileName',
      ),
    ),
    50937 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileHueSatMapDims',
        'title' => 'Profile Hue Sat Map Dims',
        'components' => 3,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileHueSatMapDims',
      ),
    ),
    50938 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileHueSatMapData1',
        'title' => 'Profile Hue Sat Map Data 1',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileHueSatMapData1',
      ),
    ),
    50939 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileHueSatMapData2',
        'title' => 'Profile Hue Sat Map Data 2',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileHueSatMapData2',
      ),
    ),
    50940 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileToneCurve',
        'title' => 'Profile Tone Curve',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileToneCurve',
      ),
    ),
    50941 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileEmbedPolicy',
        'title' => 'Profile Embed Policy',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Allow Copying',
            1 => 'Embed if Used',
            2 => 'Never Embed',
            3 => 'No Restrictions',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileEmbedPolicy',
      ),
    ),
    50942 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileCopyright',
        'title' => 'Profile Copyright',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileCopyright',
      ),
    ),
    50964 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ForwardMatrix1',
        'title' => 'Forward Matrix 1',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ForwardMatrix1',
      ),
    ),
    50965 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ForwardMatrix2',
        'title' => 'Forward Matrix 2',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ForwardMatrix2',
      ),
    ),
    50966 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewApplicationName',
        'title' => 'Preview Application Name',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:PreviewApplicationName',
      ),
    ),
    50967 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewApplicationVersion',
        'title' => 'Preview Application Version',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:PreviewApplicationVersion',
      ),
    ),
    50968 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewSettingsName',
        'title' => 'Preview Settings Name',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:PreviewSettingsName',
      ),
    ),
    50969 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewSettingsDigest',
        'title' => 'Preview Settings Digest',
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:PreviewSettingsDigest',
      ),
    ),
    50970 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewColorSpace',
        'title' => 'Preview Color Space',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unknown',
            1 => 'Gray Gamma 2.2',
            2 => 'sRGB',
            3 => 'Adobe RGB',
            4 => 'ProPhoto RGB',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:PreviewColorSpace',
      ),
    ),
    50971 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'PreviewDateTime',
        'title' => 'Preview Date Time',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:PreviewDateTime',
      ),
    ),
    50972 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RawImageDigest',
        'title' => 'Raw Image Digest',
        'components' => 16,
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:RawImageDigest',
      ),
    ),
    50973 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'OriginalRawFileDigest',
        'title' => 'Original Raw File Digest',
        'components' => 16,
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:OriginalRawFileDigest',
      ),
    ),
    50981 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileLookTableDims',
        'title' => 'Profile Look Table Dims',
        'components' => 3,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileLookTableDims',
      ),
    ),
    50982 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileLookTableData',
        'title' => 'Profile Look Table Data',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileLookTableData',
      ),
    ),
    51043 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'TimeCodes',
        'title' => 'Time Codes',
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:TimeCodes',
      ),
    ),
    51044 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'FrameRate',
        'title' => 'Frame Rate',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:FrameRate',
      ),
    ),
    51058 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'TStop',
        'title' => 'T Stop',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:TStop',
      ),
    ),
    51081 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ReelName',
        'title' => 'Reel Name',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:ReelName',
      ),
    ),
    51089 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'OriginalDefaultFinalSize',
        'title' => 'Original Default Final Size',
        'components' => 2,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'IFD1:OriginalDefaultFinalSize',
      ),
    ),
    51090 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'OriginalBestQualitySize',
        'title' => 'Original Best Quality Size',
        'components' => 2,
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'IFD1:OriginalBestQualitySize',
      ),
    ),
    51091 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'OriginalDefaultCropSize',
        'title' => 'Original Default Crop Size',
        'components' => 2,
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:OriginalDefaultCropSize',
      ),
    ),
    51105 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CameraLabel',
        'title' => 'Camera Label',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:CameraLabel',
      ),
    ),
    51107 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileHueSatMapEncoding',
        'title' => 'Profile Hue Sat Map Encoding',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Linear',
            1 => 'sRGB',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileHueSatMapEncoding',
      ),
    ),
    51108 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileLookTableEncoding',
        'title' => 'Profile Look Table Encoding',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Linear',
            1 => 'sRGB',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileLookTableEncoding',
      ),
    ),
    51109 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'BaselineExposureOffset',
        'title' => 'Baseline Exposure Offset',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:BaselineExposureOffset',
      ),
    ),
    51110 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DefaultBlackRender',
        'title' => 'Default Black Render',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Auto',
            1 => 'None',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:DefaultBlackRender',
      ),
    ),
    51111 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'NewRawImageDigest',
        'title' => 'New Raw Image Digest',
        'components' => 16,
        'format' =>
        array (
          0 => 1,
        ),
        'exiftoolDOMNode' => 'IFD1:NewRawImageDigest',
      ),
    ),
    51112 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RawToPreviewGain',
        'title' => 'Raw To Preview Gain',
        'format' =>
        array (
          0 => 12,
        ),
        'exiftoolDOMNode' => 'IFD1:RawToPreviewGain',
      ),
    ),
    51177 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DepthFormat',
        'title' => 'Depth Format',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unknown',
            1 => 'Linear',
            2 => 'Inverse',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:DepthFormat',
      ),
    ),
    51178 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DepthNear',
        'title' => 'Depth Near',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:DepthNear',
      ),
    ),
    51179 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DepthFar',
        'title' => 'Depth Far',
        'format' =>
        array (
          0 => 5,
        ),
        'exiftoolDOMNode' => 'IFD1:DepthFar',
      ),
    ),
    51180 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DepthUnits',
        'title' => 'Depth Units',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unknown',
            1 => 'Meters',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:DepthUnits',
      ),
    ),
    51181 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'DepthMeasureType',
        'title' => 'Depth Measure Type',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unknown',
            1 => 'Optical Axis',
            2 => 'Optical Ray',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:DepthMeasureType',
      ),
    ),
    51182 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'EnhanceParams',
        'title' => 'Enhance Params',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:EnhanceParams',
      ),
    ),
    52529 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CalibrationIlluminant3',
        'title' => 'Calibration Illuminant 3',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Unknown',
            1 => 'Daylight',
            2 => 'Fluorescent',
            3 => 'Tungsten (Incandescent)',
            4 => 'Flash',
            9 => 'Fine Weather',
            10 => 'Cloudy',
            11 => 'Shade',
            12 => 'Daylight Fluorescent',
            13 => 'Day White Fluorescent',
            14 => 'Cool White Fluorescent',
            15 => 'White Fluorescent',
            16 => 'Warm White Fluorescent',
            17 => 'Standard Light A',
            18 => 'Standard Light B',
            19 => 'Standard Light C',
            20 => 'D55',
            21 => 'D65',
            22 => 'D75',
            23 => 'D50',
            24 => 'ISO Studio Tungsten',
            255 => 'Other',
          ),
        ),
        'exiftoolDOMNode' => 'IFD1:CalibrationIlluminant3',
      ),
    ),
    52530 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'CameraCalibration3',
        'title' => 'Camera Calibration 3',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:CameraCalibration3',
      ),
    ),
    52531 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ColorMatrix3',
        'title' => 'Color Matrix 3',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ColorMatrix3',
      ),
    ),
    52532 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ForwardMatrix3',
        'title' => 'Forward Matrix 3',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ForwardMatrix3',
      ),
    ),
    52533 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'IlluminantData1',
        'title' => 'Illuminant Data 1',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:IlluminantData1',
      ),
    ),
    52534 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'IlluminantData2',
        'title' => 'Illuminant Data 2',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:IlluminantData2',
      ),
    ),
    52535 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'IlluminantData3',
        'title' => 'Illuminant Data 3',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:IlluminantData3',
      ),
    ),
    52537 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileHueSatMapData3',
        'title' => 'Profile Hue Sat Map Data 3',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileHueSatMapData3',
      ),
    ),
    52538 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ReductionMatrix3',
        'title' => 'Reduction Matrix 3',
        'format' =>
        array (
          0 => 10,
        ),
        'exiftoolDOMNode' => 'IFD1:ReductionMatrix3',
      ),
    ),
    52543 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'RGBTables',
        'title' => 'RGB Tables',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:RGBTables',
      ),
    ),
    52544 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileGainTableMap2',
        'title' => 'Profile Gain Table Map 2',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileGainTableMap2',
      ),
    ),
    52548 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ImageSequenceInfo',
        'title' => 'Image Sequence Info',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:ImageSequenceInfo',
      ),
    ),
    52550 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ImageStats',
        'title' => 'Image Stats',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:ImageStats',
      ),
    ),
    52551 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileDynamicRange',
        'title' => 'Profile Dynamic Range',
        'format' =>
        array (
          0 => 7,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileDynamicRange',
      ),
    ),
    52552 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'ProfileGroupName',
        'title' => 'Profile Group Name',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:ProfileGroupName',
      ),
    ),
    52553 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'JXLDistance',
        'title' => 'JXL Distance',
        'format' =>
        array (
          0 => 11,
        ),
        'exiftoolDOMNode' => 'IFD1:JXLDistance',
      ),
    ),
    52554 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'JXLEffort',
        'title' => 'JXL Effort',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'IFD1:JXLEffort',
      ),
    ),
    52555 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'JXLDecodeSpeed',
        'title' => 'JXL Decode Speed',
        'format' =>
        array (
          0 => 4,
        ),
        'exiftoolDOMNode' => 'IFD1:JXLDecodeSpeed',
      ),
    ),
    52897 =>
    array (
      0 =>
      array (
        'collection' => 'Tiff\\Tag',
        'name' => 'SEAL',
        'title' => 'SEAL',
        'format' =>
        array (
          0 => 2,
        ),
        'exiftoolDOMNode' => 'IFD1:SEAL',
      ),
    ),
  ),
);
}
