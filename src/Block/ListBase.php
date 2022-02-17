<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
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
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return count($this->getMultipleElements('*[not(self::rawData)]'));
    }

    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern()
    {
        return '/{DOMNode}:{name}:{id}';
    }
}
