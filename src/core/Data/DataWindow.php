<?php

namespace ExifEye\core\Data;

use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;

/**
 * A data window object.
 */
class DataWindow extends DataElement
{
    /**
     * Construct a new data window with the data supplied.
     *
     * @param mixed $data
     *            the data that this window will contain. This can
     *            either be given as a string (interpreted litteraly as a sequence
     *            of bytes) or a PHP image resource handle. The data will be copied
     *            into the new data window.
     *
     * @param boolean $endianess
     *            the initial byte order of the window. This must
     *            be either {@link ConvertBytes::LITTLE_ENDIAN} or {@link
     *            ConvertBytes::BIG_ENDIAN}. This will be used when integers are
     *            read from the data, and it can be changed later with {@link
     *            setByteOrder()}.
     */
    public function __construct(DataElement $data_element, $start, $size, $byte_order = ConvertBytes::BIG_ENDIAN, $caller = null)
    {
        $this->dataElement = $data_element;
        $this->start = $start;
        $this->size = $size;
        $this->order = $byte_order;
        if ($caller) {
            $caller->debug('Data Window @ [{start}-{end}] [0x{hstart}-0x{hend}], {size} bytes, order: {order} ...', [
                'start' => $this->getStart(),
                'end' => $this->getStart() + $size - 1,
                'hstart' => strtoupper(dechex($this->getStart())),
                'hend' => strtoupper(dechex($this->getStart() + $size - 1)),
                'size' => $size,
                'order' => $byte_order,
            ]);
        }
    }
}
