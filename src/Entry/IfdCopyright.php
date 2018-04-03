<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Ascii;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
use ExifEye\core\Spec;

/**
 * Class for holding copyright information.
 *
 * The Exif standard specifies a certain format for copyright information
 * where the COPYRIGHT tag holds both the photographer and editor copyrights,
 * separated by a NULL character.
 */
class IfdCopyright extends Ascii
{
    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
    {
        $v = explode("\0", $data_window->getBytes($data_offset, $components));
        $v[1] = isset($v[1]) ? $v[1] : '';
        return [$v[0], $v[1]];
    }

    /**
     * Update the copyright information.
     *
     * @param array $data
     *            key 0 - the photographer copyright. Use the empty string if
     *            there is no photographer copyright.
     *            key 1 - the editor copyright. Use the empty string if there
     *            is no editor copyright.
     */
    public function setValue(array $data)
    {
        $this->value = array_replace(['', ''], $data);

        if ($this->value[0] === '' && $this->value[1] !== '') {
            $this->value[0] = ' ';
        }

        if ($this->value[1] === '') {
            $this->components = strlen($this->value[0]) + 1;
        } else {
            $this->components = strlen($this->value[0]) + 1 + strlen($this->value[1]) + 1;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = Convert::LITTLE_ENDIAN)
    {
        if ($this->value[1] === '') {
            return $this->value[0] .  chr(0x00);
        } else {
            return $this->value[0] .  chr(0x00) . $this->value[1] .  chr(0x00);
        }
    }

    /**
     * Return a text string with the copyright information.
     *
     * The photographer and editor copyright fields will be returned
     * with a '-' in between if both copyright fields are present,
     * otherwise only one of them will be returned.
     *
     * @param  bool $short
     *            if false, then the strings '(Photographer)' and '(Editor)'
     *            will be appended to the photographer and editor copyright
     *            fields (if present), otherwise the fields will be returned
     *            as is.
     *
     * @return string the copyright information in a string.
     */
    public function toString($short = false)
    {
        if ($short) {
            $p = '';
            $e = '';
        } else {
            $p = ' ' . ExifEye::tra('(Photographer)');
            $e = ' ' . ExifEye::tra('(Editor)');
        }

        if ($this->value[0] !== '' && $this->value[1] !== '') {
            return $this->value[0] . $p . ' - ' . $this->value[1] . $e;
        } elseif ($this->value[0] != '') {
            return $this->value[0] . $p;
        } elseif ($this->value[1] != '') {
            return $this->value[1] . $e;
        }

        return '';
    }
}
