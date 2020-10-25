<?php
/**
 * This file is generated automatically by executing the 'fileeye-mediaprobe compile' command.
 *
 * DO NOT CHANGE MANUALLY.
 */
// phpcs:disable

namespace FileEye\MediaProbe\Collection\MakerNotes\Canon;

use FileEye\MediaProbe\Collection;

class PSInfo2 extends Collection {

  protected static $map = array (
  'name' => 'CanonPSInfo2',
  'title' => 'Canon PSInfo2',
  'class' => 'FileEye\\MediaProbe\\Block\\IndexMap',
  'DOMNode' => 'index',
  'format' =>
  array (
    0 => 1,
  ),
  'defaultItemCollection' => 'Tag',
  'itemsByName' =>
  array (
    'ColorToneAuto' => 156,
    'ColorToneFaithful' => 108,
    'ColorToneLandscape' => 60,
    'ColorToneMonochrome' => 132,
    'ColorToneNeutral' => 84,
    'ColorTonePortrait' => 36,
    'ColorToneStandard' => 12,
    'ColorToneUserDef1' => 180,
    'ColorToneUserDef2' => 204,
    'ColorToneUserDef3' => 228,
    'ContrastAuto' => 144,
    'ContrastFaithful' => 96,
    'ContrastLandscape' => 48,
    'ContrastMonochrome' => 120,
    'ContrastNeutral' => 72,
    'ContrastPortrait' => 24,
    'ContrastStandard' => 0,
    'ContrastUserDef1' => 168,
    'ContrastUserDef2' => 192,
    'ContrastUserDef3' => 216,
    'FilterEffectAuto' => 160,
    'FilterEffectFaithful' => 112,
    'FilterEffectLandscape' => 64,
    'FilterEffectMonochrome' => 136,
    'FilterEffectNeutral' => 88,
    'FilterEffectPortrait' => 40,
    'FilterEffectStandard' => 16,
    'FilterEffectUserDef1' => 184,
    'FilterEffectUserDef2' => 208,
    'FilterEffectUserDef3' => 232,
    'SaturationAuto' => 152,
    'SaturationFaithful' => 104,
    'SaturationLandscape' => 56,
    'SaturationMonochrome' => 128,
    'SaturationNeutral' => 80,
    'SaturationPortrait' => 32,
    'SaturationStandard' => 8,
    'SaturationUserDef1' => 176,
    'SaturationUserDef2' => 200,
    'SaturationUserDef3' => 224,
    'SharpnessAuto' => 148,
    'SharpnessFaithful' => 100,
    'SharpnessLandscape' => 52,
    'SharpnessMonochrome' => 124,
    'SharpnessNeutral' => 76,
    'SharpnessPortrait' => 28,
    'SharpnessStandard' => 4,
    'SharpnessUserDef1' => 172,
    'SharpnessUserDef2' => 196,
    'SharpnessUserDef3' => 220,
    'ToningEffectAuto' => 164,
    'ToningEffectFaithful' => 116,
    'ToningEffectLandscape' => 68,
    'ToningEffectMonochrome' => 140,
    'ToningEffectNeutral' => 92,
    'ToningEffectPortrait' => 44,
    'ToningEffectStandard' => 20,
    'ToningEffectUserDef1' => 188,
    'ToningEffectUserDef2' => 212,
    'ToningEffectUserDef3' => 236,
    'UserDef1PictureStyle' => 240,
    'UserDef2PictureStyle' => 242,
    'UserDef3PictureStyle' => 244,
  ),
  'itemsByExiftoolDOMNode' =>
  array (
    'Canon:ColorToneAuto' => 156,
    'Canon:ColorToneFaithful' => 108,
    'Canon:ColorToneLandscape' => 60,
    'Canon:ColorToneMonochrome' => 132,
    'Canon:ColorToneNeutral' => 84,
    'Canon:ColorTonePortrait' => 36,
    'Canon:ColorToneStandard' => 12,
    'Canon:ColorToneUserDef1' => 180,
    'Canon:ColorToneUserDef2' => 204,
    'Canon:ColorToneUserDef3' => 228,
    'Canon:ContrastAuto' => 144,
    'Canon:ContrastFaithful' => 96,
    'Canon:ContrastLandscape' => 48,
    'Canon:ContrastMonochrome' => 120,
    'Canon:ContrastNeutral' => 72,
    'Canon:ContrastPortrait' => 24,
    'Canon:ContrastStandard' => 0,
    'Canon:ContrastUserDef1' => 168,
    'Canon:ContrastUserDef2' => 192,
    'Canon:ContrastUserDef3' => 216,
    'Canon:FilterEffectAuto' => 160,
    'Canon:FilterEffectFaithful' => 112,
    'Canon:FilterEffectLandscape' => 64,
    'Canon:FilterEffectMonochrome' => 136,
    'Canon:FilterEffectNeutral' => 88,
    'Canon:FilterEffectPortrait' => 40,
    'Canon:FilterEffectStandard' => 16,
    'Canon:FilterEffectUserDef1' => 184,
    'Canon:FilterEffectUserDef2' => 208,
    'Canon:FilterEffectUserDef3' => 232,
    'Canon:SaturationAuto' => 152,
    'Canon:SaturationFaithful' => 104,
    'Canon:SaturationLandscape' => 56,
    'Canon:SaturationMonochrome' => 128,
    'Canon:SaturationNeutral' => 80,
    'Canon:SaturationPortrait' => 32,
    'Canon:SaturationStandard' => 8,
    'Canon:SaturationUserDef1' => 176,
    'Canon:SaturationUserDef2' => 200,
    'Canon:SaturationUserDef3' => 224,
    'Canon:SharpnessAuto' => 148,
    'Canon:SharpnessFaithful' => 100,
    'Canon:SharpnessLandscape' => 52,
    'Canon:SharpnessMonochrome' => 124,
    'Canon:SharpnessNeutral' => 76,
    'Canon:SharpnessPortrait' => 28,
    'Canon:SharpnessStandard' => 4,
    'Canon:SharpnessUserDef1' => 172,
    'Canon:SharpnessUserDef2' => 196,
    'Canon:SharpnessUserDef3' => 220,
    'Canon:ToningEffectAuto' => 164,
    'Canon:ToningEffectFaithful' => 116,
    'Canon:ToningEffectLandscape' => 68,
    'Canon:ToningEffectMonochrome' => 140,
    'Canon:ToningEffectNeutral' => 92,
    'Canon:ToningEffectPortrait' => 44,
    'Canon:ToningEffectStandard' => 20,
    'Canon:ToningEffectUserDef1' => 188,
    'Canon:ToningEffectUserDef2' => 212,
    'Canon:ToningEffectUserDef3' => 236,
    'Canon:UserDef1PictureStyle' => 240,
    'Canon:UserDef2PictureStyle' => 242,
    'Canon:UserDef3PictureStyle' => 244,
  ),
  'items' =>
  array (
    0 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastStandard',
      'title' => 'Contrast Standard',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastStandard',
    ),
    4 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessStandard',
      'title' => 'Sharpness Standard',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessStandard',
    ),
    8 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationStandard',
      'title' => 'Saturation Standard',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationStandard',
    ),
    12 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneStandard',
      'title' => 'Color Tone Standard',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneStandard',
    ),
    16 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectStandard',
      'title' => 'Filter Effect Standard',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectStandard',
    ),
    20 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectStandard',
      'title' => 'Toning Effect Standard',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectStandard',
    ),
    24 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastPortrait',
      'title' => 'Contrast Portrait',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastPortrait',
    ),
    28 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessPortrait',
      'title' => 'Sharpness Portrait',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessPortrait',
    ),
    32 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationPortrait',
      'title' => 'Saturation Portrait',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationPortrait',
    ),
    36 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorTonePortrait',
      'title' => 'Color Tone Portrait',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorTonePortrait',
    ),
    40 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectPortrait',
      'title' => 'Filter Effect Portrait',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectPortrait',
    ),
    44 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectPortrait',
      'title' => 'Toning Effect Portrait',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectPortrait',
    ),
    48 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastLandscape',
      'title' => 'Contrast Landscape',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastLandscape',
    ),
    52 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessLandscape',
      'title' => 'Sharpness Landscape',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessLandscape',
    ),
    56 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationLandscape',
      'title' => 'Saturation Landscape',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationLandscape',
    ),
    60 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneLandscape',
      'title' => 'Color Tone Landscape',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneLandscape',
    ),
    64 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectLandscape',
      'title' => 'Filter Effect Landscape',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectLandscape',
    ),
    68 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectLandscape',
      'title' => 'Toning Effect Landscape',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectLandscape',
    ),
    72 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastNeutral',
      'title' => 'Contrast Neutral',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastNeutral',
    ),
    76 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessNeutral',
      'title' => 'Sharpness Neutral',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessNeutral',
    ),
    80 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationNeutral',
      'title' => 'Saturation Neutral',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationNeutral',
    ),
    84 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneNeutral',
      'title' => 'Color Tone Neutral',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneNeutral',
    ),
    88 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectNeutral',
      'title' => 'Filter Effect Neutral',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectNeutral',
    ),
    92 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectNeutral',
      'title' => 'Toning Effect Neutral',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectNeutral',
    ),
    96 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastFaithful',
      'title' => 'Contrast Faithful',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastFaithful',
    ),
    100 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessFaithful',
      'title' => 'Sharpness Faithful',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessFaithful',
    ),
    104 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationFaithful',
      'title' => 'Saturation Faithful',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationFaithful',
    ),
    108 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneFaithful',
      'title' => 'Color Tone Faithful',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneFaithful',
    ),
    112 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectFaithful',
      'title' => 'Filter Effect Faithful',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectFaithful',
    ),
    116 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectFaithful',
      'title' => 'Toning Effect Faithful',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectFaithful',
    ),
    120 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastMonochrome',
      'title' => 'Contrast Monochrome',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastMonochrome',
    ),
    124 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessMonochrome',
      'title' => 'Sharpness Monochrome',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessMonochrome',
    ),
    128 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationMonochrome',
      'title' => 'Saturation Monochrome',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationMonochrome',
    ),
    132 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneMonochrome',
      'title' => 'Color Tone Monochrome',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneMonochrome',
    ),
    136 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectMonochrome',
      'title' => 'Filter Effect Monochrome',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Yellow',
          2 => 'Orange',
          3 => 'Red',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectMonochrome',
    ),
    140 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectMonochrome',
      'title' => 'Toning Effect Monochrome',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Sepia',
          2 => 'Blue',
          3 => 'Purple',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectMonochrome',
    ),
    144 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastAuto',
      'title' => 'Contrast Auto',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastAuto',
    ),
    148 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessAuto',
      'title' => 'Sharpness Auto',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessAuto',
    ),
    152 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationAuto',
      'title' => 'Saturation Auto',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationAuto',
    ),
    156 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneAuto',
      'title' => 'Color Tone Auto',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneAuto',
    ),
    160 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectAuto',
      'title' => 'Filter Effect Auto',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Yellow',
          2 => 'Orange',
          3 => 'Red',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectAuto',
    ),
    164 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectAuto',
      'title' => 'Toning Effect Auto',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Sepia',
          2 => 'Blue',
          3 => 'Purple',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectAuto',
    ),
    168 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastUserDef1',
      'title' => 'Contrast User Def 1',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastUserDef1',
    ),
    172 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessUserDef1',
      'title' => 'Sharpness User Def 1',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessUserDef1',
    ),
    176 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationUserDef1',
      'title' => 'Saturation User Def 1',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationUserDef1',
    ),
    180 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneUserDef1',
      'title' => 'Color Tone User Def 1',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneUserDef1',
    ),
    184 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectUserDef1',
      'title' => 'Filter Effect User Def 1',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Yellow',
          2 => 'Orange',
          3 => 'Red',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectUserDef1',
    ),
    188 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectUserDef1',
      'title' => 'Toning Effect User Def 1',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Sepia',
          2 => 'Blue',
          3 => 'Purple',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectUserDef1',
    ),
    192 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastUserDef2',
      'title' => 'Contrast User Def 2',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastUserDef2',
    ),
    196 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessUserDef2',
      'title' => 'Sharpness User Def 2',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessUserDef2',
    ),
    200 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationUserDef2',
      'title' => 'Saturation User Def 2',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationUserDef2',
    ),
    204 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneUserDef2',
      'title' => 'Color Tone User Def 2',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneUserDef2',
    ),
    208 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectUserDef2',
      'title' => 'Filter Effect User Def 2',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Yellow',
          2 => 'Orange',
          3 => 'Red',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectUserDef2',
    ),
    212 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectUserDef2',
      'title' => 'Toning Effect User Def 2',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Sepia',
          2 => 'Blue',
          3 => 'Purple',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectUserDef2',
    ),
    216 =>
    array (
      'collection' => 'Tag',
      'name' => 'ContrastUserDef3',
      'title' => 'Contrast User Def 3',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ContrastUserDef3',
    ),
    220 =>
    array (
      'collection' => 'Tag',
      'name' => 'SharpnessUserDef3',
      'title' => 'Sharpness User Def 3',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SharpnessUserDef3',
    ),
    224 =>
    array (
      'collection' => 'Tag',
      'name' => 'SaturationUserDef3',
      'title' => 'Saturation User Def 3',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:SaturationUserDef3',
    ),
    228 =>
    array (
      'collection' => 'Tag',
      'name' => 'ColorToneUserDef3',
      'title' => 'Color Tone User Def 3',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ColorToneUserDef3',
    ),
    232 =>
    array (
      'collection' => 'Tag',
      'name' => 'FilterEffectUserDef3',
      'title' => 'Filter Effect User Def 3',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Yellow',
          2 => 'Orange',
          3 => 'Red',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:FilterEffectUserDef3',
    ),
    236 =>
    array (
      'collection' => 'Tag',
      'name' => 'ToningEffectUserDef3',
      'title' => 'Toning Effect User Def 3',
      'format' =>
      array (
        0 => 9,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          -559038737 => 'n/a',
          0 => 'None',
          1 => 'Sepia',
          2 => 'Blue',
          3 => 'Purple',
          4 => 'Green',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:ToningEffectUserDef3',
    ),
    240 =>
    array (
      'collection' => 'Tag',
      'name' => 'UserDef1PictureStyle',
      'title' => 'User Def 1 Picture Style',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          65 => 'PC 1',
          66 => 'PC 2',
          67 => 'PC 3',
          129 => 'Standard',
          130 => 'Portrait',
          131 => 'Landscape',
          132 => 'Neutral',
          133 => 'Faithful',
          134 => 'Monochrome',
          135 => 'Auto',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:UserDef1PictureStyle',
    ),
    242 =>
    array (
      'collection' => 'Tag',
      'name' => 'UserDef2PictureStyle',
      'title' => 'User Def 2 Picture Style',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          65 => 'PC 1',
          66 => 'PC 2',
          67 => 'PC 3',
          129 => 'Standard',
          130 => 'Portrait',
          131 => 'Landscape',
          132 => 'Neutral',
          133 => 'Faithful',
          134 => 'Monochrome',
          135 => 'Auto',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:UserDef2PictureStyle',
    ),
    244 =>
    array (
      'collection' => 'Tag',
      'name' => 'UserDef3PictureStyle',
      'title' => 'User Def 3 Picture Style',
      'format' =>
      array (
        0 => 3,
      ),
      'text' =>
      array (
        'mapping' =>
        array (
          65 => 'PC 1',
          66 => 'PC 2',
          67 => 'PC 3',
          129 => 'Standard',
          130 => 'Portrait',
          131 => 'Landscape',
          132 => 'Neutral',
          133 => 'Faithful',
          134 => 'Monochrome',
          135 => 'Auto',
        ),
      ),
      'exiftoolDOMNode' => 'Canon:UserDef3PictureStyle',
    ),
  ),
);
}
