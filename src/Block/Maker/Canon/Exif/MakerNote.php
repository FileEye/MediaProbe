<?php

namespace FileEye\MediaProbe\Block\Maker\Canon\Exif;

use FileEye\MediaProbe\Block\Maker\MakerNoteBase;
use FileEye\MediaProbe\Block\Media\Tiff\Ifd;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\HexDump;

class MakerNote extends MakerNoteBase
{
    public function fromDataElement(DataElement $dataElement): MakerNote
    {
        $offset = 0;

        // Get the number of entries.
        $n = $this->ifdEntriesCountFromDataElement($dataElement, $offset);
        assert($this->debugInfo(['dataElement' => $dataElement, 'sequence' => $n]));

        // Load the Blocks.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            try {
                $ifdEntry = $this->ifdEntryFromDataElement(
                    seq: $i,
                    dataElement: $dataElement,
                    offset: $i_offset,
                    dataDisplacement: $this->dataDisplacement,
                );
                $item_class = $ifdEntry->collection->handler();

                // Check data is accessible, warn otherwise.
                if ($ifdEntry->data >= $dataElement->getSize()) {
                    $this->warning(
                        'Could not access value for item {item} in \'{ifd}\', overflow',
                        [
                            'item' => HexDump::dumpIntHex($ifdEntry->collection->getPropertyValue('name') ?? 'n/a'),
                            'ifd' => $this->getAttribute('name'),
                        ]
                    );
                    continue;
                }
                if ($ifdEntry->data +  $ifdEntry->size() > $dataElement->getSize()) {
                    $this->warning(
                        'Could not get value for item {item} in \'{ifd}\', not enough data',
                        [
                            'item' => HexDump::dumpIntHex($ifdEntry->collection->getPropertyValue('name') ?? 'n/a'),
                            'ifd' => $this->getAttribute('name'),
                        ]
                    );
                    continue;
                }

                $item = new $item_class(
                    new ItemDefinition(
                        collection: $ifdEntry->collection,
                        format: $ifdEntry->dataFormat,
                        valuesCount: $ifdEntry->countOfComponents,
                        dataOffset: $ifdEntry->data,
                        sequence: $ifdEntry->sequence,
                    ),
                    $this,
                );
                if (is_a($item_class, Ifd::class, true)) {
                    throw new MediaProbeException(sprintf('There should not be sub-IFDs in %s', __CLASS__));
                }
                $item_data_window = new DataWindow($dataElement, $ifdEntry->data, $ifdEntry->size());
                $item->parseData($item_data_window);
            } catch (DataException $e) {
                if (isset($item)) {
                    $item->error($e->getMessage());
                } else {
                    throw $e;
                }
            }
        }

        return $this;
    }
}
