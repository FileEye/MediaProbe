<?php

namespace FileEye\MediaProbe\Block\Media\Jpeg;

use FileEye\MediaProbe\Block\Media\Jpeg;
use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\BlockBase;

/**
 * Abstract class for JPEG data segments.
 */
abstract class SegmentBase extends BlockBase
{
    public function __construct(
        public readonly CollectionInterface $collection,
        Jpeg $parent,
    ) {
        parent::__construct(
            definition: new ItemDefinition($this->collection),
            parent: $parent,
            graft: false,
        );
    }

    protected function getContextPathSegmentPattern(): string
    {
        return '/{DOMNode}:{name}:{id}';
    }
}
