<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Model\BlockBase;

/**
 * Abstract class for JPEG data segments.
 */
abstract class JpegSegmentBase extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern(): string
    {
        return '/{DOMNode}:{name}:{id}';
    }
}
