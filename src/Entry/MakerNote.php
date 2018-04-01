<?php

namespace ExifEye\core\Entry;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Spec;
use ExifEye\core\Block\Ifd;

/**
 * Class used to hold data for MakerNote tags.
 */
class MakerNote extends Undefined
{
    /**
     * The offset of the MakerNote IFD vs the main DataWindow.
     *
     * @var int
     */
    protected $dataOffset;

    /**
     * {@inheritdoc}
     */
    public static function getInstanceArgumentsFromTagData($format, $components, DataWindow $data_window, $data_offset)
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
        parent::setValue([$data[0]]);
        $this->setDataOffset($data[1]);
    }

    /**
     * Set the offset of the MakerNote IFD vs the main DataWindow.
     *
     * @param int $data_offset
     *            the offset of the main DataWindow where data is stored.
     */
    public function setDataOffset($data_offset)
    {
        $this->dataOffset = $data_offset;
    }

    /**
     * Get the offset of the MakerNote IFD vs the main DataWindow.
     *
     * @return int
     */
    public function getDataOffset()
    {
        return $this->dataOffset;
    }

    /**
     * {@inheritdoc}
     */
    public function getText($short = false)
    {
        return $this->components . ' bytes unknown MakerNote data';
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
        if (!$exif_ifd = $ifd->getSubIfd(Spec::getIfdIdByType('Exif'))) {
            return;
        }

        // Get MakerNotes from Exif IFD.
        if (!$maker_note_tag = $exif_ifd->getTagByName('MakerNote')) {
            return;
        }

        // Get Make tag from IFD0.
        if (!$make_tag = $ifd->getTagByName('Make')) {
            return;
        }

        // Get Model tag from IFD0.
        $model_tag = $ifd->getTagByName('Model');
        $model = $model_tag ? $model_tag->getEntry()->getValue() : 'na';

        // Get maker note IFD id.
        if (!$maker_note_ifd_id = Spec::getMakerNoteIfd($make_tag->getEntry()->getValue(), $model)) {
            return;
        }

        // Load maker note into IFD.
        $ifd_class = Spec::getIfdClass($maker_note_ifd_id);
        $ifd = new $ifd_class($maker_note_ifd_id);
        $ifd->load($d, $maker_note_tag->getEntry()->getDataOffset());
        $exif_ifd->addSubIfd($ifd);
    }
}
