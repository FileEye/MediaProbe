<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Abstract class for JPEG data segments.
 */
abstract class JpegSegmentBase extends BlockBase
{
    /**
     * Construct a new JPEG segment object.
     */
    public function __construct(Collection $collection, Jpeg $jpeg, JpegSegmentBase $reference_jpeg_segment = null)
    {
        parent::__construct($collection, $jpeg, $reference_jpeg_segment);
    }

    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern()
    {
        return '/{DOMNode}:{name}:{id}';
    }
}
