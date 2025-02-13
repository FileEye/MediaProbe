<?php

namespace FileEye\MediaProbe\Block\Maker;

use FileEye\MediaProbe\Block\Media\Tiff;
use FileEye\MediaProbe\Block\Tiff\Ifd;
use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\RootBlockBase;

/**
 * Base class for EXIF maker note handlers.
 */
class MakerNoteBase extends Ifd
{
    public function __construct(
        CollectionInterface $collection,
        ItemDefinition $definition,
        Tiff|Ifd|RootBlockBase $parent,
        protected readonly int $dataDisplacement = 0,
    ) {
        parent::__construct(
            collection: $collection,
            definition: $definition,
            parent: $parent,
        );
    }
}
