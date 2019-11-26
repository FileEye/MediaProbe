<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection;

use FileEye\MediaProbe\Collection;

class Jpeg extends Collection {

  protected static $map = array (
  'title' => 'JPEG image',
  'class' => 'FileEye\\MediaProbe\\Block\\Jpeg',
  'DOMNode' => 'jpeg',
  'items' =>
  array (
    192 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF0',
      'title' => 'Start of frame (baseline DCT)',
      'payload' => 'variable',
    ),
    193 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF1',
      'title' => 'Start of frame (extended sequential)',
      'payload' => 'variable',
    ),
    194 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF2',
      'title' => 'Start of frame (progressive DCT)',
      'payload' => 'variable',
    ),
    195 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF3',
      'title' => 'Encoding (lossless)',
      'payload' => 'variable',
    ),
    196 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'DHT',
      'title' => 'Define Huffman table',
      'payload' => 'variable',
    ),
    197 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF5',
      'title' => 'Start of frame (differential sequential)',
      'payload' => 'variable',
    ),
    198 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF6',
      'title' => 'Start of frame (differential progressive)',
      'payload' => 'variable',
    ),
    199 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF7',
      'title' => 'Start of frame (differential lossless)',
      'payload' => 'variable',
    ),
    200 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG',
      'title' => 'Extension',
      'payload' => 'variable',
    ),
    201 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF9',
      'title' => 'Start of frame (extended sequential, arithmetic)',
      'payload' => 'variable',
    ),
    202 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF10',
      'title' => 'Encoding (progressive, arithmetic)',
      'payload' => 'variable',
    ),
    203 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF11',
      'title' => 'Encoding (lossless, arithmetic)',
      'payload' => 'variable',
    ),
    204 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'DAC',
      'title' => 'Define arithmetic coding conditioning',
      'payload' => 'variable',
    ),
    205 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF13',
      'title' => 'Encoding (differential sequential, arithmetic)',
      'payload' => 'variable',
    ),
    206 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF14',
      'title' => 'Encoding (differential progressive, arithmetic)',
      'payload' => 'variable',
    ),
    207 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOF15',
      'title' => 'Encoding (differential lossless, arithmetic)',
      'payload' => 'variable',
    ),
    208 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST0',
      'title' => 'Restart 0',
      'payload' => 'none',
    ),
    209 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST1',
      'title' => 'Restart 1',
      'payload' => 'none',
    ),
    210 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST2',
      'title' => 'Restart 2',
      'payload' => 'none',
    ),
    211 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST3',
      'title' => 'Restart 3',
      'payload' => 'none',
    ),
    212 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST4',
      'title' => 'Restart 4',
      'payload' => 'none',
    ),
    213 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST5',
      'title' => 'Restart 5',
      'payload' => 'none',
    ),
    214 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST6',
      'title' => 'Restart 6',
      'payload' => 'none',
    ),
    215 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'RST7',
      'title' => 'Restart 7',
      'payload' => 'none',
    ),
    216 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'SOI',
      'title' => 'Start of image',
      'payload' => 'none',
    ),
    217 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'EOI',
      'title' => 'End of image',
      'payload' => 'none',
    ),
    218 =>
    array (
      'collection' => 'Jpeg\\SegmentSos',
      'name' => 'SOS',
      'title' => 'Start of scan',
      'payload' => 'scan',
    ),
    219 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'DQT',
      'title' => 'Define quantization table',
      'payload' => 'variable',
    ),
    220 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'DNL',
      'title' => 'Define number of lines',
      'payload' => 'variable',
    ),
    221 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'DRI',
      'title' => 'Define restart interval',
      'payload' => 'fixed',
      'components' => 4,
    ),
    222 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'DHP',
      'title' => 'Define hierarchical progression',
      'payload' => 'variable',
    ),
    223 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'EXP',
      'title' => 'Expand reference component',
      'payload' => 'variable',
    ),
    224 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP0',
      'title' => 'Application segment 0',
      'payload' => 'variable',
    ),
    225 =>
    array (
      'collection' => 'Jpeg\\SegmentApp1',
      'name' => 'APP1',
    ),
    226 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP2',
      'title' => 'Application segment 2',
      'payload' => 'variable',
    ),
    227 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP3',
      'title' => 'Application segment 3',
      'payload' => 'variable',
    ),
    228 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP4',
      'title' => 'Application segment 4',
      'payload' => 'variable',
    ),
    229 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP5',
      'title' => 'Application segment 5',
      'payload' => 'variable',
    ),
    230 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP6',
      'title' => 'Application segment 6',
      'payload' => 'variable',
    ),
    231 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP7',
      'title' => 'Application segment 7',
      'payload' => 'variable',
    ),
    232 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP8',
      'title' => 'Application segment 8',
      'payload' => 'variable',
    ),
    233 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP9',
      'title' => 'Application segment 9',
      'payload' => 'variable',
    ),
    234 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP10',
      'title' => 'Application segment 10',
      'payload' => 'variable',
    ),
    235 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP11',
      'title' => 'Application segment 11',
      'payload' => 'variable',
    ),
    236 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP12',
      'title' => 'Application segment 12',
      'payload' => 'variable',
    ),
    237 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP13',
      'title' => 'Application segment 13',
      'payload' => 'variable',
    ),
    238 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP14',
      'title' => 'Application segment 14',
      'payload' => 'variable',
    ),
    239 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'APP15',
      'title' => 'Application segment 5',
      'payload' => 'variable',
    ),
    240 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG0',
      'title' => 'Extension 0',
      'payload' => 'variable',
    ),
    241 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG1',
      'title' => 'Extension 1',
      'payload' => 'variable',
    ),
    242 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG2',
      'title' => 'Extension 2',
      'payload' => 'variable',
    ),
    243 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG3',
      'title' => 'Extension 3',
      'payload' => 'variable',
    ),
    244 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG4',
      'title' => 'Extension 4',
      'payload' => 'variable',
    ),
    245 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG5',
      'title' => 'Extension 5',
      'payload' => 'variable',
    ),
    246 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG6',
      'title' => 'Extension 6',
      'payload' => 'variable',
    ),
    247 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG7',
      'title' => 'Extension 7',
      'payload' => 'variable',
    ),
    248 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG8',
      'title' => 'Extension 8',
      'payload' => 'variable',
    ),
    249 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG9',
      'title' => 'Extension 9',
      'payload' => 'variable',
    ),
    250 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG10',
      'title' => 'Extension 10',
      'payload' => 'variable',
    ),
    251 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG11',
      'title' => 'Extension 11',
      'payload' => 'variable',
    ),
    252 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG12',
      'title' => 'Extension 12',
      'payload' => 'variable',
    ),
    253 =>
    array (
      'collection' => 'Jpeg\\Segment',
      'name' => 'JPG13',
      'title' => 'Extension 13',
      'payload' => 'variable',
    ),
    254 =>
    array (
      'collection' => 'Jpeg\\SegmentCom',
      'name' => 'COM',
      'title' => 'Comment',
      'payload' => 'variable',
    ),
  ),
  'itemsByName' =>
  array (
    'APP0' => 224,
    'APP1' => 225,
    'APP10' => 234,
    'APP11' => 235,
    'APP12' => 236,
    'APP13' => 237,
    'APP14' => 238,
    'APP15' => 239,
    'APP2' => 226,
    'APP3' => 227,
    'APP4' => 228,
    'APP5' => 229,
    'APP6' => 230,
    'APP7' => 231,
    'APP8' => 232,
    'APP9' => 233,
    'COM' => 254,
    'DAC' => 204,
    'DHP' => 222,
    'DHT' => 196,
    'DNL' => 220,
    'DQT' => 219,
    'DRI' => 221,
    'EOI' => 217,
    'EXP' => 223,
    'JPG' => 200,
    'JPG0' => 240,
    'JPG1' => 241,
    'JPG10' => 250,
    'JPG11' => 251,
    'JPG12' => 252,
    'JPG13' => 253,
    'JPG2' => 242,
    'JPG3' => 243,
    'JPG4' => 244,
    'JPG5' => 245,
    'JPG6' => 246,
    'JPG7' => 247,
    'JPG8' => 248,
    'JPG9' => 249,
    'RST0' => 208,
    'RST1' => 209,
    'RST2' => 210,
    'RST3' => 211,
    'RST4' => 212,
    'RST5' => 213,
    'RST6' => 214,
    'RST7' => 215,
    'SOF0' => 192,
    'SOF1' => 193,
    'SOF10' => 202,
    'SOF11' => 203,
    'SOF13' => 205,
    'SOF14' => 206,
    'SOF15' => 207,
    'SOF2' => 194,
    'SOF3' => 195,
    'SOF5' => 197,
    'SOF6' => 198,
    'SOF7' => 199,
    'SOF9' => 201,
    'SOI' => 216,
    'SOS' => 218,
  ),
);
}
