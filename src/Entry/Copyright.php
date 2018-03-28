<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Exception\UnexpectedFormatException;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Format;
use ExifEye\core\Spec;

/**
 * Class for holding copyright information.
 *
 * The Exif standard specifies a certain format for copyright
 * information where the one {@link PelTag::COPYRIGHT copyright
 * tag} holds both the photographer and editor copyrights, separated
 * by a NULL character.
 *
 * This class is used to manipulate that tag so that the format is
 * kept to the standard. A common use would be to add a new copyright
 * tag to an image, since most cameras do not add this tag themselves.
 * This would be done like this:
 *
 * <code>
 * $entry = new Copyright('Copyright, Martin Geisler, 2004');
 * $ifd0->addEntry($entry);
 * </code>
 *
 * Here we only set the photographer copyright, use the optional
 * second argument to specify the editor copyright. If there is only
 * an editor copyright, then let the first argument be the empty
 * string.
 *
 * @author Martin Geisler <mgeisler@users.sourceforge.net>
 */
class Copyright extends Ascii
{
    /**
     * The photographer copyright.
     *
     * @var string
     */
    private $photographer;

    /**
     * The editor copyright.
     *
     * @var string
     */
    private $editor;

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
        if ($format != Format::ASCII) {
            throw new UnexpectedFormatException($ifd_id, $tag_id, $format, Format::ASCII);
        }
        $v = explode("\0", trim($data->getBytes(), ' '));
        if (! isset($v[1])) {
            ExifEye::maybeThrow(new ExifEyeException('Invalid copyright: %s', $data->getBytes()));
            // when not in strict mode, set empty copyright and continue
            $v[1] = '';
        }
        return [$v[0], $v[1]];
    }

    /**
     * Update the copyright information.
     *
     * @param array $data
     *            key 0 - the photographer copyright. Use the empty string if
     *            there is no photographer copyright.
     *            key 1 - the editor copyright. Use the empty string if there
     *            is no editor copyright.
     */
    public function setValue(array $data)
    {
        $this->photographer = isset($data[0]) ? $data[0] : '';
        $this->editor = isset($data[1]) ? $data[1] : '';

        if ($this->photographer == '' && $this->editor != '') {
            $this->photographer = ' ';
        }

        if ($this->editor == '') {
            parent::setValue([$this->photographer]);
        } else {
            parent::setValue([$this->photographer . chr(0x00) . $this->editor]);
        }
    }

    /**
     * Retrive the copyright information.
     *
     * The strings returned will be the same as the one used previously
     * with either {@link __construct the constructor} or with {@link
     * setValue}.
     *
     * @return array an array with two strings, the photographer and
     *         editor copyrights. The two fields will be returned in that
     *         order, so that the first array index will be the photographer
     *         copyright, and the second will be the editor copyright.
     */
    public function getValue()
    {
        return [
            $this->photographer,
            $this->editor
        ];
    }

    /**
     * Return a text string with the copyright information.
     *
     * The photographer and editor copyright fields will be returned
     * with a '-' in between if both copyright fields are present,
     * otherwise only one of them will be returned.
     *
     * @param
     *            boolean if false, then the strings '(Photographer)' and
     *            '(Editor)' will be appended to the photographer and editor
     *            copyright fields (if present), otherwise the fields will be
     *            returned as is.
     *
     * @return string the copyright information in a string.
     */
    public function getText($brief = false)
    {
        if ($brief) {
            $p = '';
            $e = '';
        } else {
            $p = ' ' . ExifEye::tra('(Photographer)');
            $e = ' ' . ExifEye::tra('(Editor)');
        }

        if ($this->photographer != '' && $this->editor != '') {
            return $this->photographer . $p . ' - ' . $this->editor . $e;
        }

        if ($this->photographer != '') {
            return $this->photographer . $p;
        }

        if ($this->editor != '') {
            return $this->editor . $e;
        }

        return '';
    }
}
