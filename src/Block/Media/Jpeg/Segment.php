<?php

namespace FileEye\MediaProbe\Block\Media\Jpeg;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Class representing a generic JPEG data segment.
 *
 * This is the default segment processor in case no specific class are defined.
 */
class Segment extends SegmentBase
{
    public function fromDataElement(DataElement $dataElement): static
    {
        $this->size = $dataElement->getSize();
        assert($this->debugInfo(['dataElement' => $dataElement]));
        // Adds the segment data as an Undefined entry.
        new Undefined($this, $dataElement);
        return $this;
    }
}
