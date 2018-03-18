<?php

namespace lsolesen\pel;

class PelIfdMakerNoteApple extends PelIfd
{
    /**
     * The IFD header bytes to skip.
     *
     * @var array
     */
    protected $headerSkipBytes = 14;

    /**
     * Defines if tags in the IFD point to absolute offset.
     *
     * @var array
     */
    protected $tagsAbsoluteOffset = false;

    /**
     * The offset skip for tags.
     *
     * @var array
     */
    protected $tagsSkipOffset = -16;
}
