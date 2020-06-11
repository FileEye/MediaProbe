<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Ifd;

use FileEye\MediaProbe\Collection;

class Any extends Collection {

  protected static $map = array (
  'title' => 'A catchall generic IFD definition, used as a fallback to describe tags that are not expected in a specific IFD.',
  'class' => 'FileEye\\MediaProbe\\Block\\Ifd',
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'A100DataOffset' => 330,
    'Acceleration' => 37892,
    'ActiveArea' => 50829,
    'AdventRevision' => 33590,
    'AdventScale' => 33589,
    'AffineTransformMat' => 32956,
    'AliasLayerMetadata' => 50784,
    'AlphaByteCount' => 48323,
    'AlphaDataDiscard' => 48325,
    'AlphaOffset' => 48322,
    'AmbientTemperature' => 37888,
    'AnalogBalance' => 50727,
    'Annotations' => 50255,
    'AntiAliasStrength' => 50738,
    'ApertureValue' => 37378,
    'ApplicationNotes' => 700,
    'Artist' => 315,
    'AsShotICCProfile' => 50831,
    'AsShotNeutral' => 50728,
    'AsShotPreProfileMatrix' => 50832,
    'AsShotProfileName' => 50934,
    'AsShotWhiteXY' => 50729,
    'BackgroundColorIndicator' => 34024,
    'BackgroundColorValue' => 34026,
    'BadFaxLines' => 326,
    'BaselineExposure' => 50730,
    'BaselineExposureOffset' => 51109,
    'BaselineNoise' => 50731,
    'BaselineSharpness' => 50732,
    'BatteryLevel' => 33423,
    'BayerGreenSplit' => 50733,
    'BestQualityScale' => 50780,
    'BitsPerExtendedRunLength' => 34021,
    'BitsPerRunLength' => 34020,
    'BitsPerSample' => 258,
    'BlackLevel' => 50714,
    'BlackLevelDeltaH' => 50715,
    'BlackLevelDeltaV' => 50716,
    'BlackLevelRepeatDim' => 50713,
    'Brightness' => 65107,
    'BrightnessValue' => 37379,
    'CFALayout' => 50711,
    'CFAPattern' => 41730,
    'CFAPattern2' => 33422,
    'CFAPlaneColor' => 50710,
    'CFARepeatPatternDim' => 33421,
    'CIP3DataFile' => 37434,
    'CIP3Sheet' => 37435,
    'CIP3Side' => 37436,
    'CMYKEquivalent' => 34032,
    'CR2CFAPattern' => 50656,
    'CacheVersion' => 51114,
    'CalibrationIlluminant1' => 50778,
    'CalibrationIlluminant2' => 50779,
    'CameraCalibration1' => 50723,
    'CameraCalibration2' => 50724,
    'CameraCalibrationSig' => 50931,
    'CameraElevationAngle' => 37893,
    'CameraLabel' => 51105,
    'CameraSerialNumber' => 50735,
    'CellLength' => 265,
    'CellWidth' => 264,
    'ChromaBlurRadius' => 50737,
    'ChromaticAberrationCorrParams' => 28725,
    'ChromaticAberrationCorrection' => 28724,
    'CleanFaxData' => 327,
    'ClipPath' => 343,
    'CodingMethods' => 403,
    'ColorCharacterization' => 34029,
    'ColorMap' => 320,
    'ColorMatrix1' => 50721,
    'ColorMatrix2' => 50722,
    'ColorResponseUnit' => 300,
    'ColorSequence' => 34017,
    'ColorSpace' => 40961,
    'ColorTable' => 34022,
    'ColorimetricReference' => 50879,
    'ComponentsConfiguration' => 37121,
    'CompressedBitsPerPixel' => 37122,
    'Compression' => 259,
    'ConsecutiveBadFaxLines' => 328,
    'Contrast' => 65108,
    'Converter' => 65101,
    'Copyright' => 33432,
    'CreateDate' => 36868,
    'CurrentICCProfile' => 50833,
    'CurrentPreProfileMatrix' => 50834,
    'CustomRendered' => 41985,
    'DNGAdobeData' => 50740,
    'DNGBackwardVersion' => 50707,
    'DNGLensInfo' => 50736,
    'DNGVersion' => 50706,
    'DataType' => 32996,
    'DateTimeOriginal' => 36867,
    'Decode' => 433,
    'DefaultBlackRender' => 51110,
    'DefaultCropOrigin' => 50719,
    'DefaultCropSize' => 50720,
    'DefaultImageColor' => 434,
    'DefaultScale' => 50718,
    'DefaultUserCrop' => 51125,
    'DeviceSettingDescription' => 41995,
    'DigitalZoomRatio' => 41988,
    'DistortionCorrParams' => 28727,
    'DistortionCorrection' => 28726,
    'DocumentName' => 269,
    'DotRange' => 336,
    'ExifImageHeight' => 40963,
    'ExifImageWidth' => 40962,
    'ExifVersion' => 36864,
    'ExpandFilm' => 44994,
    'ExpandFilterLens' => 44995,
    'ExpandFlashLamp' => 44997,
    'ExpandLens' => 44993,
    'ExpandScanner' => 44996,
    'ExpandSoftware' => 44992,
    'Exposure' => 65105,
    'ExposureCompensation' => 37380,
    'ExposureIndex' => 41493,
    'ExposureMode' => 41986,
    'ExposureProgram' => 34850,
    'ExposureTime' => 33434,
    'ExtraSamples' => 338,
    'FNumber' => 33437,
    'FaxProfile' => 402,
    'FaxRecvParams' => 34908,
    'FaxRecvTime' => 34910,
    'FaxSubAddress' => 34909,
    'FedexEDR' => 34929,
    'FileSource' => 41728,
    'FillOrder' => 266,
    'Flash' => 37385,
    'FlashEnergy' => 41483,
    'FlashpixVersion' => 40960,
    'FocalLength' => 37386,
    'FocalLengthIn35mmFormat' => 41989,
    'FocalPlaneResolutionUnit' => 41488,
    'FocalPlaneXResolution' => 41486,
    'FocalPlaneYResolution' => 41487,
    'ForwardMatrix1' => 50964,
    'ForwardMatrix2' => 50965,
    'FovCot' => 33304,
    'FrameRate' => 51044,
    'FreeByteCounts' => 289,
    'FreeOffsets' => 288,
    'GDALMetadata' => 42112,
    'GDALNoData' => 42113,
    'GainControl' => 41991,
    'Gamma' => 42240,
    'GeoTiffAsciiParams' => 34737,
    'GeoTiffDirectory' => 34735,
    'GeoTiffDoubleParams' => 34736,
    'GooglePlusUploadCode' => 36873,
    'GrayResponseCurve' => 291,
    'GrayResponseUnit' => 290,
    'HCUsage' => 34030,
    'HalftoneHints' => 321,
    'HeightResolution' => 48259,
    'HostComputer' => 316,
    'Humidity' => 37889,
    'INGRReserved' => 33921,
    'IPTC-NAA' => 33723,
    'ISO' => 34855,
    'ISOSpeed' => 34867,
    'ISOSpeedLatitudeyyy' => 34868,
    'ISOSpeedLatitudezzz' => 34869,
    'IT8Header' => 34018,
    'ImageByteCount' => 48321,
    'ImageColorIndicator' => 34023,
    'ImageColorValue' => 34025,
    'ImageDataDiscard' => 48324,
    'ImageDepth' => 32997,
    'ImageDescription' => 270,
    'ImageFullHeight' => 33301,
    'ImageFullWidth' => 33300,
    'ImageHeight' => 48257,
    'ImageHistory' => 41491,
    'ImageID' => 32781,
    'ImageLayer' => 34732,
    'ImageNumber' => 41489,
    'ImageOffset' => 48320,
    'ImageReferencePoints' => 32953,
    'ImageSourceData' => 37724,
    'ImageType' => 48132,
    'ImageUniqueID' => 42016,
    'ImageWidth' => 48256,
    'Indexed' => 346,
    'InkNames' => 333,
    'InkSet' => 332,
    'IntergraphFlagRegisters' => 33919,
    'IntergraphMatrix' => 33920,
    'IntergraphPacketData' => 33918,
    'Interlace' => 34857,
    'InteropIndex' => 1,
    'InteropVersion' => 2,
    'JBIGOptions' => 34750,
    'JPEGACTables' => 521,
    'JPEGDCTables' => 520,
    'JPEGLosslessPredictors' => 517,
    'JPEGPointTransforms' => 518,
    'JPEGProc' => 512,
    'JPEGQTables' => 519,
    'JPEGRestartInterval' => 515,
    'JPEGTables' => 437,
    'JPLCartoIFD' => 34263,
    'Lens' => 65002,
    'LensInfo' => 42034,
    'LensMake' => 42035,
    'LensModel' => 42036,
    'LensSerialNumber' => 42037,
    'LightSource' => 37384,
    'LinearResponseLimit' => 50734,
    'LinearizationTable' => 50712,
    'LocalizedCameraModel' => 50709,
    'MDColorTable' => 33447,
    'MDFileTag' => 33445,
    'MDFileUnits' => 33452,
    'MDLabName' => 33448,
    'MDPrepDate' => 33450,
    'MDPrepTime' => 33451,
    'MDSampleInfo' => 33449,
    'MDScalePixel' => 33446,
    'MSDocumentText' => 37679,
    'MSDocumentTextPosition' => 37681,
    'MSPropertySetStorage' => 37680,
    'Make' => 271,
    'MakerNoteApple' => 37500,
    'MakerNoteSafety' => 50741,
    'MaskedAreas' => 50830,
    'MatrixWorldToCamera' => 33306,
    'MatrixWorldToScreen' => 33305,
    'Matteing' => 32995,
    'MaxApertureValue' => 37381,
    'MaxSampleValue' => 281,
    'MeteringMode' => 37383,
    'MinSampleValue' => 280,
    'ModeNumber' => 405,
    'Model' => 272,
    'Model2' => 33405,
    'ModelTiePoint' => 33922,
    'ModelTransform' => 34264,
    'ModifyDate' => 306,
    'MoireFilter' => 65112,
    'MultiProfiles' => 34688,
    'NewRawImageDigest' => 51111,
    'Noise' => 41485,
    'NoiseProfile' => 51041,
    'NoiseReductionApplied' => 50935,
    'NumberofInks' => 334,
    'OPIProxy' => 351,
    'OceApplicationSelector' => 50216,
    'OceIDNumber' => 50217,
    'OceImageLogic' => 50218,
    'OceScanjobDesc' => 50215,
    'OffsetSchema' => 59933,
    'OffsetTime' => 36880,
    'OffsetTimeDigitized' => 36882,
    'OffsetTimeOriginal' => 36881,
    'OldSubfileType' => 255,
    'OpcodeList1' => 51008,
    'OpcodeList2' => 51009,
    'OpcodeList3' => 51022,
    'Opto-ElectricConvFactor' => 34856,
    'Orientation' => 274,
    'OriginalBestQualitySize' => 51090,
    'OriginalDefaultCropSize' => 51091,
    'OriginalDefaultFinalSize' => 51089,
    'OriginalFileName' => 50547,
    'OriginalRawFileData' => 50828,
    'OriginalRawFileDigest' => 50973,
    'OriginalRawFileName' => 50827,
    'OwnerName' => 65000,
    'Padding' => 59932,
    'PageName' => 285,
    'PageNumber' => 297,
    'PanasonicTitle' => 50898,
    'PanasonicTitle2' => 50899,
    'PhotometricInterpretation' => 262,
    'PixelFormat' => 48129,
    'PixelIntensityRange' => 34027,
    'PixelMagicJBIGOptions' => 34232,
    'PixelScale' => 33550,
    'PlanarConfiguration' => 284,
    'Predictor' => 317,
    'Pressure' => 37890,
    'PreviewApplicationName' => 50966,
    'PreviewApplicationVersion' => 50967,
    'PreviewColorSpace' => 50970,
    'PreviewDateTime' => 50971,
    'PreviewSettingsDigest' => 50969,
    'PreviewSettingsName' => 50968,
    'PrimaryChromaticities' => 319,
    'PrintIM' => 50341,
    'ProcessingSoftware' => 11,
    'ProfileCalibrationSig' => 50932,
    'ProfileCopyright' => 50942,
    'ProfileEmbedPolicy' => 50941,
    'ProfileHueSatMapData1' => 50938,
    'ProfileHueSatMapData2' => 50939,
    'ProfileHueSatMapDims' => 50937,
    'ProfileHueSatMapEncoding' => 51107,
    'ProfileLookTableData' => 50982,
    'ProfileLookTableDims' => 50981,
    'ProfileLookTableEncoding' => 51108,
    'ProfileName' => 50936,
    'ProfileToneCurve' => 50940,
    'ProfileType' => 401,
    'RasterPadding' => 34019,
    'Rating' => 18246,
    'RatingPercent' => 18249,
    'RawDataUniqueID' => 50781,
    'RawFile' => 65100,
    'RawImageDigest' => 50972,
    'RawImageSegmentation' => 50752,
    'RawToPreviewGain' => 51112,
    'RecommendedExposureIndex' => 34866,
    'ReductionMatrix1' => 50725,
    'ReductionMatrix2' => 50726,
    'ReelName' => 51081,
    'ReferenceBlackWhite' => 532,
    'RegionXformTackPoint' => 32954,
    'RelatedImageFileFormat' => 4096,
    'RelatedImageHeight' => 4098,
    'RelatedImageWidth' => 4097,
    'RelatedSoundFile' => 40964,
    'ResolutionUnit' => 296,
    'RowInterleaveFactor' => 50975,
    'RowsPerStrip' => 278,
    'SEMInfo' => 34118,
    'SMaxSampleValue' => 341,
    'SMinSampleValue' => 340,
    'SRawType' => 50885,
    'SampleFormat' => 339,
    'SamplesPerPixel' => 277,
    'SamsungRawByteOrder' => 41217,
    'SamsungRawPointersLength' => 40977,
    'SamsungRawPointersOffset' => 40976,
    'SamsungRawUnknown' => 41218,
    'Saturation' => 65109,
    'SceneCaptureType' => 41990,
    'SceneType' => 41729,
    'SecurityClassification' => 41490,
    'SelfTimerMode' => 34859,
    'SensingMethod' => 41495,
    'SensitivityType' => 34864,
    'SerialNumber' => 65001,
    'ShadowScale' => 50739,
    'Shadows' => 65106,
    'SharedData' => 34689,
    'Sharpness' => 65110,
    'ShutterSpeedValue' => 37377,
    'Site' => 34016,
    'Smoothness' => 65111,
    'Software' => 305,
    'SonyRawFileType' => 28672,
    'SonyToneCurve' => 28688,
    'SpatialFrequencyResponse' => 41484,
    'SpectralSensitivity' => 34852,
    'StandardOutputSensitivity' => 34865,
    'StoNits' => 37439,
    'StripByteCounts' => 279,
    'StripOffsets' => 273,
    'StripRowCounts' => 559,
    'SubSecTime' => 37520,
    'SubSecTimeDigitized' => 37522,
    'SubSecTimeOriginal' => 37521,
    'SubTileBlockSize' => 50974,
    'SubfileType' => 254,
    'SubjectArea' => 37396,
    'SubjectDistance' => 37382,
    'SubjectDistanceRange' => 41996,
    'SubjectLocation' => 41492,
    'T4Options' => 292,
    'T6Options' => 293,
    'T82Options' => 435,
    'T88Options' => 34690,
    'TIFF-EPStandardID' => 41494,
    'TIFF_FXExtensions' => 34687,
    'TStop' => 51058,
    'TargetPrinter' => 337,
    'TextureFormat' => 33302,
    'Thresholding' => 263,
    'ThumbnailLength' => 514,
    'ThumbnailOffset' => 513,
    'TileByteCounts' => 325,
    'TileDepth' => 32998,
    'TileLength' => 323,
    'TileOffsets' => 324,
    'TileWidth' => 322,
    'TimeCodes' => 51043,
    'TimeZoneOffset' => 34858,
    'TransferFunction' => 301,
    'TransferRange' => 342,
    'Transformation' => 48130,
    'TransparencyIndicator' => 34028,
    'TrapIndicator' => 34031,
    'UIC1Tag' => 33628,
    'UIC2Tag' => 33629,
    'UIC3Tag' => 33630,
    'UIC4Tag' => 33631,
    'USPTOMiscellaneous' => 999,
    'USPTOOriginalContentType' => 50560,
    'Uncompressed' => 48131,
    'UniqueCameraModel' => 50708,
    'UserComment' => 37510,
    'VersionYear' => 404,
    'VignettingCorrParams' => 28722,
    'VignettingCorrection' => 28721,
    'WB_GRGBLevels' => 34306,
    'WangAnnotation' => 32932,
    'WangTag1' => 32931,
    'WangTag3' => 32933,
    'WangTag4' => 32934,
    'WarpQuadrilateral' => 32955,
    'WaterDepth' => 37891,
    'WhiteBalance' => 65102,
    'WhiteLevel' => 50717,
    'WhitePoint' => 318,
    'WidthResolution' => 48258,
    'WrapModes' => 33303,
    'XClipPathUnits' => 344,
    'XPAuthor' => 40093,
    'XPComment' => 40092,
    'XPKeywords' => 40094,
    'XPSubject' => 40095,
    'XPTitle' => 40091,
    'XP_DIP_XML' => 18247,
    'XPosition' => 286,
    'XResolution' => 282,
    'YCbCrCoefficients' => 529,
    'YCbCrPositioning' => 531,
    'YCbCrSubSampling' => 530,
    'YClipPathUnits' => 345,
    'YPosition' => 287,
    'YResolution' => 283,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'ExifIFD:Acceleration' => 37892,
    'ExifIFD:AdventRevision' => 33590,
    'ExifIFD:AdventScale' => 33589,
    'ExifIFD:AffineTransformMat' => 32956,
    'ExifIFD:AliasLayerMetadata' => 50784,
    'ExifIFD:AlphaByteCount' => 48323,
    'ExifIFD:AlphaDataDiscard' => 48325,
    'ExifIFD:AlphaOffset' => 48322,
    'ExifIFD:AmbientTemperature' => 37888,
    'ExifIFD:Annotations' => 50255,
    'ExifIFD:ApertureValue' => 37378,
    'ExifIFD:BackgroundColorIndicator' => 34024,
    'ExifIFD:BackgroundColorValue' => 34026,
    'ExifIFD:BadFaxLines' => 326,
    'ExifIFD:BatteryLevel' => 33423,
    'ExifIFD:BitsPerExtendedRunLength' => 34021,
    'ExifIFD:BitsPerRunLength' => 34020,
    'ExifIFD:Brightness' => 65107,
    'ExifIFD:BrightnessValue' => 37379,
    'ExifIFD:CFAPattern' => 41730,
    'ExifIFD:CIP3DataFile' => 37434,
    'ExifIFD:CIP3Sheet' => 37435,
    'ExifIFD:CIP3Side' => 37436,
    'ExifIFD:CMYKEquivalent' => 34032,
    'ExifIFD:CR2CFAPattern' => 50656,
    'ExifIFD:CameraElevationAngle' => 37893,
    'ExifIFD:CleanFaxData' => 327,
    'ExifIFD:ClipPath' => 343,
    'ExifIFD:CodingMethods' => 403,
    'ExifIFD:ColorCharacterization' => 34029,
    'ExifIFD:ColorMap' => 320,
    'ExifIFD:ColorResponseUnit' => 300,
    'ExifIFD:ColorSequence' => 34017,
    'ExifIFD:ColorSpace' => 40961,
    'ExifIFD:ColorTable' => 34022,
    'ExifIFD:ComponentsConfiguration' => 37121,
    'ExifIFD:CompressedBitsPerPixel' => 37122,
    'ExifIFD:ConsecutiveBadFaxLines' => 328,
    'ExifIFD:Contrast' => 65108,
    'ExifIFD:Converter' => 65101,
    'ExifIFD:CreateDate' => 36868,
    'ExifIFD:CustomRendered' => 41985,
    'ExifIFD:DataType' => 32996,
    'ExifIFD:DateTimeOriginal' => 36867,
    'ExifIFD:Decode' => 433,
    'ExifIFD:DefaultImageColor' => 434,
    'ExifIFD:DeviceSettingDescription' => 41995,
    'ExifIFD:DigitalZoomRatio' => 41988,
    'ExifIFD:DotRange' => 336,
    'ExifIFD:ExifImageHeight' => 40963,
    'ExifIFD:ExifImageWidth' => 40962,
    'ExifIFD:ExifVersion' => 36864,
    'ExifIFD:ExpandFilm' => 44994,
    'ExifIFD:ExpandFilterLens' => 44995,
    'ExifIFD:ExpandFlashLamp' => 44997,
    'ExifIFD:ExpandLens' => 44993,
    'ExifIFD:ExpandScanner' => 44996,
    'ExifIFD:ExpandSoftware' => 44992,
    'ExifIFD:Exposure' => 65105,
    'ExifIFD:ExposureCompensation' => 37380,
    'ExifIFD:ExposureIndex' => 41493,
    'ExifIFD:ExposureMode' => 41986,
    'ExifIFD:ExposureProgram' => 34850,
    'ExifIFD:ExposureTime' => 33434,
    'ExifIFD:ExtraSamples' => 338,
    'ExifIFD:FNumber' => 33437,
    'ExifIFD:FaxProfile' => 402,
    'ExifIFD:FaxRecvParams' => 34908,
    'ExifIFD:FaxRecvTime' => 34910,
    'ExifIFD:FaxSubAddress' => 34909,
    'ExifIFD:FedexEDR' => 34929,
    'ExifIFD:FileSource' => 41728,
    'ExifIFD:Flash' => 37385,
    'ExifIFD:FlashEnergy' => 41483,
    'ExifIFD:FlashpixVersion' => 40960,
    'ExifIFD:FocalLength' => 37386,
    'ExifIFD:FocalLengthIn35mmFormat' => 41989,
    'ExifIFD:FocalPlaneResolutionUnit' => 41488,
    'ExifIFD:FocalPlaneXResolution' => 41486,
    'ExifIFD:FocalPlaneYResolution' => 41487,
    'ExifIFD:FovCot' => 33304,
    'ExifIFD:FreeByteCounts' => 289,
    'ExifIFD:FreeOffsets' => 288,
    'ExifIFD:GDALMetadata' => 42112,
    'ExifIFD:GDALNoData' => 42113,
    'ExifIFD:GainControl' => 41991,
    'ExifIFD:Gamma' => 42240,
    'ExifIFD:GooglePlusUploadCode' => 36873,
    'ExifIFD:GrayResponseCurve' => 291,
    'ExifIFD:HCUsage' => 34030,
    'ExifIFD:HeightResolution' => 48259,
    'ExifIFD:Humidity' => 37889,
    'ExifIFD:INGRReserved' => 33921,
    'ExifIFD:ISO' => 34855,
    'ExifIFD:ISOSpeed' => 34867,
    'ExifIFD:ISOSpeedLatitudeyyy' => 34868,
    'ExifIFD:ISOSpeedLatitudezzz' => 34869,
    'ExifIFD:IT8Header' => 34018,
    'ExifIFD:ImageByteCount' => 48321,
    'ExifIFD:ImageColorIndicator' => 34023,
    'ExifIFD:ImageColorValue' => 34025,
    'ExifIFD:ImageDataDiscard' => 48324,
    'ExifIFD:ImageDepth' => 32997,
    'ExifIFD:ImageFullHeight' => 33301,
    'ExifIFD:ImageFullWidth' => 33300,
    'ExifIFD:ImageHeight' => 48257,
    'ExifIFD:ImageHistory' => 41491,
    'ExifIFD:ImageID' => 32781,
    'ExifIFD:ImageLayer' => 34732,
    'ExifIFD:ImageNumber' => 41489,
    'ExifIFD:ImageOffset' => 48320,
    'ExifIFD:ImageReferencePoints' => 32953,
    'ExifIFD:ImageType' => 48132,
    'ExifIFD:ImageUniqueID' => 42016,
    'ExifIFD:ImageWidth' => 48256,
    'ExifIFD:Indexed' => 346,
    'ExifIFD:InkNames' => 333,
    'ExifIFD:IntergraphFlagRegisters' => 33919,
    'ExifIFD:IntergraphMatrix' => 33920,
    'ExifIFD:IntergraphPacketData' => 33918,
    'ExifIFD:Interlace' => 34857,
    'ExifIFD:JBIGOptions' => 34750,
    'ExifIFD:JPEGACTables' => 521,
    'ExifIFD:JPEGDCTables' => 520,
    'ExifIFD:JPEGLosslessPredictors' => 517,
    'ExifIFD:JPEGPointTransforms' => 518,
    'ExifIFD:JPEGProc' => 512,
    'ExifIFD:JPEGQTables' => 519,
    'ExifIFD:JPEGRestartInterval' => 515,
    'ExifIFD:JPEGTables' => 437,
    'ExifIFD:JPLCartoIFD' => 34263,
    'ExifIFD:Lens' => 65002,
    'ExifIFD:LensInfo' => 42034,
    'ExifIFD:LensMake' => 42035,
    'ExifIFD:LensModel' => 42036,
    'ExifIFD:LensSerialNumber' => 42037,
    'ExifIFD:LightSource' => 37384,
    'ExifIFD:MDColorTable' => 33447,
    'ExifIFD:MDFileTag' => 33445,
    'ExifIFD:MDFileUnits' => 33452,
    'ExifIFD:MDLabName' => 33448,
    'ExifIFD:MDPrepDate' => 33450,
    'ExifIFD:MDPrepTime' => 33451,
    'ExifIFD:MDSampleInfo' => 33449,
    'ExifIFD:MDScalePixel' => 33446,
    'ExifIFD:MSDocumentText' => 37679,
    'ExifIFD:MSDocumentTextPosition' => 37681,
    'ExifIFD:MSPropertySetStorage' => 37680,
    'ExifIFD:MakerNoteApple' => 37500,
    'ExifIFD:MatrixWorldToCamera' => 33306,
    'ExifIFD:MatrixWorldToScreen' => 33305,
    'ExifIFD:Matteing' => 32995,
    'ExifIFD:MaxApertureValue' => 37381,
    'ExifIFD:MeteringMode' => 37383,
    'ExifIFD:ModeNumber' => 405,
    'ExifIFD:Model2' => 33405,
    'ExifIFD:ModelTiePoint' => 33922,
    'ExifIFD:ModelTransform' => 34264,
    'ExifIFD:MoireFilter' => 65112,
    'ExifIFD:MultiProfiles' => 34688,
    'ExifIFD:Noise' => 41485,
    'ExifIFD:NumberofInks' => 334,
    'ExifIFD:OPIProxy' => 351,
    'ExifIFD:OceApplicationSelector' => 50216,
    'ExifIFD:OceIDNumber' => 50217,
    'ExifIFD:OceImageLogic' => 50218,
    'ExifIFD:OceScanjobDesc' => 50215,
    'ExifIFD:OffsetSchema' => 59933,
    'ExifIFD:OffsetTime' => 36880,
    'ExifIFD:OffsetTimeDigitized' => 36882,
    'ExifIFD:OffsetTimeOriginal' => 36881,
    'ExifIFD:Opto-ElectricConvFactor' => 34856,
    'ExifIFD:OriginalFileName' => 50547,
    'ExifIFD:OwnerName' => 65000,
    'ExifIFD:Padding' => 59932,
    'ExifIFD:PixelFormat' => 48129,
    'ExifIFD:PixelIntensityRange' => 34027,
    'ExifIFD:PixelMagicJBIGOptions' => 34232,
    'ExifIFD:PixelScale' => 33550,
    'ExifIFD:Pressure' => 37890,
    'ExifIFD:ProfileType' => 401,
    'ExifIFD:RasterPadding' => 34019,
    'ExifIFD:RawFile' => 65100,
    'ExifIFD:RawImageSegmentation' => 50752,
    'ExifIFD:RecommendedExposureIndex' => 34866,
    'ExifIFD:RegionXformTackPoint' => 32954,
    'ExifIFD:RelatedSoundFile' => 40964,
    'ExifIFD:RowInterleaveFactor' => 50975,
    'ExifIFD:SMaxSampleValue' => 341,
    'ExifIFD:SMinSampleValue' => 340,
    'ExifIFD:SamsungRawByteOrder' => 41217,
    'ExifIFD:SamsungRawPointersLength' => 40977,
    'ExifIFD:SamsungRawPointersOffset' => 40976,
    'ExifIFD:SamsungRawUnknown' => 41218,
    'ExifIFD:Saturation' => 65109,
    'ExifIFD:SceneCaptureType' => 41990,
    'ExifIFD:SceneType' => 41729,
    'ExifIFD:SecurityClassification' => 41490,
    'ExifIFD:SelfTimerMode' => 34859,
    'ExifIFD:SensingMethod' => 41495,
    'ExifIFD:SensitivityType' => 34864,
    'ExifIFD:SerialNumber' => 65001,
    'ExifIFD:Shadows' => 65106,
    'ExifIFD:SharedData' => 34689,
    'ExifIFD:Sharpness' => 65110,
    'ExifIFD:ShutterSpeedValue' => 37377,
    'ExifIFD:Site' => 34016,
    'ExifIFD:Smoothness' => 65111,
    'ExifIFD:SonyRawFileType' => 28672,
    'ExifIFD:SonyToneCurve' => 28688,
    'ExifIFD:SpatialFrequencyResponse' => 41484,
    'ExifIFD:SpectralSensitivity' => 34852,
    'ExifIFD:StandardOutputSensitivity' => 34865,
    'ExifIFD:StoNits' => 37439,
    'ExifIFD:StripByteCounts' => 279,
    'ExifIFD:StripOffsets' => 273,
    'ExifIFD:StripRowCounts' => 559,
    'ExifIFD:SubSecTime' => 37520,
    'ExifIFD:SubSecTimeDigitized' => 37522,
    'ExifIFD:SubSecTimeOriginal' => 37521,
    'ExifIFD:SubTileBlockSize' => 50974,
    'ExifIFD:SubjectArea' => 37396,
    'ExifIFD:SubjectDistance' => 37382,
    'ExifIFD:SubjectDistanceRange' => 41996,
    'ExifIFD:SubjectLocation' => 41492,
    'ExifIFD:T4Options' => 292,
    'ExifIFD:T6Options' => 293,
    'ExifIFD:T82Options' => 435,
    'ExifIFD:T88Options' => 34690,
    'ExifIFD:TIFF-EPStandardID' => 41494,
    'ExifIFD:TIFF_FXExtensions' => 34687,
    'ExifIFD:TextureFormat' => 33302,
    'ExifIFD:TileByteCounts' => 325,
    'ExifIFD:TileDepth' => 32998,
    'ExifIFD:TileOffsets' => 324,
    'ExifIFD:TimeZoneOffset' => 34858,
    'ExifIFD:TransferRange' => 342,
    'ExifIFD:Transformation' => 48130,
    'ExifIFD:TransparencyIndicator' => 34028,
    'ExifIFD:TrapIndicator' => 34031,
    'ExifIFD:UIC1Tag' => 33628,
    'ExifIFD:UIC2Tag' => 33629,
    'ExifIFD:UIC3Tag' => 33630,
    'ExifIFD:UIC4Tag' => 33631,
    'ExifIFD:USPTOMiscellaneous' => 999,
    'ExifIFD:USPTOOriginalContentType' => 50560,
    'ExifIFD:Uncompressed' => 48131,
    'ExifIFD:UserComment' => 37510,
    'ExifIFD:VersionYear' => 404,
    'ExifIFD:WB_GRGBLevels' => 34306,
    'ExifIFD:WangAnnotation' => 32932,
    'ExifIFD:WangTag1' => 32931,
    'ExifIFD:WangTag3' => 32933,
    'ExifIFD:WangTag4' => 32934,
    'ExifIFD:WarpQuadrilateral' => 32955,
    'ExifIFD:WaterDepth' => 37891,
    'ExifIFD:WhiteBalance' => 65102,
    'ExifIFD:WidthResolution' => 48258,
    'ExifIFD:WrapModes' => 33303,
    'ExifIFD:XClipPathUnits' => 344,
    'ExifIFD:XP_DIP_XML' => 18247,
    'ExifIFD:YClipPathUnits' => 345,
    'IFD0:A100DataOffset' => 330,
    'IFD0:AnalogBalance' => 50727,
    'IFD0:ApplicationNotes' => 700,
    'IFD0:Artist' => 315,
    'IFD0:AsShotICCProfile' => 50831,
    'IFD0:AsShotNeutral' => 50728,
    'IFD0:AsShotPreProfileMatrix' => 50832,
    'IFD0:AsShotProfileName' => 50934,
    'IFD0:AsShotWhiteXY' => 50729,
    'IFD0:BaselineExposure' => 50730,
    'IFD0:BaselineExposureOffset' => 51109,
    'IFD0:BaselineNoise' => 50731,
    'IFD0:BaselineSharpness' => 50732,
    'IFD0:BitsPerSample' => 258,
    'IFD0:CalibrationIlluminant1' => 50778,
    'IFD0:CalibrationIlluminant2' => 50779,
    'IFD0:CameraCalibration1' => 50723,
    'IFD0:CameraCalibration2' => 50724,
    'IFD0:CameraCalibrationSig' => 50931,
    'IFD0:CameraLabel' => 51105,
    'IFD0:CameraSerialNumber' => 50735,
    'IFD0:CellLength' => 265,
    'IFD0:CellWidth' => 264,
    'IFD0:ColorMatrix1' => 50721,
    'IFD0:ColorMatrix2' => 50722,
    'IFD0:ColorimetricReference' => 50879,
    'IFD0:Compression' => 259,
    'IFD0:Copyright' => 33432,
    'IFD0:CurrentICCProfile' => 50833,
    'IFD0:CurrentPreProfileMatrix' => 50834,
    'IFD0:DNGAdobeData' => 50740,
    'IFD0:DNGBackwardVersion' => 50707,
    'IFD0:DNGLensInfo' => 50736,
    'IFD0:DNGVersion' => 50706,
    'IFD0:DefaultBlackRender' => 51110,
    'IFD0:DocumentName' => 269,
    'IFD0:FillOrder' => 266,
    'IFD0:ForwardMatrix1' => 50964,
    'IFD0:ForwardMatrix2' => 50965,
    'IFD0:FrameRate' => 51044,
    'IFD0:GeoTiffAsciiParams' => 34737,
    'IFD0:GeoTiffDirectory' => 34735,
    'IFD0:GeoTiffDoubleParams' => 34736,
    'IFD0:GrayResponseUnit' => 290,
    'IFD0:HalftoneHints' => 321,
    'IFD0:HostComputer' => 316,
    'IFD0:IPTC-NAA' => 33723,
    'IFD0:ImageDescription' => 270,
    'IFD0:ImageHeight' => 257,
    'IFD0:ImageSourceData' => 37724,
    'IFD0:ImageWidth' => 256,
    'IFD0:InkSet' => 332,
    'IFD0:LinearResponseLimit' => 50734,
    'IFD0:LocalizedCameraModel' => 50709,
    'IFD0:Make' => 271,
    'IFD0:MakerNoteSafety' => 50741,
    'IFD0:MaxSampleValue' => 281,
    'IFD0:MinSampleValue' => 280,
    'IFD0:Model' => 272,
    'IFD0:ModifyDate' => 306,
    'IFD0:NewRawImageDigest' => 51111,
    'IFD0:OldSubfileType' => 255,
    'IFD0:Orientation' => 274,
    'IFD0:OriginalBestQualitySize' => 51090,
    'IFD0:OriginalDefaultCropSize' => 51091,
    'IFD0:OriginalDefaultFinalSize' => 51089,
    'IFD0:OriginalRawFileData' => 50828,
    'IFD0:OriginalRawFileDigest' => 50973,
    'IFD0:OriginalRawFileName' => 50827,
    'IFD0:PageName' => 285,
    'IFD0:PageNumber' => 297,
    'IFD0:PanasonicTitle' => 50898,
    'IFD0:PanasonicTitle2' => 50899,
    'IFD0:PhotometricInterpretation' => 262,
    'IFD0:PlanarConfiguration' => 284,
    'IFD0:Predictor' => 317,
    'IFD0:PreviewApplicationName' => 50966,
    'IFD0:PreviewApplicationVersion' => 50967,
    'IFD0:PreviewColorSpace' => 50970,
    'IFD0:PreviewDateTime' => 50971,
    'IFD0:PreviewSettingsDigest' => 50969,
    'IFD0:PreviewSettingsName' => 50968,
    'IFD0:PrimaryChromaticities' => 319,
    'IFD0:PrintIM' => 50341,
    'IFD0:ProcessingSoftware' => 11,
    'IFD0:ProfileCalibrationSig' => 50932,
    'IFD0:ProfileCopyright' => 50942,
    'IFD0:ProfileEmbedPolicy' => 50941,
    'IFD0:ProfileHueSatMapData1' => 50938,
    'IFD0:ProfileHueSatMapData2' => 50939,
    'IFD0:ProfileHueSatMapDims' => 50937,
    'IFD0:ProfileHueSatMapEncoding' => 51107,
    'IFD0:ProfileLookTableData' => 50982,
    'IFD0:ProfileLookTableDims' => 50981,
    'IFD0:ProfileLookTableEncoding' => 51108,
    'IFD0:ProfileName' => 50936,
    'IFD0:ProfileToneCurve' => 50940,
    'IFD0:Rating' => 18246,
    'IFD0:RatingPercent' => 18249,
    'IFD0:RawDataUniqueID' => 50781,
    'IFD0:RawImageDigest' => 50972,
    'IFD0:RawToPreviewGain' => 51112,
    'IFD0:ReductionMatrix1' => 50725,
    'IFD0:ReductionMatrix2' => 50726,
    'IFD0:ReelName' => 51081,
    'IFD0:ReferenceBlackWhite' => 532,
    'IFD0:ResolutionUnit' => 296,
    'IFD0:RowsPerStrip' => 278,
    'IFD0:SEMInfo' => 34118,
    'IFD0:SRawType' => 50885,
    'IFD0:SamplesPerPixel' => 277,
    'IFD0:ShadowScale' => 50739,
    'IFD0:Software' => 305,
    'IFD0:SubfileType' => 254,
    'IFD0:TStop' => 51058,
    'IFD0:TargetPrinter' => 337,
    'IFD0:Thresholding' => 263,
    'IFD0:TileLength' => 323,
    'IFD0:TileWidth' => 322,
    'IFD0:TimeCodes' => 51043,
    'IFD0:TransferFunction' => 301,
    'IFD0:UniqueCameraModel' => 50708,
    'IFD0:WhitePoint' => 318,
    'IFD0:XPAuthor' => 40093,
    'IFD0:XPComment' => 40092,
    'IFD0:XPKeywords' => 40094,
    'IFD0:XPSubject' => 40095,
    'IFD0:XPTitle' => 40091,
    'IFD0:XPosition' => 286,
    'IFD0:XResolution' => 282,
    'IFD0:YCbCrCoefficients' => 529,
    'IFD0:YCbCrPositioning' => 531,
    'IFD0:YCbCrSubSampling' => 530,
    'IFD0:YPosition' => 287,
    'IFD0:YResolution' => 283,
    'IFD1:ThumbnailLength' => 514,
    'IFD1:ThumbnailOffset' => 513,
    'InteropIFD:InteropIndex' => 1,
    'InteropIFD:InteropVersion' => 2,
    'InteropIFD:RelatedImageFileFormat' => 4096,
    'InteropIFD:RelatedImageHeight' => 4098,
    'InteropIFD:RelatedImageWidth' => 4097,
    'SubIFD2:CacheVersion' => 51114,
    'SubIFD:ActiveArea' => 50829,
    'SubIFD:AntiAliasStrength' => 50738,
    'SubIFD:BayerGreenSplit' => 50733,
    'SubIFD:BestQualityScale' => 50780,
    'SubIFD:BlackLevel' => 50714,
    'SubIFD:BlackLevelDeltaH' => 50715,
    'SubIFD:BlackLevelDeltaV' => 50716,
    'SubIFD:BlackLevelRepeatDim' => 50713,
    'SubIFD:CFALayout' => 50711,
    'SubIFD:CFAPattern2' => 33422,
    'SubIFD:CFAPlaneColor' => 50710,
    'SubIFD:CFARepeatPatternDim' => 33421,
    'SubIFD:ChromaBlurRadius' => 50737,
    'SubIFD:ChromaticAberrationCorrParams' => 28725,
    'SubIFD:ChromaticAberrationCorrection' => 28724,
    'SubIFD:DefaultCropOrigin' => 50719,
    'SubIFD:DefaultCropSize' => 50720,
    'SubIFD:DefaultScale' => 50718,
    'SubIFD:DefaultUserCrop' => 51125,
    'SubIFD:DistortionCorrParams' => 28727,
    'SubIFD:DistortionCorrection' => 28726,
    'SubIFD:LinearizationTable' => 50712,
    'SubIFD:MaskedAreas' => 50830,
    'SubIFD:NoiseProfile' => 51041,
    'SubIFD:NoiseReductionApplied' => 50935,
    'SubIFD:OpcodeList1' => 51008,
    'SubIFD:OpcodeList2' => 51009,
    'SubIFD:OpcodeList3' => 51022,
    'SubIFD:SampleFormat' => 339,
    'SubIFD:VignettingCorrParams' => 28722,
    'SubIFD:VignettingCorrection' => 28721,
    'SubIFD:WhiteLevel' => 50717,
  ),
  'items' =>
  array (
    1 =>
    array (
      'collection' => 'Tag',
      'name' => 'InteropIndex',
      'title' => 'Interoperability Index',
      'format' =>
      array (
        0 => 2,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          'R03' => 'R03 - DCF option file (Adobe RGB)',
          'R98' => 'R98 - DCF basic file (sRGB)',
          'THM' => 'THM - DCF thumbnail file',
        ),
      ),
      'exiftoolDOMNode' => 'InteropIFD:InteropIndex',
    ),
    2 =>
    array (
      'collection' => 'Tag',
      'name' => 'InteropVersion',
      'title' => 'Interoperability Version',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'InteropIFD:InteropVersion',
    ),
    11 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProcessingSoftware',
      'title' => 'Processing Software',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'ACDComment',
      'exiftoolDOMNode' => 'IFD0:ProcessingSoftware',
    ),
    254 =>
    array (
      'collection' => 'Tag',
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
          0 => 'Full-resolution Image',
          1 => 'Reduced-resolution image',
          2 => 'Single page of multi-page image',
          3 => 'Single page of multi-page reduced-resolution image',
          4 => 'Transparency mask',
          5 => 'Transparency mask of reduced-resolution image',
          6 => 'Transparency mask of multi-page image',
          7 => 'Transparency mask of reduced-resolution multi-page image',
          8 => 'TIFF/IT final page',
          16 => 'TIFF-FX mixed raster content',
          65537 => 'Alternate reduced-resolution image',
          '4294967295' => 'invalid',
        ),
      ),
      'phpExifTag' => 'NewSubFile',
      'exiftoolDOMNode' => 'IFD0:SubfileType',
    ),
    255 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'SubFile',
      'exiftoolDOMNode' => 'IFD0:OldSubfileType',
    ),
    256 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageWidth',
      'title' => 'Image Width',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'ImageWidth',
      'exiftoolDOMNode' => 'IFD0:ImageWidth',
    ),
    257 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageHeight',
      'title' => 'Image Height',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'ImageLength',
      'exiftoolDOMNode' => 'IFD0:ImageHeight',
    ),
    258 =>
    array (
      'collection' => 'Tag',
      'name' => 'BitsPerSample',
      'title' => 'Bits Per Sample',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'BitsPerSample',
      'exiftoolDOMNode' => 'IFD0:BitsPerSample',
    ),
    259 =>
    array (
      'collection' => 'Tag',
      'name' => 'Compression',
      'title' => 'Compression',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
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
          65000 => 'Kodak DCR Compressed',
          65535 => 'Pentax PEF Compressed',
        ),
      ),
      'phpExifTag' => 'Compression',
      'exiftoolDOMNode' => 'IFD0:Compression',
    ),
    262 =>
    array (
      'collection' => 'Tag',
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
        ),
      ),
      'phpExifTag' => 'PhotometricInterpretation',
      'exiftoolDOMNode' => 'IFD0:PhotometricInterpretation',
    ),
    263 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:Thresholding',
    ),
    264 =>
    array (
      'collection' => 'Tag',
      'name' => 'CellWidth',
      'title' => 'Cell Width',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'IFD0:CellWidth',
    ),
    265 =>
    array (
      'collection' => 'Tag',
      'name' => 'CellLength',
      'title' => 'Cell Length',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'IFD0:CellLength',
    ),
    266 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'FillOrder',
      'exiftoolDOMNode' => 'IFD0:FillOrder',
    ),
    269 =>
    array (
      'collection' => 'Tag',
      'name' => 'DocumentName',
      'title' => 'Document Name',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'DocumentName',
      'exiftoolDOMNode' => 'IFD0:DocumentName',
    ),
    270 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageDescription',
      'title' => 'Image Description',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'ImageDescription',
      'exiftoolDOMNode' => 'IFD0:ImageDescription',
    ),
    271 =>
    array (
      'collection' => 'Tag',
      'name' => 'Make',
      'title' => 'Make',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'Make',
      'exiftoolDOMNode' => 'IFD0:Make',
    ),
    272 =>
    array (
      'collection' => 'Tag',
      'name' => 'Model',
      'title' => 'Camera Model Name',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'Model',
      'exiftoolDOMNode' => 'IFD0:Model',
    ),
    273 =>
    array (
      'collection' => 'Tag',
      'name' => 'StripOffsets',
      'title' => 'Strip Offsets',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'StripOffsets',
      'exiftoolDOMNode' => 'ExifIFD:StripOffsets',
    ),
    274 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'Orientation',
      'exiftoolDOMNode' => 'IFD0:Orientation',
    ),
    277 =>
    array (
      'collection' => 'Tag',
      'name' => 'SamplesPerPixel',
      'title' => 'Samples Per Pixel',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'SamplesPerPixel',
      'exiftoolDOMNode' => 'IFD0:SamplesPerPixel',
    ),
    278 =>
    array (
      'collection' => 'Tag',
      'name' => 'RowsPerStrip',
      'title' => 'Rows Per Strip',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'RowsPerStrip',
      'exiftoolDOMNode' => 'IFD0:RowsPerStrip',
    ),
    279 =>
    array (
      'collection' => 'Tag',
      'name' => 'StripByteCounts',
      'title' => 'Strip Byte Counts',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'StripByteCounts',
      'exiftoolDOMNode' => 'ExifIFD:StripByteCounts',
    ),
    280 =>
    array (
      'collection' => 'Tag',
      'name' => 'MinSampleValue',
      'title' => 'Min Sample Value',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'MinSampleValue',
      'exiftoolDOMNode' => 'IFD0:MinSampleValue',
    ),
    281 =>
    array (
      'collection' => 'Tag',
      'name' => 'MaxSampleValue',
      'title' => 'Max Sample Value',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'MaxSampleValue',
      'exiftoolDOMNode' => 'IFD0:MaxSampleValue',
    ),
    282 =>
    array (
      'collection' => 'Tag',
      'name' => 'XResolution',
      'title' => 'X Resolution',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'XResolution',
      'exiftoolDOMNode' => 'IFD0:XResolution',
    ),
    283 =>
    array (
      'collection' => 'Tag',
      'name' => 'YResolution',
      'title' => 'Y Resolution',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'YResolution',
      'exiftoolDOMNode' => 'IFD0:YResolution',
    ),
    284 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'PlanarConfiguration',
      'exiftoolDOMNode' => 'IFD0:PlanarConfiguration',
    ),
    285 =>
    array (
      'collection' => 'Tag',
      'name' => 'PageName',
      'title' => 'Page Name',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'PageName',
      'exiftoolDOMNode' => 'IFD0:PageName',
    ),
    286 =>
    array (
      'collection' => 'Tag',
      'name' => 'XPosition',
      'title' => 'X Position',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'XPosition',
      'exiftoolDOMNode' => 'IFD0:XPosition',
    ),
    287 =>
    array (
      'collection' => 'Tag',
      'name' => 'YPosition',
      'title' => 'Y Position',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'YPosition',
      'exiftoolDOMNode' => 'IFD0:YPosition',
    ),
    288 =>
    array (
      'collection' => 'Tag',
      'name' => 'FreeOffsets',
      'title' => 'Free Offsets',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'FreeOffsets',
      'exiftoolDOMNode' => 'ExifIFD:FreeOffsets',
    ),
    289 =>
    array (
      'collection' => 'Tag',
      'name' => 'FreeByteCounts',
      'title' => 'Free Byte Counts',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'FreeByteCounts',
      'exiftoolDOMNode' => 'ExifIFD:FreeByteCounts',
    ),
    290 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'GrayResponseUnit',
      'exiftoolDOMNode' => 'IFD0:GrayResponseUnit',
    ),
    291 =>
    array (
      'collection' => 'Tag',
      'name' => 'GrayResponseCurve',
      'title' => 'Gray Response Curve',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'GrayResponseCurve',
      'exiftoolDOMNode' => 'ExifIFD:GrayResponseCurve',
    ),
    292 =>
    array (
      'collection' => 'Tag',
      'name' => 'T4Options',
      'title' => 'T4 Options',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => '2-Dimensional encoding',
          2 => 'Uncompressed',
          4 => 'Fill bits added',
        ),
      ),
      'phpExifTag' => 'T4Options',
      'exiftoolDOMNode' => 'ExifIFD:T4Options',
    ),
    293 =>
    array (
      'collection' => 'Tag',
      'name' => 'T6Options',
      'title' => 'T6 Options',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          2 => 'Uncompressed',
        ),
      ),
      'phpExifTag' => 'T6Options',
      'exiftoolDOMNode' => 'ExifIFD:T6Options',
    ),
    296 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'ResolutionUnit',
      'exiftoolDOMNode' => 'IFD0:ResolutionUnit',
    ),
    297 =>
    array (
      'collection' => 'Tag',
      'name' => 'PageNumber',
      'title' => 'Page Number',
      'components' => 2,
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'PageNumber',
      'exiftoolDOMNode' => 'IFD0:PageNumber',
    ),
    300 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorResponseUnit',
      'title' => 'Color Response Unit',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ColorResponseUnit',
    ),
    301 =>
    array (
      'collection' => 'Tag',
      'name' => 'TransferFunction',
      'title' => 'Transfer Function',
      'components' => 768,
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'TransferFunction',
      'exiftoolDOMNode' => 'IFD0:TransferFunction',
    ),
    305 =>
    array (
      'collection' => 'Tag',
      'name' => 'Software',
      'title' => 'Software',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'Software',
      'exiftoolDOMNode' => 'IFD0:Software',
    ),
    306 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModifyDate',
      'title' => 'Modify Date',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'DateTime',
      'exiftoolDOMNode' => 'IFD0:ModifyDate',
    ),
    315 =>
    array (
      'collection' => 'Tag',
      'name' => 'Artist',
      'title' => 'Artist',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'Artist',
      'exiftoolDOMNode' => 'IFD0:Artist',
    ),
    316 =>
    array (
      'collection' => 'Tag',
      'name' => 'HostComputer',
      'title' => 'Host Computer',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'HostComputer',
      'exiftoolDOMNode' => 'IFD0:HostComputer',
    ),
    317 =>
    array (
      'collection' => 'Tag',
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
        ),
      ),
      'phpExifTag' => 'Predictor',
      'exiftoolDOMNode' => 'IFD0:Predictor',
    ),
    318 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhitePoint',
      'title' => 'White Point',
      'components' => 2,
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'WhitePoint',
      'exiftoolDOMNode' => 'IFD0:WhitePoint',
    ),
    319 =>
    array (
      'collection' => 'Tag',
      'name' => 'PrimaryChromaticities',
      'title' => 'Primary Chromaticities',
      'components' => 6,
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'PrimaryChromaticities',
      'exiftoolDOMNode' => 'IFD0:PrimaryChromaticities',
    ),
    320 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorMap',
      'title' => 'Color Map',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ColorMap',
      'exiftoolDOMNode' => 'ExifIFD:ColorMap',
    ),
    321 =>
    array (
      'collection' => 'Tag',
      'name' => 'HalftoneHints',
      'title' => 'Halftone Hints',
      'components' => 2,
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'HalfToneHints',
      'exiftoolDOMNode' => 'IFD0:HalftoneHints',
    ),
    322 =>
    array (
      'collection' => 'Tag',
      'name' => 'TileWidth',
      'title' => 'Tile Width',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'TileWidth',
      'exiftoolDOMNode' => 'IFD0:TileWidth',
    ),
    323 =>
    array (
      'collection' => 'Tag',
      'name' => 'TileLength',
      'title' => 'Tile Length',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'TileLength',
      'exiftoolDOMNode' => 'IFD0:TileLength',
    ),
    324 =>
    array (
      'collection' => 'Tag',
      'name' => 'TileOffsets',
      'title' => 'Tile Offsets',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'TileOffsets',
      'exiftoolDOMNode' => 'ExifIFD:TileOffsets',
    ),
    325 =>
    array (
      'collection' => 'Tag',
      'name' => 'TileByteCounts',
      'title' => 'Tile Byte Counts',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'TileByteCounts',
      'exiftoolDOMNode' => 'ExifIFD:TileByteCounts',
    ),
    326 =>
    array (
      'collection' => 'Tag',
      'name' => 'BadFaxLines',
      'title' => 'Bad Fax Lines',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:BadFaxLines',
    ),
    327 =>
    array (
      'collection' => 'Tag',
      'name' => 'CleanFaxData',
      'title' => 'Clean Fax Data',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Clean',
          1 => 'Regenerated',
          2 => 'Unclean',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:CleanFaxData',
    ),
    328 =>
    array (
      'collection' => 'Tag',
      'name' => 'ConsecutiveBadFaxLines',
      'title' => 'Consecutive Bad Fax Lines',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ConsecutiveBadFaxLines',
    ),
    330 =>
    array (
      'collection' => 'Tag',
      'name' => 'A100DataOffset',
      'title' => 'A100 Data Offset',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'SubIFD',
      'exiftoolDOMNode' => 'IFD0:A100DataOffset',
    ),
    332 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'InkSet',
      'exiftoolDOMNode' => 'IFD0:InkSet',
    ),
    333 =>
    array (
      'collection' => 'Tag',
      'name' => 'InkNames',
      'title' => 'Ink Names',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'InkNames',
      'exiftoolDOMNode' => 'ExifIFD:InkNames',
    ),
    334 =>
    array (
      'collection' => 'Tag',
      'name' => 'NumberofInks',
      'title' => 'Numberof Inks',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'NumberOfInks',
      'exiftoolDOMNode' => 'ExifIFD:NumberofInks',
    ),
    336 =>
    array (
      'collection' => 'Tag',
      'name' => 'DotRange',
      'title' => 'Dot Range',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'DotRange',
      'exiftoolDOMNode' => 'ExifIFD:DotRange',
    ),
    337 =>
    array (
      'collection' => 'Tag',
      'name' => 'TargetPrinter',
      'title' => 'Target Printer',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'TargetPrinter',
      'exiftoolDOMNode' => 'IFD0:TargetPrinter',
    ),
    338 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExtraSamples',
      'title' => 'Extra Samples',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unspecified',
          1 => 'Associated Alpha',
          2 => 'Unassociated Alpha',
        ),
      ),
      'phpExifTag' => 'ExtraSample',
      'exiftoolDOMNode' => 'ExifIFD:ExtraSamples',
    ),
    339 =>
    array (
      'collection' => 'Tag',
      'name' => 'SampleFormat',
      'title' => 'Sample Format',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Unsigned',
          2 => 'Signed',
          3 => 'Float',
          4 => 'Undefined',
          5 => 'Complex int',
          6 => 'Complex float',
        ),
      ),
      'phpExifTag' => 'SampleFormat',
      'exiftoolDOMNode' => 'SubIFD:SampleFormat',
    ),
    340 =>
    array (
      'collection' => 'Tag',
      'name' => 'SMinSampleValue',
      'title' => 'S Min Sample Value',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'SMinSampleValue',
      'exiftoolDOMNode' => 'ExifIFD:SMinSampleValue',
    ),
    341 =>
    array (
      'collection' => 'Tag',
      'name' => 'SMaxSampleValue',
      'title' => 'S Max Sample Value',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'SMaxSampleValue',
      'exiftoolDOMNode' => 'ExifIFD:SMaxSampleValue',
    ),
    342 =>
    array (
      'collection' => 'Tag',
      'name' => 'TransferRange',
      'title' => 'Transfer Range',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'TransferRange',
      'exiftoolDOMNode' => 'ExifIFD:TransferRange',
    ),
    343 =>
    array (
      'collection' => 'Tag',
      'name' => 'ClipPath',
      'title' => 'Clip Path',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ClipPath',
      'exiftoolDOMNode' => 'ExifIFD:ClipPath',
    ),
    344 =>
    array (
      'collection' => 'Tag',
      'name' => 'XClipPathUnits',
      'title' => 'X Clip Path Units',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'XClipPathUnits',
      'exiftoolDOMNode' => 'ExifIFD:XClipPathUnits',
    ),
    345 =>
    array (
      'collection' => 'Tag',
      'name' => 'YClipPathUnits',
      'title' => 'Y Clip Path Units',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'YClipPathUnits',
      'exiftoolDOMNode' => 'ExifIFD:YClipPathUnits',
    ),
    346 =>
    array (
      'collection' => 'Tag',
      'name' => 'Indexed',
      'title' => 'Indexed',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Not indexed',
          1 => 'Indexed',
        ),
      ),
      'phpExifTag' => 'Indexed',
      'exiftoolDOMNode' => 'ExifIFD:Indexed',
    ),
    347 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGTables',
      'title' => 'JPEG Tables',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'JPEGTables',
      'exiftoolDOMNode' => 'ExifIFD:JPEGTables',
    ),
    351 =>
    array (
      'collection' => 'Tag',
      'name' => 'OPIProxy',
      'title' => 'OPI Proxy',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Higher resolution image does not exist',
          1 => 'Higher resolution image exists',
        ),
      ),
      'phpExifTag' => 'OPIProxy',
      'exiftoolDOMNode' => 'ExifIFD:OPIProxy',
    ),
    401 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileType',
      'title' => 'Profile Type',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unspecified',
          1 => 'Group 3 FAX',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:ProfileType',
    ),
    402 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaxProfile',
      'title' => 'Fax Profile',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unknown',
          1 => 'Minimal B&W lossless, S',
          2 => 'Extended B&W lossless, F',
          3 => 'Lossless JBIG B&W, J',
          4 => 'Lossy color and grayscale, C',
          5 => 'Lossless color and grayscale, L',
          6 => 'Mixed raster content, M',
          7 => 'Profile T',
          255 => 'Multi Profiles',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:FaxProfile',
    ),
    403 =>
    array (
      'collection' => 'Tag',
      'name' => 'CodingMethods',
      'title' => 'Coding Methods',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Unspecified compression',
          2 => 'Modified Huffman',
          4 => 'Modified Read',
          8 => 'Modified MR',
          16 => 'JBIG',
          32 => 'Baseline JPEG',
          64 => 'JBIG color',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:CodingMethods',
    ),
    404 =>
    array (
      'collection' => 'Tag',
      'name' => 'VersionYear',
      'title' => 'Version Year',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:VersionYear',
    ),
    405 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModeNumber',
      'title' => 'Mode Number',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ModeNumber',
    ),
    433 =>
    array (
      'collection' => 'Tag',
      'name' => 'Decode',
      'title' => 'Decode',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Decode',
    ),
    434 =>
    array (
      'collection' => 'Tag',
      'name' => 'DefaultImageColor',
      'title' => 'Default Image Color',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:DefaultImageColor',
    ),
    435 =>
    array (
      'collection' => 'Tag',
      'name' => 'T82Options',
      'title' => 'T82 Options',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:T82Options',
    ),
    437 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGTables',
      'title' => 'JPEG Tables',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:JPEGTables',
    ),
    512 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGProc',
      'title' => 'JPEG Proc',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Baseline',
          14 => 'Lossless',
        ),
      ),
      'phpExifTag' => 'JPEGProc',
      'exiftoolDOMNode' => 'ExifIFD:JPEGProc',
    ),
    513 =>
    array (
      'collection' => 'Tag',
      'name' => 'ThumbnailOffset',
      'title' => 'Thumbnail Offset',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'JPEGInterchangeFormat',
      'exiftoolDOMNode' => 'IFD1:ThumbnailOffset',
    ),
    514 =>
    array (
      'collection' => 'Tag',
      'name' => 'ThumbnailLength',
      'title' => 'Thumbnail Length',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'JPEGInterchangeFormatLength',
      'exiftoolDOMNode' => 'IFD1:ThumbnailLength',
    ),
    515 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGRestartInterval',
      'title' => 'JPEG Restart Interval',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'JPEGRestartInterval',
      'exiftoolDOMNode' => 'ExifIFD:JPEGRestartInterval',
    ),
    517 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGLosslessPredictors',
      'title' => 'JPEG Lossless Predictors',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'JPEGLosslessPredictors',
      'exiftoolDOMNode' => 'ExifIFD:JPEGLosslessPredictors',
    ),
    518 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGPointTransforms',
      'title' => 'JPEG Point Transforms',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'JPEGPointTransforms',
      'exiftoolDOMNode' => 'ExifIFD:JPEGPointTransforms',
    ),
    519 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGQTables',
      'title' => 'JPEGQ Tables',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'JPEGQTables',
      'exiftoolDOMNode' => 'ExifIFD:JPEGQTables',
    ),
    520 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGDCTables',
      'title' => 'JPEGDC Tables',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'JPEGDCTables',
      'exiftoolDOMNode' => 'ExifIFD:JPEGDCTables',
    ),
    521 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPEGACTables',
      'title' => 'JPEGAC Tables',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'JPEGACTables',
      'exiftoolDOMNode' => 'ExifIFD:JPEGACTables',
    ),
    529 =>
    array (
      'collection' => 'Tag',
      'name' => 'YCbCrCoefficients',
      'title' => 'Y Cb Cr Coefficients',
      'components' => 3,
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'YCbCrCoefficients',
      'exiftoolDOMNode' => 'IFD0:YCbCrCoefficients',
    ),
    530 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'YCbCrSubSampling',
      'exiftoolDOMNode' => 'IFD0:YCbCrSubSampling',
    ),
    531 =>
    array (
      'collection' => 'Tag',
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
      'phpExifTag' => 'YCbCrPositioning',
      'exiftoolDOMNode' => 'IFD0:YCbCrPositioning',
    ),
    532 =>
    array (
      'collection' => 'Tag',
      'name' => 'ReferenceBlackWhite',
      'title' => 'Reference Black White',
      'components' => 6,
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'ReferenceBlackWhite',
      'exiftoolDOMNode' => 'IFD0:ReferenceBlackWhite',
    ),
    559 =>
    array (
      'collection' => 'Tag',
      'name' => 'StripRowCounts',
      'title' => 'Strip Row Counts',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:StripRowCounts',
    ),
    700 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\IfdApplicationNotes',
      'collection' => 'Tag',
      'name' => 'ApplicationNotes',
      'title' => 'Application Notes',
      'format' =>
      array (
        0 => 1,
      ),
      'phpExifTag' => 'ExtensibleMetadataPlatform',
      'exiftoolDOMNode' => 'IFD0:ApplicationNotes',
    ),
    999 =>
    array (
      'collection' => 'Tag',
      'name' => 'USPTOMiscellaneous',
      'title' => 'USPTO Miscellaneous',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:USPTOMiscellaneous',
    ),
    4096 =>
    array (
      'collection' => 'Tag',
      'name' => 'RelatedImageFileFormat',
      'title' => 'Related Image File Format',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'RelatedImageFileFormat',
      'exiftoolDOMNode' => 'InteropIFD:RelatedImageFileFormat',
    ),
    4097 =>
    array (
      'collection' => 'Tag',
      'name' => 'RelatedImageWidth',
      'title' => 'Related Image Width',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'InteropIFD:RelatedImageWidth',
    ),
    4098 =>
    array (
      'collection' => 'Tag',
      'name' => 'RelatedImageHeight',
      'title' => 'Related Image Height',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'InteropIFD:RelatedImageHeight',
    ),
    18246 =>
    array (
      'collection' => 'Tag',
      'name' => 'Rating',
      'title' => 'Rating',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'IFD0:Rating',
    ),
    18247 =>
    array (
      'collection' => 'Tag',
      'name' => 'XP_DIP_XML',
      'title' => 'XP DIP XML',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:XP_DIP_XML',
    ),
    18249 =>
    array (
      'collection' => 'Tag',
      'name' => 'RatingPercent',
      'title' => 'Rating Percent',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'IFD0:RatingPercent',
    ),
    28672 =>
    array (
      'collection' => 'Tag',
      'name' => 'SonyRawFileType',
      'title' => 'Sony Raw File Type',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Sony Uncompressed 14-bit RAW',
          1 => 'Sony Uncompressed 12-bit RAW',
          2 => 'Sony Compressed RAW',
          3 => 'Sony Lossless Compressed RAW',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:SonyRawFileType',
    ),
    28688 =>
    array (
      'collection' => 'Tag',
      'name' => 'SonyToneCurve',
      'title' => 'Sony Tone Curve',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SonyToneCurve',
    ),
    28721 =>
    array (
      'collection' => 'Tag',
      'name' => 'VignettingCorrection',
      'title' => 'Vignetting Correction',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          256 => 'Off',
          257 => 'Auto',
          511 => 'No correction params available',
        ),
      ),
      'exiftoolDOMNode' => 'SubIFD:VignettingCorrection',
    ),
    28722 =>
    array (
      'collection' => 'Tag',
      'name' => 'VignettingCorrParams',
      'title' => 'Vignetting Corr Params',
      'components' => 17,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'SubIFD:VignettingCorrParams',
    ),
    28724 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationCorrection',
      'title' => 'Chromatic Aberration Correction',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'Auto',
          255 => 'No correction params available',
        ),
      ),
      'exiftoolDOMNode' => 'SubIFD:ChromaticAberrationCorrection',
    ),
    28725 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaticAberrationCorrParams',
      'title' => 'Chromatic Aberration Corr Params',
      'components' => 33,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'SubIFD:ChromaticAberrationCorrParams',
    ),
    28726 =>
    array (
      'collection' => 'Tag',
      'name' => 'DistortionCorrection',
      'title' => 'Distortion Correction',
      'format' =>
      array (
        0 => 8,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Off',
          1 => 'Auto',
          17 => 'Auto fixed by lens',
          255 => 'No correction params available',
        ),
      ),
      'exiftoolDOMNode' => 'SubIFD:DistortionCorrection',
    ),
    28727 =>
    array (
      'collection' => 'Tag',
      'name' => 'DistortionCorrParams',
      'title' => 'Distortion Corr Params',
      'components' => 17,
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'SubIFD:DistortionCorrParams',
    ),
    32781 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageID',
      'title' => 'Image ID',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ImageID',
      'exiftoolDOMNode' => 'ExifIFD:ImageID',
    ),
    32931 =>
    array (
      'collection' => 'Tag',
      'name' => 'WangTag1',
      'title' => 'Wang Tag 1',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WangTag1',
    ),
    32932 =>
    array (
      'collection' => 'Tag',
      'name' => 'WangAnnotation',
      'title' => 'Wang Annotation',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WangAnnotation',
    ),
    32933 =>
    array (
      'collection' => 'Tag',
      'name' => 'WangTag3',
      'title' => 'Wang Tag 3',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WangTag3',
    ),
    32934 =>
    array (
      'collection' => 'Tag',
      'name' => 'WangTag4',
      'title' => 'Wang Tag 4',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WangTag4',
    ),
    32953 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageReferencePoints',
      'title' => 'Image Reference Points',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageReferencePoints',
    ),
    32954 =>
    array (
      'collection' => 'Tag',
      'name' => 'RegionXformTackPoint',
      'title' => 'Region Xform Tack Point',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:RegionXformTackPoint',
    ),
    32955 =>
    array (
      'collection' => 'Tag',
      'name' => 'WarpQuadrilateral',
      'title' => 'Warp Quadrilateral',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WarpQuadrilateral',
    ),
    32956 =>
    array (
      'collection' => 'Tag',
      'name' => 'AffineTransformMat',
      'title' => 'Affine Transform Mat',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:AffineTransformMat',
    ),
    32995 =>
    array (
      'collection' => 'Tag',
      'name' => 'Matteing',
      'title' => 'Matteing',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'Matteing',
      'exiftoolDOMNode' => 'ExifIFD:Matteing',
    ),
    32996 =>
    array (
      'collection' => 'Tag',
      'name' => 'DataType',
      'title' => 'Data Type',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'DataType',
      'exiftoolDOMNode' => 'ExifIFD:DataType',
    ),
    32997 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageDepth',
      'title' => 'Image Depth',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ImageDepth',
      'exiftoolDOMNode' => 'ExifIFD:ImageDepth',
    ),
    32998 =>
    array (
      'collection' => 'Tag',
      'name' => 'TileDepth',
      'title' => 'Tile Depth',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'TileDepth',
      'exiftoolDOMNode' => 'ExifIFD:TileDepth',
    ),
    33300 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageFullWidth',
      'title' => 'Image Full Width',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageFullWidth',
    ),
    33301 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageFullHeight',
      'title' => 'Image Full Height',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageFullHeight',
    ),
    33302 =>
    array (
      'collection' => 'Tag',
      'name' => 'TextureFormat',
      'title' => 'Texture Format',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:TextureFormat',
    ),
    33303 =>
    array (
      'collection' => 'Tag',
      'name' => 'WrapModes',
      'title' => 'Wrap Modes',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WrapModes',
    ),
    33304 =>
    array (
      'collection' => 'Tag',
      'name' => 'FovCot',
      'title' => 'Fov Cot',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:FovCot',
    ),
    33305 =>
    array (
      'collection' => 'Tag',
      'name' => 'MatrixWorldToScreen',
      'title' => 'Matrix World To Screen',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MatrixWorldToScreen',
    ),
    33306 =>
    array (
      'collection' => 'Tag',
      'name' => 'MatrixWorldToCamera',
      'title' => 'Matrix World To Camera',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MatrixWorldToCamera',
    ),
    33405 =>
    array (
      'collection' => 'Tag',
      'name' => 'Model2',
      'title' => 'Model 2',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Model2',
    ),
    33421 =>
    array (
      'collection' => 'Tag',
      'name' => 'CFARepeatPatternDim',
      'title' => 'CFA Repeat Pattern Dim',
      'components' => 2,
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'CFARepeatPatternDim',
      'exiftoolDOMNode' => 'SubIFD:CFARepeatPatternDim',
    ),
    33422 =>
    array (
      'collection' => 'Tag',
      'name' => 'CFAPattern2',
      'title' => 'CFA Pattern 2',
      'format' =>
      array (
        0 => 1,
      ),
      'phpExifTag' => 'CFAPattern',
      'exiftoolDOMNode' => 'SubIFD:CFAPattern2',
    ),
    33423 =>
    array (
      'collection' => 'Tag',
      'name' => 'BatteryLevel',
      'title' => 'Battery Level',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'BatteryLevel',
      'exiftoolDOMNode' => 'ExifIFD:BatteryLevel',
    ),
    33432 =>
    array (
      'collection' => 'Tag',
      'name' => 'Copyright',
      'title' => 'Copyright',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'Copyright',
      'exiftoolDOMNode' => 'IFD0:Copyright',
    ),
    33434 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureTime',
      'title' => 'Exposure Time',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'ExposureTime',
      'exiftoolDOMNode' => 'ExifIFD:ExposureTime',
    ),
    33437 =>
    array (
      'collection' => 'Tag',
      'name' => 'FNumber',
      'title' => 'F Number',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'FNumber',
      'exiftoolDOMNode' => 'ExifIFD:FNumber',
    ),
    33445 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDFileTag',
      'title' => 'MD File Tag',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDFileTag',
    ),
    33446 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDScalePixel',
      'title' => 'MD Scale Pixel',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDScalePixel',
    ),
    33447 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDColorTable',
      'title' => 'MD Color Table',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDColorTable',
    ),
    33448 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDLabName',
      'title' => 'MD Lab Name',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDLabName',
    ),
    33449 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDSampleInfo',
      'title' => 'MD Sample Info',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDSampleInfo',
    ),
    33450 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDPrepDate',
      'title' => 'MD Prep Date',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDPrepDate',
    ),
    33451 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDPrepTime',
      'title' => 'MD Prep Time',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDPrepTime',
    ),
    33452 =>
    array (
      'collection' => 'Tag',
      'name' => 'MDFileUnits',
      'title' => 'MD File Units',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MDFileUnits',
    ),
    33550 =>
    array (
      'collection' => 'Tag',
      'name' => 'PixelScale',
      'title' => 'Pixel Scale',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:PixelScale',
    ),
    33589 =>
    array (
      'collection' => 'Tag',
      'name' => 'AdventScale',
      'title' => 'Advent Scale',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:AdventScale',
    ),
    33590 =>
    array (
      'collection' => 'Tag',
      'name' => 'AdventRevision',
      'title' => 'Advent Revision',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:AdventRevision',
    ),
    33628 =>
    array (
      'collection' => 'Tag',
      'name' => 'UIC1Tag',
      'title' => 'UIC1 Tag',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:UIC1Tag',
    ),
    33629 =>
    array (
      'collection' => 'Tag',
      'name' => 'UIC2Tag',
      'title' => 'UIC2 Tag',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:UIC2Tag',
    ),
    33630 =>
    array (
      'collection' => 'Tag',
      'name' => 'UIC3Tag',
      'title' => 'UIC3 Tag',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:UIC3Tag',
    ),
    33631 =>
    array (
      'collection' => 'Tag',
      'name' => 'UIC4Tag',
      'title' => 'UIC4 Tag',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:UIC4Tag',
    ),
    33723 =>
    array (
      'collection' => 'Tag',
      'name' => 'IPTC-NAA',
      'title' => 'IPTC-NAA',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'IPTC/NAA',
      'exiftoolDOMNode' => 'IFD0:IPTC-NAA',
    ),
    33918 =>
    array (
      'collection' => 'Tag',
      'name' => 'IntergraphPacketData',
      'title' => 'Intergraph Packet Data',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:IntergraphPacketData',
    ),
    33919 =>
    array (
      'collection' => 'Tag',
      'name' => 'IntergraphFlagRegisters',
      'title' => 'Intergraph Flag Registers',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:IntergraphFlagRegisters',
    ),
    33920 =>
    array (
      'collection' => 'Tag',
      'name' => 'IntergraphMatrix',
      'title' => 'Intergraph Matrix',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:IntergraphMatrix',
    ),
    33921 =>
    array (
      'collection' => 'Tag',
      'name' => 'INGRReserved',
      'title' => 'INGR Reserved',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:INGRReserved',
    ),
    33922 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModelTiePoint',
      'title' => 'Model Tie Point',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ModelTiePoint',
    ),
    34016 =>
    array (
      'collection' => 'Tag',
      'name' => 'Site',
      'title' => 'Site',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Site',
    ),
    34017 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorSequence',
      'title' => 'Color Sequence',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ColorSequence',
    ),
    34018 =>
    array (
      'collection' => 'Tag',
      'name' => 'IT8Header',
      'title' => 'IT8 Header',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:IT8Header',
    ),
    34019 =>
    array (
      'collection' => 'Tag',
      'name' => 'RasterPadding',
      'title' => 'Raster Padding',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Byte',
          1 => 'Word',
          2 => 'Long Word',
          9 => 'Sector',
          10 => 'Long Sector',
        ),
      ),
      'phpExifTag' => 'IT8RasterPadding',
      'exiftoolDOMNode' => 'ExifIFD:RasterPadding',
    ),
    34020 =>
    array (
      'collection' => 'Tag',
      'name' => 'BitsPerRunLength',
      'title' => 'Bits Per Run Length',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:BitsPerRunLength',
    ),
    34021 =>
    array (
      'collection' => 'Tag',
      'name' => 'BitsPerExtendedRunLength',
      'title' => 'Bits Per Extended Run Length',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'IT8ColorTable',
      'exiftoolDOMNode' => 'ExifIFD:BitsPerExtendedRunLength',
    ),
    34022 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTable',
      'title' => 'Color Table',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ColorTable',
    ),
    34023 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageColorIndicator',
      'title' => 'Image Color Indicator',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unspecified Image Color',
          1 => 'Specified Image Color',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageColorIndicator',
    ),
    34024 =>
    array (
      'collection' => 'Tag',
      'name' => 'BackgroundColorIndicator',
      'title' => 'Background Color Indicator',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unspecified Background Color',
          1 => 'Specified Background Color',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:BackgroundColorIndicator',
    ),
    34025 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageColorValue',
      'title' => 'Image Color Value',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageColorValue',
    ),
    34026 =>
    array (
      'collection' => 'Tag',
      'name' => 'BackgroundColorValue',
      'title' => 'Background Color Value',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:BackgroundColorValue',
    ),
    34027 =>
    array (
      'collection' => 'Tag',
      'name' => 'PixelIntensityRange',
      'title' => 'Pixel Intensity Range',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:PixelIntensityRange',
    ),
    34028 =>
    array (
      'collection' => 'Tag',
      'name' => 'TransparencyIndicator',
      'title' => 'Transparency Indicator',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:TransparencyIndicator',
    ),
    34029 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorCharacterization',
      'title' => 'Color Characterization',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ColorCharacterization',
    ),
    34030 =>
    array (
      'collection' => 'Tag',
      'name' => 'HCUsage',
      'title' => 'HC Usage',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'CT',
          1 => 'Line Art',
          2 => 'Trap',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:HCUsage',
    ),
    34031 =>
    array (
      'collection' => 'Tag',
      'name' => 'TrapIndicator',
      'title' => 'Trap Indicator',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:TrapIndicator',
    ),
    34032 =>
    array (
      'collection' => 'Tag',
      'name' => 'CMYKEquivalent',
      'title' => 'CMYK Equivalent',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:CMYKEquivalent',
    ),
    34118 =>
    array (
      'collection' => 'Tag',
      'name' => 'SEMInfo',
      'title' => 'SEM Info',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:SEMInfo',
    ),
    34232 =>
    array (
      'collection' => 'Tag',
      'name' => 'PixelMagicJBIGOptions',
      'title' => 'Pixel Magic JBIG Options',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:PixelMagicJBIGOptions',
    ),
    34263 =>
    array (
      'collection' => 'Tag',
      'name' => 'JPLCartoIFD',
      'title' => 'JPL Carto IFD',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:JPLCartoIFD',
    ),
    34264 =>
    array (
      'collection' => 'Tag',
      'name' => 'ModelTransform',
      'title' => 'Model Transform',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ModelTransform',
    ),
    34306 =>
    array (
      'collection' => 'Tag',
      'name' => 'WB_GRGBLevels',
      'title' => 'WB GRGB Levels',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WB_GRGBLevels',
    ),
    34687 =>
    array (
      'collection' => 'Tag',
      'name' => 'TIFF_FXExtensions',
      'title' => 'TIFF FX Extensions',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Resolution/Image Width',
          2 => 'N Layer Profile M',
          4 => 'Shared Data',
          8 => 'B&W JBIG2',
          16 => 'JBIG2 Profile M',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:TIFF_FXExtensions',
    ),
    34688 =>
    array (
      'collection' => 'Tag',
      'name' => 'MultiProfiles',
      'title' => 'Multi Profiles',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Profile S',
          2 => 'Profile F',
          4 => 'Profile J',
          8 => 'Profile C',
          16 => 'Profile L',
          32 => 'Profile M',
          64 => 'Profile T',
          128 => 'Resolution/Image Width',
          256 => 'N Layer Profile M',
          512 => 'Shared Data',
          1024 => 'JBIG2 Profile M',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:MultiProfiles',
    ),
    34689 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharedData',
      'title' => 'Shared Data',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SharedData',
    ),
    34690 =>
    array (
      'collection' => 'Tag',
      'name' => 'T88Options',
      'title' => 'T88 Options',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:T88Options',
    ),
    34732 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageLayer',
      'title' => 'Image Layer',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageLayer',
    ),
    34735 =>
    array (
      'collection' => 'Tag',
      'name' => 'GeoTiffDirectory',
      'title' => 'Geo Tiff Directory',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:GeoTiffDirectory',
    ),
    34736 =>
    array (
      'collection' => 'Tag',
      'name' => 'GeoTiffDoubleParams',
      'title' => 'Geo Tiff Double Params',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:GeoTiffDoubleParams',
    ),
    34737 =>
    array (
      'collection' => 'Tag',
      'name' => 'GeoTiffAsciiParams',
      'title' => 'Geo Tiff Ascii Params',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:GeoTiffAsciiParams',
    ),
    34750 =>
    array (
      'collection' => 'Tag',
      'name' => 'JBIGOptions',
      'title' => 'JBIG Options',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:JBIGOptions',
    ),
    34850 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureProgram',
      'title' => 'Exposure Program',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Not Defined',
          1 => 'Manual',
          2 => 'Program AE',
          3 => 'Aperture-priority AE',
          4 => 'Shutter speed priority AE',
          5 => 'Creative (Slow speed)',
          6 => 'Action (High speed)',
          7 => 'Portrait',
          8 => 'Landscape',
          9 => 'Bulb',
        ),
      ),
      'phpExifTag' => 'ExposureProgram',
      'exiftoolDOMNode' => 'ExifIFD:ExposureProgram',
    ),
    34852 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpectralSensitivity',
      'title' => 'Spectral Sensitivity',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'SpectralSensity',
      'exiftoolDOMNode' => 'ExifIFD:SpectralSensitivity',
    ),
    34855 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISO',
      'title' => 'ISO',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'ISOSpeedRatings',
      'exiftoolDOMNode' => 'ExifIFD:ISO',
    ),
    34856 =>
    array (
      'collection' => 'Tag',
      'name' => 'Opto-ElectricConvFactor',
      'title' => 'Opto-Electric Conv Factor',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'OECF',
      'exiftoolDOMNode' => 'ExifIFD:Opto-ElectricConvFactor',
    ),
    34857 =>
    array (
      'collection' => 'Tag',
      'name' => 'Interlace',
      'title' => 'Interlace',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Interlace',
    ),
    34858 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimeZoneOffset',
      'title' => 'Time Zone Offset',
      'format' =>
      array (
        0 => 8,
      ),
      'exiftoolDOMNode' => 'ExifIFD:TimeZoneOffset',
    ),
    34859 =>
    array (
      'collection' => 'Tag',
      'name' => 'SelfTimerMode',
      'title' => 'Self Timer Mode',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SelfTimerMode',
    ),
    34864 =>
    array (
      'collection' => 'Tag',
      'name' => 'SensitivityType',
      'title' => 'Sensitivity Type',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unknown',
          1 => 'Standard Output Sensitivity',
          2 => 'Recommended Exposure Index',
          3 => 'ISO Speed',
          4 => 'Standard Output Sensitivity and Recommended Exposure Index',
          5 => 'Standard Output Sensitivity and ISO Speed',
          6 => 'Recommended Exposure Index and ISO Speed',
          7 => 'Standard Output Sensitivity, Recommended Exposure Index and ISO Speed',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:SensitivityType',
    ),
    34865 =>
    array (
      'collection' => 'Tag',
      'name' => 'StandardOutputSensitivity',
      'title' => 'Standard Output Sensitivity',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'ExifIFD:StandardOutputSensitivity',
    ),
    34866 =>
    array (
      'collection' => 'Tag',
      'name' => 'RecommendedExposureIndex',
      'title' => 'Recommended Exposure Index',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'ExifIFD:RecommendedExposureIndex',
    ),
    34867 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISOSpeed',
      'title' => 'ISO Speed',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ISOSpeed',
    ),
    34868 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISOSpeedLatitudeyyy',
      'title' => 'ISO Speed Latitude yyy',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ISOSpeedLatitudeyyy',
    ),
    34869 =>
    array (
      'collection' => 'Tag',
      'name' => 'ISOSpeedLatitudezzz',
      'title' => 'ISO Speed Latitude zzz',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ISOSpeedLatitudezzz',
    ),
    34908 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaxRecvParams',
      'title' => 'Fax Recv Params',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:FaxRecvParams',
    ),
    34909 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaxSubAddress',
      'title' => 'Fax Sub Address',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:FaxSubAddress',
    ),
    34910 =>
    array (
      'collection' => 'Tag',
      'name' => 'FaxRecvTime',
      'title' => 'Fax Recv Time',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:FaxRecvTime',
    ),
    34929 =>
    array (
      'collection' => 'Tag',
      'name' => 'FedexEDR',
      'title' => 'Fedex EDR',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:FedexEDR',
    ),
    36864 =>
    array (
      'components' => 4,
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Version',
      'collection' => 'Tag',
      'name' => 'ExifVersion',
      'title' => 'Exif Version',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ExifVersion',
      'exiftoolDOMNode' => 'ExifIFD:ExifVersion',
    ),
    36867 =>
    array (
      'collection' => 'Tag',
      'name' => 'DateTimeOriginal',
      'title' => 'Date/Time Original',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'DateTimeOriginal',
      'exiftoolDOMNode' => 'ExifIFD:DateTimeOriginal',
    ),
    36868 =>
    array (
      'collection' => 'Tag',
      'name' => 'CreateDate',
      'title' => 'Create Date',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'DateTimeDigitized',
      'exiftoolDOMNode' => 'ExifIFD:CreateDate',
    ),
    36873 =>
    array (
      'collection' => 'Tag',
      'name' => 'GooglePlusUploadCode',
      'title' => 'Google Plus Upload Code',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:GooglePlusUploadCode',
    ),
    36880 =>
    array (
      'collection' => 'Tag',
      'name' => 'OffsetTime',
      'title' => 'Offset Time',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OffsetTime',
    ),
    36881 =>
    array (
      'collection' => 'Tag',
      'name' => 'OffsetTimeOriginal',
      'title' => 'Offset Time Original',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OffsetTimeOriginal',
    ),
    36882 =>
    array (
      'collection' => 'Tag',
      'name' => 'OffsetTimeDigitized',
      'title' => 'Offset Time Digitized',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OffsetTimeDigitized',
    ),
    37121 =>
    array (
      'collection' => 'Tag',
      'name' => 'ComponentsConfiguration',
      'title' => 'Components Configuration',
      'components' => 4,
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => '-',
          1 => 'Y',
          2 => 'Cb',
          3 => 'Cr',
          4 => 'R',
          5 => 'G',
          6 => 'B',
        ),
      ),
      'phpExifTag' => 'ComponentsConfiguration',
      'exiftoolDOMNode' => 'ExifIFD:ComponentsConfiguration',
    ),
    37122 =>
    array (
      'collection' => 'Tag',
      'name' => 'CompressedBitsPerPixel',
      'title' => 'Compressed Bits Per Pixel',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'CompressedBitsPerPixel',
      'exiftoolDOMNode' => 'ExifIFD:CompressedBitsPerPixel',
    ),
    37377 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShutterSpeedValue',
      'title' => 'Shutter Speed Value',
      'format' =>
      array (
        0 => 10,
      ),
      'phpExifTag' => 'ShutterSpeedValue',
      'exiftoolDOMNode' => 'ExifIFD:ShutterSpeedValue',
    ),
    37378 =>
    array (
      'collection' => 'Tag',
      'name' => 'ApertureValue',
      'title' => 'Aperture Value',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'ApertureValue',
      'exiftoolDOMNode' => 'ExifIFD:ApertureValue',
    ),
    37379 =>
    array (
      'collection' => 'Tag',
      'name' => 'BrightnessValue',
      'title' => 'Brightness Value',
      'format' =>
      array (
        0 => 10,
      ),
      'phpExifTag' => 'BrightnessValue',
      'exiftoolDOMNode' => 'ExifIFD:BrightnessValue',
    ),
    37380 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureCompensation',
      'title' => 'Exposure Compensation',
      'format' =>
      array (
        0 => 10,
      ),
      'phpExifTag' => 'ExposureBiasValue',
      'exiftoolDOMNode' => 'ExifIFD:ExposureCompensation',
    ),
    37381 =>
    array (
      'collection' => 'Tag',
      'name' => 'MaxApertureValue',
      'title' => 'Max Aperture Value',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'MaxApertureValue',
      'exiftoolDOMNode' => 'ExifIFD:MaxApertureValue',
    ),
    37382 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubjectDistance',
      'title' => 'Subject Distance',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'SubjectDistance',
      'exiftoolDOMNode' => 'ExifIFD:SubjectDistance',
    ),
    37383 =>
    array (
      'collection' => 'Tag',
      'name' => 'MeteringMode',
      'title' => 'Metering Mode',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unknown',
          1 => 'Average',
          2 => 'Center-weighted average',
          3 => 'Spot',
          4 => 'Multi-spot',
          5 => 'Multi-segment',
          6 => 'Partial',
          255 => 'Other',
        ),
      ),
      'phpExifTag' => 'MeteringMode',
      'exiftoolDOMNode' => 'ExifIFD:MeteringMode',
    ),
    37384 =>
    array (
      'collection' => 'Tag',
      'name' => 'LightSource',
      'title' => 'Light Source',
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
      'phpExifTag' => 'LightSource',
      'exiftoolDOMNode' => 'ExifIFD:LightSource',
    ),
    37385 =>
    array (
      'collection' => 'Tag',
      'name' => 'Flash',
      'title' => 'Flash',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No Flash',
          1 => 'Fired',
          5 => 'Fired, Return not detected',
          7 => 'Fired, Return detected',
          8 => 'On, Did not fire',
          9 => 'On, Fired',
          13 => 'On, Return not detected',
          15 => 'On, Return detected',
          16 => 'Off, Did not fire',
          20 => 'Off, Did not fire, Return not detected',
          24 => 'Auto, Did not fire',
          25 => 'Auto, Fired',
          29 => 'Auto, Fired, Return not detected',
          31 => 'Auto, Fired, Return detected',
          32 => 'No flash function',
          48 => 'Off, No flash function',
          65 => 'Fired, Red-eye reduction',
          69 => 'Fired, Red-eye reduction, Return not detected',
          71 => 'Fired, Red-eye reduction, Return detected',
          73 => 'On, Red-eye reduction',
          77 => 'On, Red-eye reduction, Return not detected',
          79 => 'On, Red-eye reduction, Return detected',
          80 => 'Off, Red-eye reduction',
          88 => 'Auto, Did not fire, Red-eye reduction',
          89 => 'Auto, Fired, Red-eye reduction',
          93 => 'Auto, Fired, Red-eye reduction, Return not detected',
          95 => 'Auto, Fired, Red-eye reduction, Return detected',
        ),
      ),
      'phpExifTag' => 'Flash',
      'exiftoolDOMNode' => 'ExifIFD:Flash',
    ),
    37386 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalLength',
      'title' => 'Focal Length',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'FocalLength',
      'exiftoolDOMNode' => 'ExifIFD:FocalLength',
    ),
    37387 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashEnergy',
      'title' => 'Flash Energy',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'FlashEnergy',
      'exiftoolDOMNode' => 'ExifIFD:FlashEnergy',
    ),
    37388 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpatialFrequencyResponse',
      'title' => 'Spatial Frequency Response',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'SpatialFrequencyResponse',
      'exiftoolDOMNode' => 'ExifIFD:SpatialFrequencyResponse',
    ),
    37389 =>
    array (
      'collection' => 'Tag',
      'name' => 'Noise',
      'title' => 'Noise',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'Noise',
      'exiftoolDOMNode' => 'ExifIFD:Noise',
    ),
    37390 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneXResolution',
      'title' => 'Focal Plane X Resolution',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'FocalPlaneXResolution',
      'exiftoolDOMNode' => 'ExifIFD:FocalPlaneXResolution',
    ),
    37391 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneYResolution',
      'title' => 'Focal Plane Y Resolution',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'FocalPlaneYResolution',
      'exiftoolDOMNode' => 'ExifIFD:FocalPlaneYResolution',
    ),
    37392 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneResolutionUnit',
      'title' => 'Focal Plane Resolution Unit',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'None',
          2 => 'inches',
          3 => 'cm',
          4 => 'mm',
          5 => 'um',
        ),
      ),
      'phpExifTag' => 'FocalPlaneResolutionUnit',
      'exiftoolDOMNode' => 'ExifIFD:FocalPlaneResolutionUnit',
    ),
    37393 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageNumber',
      'title' => 'Image Number',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'ImageNumber',
      'exiftoolDOMNode' => 'ExifIFD:ImageNumber',
    ),
    37394 =>
    array (
      'collection' => 'Tag',
      'name' => 'SecurityClassification',
      'title' => 'Security Classification',
      'format' =>
      array (
        0 => 2,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          'C' => 'Confidential',
          'R' => 'Restricted',
          'S' => 'Secret',
          'T' => 'Top Secret',
          'U' => 'Unclassified',
        ),
      ),
      'phpExifTag' => 'SecurityClassification',
      'exiftoolDOMNode' => 'ExifIFD:SecurityClassification',
    ),
    37395 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageHistory',
      'title' => 'Image History',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'ImageHistory',
      'exiftoolDOMNode' => 'ExifIFD:ImageHistory',
    ),
    37396 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubjectArea',
      'title' => 'Subject Area',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'SubjectLocation',
      'exiftoolDOMNode' => 'ExifIFD:SubjectArea',
    ),
    37397 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureIndex',
      'title' => 'Exposure Index',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ExposureIndex',
      'exiftoolDOMNode' => 'ExifIFD:ExposureIndex',
    ),
    37398 =>
    array (
      'collection' => 'Tag',
      'name' => 'TIFF-EPStandardID',
      'title' => 'TIFF-EP Standard ID',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'TIFF/EPStandardID',
      'exiftoolDOMNode' => 'ExifIFD:TIFF-EPStandardID',
    ),
    37399 =>
    array (
      'collection' => 'Tag',
      'name' => 'SensingMethod',
      'title' => 'Sensing Method',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Monochrome area',
          2 => 'One-chip color area',
          3 => 'Two-chip color area',
          4 => 'Three-chip color area',
          5 => 'Color sequential area',
          6 => 'Monochrome linear',
          7 => 'Trilinear',
          8 => 'Color sequential linear',
        ),
      ),
      'phpExifTag' => 'SensingMethod',
      'exiftoolDOMNode' => 'ExifIFD:SensingMethod',
    ),
    37434 =>
    array (
      'collection' => 'Tag',
      'name' => 'CIP3DataFile',
      'title' => 'CIP3 Data File',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:CIP3DataFile',
    ),
    37435 =>
    array (
      'collection' => 'Tag',
      'name' => 'CIP3Sheet',
      'title' => 'CIP3 Sheet',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:CIP3Sheet',
    ),
    37436 =>
    array (
      'collection' => 'Tag',
      'name' => 'CIP3Side',
      'title' => 'CIP3 Side',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:CIP3Side',
    ),
    37439 =>
    array (
      'collection' => 'Tag',
      'name' => 'StoNits',
      'title' => 'Sto Nits',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'StoNits',
      'exiftoolDOMNode' => 'ExifIFD:StoNits',
    ),
    37500 =>
    array (
      'collection' => 'Tag',
      'name' => 'MakerNoteApple',
      'title' => 'Maker Note Apple',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MakerNoteApple',
    ),
    37510 =>
    array (
      'collection' => 'Tag',
      'name' => 'UserComment',
      'title' => 'User Comment',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'UserComment',
      'exiftoolDOMNode' => 'ExifIFD:UserComment',
    ),
    37520 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubSecTime',
      'title' => 'Sub Sec Time',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'SubSecTime',
      'exiftoolDOMNode' => 'ExifIFD:SubSecTime',
    ),
    37521 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubSecTimeOriginal',
      'title' => 'Sub Sec Time Original',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'SubSecTimeOriginal',
      'exiftoolDOMNode' => 'ExifIFD:SubSecTimeOriginal',
    ),
    37522 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubSecTimeDigitized',
      'title' => 'Sub Sec Time Digitized',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'SubSecTimeDigitized',
      'exiftoolDOMNode' => 'ExifIFD:SubSecTimeDigitized',
    ),
    37679 =>
    array (
      'collection' => 'Tag',
      'name' => 'MSDocumentText',
      'title' => 'MS Document Text',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MSDocumentText',
    ),
    37680 =>
    array (
      'collection' => 'Tag',
      'name' => 'MSPropertySetStorage',
      'title' => 'MS Property Set Storage',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MSPropertySetStorage',
    ),
    37681 =>
    array (
      'collection' => 'Tag',
      'name' => 'MSDocumentTextPosition',
      'title' => 'MS Document Text Position',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MSDocumentTextPosition',
    ),
    37724 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageSourceData',
      'title' => 'Image Source Data',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ImageSourceData',
      'exiftoolDOMNode' => 'IFD0:ImageSourceData',
    ),
    37888 =>
    array (
      'collection' => 'Tag',
      'name' => 'AmbientTemperature',
      'title' => 'Ambient Temperature',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'ExifIFD:AmbientTemperature',
    ),
    37889 =>
    array (
      'collection' => 'Tag',
      'name' => 'Humidity',
      'title' => 'Humidity',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Humidity',
    ),
    37890 =>
    array (
      'collection' => 'Tag',
      'name' => 'Pressure',
      'title' => 'Pressure',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Pressure',
    ),
    37891 =>
    array (
      'collection' => 'Tag',
      'name' => 'WaterDepth',
      'title' => 'Water Depth',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WaterDepth',
    ),
    37892 =>
    array (
      'collection' => 'Tag',
      'name' => 'Acceleration',
      'title' => 'Acceleration',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Acceleration',
    ),
    37893 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraElevationAngle',
      'title' => 'Camera Elevation Angle',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'ExifIFD:CameraElevationAngle',
    ),
    40091 =>
    array (
      'collection' => 'Tag',
      'name' => 'XPTitle',
      'title' => 'XP Title',
      'format' =>
      array (
        0 => 1,
      ),
      'phpExifTag' => 'Title',
      'exiftoolDOMNode' => 'IFD0:XPTitle',
    ),
    40092 =>
    array (
      'collection' => 'Tag',
      'name' => 'XPComment',
      'title' => 'XP Comment',
      'format' =>
      array (
        0 => 1,
      ),
      'phpExifTag' => 'Comments',
      'exiftoolDOMNode' => 'IFD0:XPComment',
    ),
    40093 =>
    array (
      'collection' => 'Tag',
      'name' => 'XPAuthor',
      'title' => 'XP Author',
      'format' =>
      array (
        0 => 1,
      ),
      'phpExifTag' => 'Author',
      'exiftoolDOMNode' => 'IFD0:XPAuthor',
    ),
    40094 =>
    array (
      'collection' => 'Tag',
      'name' => 'XPKeywords',
      'title' => 'XP Keywords',
      'format' =>
      array (
        0 => 1,
      ),
      'phpExifTag' => 'Keywords',
      'exiftoolDOMNode' => 'IFD0:XPKeywords',
    ),
    40095 =>
    array (
      'collection' => 'Tag',
      'name' => 'XPSubject',
      'title' => 'XP Subject',
      'format' =>
      array (
        0 => 1,
      ),
      'phpExifTag' => 'Subject',
      'exiftoolDOMNode' => 'IFD0:XPSubject',
    ),
    40960 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashpixVersion',
      'title' => 'Flashpix Version',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'FlashPixVersion',
      'exiftoolDOMNode' => 'ExifIFD:FlashpixVersion',
    ),
    40961 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorSpace',
      'title' => 'Color Space',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'sRGB',
          2 => 'Adobe RGB',
          65533 => 'Wide Gamut RGB',
          65534 => 'ICC Profile',
          65535 => 'Uncalibrated',
        ),
      ),
      'phpExifTag' => 'ColorSpace',
      'exiftoolDOMNode' => 'ExifIFD:ColorSpace',
    ),
    40962 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExifImageWidth',
      'title' => 'Exif Image Width',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'ExifImageWidth',
      'exiftoolDOMNode' => 'ExifIFD:ExifImageWidth',
    ),
    40963 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExifImageHeight',
      'title' => 'Exif Image Height',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'ExifImageLength',
      'exiftoolDOMNode' => 'ExifIFD:ExifImageHeight',
    ),
    40964 =>
    array (
      'collection' => 'Tag',
      'name' => 'RelatedSoundFile',
      'title' => 'Related Sound File',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'RelatedSoundFile',
      'exiftoolDOMNode' => 'ExifIFD:RelatedSoundFile',
    ),
    40976 =>
    array (
      'collection' => 'Tag',
      'name' => 'SamsungRawPointersOffset',
      'title' => 'Samsung Raw Pointers Offset',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SamsungRawPointersOffset',
    ),
    40977 =>
    array (
      'collection' => 'Tag',
      'name' => 'SamsungRawPointersLength',
      'title' => 'Samsung Raw Pointers Length',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SamsungRawPointersLength',
    ),
    41217 =>
    array (
      'collection' => 'Tag',
      'name' => 'SamsungRawByteOrder',
      'title' => 'Samsung Raw Byte Order',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SamsungRawByteOrder',
    ),
    41218 =>
    array (
      'collection' => 'Tag',
      'name' => 'SamsungRawUnknown',
      'title' => 'Samsung Raw Unknown',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SamsungRawUnknown',
    ),
    41483 =>
    array (
      'collection' => 'Tag',
      'name' => 'FlashEnergy',
      'title' => 'Flash Energy',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'FlashEnergy',
      'exiftoolDOMNode' => 'ExifIFD:FlashEnergy',
    ),
    41484 =>
    array (
      'collection' => 'Tag',
      'name' => 'SpatialFrequencyResponse',
      'title' => 'Spatial Frequency Response',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'SpatialFrequencyResponse',
      'exiftoolDOMNode' => 'ExifIFD:SpatialFrequencyResponse',
    ),
    41485 =>
    array (
      'collection' => 'Tag',
      'name' => 'Noise',
      'title' => 'Noise',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'Noise',
      'exiftoolDOMNode' => 'ExifIFD:Noise',
    ),
    41486 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneXResolution',
      'title' => 'Focal Plane X Resolution',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'FocalPlaneXResolution',
      'exiftoolDOMNode' => 'ExifIFD:FocalPlaneXResolution',
    ),
    41487 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneYResolution',
      'title' => 'Focal Plane Y Resolution',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'FocalPlaneYResolution',
      'exiftoolDOMNode' => 'ExifIFD:FocalPlaneYResolution',
    ),
    41488 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalPlaneResolutionUnit',
      'title' => 'Focal Plane Resolution Unit',
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
          4 => 'mm',
          5 => 'um',
        ),
      ),
      'phpExifTag' => 'FocalPlaneResolutionUnit',
      'exiftoolDOMNode' => 'ExifIFD:FocalPlaneResolutionUnit',
    ),
    41489 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageNumber',
      'title' => 'Image Number',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ImageNumber',
      'exiftoolDOMNode' => 'ExifIFD:ImageNumber',
    ),
    41490 =>
    array (
      'collection' => 'Tag',
      'name' => 'SecurityClassification',
      'title' => 'Security Classification',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'SecurityClassification',
      'exiftoolDOMNode' => 'ExifIFD:SecurityClassification',
    ),
    41491 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageHistory',
      'title' => 'Image History',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'ImageHistory',
      'exiftoolDOMNode' => 'ExifIFD:ImageHistory',
    ),
    41492 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubjectLocation',
      'title' => 'Subject Location',
      'components' => 2,
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'SubjectLocation',
      'exiftoolDOMNode' => 'ExifIFD:SubjectLocation',
    ),
    41493 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureIndex',
      'title' => 'Exposure Index',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'ExposureIndex',
      'exiftoolDOMNode' => 'ExifIFD:ExposureIndex',
    ),
    41494 =>
    array (
      'collection' => 'Tag',
      'name' => 'TIFF-EPStandardID',
      'title' => 'TIFF-EP Standard ID',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'TIFF/EPStandardID',
      'exiftoolDOMNode' => 'ExifIFD:TIFF-EPStandardID',
    ),
    41495 =>
    array (
      'collection' => 'Tag',
      'name' => 'SensingMethod',
      'title' => 'Sensing Method',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Not defined',
          2 => 'One-chip color area',
          3 => 'Two-chip color area',
          4 => 'Three-chip color area',
          5 => 'Color sequential area',
          7 => 'Trilinear',
          8 => 'Color sequential linear',
        ),
      ),
      'phpExifTag' => 'SensingMethod',
      'exiftoolDOMNode' => 'ExifIFD:SensingMethod',
    ),
    41728 =>
    array (
      'collection' => 'Tag',
      'name' => 'FileSource',
      'title' => 'File Source',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Film Scanner',
          2 => 'Reflection Print Scanner',
          3 => 'Digital Camera',
          '\\x03\\x00\\x00\\x00' => 'Sigma Digital Camera',
        ),
      ),
      'phpExifTag' => 'FileSource',
      'exiftoolDOMNode' => 'ExifIFD:FileSource',
    ),
    41729 =>
    array (
      'collection' => 'Tag',
      'name' => 'SceneType',
      'title' => 'Scene Type',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Directly photographed',
        ),
      ),
      'phpExifTag' => 'SceneType',
      'exiftoolDOMNode' => 'ExifIFD:SceneType',
    ),
    41730 =>
    array (
      'collection' => 'Tag',
      'name' => 'CFAPattern',
      'title' => 'CFA Pattern',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'CFAPattern',
      'exiftoolDOMNode' => 'ExifIFD:CFAPattern',
    ),
    41985 =>
    array (
      'collection' => 'Tag',
      'name' => 'CustomRendered',
      'title' => 'Custom Rendered',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Custom',
          3 => 'HDR',
          6 => 'Panorama',
          8 => 'Portrait',
        ),
      ),
      'phpExifTag' => 'CustomRendered',
      'exiftoolDOMNode' => 'ExifIFD:CustomRendered',
    ),
    41986 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExposureMode',
      'title' => 'Exposure Mode',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => 'Manual',
          2 => 'Auto bracket',
        ),
      ),
      'phpExifTag' => 'ExposureMode',
      'exiftoolDOMNode' => 'ExifIFD:ExposureMode',
    ),
    41987 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteBalance',
      'title' => 'White Balance',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Auto',
          1 => 'Manual',
        ),
      ),
      'phpExifTag' => 'WhiteBalance',
      'exiftoolDOMNode' => 'ExifIFD:WhiteBalance',
    ),
    41988 =>
    array (
      'collection' => 'Tag',
      'name' => 'DigitalZoomRatio',
      'title' => 'Digital Zoom Ratio',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'DigitalZoomRatio',
      'exiftoolDOMNode' => 'ExifIFD:DigitalZoomRatio',
    ),
    41989 =>
    array (
      'collection' => 'Tag',
      'name' => 'FocalLengthIn35mmFormat',
      'title' => 'Focal Length In 35mm Format',
      'format' =>
      array (
        0 => 3,
      ),
      'phpExifTag' => 'FocalLengthIn35mmFilm',
      'exiftoolDOMNode' => 'ExifIFD:FocalLengthIn35mmFormat',
    ),
    41990 =>
    array (
      'collection' => 'Tag',
      'name' => 'SceneCaptureType',
      'title' => 'Scene Capture Type',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Standard',
          1 => 'Landscape',
          2 => 'Portrait',
          3 => 'Night',
        ),
      ),
      'phpExifTag' => 'SceneCaptureType',
      'exiftoolDOMNode' => 'ExifIFD:SceneCaptureType',
    ),
    41991 =>
    array (
      'collection' => 'Tag',
      'name' => 'GainControl',
      'title' => 'Gain Control',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'None',
          1 => 'Low gain up',
          2 => 'High gain up',
          3 => 'Low gain down',
          4 => 'High gain down',
        ),
      ),
      'phpExifTag' => 'GainControl',
      'exiftoolDOMNode' => 'ExifIFD:GainControl',
    ),
    41992 =>
    array (
      'collection' => 'Tag',
      'name' => 'Contrast',
      'title' => 'Contrast',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Low',
          2 => 'High',
        ),
      ),
      'phpExifTag' => 'Contrast',
      'exiftoolDOMNode' => 'ExifIFD:Contrast',
    ),
    41993 =>
    array (
      'collection' => 'Tag',
      'name' => 'Saturation',
      'title' => 'Saturation',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Low',
          2 => 'High',
        ),
      ),
      'phpExifTag' => 'Saturation',
      'exiftoolDOMNode' => 'ExifIFD:Saturation',
    ),
    41994 =>
    array (
      'collection' => 'Tag',
      'name' => 'Sharpness',
      'title' => 'Sharpness',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Normal',
          1 => 'Soft',
          2 => 'Hard',
        ),
      ),
      'phpExifTag' => 'Sharpness',
      'exiftoolDOMNode' => 'ExifIFD:Sharpness',
    ),
    41995 =>
    array (
      'collection' => 'Tag',
      'name' => 'DeviceSettingDescription',
      'title' => 'Device Setting Description',
      'format' =>
      array (
        0 => 7,
      ),
      'phpExifTag' => 'DeviceSettingDescription',
      'exiftoolDOMNode' => 'ExifIFD:DeviceSettingDescription',
    ),
    41996 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubjectDistanceRange',
      'title' => 'Subject Distance Range',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Unknown',
          1 => 'Macro',
          2 => 'Close',
          3 => 'Distant',
        ),
      ),
      'phpExifTag' => 'SubjectDistanceRange',
      'exiftoolDOMNode' => 'ExifIFD:SubjectDistanceRange',
    ),
    42016 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageUniqueID',
      'title' => 'Image Unique ID',
      'format' =>
      array (
        0 => 2,
      ),
      'phpExifTag' => 'ImageUniqueID',
      'exiftoolDOMNode' => 'ExifIFD:ImageUniqueID',
    ),
    42032 =>
    array (
      'collection' => 'Tag',
      'name' => 'OwnerName',
      'title' => 'Owner Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OwnerName',
    ),
    42033 =>
    array (
      'collection' => 'Tag',
      'name' => 'SerialNumber',
      'title' => 'Serial Number',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SerialNumber',
    ),
    42034 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensInfo',
      'title' => 'Lens Info',
      'components' => 4,
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'ExifIFD:LensInfo',
    ),
    42035 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensMake',
      'title' => 'Lens Make',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:LensMake',
    ),
    42036 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensModel',
      'title' => 'Lens Model',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:LensModel',
    ),
    42037 =>
    array (
      'collection' => 'Tag',
      'name' => 'LensSerialNumber',
      'title' => 'Lens Serial Number',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:LensSerialNumber',
    ),
    42112 =>
    array (
      'collection' => 'Tag',
      'name' => 'GDALMetadata',
      'title' => 'GDAL Metadata',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:GDALMetadata',
    ),
    42113 =>
    array (
      'collection' => 'Tag',
      'name' => 'GDALNoData',
      'title' => 'GDAL No Data',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:GDALNoData',
    ),
    42240 =>
    array (
      'collection' => 'Tag',
      'name' => 'Gamma',
      'title' => 'Gamma',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Gamma',
    ),
    44992 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExpandSoftware',
      'title' => 'Expand Software',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ExpandSoftware',
    ),
    44993 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExpandLens',
      'title' => 'Expand Lens',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ExpandLens',
    ),
    44994 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExpandFilm',
      'title' => 'Expand Film',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ExpandFilm',
    ),
    44995 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExpandFilterLens',
      'title' => 'Expand Filter Lens',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ExpandFilterLens',
    ),
    44996 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExpandScanner',
      'title' => 'Expand Scanner',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ExpandScanner',
    ),
    44997 =>
    array (
      'collection' => 'Tag',
      'name' => 'ExpandFlashLamp',
      'title' => 'Expand Flash Lamp',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ExpandFlashLamp',
    ),
    48129 =>
    array (
      'collection' => 'Tag',
      'name' => 'PixelFormat',
      'title' => 'Pixel Format',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          5 => 'Black & White',
          8 => '8-bit Gray',
          9 => '16-bit BGR555',
          10 => '16-bit BGR565',
          11 => '16-bit Gray',
          12 => '24-bit BGR',
          13 => '24-bit RGB',
          14 => '32-bit BGR',
          15 => '32-bit BGRA',
          16 => '32-bit PBGRA',
          17 => '32-bit Gray Float',
          18 => '48-bit RGB Fixed Point',
          19 => '32-bit BGR101010',
          21 => '48-bit RGB',
          22 => '64-bit RGBA',
          23 => '64-bit PRGBA',
          24 => '96-bit RGB Fixed Point',
          25 => '128-bit RGBA Float',
          26 => '128-bit PRGBA Float',
          27 => '128-bit RGB Float',
          28 => '32-bit CMYK',
          29 => '64-bit RGBA Fixed Point',
          30 => '128-bit RGBA Fixed Point',
          31 => '64-bit CMYK',
          32 => '24-bit 3 Channels',
          33 => '32-bit 4 Channels',
          34 => '40-bit 5 Channels',
          35 => '48-bit 6 Channels',
          36 => '56-bit 7 Channels',
          37 => '64-bit 8 Channels',
          38 => '48-bit 3 Channels',
          39 => '64-bit 4 Channels',
          40 => '80-bit 5 Channels',
          41 => '96-bit 6 Channels',
          42 => '112-bit 7 Channels',
          43 => '128-bit 8 Channels',
          44 => '40-bit CMYK Alpha',
          45 => '80-bit CMYK Alpha',
          46 => '32-bit 3 Channels Alpha',
          47 => '40-bit 4 Channels Alpha',
          48 => '48-bit 5 Channels Alpha',
          49 => '56-bit 6 Channels Alpha',
          50 => '64-bit 7 Channels Alpha',
          51 => '72-bit 8 Channels Alpha',
          52 => '64-bit 3 Channels Alpha',
          53 => '80-bit 4 Channels Alpha',
          54 => '96-bit 5 Channels Alpha',
          55 => '112-bit 6 Channels Alpha',
          56 => '128-bit 7 Channels Alpha',
          57 => '144-bit 8 Channels Alpha',
          58 => '64-bit RGBA Half',
          59 => '48-bit RGB Half',
          61 => '32-bit RGBE',
          62 => '16-bit Gray Half',
          63 => '32-bit Gray Fixed Point',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:PixelFormat',
    ),
    48130 =>
    array (
      'collection' => 'Tag',
      'name' => 'Transformation',
      'title' => 'Transformation',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Horizontal (normal)',
          1 => 'Mirror vertical',
          2 => 'Mirror horizontal',
          3 => 'Rotate 180',
          4 => 'Rotate 90 CW',
          5 => 'Mirror horizontal and rotate 90 CW',
          6 => 'Mirror horizontal and rotate 270 CW',
          7 => 'Rotate 270 CW',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:Transformation',
    ),
    48131 =>
    array (
      'collection' => 'Tag',
      'name' => 'Uncompressed',
      'title' => 'Uncompressed',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'No',
          1 => 'Yes',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:Uncompressed',
    ),
    48132 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageType',
      'title' => 'Image Type',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Preview',
          2 => 'Page',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageType',
    ),
    48256 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageWidth',
      'title' => 'Image Width',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageWidth',
    ),
    48257 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageHeight',
      'title' => 'Image Height',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageHeight',
    ),
    48258 =>
    array (
      'collection' => 'Tag',
      'name' => 'WidthResolution',
      'title' => 'Width Resolution',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WidthResolution',
    ),
    48259 =>
    array (
      'collection' => 'Tag',
      'name' => 'HeightResolution',
      'title' => 'Height Resolution',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:HeightResolution',
    ),
    48320 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageOffset',
      'title' => 'Image Offset',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageOffset',
    ),
    48321 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageByteCount',
      'title' => 'Image Byte Count',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageByteCount',
    ),
    48322 =>
    array (
      'collection' => 'Tag',
      'name' => 'AlphaOffset',
      'title' => 'Alpha Offset',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:AlphaOffset',
    ),
    48323 =>
    array (
      'collection' => 'Tag',
      'name' => 'AlphaByteCount',
      'title' => 'Alpha Byte Count',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:AlphaByteCount',
    ),
    48324 =>
    array (
      'collection' => 'Tag',
      'name' => 'ImageDataDiscard',
      'title' => 'Image Data Discard',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Full Resolution',
          1 => 'Flexbits Discarded',
          2 => 'HighPass Frequency Data Discarded',
          3 => 'Highpass and LowPass Frequency Data Discarded',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:ImageDataDiscard',
    ),
    48325 =>
    array (
      'collection' => 'Tag',
      'name' => 'AlphaDataDiscard',
      'title' => 'Alpha Data Discard',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Full Resolution',
          1 => 'Flexbits Discarded',
          2 => 'HighPass Frequency Data Discarded',
          3 => 'Highpass and LowPass Frequency Data Discarded',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:AlphaDataDiscard',
    ),
    50215 =>
    array (
      'collection' => 'Tag',
      'name' => 'OceScanjobDesc',
      'title' => 'Oce Scanjob Desc',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OceScanjobDesc',
    ),
    50216 =>
    array (
      'collection' => 'Tag',
      'name' => 'OceApplicationSelector',
      'title' => 'Oce Application Selector',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OceApplicationSelector',
    ),
    50217 =>
    array (
      'collection' => 'Tag',
      'name' => 'OceIDNumber',
      'title' => 'Oce ID Number',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OceIDNumber',
    ),
    50218 =>
    array (
      'collection' => 'Tag',
      'name' => 'OceImageLogic',
      'title' => 'Oce Image Logic',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OceImageLogic',
    ),
    50255 =>
    array (
      'collection' => 'Tag',
      'name' => 'Annotations',
      'title' => 'Annotations',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Annotations',
    ),
    50341 =>
    array (
      'collection' => 'Tag',
      'name' => 'PrintIM',
      'title' => 'Print Image Matching',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:PrintIM',
    ),
    50547 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalFileName',
      'title' => 'Original File Name',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OriginalFileName',
    ),
    50560 =>
    array (
      'collection' => 'Tag',
      'name' => 'USPTOOriginalContentType',
      'title' => 'USPTO Original Content Type',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          0 => 'Text or Drawing',
          1 => 'Grayscale',
          2 => 'Color',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:USPTOOriginalContentType',
    ),
    50656 =>
    array (
      'collection' => 'Tag',
      'name' => 'CR2CFAPattern',
      'title' => 'CR2 CFA Pattern',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          '0 1 1 2' => '[Red,Green][Green,Blue]',
          '1 0 2 1' => '[Green,Red][Blue,Green]',
          '1 2 0 1' => '[Green,Blue][Red,Green]',
          '2 1 1 0' => '[Blue,Green][Green,Red]',
        ),
      ),
      'exiftoolDOMNode' => 'ExifIFD:CR2CFAPattern',
    ),
    50706 =>
    array (
      'collection' => 'Tag',
      'name' => 'DNGVersion',
      'title' => 'DNG Version',
      'components' => 4,
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:DNGVersion',
    ),
    50707 =>
    array (
      'collection' => 'Tag',
      'name' => 'DNGBackwardVersion',
      'title' => 'DNG Backward Version',
      'components' => 4,
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:DNGBackwardVersion',
    ),
    50708 =>
    array (
      'collection' => 'Tag',
      'name' => 'UniqueCameraModel',
      'title' => 'Unique Camera Model',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:UniqueCameraModel',
    ),
    50709 =>
    array (
      'collection' => 'Tag',
      'name' => 'LocalizedCameraModel',
      'title' => 'Localized Camera Model',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:LocalizedCameraModel',
    ),
    50710 =>
    array (
      'collection' => 'Tag',
      'name' => 'CFAPlaneColor',
      'title' => 'CFA Plane Color',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'SubIFD:CFAPlaneColor',
    ),
    50711 =>
    array (
      'collection' => 'Tag',
      'name' => 'CFALayout',
      'title' => 'CFA Layout',
      'format' =>
      array (
        0 => 7,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          1 => 'Rectangular',
          2 => 'Even columns offset down 1/2 row',
          3 => 'Even columns offset up 1/2 row',
          4 => 'Even rows offset right 1/2 column',
          5 => 'Even rows offset left 1/2 column',
          6 => 'Even rows offset up by 1/2 row, even columns offset left by 1/2 column',
          7 => 'Even rows offset up by 1/2 row, even columns offset right by 1/2 column',
          8 => 'Even rows offset down by 1/2 row, even columns offset left by 1/2 column',
          9 => 'Even rows offset down by 1/2 row, even columns offset right by 1/2 column',
        ),
      ),
      'exiftoolDOMNode' => 'SubIFD:CFALayout',
    ),
    50712 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearizationTable',
      'title' => 'Linearization Table',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'SubIFD:LinearizationTable',
    ),
    50713 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlackLevelRepeatDim',
      'title' => 'Black Level Repeat Dim',
      'components' => 2,
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'SubIFD:BlackLevelRepeatDim',
    ),
    50714 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlackLevel',
      'title' => 'Black Level',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'SubIFD:BlackLevel',
    ),
    50715 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlackLevelDeltaH',
      'title' => 'Black Level Delta H',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'SubIFD:BlackLevelDeltaH',
    ),
    50716 =>
    array (
      'collection' => 'Tag',
      'name' => 'BlackLevelDeltaV',
      'title' => 'Black Level Delta V',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'SubIFD:BlackLevelDeltaV',
    ),
    50717 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteLevel',
      'title' => 'White Level',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'SubIFD:WhiteLevel',
    ),
    50718 =>
    array (
      'collection' => 'Tag',
      'name' => 'DefaultScale',
      'title' => 'Default Scale',
      'components' => 2,
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'SubIFD:DefaultScale',
    ),
    50719 =>
    array (
      'collection' => 'Tag',
      'name' => 'DefaultCropOrigin',
      'title' => 'Default Crop Origin',
      'components' => 2,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'SubIFD:DefaultCropOrigin',
    ),
    50720 =>
    array (
      'collection' => 'Tag',
      'name' => 'DefaultCropSize',
      'title' => 'Default Crop Size',
      'components' => 2,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'SubIFD:DefaultCropSize',
    ),
    50721 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorMatrix1',
      'title' => 'Color Matrix 1',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:ColorMatrix1',
    ),
    50722 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorMatrix2',
      'title' => 'Color Matrix 2',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:ColorMatrix2',
    ),
    50723 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraCalibration1',
      'title' => 'Camera Calibration 1',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:CameraCalibration1',
    ),
    50724 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraCalibration2',
      'title' => 'Camera Calibration 2',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:CameraCalibration2',
    ),
    50725 =>
    array (
      'collection' => 'Tag',
      'name' => 'ReductionMatrix1',
      'title' => 'Reduction Matrix 1',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:ReductionMatrix1',
    ),
    50726 =>
    array (
      'collection' => 'Tag',
      'name' => 'ReductionMatrix2',
      'title' => 'Reduction Matrix 2',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:ReductionMatrix2',
    ),
    50727 =>
    array (
      'collection' => 'Tag',
      'name' => 'AnalogBalance',
      'title' => 'Analog Balance',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:AnalogBalance',
    ),
    50728 =>
    array (
      'collection' => 'Tag',
      'name' => 'AsShotNeutral',
      'title' => 'As Shot Neutral',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:AsShotNeutral',
    ),
    50729 =>
    array (
      'collection' => 'Tag',
      'name' => 'AsShotWhiteXY',
      'title' => 'As Shot White XY',
      'components' => 2,
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:AsShotWhiteXY',
    ),
    50730 =>
    array (
      'collection' => 'Tag',
      'name' => 'BaselineExposure',
      'title' => 'Baseline Exposure',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:BaselineExposure',
    ),
    50731 =>
    array (
      'collection' => 'Tag',
      'name' => 'BaselineNoise',
      'title' => 'Baseline Noise',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:BaselineNoise',
    ),
    50732 =>
    array (
      'collection' => 'Tag',
      'name' => 'BaselineSharpness',
      'title' => 'Baseline Sharpness',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:BaselineSharpness',
    ),
    50733 =>
    array (
      'collection' => 'Tag',
      'name' => 'BayerGreenSplit',
      'title' => 'Bayer Green Split',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'SubIFD:BayerGreenSplit',
    ),
    50734 =>
    array (
      'collection' => 'Tag',
      'name' => 'LinearResponseLimit',
      'title' => 'Linear Response Limit',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:LinearResponseLimit',
    ),
    50735 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraSerialNumber',
      'title' => 'Camera Serial Number',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:CameraSerialNumber',
    ),
    50736 =>
    array (
      'collection' => 'Tag',
      'name' => 'DNGLensInfo',
      'title' => 'DNG Lens Info',
      'components' => 4,
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:DNGLensInfo',
    ),
    50737 =>
    array (
      'collection' => 'Tag',
      'name' => 'ChromaBlurRadius',
      'title' => 'Chroma Blur Radius',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'SubIFD:ChromaBlurRadius',
    ),
    50738 =>
    array (
      'collection' => 'Tag',
      'name' => 'AntiAliasStrength',
      'title' => 'Anti Alias Strength',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'SubIFD:AntiAliasStrength',
    ),
    50739 =>
    array (
      'collection' => 'Tag',
      'name' => 'ShadowScale',
      'title' => 'Shadow Scale',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:ShadowScale',
    ),
    50740 =>
    array (
      'collection' => 'Tag',
      'name' => 'DNGAdobeData',
      'title' => 'DNG Adobe Data',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:DNGAdobeData',
    ),
    50741 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:MakerNoteSafety',
    ),
    50752 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawImageSegmentation',
      'title' => 'Raw Image Segmentation',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:RawImageSegmentation',
    ),
    50778 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:CalibrationIlluminant1',
    ),
    50779 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:CalibrationIlluminant2',
    ),
    50780 =>
    array (
      'collection' => 'Tag',
      'name' => 'BestQualityScale',
      'title' => 'Best Quality Scale',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'SubIFD:BestQualityScale',
    ),
    50781 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawDataUniqueID',
      'title' => 'Raw Data Unique ID',
      'components' => 16,
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:RawDataUniqueID',
    ),
    50784 =>
    array (
      'collection' => 'Tag',
      'name' => 'AliasLayerMetadata',
      'title' => 'Alias Layer Metadata',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:AliasLayerMetadata',
    ),
    50827 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalRawFileName',
      'title' => 'Original Raw File Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:OriginalRawFileName',
    ),
    50828 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalRawFileData',
      'title' => 'Original Raw File Data',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:OriginalRawFileData',
    ),
    50829 =>
    array (
      'collection' => 'Tag',
      'name' => 'ActiveArea',
      'title' => 'Active Area',
      'components' => 4,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'SubIFD:ActiveArea',
    ),
    50830 =>
    array (
      'collection' => 'Tag',
      'name' => 'MaskedAreas',
      'title' => 'Masked Areas',
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'SubIFD:MaskedAreas',
    ),
    50831 =>
    array (
      'collection' => 'Tag',
      'name' => 'AsShotICCProfile',
      'title' => 'As Shot ICC Profile',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:AsShotICCProfile',
    ),
    50832 =>
    array (
      'collection' => 'Tag',
      'name' => 'AsShotPreProfileMatrix',
      'title' => 'As Shot Pre Profile Matrix',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:AsShotPreProfileMatrix',
    ),
    50833 =>
    array (
      'collection' => 'Tag',
      'name' => 'CurrentICCProfile',
      'title' => 'Current ICC Profile',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:CurrentICCProfile',
    ),
    50834 =>
    array (
      'collection' => 'Tag',
      'name' => 'CurrentPreProfileMatrix',
      'title' => 'Current Pre Profile Matrix',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:CurrentPreProfileMatrix',
    ),
    50879 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorimetricReference',
      'title' => 'Colorimetric Reference',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'IFD0:ColorimetricReference',
    ),
    50885 =>
    array (
      'collection' => 'Tag',
      'name' => 'SRawType',
      'title' => 'SRaw Type',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:SRawType',
    ),
    50898 =>
    array (
      'collection' => 'Tag',
      'name' => 'PanasonicTitle',
      'title' => 'Panasonic Title',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:PanasonicTitle',
    ),
    50899 =>
    array (
      'collection' => 'Tag',
      'name' => 'PanasonicTitle2',
      'title' => 'Panasonic Title 2',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'IFD0:PanasonicTitle2',
    ),
    50931 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraCalibrationSig',
      'title' => 'Camera Calibration Sig',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:CameraCalibrationSig',
    ),
    50932 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileCalibrationSig',
      'title' => 'Profile Calibration Sig',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileCalibrationSig',
    ),
    50934 =>
    array (
      'collection' => 'Tag',
      'name' => 'AsShotProfileName',
      'title' => 'As Shot Profile Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:AsShotProfileName',
    ),
    50935 =>
    array (
      'collection' => 'Tag',
      'name' => 'NoiseReductionApplied',
      'title' => 'Noise Reduction Applied',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'SubIFD:NoiseReductionApplied',
    ),
    50936 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileName',
      'title' => 'Profile Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileName',
    ),
    50937 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileHueSatMapDims',
      'title' => 'Profile Hue Sat Map Dims',
      'components' => 3,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileHueSatMapDims',
    ),
    50938 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileHueSatMapData1',
      'title' => 'Profile Hue Sat Map Data 1',
      'format' =>
      array (
        0 => 11,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileHueSatMapData1',
    ),
    50939 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileHueSatMapData2',
      'title' => 'Profile Hue Sat Map Data 2',
      'format' =>
      array (
        0 => 11,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileHueSatMapData2',
    ),
    50940 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileToneCurve',
      'title' => 'Profile Tone Curve',
      'format' =>
      array (
        0 => 11,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileToneCurve',
    ),
    50941 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:ProfileEmbedPolicy',
    ),
    50942 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileCopyright',
      'title' => 'Profile Copyright',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileCopyright',
    ),
    50964 =>
    array (
      'collection' => 'Tag',
      'name' => 'ForwardMatrix1',
      'title' => 'Forward Matrix 1',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:ForwardMatrix1',
    ),
    50965 =>
    array (
      'collection' => 'Tag',
      'name' => 'ForwardMatrix2',
      'title' => 'Forward Matrix 2',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:ForwardMatrix2',
    ),
    50966 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewApplicationName',
      'title' => 'Preview Application Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:PreviewApplicationName',
    ),
    50967 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewApplicationVersion',
      'title' => 'Preview Application Version',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:PreviewApplicationVersion',
    ),
    50968 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewSettingsName',
      'title' => 'Preview Settings Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:PreviewSettingsName',
    ),
    50969 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewSettingsDigest',
      'title' => 'Preview Settings Digest',
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:PreviewSettingsDigest',
    ),
    50970 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:PreviewColorSpace',
    ),
    50971 =>
    array (
      'collection' => 'Tag',
      'name' => 'PreviewDateTime',
      'title' => 'Preview Date Time',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:PreviewDateTime',
    ),
    50972 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawImageDigest',
      'title' => 'Raw Image Digest',
      'components' => 16,
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:RawImageDigest',
    ),
    50973 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalRawFileDigest',
      'title' => 'Original Raw File Digest',
      'components' => 16,
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:OriginalRawFileDigest',
    ),
    50974 =>
    array (
      'collection' => 'Tag',
      'name' => 'SubTileBlockSize',
      'title' => 'Sub Tile Block Size',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SubTileBlockSize',
    ),
    50975 =>
    array (
      'collection' => 'Tag',
      'name' => 'RowInterleaveFactor',
      'title' => 'Row Interleave Factor',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:RowInterleaveFactor',
    ),
    50981 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileLookTableDims',
      'title' => 'Profile Look Table Dims',
      'components' => 3,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileLookTableDims',
    ),
    50982 =>
    array (
      'collection' => 'Tag',
      'name' => 'ProfileLookTableData',
      'title' => 'Profile Look Table Data',
      'format' =>
      array (
        0 => 11,
      ),
      'exiftoolDOMNode' => 'IFD0:ProfileLookTableData',
    ),
    51008 =>
    array (
      'collection' => 'Tag',
      'name' => 'OpcodeList1',
      'title' => 'Opcode List 1',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'SubIFD:OpcodeList1',
    ),
    51009 =>
    array (
      'collection' => 'Tag',
      'name' => 'OpcodeList2',
      'title' => 'Opcode List 2',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'SubIFD:OpcodeList2',
    ),
    51022 =>
    array (
      'collection' => 'Tag',
      'name' => 'OpcodeList3',
      'title' => 'Opcode List 3',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'SubIFD:OpcodeList3',
    ),
    51041 =>
    array (
      'collection' => 'Tag',
      'name' => 'NoiseProfile',
      'title' => 'Noise Profile',
      'format' =>
      array (
        0 => 12,
      ),
      'exiftoolDOMNode' => 'SubIFD:NoiseProfile',
    ),
    51043 =>
    array (
      'collection' => 'Tag',
      'name' => 'TimeCodes',
      'title' => 'Time Codes',
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:TimeCodes',
    ),
    51044 =>
    array (
      'collection' => 'Tag',
      'name' => 'FrameRate',
      'title' => 'Frame Rate',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:FrameRate',
    ),
    51058 =>
    array (
      'collection' => 'Tag',
      'name' => 'TStop',
      'title' => 'T Stop',
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:TStop',
    ),
    51081 =>
    array (
      'collection' => 'Tag',
      'name' => 'ReelName',
      'title' => 'Reel Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:ReelName',
    ),
    51089 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalDefaultFinalSize',
      'title' => 'Original Default Final Size',
      'components' => 2,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'IFD0:OriginalDefaultFinalSize',
    ),
    51090 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalBestQualitySize',
      'title' => 'Original Best Quality Size',
      'components' => 2,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'IFD0:OriginalBestQualitySize',
    ),
    51091 =>
    array (
      'collection' => 'Tag',
      'name' => 'OriginalDefaultCropSize',
      'title' => 'Original Default Crop Size',
      'components' => 2,
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'IFD0:OriginalDefaultCropSize',
    ),
    51105 =>
    array (
      'collection' => 'Tag',
      'name' => 'CameraLabel',
      'title' => 'Camera Label',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'IFD0:CameraLabel',
    ),
    51107 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:ProfileHueSatMapEncoding',
    ),
    51108 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:ProfileLookTableEncoding',
    ),
    51109 =>
    array (
      'collection' => 'Tag',
      'name' => 'BaselineExposureOffset',
      'title' => 'Baseline Exposure Offset',
      'format' =>
      array (
        0 => 10,
      ),
      'exiftoolDOMNode' => 'IFD0:BaselineExposureOffset',
    ),
    51110 =>
    array (
      'collection' => 'Tag',
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
      'exiftoolDOMNode' => 'IFD0:DefaultBlackRender',
    ),
    51111 =>
    array (
      'collection' => 'Tag',
      'name' => 'NewRawImageDigest',
      'title' => 'New Raw Image Digest',
      'components' => 16,
      'format' =>
      array (
        0 => 1,
      ),
      'exiftoolDOMNode' => 'IFD0:NewRawImageDigest',
    ),
    51112 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawToPreviewGain',
      'title' => 'Raw To Preview Gain',
      'format' =>
      array (
        0 => 12,
      ),
      'exiftoolDOMNode' => 'IFD0:RawToPreviewGain',
    ),
    51114 =>
    array (
      'collection' => 'Tag',
      'name' => 'CacheVersion',
      'title' => 'Cache Version',
      'components' => 4,
      'format' =>
      array (
        0 => 4,
      ),
      'exiftoolDOMNode' => 'SubIFD2:CacheVersion',
    ),
    51125 =>
    array (
      'collection' => 'Tag',
      'name' => 'DefaultUserCrop',
      'title' => 'Default User Crop',
      'components' => 4,
      'format' =>
      array (
        0 => 5,
      ),
      'exiftoolDOMNode' => 'SubIFD:DefaultUserCrop',
    ),
    59932 =>
    array (
      'collection' => 'Tag',
      'name' => 'Padding',
      'title' => 'Padding',
      'format' =>
      array (
        0 => 7,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Padding',
    ),
    59933 =>
    array (
      'collection' => 'Tag',
      'name' => 'OffsetSchema',
      'title' => 'Offset Schema',
      'format' =>
      array (
        0 => 9,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OffsetSchema',
    ),
    65000 =>
    array (
      'collection' => 'Tag',
      'name' => 'OwnerName',
      'title' => 'Owner Name',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:OwnerName',
    ),
    65001 =>
    array (
      'collection' => 'Tag',
      'name' => 'SerialNumber',
      'title' => 'Serial Number',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:SerialNumber',
    ),
    65002 =>
    array (
      'collection' => 'Tag',
      'name' => 'Lens',
      'title' => 'Lens',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Lens',
    ),
    65100 =>
    array (
      'collection' => 'Tag',
      'name' => 'RawFile',
      'title' => 'Raw File',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:RawFile',
    ),
    65101 =>
    array (
      'collection' => 'Tag',
      'name' => 'Converter',
      'title' => 'Converter',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Converter',
    ),
    65102 =>
    array (
      'collection' => 'Tag',
      'name' => 'WhiteBalance',
      'title' => 'White Balance',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:WhiteBalance',
    ),
    65105 =>
    array (
      'collection' => 'Tag',
      'name' => 'Exposure',
      'title' => 'Exposure',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Exposure',
    ),
    65106 =>
    array (
      'collection' => 'Tag',
      'name' => 'Shadows',
      'title' => 'Shadows',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Shadows',
    ),
    65107 =>
    array (
      'collection' => 'Tag',
      'name' => 'Brightness',
      'title' => 'Brightness',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Brightness',
    ),
    65108 =>
    array (
      'collection' => 'Tag',
      'name' => 'Contrast',
      'title' => 'Contrast',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Contrast',
    ),
    65109 =>
    array (
      'collection' => 'Tag',
      'name' => 'Saturation',
      'title' => 'Saturation',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Saturation',
    ),
    65110 =>
    array (
      'collection' => 'Tag',
      'name' => 'Sharpness',
      'title' => 'Sharpness',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Sharpness',
    ),
    65111 =>
    array (
      'collection' => 'Tag',
      'name' => 'Smoothness',
      'title' => 'Smoothness',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:Smoothness',
    ),
    65112 =>
    array (
      'collection' => 'Tag',
      'name' => 'MoireFilter',
      'title' => 'Moire Filter',
      'format' =>
      array (
        0 => 2,
      ),
      'exiftoolDOMNode' => 'ExifIFD:MoireFilter',
    ),
  ),
  'itemsByPhpExifTag' =>
  array (
    'ACDComment' => 11,
    'ApertureValue' => 37378,
    'Artist' => 315,
    'Author' => 40093,
    'BatteryLevel' => 33423,
    'BitsPerSample' => 258,
    'BrightnessValue' => 37379,
    'CFAPattern' => 41730,
    'CFARepeatPatternDim' => 33421,
    'ClipPath' => 343,
    'ColorMap' => 320,
    'ColorSpace' => 40961,
    'Comments' => 40092,
    'ComponentsConfiguration' => 37121,
    'CompressedBitsPerPixel' => 37122,
    'Compression' => 259,
    'Contrast' => 41992,
    'Copyright' => 33432,
    'CustomRendered' => 41985,
    'DataType' => 32996,
    'DateTime' => 306,
    'DateTimeDigitized' => 36868,
    'DateTimeOriginal' => 36867,
    'DeviceSettingDescription' => 41995,
    'DigitalZoomRatio' => 41988,
    'DocumentName' => 269,
    'DotRange' => 336,
    'ExifImageLength' => 40963,
    'ExifImageWidth' => 40962,
    'ExifVersion' => 36864,
    'ExposureBiasValue' => 37380,
    'ExposureIndex' => 41493,
    'ExposureMode' => 41986,
    'ExposureProgram' => 34850,
    'ExposureTime' => 33434,
    'ExtensibleMetadataPlatform' => 700,
    'ExtraSample' => 338,
    'FNumber' => 33437,
    'FileSource' => 41728,
    'FillOrder' => 266,
    'Flash' => 37385,
    'FlashEnergy' => 41483,
    'FlashPixVersion' => 40960,
    'FocalLength' => 37386,
    'FocalLengthIn35mmFilm' => 41989,
    'FocalPlaneResolutionUnit' => 41488,
    'FocalPlaneXResolution' => 41486,
    'FocalPlaneYResolution' => 41487,
    'FreeByteCounts' => 289,
    'FreeOffsets' => 288,
    'GainControl' => 41991,
    'GrayResponseCurve' => 291,
    'GrayResponseUnit' => 290,
    'HalfToneHints' => 321,
    'HostComputer' => 316,
    'IPTC/NAA' => 33723,
    'ISOSpeedRatings' => 34855,
    'IT8ColorTable' => 34021,
    'IT8RasterPadding' => 34019,
    'ImageDepth' => 32997,
    'ImageDescription' => 270,
    'ImageHistory' => 41491,
    'ImageID' => 32781,
    'ImageLength' => 257,
    'ImageNumber' => 41489,
    'ImageSourceData' => 37724,
    'ImageUniqueID' => 42016,
    'ImageWidth' => 256,
    'Indexed' => 346,
    'InkNames' => 333,
    'InkSet' => 332,
    'JPEGACTables' => 521,
    'JPEGDCTables' => 520,
    'JPEGInterchangeFormat' => 513,
    'JPEGInterchangeFormatLength' => 514,
    'JPEGLosslessPredictors' => 517,
    'JPEGPointTransforms' => 518,
    'JPEGProc' => 512,
    'JPEGQTables' => 519,
    'JPEGRestartInterval' => 515,
    'JPEGTables' => 347,
    'Keywords' => 40094,
    'LightSource' => 37384,
    'Make' => 271,
    'Matteing' => 32995,
    'MaxApertureValue' => 37381,
    'MaxSampleValue' => 281,
    'MeteringMode' => 37383,
    'MinSampleValue' => 280,
    'Model' => 272,
    'NewSubFile' => 254,
    'Noise' => 41485,
    'NumberOfInks' => 334,
    'OECF' => 34856,
    'OPIProxy' => 351,
    'Orientation' => 274,
    'PageName' => 285,
    'PageNumber' => 297,
    'PhotometricInterpretation' => 262,
    'PlanarConfiguration' => 284,
    'Predictor' => 317,
    'PrimaryChromaticities' => 319,
    'ReferenceBlackWhite' => 532,
    'RelatedImageFileFormat' => 4096,
    'RelatedSoundFile' => 40964,
    'ResolutionUnit' => 296,
    'RowsPerStrip' => 278,
    'SMaxSampleValue' => 341,
    'SMinSampleValue' => 340,
    'SampleFormat' => 339,
    'SamplesPerPixel' => 277,
    'Saturation' => 41993,
    'SceneCaptureType' => 41990,
    'SceneType' => 41729,
    'SecurityClassification' => 41490,
    'SensingMethod' => 41495,
    'Sharpness' => 41994,
    'ShutterSpeedValue' => 37377,
    'Software' => 305,
    'SpatialFrequencyResponse' => 41484,
    'SpectralSensity' => 34852,
    'StoNits' => 37439,
    'StripByteCounts' => 279,
    'StripOffsets' => 273,
    'SubFile' => 255,
    'SubIFD' => 330,
    'SubSecTime' => 37520,
    'SubSecTimeDigitized' => 37522,
    'SubSecTimeOriginal' => 37521,
    'Subject' => 40095,
    'SubjectDistance' => 37382,
    'SubjectDistanceRange' => 41996,
    'SubjectLocation' => 41492,
    'T4Options' => 292,
    'T6Options' => 293,
    'TIFF/EPStandardID' => 41494,
    'TargetPrinter' => 337,
    'TileByteCounts' => 325,
    'TileDepth' => 32998,
    'TileLength' => 323,
    'TileOffsets' => 324,
    'TileWidth' => 322,
    'Title' => 40091,
    'TransferFunction' => 301,
    'TransferRange' => 342,
    'UserComment' => 37510,
    'WhiteBalance' => 41987,
    'WhitePoint' => 318,
    'XClipPathUnits' => 344,
    'XPosition' => 286,
    'XResolution' => 282,
    'YCbCrCoefficients' => 529,
    'YCbCrPositioning' => 531,
    'YCbCrSubSampling' => 530,
    'YClipPathUnits' => 345,
    'YPosition' => 287,
    'YResolution' => 283,
  ),
);
}
