<?php

namespace FileEye\MediaProbe\Data;

use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\ConvertBytes;
use Psr\Log\LoggerInterface;

/**
 * A data window object.
 */
class DataWindow extends DataElement
{
    /**
     * The underlying data element for this window.
     *
     * @var DataElement
     */
    protected $dataElement;

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
    public function __construct(DataElement $data_element, int $start = 0, ?int $size = null, ?LoggerInterface $logger = null)
    {
        if ($start < 0) {
            throw new DataException('Invalid negative offset for DataWindow');
        }

        if ($data_element instanceof DataWindow) {
            $this->dataElement = $data_element->getDataElement();
            $this->start = $data_element->getStart() + $start;
        } else {
            $this->dataElement = $data_element;
            $this->start = $start;
        }

        $this->size = $size ?? ($data_element->getSize() - $start);
        if ($this->size > ($data_element->getSize() - $start)) {
            throw new DataException('Excessive size for DataWindow');
        }

        $this->order = $data_element->getByteOrder();

        $this->logger = $logger;
        if ($this->logger) {
dump('xx');
            $this->logger->debug('DataWindow, start @{start}, size {size}', [
                'start' => $this->getStart(),
                'size' => $this->getSize(),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDataElement(): DataElement
    {
        return $this->dataElement;
    }

    /**
     * {@inheritdoc}
     */
    public function getBytes(int $start = 0, ?int $size = null): string
    {
        if ($start < 0) {
            $start += $this->size;
        }
        $this->validateOffset($start);

        $size = $size ?? ($this->size - $start);
        if ($size <= 0) {
            $size += $this->size - $start;
        }
        $this->validateOffset($start + $size - 1);

        return $this->dataElement->getBytes($this->getStart() + $start, $size);
    }

    // xx
    public function logInfo(LoggerInterface $logger)
    {
        $logger->debug('DataWindow - [{start}, {size}]', [
            'start' => $this->getStart(),
            'size' => $this->getSize(),
        ]);
    }

}
