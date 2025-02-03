<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Model\BlockBase;

/**
 * Abstract class representing a generic table of data.
 *
 * Its extensions could be IFDs (Image File Directory), indexes, maps, etc.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as an ancestor to define common methods to its class extension
 * implementations.
 */
abstract class ListBase extends BlockBase
{
    /**
     * The amount of components in the list.
     */
    protected int $components;

    /**
     * {@inheritdoc}
     */
    public function getComponents(): int
    {
        return count($this->getMultipleElements('*[not(self::rawData)]'));
    }

    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern(): string
    {
        return '/{DOMNode}:{name}:{id}';
    }
}
