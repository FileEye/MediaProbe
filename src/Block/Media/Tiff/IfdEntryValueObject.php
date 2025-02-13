<?php

namespace FileEye\MediaProbe\Block\Media\Tiff;

use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataFormat;

/**
 * A value object representing an IFD entry.
 */
class IfdEntryValueObject
{
    /**
     * True if the data of the entry is an offset to the actual entry data; False if the data is
     * the value entry itself.
     */
    public readonly bool $isOffset;

    /**
     * @param CollectionInterface $collection
     *   The MediaProbe collection of this IFD entry.
     * @param int $dataFormat
     *   The data format of the IFD entry.
     * @param int $countOfComponents
     *   The number of components of the IFD entry.
     * @param int $data
     *   The data of the IFD entry.
     * @param int $sequence
     *   The sequence of the IFD entry on the IFD.
     */
    public function __construct(
        public readonly CollectionInterface $collection,
        public readonly int $dataFormat,
        public readonly int $countOfComponents,
        public readonly int $data,
        public readonly int $sequence = 0,
    ) {
        $this->isOffset = $this->size() > 4;
    }

    public function size(): int
    {
        return DataFormat::getSize($this->dataFormat) * $this->countOfComponents;
    }
}
