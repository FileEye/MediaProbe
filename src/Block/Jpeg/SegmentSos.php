<?php

namespace FileEye\MediaProbe\Block\Jpeg;

/**
 * Class representing a JPEG SOS segment.
 */
class SegmentSos extends SegmentBase
{
    /**
     * JPEG EOI marker.
     */
    const JPEG_EOI = 0xD9;
}
