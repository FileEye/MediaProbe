<?php

namespace FileEye\MediaProbe;

use Composer\InstalledVersions;

/**
 * Class with miscellaneous static methods.
 *
 * This class contains various methods that govern the overall behavior of
 * MediaProbe.
 *
 * Debugging output from MediaProbe can be turned on and off by assigning true or
 * false to {@link MediaProbe::$debug}.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class MediaProbe
{
    /**
     * Returns the current version of MediaProbe.
     *
     * @return string
     *            the current version of MediaProbe.
     */
    public static function version(): string
    {
        return InstalledVersions::getPrettyVersion('fileeye/mediaprobe');
    }

    /**
     * Translate a string.
     *
     * @todo
     *
     * @param string $str
     *            the string that should be translated.
     *
     * @return string the translated string, or the original string if
     *         no translation could be found.
     */
    public static function tra($str)
    {
        return $str;
    }

    /**
     * Translate and format a string.
     *
     * This static function will first use Gettext to translate a format
     * string, which will then have access to any extra arguments. By
     * always using this function for dynamic string one is assured that
     * the translation will be taken from the correct text domain. If
     * the string is static, use {@link tra} instead as it will be
     * faster.
     *
     * @param string $format
     *            the format string. This will be translated
     *            before being used as a format string.
     *
     * @param mixed ...$args
     *            any number of arguments can be given. The
     *            arguments will be available for the format string as usual with
     *            sprintf().
     *
     * @return string the translated string, or the original string if
     *         no translation could be found.
     */
    public static function fmt($format)
    {
        $args = func_get_args();
        $str = array_shift($args);
        return vsprintf($str, $args);
    }

    /**
     * Dumps a string of bytes in a human readable sequence of hex couples.
     *
     * @param string $input
     * @param int @dump_length
     *
     * @return string
     */
    public static function dumpHex($input, int $dump_length = null): ?string
    {
        $input_length = strlen($input);

        if ($input_length === 0) {
            return null;
        }

        if ($dump_length === null) {
            $dump_length = $input_length;
        }

        $ret = '[ ';

        if ($input_length <= $dump_length) {
            $dump_length = $input_length;
            $tmp = substr($input, 0, $dump_length);
            $tmp = bin2hex($tmp);
            $tmp = strtoupper($tmp);
            $ret .= chunk_split($tmp, 2, ' ');
        } else {
            $left_length = round($dump_length / 2);
            $tmp = substr($input, 0, $left_length);
            $tmp = bin2hex($tmp);
            $tmp = strtoupper($tmp);
            $ret .= chunk_split($tmp, 2, ' ');
            $ret .= '... ';
            $right_length = $dump_length - $left_length;
            $tmp = substr($input, -$right_length);
            $tmp = bin2hex($tmp);
            $tmp = strtoupper($tmp);
            $ret .= chunk_split($tmp, 2, ' ');
        }

        $ret .= ']';

        return $ret;
    }

    public static function dumpHexFormatted($data, $newline = "\n")
    {
        static $from = '';
        static $to = '';

        static $width = 16; # number of bytes per line

        static $pad = '.'; # padding for non-visible characters

        $ret = '';

        if ($from === '') {
            for ($i = 0; $i<=0xFF; $i++) {
                $from .= chr($i);
                $to .= ($i >= 0x20 && $i <= 0x7E) ? chr($i) : $pad;
            }
        }

        $hex = str_split(bin2hex($data), $width*2);
        $chars = str_split(strtr($data, $from, $to), $width);

        $offset = 0;
        foreach ($hex as $i => $line) {
            $row = sprintf('%6X', $offset) . ' : ' . implode(' ', str_split($line, 2)) . ' [' . $chars[$i] . ']' . $newline;
            $ret .= $row;
            $offset += $width;
        }

        return $ret;
    }

    public static function dumpIntHex($data): string
    {
        if (is_numeric($data)) {
            return $data . '/0x' . strtoupper(dechex($data));
        }
        return "'$data'";
    }
}
