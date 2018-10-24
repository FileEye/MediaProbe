<?php
/**
 * This file is generated automatically by executing the 'exifeye compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
return array (
  'types' =>
  array (
    'ifdMakerNotesCanonPanoramaInformation' =>
    array (
      'name' => 'CanonPanoramaInformation',
      'title' => 'Panorama Information',
      'class' => 'ExifEye\\core\\Block\\Index',
    ),
    'jpegSegment' =>
    array (
      'name' => 'JpegSegment',
      'title' => 'Generic JPEG data segment',
      'class' => 'ExifEye\\core\\Block\\JpegSegment',
    ),
    'ifd1' =>
    array (
      'name' => 'IFD1',
      'title' => 'IFD1',
      'class' => 'ExifEye\\core\\Block\\Ifd',
      'alias' =>
      array (
        0 => '1',
        1 => 'Thumbnail',
      ),
      'postLoad' =>
      array (
        0 => 'ExifEye\\core\\Block\\Ifd::thumbnailToBlock',
      ),
    ),
    'ifdGps' =>
    array (
      'name' => 'GPS',
      'title' => 'IFD GPS',
      'class' => 'ExifEye\\core\\Block\\Ifd',
    ),
    'ifdMakerNotesCanon' =>
    array (
      'name' => 'Canon',
      'title' => 'Canon Maker Notes',
      'class' => 'ExifEye\\core\\Block\\IfdMakerNote',
      'makerNotes' =>
      array (
        0 => 'Canon',
      ),
    ),
    'ifdExif' =>
    array (
      'name' => 'Exif',
      'title' => 'IFD Exif',
      'class' => 'ExifEye\\core\\Block\\Ifd',
    ),
    'ifdMakerNotesApple' =>
    array (
      'name' => 'Apple',
      'title' => 'Apple Maker Notes',
      'class' => 'ExifEye\\Apple\\Block\\MakerNote',
      'makerNotes' =>
      array (
        0 => 'Apple',
      ),
    ),
    'ifdMakerNotesAppleRuntime' =>
    array (
      'name' => 'AppleRuntime',
      'title' => 'Runtime',
      'class' => 'ExifEye\\Apple\\Block\\RunTime',
    ),
    'ifdMakerNotesCanonCameraSettings' =>
    array (
      'name' => 'CanonCameraSettings',
      'title' => 'Camera Settings',
      'class' => 'ExifEye\\core\\Block\\Index',
    ),
    'ifdMakerNotesCanonPictureInformation' =>
    array (
      'name' => 'CanonPictureInformation',
      'title' => 'Picture Information',
      'class' => '???',
    ),
    'ifdInteroperability' =>
    array (
      'name' => 'Interoperability',
      'title' => 'IFD Interoperability',
      'class' => 'ExifEye\\core\\Block\\Ifd',
      'alias' =>
      array (
        0 => 'Interop',
      ),
    ),
    'ifd0' =>
    array (
      'name' => 'IFD0',
      'title' => 'IFD0',
      'class' => 'ExifEye\\core\\Block\\Ifd',
      'alias' =>
      array (
        0 => '0',
        1 => 'Main',
      ),
      'postLoad' =>
      array (
        0 => 'ExifEye\\core\\Block\\Ifd::thumbnailToBlock',
        1 => 'ExifEye\\core\\Block\\Ifd::makerNoteToBlock',
      ),
    ),
    'ifdMakerNotesCanonFileInformation' =>
    array (
      'name' => 'CanonFileInformation',
      'title' => 'File Information',
      'class' => 'ExifEye\\core\\Block\\Index',
    ),
    'tiff' =>
    array (
      'name' => 'Tiff',
      'title' => 'TIFF image',
      'class' => 'ExifEye\\core\\Block\\Tiff',
    ),
    'jpeg' =>
    array (
      'name' => 'Jpeg',
      'title' => 'JPEG image',
      'class' => 'ExifEye\\core\\Block\\Jpeg',
    ),
    'exif' =>
    array (
      'name' => 'Exif',
      'title' => 'Exif data embedded in JPEG APP1 segment',
      'class' => 'ExifEye\\core\\Block\\Exif',
    ),
    'ifdMakerNotesCanonShotInformation' =>
    array (
      'name' => 'CanonShotInformation',
      'title' => 'Shot Information',
      'class' => 'ExifEye\\core\\Block\\Index',
    ),
    'format' =>
    array (
      'name' => 'Format',
      'title' => 'Format',
      'class' => 'ExifEye\\Format',
    ),
  ),
  'typesByName' =>
  array (
    'CanonPanoramaInformation' => 'ifdMakerNotesCanonPanoramaInformation',
    'JpegSegment' => 'jpegSegment',
    'IFD1' => 'ifd1',
    1 => 'ifd1',
    'Thumbnail' => 'ifd1',
    'GPS' => 'ifdGps',
    'Canon' => 'ifdMakerNotesCanon',
    'Exif' => 'exif',
    'Apple' => 'ifdMakerNotesApple',
    'AppleRuntime' => 'ifdMakerNotesAppleRuntime',
    'CanonCameraSettings' => 'ifdMakerNotesCanonCameraSettings',
    'CanonPictureInformation' => 'ifdMakerNotesCanonPictureInformation',
    'Interoperability' => 'ifdInteroperability',
    'Interop' => 'ifdInteroperability',
    'IFD0' => 'ifd0',
    0 => 'ifd0',
    'Main' => 'ifd0',
    'CanonFileInformation' => 'ifdMakerNotesCanonFileInformation',
    'Tiff' => 'tiff',
    'Jpeg' => 'jpeg',
    'CanonShotInformation' => 'ifdMakerNotesCanonShotInformation',
    'Format' => 'format',
  ),
  'elements' =>
  array (
    'ifdMakerNotesCanonPanoramaInformation' =>
    array (
      2 =>
      array (
        'type' => 'tag',
        'name' => 'PanoramaFrame',
        'title' => 'Panorama Frame',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      5 =>
      array (
        'type' => 'tag',
        'name' => 'PanoramaDirection',
        'title' => 'Panorama Direction',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Left to Right',
            1 => 'Right to Left',
            2 => 'Bottom to Top',
            3 => 'Top to Bottom',
            4 => '2x2 Matrix (Clockwise)',
          ),
        ),
      ),
    ),
    'ifd1' =>
    array (
      256 =>
      array (
        'type' => 'tag',
        'name' => 'ImageWidth',
        'title' => 'Image Width',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      257 =>
      array (
        'type' => 'tag',
        'name' => 'ImageLength',
        'title' => 'Image Length',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      258 =>
      array (
        'type' => 'tag',
        'name' => 'BitsPerSample',
        'title' => 'Bits per Sample',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      259 =>
      array (
        'type' => 'tag',
        'name' => 'Compression',
        'title' => 'Compression',
        'components' => 1,
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
            34661 => 'JBIG',
            34676 => 'SGILog',
            34677 => 'SGILog24',
            34712 => 'JPEG 2000',
            34713 => 'Nikon NEF Compressed',
            34715 => 'JBIG2 TIFF FX',
            34718 => 'Microsoft Document Imaging (MDI) Binary Level Codec',
            34719 => 'Microsoft Document Imaging (MDI) Progressive Transform Codec',
            34720 => 'Microsoft Document Imaging (MDI) Vector',
            34892 => 'Lossy JPEG',
            65000 => 'Kodak DCR Compressed',
            65535 => 'Pentax PEF Compressed',
          ),
        ),
      ),
      262 =>
      array (
        'type' => 'tag',
        'name' => 'PhotometricInterpretation',
        'title' => 'Photometric Interpretation',
        'components' => 1,
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
            34892 => 'Linear Raw',
          ),
        ),
      ),
      266 =>
      array (
        'type' => 'tag',
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
      ),
      269 =>
      array (
        'type' => 'tag',
        'name' => 'DocumentName',
        'title' => 'Document Name',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      270 =>
      array (
        'type' => 'tag',
        'name' => 'ImageDescription',
        'title' => 'Image Description',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      271 =>
      array (
        'type' => 'tag',
        'name' => 'Make',
        'title' => 'Manufacturer',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      272 =>
      array (
        'type' => 'tag',
        'name' => 'Model',
        'title' => 'Model',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      273 =>
      array (
        'type' => 'tag',
        'name' => 'StripOffsets',
        'title' => 'Strip Offsets',
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      274 =>
      array (
        'type' => 'tag',
        'name' => 'Orientation',
        'title' => 'Orientation',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'top - left',
            2 => 'top - right',
            3 => 'bottom - right',
            4 => 'bottom - left',
            5 => 'left - top',
            6 => 'right - top',
            7 => 'right - bottom',
            8 => 'left - bottom',
          ),
        ),
      ),
      277 =>
      array (
        'type' => 'tag',
        'name' => 'SamplesPerPixel',
        'title' => 'Samples per Pixel',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      278 =>
      array (
        'type' => 'tag',
        'name' => 'RowsPerStrip',
        'title' => 'Rows per Strip',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      279 =>
      array (
        'type' => 'tag',
        'name' => 'StripByteCounts',
        'title' => 'Strip Byte Count',
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      282 =>
      array (
        'type' => 'tag',
        'name' => 'XResolution',
        'title' => 'x-Resolution',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      283 =>
      array (
        'type' => 'tag',
        'name' => 'YResolution',
        'title' => 'y-Resolution',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      284 =>
      array (
        'type' => 'tag',
        'name' => 'PlanarConfiguration',
        'title' => 'Planar Configuration',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Chunky format',
            2 => 'Planar format',
          ),
        ),
      ),
      296 =>
      array (
        'type' => 'tag',
        'name' => 'ResolutionUnit',
        'title' => 'Resolution Unit',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            2 => 'Inch',
            3 => 'Centimeter',
          ),
        ),
      ),
      301 =>
      array (
        'type' => 'tag',
        'name' => 'TransferFunction',
        'title' => 'Transfer Function',
        'components' => 3,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      305 =>
      array (
        'type' => 'tag',
        'name' => 'Software',
        'title' => 'Software',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      306 =>
      array (
        'type' => 'tag',
        'name' => 'DateTime',
        'title' => 'Date and Time',
        'components' => 20,
        'format' =>
        array (
          0 => 2,
        ),
        'class' => 'ExifEye\\core\\Entry\\Time',
      ),
      315 =>
      array (
        'type' => 'tag',
        'name' => 'Artist',
        'title' => 'Artist',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      317 =>
      array (
        'type' => 'tag',
        'name' => 'Predictor',
        'title' => 'Predictor',
        'components' => 1,
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
      ),
      318 =>
      array (
        'type' => 'tag',
        'name' => 'WhitePoint',
        'title' => 'White Point',
        'components' => 2,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      319 =>
      array (
        'type' => 'tag',
        'name' => 'PrimaryChromaticities',
        'title' => 'Primary Chromaticities',
        'components' => 6,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      338 =>
      array (
        'type' => 'tag',
        'name' => 'ExtraSamples',
        'title' => 'Extra Samples',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
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
      ),
      339 =>
      array (
        'type' => 'tag',
        'name' => 'SampleFormat',
        'title' => 'Sample Format',
        'components' => 4,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      342 =>
      array (
        'type' => 'tag',
        'name' => 'TransferRange',
        'title' => 'Transfer Range',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      512 =>
      array (
        'type' => 'tag',
        'name' => 'JPEGProc',
        'title' => 'JPEG Proc',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Baseline',
            14 => 'Lossless',
          ),
        ),
      ),
      513 =>
      array (
        'type' => 'tag',
        'name' => 'ThumbnailOffset',
        'title' => 'Thumbnail Offset',
        'components' => 1,
        'format' =>
        array (
          0 => 4,
        ),
      ),
      514 =>
      array (
        'type' => 'tag',
        'name' => 'ThumbnailLength',
        'title' => 'Thumbnail Length',
        'components' => 1,
        'format' =>
        array (
          0 => 4,
        ),
      ),
      529 =>
      array (
        'type' => 'tag',
        'name' => 'YCbCrCoefficients',
        'title' => 'YCbCr Coefficients',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      530 =>
      array (
        'type' => 'tag',
        'name' => 'YCbCrSubSampling',
        'title' => 'YCbCr Sub-Sampling',
        'components' => 2,
        'format' =>
        array (
          0 => 3,
        ),
        'class' => 'ExifEye\\core\\Entry\\IfdYCbCrSubSampling',
      ),
      531 =>
      array (
        'type' => 'tag',
        'name' => 'YCbCrPositioning',
        'title' => 'YCbCr Positioning',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'centered',
            2 => 'co-sited',
          ),
        ),
      ),
      532 =>
      array (
        'type' => 'tag',
        'name' => 'ReferenceBlackWhite',
        'title' => 'Reference Black/White',
        'components' => 6,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      700 =>
      array (
        'type' => 'tag',
        'name' => 'ApplicationNotes',
        'title' => 'Application Notes',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\IfdApplicationNotes',
      ),
      18246 =>
      array (
        'type' => 'tag',
        'name' => 'Rating',
        'title' => 'Star Rating',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      18249 =>
      array (
        'type' => 'tag',
        'name' => 'RatingPercent',
        'title' => 'Percent Rating',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      33423 =>
      array (
        'type' => 'tag',
        'name' => 'BatteryLevel',
        'title' => 'Battery Level',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      33432 =>
      array (
        'type' => 'tag',
        'name' => 'Copyright',
        'title' => 'Copyright',
        'format' =>
        array (
          0 => 2,
        ),
        'class' => 'ExifEye\\core\\Entry\\IfdCopyright',
      ),
      33723 =>
      array (
        'type' => 'tag',
        'name' => 'IPTC-NAA',
        'title' => 'IPTC-NAA',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      34665 =>
      array (
        'type' => 'ifdExif',
        'class' => 'ExifEye\\core\\Block\\Ifd',
        'name' => 'Exif',
        'title' => 'Exif IFD',
      ),
      34853 =>
      array (
        'type' => 'ifdGps',
        'class' => 'ExifEye\\core\\Block\\Ifd',
        'name' => 'GPS',
        'title' => 'GPS Info IFD',
      ),
      40091 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPTitle',
        'title' => 'Windows XP Title',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40092 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPComment',
        'title' => 'Windows XP Comment',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40093 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPAuthor',
        'title' => 'Windows XP Author',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40094 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPKeywords',
        'title' => 'Windows XP Keywords',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40095 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPSubject',
        'title' => 'Windows XP Subject',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      50341 =>
      array (
        'type' => 'tag',
        'name' => 'PrintIM',
        'title' => 'Print IM',
        'format' =>
        array (
          0 => 7,
        ),
      ),
    ),
    'ifdGps' =>
    array (
      0 =>
      array (
        'type' => 'tag',
        'name' => 'GPSVersionID',
        'title' => 'GPS Version',
        'components' => 4,
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\GPSVersionId',
      ),
      1 =>
      array (
        'type' => 'tag',
        'name' => 'GPSLatitudeRef',
        'title' => 'LatitudeRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      2 =>
      array (
        'type' => 'tag',
        'name' => 'GPSLatitude',
        'title' => 'Latitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'class' => 'ExifEye\\core\\Entry\\GPSDegrees',
      ),
      3 =>
      array (
        'type' => 'tag',
        'name' => 'GPSLongitudeRef',
        'title' => 'LongitudeRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      4 =>
      array (
        'type' => 'tag',
        'name' => 'GPSLongitude',
        'title' => 'Longitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
        'class' => 'ExifEye\\core\\Entry\\GPSDegrees',
      ),
      5 =>
      array (
        'type' => 'tag',
        'name' => 'GPSAltitudeRef',
        'title' => 'AltitudeRef',
        'components' => 1,
        'format' =>
        array (
          0 => 1,
        ),
      ),
      6 =>
      array (
        'type' => 'tag',
        'name' => 'GPSAltitude',
        'title' => 'Altitude',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      7 =>
      array (
        'type' => 'tag',
        'name' => 'GPSTimeStamp',
        'title' => 'TimeStamp',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      8 =>
      array (
        'type' => 'tag',
        'name' => 'GPSSatellites',
        'title' => 'Satellites',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      9 =>
      array (
        'type' => 'tag',
        'name' => 'GPSStatus',
        'title' => 'Status',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      10 =>
      array (
        'type' => 'tag',
        'name' => 'GPSMeasureMode',
        'title' => 'Measure Mode',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      11 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDOP',
        'title' => 'DOP',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      12 =>
      array (
        'type' => 'tag',
        'name' => 'GPSSpeedRef',
        'title' => 'SpeedRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      13 =>
      array (
        'type' => 'tag',
        'name' => 'GPSSpeed',
        'title' => 'Speed',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      14 =>
      array (
        'type' => 'tag',
        'name' => 'GPSTrackRef',
        'title' => 'TrackRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      15 =>
      array (
        'type' => 'tag',
        'name' => 'GPSTrack',
        'title' => 'Track',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      16 =>
      array (
        'type' => 'tag',
        'name' => 'GPSImgDirectionRef',
        'title' => 'ImgDirectionRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      17 =>
      array (
        'type' => 'tag',
        'name' => 'GPSImgDirection',
        'title' => 'Image Direction',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      18 =>
      array (
        'type' => 'tag',
        'name' => 'GPSMapDatum',
        'title' => 'Map Datum',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      19 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestLatitudeRef',
        'title' => 'DestLatitudeRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      20 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestLatitude',
        'title' => 'DestLatitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      21 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestLongitudeRef',
        'title' => 'DestLongitudeRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      22 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestLongitude',
        'title' => 'DestLongitude',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      23 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestBearingRef',
        'title' => 'DestBearingRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      24 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestBearing',
        'title' => 'DestBearing',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      25 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestDistanceRef',
        'title' => 'DestDistanceRef',
        'components' => 2,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      26 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDestDistance',
        'title' => 'DestDistance',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      27 =>
      array (
        'type' => 'tag',
        'name' => 'GPSProcessingMethod',
        'title' => 'Processing Method',
        'format' =>
        array (
          0 => 7,
        ),
      ),
      28 =>
      array (
        'type' => 'tag',
        'name' => 'GPSAreaInformation',
        'title' => 'Area Information',
        'format' =>
        array (
          0 => 7,
        ),
      ),
      29 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDateStamp',
        'title' => 'Date Stamp',
        'components' => 11,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      30 =>
      array (
        'type' => 'tag',
        'name' => 'GPSDifferential',
        'title' => 'Differential',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      31 =>
      array (
        'type' => 'tag',
        'name' => 'GPSHPositioningError',
        'title' => 'Horizontal Positioning Error',
        'format' =>
        array (
          0 => 5,
        ),
      ),
    ),
    'ifdMakerNotesCanon' =>
    array (
      1 =>
      array (
        'type' => 'ifdMakerNotesCanonCameraSettings',
        'name' => 'CanonCameraSettings',
        'title' => 'Camera Settings',
      ),
      2 =>
      array (
        'type' => 'tag',
        'name' => 'FocalLength',
        'title' => 'Focal Length',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      4 =>
      array (
        'type' => 'ifdMakerNotesCanonShotInformation',
        'name' => 'CanonShotInformation',
        'title' => 'Shot Info',
      ),
      5 =>
      array (
        'type' => 'ifdMakerNotesCanonPanoramaInformation',
        'name' => 'CanonPanorama',
        'title' => 'Panorama',
      ),
      6 =>
      array (
        'type' => 'tag',
        'name' => 'ImageType',
        'title' => 'Image Type',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      7 =>
      array (
        'type' => 'tag',
        'name' => 'FirmwareVersion',
        'title' => 'Firmware Version',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      8 =>
      array (
        'type' => 'tag',
        'name' => 'FileNumber',
        'title' => 'File Number',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      9 =>
      array (
        'type' => 'tag',
        'name' => 'OwnerName',
        'title' => 'Owner Name',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      12 =>
      array (
        'type' => 'tag',
        'name' => 'SerialNumber',
        'title' => 'Serial Number',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      13 =>
      array (
        'type' => 'tag',
        'name' => 'CameraInfo',
        'title' => 'Camera Info',
      ),
      15 =>
      array (
        'type' => 'tag',
        'name' => 'CustomFunctions',
        'title' => 'Custom Functions',
      ),
      16 =>
      array (
        'type' => 'tag',
        'name' => 'ModelID',
        'title' => 'Model ID',
        'format' =>
        array (
          0 => 4,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1042 => 'EOS M50 / Kiss M',
            16842752 => 'PowerShot A30',
            17039360 => 'PowerShot S300 / Digital IXUS 300 / IXY Digital 300',
            17170432 => 'PowerShot A20',
            17301504 => 'PowerShot A10',
            17367040 => 'PowerShot S110 / Digital IXUS v / IXY Digital 200',
            17825792 => 'PowerShot G2',
            17891328 => 'PowerShot S40',
            17956864 => 'PowerShot S30',
            18022400 => 'PowerShot A40',
            18087936 => 'EOS D30',
            18153472 => 'PowerShot A100',
            18219008 => 'PowerShot S200 / Digital IXUS v2 / IXY Digital 200a',
            18284544 => 'PowerShot A200',
            18350080 => 'PowerShot S330 / Digital IXUS 330 / IXY Digital 300a',
            18415616 => 'PowerShot G3',
            18939904 => 'PowerShot S45',
            19070976 => 'PowerShot SD100 / Digital IXUS II / IXY Digital 30',
            19136512 => 'PowerShot S230 / Digital IXUS v3 / IXY Digital 320',
            19202048 => 'PowerShot A70',
            19267584 => 'PowerShot A60',
            19333120 => 'PowerShot S400 / Digital IXUS 400 / IXY Digital 400',
            19464192 => 'PowerShot G5',
            19922944 => 'PowerShot A300',
            19988480 => 'PowerShot S50',
            20185088 => 'PowerShot A80',
            20250624 => 'PowerShot SD10 / Digital IXUS i / IXY Digital L',
            20316160 => 'PowerShot S1 IS',
            20381696 => 'PowerShot Pro1',
            20447232 => 'PowerShot S70',
            20512768 => 'PowerShot S60',
            20971520 => 'PowerShot G6',
            21037056 => 'PowerShot S500 / Digital IXUS 500 / IXY Digital 500',
            21102592 => 'PowerShot A75',
            21233664 => 'PowerShot SD110 / Digital IXUS IIs / IXY Digital 30a',
            21299200 => 'PowerShot A400',
            21430272 => 'PowerShot A310',
            21561344 => 'PowerShot A85',
            22151168 => 'PowerShot S410 / Digital IXUS 430 / IXY Digital 450',
            22216704 => 'PowerShot A95',
            22282240 => 'PowerShot SD300 / Digital IXUS 40 / IXY Digital 50',
            22347776 => 'PowerShot SD200 / Digital IXUS 30 / IXY Digital 40',
            22413312 => 'PowerShot A520',
            22478848 => 'PowerShot A510',
            22609920 => 'PowerShot SD20 / Digital IXUS i5 / IXY Digital L2',
            23330816 => 'PowerShot S2 IS',
            23396352 => 'PowerShot SD430 / Digital IXUS Wireless / IXY Digital Wireless',
            23461888 => 'PowerShot SD500 / Digital IXUS 700 / IXY Digital 600',
            23494656 => 'EOS D60',
            24117248 => 'PowerShot SD30 / Digital IXUS i Zoom / IXY Digital L3',
            24379392 => 'PowerShot A430',
            24444928 => 'PowerShot A410',
            24510464 => 'PowerShot S80',
            24641536 => 'PowerShot A620',
            24707072 => 'PowerShot A610',
            25165824 => 'PowerShot SD630 / Digital IXUS 65 / IXY Digital 80',
            25231360 => 'PowerShot SD450 / Digital IXUS 55 / IXY Digital 60',
            25296896 => 'PowerShot TX1',
            25624576 => 'PowerShot SD400 / Digital IXUS 50 / IXY Digital 55',
            25690112 => 'PowerShot A420',
            25755648 => 'PowerShot SD900 / Digital IXUS 900 Ti / IXY Digital 1000',
            26214400 => 'PowerShot SD550 / Digital IXUS 750 / IXY Digital 700',
            26345472 => 'PowerShot A700',
            26476544 => 'PowerShot SD700 IS / Digital IXUS 800 IS / IXY Digital 800 IS',
            26542080 => 'PowerShot S3 IS',
            26607616 => 'PowerShot A540',
            26673152 => 'PowerShot SD600 / Digital IXUS 60 / IXY Digital 70',
            26738688 => 'PowerShot G7',
            26804224 => 'PowerShot A530',
            33554432 => 'PowerShot SD800 IS / Digital IXUS 850 IS / IXY Digital 900 IS',
            33619968 => 'PowerShot SD40 / Digital IXUS i7 / IXY Digital L4',
            33685504 => 'PowerShot A710 IS',
            33751040 => 'PowerShot A640',
            33816576 => 'PowerShot A630',
            34144256 => 'PowerShot S5 IS',
            34603008 => 'PowerShot A460',
            34734080 => 'PowerShot SD850 IS / Digital IXUS 950 IS / IXY Digital 810 IS',
            34799616 => 'PowerShot A570 IS',
            34865152 => 'PowerShot A560',
            34930688 => 'PowerShot SD750 / Digital IXUS 75 / IXY Digital 90',
            34996224 => 'PowerShot SD1000 / Digital IXUS 70 / IXY Digital 10',
            35127296 => 'PowerShot A550',
            35192832 => 'PowerShot A450',
            35848192 => 'PowerShot G9',
            35913728 => 'PowerShot A650 IS',
            36044800 => 'PowerShot A720 IS',
            36241408 => 'PowerShot SX100 IS',
            36700160 => 'PowerShot SD950 IS / Digital IXUS 960 IS / IXY Digital 2000 IS',
            36765696 => 'PowerShot SD870 IS / Digital IXUS 860 IS / IXY Digital 910 IS',
            36831232 => 'PowerShot SD890 IS / Digital IXUS 970 IS / IXY Digital 820 IS',
            37093376 => 'PowerShot SD790 IS / Digital IXUS 90 IS / IXY Digital 95 IS',
            37158912 => 'PowerShot SD770 IS / Digital IXUS 85 IS / IXY Digital 25 IS',
            37224448 => 'PowerShot A590 IS',
            37289984 => 'PowerShot A580',
            37879808 => 'PowerShot A470',
            37945344 => 'PowerShot SD1100 IS / Digital IXUS 80 IS / IXY Digital 20 IS',
            38141952 => 'PowerShot SX1 IS',
            38207488 => 'PowerShot SX10 IS',
            38273024 => 'PowerShot A1000 IS',
            38338560 => 'PowerShot G10',
            38862848 => 'PowerShot A2000 IS',
            38928384 => 'PowerShot SX110 IS',
            38993920 => 'PowerShot SD990 IS / Digital IXUS 980 IS / IXY Digital 3000 IS',
            39059456 => 'PowerShot SD880 IS / Digital IXUS 870 IS / IXY Digital 920 IS',
            39124992 => 'PowerShot E1',
            39190528 => 'PowerShot D10',
            39256064 => 'PowerShot SD960 IS / Digital IXUS 110 IS / IXY Digital 510 IS',
            39321600 => 'PowerShot A2100 IS',
            39387136 => 'PowerShot A480',
            39845888 => 'PowerShot SX200 IS',
            39911424 => 'PowerShot SD970 IS / Digital IXUS 990 IS / IXY Digital 830 IS',
            39976960 => 'PowerShot SD780 IS / Digital IXUS 100 IS / IXY Digital 210 IS',
            40042496 => 'PowerShot A1100 IS',
            40108032 => 'PowerShot SD1200 IS / Digital IXUS 95 IS / IXY Digital 110 IS',
            40894464 => 'PowerShot G11',
            40960000 => 'PowerShot SX120 IS',
            41025536 => 'PowerShot S90',
            41222144 => 'PowerShot SX20 IS',
            41287680 => 'PowerShot SD980 IS / Digital IXUS 200 IS / IXY Digital 930 IS',
            41353216 => 'PowerShot SD940 IS / Digital IXUS 120 IS / IXY Digital 220 IS',
            41943040 => 'PowerShot A495',
            42008576 => 'PowerShot A490',
            42074112 => 'PowerShot A3100/A3150 IS',
            42139648 => 'PowerShot A3000 IS',
            42205184 => 'PowerShot SD1400 IS / IXUS 130 / IXY 400F',
            42270720 => 'PowerShot SD1300 IS / IXUS 105 / IXY 200F',
            42336256 => 'PowerShot SD3500 IS / IXUS 210 / IXY 10S',
            42401792 => 'PowerShot SX210 IS',
            42467328 => 'PowerShot SD4000 IS / IXUS 300 HS / IXY 30S',
            42532864 => 'PowerShot SD4500 IS / IXUS 1000 HS / IXY 50S',
            43122688 => 'PowerShot G12',
            43188224 => 'PowerShot SX30 IS',
            43253760 => 'PowerShot SX130 IS',
            43319296 => 'PowerShot S95',
            43515904 => 'PowerShot A3300 IS',
            43581440 => 'PowerShot A3200 IS',
            50331648 => 'PowerShot ELPH 500 HS / IXUS 310 HS / IXY 31S',
            50397184 => 'PowerShot Pro90 IS',
            50397185 => 'PowerShot A800',
            50462720 => 'PowerShot ELPH 100 HS / IXUS 115 HS / IXY 210F',
            50528256 => 'PowerShot SX230 HS',
            50593792 => 'PowerShot ELPH 300 HS / IXUS 220 HS / IXY 410F',
            50659328 => 'PowerShot A2200',
            50724864 => 'PowerShot A1200',
            50790400 => 'PowerShot SX220 HS',
            50855936 => 'PowerShot G1 X',
            50921472 => 'PowerShot SX150 IS',
            51380224 => 'PowerShot ELPH 510 HS / IXUS 1100 HS / IXY 51S',
            51445760 => 'PowerShot S100 (new)',
            51511296 => 'PowerShot ELPH 310 HS / IXUS 230 HS / IXY 600F',
            51576832 => 'PowerShot SX40 HS',
            51642368 => 'IXY 32S',
            51773440 => 'PowerShot A1300',
            51838976 => 'PowerShot A810',
            51904512 => 'PowerShot ELPH 320 HS / IXUS 240 HS / IXY 420F',
            51970048 => 'PowerShot ELPH 110 HS / IXUS 125 HS / IXY 220F',
            52428800 => 'PowerShot D20',
            52494336 => 'PowerShot A4000 IS',
            52559872 => 'PowerShot SX260 HS',
            52625408 => 'PowerShot SX240 HS',
            52690944 => 'PowerShot ELPH 530 HS / IXUS 510 HS / IXY 1',
            52756480 => 'PowerShot ELPH 520 HS / IXUS 500 HS / IXY 3',
            52822016 => 'PowerShot A3400 IS',
            52887552 => 'PowerShot A2400 IS',
            52953088 => 'PowerShot A2300',
            53673984 => 'PowerShot G15',
            53739520 => 'PowerShot SX50 HS',
            53805056 => 'PowerShot SX160 IS',
            53870592 => 'PowerShot S110 (new)',
            53936128 => 'PowerShot SX500 IS',
            54001664 => 'PowerShot N',
            54067200 => 'IXUS 245 HS / IXY 430F',
            54525952 => 'PowerShot SX280 HS',
            54591488 => 'PowerShot SX270 HS',
            54657024 => 'PowerShot A3500 IS',
            54722560 => 'PowerShot A2600',
            54788096 => 'PowerShot SX275 HS',
            54853632 => 'PowerShot A1400',
            54919168 => 'PowerShot ELPH 130 IS / IXUS 140 / IXY 110F',
            54984704 => 'PowerShot ELPH 115/120 IS / IXUS 132/135 / IXY 90F/100F',
            55115776 => 'PowerShot ELPH 330 HS / IXUS 255 HS / IXY 610F',
            55640064 => 'PowerShot A2500',
            55836672 => 'PowerShot G16',
            55902208 => 'PowerShot S120',
            55967744 => 'PowerShot SX170 IS',
            56098816 => 'PowerShot SX510 HS',
            56164352 => 'PowerShot S200 (new)',
            56623104 => 'IXY 620F',
            56688640 => 'PowerShot N100',
            56885248 => 'PowerShot G1 X Mark II',
            56950784 => 'PowerShot D30',
            57016320 => 'PowerShot SX700 HS',
            57081856 => 'PowerShot SX600 HS',
            57147392 => 'PowerShot ELPH 140 IS / IXUS 150 / IXY 130',
            57212928 => 'PowerShot ELPH 135 / IXUS 145 / IXY 120',
            57671680 => 'PowerShot ELPH 340 HS / IXUS 265 HS / IXY 630',
            57737216 => 'PowerShot ELPH 150 IS / IXUS 155 / IXY 140',
            57933824 => 'EOS M3',
            57999360 => 'PowerShot SX60 HS',
            58064896 => 'PowerShot SX520 HS',
            58130432 => 'PowerShot SX400 IS',
            58195968 => 'PowerShot G7 X',
            58261504 => 'PowerShot N2',
            58720256 => 'PowerShot SX530 HS',
            58851328 => 'PowerShot SX710 HS',
            58916864 => 'PowerShot SX610 HS',
            58982400 => 'EOS M10',
            59047936 => 'PowerShot G3 X',
            59113472 => 'PowerShot ELPH 165 HS / IXUS 165 / IXY 160',
            59179008 => 'PowerShot ELPH 160 / IXUS 160',
            59244544 => 'PowerShot ELPH 350 HS / IXUS 275 HS / IXY 640',
            59310080 => 'PowerShot ELPH 170 IS / IXUS 170',
            59834368 => 'PowerShot SX410 IS',
            59965440 => 'PowerShot G9 X',
            60030976 => 'EOS M5',
            60096512 => 'PowerShot G5 X',
            60227584 => 'PowerShot G7 X Mark II',
            60293120 => 'EOS M100',
            60358656 => 'PowerShot ELPH 360 HS / IXUS 285 HS / IXY 650',
            67174400 => 'PowerShot SX540 HS',
            67239936 => 'PowerShot SX420 IS',
            67305472 => 'PowerShot ELPH 190 IS / IXUS 180 / IXY 190',
            67371008 => 'PowerShot G1',
            67371009 => 'IXY 180',
            67436544 => 'PowerShot SX720 HS',
            67502080 => 'PowerShot SX620 HS',
            67567616 => 'EOS M6',
            68157440 => 'PowerShot G9 X Mark II',
            68485120 => 'PowerShot ELPH 185 / IXUS 185 / IXY 200',
            68550656 => 'PowerShot SX430 IS',
            68616192 => 'PowerShot SX730 HS',
            68681728 => 'PowerShot G1 X Mark III',
            100925440 => 'PowerShot S100 / Digital IXUS / IXY Digital',
            1074255475 => 'DC19/DC21/DC22',
            1074255476 => 'XH A1',
            1074255477 => 'HV10',
            1074255478 => 'MD130/MD140/MD150/MD160/ZR850',
            1074255735 => 'DC50',
            1074255736 => 'HV20',
            1074255737 => 'DC211',
            1074255738 => 'HG10',
            1074255739 => 'HR10',
            1074255741 => 'MD255/ZR950',
            1074255900 => 'HF11',
            1074255992 => 'HV30',
            1074255996 => 'XH A1S',
            1074255998 => 'DC301/DC310/DC311/DC320/DC330',
            1074255999 => 'FS100',
            1074256000 => 'HF10',
            1074256002 => 'HG20/HG21',
            1074256165 => 'HF21',
            1074256166 => 'HF S11',
            1074256248 => 'HV40',
            1074256263 => 'DC410/DC411/DC420',
            1074256264 => 'FS19/FS20/FS21/FS22/FS200',
            1074256265 => 'HF20/HF200',
            1074256266 => 'HF S10/S100',
            1074256526 => 'HF R10/R16/R17/R18/R100/R106',
            1074256527 => 'HF M30/M31/M36/M300/M306',
            1074256528 => 'HF S20/S21/S200',
            1074256530 => 'FS31/FS36/FS37/FS300/FS305/FS306/FS307',
            1074257056 => 'EOS C300',
            1074257321 => 'HF G25',
            1074257844 => 'XC10',
            '2147483649' => 'EOS-1D',
            '2147484007' => 'EOS-1DS',
            '2147484008' => 'EOS 10D',
            '2147484009' => 'EOS-1D Mark III',
            '2147484010' => 'EOS Digital Rebel / 300D / Kiss Digital',
            '2147484020' => 'EOS-1D Mark II',
            '2147484021' => 'EOS 20D',
            '2147484022' => 'EOS Digital Rebel XSi / 450D / Kiss X2',
            '2147484040' => 'EOS-1Ds Mark II',
            '2147484041' => 'EOS Digital Rebel XT / 350D / Kiss Digital N',
            '2147484048' => 'EOS 40D',
            '2147484179' => 'EOS 5D',
            '2147484181' => 'EOS-1Ds Mark III',
            '2147484184' => 'EOS 5D Mark II',
            '2147484185' => 'WFT-E1',
            '2147484210' => 'EOS-1D Mark II N',
            '2147484212' => 'EOS 30D',
            '2147484214' => 'EOS Digital Rebel XTi / 400D / Kiss Digital X',
            '2147484225' => 'WFT-E2',
            '2147484230' => 'WFT-E3',
            '2147484240' => 'EOS 7D',
            '2147484242' => 'EOS Rebel T1i / 500D / Kiss X3',
            '2147484244' => 'EOS Rebel XS / 1000D / Kiss F',
            '2147484257' => 'EOS 50D',
            '2147484265' => 'EOS-1D X',
            '2147484272' => 'EOS Rebel T2i / 550D / Kiss X4',
            '2147484273' => 'WFT-E4',
            '2147484275' => 'WFT-E5',
            '2147484289' => 'EOS-1D Mark IV',
            '2147484293' => 'EOS 5D Mark III',
            '2147484294' => 'EOS Rebel T3i / 600D / Kiss X5',
            '2147484295' => 'EOS 60D',
            '2147484296' => 'EOS Rebel T3 / 1100D / Kiss X50',
            '2147484297' => 'EOS 7D Mark II',
            '2147484311' => 'WFT-E2 II',
            '2147484312' => 'WFT-E4 II',
            '2147484417' => 'EOS Rebel T4i / 650D / Kiss X6i',
            '2147484418' => 'EOS 6D',
            '2147484452' => 'EOS-1D C',
            '2147484453' => 'EOS 70D',
            '2147484454' => 'EOS Rebel T5i / 700D / Kiss X7i',
            '2147484455' => 'EOS Rebel T5 / 1200D / Kiss X70 / Hi',
            '2147484456' => 'EOS-1D X MARK II',
            '2147484465' => 'EOS M',
            '2147484486' => 'EOS Rebel SL1 / 100D / Kiss X7',
            '2147484487' => 'EOS Rebel T6s / 760D / 8000D',
            '2147484489' => 'EOS 5D Mark IV',
            '2147484496' => 'EOS 80D',
            '2147484501' => 'EOS M2',
            '2147484546' => 'EOS 5DS',
            '2147484563' => 'EOS Rebel T6i / 750D / Kiss X8i',
            '2147484673' => 'EOS 5DS R',
            '2147484676' => 'EOS Rebel T6 / 1300D / Kiss X80',
            '2147484677' => 'EOS Rebel T7i / 800D / Kiss X9i',
            '2147484678' => 'EOS 6D Mark II',
            '2147484680' => 'EOS 77D / 9000D',
            '2147484695' => 'EOS Rebel SL2 / 200D / Kiss X9',
            '2147484706' => 'EOS Rebel T100 / 4000D / 3000D',
            '2147484722' => 'EOS Rebel T7 / 2000D / 1500D / Kiss X90',
          ),
        ),
      ),
      18 =>
      array (
        'type' => 'tag',
        'name' => 'PictureInfo',
        'title' => 'Picture Info',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      19 =>
      array (
        'type' => 'tag',
        'name' => 'ThumbnailImageValidArea',
        'title' => 'Thumbnail Image Valid Area',
        'format' =>
        array (
          0 => 3,
        ),
        'components' => 4,
      ),
      21 =>
      array (
        'type' => 'tag',
        'name' => 'Serial Number Format',
        'title' => 'Serial number format',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      26 =>
      array (
        'type' => 'tag',
        'name' => 'SuperMacro',
        'title' => 'Super macro',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      30 =>
      array (
        'type' => 'tag',
        'name' => 'FirmwareRevision',
        'title' => 'Firmware Revision',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      38 =>
      array (
        'type' => 'tag',
        'name' => 'AFinfo',
        'title' => 'AF info',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      131 =>
      array (
        'type' => 'tag',
        'name' => 'OriginalDecision Data Offset',
        'title' => 'Original decision data offset',
        'format' =>
        array (
          0 => 9,
        ),
      ),
      147 =>
      array (
        'type' => 'ifdMakerNotesCanonFileInformation',
        'name' => 'CanonFileInformation',
        'title' => 'File Info',
      ),
      149 =>
      array (
        'type' => 'tag',
        'name' => 'LensModel',
        'title' => 'Lens model',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      150 =>
      array (
        'type' => 'tag',
        'name' => 'InternalSerialNumber',
        'title' => 'Internal serial number',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      151 =>
      array (
        'type' => 'tag',
        'name' => 'DustRemovalData',
        'title' => 'Dust removal data',
        'format' =>
        array (
          0 => 7,
        ),
      ),
      153 =>
      array (
        'type' => 'tag',
        'name' => 'CustomFunctions',
        'title' => 'Custom functions',
      ),
      160 =>
      array (
        'type' => 'tag',
        'name' => 'ProcessingInfo',
        'title' => 'Processing info',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      164 =>
      array (
        'type' => 'tag',
        'name' => 'WhiteBalanceTable',
        'title' => 'White balance table',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      170 =>
      array (
        'type' => 'tag',
        'name' => 'MeasuredColor',
        'title' => 'Measured color',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      180 =>
      array (
        'type' => 'tag',
        'name' => 'ColorSpace',
        'title' => 'Color Space',
        'format' =>
        array (
          0 => 3,
        ),
        'components' => 1,
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'sRGB',
            2 => 'Adobe RGB',
          ),
        ),
      ),
      208 =>
      array (
        'type' => 'tag',
        'name' => 'VRDOffset',
        'title' => 'VRD offset',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      224 =>
      array (
        'type' => 'tag',
        'name' => 'SensorInfo',
        'title' => 'Sensor info',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      16385 =>
      array (
        'type' => 'tag',
        'name' => 'ColorData',
        'title' => 'Color data',
        'format' =>
        array (
          0 => 3,
        ),
      ),
    ),
    'ifdExif' =>
    array (
      41730 =>
      array (
        'type' => 'tag',
        'name' => 'CFAPattern',
        'title' => 'CFA Pattern',
        'format' =>
        array (
          0 => 7,
        ),
      ),
      33434 =>
      array (
        'type' => 'tag',
        'name' => 'ExposureTime',
        'title' => 'Exposure Time',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifExposureTime',
      ),
      33437 =>
      array (
        'type' => 'tag',
        'name' => 'FNumber',
        'title' => 'FNumber',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifFNumber',
      ),
      34850 =>
      array (
        'type' => 'tag',
        'name' => 'ExposureProgram',
        'title' => 'Exposure Program',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Not defined',
            1 => 'Manual',
            2 => 'Normal program',
            3 => 'Aperture priority',
            4 => 'Shutter priority',
            5 => 'Creative program (biased toward depth of field)',
            6 => 'Action program (biased toward fast shutter speed)',
            7 => 'Portrait mode (for closeup photos with the background out of focus',
            8 => 'Landscape mode (for landscape photos with the background in focus',
          ),
        ),
      ),
      34852 =>
      array (
        'type' => 'tag',
        'name' => 'SpectralSensitivity',
        'title' => 'Spectral Sensitivity',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      34855 =>
      array (
        'type' => 'tag',
        'name' => 'ISOSpeedRatings',
        'title' => 'ISO Speed Ratings',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      34856 =>
      array (
        'type' => 'tag',
        'name' => 'OECF',
        'title' => 'OECF',
        'format' =>
        array (
          0 => 7,
        ),
      ),
      34864 =>
      array (
        'type' => 'tag',
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
      ),
      34866 =>
      array (
        'type' => 'tag',
        'name' => 'RecommendedExposureIndex',
        'title' => 'Recommended Exposure Index',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      36864 =>
      array (
        'type' => 'tag',
        'name' => 'ExifVersion',
        'title' => 'Exif Version',
        'components' => 4,
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\Version',
      ),
      36867 =>
      array (
        'type' => 'tag',
        'name' => 'DateTimeOriginal',
        'title' => 'Date and Time (original)',
        'components' => 20,
        'format' =>
        array (
          0 => 2,
        ),
        'class' => 'ExifEye\\core\\Entry\\Time',
      ),
      36868 =>
      array (
        'type' => 'tag',
        'name' => 'DateTimeDigitized',
        'title' => 'Date and Time (digitized)',
        'components' => 20,
        'format' =>
        array (
          0 => 2,
        ),
        'class' => 'ExifEye\\core\\Entry\\Time',
      ),
      36880 =>
      array (
        'type' => 'tag',
        'name' => 'OffsetTime',
        'title' => 'Timezone',
        'components' => 7,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      36881 =>
      array (
        'type' => 'tag',
        'name' => 'OffsetTimeOriginal',
        'title' => 'Timezone (original)',
        'components' => 7,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      36882 =>
      array (
        'type' => 'tag',
        'name' => 'OffsetTimeDigitized',
        'title' => 'Timezone (digitized)',
        'components' => 7,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      37121 =>
      array (
        'type' => 'tag',
        'name' => 'ComponentsConfiguration',
        'title' => 'Components Configuration',
        'components' => 4,
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifComponentsConfiguration',
      ),
      37122 =>
      array (
        'type' => 'tag',
        'name' => 'CompressedBitsPerPixel',
        'title' => 'Compressed Bits per Pixel',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      37377 =>
      array (
        'type' => 'tag',
        'name' => 'ShutterSpeedValue',
        'title' => 'Shutter Speed Value',
        'components' => 1,
        'format' =>
        array (
          0 => 10,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifShutterSpeedValue',
      ),
      37378 =>
      array (
        'type' => 'tag',
        'name' => 'ApertureValue',
        'title' => 'Aperture Value',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifApertureValue',
      ),
      37379 =>
      array (
        'type' => 'tag',
        'name' => 'BrightnessValue',
        'title' => 'Brightness Value',
        'components' => 1,
        'format' =>
        array (
          0 => 10,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifBrightnessValue',
      ),
      37380 =>
      array (
        'type' => 'tag',
        'name' => 'ExposureBiasValue',
        'title' => 'Exposure Bias',
        'components' => 1,
        'format' =>
        array (
          0 => 10,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifExposureBiasValue',
      ),
      37381 =>
      array (
        'type' => 'tag',
        'name' => 'MaxApertureValue',
        'title' => 'Max Aperture Value',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      37382 =>
      array (
        'type' => 'tag',
        'name' => 'SubjectDistance',
        'title' => 'Subject Distance',
        'components' => 1,
        'format' =>
        array (
          0 => 10,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifSubjectDistance',
      ),
      37383 =>
      array (
        'type' => 'tag',
        'name' => 'MeteringMode',
        'title' => 'Metering Mode',
        'components' => 1,
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
            2 => 'Center-Weighted Average',
            3 => 'Spot',
            4 => 'Multi Spot',
            5 => 'Pattern',
            6 => 'Partial',
            255 => 'Other',
          ),
        ),
      ),
      37384 =>
      array (
        'type' => 'tag',
        'name' => 'LightSource',
        'title' => 'Light Source',
        'components' => 1,
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
            3 => 'Tungsten (incandescent light)',
            4 => 'Flash',
            9 => 'Fine weather',
            10 => 'Cloudy weather',
            11 => 'Shade',
            12 => 'Daylight fluorescent',
            13 => 'Day white fluorescent',
            14 => 'Cool white fluorescent',
            15 => 'White fluorescent',
            17 => 'Standard light A',
            18 => 'Standard light B',
            19 => 'Standard light C',
            20 => 'D55',
            21 => 'D65',
            22 => 'D75',
            24 => 'ISO studio tungsten',
            255 => 'Other',
          ),
        ),
      ),
      37385 =>
      array (
        'type' => 'tag',
        'name' => 'Flash',
        'title' => 'Flash',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Flash did not fire.',
            1 => 'Flash fired.',
            5 => 'Strobe return light not detected.',
            7 => 'Strobe return light detected.',
            9 => 'Flash fired, compulsory flash mode.',
            13 => 'Flash fired, compulsory flash mode, return light not detected.',
            15 => 'Flash fired, compulsory flash mode, return light detected.',
            16 => 'Flash did not fire, compulsory flash mode.',
            24 => 'Flash did not fire, auto mode.',
            25 => 'Flash fired, auto mode.',
            29 => 'Flash fired, auto mode, return light not detected.',
            31 => 'Flash fired, auto mode, return light detected.',
            32 => 'No flash function.',
            65 => 'Flash fired, red-eye reduction mode.',
            69 => 'Flash fired, red-eye reduction mode, return light not detected.',
            71 => 'Flash fired, red-eye reduction mode, return light detected.',
            73 => 'Flash fired, compulsory flash mode, red-eye reduction mode.',
            77 => 'Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected.',
            79 => 'Flash fired, compulsory flash mode, red-eye reduction mode, return light detected.',
            88 => 'Flash did not fire, auto mode, red-eye reduction mode.',
            89 => 'Flash fired, auto mode, red-eye reduction mode.',
            93 => 'Flash fired, auto mode, return light not detected, red-eye reduction mode.',
            95 => 'Flash fired, auto mode, return light detected, red-eye reduction mode.',
          ),
        ),
      ),
      37386 =>
      array (
        'type' => 'tag',
        'name' => 'FocalLength',
        'title' => 'Focal Length',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifFocalLength',
      ),
      37396 =>
      array (
        'type' => 'tag',
        'name' => 'SubjectArea',
        'title' => 'Subject Area',
        'format' =>
        array (
          0 => 3,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifSubjectArea',
      ),
      37500 =>
      array (
        'type' => 'tag',
        'name' => 'MakerNote',
        'title' => 'Maker Note',
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifMakerNote',
      ),
      37510 =>
      array (
        'type' => 'tag',
        'name' => 'UserComment',
        'title' => 'User Comment',
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifUserComment',
      ),
      37520 =>
      array (
        'type' => 'tag',
        'name' => 'SubSecTime',
        'title' => 'SubSec Time',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      37521 =>
      array (
        'type' => 'tag',
        'name' => 'SubSecTimeOriginal',
        'title' => 'SubSec Time Original',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      37522 =>
      array (
        'type' => 'tag',
        'name' => 'SubSecTimeDigitized',
        'title' => 'SubSec Time Digitized',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      40960 =>
      array (
        'type' => 'tag',
        'name' => 'FlashPixVersion',
        'title' => 'FlashPix Version',
        'components' => 4,
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\Version',
      ),
      40961 =>
      array (
        'type' => 'tag',
        'name' => 'ColorSpace',
        'title' => 'Color Space',
        'components' => 1,
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
            65535 => 'Uncalibrated',
          ),
        ),
      ),
      40962 =>
      array (
        'type' => 'tag',
        'name' => 'PixelXDimension',
        'title' => 'Pixel x-Dimension',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      40963 =>
      array (
        'type' => 'tag',
        'name' => 'PixelYDimension',
        'title' => 'Pixel y-Dimension',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      40964 =>
      array (
        'type' => 'tag',
        'name' => 'RelatedSoundFile',
        'title' => 'Related Sound File',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      40965 =>
      array (
        'type' => 'ifdInteroperability',
        'name' => 'Interoperability',
        'title' => 'Interoperability IFD',
      ),
      41483 =>
      array (
        'type' => 'tag',
        'name' => 'FlashEnergy',
        'title' => 'Flash Energy',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      41484 =>
      array (
        'type' => 'tag',
        'name' => 'SpatialFrequencyResponse',
        'title' => 'Spatial Frequency Response',
        'format' =>
        array (
          0 => 7,
        ),
      ),
      41486 =>
      array (
        'type' => 'tag',
        'name' => 'FocalPlaneXResolution',
        'title' => 'Focal Plane x-Resolution',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      41487 =>
      array (
        'type' => 'tag',
        'name' => 'FocalPlaneYResolution',
        'title' => 'Focal Plane y-Resolution',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      41488 =>
      array (
        'type' => 'tag',
        'name' => 'FocalPlaneResolutionUnit',
        'title' => 'Focal Plane Resolution Unit',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            2 => 'Inch',
            3 => 'Centimeter',
          ),
        ),
      ),
      41492 =>
      array (
        'type' => 'tag',
        'name' => 'SubjectLocation',
        'title' => 'Subject Location',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      41493 =>
      array (
        'type' => 'tag',
        'name' => 'ExposureIndex',
        'title' => 'Exposure index',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      41495 =>
      array (
        'type' => 'tag',
        'name' => 'SensingMethod',
        'title' => 'Sensing Method',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Not defined',
            2 => 'One-chip color area sensor',
            3 => 'Two-chip color area sensor',
            4 => 'Three-chip color area sensor',
            5 => 'Color sequential area sensor',
            7 => 'Trilinear sensor',
            8 => 'Color sequential linear sensor',
          ),
        ),
      ),
      41728 =>
      array (
        'type' => 'tag',
        'name' => 'FileSource',
        'title' => 'File Source',
        'components' => 1,
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifFileSource',
      ),
      41729 =>
      array (
        'type' => 'tag',
        'name' => 'SceneType',
        'title' => 'Scene Type',
        'components' => 1,
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\ExifSceneType',
      ),
      41985 =>
      array (
        'type' => 'tag',
        'name' => 'CustomRendered',
        'title' => 'Custom Rendered',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Normal process',
            1 => 'Custom process',
          ),
        ),
      ),
      41986 =>
      array (
        'type' => 'tag',
        'name' => 'ExposureMode',
        'title' => 'Exposure Mode',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Auto exposure',
            1 => 'Manual exposure',
            2 => 'Auto bracket',
          ),
        ),
      ),
      41987 =>
      array (
        'type' => 'tag',
        'name' => 'WhiteBalance',
        'title' => 'White Balance',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Auto white balance',
            1 => 'Manual white balance',
          ),
        ),
      ),
      41988 =>
      array (
        'type' => 'tag',
        'name' => 'DigitalZoomRatio',
        'title' => 'Digital Zoom Ratio',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      41989 =>
      array (
        'type' => 'tag',
        'name' => 'FocalLengthIn35mmFilm',
        'title' => 'Focal Length In 35mm Film',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      41990 =>
      array (
        'type' => 'tag',
        'name' => 'SceneCaptureType',
        'title' => 'Scene Capture Type',
        'components' => 1,
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
            3 => 'Night scene',
          ),
        ),
      ),
      41991 =>
      array (
        'type' => 'tag',
        'name' => 'GainControl',
        'title' => 'Gain Control',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Normal',
            1 => 'Low gain up',
            2 => 'High gain up',
            3 => 'Low gain down',
            4 => 'High gain down',
          ),
        ),
      ),
      41992 =>
      array (
        'type' => 'tag',
        'name' => 'Contrast',
        'title' => 'Contrast',
        'components' => 1,
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
      ),
      41993 =>
      array (
        'type' => 'tag',
        'name' => 'Saturation',
        'title' => 'Saturation',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Normal',
            1 => 'Low saturation',
            2 => 'High saturation',
          ),
        ),
      ),
      41994 =>
      array (
        'type' => 'tag',
        'name' => 'Sharpness',
        'title' => 'Sharpness',
        'components' => 1,
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
      ),
      41995 =>
      array (
        'type' => 'tag',
        'name' => 'DeviceSettingDescription',
        'title' => 'Device Setting Description',
      ),
      41996 =>
      array (
        'type' => 'tag',
        'name' => 'SubjectDistanceRange',
        'title' => 'Subject Distance Range',
        'components' => 1,
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
            2 => 'Close view',
            3 => 'Distant view',
          ),
        ),
      ),
      42016 =>
      array (
        'type' => 'tag',
        'name' => 'ImageUniqueID',
        'title' => 'Image Unique ID',
        'components' => 32,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      42032 =>
      array (
        'type' => 'tag',
        'name' => 'OwnerName',
        'title' => 'Owner Name',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      42033 =>
      array (
        'type' => 'tag',
        'name' => 'SerialNumber',
        'title' => 'Serial Number',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      42034 =>
      array (
        'type' => 'tag',
        'name' => 'LensInfo',
        'title' => 'Lens Information',
        'format' =>
        array (
          0 => 5,
        ),
      ),
      42035 =>
      array (
        'type' => 'tag',
        'name' => 'LensMake',
        'title' => 'Lens Make',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      42036 =>
      array (
        'type' => 'tag',
        'name' => 'LensModel',
        'title' => 'Lens Model',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      42037 =>
      array (
        'type' => 'tag',
        'name' => 'LensSerialNumber',
        'title' => 'Lens Serial Number',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      42240 =>
      array (
        'type' => 'tag',
        'name' => 'Gamma',
        'title' => 'Gamma',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
    ),
    'ifdMakerNotesApple' =>
    array (
      3 =>
      array (
        'type' => 'ifdMakerNotesAppleRuntime',
        'name' => 'AppleRunTime',
        'title' => 'Apple Run Time',
      ),
      8 =>
      array (
        'type' => 'tag',
        'name' => 'AccelerationVector',
        'title' => 'Acceleration Vector',
        'format' =>
        array (
          0 => 10,
        ),
      ),
      10 =>
      array (
        'type' => 'tag',
        'name' => 'HDRImageType',
        'title' => 'HDRImageType',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            3 => 'HDR Image',
            4 => 'Original Image',
          ),
        ),
      ),
      11 =>
      array (
        'type' => 'tag',
        'name' => 'BurstUUID',
        'title' => 'Burst UUID',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      17 =>
      array (
        'type' => 'tag',
        'name' => 'ContentIdentifier',
        'title' => 'Content Identifier',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      21 =>
      array (
        'type' => 'tag',
        'name' => 'ImageUniqueID',
        'title' => 'ImageUniqueID',
        'format' =>
        array (
          0 => 2,
        ),
      ),
    ),
    'ifdMakerNotesAppleRuntime' =>
    array (
      1 =>
      array (
        'type' => 'tag',
        'name' => 'flags',
        'title' => 'Flags',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      2 =>
      array (
        'type' => 'tag',
        'name' => 'value',
        'title' => 'Value',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      3 =>
      array (
        'type' => 'tag',
        'name' => 'timescale',
        'title' => 'Timescale',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      4 =>
      array (
        'type' => 'tag',
        'name' => 'epoch',
        'title' => 'Epoch',
        'format' =>
        array (
          0 => 2,
        ),
      ),
    ),
    'ifdMakerNotesCanonCameraSettings' =>
    array (
      1 =>
      array (
        'type' => 'tag',
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
      ),
      2 =>
      array (
        'type' => 'tag',
        'name' => 'SelfTimer',
        'title' => 'Self Timer',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      3 =>
      array (
        'type' => 'tag',
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
            130 => 'Normal Movie',
            131 => 'Movie (2)',
          ),
        ),
      ),
      4 =>
      array (
        'type' => 'tag',
        'name' => 'CanonFlashMode',
        'title' => 'Flash Mode',
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
      ),
      5 =>
      array (
        'type' => 'tag',
        'name' => 'ContinuousDrive',
        'title' => 'Continuous Drive Mode',
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
      ),
      7 =>
      array (
        'type' => 'tag',
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
      ),
      9 =>
      array (
        'type' => 'tag',
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
            13 => 'CR3',
          ),
        ),
      ),
      10 =>
      array (
        'type' => 'tag',
        'name' => 'CanonImageSize',
        'title' => 'Image Size',
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
      ),
      11 =>
      array (
        'type' => 'tag',
        'name' => 'EasyMode',
        'title' => 'Easy Shooting Mode',
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
      ),
      12 =>
      array (
        'type' => 'tag',
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
      ),
      13 =>
      array (
        'type' => 'tag',
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
      ),
      14 =>
      array (
        'type' => 'tag',
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
      ),
      15 =>
      array (
        'type' => 'tag',
        'name' => 'Sharpness',
        'title' => 'Sharpness',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      16 =>
      array (
        'type' => 'tag',
        'name' => 'CameraISO',
        'title' => 'ISO Speed',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      17 =>
      array (
        'type' => 'tag',
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
      ),
      18 =>
      array (
        'type' => 'tag',
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
      ),
      19 =>
      array (
        'type' => 'tag',
        'name' => 'AFPoint',
        'title' => 'Auto Focus Point Selected',
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
      ),
      20 =>
      array (
        'type' => 'tag',
        'name' => 'CanonExposureMode',
        'title' => 'Exposure Mode',
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
      ),
      22 =>
      array (
        'type' => 'tag',
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
            94 => 'Canon TS-E 17mm f/4L',
            95 => 'Canon TS-E 24.0mm f/3.5 L II',
            124 => 'Canon MP-E 65mm f/2.8 1-5x Macro Photo',
            125 => 'Canon TS-E 24mm f/3.5L',
            126 => 'Canon TS-E 45mm f/2.8',
            127 => 'Canon TS-E 90mm f/2.8',
            129 => 'Canon EF 300mm f/2.8L',
            130 => 'Canon EF 50mm f/1.0L',
            131 => 'Canon EF 28-80mm f/2.8-4L or Sigma Lens',
            '131.1' => 'Sigma 8mm f/3.5 EX DG Circular Fisheye',
            '131.2' => 'Sigma 17-35mm f/2.8-4 EX DG Aspherical HSM',
            '131.3' => 'Sigma 17-70mm f/2.8-4.5 DC Macro',
            '131.4' => 'Sigma APO 50-150mm f/2.8 [II] EX DC HSM',
            '131.5' => 'Sigma APO 120-300mm f/2.8 EX DG HSM',
            '131.6' => 'Sigma 4.5mm f/2.8 EX DC HSM Circular Fisheye',
            '131.7' => 'Sigma 70-200mm f/2.8 APO EX HSM',
            132 => 'Canon EF 1200mm f/5.6L',
            134 => 'Canon EF 600mm f/4L IS',
            135 => 'Canon EF 200mm f/1.8L',
            136 => 'Canon EF 300mm f/2.8L',
            137 => 'Canon EF 85mm f/1.2L or Sigma or Tamron Lens',
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
            139 => 'Canon EF 400mm f/2.8L',
            140 => 'Canon EF 500mm f/4.5L',
            141 => 'Canon EF 500mm f/4.5L',
            142 => 'Canon EF 300mm f/2.8L IS',
            143 => 'Canon EF 500mm f/4L IS or Sigma Lens',
            '143.1' => 'Sigma 17-70mm f/2.8-4 DC Macro OS HSM',
            144 => 'Canon EF 35-135mm f/4-5.6 USM',
            145 => 'Canon EF 100-300mm f/4.5-5.6 USM',
            146 => 'Canon EF 70-210mm f/3.5-4.5 USM',
            147 => 'Canon EF 35-135mm f/4-5.6 USM',
            148 => 'Canon EF 28-80mm f/3.5-5.6 USM',
            149 => 'Canon EF 100mm f/2 USM',
            150 => 'Canon EF 14mm f/2.8L or Sigma Lens',
            '150.1' => 'Sigma 20mm EX f/1.8',
            '150.2' => 'Sigma 30mm f/1.4 DC HSM',
            '150.3' => 'Sigma 24mm f/1.8 DG Macro EX',
            '150.4' => 'Sigma 28mm f/1.8 DG Macro EX',
            151 => 'Canon EF 200mm f/2.8L',
            152 => 'Canon EF 300mm f/4L IS or Sigma Lens',
            '152.1' => 'Sigma 12-24mm f/4.5-5.6 EX DG ASPHERICAL HSM',
            '152.2' => 'Sigma 14mm f/2.8 EX Aspherical HSM',
            '152.3' => 'Sigma 10-20mm f/4-5.6',
            '152.4' => 'Sigma 100-300mm f/4',
            153 => 'Canon EF 35-350mm f/3.5-5.6L or Sigma or Tamron Lens',
            '153.1' => 'Sigma 50-500mm f/4-6.3 APO HSM EX',
            '153.2' => 'Tamron AF 28-300mm f/3.5-6.3 XR LD Aspherical [IF] Macro',
            '153.3' => 'Tamron AF 18-200mm f/3.5-6.3 XR Di II LD Aspherical [IF] Macro Model A14',
            '153.4' => 'Tamron 18-250mm f/3.5-6.3 Di II LD Aspherical [IF] Macro',
            154 => 'Canon EF 20mm f/2.8 USM or Zeiss Lens',
            '154.1' => 'Zeiss Milvus 21mm f/2.8',
            155 => 'Canon EF 85mm f/1.8 USM',
            156 => 'Canon EF 28-105mm f/3.5-4.5 USM or Tamron Lens',
            '156.1' => 'Tamron SP 70-300mm f/4.0-5.6 Di VC USD',
            '156.2' => 'Tamron SP AF 28-105mm f/2.8 LD Aspherical IF',
            160 => 'Canon EF 20-35mm f/3.5-4.5 USM or Tamron or Tokina Lens',
            '160.1' => 'Tamron AF 19-35mm f/3.5-4.5',
            '160.2' => 'Tokina AT-X 124 AF Pro DX 12-24mm f/4',
            '160.3' => 'Tokina AT-X 107 AF DX 10-17mm f/3.5-4.5 Fisheye',
            '160.4' => 'Tokina AT-X 116 AF Pro DX 11-16mm f/2.8',
            '160.5' => 'Tokina AT-X 11-20 F2.8 PRO DX Aspherical 11-20mm f/2.8',
            161 => 'Canon EF 28-70mm f/2.8L or Sigma or Tamron Lens',
            '161.1' => 'Sigma 24-70mm f/2.8 EX',
            '161.2' => 'Sigma 28-70mm f/2.8 EX',
            '161.3' => 'Sigma 24-60mm f/2.8 EX DG',
            '161.4' => 'Tamron AF 17-50mm f/2.8 Di-II LD Aspherical',
            '161.5' => 'Tamron 90mm f/2.8',
            '161.6' => 'Tamron SP AF 17-35mm f/2.8-4 Di LD Aspherical IF',
            '161.7' => 'Tamron SP AF 28-75mm f/2.8 XR Di LD Aspherical [IF] Macro',
            162 => 'Canon EF 200mm f/2.8L',
            163 => 'Canon EF 300mm f/4L',
            164 => 'Canon EF 400mm f/5.6L',
            165 => 'Canon EF 70-200mm f/2.8 L',
            166 => 'Canon EF 70-200mm f/2.8 L + 1.4x',
            167 => 'Canon EF 70-200mm f/2.8 L + 2x',
            168 => 'Canon EF 28mm f/1.8 USM or Sigma Lens',
            '168.1' => 'Sigma 50-100mm f/1.8 DC HSM | A',
            169 => 'Canon EF 17-35mm f/2.8L or Sigma Lens',
            '169.1' => 'Sigma 18-200mm f/3.5-6.3 DC OS',
            '169.2' => 'Sigma 15-30mm f/3.5-4.5 EX DG Aspherical',
            '169.3' => 'Sigma 18-50mm f/2.8 Macro',
            '169.4' => 'Sigma 50mm f/1.4 EX DG HSM',
            '169.5' => 'Sigma 85mm f/1.4 EX DG HSM',
            '169.6' => 'Sigma 30mm f/1.4 EX DC HSM',
            '169.7' => 'Sigma 35mm f/1.4 DG HSM',
            170 => 'Canon EF 200mm f/2.8L II',
            171 => 'Canon EF 300mm f/4L',
            172 => 'Canon EF 400mm f/5.6L or Sigma Lens',
            '172.1' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S',
            173 => 'Canon EF 180mm Macro f/3.5L or Sigma Lens',
            '173.1' => 'Sigma 180mm EX HSM Macro f/3.5',
            '173.2' => 'Sigma APO Macro 150mm f/2.8 EX DG HSM',
            174 => 'Canon EF 135mm f/2L or Other Lens',
            '174.1' => 'Sigma 70-200mm f/2.8 EX DG APO OS HSM',
            '174.2' => 'Sigma 50-500mm f/4.5-6.3 APO DG OS HSM',
            '174.3' => 'Sigma 150-500mm f/5-6.3 APO DG OS HSM',
            '174.4' => 'Zeiss Milvus 100mm f/2 Makro',
            175 => 'Canon EF 400mm f/2.8L',
            176 => 'Canon EF 24-85mm f/3.5-4.5 USM',
            177 => 'Canon EF 300mm f/4L IS',
            178 => 'Canon EF 28-135mm f/3.5-5.6 IS',
            179 => 'Canon EF 24mm f/1.4L',
            180 => 'Canon EF 35mm f/1.4L or Other Lens',
            '180.1' => 'Sigma 50mm f/1.4 DG HSM | A',
            '180.2' => 'Sigma 24mm f/1.4 DG HSM | A',
            '180.3' => 'Zeiss Milvus 50mm f/1.4',
            '180.4' => 'Zeiss Milvus 85mm f/1.4',
            '180.5' => 'Zeiss Otus 28mm f/1.4 ZE',
            181 => 'Canon EF 100-400mm f/4.5-5.6L IS + 1.4x or Sigma Lens',
            '181.1' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S + 1.4x',
            182 => 'Canon EF 100-400mm f/4.5-5.6L IS + 2x or Sigma Lens',
            '182.1' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S + 2x',
            183 => 'Canon EF 100-400mm f/4.5-5.6L IS or Sigma Lens',
            '183.1' => 'Sigma 150mm f/2.8 EX DG OS HSM APO Macro',
            '183.2' => 'Sigma 105mm f/2.8 EX DG OS HSM Macro',
            '183.3' => 'Sigma 180mm f/2.8 EX DG OS HSM APO Macro',
            '183.4' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | C',
            '183.5' => 'Sigma 150-600mm f/5-6.3 DG OS HSM | S',
            '183.6' => 'Sigma 100-400mm f/5-6.3 DG OS HSM',
            184 => 'Canon EF 400mm f/2.8L + 2x',
            185 => 'Canon EF 600mm f/4L IS',
            186 => 'Canon EF 70-200mm f/4L',
            187 => 'Canon EF 70-200mm f/4L + 1.4x',
            188 => 'Canon EF 70-200mm f/4L + 2x',
            189 => 'Canon EF 70-200mm f/4L + 2.8x',
            190 => 'Canon EF 100mm f/2.8 Macro USM',
            191 => 'Canon EF 400mm f/4 DO IS',
            193 => 'Canon EF 35-80mm f/4-5.6 USM',
            194 => 'Canon EF 80-200mm f/4.5-5.6 USM',
            195 => 'Canon EF 35-105mm f/4.5-5.6 USM',
            196 => 'Canon EF 75-300mm f/4-5.6 USM',
            197 => 'Canon EF 75-300mm f/4-5.6 IS USM or Sigma Lens',
            '197.1' => 'Sigma 18-300mm f/3.5-6.3 DC Macro OS HS',
            198 => 'Canon EF 50mm f/1.4 USM or Zeiss Lens',
            '198.1' => 'Zeiss Otus 55mm f/1.4 ZE',
            '198.2' => 'Zeiss Otus 85mm f/1.4 ZE',
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
            224 => 'Canon EF 70-200mm f/2.8L IS',
            225 => 'Canon EF 70-200mm f/2.8L IS + 1.4x',
            226 => 'Canon EF 70-200mm f/2.8L IS + 2x',
            227 => 'Canon EF 70-200mm f/2.8L IS + 2.8x',
            228 => 'Canon EF 28-105mm f/3.5-4.5 USM',
            229 => 'Canon EF 16-35mm f/2.8L',
            230 => 'Canon EF 24-70mm f/2.8L',
            231 => 'Canon EF 17-40mm f/4L',
            232 => 'Canon EF 70-300mm f/4.5-5.6 DO IS USM',
            233 => 'Canon EF 28-300mm f/3.5-5.6L IS',
            234 => 'Canon EF-S 17-85mm f/4-5.6 IS USM or Tokina Lens',
            '234.1' => 'Tokina AT-X 12-28 PRO DX 12-28mm f/4',
            235 => 'Canon EF-S 10-22mm f/3.5-4.5 USM',
            236 => 'Canon EF-S 60mm f/2.8 Macro USM',
            237 => 'Canon EF 24-105mm f/4L IS',
            238 => 'Canon EF 70-300mm f/4-5.6 IS USM',
            239 => 'Canon EF 85mm f/1.2L II',
            240 => 'Canon EF-S 17-55mm f/2.8 IS USM',
            241 => 'Canon EF 50mm f/1.2L',
            242 => 'Canon EF 70-200mm f/4L IS',
            243 => 'Canon EF 70-200mm f/4L IS + 1.4x',
            244 => 'Canon EF 70-200mm f/4L IS + 2x',
            245 => 'Canon EF 70-200mm f/4L IS + 2.8x',
            246 => 'Canon EF 16-35mm f/2.8L II',
            247 => 'Canon EF 14mm f/2.8L II USM',
            248 => 'Canon EF 200mm f/2L IS or Sigma Lens',
            '248.1' => 'Sigma 24-35mm f/2 DG HSM | A',
            249 => 'Canon EF 800mm f/5.6L IS',
            250 => 'Canon EF 24mm f/1.4L II or Sigma Lens',
            '250.1' => 'Sigma 20mm f/1.4 DG HSM | A',
            251 => 'Canon EF 70-200mm f/2.8L IS II USM',
            252 => 'Canon EF 70-200mm f/2.8L IS II USM + 1.4x',
            253 => 'Canon EF 70-200mm f/2.8L IS II USM + 2x',
            254 => 'Canon EF 100mm f/2.8L Macro IS USM',
            255 => 'Sigma 24-105mm f/4 DG OS HSM | A or Other Sigma Lens',
            '255.1' => 'Sigma 180mm f/2.8 EX DG OS HSM APO Macro',
            488 => 'Canon EF-S 15-85mm f/3.5-5.6 IS USM',
            489 => 'Canon EF 70-300mm f/4-5.6L IS USM',
            490 => 'Canon EF 8-15mm f/4L Fisheye USM',
            491 => 'Canon EF 300mm f/2.8L IS II USM or Tamron Lens',
            '491.1' => 'Tamron SP 70-200mm F/2.8 Di VC USD G2 (A025)',
            '491.2' => 'Tamron 18-400mm F/3.5-6.3 Di II VC HLD (B028)',
            492 => 'Canon EF 400mm f/2.8L IS II USM',
            493 => 'Canon EF 500mm f/4L IS II USM or EF 24-105mm f4L IS USM',
            '493.1' => 'Canon EF 24-105mm f/4L IS USM',
            494 => 'Canon EF 600mm f/4.0L IS II USM',
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
            '747.1' => 'Tamron SP 150-600mm F5-6.3 Di VC USD G2',
            748 => 'Canon EF 100-400mm f/4.5-5.6L IS II USM + 1.4x',
            750 => 'Canon EF 35mm f/1.4L II USM',
            751 => 'Canon EF 16-35mm f/2.8L III USM',
            752 => 'Canon EF 24-105mm f/4L IS II USM',
            4142 => 'Canon EF-S 18-135mm f/3.5-5.6 IS STM',
            4143 => 'Canon EF-M 18-55mm f/3.5-5.6 IS STM or Tamron Lens',
            '4143.1' => 'Tamron 18-200mm F/3.5-6.3 Di III VC',
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
            61494 => 'Canon CN-E 85mm T1.3 L F',
            65535 => 'n/a',
          ),
        ),
      ),
      23 =>
      array (
        'type' => 'tag',
        'name' => 'MaxFocalLength',
        'title' => 'Max Focal Length',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      24 =>
      array (
        'type' => 'tag',
        'name' => 'MinFocalLength',
        'title' => 'Min Focal Length',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      25 =>
      array (
        'type' => 'tag',
        'name' => 'FocalUnits',
        'title' => 'Focal Units',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      26 =>
      array (
        'type' => 'tag',
        'name' => 'MaxAperture',
        'title' => 'Max Aperture',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      27 =>
      array (
        'type' => 'tag',
        'name' => 'MinAperture',
        'title' => 'Min Aperture',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      28 =>
      array (
        'type' => 'tag',
        'name' => 'FlashActivity',
        'title' => 'Flash Activity',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      29 =>
      array (
        'type' => 'tag',
        'name' => 'FlashDetails',
        'title' => 'Flash Details',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      32 =>
      array (
        'type' => 'tag',
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
      ),
      33 =>
      array (
        'type' => 'tag',
        'name' => 'AESetting',
        'title' => 'Auto Exposure Setting',
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
      ),
      34 =>
      array (
        'type' => 'tag',
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
      ),
      35 =>
      array (
        'type' => 'tag',
        'name' => 'DisplayAperture',
        'title' => 'Display Aperture',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      36 =>
      array (
        'type' => 'tag',
        'name' => 'ZoomSourceWidth',
        'title' => 'Zoom Source Width',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      37 =>
      array (
        'type' => 'tag',
        'name' => 'ZoomTargetWidth',
        'title' => 'Zoom Target Width',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      39 =>
      array (
        'type' => 'tag',
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
      ),
      40 =>
      array (
        'type' => 'tag',
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
      ),
      41 =>
      array (
        'type' => 'tag',
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
      ),
      42 =>
      array (
        'type' => 'tag',
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
      ),
      46 =>
      array (
        'type' => 'tag',
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
      ),
    ),
    'ifdMakerNotesCanonPictureInformation' =>
    array (
      2 =>
      array (
        'type' => 'tag',
        'name' => 'ImageWidth',
        'title' => 'Image Width',
      ),
      3 =>
      array (
        'type' => 'tag',
        'name' => 'ImageHeight',
        'title' => 'Image Height',
      ),
      4 =>
      array (
        'type' => 'tag',
        'name' => 'ImageWidthAsShot',
        'title' => 'Image Width As Shot',
      ),
      5 =>
      array (
        'type' => 'tag',
        'name' => 'ImageHeightAsShot',
        'title' => 'Image Height As Shot',
      ),
      22 =>
      array (
        'type' => 'tag',
        'name' => 'AFPointsUsed',
        'title' => 'AF Points Used',
      ),
      26 =>
      array (
        'type' => 'tag',
        'name' => 'AFPointsUsed20D',
        'title' => 'AF Points Used (20D)',
      ),
    ),
    'ifdInteroperability' =>
    array (
      1 =>
      array (
        'type' => 'tag',
        'name' => 'InteroperabilityIndex',
        'title' => 'Interoperability Index',
        'components' => 4,
        'format' =>
        array (
          0 => 2,
        ),
      ),
      2 =>
      array (
        'type' => 'tag',
        'name' => 'InteroperabilityVersion',
        'title' => 'Interoperability Version',
        'components' => 4,
        'format' =>
        array (
          0 => 7,
        ),
        'class' => 'ExifEye\\core\\Entry\\Version',
      ),
      4096 =>
      array (
        'type' => 'tag',
        'name' => 'RelatedImageFileFormat',
        'title' => 'Related Image File Format',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      4097 =>
      array (
        'type' => 'tag',
        'name' => 'RelatedImageWidth',
        'title' => 'Related Image Width',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      4098 =>
      array (
        'type' => 'tag',
        'name' => 'RelatedImageLength',
        'title' => 'Related Image Length',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
    ),
    'ifd0' =>
    array (
      256 =>
      array (
        'type' => 'tag',
        'name' => 'ImageWidth',
        'title' => 'Image Width',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      257 =>
      array (
        'type' => 'tag',
        'name' => 'ImageLength',
        'title' => 'Image Length',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      258 =>
      array (
        'type' => 'tag',
        'name' => 'BitsPerSample',
        'title' => 'Bits per Sample',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      259 =>
      array (
        'type' => 'tag',
        'name' => 'Compression',
        'title' => 'Compression',
        'components' => 1,
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
            34661 => 'JBIG',
            34676 => 'SGILog',
            34677 => 'SGILog24',
            34712 => 'JPEG 2000',
            34713 => 'Nikon NEF Compressed',
            34715 => 'JBIG2 TIFF FX',
            34718 => 'Microsoft Document Imaging (MDI) Binary Level Codec',
            34719 => 'Microsoft Document Imaging (MDI) Progressive Transform Codec',
            34720 => 'Microsoft Document Imaging (MDI) Vector',
            34892 => 'Lossy JPEG',
            65000 => 'Kodak DCR Compressed',
            65535 => 'Pentax PEF Compressed',
          ),
        ),
      ),
      262 =>
      array (
        'type' => 'tag',
        'name' => 'PhotometricInterpretation',
        'title' => 'Photometric Interpretation',
        'components' => 1,
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
            34892 => 'Linear Raw',
          ),
        ),
      ),
      266 =>
      array (
        'type' => 'tag',
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
      ),
      269 =>
      array (
        'type' => 'tag',
        'name' => 'DocumentName',
        'title' => 'Document Name',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      270 =>
      array (
        'type' => 'tag',
        'name' => 'ImageDescription',
        'title' => 'Image Description',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      271 =>
      array (
        'type' => 'tag',
        'name' => 'Make',
        'title' => 'Manufacturer',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      272 =>
      array (
        'type' => 'tag',
        'name' => 'Model',
        'title' => 'Model',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      273 =>
      array (
        'type' => 'tag',
        'name' => 'StripOffsets',
        'title' => 'Strip Offsets',
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      274 =>
      array (
        'type' => 'tag',
        'name' => 'Orientation',
        'title' => 'Orientation',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'top - left',
            2 => 'top - right',
            3 => 'bottom - right',
            4 => 'bottom - left',
            5 => 'left - top',
            6 => 'right - top',
            7 => 'right - bottom',
            8 => 'left - bottom',
          ),
        ),
      ),
      277 =>
      array (
        'type' => 'tag',
        'name' => 'SamplesPerPixel',
        'title' => 'Samples per Pixel',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      278 =>
      array (
        'type' => 'tag',
        'name' => 'RowsPerStrip',
        'title' => 'Rows per Strip',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      279 =>
      array (
        'type' => 'tag',
        'name' => 'StripByteCounts',
        'title' => 'Strip Byte Count',
        'format' =>
        array (
          0 => 3,
          1 => 4,
        ),
      ),
      282 =>
      array (
        'type' => 'tag',
        'name' => 'XResolution',
        'title' => 'x-Resolution',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      283 =>
      array (
        'type' => 'tag',
        'name' => 'YResolution',
        'title' => 'y-Resolution',
        'components' => 1,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      284 =>
      array (
        'type' => 'tag',
        'name' => 'PlanarConfiguration',
        'title' => 'Planar Configuration',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Chunky format',
            2 => 'Planar format',
          ),
        ),
      ),
      296 =>
      array (
        'type' => 'tag',
        'name' => 'ResolutionUnit',
        'title' => 'Resolution Unit',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            2 => 'Inch',
            3 => 'Centimeter',
          ),
        ),
      ),
      301 =>
      array (
        'type' => 'tag',
        'name' => 'TransferFunction',
        'title' => 'Transfer Function',
        'components' => 3,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      305 =>
      array (
        'type' => 'tag',
        'name' => 'Software',
        'title' => 'Software',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      306 =>
      array (
        'type' => 'tag',
        'name' => 'DateTime',
        'title' => 'Date and Time',
        'components' => 20,
        'format' =>
        array (
          0 => 2,
        ),
        'class' => 'ExifEye\\core\\Entry\\Time',
      ),
      315 =>
      array (
        'type' => 'tag',
        'name' => 'Artist',
        'title' => 'Artist',
        'format' =>
        array (
          0 => 2,
        ),
      ),
      317 =>
      array (
        'type' => 'tag',
        'name' => 'Predictor',
        'title' => 'Predictor',
        'components' => 1,
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
      ),
      318 =>
      array (
        'type' => 'tag',
        'name' => 'WhitePoint',
        'title' => 'White Point',
        'components' => 2,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      319 =>
      array (
        'type' => 'tag',
        'name' => 'PrimaryChromaticities',
        'title' => 'Primary Chromaticities',
        'components' => 6,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      338 =>
      array (
        'type' => 'tag',
        'name' => 'ExtraSamples',
        'title' => 'Extra Samples',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
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
      ),
      339 =>
      array (
        'type' => 'tag',
        'name' => 'SampleFormat',
        'title' => 'Sample Format',
        'components' => 4,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      342 =>
      array (
        'type' => 'tag',
        'name' => 'TransferRange',
        'title' => 'Transfer Range',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      512 =>
      array (
        'type' => 'tag',
        'name' => 'JPEGProc',
        'title' => 'JPEG Proc',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'Baseline',
            14 => 'Lossless',
          ),
        ),
      ),
      513 =>
      array (
        'type' => 'tag',
        'name' => 'ThumbnailOffset',
        'title' => 'Thumbnail Offset',
        'components' => 1,
        'format' =>
        array (
          0 => 4,
        ),
      ),
      514 =>
      array (
        'type' => 'tag',
        'name' => 'ThumbnailLength',
        'title' => 'Thumbnail Length',
        'components' => 1,
        'format' =>
        array (
          0 => 4,
        ),
      ),
      529 =>
      array (
        'type' => 'tag',
        'name' => 'YCbCrCoefficients',
        'title' => 'YCbCr Coefficients',
        'components' => 3,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      530 =>
      array (
        'type' => 'tag',
        'name' => 'YCbCrSubSampling',
        'title' => 'YCbCr Sub-Sampling',
        'components' => 2,
        'format' =>
        array (
          0 => 3,
        ),
        'class' => 'ExifEye\\core\\Entry\\IfdYCbCrSubSampling',
      ),
      531 =>
      array (
        'type' => 'tag',
        'name' => 'YCbCrPositioning',
        'title' => 'YCbCr Positioning',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            1 => 'centered',
            2 => 'co-sited',
          ),
        ),
      ),
      532 =>
      array (
        'type' => 'tag',
        'name' => 'ReferenceBlackWhite',
        'title' => 'Reference Black/White',
        'components' => 6,
        'format' =>
        array (
          0 => 5,
        ),
      ),
      700 =>
      array (
        'type' => 'tag',
        'name' => 'ApplicationNotes',
        'title' => 'Application Notes',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\IfdApplicationNotes',
      ),
      18246 =>
      array (
        'type' => 'tag',
        'name' => 'Rating',
        'title' => 'Star Rating',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      18249 =>
      array (
        'type' => 'tag',
        'name' => 'RatingPercent',
        'title' => 'Percent Rating',
        'components' => 1,
        'format' =>
        array (
          0 => 3,
        ),
      ),
      33423 =>
      array (
        'type' => 'tag',
        'name' => 'BatteryLevel',
        'title' => 'Battery Level',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      33432 =>
      array (
        'type' => 'tag',
        'name' => 'Copyright',
        'title' => 'Copyright',
        'format' =>
        array (
          0 => 2,
        ),
        'class' => 'ExifEye\\core\\Entry\\IfdCopyright',
      ),
      33723 =>
      array (
        'type' => 'tag',
        'name' => 'IPTC-NAA',
        'title' => 'IPTC-NAA',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      34665 =>
      array (
        'type' => 'ifdExif',
        'class' => 'ExifEye\\core\\Block\\Ifd',
        'name' => 'Exif',
        'title' => 'Exif IFD',
      ),
      34853 =>
      array (
        'type' => 'ifdGps',
        'class' => 'ExifEye\\core\\Block\\Ifd',
        'name' => 'GPS',
        'title' => 'GPS Info IFD',
      ),
      40091 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPTitle',
        'title' => 'Windows XP Title',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40092 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPComment',
        'title' => 'Windows XP Comment',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40093 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPAuthor',
        'title' => 'Windows XP Author',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40094 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPKeywords',
        'title' => 'Windows XP Keywords',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      40095 =>
      array (
        'type' => 'tag',
        'name' => 'WindowsXPSubject',
        'title' => 'Windows XP Subject',
        'format' =>
        array (
          0 => 1,
        ),
        'class' => 'ExifEye\\core\\Entry\\WindowsString',
      ),
      50341 =>
      array (
        'type' => 'tag',
        'name' => 'PrintIM',
        'title' => 'Print IM',
        'format' =>
        array (
          0 => 7,
        ),
      ),
    ),
    'ifdMakerNotesCanonFileInformation' =>
    array (
      1 =>
      array (
        'type' => 'tag',
        'name' => 'FileNumber',
        'title' => 'File Number',
        'format' =>
        array (
          0 => 4,
        ),
      ),
      2 =>
      array (
        'type' => 'tag',
        'name' => 2,
        'title' => '0x0002',
        'format' =>
        array (
          0 => 8,
        ),
        'skip' => true,
      ),
      3 =>
      array (
        'type' => 'tag',
        'name' => 'BracketMode',
        'title' => 'Bracket Mode',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'AEB',
            2 => 'FEB',
            3 => 'ISO',
            4 => 'WB',
          ),
        ),
      ),
      4 =>
      array (
        'type' => 'tag',
        'name' => 'BracketValue',
        'title' => 'Bracket Value',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      5 =>
      array (
        'type' => 'tag',
        'name' => 'BracketShotNumber',
        'title' => 'Bracket Shot Number',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      6 =>
      array (
        'type' => 'tag',
        'name' => 'RawJpgQuality',
        'title' => 'Raw Jpg Quality',
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
            130 => 'Normal Movie',
            131 => 'Movie (2)',
          ),
        ),
      ),
      7 =>
      array (
        'type' => 'tag',
        'name' => 'RawJpgSize',
        'title' => 'Raw Jpg Size',
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
      ),
      8 =>
      array (
        'type' => 'tag',
        'name' => 'LongExposureNoiseReduction2',
        'title' => 'Long Exposure Noise Reduction',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On (1D)',
            3 => 'On',
            4 => 'Auto',
          ),
        ),
      ),
      9 =>
      array (
        'type' => 'tag',
        'name' => 'WBBracketMode',
        'title' => 'WB Bracket Mode',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On (shift AB)',
            2 => 'On (shift GM)',
          ),
        ),
      ),
      12 =>
      array (
        'type' => 'tag',
        'name' => 'WBBracketValueAB',
        'title' => 'WB Bracket Value AB',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      13 =>
      array (
        'type' => 'tag',
        'name' => 'WBBracketValueGM',
        'title' => 'WB Bracket Value GM',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      14 =>
      array (
        'type' => 'tag',
        'name' => 'FilterEffect',
        'title' => 'Filter Effect',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'None',
            1 => 'Yellow',
            2 => 'Orange',
            3 => 'Red',
            4 => 'Green',
          ),
        ),
      ),
      15 =>
      array (
        'type' => 'tag',
        'name' => 'ToningEffect',
        'title' => 'Toning Effect',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'None',
            1 => 'Sepia',
            2 => 'Blue',
            3 => 'Purple',
            4 => 'Green',
          ),
        ),
      ),
      16 =>
      array (
        'type' => 'tag',
        'name' => 'MacroMagnification',
        'title' => 'Macro Magnification',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      19 =>
      array (
        'type' => 'tag',
        'name' => 'LiveViewShooting',
        'title' => 'Live View Shooting',
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
          ),
        ),
      ),
      20 =>
      array (
        'type' => 'tag',
        'name' => 'FocusDistanceUpper',
        'title' => 'Focus Distance Upper',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      21 =>
      array (
        'type' => 'tag',
        'name' => 'FocusDistanceLower',
        'title' => 'Focus Distance Lower',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      25 =>
      array (
        'type' => 'tag',
        'name' => 'FlashExposureLock',
        'title' => 'Flash Exposure Lock',
        'format' =>
        array (
          0 => 3,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Off',
            1 => 'On',
          ),
        ),
      ),
    ),
    'tiff' =>
    array (
      0 =>
      array (
        'type' => 'ifd0',
        'name' => 'IFD0',
      ),
      1 =>
      array (
        'type' => 'ifd1',
        'name' => 'IFD1',
      ),
    ),
    'jpeg' =>
    array (
      192 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF0',
        'title' => 'Start of frame (baseline DCT)',
        'payload' => 'variable',
      ),
      193 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF1',
        'title' => 'Start of frame (extended sequential)',
        'payload' => 'variable',
      ),
      194 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF2',
        'title' => 'Start of frame (progressive DCT)',
        'payload' => 'variable',
      ),
      195 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF3',
        'title' => 'Encoding (lossless)',
        'payload' => 'variable',
      ),
      196 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'DHT',
        'title' => 'Define Huffman table',
        'payload' => 'variable',
      ),
      197 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF5',
        'title' => 'Start of frame (differential sequential)',
        'payload' => 'variable',
      ),
      198 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF6',
        'title' => 'Start of frame (differential progressive)',
        'payload' => 'variable',
      ),
      199 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF7',
        'title' => 'Start of frame (differential lossless)',
        'payload' => 'variable',
      ),
      200 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG',
        'title' => 'Extension',
        'payload' => 'variable',
      ),
      201 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF9',
        'title' => 'Start of frame (extended sequential, arithmetic)',
        'payload' => 'variable',
      ),
      202 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF10',
        'title' => 'Encoding (progressive, arithmetic)',
        'payload' => 'variable',
      ),
      203 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF11',
        'title' => 'Encoding (lossless, arithmetic)',
        'payload' => 'variable',
      ),
      204 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'DAC',
        'title' => 'Define arithmetic coding conditioning',
        'payload' => 'variable',
      ),
      205 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF13',
        'title' => 'Encoding (differential sequential, arithmetic)',
        'payload' => 'variable',
      ),
      206 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF14',
        'title' => 'Encoding (differential progressive, arithmetic)',
        'payload' => 'variable',
      ),
      207 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOF15',
        'title' => 'Encoding (differential lossless, arithmetic)',
        'payload' => 'variable',
      ),
      208 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST0',
        'title' => 'Restart 0',
        'payload' => 'none',
      ),
      209 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST1',
        'title' => 'Restart 1',
        'payload' => 'none',
      ),
      210 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST2',
        'title' => 'Restart 2',
        'payload' => 'none',
      ),
      211 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST3',
        'title' => 'Restart 3',
        'payload' => 'none',
      ),
      212 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST4',
        'title' => 'Restart 4',
        'payload' => 'none',
      ),
      213 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST5',
        'title' => 'Restart 5',
        'payload' => 'none',
      ),
      214 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST6',
        'title' => 'Restart 6',
        'payload' => 'none',
      ),
      215 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'RST7',
        'title' => 'Restart 7',
        'payload' => 'none',
      ),
      216 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'SOI',
        'title' => 'Start of image',
        'payload' => 'none',
      ),
      217 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'EOI',
        'title' => 'End of image',
        'payload' => 'none',
      ),
      218 =>
      array (
        'type' => 'jpegSegment',
        'class' => 'ExifEye\\core\\Block\\JpegSegmentSos',
        'name' => 'SOS',
        'title' => 'Start of scan',
        'payload' => 'scan',
      ),
      219 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'DQT',
        'title' => 'Define quantization table',
        'payload' => 'variable',
      ),
      220 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'DNL',
        'title' => 'Define number of lines',
        'payload' => 'variable',
      ),
      221 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'DRI',
        'title' => 'Define restart interval',
        'payload' => 'fixed',
        'components' => 4,
      ),
      222 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'DHP',
        'title' => 'Define hierarchical progression',
        'payload' => 'variable',
      ),
      223 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'EXP',
        'title' => 'Expand reference component',
        'payload' => 'variable',
      ),
      224 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP0',
        'title' => 'Application segment 0',
        'payload' => 'variable',
      ),
      225 =>
      array (
        'type' => 'jpegSegment',
        'class' => 'ExifEye\\core\\Block\\JpegSegmentApp1',
        'name' => 'APP1',
        'title' => 'Application segment 1',
        'payload' => 'variable',
      ),
      226 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP2',
        'title' => 'Application segment 2',
        'payload' => 'variable',
      ),
      227 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP3',
        'title' => 'Application segment 3',
        'payload' => 'variable',
      ),
      228 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP4',
        'title' => 'Application segment 4',
        'payload' => 'variable',
      ),
      229 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP5',
        'title' => 'Application segment 5',
        'payload' => 'variable',
      ),
      230 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP6',
        'title' => 'Application segment 6',
        'payload' => 'variable',
      ),
      231 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP7',
        'title' => 'Application segment 7',
        'payload' => 'variable',
      ),
      232 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP8',
        'title' => 'Application segment 8',
        'payload' => 'variable',
      ),
      233 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP9',
        'title' => 'Application segment 9',
        'payload' => 'variable',
      ),
      234 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP10',
        'title' => 'Application segment 10',
        'payload' => 'variable',
      ),
      235 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP11',
        'title' => 'Application segment 11',
        'payload' => 'variable',
      ),
      236 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP12',
        'title' => 'Application segment 12',
        'payload' => 'variable',
      ),
      237 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP13',
        'title' => 'Application segment 13',
        'payload' => 'variable',
      ),
      238 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP14',
        'title' => 'Application segment 14',
        'payload' => 'variable',
      ),
      239 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'APP15',
        'title' => 'Application segment 5',
        'payload' => 'variable',
      ),
      240 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG0',
        'title' => 'Extension 0',
        'payload' => 'variable',
      ),
      241 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG1',
        'title' => 'Extension 1',
        'payload' => 'variable',
      ),
      242 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG2',
        'title' => 'Extension 2',
        'payload' => 'variable',
      ),
      243 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG3',
        'title' => 'Extension 3',
        'payload' => 'variable',
      ),
      244 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG4',
        'title' => 'Extension 4',
        'payload' => 'variable',
      ),
      245 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG5',
        'title' => 'Extension 5',
        'payload' => 'variable',
      ),
      246 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG6',
        'title' => 'Extension 6',
        'payload' => 'variable',
      ),
      247 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG7',
        'title' => 'Extension 7',
        'payload' => 'variable',
      ),
      248 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG8',
        'title' => 'Extension 8',
        'payload' => 'variable',
      ),
      249 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG9',
        'title' => 'Extension 9',
        'payload' => 'variable',
      ),
      250 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG10',
        'title' => 'Extension 10',
        'payload' => 'variable',
      ),
      251 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG11',
        'title' => 'Extension 11',
        'payload' => 'variable',
      ),
      252 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG12',
        'title' => 'Extension 12',
        'payload' => 'variable',
      ),
      253 =>
      array (
        'type' => 'jpegSegment',
        'name' => 'JPG13',
        'title' => 'Extension 13',
        'payload' => 'variable',
      ),
      254 =>
      array (
        'type' => 'jpegSegment',
        'class' => 'ExifEye\\core\\Block\\JpegSegmentCom',
        'name' => 'COM',
        'title' => 'Comment',
        'payload' => 'variable',
      ),
    ),
    'exif' =>
    array (
      0 =>
      array (
        'type' => 'tiff',
      ),
    ),
    'ifdMakerNotesCanonShotInformation' =>
    array (
      1 =>
      array (
        'type' => 'tag',
        'name' => 'AutoISO',
        'title' => 'Auto ISO Speed Used',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      2 =>
      array (
        'type' => 'tag',
        'name' => 'BaseISO',
        'title' => 'Base ISO Speed Used',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      3 =>
      array (
        'type' => 'tag',
        'name' => 'MeasuredEV',
        'title' => 'Measured EV',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      4 =>
      array (
        'type' => 'tag',
        'name' => 'TargetAperture',
        'title' => 'Target Aperture',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      5 =>
      array (
        'type' => 'tag',
        'name' => 'TargetShutterSpeed',
        'title' => 'Target Shutter Speed',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      6 =>
      array (
        'type' => 'tag',
        'name' => 'ExposureCompensation',
        'title' => 'Exposure Compensation',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      7 =>
      array (
        'type' => 'tag',
        'name' => 'WhiteBalanceSetting',
        'title' => 'White Balance Setting',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'Auto',
            1 => 'Daylight',
            2 => 'Cloudy',
            3 => 'Tungsten',
            4 => 'Fluorescent',
            5 => 'Flash',
            6 => 'Custom',
            7 => 'Black & White',
            8 => 'Shade',
            9 => 'Manual Temperature (Kelvin)',
            10 => 'PC Set1',
            11 => 'PC Set2',
            12 => 'PC Set3',
            14 => 'Daylight Fluorescent',
            15 => 'Custom 1',
            16 => 'Custom 2',
            17 => 'Underwater',
            18 => 'Custom 3',
            19 => 'Custom 4',
            20 => 'PC Set4',
            21 => 'PC Set5',
            23 => 'Auto (ambience priority)',
          ),
        ),
      ),
      8 =>
      array (
        'type' => 'tag',
        'name' => 'SlowShutter',
        'title' => 'Slow Shutter',
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
            1 => 'Night Scene',
            2 => 'On',
            3 => 'None',
          ),
        ),
      ),
      9 =>
      array (
        'type' => 'tag',
        'name' => 'SequenceNumber',
        'title' => 'Sequence Number',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      10 =>
      array (
        'type' => 'tag',
        'name' => 'OpticalZoomCode',
        'title' => 'Optical Zoom Code',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      12 =>
      array (
        'type' => 'tag',
        'name' => 'CameraTemperature',
        'title' => 'Camera Temperature',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      13 =>
      array (
        'type' => 'tag',
        'name' => 'FlashGuideNumber',
        'title' => 'Flash Guide Number',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      14 =>
      array (
        'type' => 'tag',
        'name' => 'AFPointsInFocus',
        'title' => 'Auto Focus Points In Focus',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            12288 => 'None (MF)',
            12289 => 'Right',
            12290 => 'Center',
            12291 => 'Center+Right',
            12292 => 'Left',
            12293 => 'Left+Right',
            12294 => 'Left+Center',
            12295 => 'All',
          ),
        ),
      ),
      15 =>
      array (
        'type' => 'tag',
        'name' => 'FlashExposureComp',
        'title' => 'Flash Exposure Compensation',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      16 =>
      array (
        'type' => 'tag',
        'name' => 'AutoExposureBracketing',
        'title' => 'Auto Exposure Bracketing',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'On',
            0 => 'Off',
            1 => 'On (shot 1)',
            2 => 'On (shot 2)',
            3 => 'On (shot 3)',
          ),
        ),
      ),
      17 =>
      array (
        'type' => 'tag',
        'name' => 'AEBBracketValue',
        'title' => 'AEB Bracket Value',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      18 =>
      array (
        'type' => 'tag',
        'name' => 'ControlMode',
        'title' => 'Control Mode',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'n/a',
            1 => 'Camera Local Control',
            3 => 'Computer Remote Control',
          ),
        ),
      ),
      19 =>
      array (
        'type' => 'tag',
        'name' => 'FocusDistanceUpper',
        'title' => 'Focus Distance Upper',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      20 =>
      array (
        'type' => 'tag',
        'name' => 'FocusDistanceLower',
        'title' => 'Focus Distance Lower',
        'format' =>
        array (
          0 => 3,
        ),
      ),
      21 =>
      array (
        'type' => 'tag',
        'name' => 'FNumber',
        'title' => 'FNumber',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      22 =>
      array (
        'type' => 'tag',
        'name' => 'ExposureTime',
        'title' => 'Exposure Time',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      23 =>
      array (
        'type' => 'tag',
        'name' => 'MeasuredEV2',
        'title' => 'Measured Exposure Value',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      24 =>
      array (
        'type' => 'tag',
        'name' => 'BulbDuration',
        'title' => 'Bulb Duration',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      26 =>
      array (
        'type' => 'tag',
        'name' => 'CameraType',
        'title' => 'Camera Type',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            0 => 'n/a',
            248 => 'EOS High-end',
            250 => 'Compact',
            252 => 'EOS Mid-range',
            255 => 'DV Camera',
          ),
        ),
      ),
      27 =>
      array (
        'type' => 'tag',
        'name' => 'AutoRotate',
        'title' => 'Auto Rotate',
        'format' =>
        array (
          0 => 8,
        ),
        'text' =>
        array (
          'mapping' =>
          array (
            -1 => 'n/a',
            0 => 'None',
            1 => 'Rotate 90 CW',
            2 => 'Rotate 180',
            3 => 'Rotate 270 CW',
          ),
        ),
      ),
      28 =>
      array (
        'type' => 'tag',
        'name' => 'NDFilter',
        'title' => 'ND Filter',
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
            1 => 'On',
          ),
        ),
      ),
      29 =>
      array (
        'type' => 'tag',
        'name' => 'SelfTimer2',
        'title' => 'Self Timer',
        'format' =>
        array (
          0 => 8,
        ),
      ),
      33 =>
      array (
        'type' => 'tag',
        'name' => 'FlashOutput',
        'title' => 'Flash Output',
        'format' =>
        array (
          0 => 8,
        ),
      ),
    ),
    'format' =>
    array (
      1 =>
      array (
        'name' => 'Byte',
        'title' => 'Byte',
        'length' => 1,
        'class' => 'ExifEye\\core\\Entry\\Core\\Byte',
      ),
      2 =>
      array (
        'name' => 'Ascii',
        'title' => 'Ascii',
        'length' => 1,
        'class' => 'ExifEye\\core\\Entry\\Core\\Ascii',
      ),
      3 =>
      array (
        'name' => 'Short',
        'title' => 'Short',
        'length' => 2,
        'class' => 'ExifEye\\core\\Entry\\Core\\Short',
      ),
      4 =>
      array (
        'name' => 'Long',
        'title' => 'Long',
        'length' => 4,
        'class' => 'ExifEye\\core\\Entry\\Core\\Long',
      ),
      5 =>
      array (
        'name' => 'Rational',
        'title' => 'Rational',
        'length' => 8,
        'class' => 'ExifEye\\core\\Entry\\Core\\Rational',
      ),
      6 =>
      array (
        'name' => 'SignedByte',
        'title' => 'SignedByte',
        'length' => 1,
        'class' => 'ExifEye\\core\\Entry\\Core\\SignedByte',
      ),
      7 =>
      array (
        'name' => 'Undefined',
        'title' => 'Undefined',
        'length' => 1,
        'class' => 'ExifEye\\core\\Entry\\Core\\Undefined',
      ),
      8 =>
      array (
        'name' => 'SignedShort',
        'title' => 'SignedShort',
        'length' => 2,
        'class' => 'ExifEye\\core\\Entry\\Core\\SignedShort',
      ),
      9 =>
      array (
        'name' => 'SignedLong',
        'title' => 'SignedLong',
        'length' => 4,
        'class' => 'ExifEye\\core\\Entry\\Core\\SignedLong',
      ),
      10 =>
      array (
        'name' => 'SignedRational',
        'title' => 'SignedRational',
        'length' => 8,
        'class' => 'ExifEye\\core\\Entry\\Core\\SignedRational',
      ),
      11 =>
      array (
        'name' => 'Float',
        'title' => 'Float',
        'length' => 4,
      ),
      12 =>
      array (
        'name' => 'Double',
        'title' => 'Double',
        'length' => 8,
      ),
    ),
  ),
  'elementsByName' =>
  array (
    'ifdMakerNotesCanonPanoramaInformation' =>
    array (
      'PanoramaFrame' => 2,
      'PanoramaDirection' => 5,
    ),
    'ifd1' =>
    array (
      'ImageWidth' => 256,
      'ImageLength' => 257,
      'BitsPerSample' => 258,
      'Compression' => 259,
      'PhotometricInterpretation' => 262,
      'FillOrder' => 266,
      'DocumentName' => 269,
      'ImageDescription' => 270,
      'Make' => 271,
      'Model' => 272,
      'StripOffsets' => 273,
      'Orientation' => 274,
      'SamplesPerPixel' => 277,
      'RowsPerStrip' => 278,
      'StripByteCounts' => 279,
      'XResolution' => 282,
      'YResolution' => 283,
      'PlanarConfiguration' => 284,
      'ResolutionUnit' => 296,
      'TransferFunction' => 301,
      'Software' => 305,
      'DateTime' => 306,
      'Artist' => 315,
      'Predictor' => 317,
      'WhitePoint' => 318,
      'PrimaryChromaticities' => 319,
      'ExtraSamples' => 338,
      'SampleFormat' => 339,
      'TransferRange' => 342,
      'JPEGProc' => 512,
      'ThumbnailOffset' => 513,
      'ThumbnailLength' => 514,
      'YCbCrCoefficients' => 529,
      'YCbCrSubSampling' => 530,
      'YCbCrPositioning' => 531,
      'ReferenceBlackWhite' => 532,
      'ApplicationNotes' => 700,
      'Rating' => 18246,
      'RatingPercent' => 18249,
      'BatteryLevel' => 33423,
      'Copyright' => 33432,
      'IPTC-NAA' => 33723,
      'Exif' => 34665,
      'GPS' => 34853,
      'WindowsXPTitle' => 40091,
      'WindowsXPComment' => 40092,
      'WindowsXPAuthor' => 40093,
      'WindowsXPKeywords' => 40094,
      'WindowsXPSubject' => 40095,
      'PrintIM' => 50341,
    ),
    'ifdGps' =>
    array (
      'GPSVersionID' => 0,
      'GPSLatitudeRef' => 1,
      'GPSLatitude' => 2,
      'GPSLongitudeRef' => 3,
      'GPSLongitude' => 4,
      'GPSAltitudeRef' => 5,
      'GPSAltitude' => 6,
      'GPSTimeStamp' => 7,
      'GPSSatellites' => 8,
      'GPSStatus' => 9,
      'GPSMeasureMode' => 10,
      'GPSDOP' => 11,
      'GPSSpeedRef' => 12,
      'GPSSpeed' => 13,
      'GPSTrackRef' => 14,
      'GPSTrack' => 15,
      'GPSImgDirectionRef' => 16,
      'GPSImgDirection' => 17,
      'GPSMapDatum' => 18,
      'GPSDestLatitudeRef' => 19,
      'GPSDestLatitude' => 20,
      'GPSDestLongitudeRef' => 21,
      'GPSDestLongitude' => 22,
      'GPSDestBearingRef' => 23,
      'GPSDestBearing' => 24,
      'GPSDestDistanceRef' => 25,
      'GPSDestDistance' => 26,
      'GPSProcessingMethod' => 27,
      'GPSAreaInformation' => 28,
      'GPSDateStamp' => 29,
      'GPSDifferential' => 30,
      'GPSHPositioningError' => 31,
    ),
    'ifdMakerNotesCanon' =>
    array (
      'CanonCameraSettings' => 1,
      'FocalLength' => 2,
      'CanonShotInformation' => 4,
      'CanonPanorama' => 5,
      'ImageType' => 6,
      'FirmwareVersion' => 7,
      'FileNumber' => 8,
      'OwnerName' => 9,
      'SerialNumber' => 12,
      'CameraInfo' => 13,
      'CustomFunctions' => 153,
      'ModelID' => 16,
      'PictureInfo' => 18,
      'ThumbnailImageValidArea' => 19,
      'Serial Number Format' => 21,
      'SuperMacro' => 26,
      'FirmwareRevision' => 30,
      'AFinfo' => 38,
      'OriginalDecision Data Offset' => 131,
      'CanonFileInformation' => 147,
      'LensModel' => 149,
      'InternalSerialNumber' => 150,
      'DustRemovalData' => 151,
      'ProcessingInfo' => 160,
      'WhiteBalanceTable' => 164,
      'MeasuredColor' => 170,
      'ColorSpace' => 180,
      'VRDOffset' => 208,
      'SensorInfo' => 224,
      'ColorData' => 16385,
    ),
    'ifdExif' =>
    array (
      'CFAPattern' => 41730,
      'ExposureTime' => 33434,
      'FNumber' => 33437,
      'ExposureProgram' => 34850,
      'SpectralSensitivity' => 34852,
      'ISOSpeedRatings' => 34855,
      'OECF' => 34856,
      'SensitivityType' => 34864,
      'RecommendedExposureIndex' => 34866,
      'ExifVersion' => 36864,
      'DateTimeOriginal' => 36867,
      'DateTimeDigitized' => 36868,
      'OffsetTime' => 36880,
      'OffsetTimeOriginal' => 36881,
      'OffsetTimeDigitized' => 36882,
      'ComponentsConfiguration' => 37121,
      'CompressedBitsPerPixel' => 37122,
      'ShutterSpeedValue' => 37377,
      'ApertureValue' => 37378,
      'BrightnessValue' => 37379,
      'ExposureBiasValue' => 37380,
      'MaxApertureValue' => 37381,
      'SubjectDistance' => 37382,
      'MeteringMode' => 37383,
      'LightSource' => 37384,
      'Flash' => 37385,
      'FocalLength' => 37386,
      'SubjectArea' => 37396,
      'MakerNote' => 37500,
      'UserComment' => 37510,
      'SubSecTime' => 37520,
      'SubSecTimeOriginal' => 37521,
      'SubSecTimeDigitized' => 37522,
      'FlashPixVersion' => 40960,
      'ColorSpace' => 40961,
      'PixelXDimension' => 40962,
      'PixelYDimension' => 40963,
      'RelatedSoundFile' => 40964,
      'Interoperability' => 40965,
      'FlashEnergy' => 41483,
      'SpatialFrequencyResponse' => 41484,
      'FocalPlaneXResolution' => 41486,
      'FocalPlaneYResolution' => 41487,
      'FocalPlaneResolutionUnit' => 41488,
      'SubjectLocation' => 41492,
      'ExposureIndex' => 41493,
      'SensingMethod' => 41495,
      'FileSource' => 41728,
      'SceneType' => 41729,
      'CustomRendered' => 41985,
      'ExposureMode' => 41986,
      'WhiteBalance' => 41987,
      'DigitalZoomRatio' => 41988,
      'FocalLengthIn35mmFilm' => 41989,
      'SceneCaptureType' => 41990,
      'GainControl' => 41991,
      'Contrast' => 41992,
      'Saturation' => 41993,
      'Sharpness' => 41994,
      'DeviceSettingDescription' => 41995,
      'SubjectDistanceRange' => 41996,
      'ImageUniqueID' => 42016,
      'OwnerName' => 42032,
      'SerialNumber' => 42033,
      'LensInfo' => 42034,
      'LensMake' => 42035,
      'LensModel' => 42036,
      'LensSerialNumber' => 42037,
      'Gamma' => 42240,
    ),
    'ifdMakerNotesApple' =>
    array (
      'AppleRunTime' => 3,
      'AccelerationVector' => 8,
      'HDRImageType' => 10,
      'BurstUUID' => 11,
      'ContentIdentifier' => 17,
      'ImageUniqueID' => 21,
    ),
    'ifdMakerNotesAppleRuntime' =>
    array (
      'flags' => 1,
      'value' => 2,
      'timescale' => 3,
      'epoch' => 4,
    ),
    'ifdMakerNotesCanonCameraSettings' =>
    array (
      'MacroMode' => 1,
      'SelfTimer' => 2,
      'Quality' => 3,
      'CanonFlashMode' => 4,
      'ContinuousDrive' => 5,
      'FocusMode' => 7,
      'RecordMode' => 9,
      'CanonImageSize' => 10,
      'EasyMode' => 11,
      'DigitalZoom' => 12,
      'Contrast' => 13,
      'Saturation' => 14,
      'Sharpness' => 15,
      'CameraISO' => 16,
      'MeteringMode' => 17,
      'FocusRange' => 18,
      'AFPoint' => 19,
      'CanonExposureMode' => 20,
      'LensType' => 22,
      'MaxFocalLength' => 23,
      'MinFocalLength' => 24,
      'FocalUnits' => 25,
      'MaxAperture' => 26,
      'MinAperture' => 27,
      'FlashActivity' => 28,
      'FlashDetails' => 29,
      'FocusContinuous' => 32,
      'AESetting' => 33,
      'ImageStabilization' => 34,
      'DisplayAperture' => 35,
      'ZoomSourceWidth' => 36,
      'ZoomTargetWidth' => 37,
      'SpotMeteringMode' => 39,
      'PhotoEffect' => 40,
      'ManualFlashOutput' => 41,
      'ColorTone' => 42,
      'SRAWQuality' => 46,
    ),
    'ifdMakerNotesCanonPictureInformation' =>
    array (
      'ImageWidth' => 2,
      'ImageHeight' => 3,
      'ImageWidthAsShot' => 4,
      'ImageHeightAsShot' => 5,
      'AFPointsUsed' => 22,
      'AFPointsUsed20D' => 26,
    ),
    'ifdInteroperability' =>
    array (
      'InteroperabilityIndex' => 1,
      'InteroperabilityVersion' => 2,
      'RelatedImageFileFormat' => 4096,
      'RelatedImageWidth' => 4097,
      'RelatedImageLength' => 4098,
    ),
    'ifd0' =>
    array (
      'ImageWidth' => 256,
      'ImageLength' => 257,
      'BitsPerSample' => 258,
      'Compression' => 259,
      'PhotometricInterpretation' => 262,
      'FillOrder' => 266,
      'DocumentName' => 269,
      'ImageDescription' => 270,
      'Make' => 271,
      'Model' => 272,
      'StripOffsets' => 273,
      'Orientation' => 274,
      'SamplesPerPixel' => 277,
      'RowsPerStrip' => 278,
      'StripByteCounts' => 279,
      'XResolution' => 282,
      'YResolution' => 283,
      'PlanarConfiguration' => 284,
      'ResolutionUnit' => 296,
      'TransferFunction' => 301,
      'Software' => 305,
      'DateTime' => 306,
      'Artist' => 315,
      'Predictor' => 317,
      'WhitePoint' => 318,
      'PrimaryChromaticities' => 319,
      'ExtraSamples' => 338,
      'SampleFormat' => 339,
      'TransferRange' => 342,
      'JPEGProc' => 512,
      'ThumbnailOffset' => 513,
      'ThumbnailLength' => 514,
      'YCbCrCoefficients' => 529,
      'YCbCrSubSampling' => 530,
      'YCbCrPositioning' => 531,
      'ReferenceBlackWhite' => 532,
      'ApplicationNotes' => 700,
      'Rating' => 18246,
      'RatingPercent' => 18249,
      'BatteryLevel' => 33423,
      'Copyright' => 33432,
      'IPTC-NAA' => 33723,
      'Exif' => 34665,
      'GPS' => 34853,
      'WindowsXPTitle' => 40091,
      'WindowsXPComment' => 40092,
      'WindowsXPAuthor' => 40093,
      'WindowsXPKeywords' => 40094,
      'WindowsXPSubject' => 40095,
      'PrintIM' => 50341,
    ),
    'ifdMakerNotesCanonFileInformation' =>
    array (
      'FileNumber' => 1,
      2 => 2,
      'BracketMode' => 3,
      'BracketValue' => 4,
      'BracketShotNumber' => 5,
      'RawJpgQuality' => 6,
      'RawJpgSize' => 7,
      'LongExposureNoiseReduction2' => 8,
      'WBBracketMode' => 9,
      'WBBracketValueAB' => 12,
      'WBBracketValueGM' => 13,
      'FilterEffect' => 14,
      'ToningEffect' => 15,
      'MacroMagnification' => 16,
      'LiveViewShooting' => 19,
      'FocusDistanceUpper' => 20,
      'FocusDistanceLower' => 21,
      'FlashExposureLock' => 25,
    ),
    'tiff' =>
    array (
      'IFD0' => 0,
      'IFD1' => 1,
    ),
    'jpeg' =>
    array (
      'SOF0' => 192,
      'SOF1' => 193,
      'SOF2' => 194,
      'SOF3' => 195,
      'DHT' => 196,
      'SOF5' => 197,
      'SOF6' => 198,
      'SOF7' => 199,
      'JPG' => 200,
      'SOF9' => 201,
      'SOF10' => 202,
      'SOF11' => 203,
      'DAC' => 204,
      'SOF13' => 205,
      'SOF14' => 206,
      'SOF15' => 207,
      'RST0' => 208,
      'RST1' => 209,
      'RST2' => 210,
      'RST3' => 211,
      'RST4' => 212,
      'RST5' => 213,
      'RST6' => 214,
      'RST7' => 215,
      'SOI' => 216,
      'EOI' => 217,
      'SOS' => 218,
      'DQT' => 219,
      'DNL' => 220,
      'DRI' => 221,
      'DHP' => 222,
      'EXP' => 223,
      'APP0' => 224,
      'APP1' => 225,
      'APP2' => 226,
      'APP3' => 227,
      'APP4' => 228,
      'APP5' => 229,
      'APP6' => 230,
      'APP7' => 231,
      'APP8' => 232,
      'APP9' => 233,
      'APP10' => 234,
      'APP11' => 235,
      'APP12' => 236,
      'APP13' => 237,
      'APP14' => 238,
      'APP15' => 239,
      'JPG0' => 240,
      'JPG1' => 241,
      'JPG2' => 242,
      'JPG3' => 243,
      'JPG4' => 244,
      'JPG5' => 245,
      'JPG6' => 246,
      'JPG7' => 247,
      'JPG8' => 248,
      'JPG9' => 249,
      'JPG10' => 250,
      'JPG11' => 251,
      'JPG12' => 252,
      'JPG13' => 253,
      'COM' => 254,
    ),
    'ifdMakerNotesCanonShotInformation' =>
    array (
      'AutoISO' => 1,
      'BaseISO' => 2,
      'MeasuredEV' => 3,
      'TargetAperture' => 4,
      'TargetShutterSpeed' => 5,
      'ExposureCompensation' => 6,
      'WhiteBalanceSetting' => 7,
      'SlowShutter' => 8,
      'SequenceNumber' => 9,
      'OpticalZoomCode' => 10,
      'CameraTemperature' => 12,
      'FlashGuideNumber' => 13,
      'AFPointsInFocus' => 14,
      'FlashExposureComp' => 15,
      'AutoExposureBracketing' => 16,
      'AEBBracketValue' => 17,
      'ControlMode' => 18,
      'FocusDistanceUpper' => 19,
      'FocusDistanceLower' => 20,
      'FNumber' => 21,
      'ExposureTime' => 22,
      'MeasuredEV2' => 23,
      'BulbDuration' => 24,
      'CameraType' => 26,
      'AutoRotate' => 27,
      'NDFilter' => 28,
      'SelfTimer2' => 29,
      'FlashOutput' => 33,
    ),
    'format' =>
    array (
      'Byte' => 1,
      'Ascii' => 2,
      'Short' => 3,
      'Long' => 4,
      'Rational' => 5,
      'SignedByte' => 6,
      'Undefined' => 7,
      'SignedShort' => 8,
      'SignedLong' => 9,
      'SignedRational' => 10,
      'Float' => 11,
      'Double' => 12,
    ),
  ),
  'makerNotes' =>
  array (
    'Canon' => 'ifdMakerNotesCanon',
    'Apple' => 'ifdMakerNotesApple',
  ),
);