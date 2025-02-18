<?php

declare(strict_types=1);

namespace FileEye\MediaProbe\Utility;

use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Entry\Core\Byte;
use FileEye\MediaProbe\Entry\Core\Long;
use FileEye\MediaProbe\Entry\Core\Long64;
use FileEye\MediaProbe\Entry\Core\Short;
use FileEye\MediaProbe\Entry\Core\SignedByte;
use FileEye\MediaProbe\Entry\Core\SignedLong;
use FileEye\MediaProbe\Entry\Core\SignedLong64;
use FileEye\MediaProbe\Entry\Core\SignedShort;

/**
 * Conversion functions to and from bytes and numerals.
 *
 * All the methods are static and rely on an argument that specifies the byte
 * order to be used. This must be one of the class constants: LITTLE_ENDIAN
 * or BIG_ENDIAN.
 */
class ConvertBytes
{
    /**
     * Little-endian (Intel) byte order.
     *
     * Data stored in little-endian byte order store the least significant byte
     * first, so the number 0x12345678 becomes 0x78 0x56 0x34 0x12 when stored
     * with little-endian byte order.
     */
    const LITTLE_ENDIAN = 1;

    /**
     * Big-endian (Motorola) byte order.
     *
     * Data stored in big-endian byte order store the most significant byte
     * first, so the number 0x12345678 becomes 0x12 0x34 0x56 0x78 when stored
     * with big-endian byte order.
     */
    const BIG_ENDIAN = 0;

    /**
     * Convert a number into a byte.
     */
    public static function fromByte(int $value): string
    {
        if ($value < Byte::MIN || $value > Byte::MAX) {
            throw new DataException('Value %d is invalid for byte int', $value);
        }

        return chr($value);
    }

    /**
     * Convert a signed number into a byte.
     */
    public static function fromSignedByte(int $value): string
    {
        if ($value < SignedByte::MIN || $value > SignedByte::MAX) {
            throw new DataException('Value %d is invalid for signed byte int', $value);
        }

        return chr($value);
    }

    /**
     * Convert an unsigned short into two bytes.
     */
    public static function fromShort(int $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if ($value < Short::MIN || $value > Short::MAX) {
            throw new DataException('Value %d is invalid for short int', $value);
        }

        if ($byte_order === static::LITTLE_ENDIAN) {
            return chr($value) . chr($value >> 8);
        } else {
            return chr($value >> 8) . chr($value);
        }
    }

    /**
     * Convert an unsigned short into two bytes, reversed byte order.
     */
    public static function fromShortRev(int $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if ($value < Short::MIN || $value > Short::MAX) {
            throw new DataException('Value %d is invalid for short int', $value);
        }

        if ($byte_order == static::LITTLE_ENDIAN) {
            return chr($value >> 8) . chr($value);
        } else {
            return chr($value) . chr($value >> 8);
        }
    }

    /**
     * Convert a signed short into two bytes.
     */
    public static function fromSignedShort(int $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if ($value < SignedShort::MIN || $value > SignedShort::MAX) {
            throw new DataException('Value %d is invalid for signed short int', $value);
        }

        if ($byte_order === static::LITTLE_ENDIAN) {
            return chr($value) . chr($value >> 8);
        } else {
            return chr($value >> 8) . chr($value);
        }
    }

    /**
     * Convert an unsigned long into four bytes.
     *
     * Because PHP limits the size of integers to 32 bit signed, one cannot really have an unsigned
     * integer in PHP. But integers larger than 2^31-1 will be promoted to 64 bit signed floating
     * point numbers, and so such large numbers can be handled too.
     */
    public static function fromLong(int $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if ($value < Long::MIN || $value > Long::MAX) {
            throw new DataException('Value %d is invalid for long int', $value);
        }

        // We cannot convert the number to bytes in the normal way (using shifts and modulo
        // calculations) because the PHP operator >> and function chr() clip their arguments to
        // 2^31-1, which is the largest signed integer known to PHP. But luckily base_convert
        // handles such big numbers.
        $hex = str_pad(base_convert((string) $value, 10, 16), 8, '0', STR_PAD_LEFT);
        if ($byte_order == static::LITTLE_ENDIAN) {
            return (chr(hexdec($hex[6] . $hex[7])) . chr(hexdec($hex[4] . $hex[5])) . chr(hexdec($hex[2] . $hex[3])) .
                 chr(hexdec($hex[0] . $hex[1])));
        } else {
            return (chr(hexdec($hex[0] . $hex[1])) . chr(hexdec($hex[2] . $hex[3])) . chr(hexdec($hex[4] . $hex[5])) .
                 chr(hexdec($hex[6] . $hex[7])));
        }
    }

    /**
     * Convert a signed long into four bytes.
     */
    public static function fromSignedLong(int $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if ($value < SignedLong::MIN || $value > SignedLong::MAX) {
            throw new DataException('Value %d is invalid for signed long int', $value);
        }

        // We can convert the number into bytes in the normal way using shifts
        // and modulo calculations here (in contrast with fromLong) because
        // PHP automatically handles 32 bit signed integers for us.
        if ($byte_order == static::LITTLE_ENDIAN) {
            return (chr($value) . chr($value >> 8) . chr($value >> 16) . chr($value >> 24));
        } else {
            return (chr($value >> 24) . chr($value >> 16) . chr($value >> 8) . chr($value));
        }
    }

    /**
     * Convert a 64-bit unsigned long into eight bytes.
     */
    public static function fromLong64(int|string $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if (bccomp($value, Long64::MIN) === -1 || bccomp($value, Long64::MAX) === 1) {
            throw new DataException('Value %s is invalid for 64-int long', $value);
        }

        $hexString = str_pad(self::baseConvert($value, 10, 16), 16, '0', STR_PAD_LEFT);

        if ($byte_order == static::LITTLE_ENDIAN) {
            return hex2bin(implode('', array_reverse(str_split($hexString, 2))));
        } else {
            return hex2bin($hexString);
        }
    }

    /**
     * Convert a 64-bit signed long into eight bytes.
     */
    public static function fromSignedLong64(string $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if (bccomp($value, SignedLong64::MIN) === -1 || bccomp($value, SignedLong64::MAX) === 1) {
            throw new DataException('Value %s is invalid for 64-bit signed long', $value);
        }

        $mod = bccomp($value, '0') === -1 ? bcadd($value, '18446744073709551616') : $value;
        $hex = str_pad(self::baseConvert($mod, 10, 16), 16, '0', STR_PAD_LEFT);
        if ($byte_order == static::LITTLE_ENDIAN) {
            return hex2bin(implode('', array_reverse(str_split($hex, 2))));
        } else {
            return hex2bin($hex);
        }
    }

    /**
     * Convert a rational into eight bytes.
     */
    public static function fromRational(array $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if (count($value) !== 2) {
            throw new DataException('A rational float must be expressed as an array [numerator, denominator]');
        }

        if ($value[0] < Long::MIN || $value[0] > Long::MAX) {
            throw new DataException('Numerator value %d is invalid for long int in a rational float', $value[0]);
        }
        if ($value[1] < Long::MIN || $value[1] > Long::MAX) {
            throw new DataException('Denominator value %d is invalid for long int in a rational float', $value[1]);
        }

        return static::fromLong($value[0], $byte_order) . static::fromLong($value[1], $byte_order);
    }

    /**
     * Convert a signed rational into eight bytes.
     */
    public static function fromSignedRational(array $value, int $byte_order = self::BIG_ENDIAN): string
    {
        if (count($value) !== 2) {
            throw new DataException('A rational float must be expressed as an array [numerator, denominator]');
        }

        if ($value[0] < SignedLong::MIN || $value[0] > SignedLong::MAX) {
            throw new DataException('Numerator value %d is invalid for signed long int in a signed rational float', $value[0]);
        }
        if ($value[1] < SignedLong::MIN || $value[1] > SignedLong::MAX) {
            throw new DataException('Denominator value %d is invalid for signed long int in a signed rational float', $value[1]);
        }

        return static::fromSignedLong($value[0], $byte_order) . static::fromSignedLong($value[1], $byte_order);
    }

    /**
     * Extract an unsigned byte from a string of bytes.
     */
    public static function toByte(string $bytes): int
    {
        if (!is_string($bytes) || strlen($bytes) < 1) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        return ord($bytes[0]);
    }

    /**
     * Extract a signed byte from a string bytes.
     */
    public static function toSignedByte(string $bytes): int
    {
        if (!is_string($bytes) || strlen($bytes) < 1) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        $n = static::toByte($bytes);
        return $n > 127 ? $n - 256 : $n;
    }

    /**
     * Extract an unsigned short from bytes.
     */
    public static function toShort(string $bytes, int $byte_order = self::BIG_ENDIAN): int
    {
        if (!is_string($bytes) || strlen($bytes) < 2) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        if ($byte_order == static::LITTLE_ENDIAN) {
            return (ord($bytes[1]) * 256 + ord($bytes[0]));
        } else {
            return (ord($bytes[0]) * 256 + ord($bytes[1]));
        }
    }

    /**
     * Extract an unsigned short from bytes, reversed byte order.
     */
    public static function toShortRev(string $bytes, int $byte_order = self::BIG_ENDIAN): int
    {
        if (!is_string($bytes) || strlen($bytes) < 2) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        if ($byte_order == static::LITTLE_ENDIAN) {
            return (ord($bytes[0]) * 256 + ord($bytes[1]));
        } else {
            return (ord($bytes[1]) * 256 + ord($bytes[0]));
        }
    }

    /**
     * Extract a signed short from bytes.
     */
    public static function toSignedShort(string $bytes, int $byte_order = self::BIG_ENDIAN): int
    {
        if (!is_string($bytes) || strlen($bytes) < 2) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        $n = static::toShort($bytes, $byte_order);
        return $n > 32767 ? $n - 65536 : $n;
    }

    /**
     * Extract an unsigned long from bytes.
     */
    public static function toLong(string $bytes, int $byte_order = self::BIG_ENDIAN): int
    {
        if (!is_string($bytes) || strlen($bytes) < 4) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        if ($byte_order == static::LITTLE_ENDIAN) {
            return (int) (ord($bytes[3]) * 16777216 + ord($bytes[2]) * 65536 + ord($bytes[1]) * 256 + ord($bytes[0]));
        } else {
            return (int) (ord($bytes[0]) * 16777216 + ord($bytes[1]) * 65536 + ord($bytes[2]) * 256 + ord($bytes[3]));
        }
    }

    /**
     * Extract a signed long from bytes.
     */
    public static function toSignedLong(string $bytes, int $byte_order = self::BIG_ENDIAN): int
    {
        if (!is_string($bytes) || strlen($bytes) < 4) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        $n = static::toLong($bytes, $byte_order);
        return $n > 2147483647 ? $n - 4294967296 : $n;
    }

    /**
     * Extract a 64-bit unsigned long from bytes.
     */
    public static function toLong64(string $bytes, int $byte_order = self::BIG_ENDIAN): string
    {
        if (strlen($bytes) !== 8) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }

        if ($byte_order == static::LITTLE_ENDIAN) {
            $hexString = implode('', array_reverse(str_split(bin2hex($bytes), 2)));
        } else {
            $hexString = bin2hex($bytes);
        }

        return self::baseConvert($hexString, 16, 10);
    }

    /**
     * Extract a 64-bit signed long from bytes.
     */
    public static function toSignedLong64(string $bytes, int $byte_order = self::BIG_ENDIAN): string
    {
        if (strlen($bytes) !== 8) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        $n = static::toLong64($bytes, $byte_order);
        return bccomp($n, '9223372036854775807') === 1 ? bcsub($n, '18446744073709551616') : $n;
    }

    /**
     * Extract an unsigned rational from bytes.
     */
    public static function toRational(string $bytes, int $byte_order = self::BIG_ENDIAN): array
    {
        if (!is_string($bytes) || strlen($bytes) < 8) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        return [
            static::toLong($bytes, $byte_order),
            static::toLong(substr($bytes, 4), $byte_order),
        ];
    }

    /**
     * Extract a signed rational from bytes.
     */
    public static function toSignedRational(string $bytes, int $byte_order = self::BIG_ENDIAN): array
    {
        if (!is_string($bytes) || strlen($bytes) < 8) {
            throw new \InvalidArgumentException('Invalid input data for ' . __METHOD__);
        }
        return [
            static::toSignedLong($bytes, $byte_order),
            static::toSignedLong(substr($bytes, 4), $byte_order),
        ];
    }

    /**
     * Follows the syntax of base_convert (http://www.php.net/base_convert)
     * Created by Michael Renner @ http://www.php.net/base_convert 17-May-2006 03:24
     */
    private static function baseConvert(string $numString, int $fromBase, int $toBase)
    {

        $chars = "0123456789abcdefghijklmnopqrstuvwxyz";
        $tostring = substr($chars, 0, $toBase);

        $length = strlen($numString);
        $result = '';
        $number = [];
        for ($i = 0; $i < $length; $i++) {
            $number[$i] = strpos($chars, $numString[$i]);
        }
        do {
            $divide = 0;
            $newlen = 0;
            for ($i = 0; $i < $length; $i++) {
                $divide = $divide * $fromBase + $number[$i];
                if ($divide >= $toBase) {
                    $number[$newlen++] = (int) ($divide / $toBase);
                    $divide = $divide % $toBase;
                } elseif ($newlen > 0) {
                    $number[$newlen++] = 0;
                }
            }
            $length = $newlen;
            $result = $tostring[$divide] . $result;
        } while ($newlen != 0);
        return $result;
    }
}
