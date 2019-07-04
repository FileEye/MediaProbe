<?php

namespace FileEye\ImageInfo\core\Entry;

use FileEye\ImageInfo\core\Block\IfdItem;
use FileEye\ImageInfo\core\Data\DataElement;
use FileEye\ImageInfo\core\Entry\Core\Undefined;
use FileEye\ImageInfo\core\Utility\ConvertBytes;

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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [], IfdItem $ifd_item = null)
    {
        $this->setValue([$data_element->getBytes($ifd_item->getDataOffset(), $ifd_item->getComponents()), $ifd_item->getDataOffset()]);
        return $this;
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
}
