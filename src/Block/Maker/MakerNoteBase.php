<?php

namespace FileEye\MediaProbe\Block\Maker;

use FileEye\MediaProbe\Block\Media\Tiff;
use FileEye\MediaProbe\Block\Media\Tiff\Ifd;
use FileEye\MediaProbe\Block\Media\Tiff\IfdEntryValueObject;
use FileEye\MediaProbe\Model\RootBlockBase;

/**
 * Base class for EXIF maker note handlers.
 */
class MakerNoteBase extends Ifd
{
    public function __construct(
        IfdEntryValueObject $ifdEntry,
        Tiff|Ifd|RootBlockBase $parent,
        protected readonly int $dataDisplacement = 0,
    ) {
        parent::__construct(
            ifdEntry: $ifdEntry,
            parent: $parent,
        );
    }
}
