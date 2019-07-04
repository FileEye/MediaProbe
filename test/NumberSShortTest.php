<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Entry\Core\SignedShort;

class NumberSignedShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new SignedShort($this->mockParentElement, []);
        $this->min = -32768;
        $this->max = 32767;
    }
}
