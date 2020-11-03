<?php

namespace FileEye\MediaProbe\Block;

/**
 * Abstract class for JPEG data segments.
 */
abstract class JpegSegmentBase extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected function getContextPathSegmentPattern()
    {
        return '/{DOMNode}:{name}:{id}';
    }
}
