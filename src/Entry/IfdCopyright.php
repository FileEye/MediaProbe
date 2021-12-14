<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Ascii;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], ItemDefinition $item_definition = null)
    {
        $v = explode("\0", $data_element->getBytes(0, $item_definition->getValuesCount()));
        $v[1] = isset($v[1]) ? $v[1] : '';
        $this->setValue($v);
        return $this;
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
        $this->parsed = true;

        $this->value = array_replace(['', ''], $data);

        if ($this->value[1] === '') {
            $this->components = strlen($this->value[0]) + 1;
        } else {
            $this->components = strlen($this->value[0]) + 1 + strlen($this->value[1]) + 1;
        }

        $this->debug("text: {text}", ['text' => $this->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = [])
    {
        $format = $options['format'] ?? null;
        switch ($format) {
            case 'exiftool':
                return rtrim($this->toString(['short' => true]), ' ');
            case 'phpExif':
                $ret = rtrim($this->toBytes(), "\x00");
                return $ret === '' ? null : $ret;
            default:
                return $this->value;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
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
    public function toString(array $options = []): string
    {
        $short = $options['short'] ?? false || ($options['format'] ?? null) === 'exiftool';

        if ($short) {
            $p = '';
            $e = '';
        } else {
            $p = ' ' . MediaProbe::tra('(Photographer)');
            $e = ' ' . MediaProbe::tra('(Editor)');
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
