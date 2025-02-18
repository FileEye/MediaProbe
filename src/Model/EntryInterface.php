<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\MediaProbeException;

/**
 * Interface for Entry objects.
 */
interface EntryInterface extends ElementInterface
{
    /**
     * Returns the format of this entry.
     */
    public function getFormat(): int;

    /**
     * Returns the value of this entry.
     *
     * For a formatted version of the value, use ::toString() instead.
     *
     * @param array $options
     *   (Optional) an array of options to format the value.
     *
     * @throws MediaProbeException
     *   When the element does not support returning a value.
     */
    public function getValue(array $options = []): mixed;

    /**
     * Returns the number of components of this entry.
     */
    public function getComponents(): int;

    public function getOutputFormat(): int;

    public function setDataElement(DataElement $dataElement): void;

    public function getDataElement(): DataElement;
}
