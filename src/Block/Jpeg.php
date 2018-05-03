<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\JpegComment;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\InvalidArgumentException;
use ExifEye\core\InvalidDataException;
use ExifEye\core\JpegContent;
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
class Jpeg
{

    /**
     * The sections in the JPEG data.
     *
     * A JPEG file is built up as a sequence of sections, each section
     * is identified with a {@link JpegMarker}. Some sections can
     * occur more than once in the JPEG stream (the {@link
     * JpegMarker::DQT DQT} and {@link JpegMarker::DHT DTH}
     * markers for example) and so this is an array of ({@link
     * JpegMarker}, {@link JpegContent}) pairs.
     *
     * The content can be either generic {@link JpegContent JPEG
     * content} or {@link Exif Exif data}.
     *
     * @var array
     */
    protected $sections = [];

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
        if ($data === false) {
            return;
        }

        if (is_string($data)) {
            ExifEye::logger()->debug('Initializing Jpeg object from {data}', ['data' => $data]);
            $this->loadFile($data);
        } elseif ($data instanceof DataWindow) {
            ExifEye::logger()->debug('Initializing Jpeg object from DataWindow.');
            $this->load($data);
        } elseif (is_resource($data) && get_resource_type($data) == 'gd') {
            ExifEye::logger()->debug('Initializing Jpeg object from image resource.');
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
        ExifEye::logger()->debug('Parsing {size} bytes...', ['size' => $d->getSize()]);

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
                $content = new JpegContent(new DataWindow());
                $this->appendSection($marker, $content);
            } else {
                /*
                 * Read the length of the section. The length includes the
                 * two bytes used to store the length.
                 */
                $len = $d->getShort(0) - 2;

                ExifEye::logger()->debug('Found {name} section of length {size}', ['name' => JpegMarker::getName($marker), 'size' => $len]);

                /* Skip past the length. */
                $d->setWindowStart(2);

                if ($marker == JpegMarker::APP1) {
                    $content = new Exif();
                    if ($content->loadFromData($d->getClone(0, $len) === false) {
                        // We store the data as normal JPEG content if it could
                        // not be parsed as Exif data.
                        $content = new JpegContent($d->getClone(0, $len));
                    }
                    $this->appendSection($marker, $content);
                    /* Skip past the data. */
                    $d->setWindowStart($len);
                } elseif ($marker == JpegMarker::COM) {
                    $content = new JpegComment();
                    $content->load($d->getClone(0, $len));
                    $this->appendSection($marker, $content);
                    $d->setWindowStart($len);
                } else {
                    $content = new JpegContent($d->getClone(0, $len));
                    $this->appendSection($marker, $content);
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
                        ExifEye::logger()->debug('JPEG data: {data}', ['data' => $this->jpeg_data->__toString()]);

                        /* Append the EOI. */
                        $this->appendSection(JpegMarker::EOI, new JpegContent(new DataWindow()));

                        /* Now check to see if there are any trailing data. */
                        if ($length != $d->getSize()) {
                            ExifEye::logger()->error('Found trailing content after EOI: {size} bytes', [
                                'size' => $d->getSize() - $length,
                            ]);
                            $content = new JpegContent($d->getClone($length));
                            /*
                             * We don't have a proper JPEG marker for trailing
                             * garbage, so we just use 0x00...
                             */
                            $this->appendSection(0x00, $content);
                        }

                        /* Done with the loop. */
                        break;
                    }
                }
            }
        } /* while ($d->getSize() > 0) */
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
     * Set Exif data.
     *
     * Use this to set the Exif data in the image. This will overwrite
     * any old Exif information in the image.
     *
     * @param
     *            Exif the Exif data.
     */
    public function setExif(Exif $exif)
    {
        $app0_offset = 1;
        $app1_offset = - 1;

        /* Search through all sections looking for APP0 or APP1. */
        $sections_count = count($this->sections);
        for ($i = 0; $i < $sections_count; $i ++) {
            if (! empty($this->sections[$i][0])) {
                $section = $this->sections[$i];
                if ($section[0] == JpegMarker::APP0) {
                    $app0_offset = $i;
                } elseif (($section[0] == JpegMarker::APP1) && ($section[1] instanceof Exif)) {
                    $app1_offset = $i;
                    break;
                }
            }
        }

        /*
         * Store the Exif data at the appropriate place, either where the
         * old Exif data was stored ($app1_offset) or right after APP0
         * ($app0_offset+1).
         */
        if ($app1_offset > 0) {
            $this->sections[$app1_offset][1] = $exif;
        } else {
            $this->insertSection(JpegMarker::APP1, $exif, $app0_offset + 1);
        }
    }

    /**
     * Set ICC data.
     *
     * Use this to set the ICC data in the image. This will overwrite
     * any old ICC information in the image.
     *
     * @param
     *            JpegContent the ICC data.
     */
    public function setICC(JpegContent $icc)
    {
        $app1_offset = 1;
        $app2_offset = - 1;

        /* Search through all sections looking for APP0 or APP1. */
        $count_sections = count($this->sections);
        for ($i = 0; $i < $count_sections; $i ++) {
            if (! empty($this->sections[$i][0])) {
                if ($this->sections[$i][0] == JpegMarker::APP1) {
                    $app1_offset = $i;
                } elseif ($this->sections[$i][0] == JpegMarker::APP2) {
                    $app2_offset = $i;
                    break;
                }
            }
        }

        /*
         * Store the Exif data at the appropriate place, either where the
         * old Exif data was stored ($app1_offset) or right after APP0
         * ($app0_offset+1).
         */
        if ($app2_offset > 0) {
            $this->sections[$app1_offset][1] = $icc;
        } else {
            $this->insertSection(JpegMarker::APP2, $icc, $app1_offset + 1);
        }
    }

    /**
     * Get first valid APP1 Exif section data.
     *
     * Use this to get the @{link Exif Exif data} stored.
     *
     * @return Exif the Exif data found or null if the image has no
     *         Exif data.
     */
    public function getExif()
    {
        $sections_count = count($this->sections);
        for ($i = 0; $i < $sections_count; $i ++) {
            $section = $this->getSection(JpegMarker::APP1, $i);
            if ($section instanceof Exif) {
                return $section;
            }
        }
        return null;
    }

    /**
     * Get ICC data.
     *
     * Use this to get the @{link JpegContent ICC data} stored.
     *
     * @return JpegContent the ICC data found or null if the image has no
     *         ICC data.
     */
    public function getICC()
    {
        $icc = $this->getSection(JpegMarker::APP2);
        if ($icc instanceof JpegContent) {
            return $icc;
        }
        return null;
    }

    /**
     * Clear any Exif data.
     *
     * This method will only clear @{link JpegMarker::APP1} EXIF sections found.
     */
    public function clearExif()
    {
        $idx = 0;
        while ($idx < count($this->sections)) {
            $s = $this->sections[$idx];
            if (($s[0] == JpegMarker::APP1) && ($s[1] instanceof Exif)) {
                array_splice($this->sections, $idx, 1);
                $idx--;
            } else {
                ++ $idx;
            }
        }
    }

    /**
     * Append a new section.
     *
     * Used only when loading an image. If it used again later, then the
     * section will end up after the @{link JpegMarker::EOI EOI
     * marker} and will probably not be useful.
     *
     * Please use @{link setExif()} instead if you intend to add Exif
     * information to an image as that function will know the right
     * place to insert the data.
     *
     * @param
     *            JpegMarker the marker identifying the new section.
     *
     * @param
     *            JpegContent the content of the new section.
     */
    public function appendSection($marker, /*JpegContent*/ $content)
    {
        $this->sections[] = [
            $marker,
            $content
        ];
    }

    /**
     * Insert a new section.
     *
     * Please use @{link setExif()} instead if you intend to add Exif
     * information to an image as that function will know the right
     * place to insert the data.
     *
     * @param
     *            JpegMarker the marker for the new section.
     *
     * @param
     *            JpegContent the content of the new section.
     *
     * @param
     *            int the offset where the new section will be inserted ---
     *            use 0 to insert it at the very beginning, use 1 to insert it
     *            between sections 1 and 2, etc.
     */
    public function insertSection($marker, /*JpegContent*/ $content, $offset)
    {
        array_splice($this->sections, $offset, 0, [
            [
                $marker,
                $content
            ]
        ]);
    }

    /**
     * Get a section corresponding to a particular marker.
     *
     * Please use the {@link getExif()} if you just need the Exif data.
     *
     * This will search through the sections of this JPEG object,
     * looking for a section identified with the specified {@link
     * JpegMarker marker}. The {@link JpegContent content} will
     * then be returned. The optional argument can be used to skip over
     * some of the sections. So if one is looking for the, say, third
     * {@link JpegMarker::DHT DHT} section one would do:
     *
     * <code>
     * $dht3 = $jpeg->getSection(JpegMarker::DHT, 2);
     * </code>
     *
     * @param
     *            JpegMarker the marker identifying the section.
     *
     * @param
     *            int the number of sections to be skipped. This must be a
     *            non-negative integer.
     *
     * @return JpegContent the content found, or null if there is no
     *         content available.
     */
    public function getSection($marker, $skip = 0)
    {
        foreach ($this->sections as $s) {
            if ($s[0] == $marker) {
                if ($skip > 0) {
                    $skip --;
                } else {
                    return $s[1];
                }
            }
        }

        return null;
    }

    /**
     * Get all sections.
     *
     * @return array an array of ({@link JpegMarker}, {@link
     *         JpegContent}) pairs. Each pair is an array with the {@link
     *         JpegMarker} as the first element and the {@link
     *         JpegContent} as the second element, so the return type is an
     *         array of arrays.
     *
     *         So to loop through all the sections in a given JPEG image do
     *         this:
     *
     *         <code>
     *         foreach ($jpeg->getSections() as $section) {
     *         $marker = $section[0];
     *         $content = $section[1];
     *         // Use $marker and $content here.
     *         }
     *         </code>
     *
     *         instead of this:
     *
     *         <code>
     *         foreach ($jpeg->getSections() as $marker => $content) {
     *         // Does not work the way you would think...
     *         }
     *         </code>
     *
     *         The problem is that there could be several sections with the same
     *         marker, and thus a simple associative array does not suffice.
     */
    public function getSections()
    {
        return $this->sections;
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

        foreach ($this->sections as $section) {
            $m = $section[0];
            $c = $section[1];

            /* Write the marker */
            $bytes .= "\xFF" . JpegMarker::getBytes($m);
            /* Skip over empty markers. */
            if ($m == JpegMarker::SOI || $m == JpegMarker::EOI) {
                continue;
            }

            $data = $c->getBytes();
            $size = strlen($data) + 2;

            $bytes .= ConvertBytes::fromShort($size, ConvertBytes::BIG_ENDIAN);
            $bytes .= $data;

            /* In case of SOS, we need to write the JPEG data. */
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
     * Make a string representation of this JPEG object.
     *
     * This is mainly usefull for debugging. It will show the structure
     * of the image, and its sections.
     *
     * @return string debugging information about this JPEG object.
     */
    public function __toString()
    {
        $str = ExifEye::tra("Dumping JPEG data...\n");
        $count_sections = count($this->sections);
        for ($i = 0; $i < $count_sections; $i ++) {
            $m = $this->sections[$i][0];
            $c = $this->sections[$i][1];
            $str .= ExifEye::fmt("Section %d (marker 0x%02X - %s):\n", $i, $m, JpegMarker::getName($m));
            $str .= ExifEye::fmt("  Description: %s\n", JpegMarker::getDescription($m));

            if ($m == JpegMarker::SOI || $m == JpegMarker::EOI) {
                continue;
            }

            if ($c instanceof Exif) {
                $str .= ExifEye::tra("  Content    : Exif data\n");
                $str .= $c->__toString() . "\n";
            } elseif ($c instanceof JpegComment) {
                $str .= ExifEye::fmt("  Content    : %s\n", $c->getValue());
            } else {
                $str .= ExifEye::tra("  Content    : Unknown\n");
            }
        }

        return $str;
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
    public static function isValid(DataWindow $d)
    {
        /* JPEG data is stored in big-endian format. */
        $d->setByteOrder(ConvertBytes::BIG_ENDIAN);

        $i = self::getJpgSectionStart($d);

        return $d->getByte($i) == JpegMarker::SOI;
    }
}
