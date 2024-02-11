<?php

namespace FileEye\MediaProbe\Block\Tiff;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for handling TIFF data.
 */
class Tiff extends BlockBase
{
    /**
     * TIFF header.
     *
     * This must follow after the two bytes indicating the byte order.
     */
    const TIFF_HEADER = 0x002A;

    /**
     * The byte order of this TIFF segment.
     */
    protected int $byteOrder;

    public function setByteOrder(int $byteOrder): self
    {
        $this->byteOrder = $byteOrder;
        return $this;
    }

    public function getByteOrder(): int
    {
        return $this->byteOrder;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($order = ConvertBytes::LITTLE_ENDIAN, $offset = 0): string
    {
        // TIFF byte order. 2 bytes running.
        if ($this->getByteOrder() == ConvertBytes::LITTLE_ENDIAN) {
            $bytes = 'II';
        } else {
            $bytes = 'MM';
        }

        // TIFF magic number --- fixed value. 4 bytes running.
        $bytes .= ConvertBytes::fromShort(self::TIFF_HEADER, $this->getByteOrder());

        // Check if we have a image scan before first IFD.
        $scan = $this->getElement("rawData");
        $ifd0 = $this->getElement("ifd[@name='IFD0']");
        $ifd1 = $this->getElement("ifd[@name='IFD1']");

        // IFD0 offset. Normally we start IFD0 at an offset of 8 bytes (2
        // bytes for byte order, another 2 bytes for the TIFF header, and 4
        // bytes for the IFD0 offset itself). If raw data is present, this
        // will come before IFD0. 8 bytes running.
        if (!$ifd0) {
            $bytes .= ConvertBytes::fromLong(0, $this->getByteOrder());
        } else {
            if ($scan) {
                $bytes .= ConvertBytes::fromLong(8 + strlen($scan->toBytes()), $this->getByteOrder());
            } else {
                $bytes .= ConvertBytes::fromLong(8, $this->getByteOrder());
            }
        }

        // Add image scan if needed. 8+scan bytes running.
        if ($scan) {
            $bytes .= $scan->toBytes();
        }

        // Dumps IFD0 and IFD1.
        if ($ifd0) {
            $bytes .= $ifd0->toBytes($this->getByteOrder(), strlen($bytes), (bool) $ifd1);
        }
        if ($ifd1) {
            $bytes .= $ifd1->toBytes($this->getByteOrder(), strlen($bytes), false);
        }

        return $bytes;
    }

    public function collectInfo(array $context = []): array
    {
        $info = [];

        $parentInfo = parent::collectInfo($context);

        $info['_msg'] = $parentInfo['_msg'] . ' byte order {byteOrder} ({byteOrderDescription})';
        $info['byteOrder'] = $this->getByteOrder() === ConvertBytes::LITTLE_ENDIAN ? 'II' : 'MM';
        $info['byteOrderDescription'] = $this->getByteOrder() === ConvertBytes::LITTLE_ENDIAN ? 'Little Endian' : 'Big Endian';

        return array_merge($parentInfo, $info);
    }
}
