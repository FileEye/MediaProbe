<?php

namespace FileEye\MediaProbe\Block\Maker\Canon\Exif;

use FileEye\MediaProbe\Block\Maker\MakerNoteBase;
use FileEye\MediaProbe\Block\Media\Tiff\Ifd;
use FileEye\MediaProbe\Block\Tiff\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbeException;

class MakerNote extends MakerNoteBase
{
    public function fromDataElement(DataElement $dataElement): MakerNote
    {
        $offset = 0;

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
                    dataDisplacement: $this->dataDisplacement,
                );

                if ($ifdEntry === false) {
                    continue;
                }

                $item_class = $ifdEntry->collection->handler();
                if (is_a($item_class, Ifd::class, true)) {
                    throw new MediaProbeException(sprintf('There should not be sub-IFDs in %s', __CLASS__));
                }
                $this->debug($item_class);
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

        return $this;
    }
}
