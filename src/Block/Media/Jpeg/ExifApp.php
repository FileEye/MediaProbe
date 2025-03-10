<?php

namespace FileEye\MediaProbe\Block\Media\Jpeg;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Model\RootBlockBase;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing Exif data.
 *
 * This is found in a JPEG APP1 segment, and it is just an header for an entire
 * TIFF structure.
 */
class ExifApp extends BlockBase
{
    /**
     * Exif header.
     *
     * The Exif data must start with these six bytes to be considered valid.
     */
    // @todo xxx the trailing bytes may not be zeros
    const EXIF_HEADER = "Exif\0\0";

    public function __construct(
        public readonly CollectionInterface $collection,
        SegmentApp1|RootBlockBase $parent,
    ) {
        parent::__construct(
            definition: new ItemDefinition($this->collection),
            parent: $parent,
            graft: false,
        );
    }

    /**
     * Determines if the data is an EXIF segment.
     */
    public static function isExifSegment(DataElement $dataElement, $offset = 0): bool
    {
        // There must be at least 6 bytes for the Exif header.
        if ($dataElement->getSize() - $offset < strlen(static::EXIF_HEADER)) {
            return false;
        }

        // Verify the Exif header.
        if ($dataElement->getBytes($offset, strlen(static::EXIF_HEADER)) === static::EXIF_HEADER) {
            return true;
        }

        return false;
    }

    public function fromDataElement(DataElement $dataElement): static
    {
        assert($this->debugInfo(['dataElement' => $dataElement]));

        $tiffCollection = CollectionFactory::get('Media\Tiff');
        $tiffHandler = $tiffCollection->handler();

        if ($tiffHandler::getTiffSegmentByteOrder($dataElement, strlen(static::EXIF_HEADER)) !== null) {
            $tiffBlock = new $tiffHandler(
                collection: $tiffCollection,
                parent: $this,
            );
            $tiffBlock->fromDataElement(new DataWindow($dataElement, strlen(static::EXIF_HEADER), $dataElement->getSize() - strlen(static::EXIF_HEADER)));
            $this->graftBlock($tiffBlock);
        } else {
            // We store the data as normal JPEG content if it could not be
            // parsed as Tiff data.
            $entry = new Undefined($this, [$dataElement->getBytes()]);
            $this->warning("TIFF header not found. Parsed {text}", ['text' => $entry->toString()]);
        }

        return $this;
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0): string
    {
        return self::EXIF_HEADER . $this->getElement('*')->toBytes();
    }
}
