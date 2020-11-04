<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Ifd;

use FileEye\MediaProbe\Collection;

class Ifd0 extends Collection {

  protected static $map = array (
  'name' => 'IFD0',
  'title' => 'IFD0',
  'class' => 'FileEye\\MediaProbe\\Block\\Exif\\Ifd',
  'DOMNode' => 'ifd',
  'defaultItemCollection' => 'Tag',
  'alias' =>
  array (
    0 => '0',
    1 => 'Main',
  ),
  'postParse' =>
  array (
    0 => 'FileEye\\MediaProbe\\Block\\Exif\\Ifd::thumbnailToBlock',
    1 => 'FileEye\\MediaProbe\\Block\\Exif\\Ifd::makerNoteToBlock',
  ),
  'itemsByName' =>
  array (
    'A100DataOffset' => 330,
    'AnalogBalance' => 50727,
    'ApplicationNotes' => 700,
    'Artist' => 315,
    'AsShotICCProfile' => 50831,
    'AsShotNeutral' => 50728,
    'AsShotPreProfileMatrix' => 50832,
    'AsShotProfileName' => 50934,
    'AsShotWhiteXY' => 50729,
    'BaselineExposure' => 50730,
    'BaselineExposureOffset' => 51109,
    'BaselineNoise' => 50731,
    'BaselineSharpness' => 50732,
    'BitsPerSample' => 258,
    'CalibrationIlluminant1' => 50778,
    'CalibrationIlluminant2' => 50779,
    'CameraCalibration1' => 50723,
    'CameraCalibration2' => 50724,
    'CameraCalibrationSig' => 50931,
    'CameraLabel' => 51105,
    'CameraSerialNumber' => 50735,
    'CellLength' => 265,
    'CellWidth' => 264,
    'ColorMatrix1' => 50721,
    'ColorMatrix2' => 50722,
    'ColorimetricReference' => 50879,
    'Compression' => 259,
    'Copyright' => 33432,
    'CurrentICCProfile' => 50833,
    'CurrentPreProfileMatrix' => 50834,
    'DNGAdobeData' => 50740,
    'DNGBackwardVersion' => 50707,
    'DNGLensInfo' => 50736,
    'DNGVersion' => 50706,
    'DefaultBlackRender' => 51110,
    'DocumentName' => 269,
    'ExifIFD' => 34665,
    'FillOrder' => 266,
    'ForwardMatrix1' => 50964,
    'ForwardMatrix2' => 50965,
    'FrameRate' => 51044,
    'GPS' => 34853,
    'GeoTiffAsciiParams' => 34737,
    'GeoTiffDirectory' => 34735,
    'GeoTiffDoubleParams' => 34736,
    'GrayResponseUnit' => 290,
    'HalftoneHints' => 321,
    'HostComputer' => 316,
    'IPTC-NAA' => 33723,
    'ImageDescription' => 270,
    'ImageHeight' => 257,
    'ImageSourceData' => 37724,
    'ImageWidth' => 256,
    'InkSet' => 332,
    'LinearResponseLimit' => 50734,
    'LocalizedCameraModel' => 50709,
    'Make' => 271,
    'MakerNoteSafety' => 50741,
    'MaxSampleValue' => 281,
    'MinSampleValue' => 280,
    'Model' => 272,
    'ModifyDate' => 306,
    'NewRawImageDigest' => 51111,
    'OldSubfileType' => 255,
    'Orientation' => 274,
    'OriginalBestQualitySize' => 51090,
    'OriginalDefaultCropSize' => 51091,
    'OriginalDefaultFinalSize' => 51089,
    'OriginalRawFileData' => 50828,
    'OriginalRawFileDigest' => 50973,
    'OriginalRawFileName' => 50827,
    'PageName' => 285,
    'PageNumber' => 297,
    'PanasonicTitle' => 50898,
    'PanasonicTitle2' => 50899,
    'PhotometricInterpretation' => 262,
    'PlanarConfiguration' => 284,
    'Predictor' => 317,
    'PreviewApplicationName' => 50966,
    'PreviewApplicationVersion' => 50967,
    'PreviewColorSpace' => 50970,
    'PreviewDateTime' => 50971,
    'PreviewImageLength' => 279,
    'PreviewImageStart' => 273,
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
    'Rating' => 18246,
    'RatingPercent' => 18249,
    'RawDataUniqueID' => 50781,
    'RawImageDigest' => 50972,
    'RawToPreviewGain' => 51112,
    'ReductionMatrix1' => 50725,
    'ReductionMatrix2' => 50726,
    'ReelName' => 51081,
    'ReferenceBlackWhite' => 532,
    'ResolutionUnit' => 296,
    'RowsPerStrip' => 278,
    'SEMInfo' => 34118,
    'SRawType' => 50885,
    'SamplesPerPixel' => 277,
    'ShadowScale' => 50739,
    'Software' => 305,
    'SubfileType' => 254,
    'TStop' => 51058,
    'TargetPrinter' => 337,
    'Thresholding' => 263,
    'ThumbnailLength' => 514,
    'ThumbnailOffset' => 513,
    'TileLength' => 323,
    'TileWidth' => 322,
    'TimeCodes' => 51043,
    'TransferFunction' => 301,
    'UniqueCameraModel' => 50708,
    'WhitePoint' => 318,
    'XPAuthor' => 40093,
    'XPComment' => 40092,
    'XPKeywords' => 40094,
    'XPSubject' => 40095,
    'XPTitle' => 40091,
    'XPosition' => 286,
    'XResolution' => 282,
    'YCbCrCoefficients' => 529,
    'YCbCrPositioning' => 531,
    'YCbCrSubSampling' => 530,
    'YPosition' => 287,
    'YResolution' => 283,
  ),
  'itemsByPhpExifTag' =>
  array (
    'ACDComment' => 11,
    'Artist' => 315,
    'Author' => 40093,
    'BitsPerSample' => 258,
    'Comments' => 40092,
    'Compression' => 259,
    'Copyright' => 33432,
    'DateTime' => 306,
    'DocumentName' => 269,
    'ExtensibleMetadataPlatform' => 700,
    'FillOrder' => 266,
    'GrayResponseUnit' => 290,
    'HalfToneHints' => 321,
    'HostComputer' => 316,
    'IPTC/NAA' => 33723,
    'ImageDescription' => 270,
    'ImageLength' => 257,
    'ImageSourceData' => 37724,
    'ImageWidth' => 256,
    'InkSet' => 332,
    'JPEGInterchangeFormat' => 513,
    'JPEGInterchangeFormatLength' => 514,
    'Keywords' => 40094,
    'Make' => 271,
    'MaxSampleValue' => 281,
    'MinSampleValue' => 280,
    'Model' => 272,
    'NewSubFile' => 254,
    'Orientation' => 274,
    'PageName' => 285,
    'PageNumber' => 297,
    'PhotometricInterpretation' => 262,
    'PlanarConfiguration' => 284,
    'Predictor' => 317,
    'PrimaryChromaticities' => 319,
    'ReferenceBlackWhite' => 532,
    'ResolutionUnit' => 296,
    'RowsPerStrip' => 278,
    'SamplesPerPixel' => 277,
    'Software' => 305,
    'StripByteCounts' => 279,
    'StripOffsets' => 273,
    'SubFile' => 255,
    'SubIFD' => 330,
    'Subject' => 40095,
    'TargetPrinter' => 337,
    'TileLength' => 323,
    'TileWidth' => 322,
    'Title' => 40091,
    'TransferFunction' => 301,
    'WhitePoint' => 318,
    'XPosition' => 286,
    'XResolution' => 282,
    'YCbCrCoefficients' => 529,
    'YCbCrPositioning' => 531,
    'YCbCrSubSampling' => 530,
    'YPosition' => 287,
    'YResolution' => 283,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
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
    'IFD0:PreviewImageLength' => 279,
    'IFD0:PreviewImageStart' => 273,
    'IFD0:PreviewSettingsDigest' => 50969,
    'IFD0:PreviewSettingsName' => 50968,
    'IFD0:PrimaryChromaticities' => 319,
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
    'IFD0:ThumbnailLength' => 514,
    'IFD0:ThumbnailOffset' => 513,
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
  ),
  'items' =>
  array (
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
      'components' => 1,
      'format' =>
      array (
        0 => 3,
        1 => 4,
      ),
      'collection' => 'Tag',
      'name' => 'ImageWidth',
      'title' => 'Image Width',
      'phpExifTag' => 'ImageWidth',
      'exiftoolDOMNode' => 'IFD0:ImageWidth',
    ),
    257 =>
    array (
      'components' => 1,
      'format' =>
      array (
        0 => 3,
        1 => 4,
      ),
      'collection' => 'Tag',
      'name' => 'ImageHeight',
      'title' => 'Image Height',
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
      'components' => 1,
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
      'components' => 1,
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
      'format' =>
      array (
        0 => 3,
        1 => 4,
      ),
      'collection' => 'Tag',
      'name' => 'PreviewImageStart',
      'title' => 'Preview Image Start',
      'phpExifTag' => 'StripOffsets',
      'exiftoolDOMNode' => 'IFD0:PreviewImageStart',
    ),
    274 =>
    array (
      'components' => 1,
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
      'components' => 1,
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
      'components' => 1,
      'format' =>
      array (
        0 => 3,
        1 => 4,
      ),
      'collection' => 'Tag',
      'name' => 'RowsPerStrip',
      'title' => 'Rows Per Strip',
      'phpExifTag' => 'RowsPerStrip',
      'exiftoolDOMNode' => 'IFD0:RowsPerStrip',
    ),
    279 =>
    array (
      'format' =>
      array (
        0 => 3,
        1 => 4,
      ),
      'collection' => 'Tag',
      'name' => 'PreviewImageLength',
      'title' => 'Preview Image Length',
      'phpExifTag' => 'StripByteCounts',
      'exiftoolDOMNode' => 'IFD0:PreviewImageLength',
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
      'components' => 1,
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
      'components' => 1,
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
      'components' => 1,
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
    296 =>
    array (
      'components' => 1,
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
      'components' => 20,
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\Time',
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
      'components' => 1,
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
    513 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'ThumbnailOffset',
      'title' => 'Thumbnail Offset',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'JPEGInterchangeFormat',
      'exiftoolDOMNode' => 'IFD0:ThumbnailOffset',
    ),
    514 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'ThumbnailLength',
      'title' => 'Thumbnail Length',
      'format' =>
      array (
        0 => 4,
      ),
      'phpExifTag' => 'JPEGInterchangeFormatLength',
      'exiftoolDOMNode' => 'IFD0:ThumbnailLength',
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
      '__todo' => 'adjust decoding',
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\IfdYCbCrSubSampling',
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
      'components' => 1,
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
      'components' => 6,
      'collection' => 'Tag',
      'name' => 'ReferenceBlackWhite',
      'title' => 'Reference Black White',
      'format' =>
      array (
        0 => 5,
      ),
      'phpExifTag' => 'ReferenceBlackWhite',
      'exiftoolDOMNode' => 'IFD0:ReferenceBlackWhite',
    ),
    700 =>
    array (
      '__todo' => 'add ifd for XMP tags',
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
    18246 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'Rating',
      'title' => 'Rating',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'IFD0:Rating',
    ),
    18249 =>
    array (
      'components' => 1,
      'collection' => 'Tag',
      'name' => 'RatingPercent',
      'title' => 'Rating Percent',
      'format' =>
      array (
        0 => 3,
      ),
      'exiftoolDOMNode' => 'IFD0:RatingPercent',
    ),
    33432 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\IfdCopyright',
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
    34665 =>
    array (
      'collection' => 'Ifd\\Exif',
      'name' => 'ExifIFD',
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
    34853 =>
    array (
      'collection' => 'Ifd\\Gps',
      'name' => 'GPS',
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
    40091 =>
    array (
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
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
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
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
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
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
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
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
      'entryClass' => 'FileEye\\MediaProbe\\Entry\\WindowsString',
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
    50341 =>
    array (
      'collection' => 'Tag',
      'name' => 'PrintIM',
      'title' => 'Print Image Matching',
      'format' =>
      array (
        0 => 7,
      ),
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
  ),
);
}
