<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Model\RootBlockBase;

class StubRootBlock extends RootBlockBase
{
    /**
     * @todo remove, replace by parser
     */
    protected function doParseData(DataElement $data): void
    {
    }
}
