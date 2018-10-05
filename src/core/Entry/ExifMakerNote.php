<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Block\BlockBase;
use ExifEye\core\Block\Ifd;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class used to hold data for MakerNote tags.
 */
class ExifMakerNote extends Undefined
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'MakerNote';

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData(BlockBase $parent_block, $format, $components, DataWindow $data_window, $data_offset)
    {
        return [$data_window->getBytes($data_offset, $components), $data_offset];
    }

    /**
     * Set the data of this undefined entry.
     *
     * @param array $data
     *            key 0 - the maker note data.
     *            key 1 - the offset of the MakerNote IFD vs the main
     *            DataWindow.
     */
    public function setValue(array $data)
    {
        parent::setValue($data);

        $this->value = $data;
        $this->components = strlen($data[0]);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        return $this->value[0];
    }

    /**
     * Converts a maker note tag to an IFD structure for dumping.
     *
     * @param DataWindow $d
     *            the data window that will provide the data.
     * @param Ifd $ifd
     *            the root Ifd object.
     */
    public static function tagToIfd(DataWindow $d, Ifd $ifd)
    {
        // Get the Exif subIfd if existing.
        if (!$exif_ifd = $ifd->getElement("ifd[@name='Exif']")) {
            return;
        }

        // Get MakerNote tag from Exif IFD.
        if (!$maker_note_tag = $exif_ifd->getElement("tag[@name='MakerNote']")) {
            return;
        }

        // Get Make tag from IFD0.
        if (!$make_tag = $ifd->getElement("tag[@name='Make']")) {
            return;
        }

        // Get Model tag from IFD0.
        $model_tag = $ifd->getElement("tag[@name='Model']");
        $model = $model_tag && $model_tag->getElement("entry") ? $model_tag->getElement("entry")->getValue() : 'na';  // xx modelTag should always have an entry, so the check is irrelevant but a test fails

        // Get maker note IFD id.
        if (!$maker_note_ifd_type = Spec::getMakerNoteIfdType($make_tag->getElement("entry")->getValue(), $model)) {
            return;
        }

        // Load maker note into IFD.
        $ifd_class = Spec::getTypePropertyValue($maker_note_ifd_type, 'class');
        $maker_note_ifd_name = Spec::getTypePropertyValue($maker_note_ifd_type, 'name');
        $ifd = new $ifd_class($maker_note_ifd_type, $maker_note_ifd_name, $exif_ifd, $maker_note_tag->getAttribute('id'), $maker_note_tag);
        $ifd->loadFromData($d, $maker_note_tag->getElement("entry")->getValue()[1], null, [
            'format' => $maker_note_tag->getFormat(),
            'components' => $maker_note_tag->getComponents(),
        ]);

        // Remove the MakerNote tag that has been converted to IFD.
        $exif_ifd->removeElement("tag[@name='MakerNote']");
    }
}
