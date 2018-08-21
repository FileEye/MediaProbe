<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

/**
 * Class for handling JPEG data.
 *
 * The {@link Jpeg} class defined here provides an abstraction for
 * dealing with a JPEG file. The file will be contain a number of
 * sections containing some {@link JpegContent content} identified
 * by a marker.
 *
 * The {@link getExif()} method is used get hold of the
 * APP1 section which stores Exif data. So if
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
     * JPEG header.
     */
    const JPEG_HEADER = "\xFF\xD8\xFF";

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
     * Constructs a Block for holding a JPEG image.
     */
    public function __construct(BlockBase $parent = null)
    {
        parent::__construct($parent);
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $this->debug('Parsing {size} bytes of JPEG data...', ['size' => $data_window->getSize()]);

        // JPEG data is stored in big-endian format.
        $data_window->setByteOrder(ConvertBytes::BIG_ENDIAN);

        // Run through the data to read the sections in the image. After each
        // section is read, the start of the data window will be moved forward,
        // and after the last section we will terminate with no data left in the
        // window.
        while ($data_window->getSize() > 0) {
            $i = $this->getJpgSectionStart($data_window);

            $marker = $data_window->getByte($i);

            if (!in_array($marker, Spec::getTypeSupportedElementIds($this->getType()))) {
                $this->error('Invalid marker found at offset {offset}: 0x{marker}', [
                    'offset' => $offset,
                    'marker' => dec2hex($marker),
                ]);
            }

            // Move window so first byte becomes first byte in this section.
            $data_window->setWindowStart($i + 1);

            $element_name = Spec::getElementName($this->getType(), $marker);

            if ($element_name === 'SOI' || $element_name === 'EOI') {
                $segment = new JpegSegment($marker, $this);
            } else {
                // Read the length of the section. The length includes the two
                // bytes used to store the length.
                $len = $data_window->getShort(0) - 2;

                // Skip past the length.
                $data_window->setWindowStart(2);

                if ($element_name === 'APP1') {
                    $app1_segment = new JpegSegment($marker, $this);
                    if ($app1_segment->loadFromData($data_window->getClone(0, $len)) === false) {
                        // We store the data as normal JPEG content if it could
                        // not be parsed as Exif data.
                        new JpegContent($app1_segment, $data_window->getClone(0, $len));
                    }
                    $data_window->setWindowStart($len);
                } elseif ($element_name === 'COM') {
                    $com_segment = new JpegSegment($marker, $this);
                    $content = new JpegComment($com_segment);
                    $content->loadFromData($data_window->getClone(0, $len));
                    $data_window->setWindowStart($len);
                } else {
                    $segment = new JpegSegment($marker, $this);
                    $content = new JpegContent($segment, $data_window->getClone(0, $len));
                    /* Skip past the data. */
                    $data_window->setWindowStart($len);

                    /* In case of SOS, image data will follow. */
                    if ($element_name === 'SOS') {
                        /*
                         * Some images have some trailing (garbage?) following the
                         * EOI marker. To handle this we seek backwards until we
                         * find the EOI marker. Any trailing content is stored as
                         * a JpegContent object.
                         */

                        $length = $data_window->getSize();
                        while ($data_window->getByte($length - 2) != 0xFF || $data_window->getByte($length - 1) != Spec::getElementIdByName($this->getType(), 'EOI')) {
                            $length --;
                        }

                        $this->jpeg_data = $data_window->getClone(0, $length - 2);
                        $this->debug('JPEG data: {data}', ['data' => $this->jpeg_data->toString()]);

                        // Append the EOI.
                        $eoi_segment = new JpegSegment(Spec::getElementIdByName($this->getType(), 'EOI'), $this);

                        // Now check to see if there are any trailing data.
                        if ($length != $data_window->getSize()) {
                            $this->warning('Found trailing content after EOI: {size} bytes', [
                                'size' => $data_window->getSize() - $length,
                            ]);
                            // We don't have a proper JPEG marker for trailing
                            // garbage, so we just use 0x00...
                            $trail_segment = new JpegSegment(0x00, $this);
                            new JpegContent($trail_segment, $data_window->getClone($length));
                        }

                        // Done with the loop.
                        break;
                    }
                }
            }
        }
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
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        $bytes = '';

        foreach ($this->getMultipleElements("jpegSegment") as $segment) {
            $m = $segment->getAttribute('id');

            // Add the marker.
            $bytes .= "\xFF";
            $bytes .= chr($m);

            // Skip over empty markers.
            if ($m == Spec::getElementIdByName($this->getType(), 'SOI') || $m == Spec::getElementIdByName($this->getType(), 'EOI')) {
                continue;
            }

            // Add the segment bytes.
            $data = $segment->toBytes();
            $size = strlen($data) + 2;
            $bytes .= ConvertBytes::fromShort($size, ConvertBytes::BIG_ENDIAN);
            $bytes .= $data;

            // In case of SOS, we need to write the JPEG data.
            if ($m == Spec::getElementIdByName($this->getType(), 'SOS')) {
                $bytes .= $this->jpeg_data->getBytes();
            }
        }

        return $bytes;
    }

    /**
     * JPEG sections start with 0xFF. The first byte that is not
     * 0xFF is a marker (hopefully).
     *
     * @param DataWindow $d
     *
     * @return integer
     */
    protected function getJpgSectionStart($d)
    {
        for ($i = 0; $i < 7; $i ++) {
            if ($d->getByte($i) != 0xFF) {
                 break;
            }
        }
        return $i;
    }

    /**
     * Returns the MIME type of the image.
     *
     * @returns string
     */
    public function getMimeType()
    {
        return 'image/jpeg';
    }
}
