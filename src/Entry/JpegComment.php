<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\JpegContent;

/**
 * Class representing JPEG comments.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class JpegComment extends JpegContent
{
    /**
     * The comment.
     *
     * @var string
     */
    private $comment = '';

    /**
     * Construct a new JPEG comment.
     *
     * The new comment will contain the string given.
     *
     * @param string $comment
     */
    public function __construct($comment = '')
    {
        $this->comment = $comment;
    }

    /**
     * Load and parse data.
     *
     * This will load the comment from the data window passed.
     *
     * @param DataWindow $d
     */
    public function load(DataWindow $d)
    {
        $this->comment = $d->getBytes();
    }

    /**
     * Update the value with a new comment.
     *
     * Any old comment will be overwritten.
     *
     * @param string $comment
     *            the new comment.
     */
    public function setValue($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the comment.
     *
     * @return string the comment.
     */
    public function getValue(array $options = [])
    {
        return $this->comment;
    }

    /**
     * Turn this comment into bytes.
     *
     * @return string bytes representing this comment.
     */
    public function toBytes()
    {
        return $this->comment;
    }

    /**
     * Return a string representation of this object.
     *
     * @return string the same as {@link getValue()}.
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
