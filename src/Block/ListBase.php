<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Model\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Utility\ConvertBytes;

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
