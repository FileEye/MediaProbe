<?php

namespace FileEye\MediaProbe\Block\Maker\Canon\Exif;

use FileEye\MediaProbe\Block\Maker\MakerNoteBase;
use FileEye\MediaProbe\Block\Tiff\Ifd;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\Utility\HexDump;

class MakerNote extends MakerNoteBase
{
    public function fromDataElement(DataElement $dataElement): MakerNote
    {
        $offset = 0;

        // Get the number of entries.
        $n = $this->getItemsCountFromData($dataElement, $offset);
        assert($this->debugInfo(['dataElement' => $dataElement, 'sequence' => $n]));

        // Load the Blocks.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;
            try {
                $item_definition = $this->getItemDefinitionFromData(
                    seq: $i,
                    dataElement: $dataElement,
                    offset: $i_offset,
                    dataDisplacement: $this->dataDisplacement,
                );
                $item_class = $item_definition->collection->handler();

                // Check data is accessible, warn otherwise.
                if ($item_definition->dataOffset >= $dataElement->getSize()) {
                    $this->warning(
                        'Could not access value for item {item} in \'{ifd}\', overflow',
                        [
                            'item' => HexDump::dumpIntHex($item_definition->collection->getPropertyValue('name') ?? 'n/a'),
                            'ifd' => $this->getAttribute('name'),
                        ]
                    );
                    continue;
                }
                if ($item_definition->dataOffset +  $item_definition->getSize() > $dataElement->getSize()) {
                    $this->warning(
                        'Could not get value for item {item} in \'{ifd}\', not enough data',
                        [
                            'item' => HexDump::dumpIntHex($item_definition->collection->getPropertyValue('name') ?? 'n/a'),
                            'ifd' => $this->getAttribute('name'),
                        ]
                    );
                    continue;
                }

                $item = new $item_class($item_definition, $this);
                if (is_a($item_class, Ifd::class, true)) {
                    throw new MediaProbeException(sprintf('There should not be sub-IFDs in %s', __CLASS__));
                }
                $item_data_window = new DataWindow($dataElement, $item_definition->dataOffset, $item_definition->getSize());
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
