<?php

namespace ExifEye\core\Entry\Exception;

use ExifEye\core\ExifEyeException;

/**
 * Exception cast when numbers overflow.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class OverflowException extends ExifEyeException
{
    /**
     * Construct a new overflow exception.
     *
     * @param int $v
     *            the value that is out of range.
     *
     * @param int $min
     *            the minimum allowed value.
     *
     * @param int $max
     *            the maximum allowed value.
     */
    public function __construct($v, $min, $max)
    {
        parent::__construct('Value %.0f out of range [%.0f, %.0f]', $v, $min, $max);
    }
}
