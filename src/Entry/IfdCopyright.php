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
 * separated by a NUL character.
 */
class IfdCopyright extends Ascii
{
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
                $ret = explode("\0", rtrim($this->toBytes(), "\x00"));
                return [$ret[0] ?? '', $ret[1] ?? ''];
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

        $value = $this->getValue();

        if ($value[0] !== '' && $value[1] !== '') {
            return $value[0] . $p . ' - ' . $value[1] . $e;
        } elseif ($value[0] != '') {
            return $value[0] . $p;
        } elseif ($value[1] != '') {
            return $value[1] . $e;
        }

        return '';
    }
}
