<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\InvalidArgumentException;
use ExifEye\core\InvalidDataException;
use ExifEye\core\JpegInvalidMarkerException;
use ExifEye\core\JpegMarker;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for handling JPEG data.
 *
 * The {@link Jpeg} class defined here provides an abstraction for
 * dealing with a JPEG file. The file will be contain a number of
 * sections containing some {@link JpegContent content} identified
 * by a {@link JpegMarker marker}.
 *
 * The {@link getExif()} method is used get hold of the {@link
 * JpegMarker::APP1 APP1} section which stores Exif data. So if
 * the name of the JPEG file is stored in $filename, then one would
 * get hold of the Exif data by saying:
 *
 * <code>
 * $jpeg = new Jpeg($filename);
 * $exif = $jpeg->getExif();
 * $tiff = $exif->getTiff();
 * $ifd0 = $tiff->getIfd();
 * $exif = $ifd0->getSubIfd(Ifd::EXIF);
 * $ifd1 = $ifd0->getNextIfd();
 * </code>
 *
 * The $idf0 and $ifd1 variables will then be two {@link Tiff TIFF}
 * {@link Ifd Image File Directories}, in which the data is stored
 * under the keys found in {@link PelTag}.
 *
 * Should one have some image data (in the form of a {@link
 * DataWindow}) of an unknown type, then the {@link
 * Jpeg::isValid()} function is handy: it will quickly test if the
 * data could be valid JPEG data. The {@link Tiff::isValid()}
 * function does the same for TIFF images.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 * @package PEL
 */
class Jpeg extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'jpeg';

    /**
     * The JPEG image data.
     *
     * @var DataWindow
     */
    private $jpeg_data = null;

    /**
     * Construct a new JPEG object.
     *
     * The new object will be empty unless an argument is given from
     * which it can initialize itself. This can either be the filename
     * of a JPEG image, a {@link DataWindow} object or a PHP image
     * resource handle.
     *
     * New Exif data (in the form of a {@link Exif} object) can be
     * inserted with the {@link setExif()} method:
     *
     * <code>
     * $jpeg = new Jpeg($data);
     * // Create container for the Exif information:
     * $exif = new Exif();
     * // Now Add a Tiff object with a Ifd object with one or more
     * // objects to $exif... Finally add $exif to $jpeg:
     * $jpeg->setExif($exif);
     * </code>
     *
     * @param
     *            mixed the data that this JPEG. This can either be a
     *            filename, a {@link DataWindow} object, or a PHP image resource
     *            handle.
     */
    public function __construct($data = false)
    {
        parent::__construct();

        if ($data === false) {
            return;
        }

        if (is_string($data)) {
            $this->debug('Initializing Jpeg object from {data}', ['data' => $data]);
            $this->loadFile($data);
        } elseif ($data instanceof DataWindow) {
            $this->debug('Initializing Jpeg object from DataWindow.');
            $this->load($data);
        } elseif (is_resource($data) && get_resource_type($data) == 'gd') {
            $this->debug('Initializing Jpeg object from image resource.');
            $this->load(new DataWindow($data));
        } else {
            throw new InvalidArgumentException('Bad type for $data: %s', gettype($data));
        }
    }

    /**
     * JPEG sections start with 0xFF. The first byte that is not
     * 0xFF is a marker (hopefully).
     *
     * @param DataWindow $d
     *
     * @return integer
     */
    protected static function getJpgSectionStart($d)
    {
        for ($i = 0; $i < 7; $i ++) {
            if ($d->getByte($i) != 0xFF) {
                 break;
            }
        }
        return $i;
    }

    /**
     * Load data into a JPEG object.
     *
     * The data supplied will be parsed and turned into an object
     * structure representing the image. This structure can then be
     * manipulated and later turned back into an string of bytes.
     *
     * This methods can be called at any time after a JPEG object has
     * been constructed, also after the {@link appendSection()} has been
     * called to append custom sections. Loading several JPEG images
     * into one object will accumulate the sections, but there will only
     * be one {@link JpegMarker::SOS} section at any given time.
     *
     * @param
     *            DataWindow the data that will be turned into JPEG
     *            sections.
     */
    public function load(DataWindow $d)
    {
        $this->debug('Parsing {size} bytes of JPEG data...', ['size' => $d->getSize()]);

        /* JPEG data is stored in big-endian format. */
        $d->setByteOrder(ConvertBytes::BIG_ENDIAN);

        /*
         * Run through the data to read the sections in the image. After
         * each section is read, the start of the data window will be
         * moved forward, and after the last section we'll terminate with
         * no data left in the window.
         */
        while ($d->getSize() > 0) {
            $i = $this->getJpgSectionStart($d);

            $marker = $d->getByte($i);

            if (!JpegMarker::isValid($marker)) {
                throw new JpegInvalidMarkerException($marker, $i);
            }

            /*
             * Move window so first byte becomes first byte in this
             * section.
             */
            $d->setWindowStart($i + 1);

            if ($marker == JpegMarker::SOI || $marker == JpegMarker::EOI) {
                $segment = new JpegSegment($marker, $this);
            } else {
                /*
                 * Read the length of the section. The length includes the
                 * two bytes used to store the length.
                 */
                $len = $d->getShort(0) - 2;

                /* Skip past the length. */
                $d->setWindowStart(2);

                if ($marker == JpegMarker::APP1) {
                    $app1_segment = new JpegSegment($marker, $this);
                    if ($app1_segment->loadFromData($d->getClone(0, $len)) === false) {
                        // We store the data as normal JPEG content if it could
                        // not be parsed as Exif data.
                        new JpegContent($app1_segment, $d->getClone(0, $len));
                    }
                    $d->setWindowStart($len);
                } elseif ($marker == JpegMarker::COM) {
                    $com_segment = new JpegSegment($marker, $this);
                    $content = new JpegComment($com_segment);
                    $content->loadFromData($d->getClone(0, $len));
                    $d->setWindowStart($len);
                } else {
                    $segment = new JpegSegment($marker, $this);
                    $content = new JpegContent($segment, $d->getClone(0, $len));
                    /* Skip past the data. */
                    $d->setWindowStart($len);

                    /* In case of SOS, image data will follow. */
                    if ($marker == JpegMarker::SOS) {
                        /*
                         * Some images have some trailing (garbage?) following the
                         * EOI marker. To handle this we seek backwards until we
                         * find the EOI marker. Any trailing content is stored as
                         * a JpegContent object.
                         */

                        $length = $d->getSize();
                        while ($d->getByte($length - 2) != 0xFF || $d->getByte($length - 1) != JpegMarker::EOI) {
                            $length --;
                        }

                        $this->jpeg_data = $d->getClone(0, $length - 2);
                        $this->debug('JPEG data: {data}', ['data' => $this->jpeg_data->toString()]);

                        // Append the EOI.
                        $eoi_segment = new JpegSegment(JpegMarker::EOI, $this);

                        // Now check to see if there are any trailing data.
                        if ($length != $d->getSize()) {
                            $this->warning('Found trailing content after EOI: {size} bytes', [
                                'size' => $d->getSize() - $length,
                            ]);
                            // We don't have a proper JPEG marker for trailing
                            // garbage, so we just use 0x00...
                            $trail_segment = new JpegSegment(0x00, $this);
                            new JpegContent($trail_segment, $d->getClone($length));
                        }

                        // Done with the loop.
                        break;
                    }
                }
            }
        }
    }

    /**
     * Load data from a file into a JPEG object.
     *
     * @param
     *            string the filename. This must be a readable file.
     */
    public function loadFile($filename)
    {
        $this->load(new DataWindow(file_get_contents($filename)));
    }

    /**
     * Turn this JPEG object into bytes.
     *
     * The bytes returned by this method is ready to be stored in a file
     * as a valid JPEG image. Use the {@link saveFile()} convenience
     * method to do this.
     *
     * @return string bytes representing this JPEG object, including all
     *         its sections and their associated data.
     */
    public function getBytes()
    {
        $bytes = '';

        foreach ($this->query("segment") as $segment) {
            $m = $segment->getAttribute('id');

            // Add the marker.
            $bytes .= "\xFF" . JpegMarker::getBytes($m);

            // Skip over empty markers.
            if ($m == JpegMarker::SOI || $m == JpegMarker::EOI) {
                continue;
            }

            // Add the segment bytes.
            $data = $segment->toBytes();
            $size = strlen($data) + 2;
            $bytes .= ConvertBytes::fromShort($size, ConvertBytes::BIG_ENDIAN);
            $bytes .= $data;

            // In case of SOS, we need to write the JPEG data.
            if ($m == JpegMarker::SOS) {
                $bytes .= $this->jpeg_data->getBytes();
            }
        }

        return $bytes;
    }

    /**
     * Save the JPEG object as a JPEG image in a file.
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
     * Test data to see if it could be a valid JPEG image.
     *
     * The function will only look at the first few bytes of the data,
     * and try to determine if it could be a valid JPEG image based on
     * those bytes. This means that the check is more like a heuristic
     * than a rigorous check.
     *
     * @param
     *            DataWindow the bytes that will be checked.
     *
     * @return boolean true if the bytes look like the beginning of a
     *         JPEG image, false otherwise.
     *
     * @see Tiff::isValid()
     */
    public static function xxisValid(DataWindow $d)
    {
        /* JPEG data is stored in big-endian format. */
        $d->setByteOrder(ConvertBytes::BIG_ENDIAN);

        $i = self::getJpgSectionStart($d);

        return $d->getByte($i) == JpegMarker::SOI;
    }
}
