<?php

namespace ExifEye\core;

/**
 * Class with miscellaneous static methods.
 *
 * This class contains various methods that govern the overall behavior of
 * ExifEye.
 *
 * Debugging output from ExifEye can be turned on and off by assigning true or
 * false to {@link ExifEye::$debug}.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class ExifEye
{

    /**
     * Flag that controls if dgettext can be used.
     * Is set to true or fals at the first access
     *
     * @var boolean|NULL
     */
    private static $hasdgetext = null;

    /**
     * Returns the current version of ExifEye.
     *
     * @return string
     *            the current version of ExifEye.
     */
    public static function version()
    {
        return '1.0.0-dev';
    }

    /**
     * Translate a string.
     *
     * This static function will use Gettext to translate a string. By
     * always using this function for static string one is assured that
     * the translation will be taken from the correct text domain.
     * Dynamic strings should be passed to {@link fmt} instead.
     *
     * @param string $str
     *            the string that should be translated.
     *
     * @return string the translated string, or the original string if
     *         no translation could be found.
     */
    public static function tra($str)
    {
        return self::dgettextWrapper('pel', $str);
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
        return vsprintf(self::dgettextWrapper('pel', $str), $args);
    }

    /**
     * Warapper for dgettext.
     * The untranslated stub will be return in the case that dgettext is not available.
     *
     * @param string $domain
     * @param string $str
     * @return string
     */
    private static function dgettextWrapper($domain, $str)
    {
        if (self::$hasdgetext === null) {
            self::$hasdgetext = function_exists('dgettext');
            if (self::$hasdgetext === true) {
                bindtextdomain('pel', __DIR__ . '/locale');
            }
        }
        if (self::$hasdgetext) {
            return dgettext($domain, $str);
        } else {
            return $str;
        }
    }

    /**
     * Dumps a string of bytes in a human readable sequence of hex couples.
     *
     * @param string $input
     * @param int @dump_length
     *
     * @return string
     */
    public static function dumpHex($input, $dump_length = 4)
    {
        $input_length = strlen($input);

        if ($input_length === 0) {
            return null;
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
}
