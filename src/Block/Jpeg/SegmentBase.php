<?php

namespace FileEye\MediaProbe\Block\Jpeg;

use FileEye\MediaProbe\Model\BlockBase;

/**
 * Abstract class for JPEG data segments.
 */
abstract class SegmentBase extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern(): string
    {
        return '/{DOMNode}:{name}:{id}';
    }
}
