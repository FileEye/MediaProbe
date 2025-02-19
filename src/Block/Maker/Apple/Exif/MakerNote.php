<?php

namespace FileEye\MediaProbe\Block\Maker\Apple\Exif;

use FileEye\MediaProbe\Block\ListBase;
use FileEye\MediaProbe\Block\Maker\MakerNoteBase;
use FileEye\MediaProbe\Block\Media\Tiff\Ifd;
use FileEye\MediaProbe\Block\Media\Tiff\Tag;
use FileEye\MediaProbe\Block\RawData;
use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataFormat;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\ConvertBytes;

class MakerNote extends MakerNoteBase
{
    public function fromDataElement(DataElement $dataElement): MakerNote
    {
        $offset = 0;

        // Load Apple's header as a raw data block.
        $header_data_definition = new ItemDefinition(CollectionFactory::get('RawData', ['name' => 'appleHeader']), DataFormat::BYTE, 14);
        $header_data_window = new DataWindow($dataElement, $offset, 14);
        $header = new RawData($header_data_definition, $this);
        $header->parseData($header_data_window);

        $offset += 14;

        // Get the number of entries.
        $n = $this->ifdEntriesCountFromDataElement($dataElement, $offset);
        assert($this->debugInfo(['dataElement' => $dataElement, 'sequence' => $n]));

        // Parse the IFD entries.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            try {
                $ifdEntry = $this->ifdEntryFromDataElement(
                    seq: $i,
                    dataElement: $dataElement,
                    offset: $i_offset,
                );

                if ($ifdEntry === false) {
                    continue;
                }

                $item_class = $ifdEntry->collection->handler();
                if (is_a($item_class, Ifd::class, true)) {
                    throw new MediaProbeException(sprintf('There should not be sub-IFDs in %s', __CLASS__));
                }
                if (is_a($item_class, Tag::class, true)) {
                    $item_data_window_offset = $ifdEntry->isOffset ? $ifdEntry->dataOffset() : $ifdEntry->dataValue();
                    $item_data_window_size = $ifdEntry->countOfComponents > 0 ? $ifdEntry->size : 4;
                    $tagDataWindow = new DataWindow($dataElement, $item_data_window_offset, $item_data_window_size);
                    $item = new $item_class($ifdEntry, $this);
                    $item->fromDataElement($tagDataWindow);
                    $this->graftBlock($item);
                } else {
                    $item = new $item_class(
                        new ItemDefinition(
                            collection: $ifdEntry->collection,
                            format: $ifdEntry->dataFormat,
                            valuesCount: $ifdEntry->countOfComponents,
                            dataOffset: $ifdEntry->isOffset ? $ifdEntry->dataOffset() : $ifdEntry->dataValue(),
                            sequence: $ifdEntry->sequence,
                        ),
                        $this,
                    );
                    $item_data_window = new DataWindow($dataElement, $ifdEntry->isOffset ? $ifdEntry->dataOffset() : $ifdEntry->dataValue(), $ifdEntry->size);
                    $item->parseData($item_data_window);
                }
            } catch (DataException $e) {
                if (isset($item)) {
                    $item->error($e->getMessage());
                } else {
                    throw $e;
                }
            }
        }

        // Invoke post-load callbacks.
        $this->executePostParseCallbacks($dataElement);

        return $this;
    }

    public function toBytes(int $byte_order = ConvertBytes::LITTLE_ENDIAN, int $offset = 0, $has_next_ifd = false): string
    {
        $bytes = $this->getElement('rawData')->toBytes();

        // Number of sub-elements. 2 bytes running.
        $n = count($this->getMultipleElements('*')) - 1;
        $bytes .= ConvertBytes::fromShort($n, $byte_order);

        // Data area. We need to reserve 12 bytes for each IFD tag + 4 bytes
        // at the end for the link to next IFD as space occupied by IFD
        // entries.
        $data_area_offset = strlen($bytes) + $n * 12 + 4;
        $data_area_bytes = '';

        // Fill in the TAG entries in the IFD.
        foreach ($this->getMultipleElements('*') as $tag => $sub_block) {
            if ($sub_block instanceof RawData) {
                continue;
            }

            assert($sub_block instanceof Tag || $sub_block instanceof ListBase, get_class($sub_block));

            $bytes .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $byte_order);
            $bytes .= ConvertBytes::fromShort($sub_block->getFormat(), $byte_order);
            $bytes .= ConvertBytes::fromLong($sub_block->getComponents(), $byte_order);

            $data = $sub_block->toBytes($byte_order, $data_area_offset);
            $s = strlen($data);
            if ($s > 4) {
                $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
                $data_area_bytes .= $data;
                $data_area_offset += $s;
            } else {
                // Copy data directly, pad with NULL bytes as necessary to
                // fill out the four bytes available.
                $bytes .= $data . str_repeat(chr(0), 4 - $s);
            }
        }

        // There is no next IFD.
        $bytes .= ConvertBytes::fromLong(0, $byte_order);

        // Append data area.
        $bytes .= $data_area_bytes;

        return $bytes;
    }
}
