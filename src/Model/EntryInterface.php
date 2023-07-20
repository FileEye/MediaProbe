<?php declare(strict_types=1);

namespace FileEye\MediaProbe\Model;

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
}
