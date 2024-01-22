<?php
namespace FileEye\MediaProbe\Collection;

/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable
class CollectionIndex extends CollectionBase {

  public function getNamespace(): string
  {
      return __NAMESPACE__;
  }

  public static $map = array (
  'id' => 'CollectionIndex',
  'collections' =>
  array (
    'ExifMakerNotes\\Apple\\Main' => 'ExifMakerNotes\\Apple\\Main',
    'ExifMakerNotes\\Apple\\RunTime' => 'ExifMakerNotes\\Apple\\RunTime',
    'ExifMakerNotes\\CanonCustom\\Functions10D' => 'ExifMakerNotes\\CanonCustom\\Functions10D',
    'ExifMakerNotes\\CanonCustom\\Functions1D' => 'ExifMakerNotes\\CanonCustom\\Functions1D',
    'ExifMakerNotes\\CanonCustom\\Functions2' => 'ExifMakerNotes\\CanonCustom\\Functions2',
    'ExifMakerNotes\\CanonCustom\\Functions20D' => 'ExifMakerNotes\\CanonCustom\\Functions20D',
    'ExifMakerNotes\\CanonCustom\\Functions2Header' => 'ExifMakerNotes\\CanonCustom\\Functions2Header',
    'ExifMakerNotes\\CanonCustom\\Functions30D' => 'ExifMakerNotes\\CanonCustom\\Functions30D',
    'ExifMakerNotes\\CanonCustom\\Functions350D' => 'ExifMakerNotes\\CanonCustom\\Functions350D',
    'ExifMakerNotes\\CanonCustom\\Functions400D' => 'ExifMakerNotes\\CanonCustom\\Functions400D',
    'ExifMakerNotes\\CanonCustom\\Functions5D' => 'ExifMakerNotes\\CanonCustom\\Functions5D',
    'ExifMakerNotes\\CanonCustom\\FunctionsD30' => 'ExifMakerNotes\\CanonCustom\\FunctionsD30',
    'ExifMakerNotes\\CanonCustom\\PersonalFuncValues' => 'ExifMakerNotes\\CanonCustom\\PersonalFuncValues',
    'ExifMakerNotes\\CanonCustom\\PersonalFuncs' => 'ExifMakerNotes\\CanonCustom\\PersonalFuncs',
    'ExifMakerNotes\\CanonRaw\\DecoderTable' => 'ExifMakerNotes\\CanonRaw\\DecoderTable',
    'ExifMakerNotes\\CanonRaw\\ExposureInfo' => 'ExifMakerNotes\\CanonRaw\\ExposureInfo',
    'ExifMakerNotes\\CanonRaw\\FlashInfo' => 'ExifMakerNotes\\CanonRaw\\FlashInfo',
    'ExifMakerNotes\\CanonRaw\\ImageFormat' => 'ExifMakerNotes\\CanonRaw\\ImageFormat',
    'ExifMakerNotes\\CanonRaw\\ImageInfo' => 'ExifMakerNotes\\CanonRaw\\ImageInfo',
    'ExifMakerNotes\\CanonRaw\\Main' => 'ExifMakerNotes\\CanonRaw\\Main',
    'ExifMakerNotes\\CanonRaw\\MakeModel' => 'ExifMakerNotes\\CanonRaw\\MakeModel',
    'ExifMakerNotes\\CanonRaw\\RawJpgInfo' => 'ExifMakerNotes\\CanonRaw\\RawJpgInfo',
    'ExifMakerNotes\\CanonRaw\\TimeStamp' => 'ExifMakerNotes\\CanonRaw\\TimeStamp',
    'ExifMakerNotes\\CanonRaw\\WhiteSample' => 'ExifMakerNotes\\CanonRaw\\WhiteSample',
    'ExifMakerNotes\\CanonVRD\\CropInfo' => 'ExifMakerNotes\\CanonVRD\\CropInfo',
    'ExifMakerNotes\\CanonVRD\\DLOInfo' => 'ExifMakerNotes\\CanonVRD\\DLOInfo',
    'ExifMakerNotes\\CanonVRD\\DR4' => 'ExifMakerNotes\\CanonVRD\\DR4',
    'ExifMakerNotes\\CanonVRD\\DR4Header' => 'ExifMakerNotes\\CanonVRD\\DR4Header',
    'ExifMakerNotes\\CanonVRD\\DustInfo' => 'ExifMakerNotes\\CanonVRD\\DustInfo',
    'ExifMakerNotes\\CanonVRD\\GammaInfo' => 'ExifMakerNotes\\CanonVRD\\GammaInfo',
    'ExifMakerNotes\\CanonVRD\\IHL' => 'ExifMakerNotes\\CanonVRD\\IHL',
    'ExifMakerNotes\\CanonVRD\\Main' => 'ExifMakerNotes\\CanonVRD\\Main',
    'ExifMakerNotes\\CanonVRD\\StampInfo' => 'ExifMakerNotes\\CanonVRD\\StampInfo',
    'ExifMakerNotes\\CanonVRD\\StampTool' => 'ExifMakerNotes\\CanonVRD\\StampTool',
    'ExifMakerNotes\\CanonVRD\\ToneCurve' => 'ExifMakerNotes\\CanonVRD\\ToneCurve',
    'ExifMakerNotes\\CanonVRD\\Ver1' => 'ExifMakerNotes\\CanonVRD\\Ver1',
    'ExifMakerNotes\\CanonVRD\\Ver2' => 'ExifMakerNotes\\CanonVRD\\Ver2',
    'ExifMakerNotes\\Canon\\AFConfig' => 'ExifMakerNotes\\Canon\\AFConfig',
    'ExifMakerNotes\\Canon\\AFInfo' => 'ExifMakerNotes\\Canon\\AFInfo',
    'ExifMakerNotes\\Canon\\AFInfo2' => 'ExifMakerNotes\\Canon\\AFInfo2',
    'ExifMakerNotes\\Canon\\AFMicroAdj' => 'ExifMakerNotes\\Canon\\AFMicroAdj',
    'ExifMakerNotes\\Canon\\Ambience' => 'ExifMakerNotes\\Canon\\Ambience',
    'ExifMakerNotes\\Canon\\AspectInfo' => 'ExifMakerNotes\\Canon\\AspectInfo',
    'ExifMakerNotes\\Canon\\CNTH' => 'ExifMakerNotes\\Canon\\CNTH',
    'ExifMakerNotes\\Canon\\CTMD' => 'ExifMakerNotes\\Canon\\CTMD',
    'ExifMakerNotes\\Canon\\CameraInfo1000D' => 'ExifMakerNotes\\Canon\\CameraInfo1000D',
    'ExifMakerNotes\\Canon\\CameraInfo1D' => 'ExifMakerNotes\\Canon\\CameraInfo1D',
    'ExifMakerNotes\\Canon\\CameraInfo1DX' => 'ExifMakerNotes\\Canon\\CameraInfo1DX',
    'ExifMakerNotes\\Canon\\CameraInfo1DmkII' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkII',
    'ExifMakerNotes\\Canon\\CameraInfo1DmkIII' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIII',
    'ExifMakerNotes\\Canon\\CameraInfo1DmkIIN' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIIN',
    'ExifMakerNotes\\Canon\\CameraInfo1DmkIV' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIV',
    'ExifMakerNotes\\Canon\\CameraInfo40D' => 'ExifMakerNotes\\Canon\\CameraInfo40D',
    'ExifMakerNotes\\Canon\\CameraInfo450D' => 'ExifMakerNotes\\Canon\\CameraInfo450D',
    'ExifMakerNotes\\Canon\\CameraInfo500D' => 'ExifMakerNotes\\Canon\\CameraInfo500D',
    'ExifMakerNotes\\Canon\\CameraInfo50D' => 'ExifMakerNotes\\Canon\\CameraInfo50D',
    'ExifMakerNotes\\Canon\\CameraInfo550D' => 'ExifMakerNotes\\Canon\\CameraInfo550D',
    'ExifMakerNotes\\Canon\\CameraInfo5D' => 'ExifMakerNotes\\Canon\\CameraInfo5D',
    'ExifMakerNotes\\Canon\\CameraInfo5DmkII' => 'ExifMakerNotes\\Canon\\CameraInfo5DmkII',
    'ExifMakerNotes\\Canon\\CameraInfo5DmkIII' => 'ExifMakerNotes\\Canon\\CameraInfo5DmkIII',
    'ExifMakerNotes\\Canon\\CameraInfo600D' => 'ExifMakerNotes\\Canon\\CameraInfo600D',
    'ExifMakerNotes\\Canon\\CameraInfo60D' => 'ExifMakerNotes\\Canon\\CameraInfo60D',
    'ExifMakerNotes\\Canon\\CameraInfo650D' => 'ExifMakerNotes\\Canon\\CameraInfo650D',
    'ExifMakerNotes\\Canon\\CameraInfo6D' => 'ExifMakerNotes\\Canon\\CameraInfo6D',
    'ExifMakerNotes\\Canon\\CameraInfo70D' => 'ExifMakerNotes\\Canon\\CameraInfo70D',
    'ExifMakerNotes\\Canon\\CameraInfo750D' => 'ExifMakerNotes\\Canon\\CameraInfo750D',
    'ExifMakerNotes\\Canon\\CameraInfo7D' => 'ExifMakerNotes\\Canon\\CameraInfo7D',
    'ExifMakerNotes\\Canon\\CameraInfo80D' => 'ExifMakerNotes\\Canon\\CameraInfo80D',
    'ExifMakerNotes\\Canon\\CameraInfoPowerShot' => 'ExifMakerNotes\\Canon\\CameraInfoPowerShot',
    'ExifMakerNotes\\Canon\\CameraInfoPowerShot2' => 'ExifMakerNotes\\Canon\\CameraInfoPowerShot2',
    'ExifMakerNotes\\Canon\\CameraInfoResolver' => 'ExifMakerNotes\\Canon\\CameraInfoResolver',
    'ExifMakerNotes\\Canon\\CameraInfoUnknown' => 'ExifMakerNotes\\Canon\\CameraInfoUnknown',
    'ExifMakerNotes\\Canon\\CameraInfoUnknown32' => 'ExifMakerNotes\\Canon\\CameraInfoUnknown32',
    'ExifMakerNotes\\Canon\\CameraSettings' => 'ExifMakerNotes\\Canon\\CameraSettings',
    'ExifMakerNotes\\Canon\\ColorBalance' => 'ExifMakerNotes\\Canon\\ColorBalance',
    'ExifMakerNotes\\Canon\\ColorCalib' => 'ExifMakerNotes\\Canon\\ColorCalib',
    'ExifMakerNotes\\Canon\\ColorCalib2' => 'ExifMakerNotes\\Canon\\ColorCalib2',
    'ExifMakerNotes\\Canon\\ColorCoefs' => 'ExifMakerNotes\\Canon\\ColorCoefs',
    'ExifMakerNotes\\Canon\\ColorCoefs2' => 'ExifMakerNotes\\Canon\\ColorCoefs2',
    'ExifMakerNotes\\Canon\\ColorData1' => 'ExifMakerNotes\\Canon\\ColorData1',
    'ExifMakerNotes\\Canon\\ColorData2' => 'ExifMakerNotes\\Canon\\ColorData2',
    'ExifMakerNotes\\Canon\\ColorData3' => 'ExifMakerNotes\\Canon\\ColorData3',
    'ExifMakerNotes\\Canon\\ColorData4' => 'ExifMakerNotes\\Canon\\ColorData4',
    'ExifMakerNotes\\Canon\\ColorData5' => 'ExifMakerNotes\\Canon\\ColorData5',
    'ExifMakerNotes\\Canon\\ColorData6' => 'ExifMakerNotes\\Canon\\ColorData6',
    'ExifMakerNotes\\Canon\\ColorData7' => 'ExifMakerNotes\\Canon\\ColorData7',
    'ExifMakerNotes\\Canon\\ColorData8' => 'ExifMakerNotes\\Canon\\ColorData8',
    'ExifMakerNotes\\Canon\\ColorData9' => 'ExifMakerNotes\\Canon\\ColorData9',
    'ExifMakerNotes\\Canon\\ColorDataResolver' => 'ExifMakerNotes\\Canon\\ColorDataResolver',
    'ExifMakerNotes\\Canon\\ColorDataUnknown' => 'ExifMakerNotes\\Canon\\ColorDataUnknown',
    'ExifMakerNotes\\Canon\\ColorInfo' => 'ExifMakerNotes\\Canon\\ColorInfo',
    'ExifMakerNotes\\Canon\\ContrastInfo' => 'ExifMakerNotes\\Canon\\ContrastInfo',
    'ExifMakerNotes\\Canon\\CropInfo' => 'ExifMakerNotes\\Canon\\CropInfo',
    'ExifMakerNotes\\Canon\\ExposureInfo' => 'ExifMakerNotes\\Canon\\ExposureInfo',
    'ExifMakerNotes\\Canon\\FaceDetect1' => 'ExifMakerNotes\\Canon\\FaceDetect1',
    'ExifMakerNotes\\Canon\\FaceDetect2' => 'ExifMakerNotes\\Canon\\FaceDetect2',
    'ExifMakerNotes\\Canon\\FaceDetect3' => 'ExifMakerNotes\\Canon\\FaceDetect3',
    'ExifMakerNotes\\Canon\\FileInfo' => 'ExifMakerNotes\\Canon\\FileInfo',
    'ExifMakerNotes\\Canon\\Filter' => 'ExifMakerNotes\\Canon\\Filter',
    'ExifMakerNotes\\Canon\\FilterInfo' => 'ExifMakerNotes\\Canon\\FilterInfo',
    'ExifMakerNotes\\Canon\\Flags' => 'ExifMakerNotes\\Canon\\Flags',
    'ExifMakerNotes\\Canon\\FocalInfo' => 'ExifMakerNotes\\Canon\\FocalInfo',
    'ExifMakerNotes\\Canon\\FocalLength' => 'ExifMakerNotes\\Canon\\FocalLength',
    'ExifMakerNotes\\Canon\\HDRInfo' => 'ExifMakerNotes\\Canon\\HDRInfo',
    'ExifMakerNotes\\Canon\\LensInfo' => 'ExifMakerNotes\\Canon\\LensInfo',
    'ExifMakerNotes\\Canon\\LightingOpt' => 'ExifMakerNotes\\Canon\\LightingOpt',
    'ExifMakerNotes\\Canon\\Main' => 'ExifMakerNotes\\Canon\\Main',
    'ExifMakerNotes\\Canon\\MeasuredColor' => 'ExifMakerNotes\\Canon\\MeasuredColor',
    'ExifMakerNotes\\Canon\\ModifiedInfo' => 'ExifMakerNotes\\Canon\\ModifiedInfo',
    'ExifMakerNotes\\Canon\\MovieInfo' => 'ExifMakerNotes\\Canon\\MovieInfo',
    'ExifMakerNotes\\Canon\\MultiExp' => 'ExifMakerNotes\\Canon\\MultiExp',
    'ExifMakerNotes\\Canon\\MyColors' => 'ExifMakerNotes\\Canon\\MyColors',
    'ExifMakerNotes\\Canon\\PSInfo' => 'ExifMakerNotes\\Canon\\PSInfo',
    'ExifMakerNotes\\Canon\\PSInfo2' => 'ExifMakerNotes\\Canon\\PSInfo2',
    'ExifMakerNotes\\Canon\\Panorama' => 'ExifMakerNotes\\Canon\\Panorama',
    'ExifMakerNotes\\Canon\\PreviewImageInfo' => 'ExifMakerNotes\\Canon\\PreviewImageInfo',
    'ExifMakerNotes\\Canon\\Processing' => 'ExifMakerNotes\\Canon\\Processing',
    'ExifMakerNotes\\Canon\\SensorInfo' => 'ExifMakerNotes\\Canon\\SensorInfo',
    'ExifMakerNotes\\Canon\\SerialInfo' => 'ExifMakerNotes\\Canon\\SerialInfo',
    'ExifMakerNotes\\Canon\\ShotInfo' => 'ExifMakerNotes\\Canon\\ShotInfo',
    'ExifMakerNotes\\Canon\\Skip' => 'ExifMakerNotes\\Canon\\Skip',
    'ExifMakerNotes\\Canon\\TimeInfo' => 'ExifMakerNotes\\Canon\\TimeInfo',
    'ExifMakerNotes\\Canon\\Uuid' => 'ExifMakerNotes\\Canon\\Uuid',
    'ExifMakerNotes\\Canon\\VignettingCorr' => 'ExifMakerNotes\\Canon\\VignettingCorr',
    'ExifMakerNotes\\Canon\\VignettingCorr2' => 'ExifMakerNotes\\Canon\\VignettingCorr2',
    'ExifMakerNotes\\Canon\\VignettingCorrUnknown' => 'ExifMakerNotes\\Canon\\VignettingCorrUnknown',
    'ExifMakerNotes\\MakerNotes' => 'ExifMakerNotes\\MakerNotes',
    'Exif\\Exif' => 'Exif\\Exif',
    'Format' => 'Format',
    'Jpeg\\Jpeg' => 'Jpeg\\Jpeg',
    'Jpeg\\Segment' => 'Jpeg\\Segment',
    'Jpeg\\SegmentApp1' => 'Jpeg\\SegmentApp1',
    'Jpeg\\SegmentCom' => 'Jpeg\\SegmentCom',
    'Jpeg\\SegmentSos' => 'Jpeg\\SegmentSos',
    'Media' => 'Media',
    'MediaType' => 'MediaType',
    'RawData' => 'RawData',
    'Tag' => 'Tag',
    'Thumbnail' => 'Thumbnail',
    'Tiff\\Ifd0' => 'Tiff\\Ifd0',
    'Tiff\\Ifd1' => 'Tiff\\Ifd1',
    'Tiff\\IfdAny' => 'Tiff\\IfdAny',
    'Tiff\\IfdExif' => 'Tiff\\IfdExif',
    'Tiff\\IfdGps' => 'Tiff\\IfdGps',
    'Tiff\\IfdInteroperability' => 'Tiff\\IfdInteroperability',
    'Tiff\\Tiff' => 'Tiff\\Tiff',
    'UnknownTag' => 'UnknownTag',
    'VoidCollection' => 'VoidCollection',
  ),
  'collectionsByName' =>
  array (
    0 => 'Tiff\\Ifd0',
    1 => 'Tiff\\Ifd1',
    'APP1' => 'Jpeg\\SegmentApp1',
    'Apple' => 'ExifMakerNotes\\Apple\\Main',
    'AppleRuntime' => 'ExifMakerNotes\\Apple\\RunTime',
    'COM' => 'Jpeg\\SegmentCom',
    'Canon' => 'ExifMakerNotes\\Canon\\Main',
    'CanonAFConfig' => 'ExifMakerNotes\\Canon\\AFConfig',
    'CanonAFInfo' => 'ExifMakerNotes\\Canon\\AFInfo',
    'CanonAFInfo2' => 'ExifMakerNotes\\Canon\\AFInfo2',
    'CanonAFMicroAdj' => 'ExifMakerNotes\\Canon\\AFMicroAdj',
    'CanonAmbience' => 'ExifMakerNotes\\Canon\\Ambience',
    'CanonAspectInfo' => 'ExifMakerNotes\\Canon\\AspectInfo',
    'CanonCNTH' => 'ExifMakerNotes\\Canon\\CNTH',
    'CanonCTMD' => 'ExifMakerNotes\\Canon\\CTMD',
    'CanonCameraInfo1000D' => 'ExifMakerNotes\\Canon\\CameraInfo1000D',
    'CanonCameraInfo1D' => 'ExifMakerNotes\\Canon\\CameraInfo1D',
    'CanonCameraInfo1DX' => 'ExifMakerNotes\\Canon\\CameraInfo1DX',
    'CanonCameraInfo1DmkII' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkII',
    'CanonCameraInfo1DmkIII' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIII',
    'CanonCameraInfo1DmkIIN' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIIN',
    'CanonCameraInfo1DmkIV' => 'ExifMakerNotes\\Canon\\CameraInfo1DmkIV',
    'CanonCameraInfo40D' => 'ExifMakerNotes\\Canon\\CameraInfo40D',
    'CanonCameraInfo450D' => 'ExifMakerNotes\\Canon\\CameraInfo450D',
    'CanonCameraInfo500D' => 'ExifMakerNotes\\Canon\\CameraInfo500D',
    'CanonCameraInfo50D' => 'ExifMakerNotes\\Canon\\CameraInfo50D',
    'CanonCameraInfo550D' => 'ExifMakerNotes\\Canon\\CameraInfo550D',
    'CanonCameraInfo5D' => 'ExifMakerNotes\\Canon\\CameraInfo5D',
    'CanonCameraInfo5DmkII' => 'ExifMakerNotes\\Canon\\CameraInfo5DmkII',
    'CanonCameraInfo5DmkIII' => 'ExifMakerNotes\\Canon\\CameraInfo5DmkIII',
    'CanonCameraInfo600D' => 'ExifMakerNotes\\Canon\\CameraInfo600D',
    'CanonCameraInfo60D' => 'ExifMakerNotes\\Canon\\CameraInfo60D',
    'CanonCameraInfo650D' => 'ExifMakerNotes\\Canon\\CameraInfo650D',
    'CanonCameraInfo6D' => 'ExifMakerNotes\\Canon\\CameraInfo6D',
    'CanonCameraInfo70D' => 'ExifMakerNotes\\Canon\\CameraInfo70D',
    'CanonCameraInfo750D' => 'ExifMakerNotes\\Canon\\CameraInfo750D',
    'CanonCameraInfo7D' => 'ExifMakerNotes\\Canon\\CameraInfo7D',
    'CanonCameraInfo80D' => 'ExifMakerNotes\\Canon\\CameraInfo80D',
    'CanonCameraInfoPowerShot' => 'ExifMakerNotes\\Canon\\CameraInfoPowerShot',
    'CanonCameraInfoPowerShot2' => 'ExifMakerNotes\\Canon\\CameraInfoPowerShot2',
    'CanonCameraInfoResolver' => 'ExifMakerNotes\\Canon\\CameraInfoResolver',
    'CanonCameraInfoUnknown' => 'ExifMakerNotes\\Canon\\CameraInfoUnknown',
    'CanonCameraInfoUnknown32' => 'ExifMakerNotes\\Canon\\CameraInfoUnknown32',
    'CanonCameraSettings' => 'ExifMakerNotes\\Canon\\CameraSettings',
    'CanonColorBalance' => 'ExifMakerNotes\\Canon\\ColorBalance',
    'CanonColorCalib' => 'ExifMakerNotes\\Canon\\ColorCalib',
    'CanonColorCalib2' => 'ExifMakerNotes\\Canon\\ColorCalib2',
    'CanonColorCoefs' => 'ExifMakerNotes\\Canon\\ColorCoefs',
    'CanonColorCoefs2' => 'ExifMakerNotes\\Canon\\ColorCoefs2',
    'CanonColorData1' => 'ExifMakerNotes\\Canon\\ColorData1',
    'CanonColorData2' => 'ExifMakerNotes\\Canon\\ColorData2',
    'CanonColorData3' => 'ExifMakerNotes\\Canon\\ColorData3',
    'CanonColorData4' => 'ExifMakerNotes\\Canon\\ColorData4',
    'CanonColorData5' => 'ExifMakerNotes\\Canon\\ColorData5',
    'CanonColorData6' => 'ExifMakerNotes\\Canon\\ColorData6',
    'CanonColorData7' => 'ExifMakerNotes\\Canon\\ColorData7',
    'CanonColorData8' => 'ExifMakerNotes\\Canon\\ColorData8',
    'CanonColorData9' => 'ExifMakerNotes\\Canon\\ColorData9',
    'CanonColorDataResolver' => 'ExifMakerNotes\\Canon\\ColorDataResolver',
    'CanonColorDataUnknown' => 'ExifMakerNotes\\Canon\\ColorDataUnknown',
    'CanonColorInfo' => 'ExifMakerNotes\\Canon\\ColorInfo',
    'CanonContrastInfo' => 'ExifMakerNotes\\Canon\\ContrastInfo',
    'CanonCropInfo' => 'ExifMakerNotes\\Canon\\CropInfo',
    'CanonCustomFunctions10D' => 'ExifMakerNotes\\CanonCustom\\Functions10D',
    'CanonCustomFunctions1D' => 'ExifMakerNotes\\CanonCustom\\Functions1D',
    'CanonCustomFunctions2' => 'ExifMakerNotes\\CanonCustom\\Functions2',
    'CanonCustomFunctions20D' => 'ExifMakerNotes\\CanonCustom\\Functions20D',
    'CanonCustomFunctions2Header' => 'ExifMakerNotes\\CanonCustom\\Functions2Header',
    'CanonCustomFunctions30D' => 'ExifMakerNotes\\CanonCustom\\Functions30D',
    'CanonCustomFunctions350D' => 'ExifMakerNotes\\CanonCustom\\Functions350D',
    'CanonCustomFunctions400D' => 'ExifMakerNotes\\CanonCustom\\Functions400D',
    'CanonCustomFunctions5D' => 'ExifMakerNotes\\CanonCustom\\Functions5D',
    'CanonCustomFunctionsD30' => 'ExifMakerNotes\\CanonCustom\\FunctionsD30',
    'CanonCustomPersonalFuncValues' => 'ExifMakerNotes\\CanonCustom\\PersonalFuncValues',
    'CanonCustomPersonalFuncs' => 'ExifMakerNotes\\CanonCustom\\PersonalFuncs',
    'CanonExposureInfo' => 'ExifMakerNotes\\Canon\\ExposureInfo',
    'CanonFaceDetect1' => 'ExifMakerNotes\\Canon\\FaceDetect1',
    'CanonFaceDetect2' => 'ExifMakerNotes\\Canon\\FaceDetect2',
    'CanonFaceDetect3' => 'ExifMakerNotes\\Canon\\FaceDetect3',
    'CanonFileInfo' => 'ExifMakerNotes\\Canon\\FileInfo',
    'CanonFilterInfo' => 'ExifMakerNotes\\Canon\\FilterInfo',
    'CanonFlags' => 'ExifMakerNotes\\Canon\\Flags',
    'CanonFocalInfo' => 'ExifMakerNotes\\Canon\\FocalInfo',
    'CanonFocalLength' => 'ExifMakerNotes\\Canon\\FocalLength',
    'CanonHDRInfo' => 'ExifMakerNotes\\Canon\\HDRInfo',
    'CanonLensInfo' => 'ExifMakerNotes\\Canon\\LensInfo',
    'CanonLightingOpt' => 'ExifMakerNotes\\Canon\\LightingOpt',
    'CanonMeasuredColor' => 'ExifMakerNotes\\Canon\\MeasuredColor',
    'CanonModifiedInfo' => 'ExifMakerNotes\\Canon\\ModifiedInfo',
    'CanonMovieInfo' => 'ExifMakerNotes\\Canon\\MovieInfo',
    'CanonMultiExp' => 'ExifMakerNotes\\Canon\\MultiExp',
    'CanonMyColors' => 'ExifMakerNotes\\Canon\\MyColors',
    'CanonPSInfo' => 'ExifMakerNotes\\Canon\\PSInfo',
    'CanonPSInfo2' => 'ExifMakerNotes\\Canon\\PSInfo2',
    'CanonPanorama' => 'ExifMakerNotes\\Canon\\Panorama',
    'CanonPreviewImageInfo' => 'ExifMakerNotes\\Canon\\PreviewImageInfo',
    'CanonProcessing' => 'ExifMakerNotes\\Canon\\Processing',
    'CanonRawDecoderTable' => 'ExifMakerNotes\\CanonRaw\\DecoderTable',
    'CanonRawExposureInfo' => 'ExifMakerNotes\\CanonRaw\\ExposureInfo',
    'CanonRawFlashInfo' => 'ExifMakerNotes\\CanonRaw\\FlashInfo',
    'CanonRawImageFormat' => 'ExifMakerNotes\\CanonRaw\\ImageFormat',
    'CanonRawImageInfo' => 'ExifMakerNotes\\CanonRaw\\ImageInfo',
    'CanonRawMain' => 'ExifMakerNotes\\CanonRaw\\Main',
    'CanonRawMakeModel' => 'ExifMakerNotes\\CanonRaw\\MakeModel',
    'CanonRawRawJpgInfo' => 'ExifMakerNotes\\CanonRaw\\RawJpgInfo',
    'CanonRawTimeStamp' => 'ExifMakerNotes\\CanonRaw\\TimeStamp',
    'CanonRawWhiteSample' => 'ExifMakerNotes\\CanonRaw\\WhiteSample',
    'CanonSensorInfo' => 'ExifMakerNotes\\Canon\\SensorInfo',
    'CanonSerialInfo' => 'ExifMakerNotes\\Canon\\SerialInfo',
    'CanonShotInfo' => 'ExifMakerNotes\\Canon\\ShotInfo',
    'CanonSkip' => 'ExifMakerNotes\\Canon\\Skip',
    'CanonTimeInfo' => 'ExifMakerNotes\\Canon\\TimeInfo',
    'CanonUuid' => 'ExifMakerNotes\\Canon\\Uuid',
    'CanonVRDCropInfo' => 'ExifMakerNotes\\CanonVRD\\CropInfo',
    'CanonVRDDLOInfo' => 'ExifMakerNotes\\CanonVRD\\DLOInfo',
    'CanonVRDDR4' => 'ExifMakerNotes\\CanonVRD\\DR4',
    'CanonVRDDR4Header' => 'ExifMakerNotes\\CanonVRD\\DR4Header',
    'CanonVRDDustInfo' => 'ExifMakerNotes\\CanonVRD\\DustInfo',
    'CanonVRDGammaInfo' => 'ExifMakerNotes\\CanonVRD\\GammaInfo',
    'CanonVRDIHL' => 'ExifMakerNotes\\CanonVRD\\IHL',
    'CanonVRDMain' => 'ExifMakerNotes\\CanonVRD\\Main',
    'CanonVRDStampInfo' => 'ExifMakerNotes\\CanonVRD\\StampInfo',
    'CanonVRDStampTool' => 'ExifMakerNotes\\CanonVRD\\StampTool',
    'CanonVRDToneCurve' => 'ExifMakerNotes\\CanonVRD\\ToneCurve',
    'CanonVRDVer1' => 'ExifMakerNotes\\CanonVRD\\Ver1',
    'CanonVRDVer2' => 'ExifMakerNotes\\CanonVRD\\Ver2',
    'CanonVignettingCorr' => 'ExifMakerNotes\\Canon\\VignettingCorr',
    'CanonVignettingCorr2' => 'ExifMakerNotes\\Canon\\VignettingCorr2',
    'CanonVignettingCorrUnknown' => 'ExifMakerNotes\\Canon\\VignettingCorrUnknown',
    'ExifIFD' => 'Tiff\\IfdExif',
    'ExifMakerNotes\\Canon\\Filter' => 'ExifMakerNotes\\Canon\\Filter',
    'ExifMakerNotes\\MakerNotes' => 'ExifMakerNotes\\MakerNotes',
    'Exif\\Exif' => 'Exif\\Exif',
    'Format' => 'Format',
    'GPS' => 'Tiff\\IfdGps',
    'IFD0' => 'Tiff\\Ifd0',
    'IFD1' => 'Tiff\\Ifd1',
    'Interop' => 'Tiff\\IfdInteroperability',
    'InteropIFD' => 'Tiff\\IfdInteroperability',
    'Jpeg\\Jpeg' => 'Jpeg\\Jpeg',
    'Jpeg\\Segment' => 'Jpeg\\Segment',
    'Main' => 'Tiff\\Ifd0',
    'Media' => 'Media',
    'MediaType' => 'MediaType',
    'RawData' => 'RawData',
    'SOS' => 'Jpeg\\SegmentSos',
    'Tag' => 'Tag',
    'Thumbnail' => 'Tiff\\Ifd1',
    'Tiff\\IfdAny' => 'Tiff\\IfdAny',
    'Tiff\\Tiff' => 'Tiff\\Tiff',
    'UnknownTag' => 'UnknownTag',
    'VoidCollection' => 'VoidCollection',
  ),
);
}
