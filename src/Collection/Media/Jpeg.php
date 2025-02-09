<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\Media;

use FileEye\MediaProbe\Collection\CollectionBase;

class Jpeg extends CollectionBase {

  protected static $map = array (
  'mimeType' => 'image/jpeg',
  'DOMNode' => 'jpeg',
  'id' => 'Media\\Jpeg',
  'handler' => 'FileEye\\MediaProbe\\Block\\Media\\Jpeg',
  'itemsByName' =>
  array (
    'APP0' =>
    array (
      0 => 224,
    ),
    'APP1' =>
    array (
      0 => 225,
    ),
    'APP10' =>
    array (
      0 => 234,
    ),
    'APP11' =>
    array (
      0 => 235,
    ),
    'APP12' =>
    array (
      0 => 236,
    ),
    'APP13' =>
    array (
      0 => 237,
    ),
    'APP14' =>
    array (
      0 => 238,
    ),
    'APP15' =>
    array (
      0 => 239,
    ),
    'APP2' =>
    array (
      0 => 226,
    ),
    'APP3' =>
    array (
      0 => 227,
    ),
    'APP4' =>
    array (
      0 => 228,
    ),
    'APP5' =>
    array (
      0 => 229,
    ),
    'APP6' =>
    array (
      0 => 230,
    ),
    'APP7' =>
    array (
      0 => 231,
    ),
    'APP8' =>
    array (
      0 => 232,
    ),
    'APP9' =>
    array (
      0 => 233,
    ),
    'COM' =>
    array (
      0 => 254,
    ),
    'DAC' =>
    array (
      0 => 204,
    ),
    'DHP' =>
    array (
      0 => 222,
    ),
    'DHT' =>
    array (
      0 => 196,
    ),
    'DNL' =>
    array (
      0 => 220,
    ),
    'DQT' =>
    array (
      0 => 219,
    ),
    'DRI' =>
    array (
      0 => 221,
    ),
    'EOI' =>
    array (
      0 => 217,
    ),
    'EXP' =>
    array (
      0 => 223,
    ),
    'JPG' =>
    array (
      0 => 200,
    ),
    'JPG0' =>
    array (
      0 => 240,
    ),
    'JPG1' =>
    array (
      0 => 241,
    ),
    'JPG10' =>
    array (
      0 => 250,
    ),
    'JPG11' =>
    array (
      0 => 251,
    ),
    'JPG12' =>
    array (
      0 => 252,
    ),
    'JPG13' =>
    array (
      0 => 253,
    ),
    'JPG2' =>
    array (
      0 => 242,
    ),
    'JPG3' =>
    array (
      0 => 243,
    ),
    'JPG4' =>
    array (
      0 => 244,
    ),
    'JPG5' =>
    array (
      0 => 245,
    ),
    'JPG6' =>
    array (
      0 => 246,
    ),
    'JPG7' =>
    array (
      0 => 247,
    ),
    'JPG8' =>
    array (
      0 => 248,
    ),
    'JPG9' =>
    array (
      0 => 249,
    ),
    'RST0' =>
    array (
      0 => 208,
    ),
    'RST1' =>
    array (
      0 => 209,
    ),
    'RST2' =>
    array (
      0 => 210,
    ),
    'RST3' =>
    array (
      0 => 211,
    ),
    'RST4' =>
    array (
      0 => 212,
    ),
    'RST5' =>
    array (
      0 => 213,
    ),
    'RST6' =>
    array (
      0 => 214,
    ),
    'RST7' =>
    array (
      0 => 215,
    ),
    'SOF0' =>
    array (
      0 => 192,
    ),
    'SOF1' =>
    array (
      0 => 193,
    ),
    'SOF10' =>
    array (
      0 => 202,
    ),
    'SOF11' =>
    array (
      0 => 203,
    ),
    'SOF13' =>
    array (
      0 => 205,
    ),
    'SOF14' =>
    array (
      0 => 206,
    ),
    'SOF15' =>
    array (
      0 => 207,
    ),
    'SOF2' =>
    array (
      0 => 194,
    ),
    'SOF3' =>
    array (
      0 => 195,
    ),
    'SOF5' =>
    array (
      0 => 197,
    ),
    'SOF6' =>
    array (
      0 => 198,
    ),
    'SOF7' =>
    array (
      0 => 199,
    ),
    'SOF9' =>
    array (
      0 => 201,
    ),
    'SOI' =>
    array (
      0 => 216,
    ),
    'SOS' =>
    array (
      0 => 218,
    ),
  ),
  'items' =>
  array (
    192 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF0',
        'title' => 'Start of frame (baseline DCT)',
        'payload' => 'variable',
      ),
    ),
    193 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF1',
        'title' => 'Start of frame (extended sequential)',
        'payload' => 'variable',
      ),
    ),
    194 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF2',
        'title' => 'Start of frame (progressive DCT)',
        'payload' => 'variable',
      ),
    ),
    195 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF3',
        'title' => 'Encoding (lossless)',
        'payload' => 'variable',
      ),
    ),
    196 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'DHT',
        'title' => 'Define Huffman table',
        'payload' => 'variable',
      ),
    ),
    197 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF5',
        'title' => 'Start of frame (differential sequential)',
        'payload' => 'variable',
      ),
    ),
    198 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF6',
        'title' => 'Start of frame (differential progressive)',
        'payload' => 'variable',
      ),
    ),
    199 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF7',
        'title' => 'Start of frame (differential lossless)',
        'payload' => 'variable',
      ),
    ),
    200 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG',
        'title' => 'Extension',
        'payload' => 'variable',
      ),
    ),
    201 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF9',
        'title' => 'Start of frame (extended sequential, arithmetic)',
        'payload' => 'variable',
      ),
    ),
    202 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF10',
        'title' => 'Encoding (progressive, arithmetic)',
        'payload' => 'variable',
      ),
    ),
    203 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF11',
        'title' => 'Encoding (lossless, arithmetic)',
        'payload' => 'variable',
      ),
    ),
    204 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'DAC',
        'title' => 'Define arithmetic coding conditioning',
        'payload' => 'variable',
      ),
    ),
    205 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF13',
        'title' => 'Encoding (differential sequential, arithmetic)',
        'payload' => 'variable',
      ),
    ),
    206 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF14',
        'title' => 'Encoding (differential progressive, arithmetic)',
        'payload' => 'variable',
      ),
    ),
    207 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOF15',
        'title' => 'Encoding (differential lossless, arithmetic)',
        'payload' => 'variable',
      ),
    ),
    208 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST0',
        'title' => 'Restart 0',
        'payload' => 'none',
      ),
    ),
    209 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST1',
        'title' => 'Restart 1',
        'payload' => 'none',
      ),
    ),
    210 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST2',
        'title' => 'Restart 2',
        'payload' => 'none',
      ),
    ),
    211 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST3',
        'title' => 'Restart 3',
        'payload' => 'none',
      ),
    ),
    212 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST4',
        'title' => 'Restart 4',
        'payload' => 'none',
      ),
    ),
    213 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST5',
        'title' => 'Restart 5',
        'payload' => 'none',
      ),
    ),
    214 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST6',
        'title' => 'Restart 6',
        'payload' => 'none',
      ),
    ),
    215 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'RST7',
        'title' => 'Restart 7',
        'payload' => 'none',
      ),
    ),
    216 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'SOI',
        'title' => 'Start of image',
        'payload' => 'none',
      ),
    ),
    217 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'EOI',
        'title' => 'End of image',
        'payload' => 'none',
      ),
    ),
    218 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\SegmentSos',
        'name' => 'SOS',
        'title' => 'Start of scan',
        'payload' => 'scan',
      ),
    ),
    219 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'DQT',
        'title' => 'Define quantization table',
        'payload' => 'variable',
      ),
    ),
    220 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'DNL',
        'title' => 'Define number of lines',
        'payload' => 'variable',
      ),
    ),
    221 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'DRI',
        'title' => 'Define restart interval',
        'payload' => 'fixed',
        'components' => 4,
      ),
    ),
    222 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'DHP',
        'title' => 'Define hierarchical progression',
        'payload' => 'variable',
      ),
    ),
    223 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'EXP',
        'title' => 'Expand reference component',
        'payload' => 'variable',
      ),
    ),
    224 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP0',
        'title' => 'Application segment 0',
        'payload' => 'variable',
      ),
    ),
    225 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\SegmentApp1',
        'name' => 'APP1',
      ),
    ),
    226 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP2',
        'title' => 'Application segment 2',
        'payload' => 'variable',
      ),
    ),
    227 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP3',
        'title' => 'Application segment 3',
        'payload' => 'variable',
      ),
    ),
    228 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP4',
        'title' => 'Application segment 4',
        'payload' => 'variable',
      ),
    ),
    229 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP5',
        'title' => 'Application segment 5',
        'payload' => 'variable',
      ),
    ),
    230 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP6',
        'title' => 'Application segment 6',
        'payload' => 'variable',
      ),
    ),
    231 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP7',
        'title' => 'Application segment 7',
        'payload' => 'variable',
      ),
    ),
    232 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP8',
        'title' => 'Application segment 8',
        'payload' => 'variable',
      ),
    ),
    233 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP9',
        'title' => 'Application segment 9',
        'payload' => 'variable',
      ),
    ),
    234 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP10',
        'title' => 'Application segment 10',
        'payload' => 'variable',
      ),
    ),
    235 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP11',
        'title' => 'Application segment 11',
        'payload' => 'variable',
      ),
    ),
    236 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP12',
        'title' => 'Application segment 12',
        'payload' => 'variable',
      ),
    ),
    237 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP13',
        'title' => 'Application segment 13',
        'payload' => 'variable',
      ),
    ),
    238 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP14',
        'title' => 'Application segment 14',
        'payload' => 'variable',
      ),
    ),
    239 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'APP15',
        'title' => 'Application segment 5',
        'payload' => 'variable',
      ),
    ),
    240 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG0',
        'title' => 'Extension 0',
        'payload' => 'variable',
      ),
    ),
    241 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG1',
        'title' => 'Extension 1',
        'payload' => 'variable',
      ),
    ),
    242 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG2',
        'title' => 'Extension 2',
        'payload' => 'variable',
      ),
    ),
    243 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG3',
        'title' => 'Extension 3',
        'payload' => 'variable',
      ),
    ),
    244 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG4',
        'title' => 'Extension 4',
        'payload' => 'variable',
      ),
    ),
    245 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG5',
        'title' => 'Extension 5',
        'payload' => 'variable',
      ),
    ),
    246 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG6',
        'title' => 'Extension 6',
        'payload' => 'variable',
      ),
    ),
    247 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG7',
        'title' => 'Extension 7',
        'payload' => 'variable',
      ),
    ),
    248 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG8',
        'title' => 'Extension 8',
        'payload' => 'variable',
      ),
    ),
    249 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG9',
        'title' => 'Extension 9',
        'payload' => 'variable',
      ),
    ),
    250 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG10',
        'title' => 'Extension 10',
        'payload' => 'variable',
      ),
    ),
    251 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG11',
        'title' => 'Extension 11',
        'payload' => 'variable',
      ),
    ),
    252 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG12',
        'title' => 'Extension 12',
        'payload' => 'variable',
      ),
    ),
    253 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\Segment',
        'name' => 'JPG13',
        'title' => 'Extension 13',
        'payload' => 'variable',
      ),
    ),
    254 =>
    array (
      0 =>
      array (
        'collection' => 'Media\\Jpeg\\SegmentCom',
        'name' => 'COM',
        'title' => 'Comment',
        'payload' => 'variable',
      ),
    ),
  ),
);
}
