<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class for JPEG raw data.
 */
class RawData extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'rawData';

    /**
     * The data length.
     */
    protected $components;

    /**
     * Construct a new RawData object.
     */
    public function __construct($type, BlockBase $parent, BlockBase $reference = null)
    {
        parent::__construct($type, $parent, $reference);
        $this->debug('Raw data');
    }

    /**
     * Returns the data length.
     *
     * @return int
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        $this->components = $size;
        $entry = new Undefined($this, [$data_element->getBytes($offset, $this->components)]);
        $entry->debug("{text}", ['text' => $entry->toString()]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN)
    {
        return $this->getElement("entry")->toBytes();
    }
}
