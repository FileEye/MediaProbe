<?php

namespace FileEye\ImageProbe\Test\core;

use FileEye\ImageProbe\core\Entry\Core\SignedLong;

class NumberSignedLongTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new SignedLong($this->mockParentElement, []);
        $this->min = -2147483648;
        $this->max = 2147483647;
    }
}
