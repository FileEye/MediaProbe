<?php

namespace FileEye\ImageInfo\Test\core;

use FileEye\ImageInfo\core\Entry\Core\Long;

class NumberLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new Long($this->mockParentElement, []);
        $this->min = 0;
        $this->max = 4294967295;
    }
}
