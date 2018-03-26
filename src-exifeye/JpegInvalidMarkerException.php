<?php

namespace ExifEye\core;

/**
 * Exception thrown when an invalid marker is found.
 *
 * This exception is thrown when PEL expects to find a {@link
 * JpegMarker} and instead finds a byte that isn't a known marker.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class JpegInvalidMarkerException extends ExifEyeException
{
    /**
     * Construct a new invalid marker exception.
     * The exception will contain a message describing the error,
     * including the byte found and the offset of the offending byte.
     *
     * @param int $marker
     *            the byte found.
     *
     * @param int $offset
     *            the offset in the data.
     */
    public function __construct($marker, $offset)
    {
        parent::__construct('Invalid marker found at offset %d: 0x%2X', $offset, $marker);
    }
}
