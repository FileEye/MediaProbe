<?php

namespace ExifEye\core\Block;

use ExifEye\core\Spec;

/**
 * Class representing a generic JPEG data segment.
 */
abstract class JpegSegmentBase extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'jpegSegment';

    /**
     * Construct a new JPEG segment object.
     */
    public function __construct($id, Jpeg $jpeg, JpegSegmentBase $reference = null)
    {
        parent::__construct($jpeg, $reference);
        $this->setAttribute('id', $id);
        $name = Spec::getElementName($jpeg->getType(), $id);
        $this->setAttribute('name', $name);
        $this->debug('{name} segment - {desc}', ['name' => $name, 'desc' => Spec::getElementTitle($jpeg->getType(), $id)]);
    }
}
