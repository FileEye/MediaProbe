<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\InvalidArgumentException;
use ExifEye\core\InvalidDataException;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

/**
 * Class for handling TIFF data.
 *
 * Exif data is actually an extension of the TIFF file format. TIFF
 * images consist of a number of {@link Ifd Image File Directories}
 * (IFDs), each containing a number of {@link EntryInterface entries}. The
 * IFDs are linked to each other --- one can get hold of the first one
 * with the {@link getIfd()} method.
 *
 * To parse a TIFF image for Exif data one would do:
 *
 * <code>
 * $tiff = new Tiff($data);
 * $ifd0 = $tiff->getIfd();
 * $exif = $ifd0->getSubIfd(Ifd::EXIF);
 * $ifd1 = $ifd0->getNextIfd();
 * </code>
 *
 * Should one have some image data of an unknown type, then the {@link
 * Tiff::isValid()} function is handy: it will quickly test if the
 * data could be valid TIFF data. The {@link Jpeg::isValid()}
 * function does the same for JPEG images.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 * @package PEL
 */
class Tiff extends BlockBase
{
    /**
     * TIFF header.
     *
     * This must follow after the two bytes indicating the byte order.
     */
    const TIFF_HEADER = 0x002A;

    /**
     * {@inheritdoc}
     */
    protected $type = 'Tiff';

    /**
     * {@inheritdoc}
     */
    protected $id = 0;

    /**
     * {@inheritdoc}
     */
    protected $name = 'Tiff';

    /**
     * Construct a new object for holding TIFF data.
     *
     * The new object will be empty (with no {@link Ifd}) unless an
     * argument is given from which it can initialize itself. This can
     * either be the filename of a TIFF image or a {@link DataWindow}
     * object.
     *
     * Use {@link setIfd()} to explicitly set the IFD.
     *
     * @param boolean|string|DataWindow $data;
     */
    public function __construct($data = false, $parent = null)
    {
        if ($data === false) {
            return;
        }
        if (is_string($data)) {
            $this->debug('Initializing Tiff object from {data}', ['data' => $data]);
            $this->loadFile($data);
        } elseif ($data instanceof DataWindow) {
            $this->debug('Initializing Tiff object from DataWindow.');
            $this->loadFromData($data);
        } else {
            throw new InvalidArgumentException('Bad type for $data: %s', gettype($data));
        }

        if ($parent) {
            $this->setParentElement($parent);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getElementPathFragment()
    {
        return $this->getType();
    }

    /**
     * Load TIFF data.
     *
     * The data given will be parsed and an internal tree representation
     * will be built. If the data cannot be parsed correctly, a {@link
     * InvalidDataException} is thrown, explaining the problem.
     *
     * @param
     *            d
     *            DataWindow the data from which the object will be
     *            constructed. This should be valid TIFF data, coming either
     *            directly from a TIFF image or from the Exif data in a JPEG image.
     */
    public function loadFromData(DataWindow $data_window)
    {
        $this->debug('Parsing {size} bytes of TIFF data...', ['size' => $data_window->getSize()]);

        /*
         * There must be at least 8 bytes available: 2 bytes for the byte
         * order, 2 bytes for the TIFF header, and 4 bytes for the offset
         * to the first IFD.
         */
        if ($data_window->getSize() < 8) {
            throw new InvalidDataException('Expected at least 8 bytes of TIFF ' . 'data, found just %d bytes.', $data_window->getSize());
        }
        /* Byte order */
        if ($data_window->strcmp(0, 'II')) {
            $this->debug('Found Intel byte order');
            $data_window->setByteOrder(ConvertBytes::LITTLE_ENDIAN);
        } elseif ($data_window->strcmp(0, 'MM')) {
            $this->debug('Found Motorola byte order');
            $data_window->setByteOrder(ConvertBytes::BIG_ENDIAN);
        } else {
            throw new InvalidDataException('Unknown byte order found in TIFF ' . 'data: 0x%2X%2X', $data_window->getByte(0), $data_window->getByte(1));
        }

        /* Verify the TIFF header */
        if ($data_window->getShort(2) != self::TIFF_HEADER) {
            throw new InvalidDataException('Missing TIFF magic value.');
        }

        // IFD0.
        $offset = $data_window->getLong(4);
        $this->debug('First IFD at offset {offset}.', ['offset' => $offset]);

        if ($offset > 0) {
            // Parse IFD0, this will automatically parse any sub IFDs.
            $ifd0 = new Ifd(Spec::getIfdIdByType('IFD0'), $this);
            $this->xxAddSubBlock($ifd0);
            $next_offset = $ifd0->loadFromData($data_window, $offset);
        }

        // Next IFD. @todo iterate on next_offset
        if ($next_offset > 0) {
            // Sanity check: we need 6 bytes.
            if ($next_offset > $data_window->getSize() - 6) {
                $this->error('Bogus offset to next IFD: {offset} > {size}!', [
                    'offset' => $next_offset,
                    'size' => $data_window->getSize() - 6,
                ]);
            } else {
/*                if (Spec::getIfdType($this->getId()) === 'IFD1') {
                    // IFD1 shouldn't link further...
                    $this->error('IFD1 links to another IFD!');
                }*/
                $ifd1 = new Ifd(Spec::getIfdIdByType('IFD1'), $this);
                $this->xxAddSubBlock($ifd1);
                $next_offset = $ifd1->loadFromData($data_window, $next_offset);
            }
        }
    }

    /**
     * Load data from a file into a TIFF object.
     *
     * @param string $filename
     *            the filename. This must be a readable file.
     */
    public function loadFile($filename)
    {
        $this->loadFromData(new DataWindow(file_get_contents($filename)));
    }

    /**
     * Return the first IFD.
     *
     * @return Ifd the first IFD contained in the TIFF data, if any.
     *         If there is no IFD null will be returned.
     */
    public function getIfd()
    {
        return $this->xxGetSubBlockByIndex('Ifd', 0);
    }

    /**
     * Turn this object into bytes.
     *
     * TIFF images can have {@link ConvertBytes::LITTLE_ENDIAN
     * little-endian} or {@link ConvertBytes::BIG_ENDIAN big-endian} byte
     * order, and so this method takes an argument specifying that.
     *
     * @param boolean $order
     *            the desired byte order of the TIFF data.
     *            This should be one of {@link ConvertBytes::LITTLE_ENDIAN} or {@link
     *            ConvertBytes::BIG_ENDIAN}.
     *
     * @return string the bytes representing this object.
     */
    public function getBytes($order = ConvertBytes::LITTLE_ENDIAN)
    {
        if ($order == ConvertBytes::LITTLE_ENDIAN) {
            $bytes = 'II';
        } else {
            $bytes = 'MM';
        }

        // TIFF magic number --- fixed value.
        $bytes .= ConvertBytes::fromShort(self::TIFF_HEADER, $order);

        $ifd0 = $this->xxGetSubBlockByName('Ifd', 'IFD0');
        if ($ifd0) {
            // IFD0 offset. We will always start IFD0 at an offset of 8
            // bytes (2 bytes for byte order, another 2 bytes for the TIFF
            // header, and 4 bytes for the IFD0 offset make 8 bytes together).
            $bytes .= ConvertBytes::fromLong(8, $order);

            // The argument specifies the offset of this IFD. The IFD will
            // use this to calculate offsets from the entries to their data,
            // all those offsets are absolute offsets counted from the
            // beginning of the data.
            $ifd0_bytes = $ifd0->toBytes(8, $order);

            // Deal with IFD1.
            $ifd1 = $this->xxGetSubBlockByName('Ifd', 'IFD1');
            if (!$ifd1) {
                // No IFD1, link to next IFD is 0.
                $bytes .= $ifd0_bytes['ifd_area'] . ConvertBytes::fromLong(0, $order) . $ifd0_bytes['data_area'];
            } else {
                $ifd0_length = strlen($ifd0_bytes['ifd_area']) + 4 + strlen($ifd0_bytes['data_area']);
                $ifd1_offset = 8 + $ifd0_length;
                $bytes .= $ifd0_bytes['ifd_area'] . ConvertBytes::fromLong($ifd1_offset, $order) . $ifd0_bytes['data_area'];
                $ifd1_bytes = $ifd1->toBytes($ifd1_offset, $order);
                $bytes .= $ifd1_bytes['ifd_area'] . ConvertBytes::fromLong(0, $order) . $ifd1_bytes['data_area'];
            }
        } else {
            $bytes .= ConvertBytes::fromLong(0, $order);
        }

        return $bytes;
    }

    /**
     * Save the TIFF object as a TIFF image in a file.
     *
     * @param
     *            string the filename to save in. An existing file with the
     *            same name will be overwritten!
     *
     * @return integer|FALSE The number of bytes that were written to the
     *         file, or FALSE on failure.
     */
    public function saveFile($filename)
    {
        return file_put_contents($filename, $this->getBytes());
    }

    /**
     * Return a string representation of this object.
     *
     * @return string a string describing this object. This is mostly useful
     *         for debugging.
     */
    public function __toString()
    {
        $str = ExifEye::fmt("Dumping TIFF data...\n");
        if ($this->xxGetSubBlockByIndex('Ifd', 0) !== null) {
            $str .= $this->xxGetSubBlockByIndex('Ifd', 0)->__toString();
        }

        return $str;
    }

    /**
     * Check if data is valid TIFF data.
     *
     * This will read just enough data from the data window to determine
     * if the data could be a valid TIFF data. This means that the
     * check is more like a heuristic than a rigorous check.
     *
     * @param DataWindow $data_window
     *            the bytes that will be examined.
     *
     * @return boolean true if the data looks like valid TIFF data,
     *         false otherwise.
     *
     * @see Jpeg::isValid()
     */
    public static function xxIsValid(DataWindow $data_window)
    {
        /* First check that we have enough data. */
        if ($data_window->getSize() < 8) {
            return false;
        }

        /* Byte order */
        if ($data_window->strcmp(0, 'II')) {
            $data_window->setByteOrder(ConvertBytes::LITTLE_ENDIAN);
        } elseif ($data_window->strcmp(0, 'MM')) {
            ExifEye::logger()->debug('Found Motorola byte order');
            $data_window->setByteOrder(ConvertBytes::BIG_ENDIAN);
        } else {
            return false;
        }

        /* Verify the TIFF header */
        return $data_window->getShort(2) == self::TIFF_HEADER;
    }
}
