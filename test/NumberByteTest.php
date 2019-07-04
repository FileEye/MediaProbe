<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Entry\Core\Byte;

class NumberByteTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new Byte($this->mockParentElement, []);
        $this->min = 0;
        $this->max = 255;
    }
}
