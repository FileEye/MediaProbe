<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Entry\Core\SignedByte;

class NumberSignedByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new SignedByte($this->mockParentElement, []);
        $this->min = -128;
        $this->max = 127;
    }
}
