<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\Entry\Core\Undefined;
use ExifEye\core\Spec;
use ExifEye\core\Block\Ifd;

/**
 * Class used to hold data for a JPEG Thumbnail.
 */
class Thumbnail extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'Thumbnail';

    /**
     * {@inheritdoc}
     */
    protected $id = 0;

    /**
     * {@inheritdoc}
     */
    protected $name = 'Thumbnail';

    /**
     * Constructs a Tag block object.
     */
    public function __construct(Ifd $ifd, $id, EntryInterface $entry)
    {
        $this->setParentElement($ifd);

        $this->hasSpecification = false;

/*        $entry->setParentElement($this);
        $this->setEntry($entry);*/
    }

    /**
     * xx
     */
    public static function toBlock(DataWindow $d, Ifd $ifd)
    {
        if ($ifd->getTagByName('ThumbnailOffset') && $ifd->getTagByName('ThumbnailLength')) {
            ExifEye::logger()->debug('{path} JPEG thumbnail at offset {offset} of length {length}', [
                'path' => $ifd->getElementPath(),
                'offset' => $ifd->getTagByName('ThumbnailOffset')->getEntry()->getValue(),
                'length' => $ifd->getTagByName('ThumbnailLength')->getEntry()->getValue(),
            ]);
        }
    }
}
