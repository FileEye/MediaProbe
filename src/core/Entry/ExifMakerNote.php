<?php

namespace ExifEye\core\Entry;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Entry\Core\Undefined;
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
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $data_offset = $options['data_offset'];
        $components = $options['components'];

        $this->setValue([$data_element->getBytes($data_offset, $components), $data_offset]);

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
