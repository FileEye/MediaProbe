<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Exception\UnexpectedFormatException;
use ExifEye\core\Format;
use lsolesen\pel\PelSpec;

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
     * Make a new entry for holding a user comment.
     *
     * @param
     *            string the new user comment.
     *
     * @param
     *            string the encoding of the comment. This should be either
     *            'ASCII', 'JIS', 'Unicode', or the empty string specifying an
     *            undefined encoding.
     */
    public function __construct($comment = '', $encoding = 'ASCII')
    {
        parent::__construct(PelSpec::getTagIdByName(PelSpec::getIfdIdByType('Exif'), 'UserComment'));
        $this->setValue($comment, $encoding);
    }

    /**
     * Creates an instance of the entry.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param array $arguments
     *            a list or arguments to be passed to the EntryBase subclass
     *            constructor.
     *
     * @return EntryBase a newly created entry, holding the data given.
     */
    public static function createInstance($ifd_id, $tag_id, $arguments)
    {
        if (empty($arguments)) {
            $instance = new static();
        } else {
            $instance = new static($arguments[0], $arguments[1]);
        }
        $instance->setIfdType($ifd_id);
        return $instance;
    }

    /**
     * Get arguments for the instance constructor from file data.
     *
     * @param int $ifd_id
     *            the IFD id.
     * @param int $tag_id
     *            the TAG id.
     * @param int $format
     *            the format of the entry as defined in {@link Format}.
     * @param int $components
     *            the components in the entry.
     * @param DataWindow $data
     *            the data which will be used to construct the entry.
     * @param int $data_offset
     *            the offset of the main DataWindow where data is stored.
     *
     * @return array a list or arguments to be passed to the EntryBase subclass
     *            constructor.
     */
    public static function getInstanceArgumentsFromData($ifd_id, $tag_id, $format, $components, DataWindow $data, $data_offset)
    {
        if ($format != Format::UNDEFINED) {
            throw new UnexpectedFormatException($ifd_id, $tag_id, $format, Format::UNDEFINED);
        }
        if ($data->getSize() < 8) {
            return [];
        } else {
            return [$data->getBytes(8), rtrim($data->getBytes(0, 8))];
        }
    }

    /**
     * Set the user comment.
     *
     * @param
     *            string the new user comment.
     *
     * @param
     *            string the encoding of the comment. This should be either
     *            'ASCII', 'JIS', 'Unicode', or the empty string specifying an
     *            unknown encoding.
     */
    public function setValue($comment = '', $encoding = 'ASCII')
    {
        $this->comment = $comment;
        $this->encoding = $encoding;
        parent::setValue(str_pad($encoding, 8, chr(0)) . $comment);
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
    public function getText($brief = false)
    {
        return $this->comment;
    }
}
