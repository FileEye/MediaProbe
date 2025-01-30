<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Data\DataElement;

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
     * Returns the number of components of this entry.
     */
    public function getComponents(): int;

    public function getOutputFormat(): int;

    public function setDataElement(DataElement $dataElement): void;

    public function getDataElement(): DataElement;
}
