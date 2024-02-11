<?php declare(strict_types=1);

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Collection\CollectionFactory;
use FileEye\MediaProbe\Collection\CollectionInterface;
use FileEye\MediaProbe\Data\DataElement;

/**
 * Resolve a media type from the data element.
 */
class MediaTypeResolver
{
    /**
     * Determines the media format collection of the media data.
     *
     * @param DataElement $dataElement
     *   The data element that will provide the data.
     *
     * @return Collection
     *   The media format collection.
     *
     * @throws MediaProbeException
     */
    public static function fromDataElement(DataElement $dataElement): CollectionInterface
    {
        $mediaTypes = CollectionFactory::get('MediaType');
        // Loop through the 'Media' collection items, each of which defines a media format
        // collection, and checks if the media matches the format. When a match is found, return
        // the media format collection.
        foreach ($mediaTypes->listItemIds() as $id) {
            $type = $mediaTypes->getItemCollection($id);
            $parser = $type->getPropertyValue('parser');
            if ($parser::isDataMatchingMediaType($dataElement)) {
                return $type;
            }
        }
        throw new MediaProbeException('Media type not managed by MediaProbe');
    }
}
