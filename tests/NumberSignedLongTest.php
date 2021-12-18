<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedLong;

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
