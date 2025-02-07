<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\ItemDefinition;

/**
 * Interface for Block objects.
 */
interface BlockInterface extends ElementInterface
{
    /**
     * Gets the Definition of this Block.
     */
    public function getDefinition(): ItemDefinition;

    /**
     * Gets the Collection of this Block.
     */
    public function getCollection(): CollectionInterface;

    public function parseData(DataElement $dataElement, int $start = 0, ?int $size = null): void;

    public function fromDataElement(DataElement $dataElement): BlockInterface;
}
