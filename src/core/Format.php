<?php

namespace ExifEye\core;

/**
 * This class defines the constants that are to be used whenever one has to
 * refer to the format of an Exif tag. They will be collectively denoted by the
 * pseudo-type Format throughout the documentation.
 *
 * All the methods defined here are static, and they all operate on a single
 * argument which should be one of the class constants.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 * @author Johannes Weberhofer <jweberhofer@weberhofer.at>
 */
abstract class Format
{
    /**
     * Unsigned byte.
     *
     * Each component will be an unsigned 8-bit integer with a value between 0
     * and 255.
     *
     * Modelled with the {@link Byte} class.
     */
    const BYTE = 1;

    /**
     * ASCII string.
     *
     * Each component will be an ASCII character.
     *
     * Modelled with the {@link Ascii} class.
     */
    const ASCII = 2;

    /**
     * Unsigned short.
     *
     * Each component will be an unsigned 16-bit integer with a value between 0
     * and 65535.
     *
     * Modelled with the {@link Short} class.
     */
    const SHORT = 3;

    /**
     * Unsigned long.
     *
     * Each component will be an unsigned 32-bit integer with a value between 0
     * and 4294967295.
     *
     * Modelled with the {@link Long} class.
     */
    const LONG = 4;

    /**
     * Unsigned rational number.
     *
     * Each component will consist of two unsigned 32-bit integers denoting the
     * enumerator and denominator. Each integer will have a value between 0 and
    *  4294967295.
     *
     * Modelled with the {@link Rational} class.
     */
    const RATIONAL = 5;

    /**
     * Signed byte.
     *
     * Each component will be a signed 8-bit integer with a value between -128
     * and 127.
     *
     * Modelled with the {@link SignedByte} class.
     */
    const SBYTE = 6;

    /**
     * Undefined byte.
     *
     * Each component will be a byte with no associated interpretation.
     *
     * Modelled with the {@link Undefined} class.
     */
    const UNDEFINED = 7;

    /**
     * Signed short.
     *
     * Each component will be a signed 16-bit integer with a value between
     * -32768 and 32767.
     *
     * Modelled with the {@link SignedShort} class.
     */
    const SSHORT = 8;

    /**
     * Signed long.
     *
     * Each component will be a signed 32-bit integer with a value between
     * -2147483648 and 2147483647.
     *
     * Modelled with the {@link SignedLong} class.
     */
    const SLONG = 9;

    /**
     * Signed rational number.
     *
     * Each component will consist of two signed 32-bit integers denoting the
     * enumerator and denominator. Each integer will have a value between
     * -2147483648 and 2147483647.
     *
     * Modelled with the {@link SignedRational} class.
     */
    const SRATIONAL = 10;

    /**
     * Floating point number.
     *
     * Entries with this format are not currently implemented.
     */
    const FLOAT = 11;

    /**
     * Double precision floating point number.
     *
     * Entries with this format are not currently implemented.
     */
    const DOUBLE = 12;

    /**
     * Values for formats short names.
     *
     * @var string[]
     */
    protected static $formatName = [
        self::ASCII => 'Ascii',
        self::BYTE => 'Byte',
        self::SHORT => 'Short',
        self::LONG => 'Long',
        self::RATIONAL => 'Rational',
        self::SBYTE => 'SignedByte',
        self::SSHORT => 'SignedShort',
        self::SLONG => 'SignedLong',
        self::SRATIONAL => 'SignedRational',
        self::FLOAT => 'Float',
        self::DOUBLE => 'Double',
        self::UNDEFINED => 'Undefined'
    ];

    /**
     * Values for formats short names.
     *
     * @var int[]
     */
    protected static $formatLength = [
        self::ASCII => 1,
        self::BYTE => 1,
        self::SHORT => 2,
        self::LONG => 4,
        self::RATIONAL => 8,
        self::SBYTE => 1,
        self::SSHORT => 2,
        self::SLONG => 4,
        self::SRATIONAL => 8,
        self::FLOAT => 4,
        self::DOUBLE => 8,
        self::UNDEFINED => 1
    ];

    /**
     * Returns the name of a format like 'Ascii' for the {@link ASCII} format.
     *
     * @param integer $type
     *            as defined in {@link Format}
     *
     * @return string|null
     */
    public static function getName($type)
    {
        if (array_key_exists($type, self::$formatName)) {
            return self::$formatName[$type];
        }
        return null;
    }

    /**
     * Returns the id of a format from its name.
     *
     * @param string $name
     *            as defined in {@link Format}
     *
     * @return integer|null
     */
    public static function getIdFromName($name)
    {
        static $map;

        if (!isset($map)) {
            $map = array_flip(static::$formatName);
        }

        return isset($map[$name]) ? $map[$name] : null;
    }

    /**
     * Return the size of components in a given format in bytes needed to store
     * one component with the given format.
     *
     * @param integer $type
     *            as defined in {@link Format}
     *
     * @return integer|null
     */
    public static function getSize($type)
    {
        if (array_key_exists($type, self::$formatLength)) {
            return self::$formatLength[$type];
        }
        return null;
    }
}
