<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\SignedByte;

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
