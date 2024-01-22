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
        $mediaCollection = CollectionFactory::get('MediaType');
        // Loop through the 'Media' collection items, each of which defines a media format
        // collection, and checks if the media matches the format. When a match is found, return
        // the media format collection.
        foreach ($mediaCollection->listItemIds() as $typeItem) {
            $typeCollection = $mediaCollection->getItemCollection($typeItem);
            $class = $typeCollection->getPropertyValue('class');
            if ($class::isDataMatchingFormat($dataElement)) {
                return $typeCollection;
            }
        }
        throw new MediaProbeException('Media type not managed by MediaProbe');
    }
}
