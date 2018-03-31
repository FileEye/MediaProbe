<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Format;

/**
 * Class for holding a plain ASCII string.
 *
 * The classes defined here are to be used for Exif entries holding
 * ASCII strings, such as {@link PelTag::MAKE}, {@link
 * PelTag::SOFTWARE}, and {@link PelTag::DATE_TIME}. For
 * entries holding normal textual ASCII strings the class {@link
 * Ascii} should be used, but for entries holding
 * timestamps the class {@link Time} would be more
 * convenient instead. Copyright information is handled by the {@link
 * Copyright} class.
 *
 * This class can hold a single ASCII string, and it will be used as in
 * <code>
 * $entry = $ifd->getEntry(PelTag::IMAGE_DESCRIPTION);
 * print($entry->getValue());
 * $entry->setValue('This is my image. I like it.');
 * </code>
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class Ascii extends EntryBase
{
    /**
     * {@inheritdoc}
     */
    protected $format = Format::ASCII;

    /**
     * The string hold by this entry.
     *
     * This is the string that was given to the {@link __construct
     * constructor} or later to {@link setValue}, without any final NULL
     * character.
     *
     * @var string
     */
    private $str;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromData($ifd_id, $tag_id, $format, $components, $data)
    {
        // cut off string after the first nul byte
        $canonicalString = strstr($data_window->getBytes(0), "\0", true);
        if ($canonicalString !== false) {
            return [$canonicalString];
        } else {
            // TODO throw exception if string isn't nul-terminated
            return [$data_window->getBytes(0)];
        }
    }

    /**
     * Give the entry a new ASCII value.
     *
     * This will overwrite the previous value. The value can be retrieved later
     * with the {@link getValue} method.
     *
     * @param array $data
     *            the new value of the entry. This should be given
     *            without any trailing NULL character. The string must be plain
     *            7-bit ASCII, the string should contain no high bytes.
     *
     * @todo Implement check for high bytes?
     */
    public function setValue(array $data)
    {
        $str = isset($data[0]) ? $data[0] : '';
        $this->components = strlen($str) + 1;
        $this->str = $str;
        $this->bytes = $str . chr(0x00);
    }

    /**
     * Return the ASCII string of the entry.
     *
     * @return string the string held, without any final NULL character.
     *         The string will be the same as the one given to {@link setValue}
     *         or to the {@link __construct constructor}.
     */
    public function getValue()
    {
        return $this->str;
    }

    /**
     * Return the ASCII string of the entry.
     *
     * This methods returns the same as {@link getValue}.
     *
     * @param
     *            boolean not used with ASCII entries.
     *
     * @return string the string held, without any final NULL character.
     *         The string will be the same as the one given to {@link setValue}
     *         or to the {@link __construct constructor}.
     */
    public function getText($brief = false)
    {
        return $this->str;
    }
}
