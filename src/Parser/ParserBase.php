<?php

namespace FileEye\MediaProbe\Parser;

use FileEye\MediaProbe\Model\BlockInterface;

class ParserBase
{
    public function __construct(
        protected readonly BlockInterface $block,
    )
    {
    }
}
