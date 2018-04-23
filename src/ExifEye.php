<?php

namespace ExifEye\core;

use Monolog\Logger;
use Monolog\Handler\TestHandler;
use Monolog\Processor\PsrLogMessageProcessor;
use Monolog\Processor\IntrospectionProcessor;

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
     * Flag for controlling debug information.
     *
     * The methods producing debug information ({@link debug()} and
     * {@link warning()}) will only output something if this variable is
     * set to true.
     *
     * @var boolean
     */
    private static $debug = false;

    /**
     * Flag for strictness of parsing.
     *
     * If this variable is set to true, then most errors while loading
     * images will result in exceptions being thrown. Otherwise a
     * warning will be emitted (using {@link ExifEye::warning}) and the
     * exceptions will be appended to {@link ExifEye::$exceptions}.
     *
     * Some errors will still be fatal and result in thrown exceptions,
     * but an effort will be made to skip over as much garbage as
     * possible.
     *
     * @var boolean
     */
    private static $strict = false;

    private static $logger;

    /**
     * Quality setting for encoding JPEG images.
     *
     * This controls the quality used then PHP image resources are
     * encoded into JPEG images. This happens when you create a
     * {@link Jpeg} object based on an image resource.
     *
     * The default is 75 for average quality images, but you can change
     * this to an integer between 0 and 100.
     *
     * @var int
     */
    private static $quality = 75;

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
     * Set the JPEG encoding quality.
     *
     * @param int $quality
     *            an integer between 0 and 100 with 75 being
     *            average quality and 95 very good quality.
     */
    public static function setJPEGQuality($quality)
    {
        self::$quality = $quality;
    }

    /**
     * Get current setting for JPEG encoding quality.
     *
     * @return int the quality.
     */
    public static function getJPEGQuality()
    {
        return self::$quality;
    }

    /**
     * Clear list of stored exceptions.
     *
     * Use this function before a call to some method if you intend to
     * check for exceptions afterwards.
     */
    public static function clearLogger()
    {
        static::$logger = null;
    }

    public static function logger()
    {
        if (!isset(static::$logger)) {
            static::$logger = (new Logger('exifeye'))
              ->pushHandler(new TestHandler(Logger::INFO))
              ->pushProcessor(new PsrLogMessageProcessor());
              //->pushProcessor(new IntrospectionProcessor());
        }
        return static::$logger;
    }

    /**
     * Enable/disable strict parsing.
     *
     * If strict parsing is enabled, then most errors while loading
     * images will result in exceptions being thrown. Otherwise a
     * warning will be emitted (using {@link ExifEye::warning}) and the
     * exceptions will be stored for later use via {@link
     * getExceptions()}.
     *
     * Some errors will still be fatal and result in thrown exceptions,
     * but an effort will be made to skip over as much garbage as
     * possible.
     *
     * @param boolean $flag
     *            use true to enable strict parsing, false to
     *            diable.
     */
    public static function setStrictParsing($flag)
    {
        self::$strict = $flag;
    }

    /**
     * Get current setting for strict parsing.
     *
     * @return boolean true if strict parsing is in effect, false
     *         otherwise.
     */
    public static function getStrictParsing()
    {
        return self::$strict;
    }

    /**
     * Enable/disable debugging output.
     *
     * @param boolean $flag
     *            use true to enable debug output, false to
     *            diable.
     */
    public static function setDebug($flag)
    {
        self::$debug = $flag;
    }

    /**
     * Get current setting for debug output.
     *
     * @return boolean true if debug is enabled, false otherwise.
     */
    public static function getDebug()
    {
        return self::$debug;
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
}
