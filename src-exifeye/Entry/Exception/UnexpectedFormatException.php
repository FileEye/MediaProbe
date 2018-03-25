<?php

namespace ExifEye\core\Entry\Exception;

use ExifEye\core\Format;

/**
 * Exception indicating that an unexpected format was found.
 *
 * The documentation for each tag in {@link PelTag} will detail any
 * constrains.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class UnexpectedFormatException extends EntryException
{
    /**
     * Construct a new exception indicating an invalid format.
     *
     * @param int $type
     *            the type of IFD.
     * @param int $tag
     *            the tag for which the violation was found as defined in {@link PelTag}
     * @param int $found
     *            the format found as defined in {@link Format}
     * @param int $expected
     *            the expected as defined in {@link Format}
     */
    public function __construct($type, $tag, $found, $expected)
    {
        parent::__construct(
            'Unexpected format found for %s tag: Format::%s. Expected Format::%s instead.',
            PelSpec::getTagName($type, $tag),
            strtoupper(Format::getName($found)),
            strtoupper(Format::getName($expected))
        );
        $this->tag = $tag;
        $this->type = $type;
    }
}
