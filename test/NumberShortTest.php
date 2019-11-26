<?php

namespace FileEye\MediaProbe\Test;

use FileEye\MediaProbe\Entry\Core\Short;

class NumberShortTest extends NumberTestCase
{
    /**
     * {@inheritdoc}
     */
    public function fcSetUp()
    {
        parent::fcSetUp();
        $this->num = new Short($this->mockParentElement, []);
        $this->min = 0;
        $this->max = 65535;
    }
}
