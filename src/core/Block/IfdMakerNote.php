<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\ExifEye;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Collection;

/**
 * @todo
 */
class IfdMakerNote extends Ifd
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'makerNote';
}
