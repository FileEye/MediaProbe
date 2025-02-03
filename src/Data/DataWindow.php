<?php

namespace FileEye\MediaProbe\Data;

/**
 * An object opening a window on an underlying DataElement
 */
final class DataWindow extends DataElement
{
    /**
     * The underlying data element for this window.
     *
     * @var DataElement
     */
    private $underlyingDataElement;

    /**
     * Construct a new data window with the data supplied.
     *
     * @param DataElement $dataElement
     *   The underlying DataElement.
     * @param int $offset
     *   The offset at the underlying DataElement where the window starts.
     * @param int|null $size
     *   The size of the data window. If unspecified, will be determined to the remaining size of the underlying
     *   DataElement after the offset.
     */
    public function __construct(DataElement $dataElement, int $offset = 0, ?int $size = null)
    {
        if ($offset < 0) {
            throw new DataException('Invalid negative offset for DataWindow');
        }

        if ($dataElement instanceof DataWindow) {
            $this->underlyingDataElement = $dataElement->underlyingDataElement;
            $this->start = $dataElement->getStart() + $offset;
        } else {
            $this->underlyingDataElement = $dataElement;
            $this->start = $offset;
        }

        $this->size = $size ?? ($dataElement->getSize() - $offset);
        if ($this->size < 1) {
            throw new DataException('Zero or negative size for DataWindow');
        }
        if ($this->size > ($dataElement->getSize() - $offset)) {
            throw new DataException('DataWindow (offset: %d size: %d) out of bounds of DataElement (size: %d)', $offset, $size, $dataElement->getSize());
        }

        $this->order = $dataElement->getByteOrder();
    }

    /**
     * {@inheritdoc}
     */
    public function getBytes(int $offset = 0, ?int $size = null): string
    {
        if ($offset < 0) {
            $offset += $this->size;
        }
        $this->validateOffset($offset);

        $size = $size ?? ($this->size - $offset);
        if ($size <= 0) {
            $size += $this->size - $offset;
        }
        $this->validateOffset($offset + $size - 1);

        return $this->underlyingDataElement->getBytes($this->getStart() + $offset, $size);
    }
}
