<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Exception\UnexpectedFormatException;
use ExifEye\core\Format;
use ExifEye\core\Spec;

/**
 * Class for a user comment.
 *
 * This class is used to hold user comments, which can come in several
 * different character encodings. The Exif standard specifies a
 * certain format of the {@link PelTag::USER_COMMENT user comment
 * tag}, and this class will make sure that the format is kept.
 *
 * The most basic use of this class simply stores an ASCII encoded
 * string for later retrieval using {@link getValue}:
 *
 * <code>
 * $entry = new UserComment('An ASCII string');
 * echo $entry->getValue();
 * </code>
 *
 * The string can be encoded with a different encoding, and if so, the
 * encoding must be given using the second argument. The Exif
 * standard specifies three known encodings: 'ASCII', 'JIS', and
 * 'Unicode'. If the user comment is encoded using a character
 * encoding different from the tree known encodings, then the empty
 * string should be passed as encoding, thereby specifying that the
 * encoding is undefined.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class UserComment extends Undefined
{
    /**
     * The user comment.
     *
     * @var string
     */
    private $comment;

    /**
     * The encoding.
     *
     * This should be one of 'ASCII', 'JIS', 'Unicode', or ''.
     *
     * @var string
     */
    private $encoding;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($ifd_id, $tag_id, $format, $components, DataWindow $data_window, $data_offset)
    {
        if ($format != Format::UNDEFINED) {
            throw new UnexpectedFormatException($ifd_id, $tag_id, $format, Format::UNDEFINED);
        }
        if ($components < 8) {
            return [];
        } else {
            return [$data_window->getBytes($data_offset + 8, $components - 8), rtrim($data_window->getBytes($data_offset, 8))];
        }
    }

    /**
     * Set the user comment.
     *
     * @param array $data
     *            key 0 - holds the comment.
     *            key 1 - holds a string with the encoding of the comment. This
     *            should be either 'ASCII', 'JIS', 'Unicode', or the empty
     *            string specifying an unknown encoding.
     */
    public function setValue(array $data)
    {
        $this->comment = isset($data[0]) ? $data[0] : '';
        $this->encoding = isset($data[1]) ? $data[1] : 'ASCII';
        parent::setValue([str_pad($this->encoding, 8, chr(0)) . $this->comment]);
    }

    /**
     * Returns the user comment.
     *
     * The comment is returned with the same character encoding as when
     * it was set using {@link setValue} or {@link __construct the
     * constructor}.
     *
     * @return string the user comment.
     */
    public function getValue()
    {
        return $this->comment;
    }

    /**
     * Returns the encoding.
     *
     * @return string the encoding of the user comment.
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Returns the user comment.
     *
     * @return string the user comment.
     */
    public function getText()
    {
        return $this->comment;
    }
}
