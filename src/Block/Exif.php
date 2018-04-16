<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\InvalidDataException;
use ExifEye\core\JpegContent;

/**
 * Class representing Exif data.
 *
 * Exif data resides as {@link JpegContent data} and consists of a
 * header followed by a number of {@link JpegIfd IFDs}.
 *
 * The interesting method in this class is {@link getTiff()} which
 * will return the {@link Tiff} object which really holds the data
 * which one normally think of when talking about Exif data. This is
 * because Exif data is stored as an extension of the TIFF file
 * format.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class Exif extends JpegContent
{
    /**
     * Exif header.
     *
     * The Exif data must start with these six bytes to be considered
     * valid.
     */
    const EXIF_HEADER = "Exif\0\0";

    /**
     * The Tiff object contained within.
     *
     * @var Tiff
     */
    private $tiff = null;

    /**
     * Construct a new Exif object.
     *
     * The new object will be empty --- use the {@link load()} method to
     * load Exif data from a {@link DataWindow} object, or use the
     * {@link setTiff()} to change the {@link Tiff} object, which is
     * the true holder of the Exif {@link EntryInterface entries}.
     */
    public function __construct()
    {
        // nothing to be done
    }

    /**
     * Load and parse Exif data.
     *
     * This will populate the object with Exif data, contained as a
     * {@link Tiff} object. This TIFF object can be accessed with
     * the {@link getTiff()} method.
     *
     * @param DataWindow $d
     */
    public function load(DataWindow $d)
    {
        ExifEye::logger()->debug('Parsing {size} bytes of Exif data...', ['size' => $d->getSize()]);

        /* There must be at least 6 bytes for the Exif header. */
        if ($d->getSize() < 6) {
            throw new InvalidDataException('Expected at least 6 bytes of Exif ' . 'data, found just %d bytes.', $d->getSize());
        }
        /* Verify the Exif header */
        if ($d->strcmp(0, self::EXIF_HEADER)) {
            $d->setWindowStart(strlen(self::EXIF_HEADER));
        } else {
            throw new InvalidDataException('Exif header not found.');
        }

        /* The rest of the data is TIFF data. */
        $this->tiff = new Tiff();
        $this->tiff->load($d);
    }

    /**
     * Change the TIFF information.
     *
     * Exif data is really stored as TIFF data, and this method can be
     * used to change this data from one {@link Tiff} object to
     * another.
     *
     * @param Tiff $tiff
     *            the new TIFF object.
     */
    public function setTiff(Tiff $tiff)
    {
        $this->tiff = $tiff;
    }

    /**
     * Get the underlying TIFF object.
     *
     * The actual Exif data is stored in a {@link Tiff} object, and
     * this method provides access to it.
     *
     * @return Tiff the TIFF object with the Exif data.
     */
    public function getTiff()
    {
        return $this->tiff;
    }

    /**
     * Produce bytes for the Exif data.
     *
     * @return string bytes representing this object.
     */
    public function getBytes()
    {
        return self::EXIF_HEADER . $this->tiff->getBytes();
    }

    /**
     * Return a string representation of this object.
     *
     * @return string a string describing this object. This is mostly
     *         useful for debugging.
     */
    public function __toString()
    {
        return ExifEye::tra("Dumping Exif data...\n") . $this->tiff->__toString();
    }
}
