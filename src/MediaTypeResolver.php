<?php declare(strict_types=1);

namespace FileEye\MediaProbe;

use FileEye\MediaProbe\Collection\CollectionException;
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
     * @param list<string> $typeHints
     *   (Optional) a list of most likely MIME types.
     *
     * @return CollectionInterface
     *   The media format collection.
     *
     * @throws MediaProbeException
     *   If no supporte media type can be identified.
     */
    public static function fromDataElement(DataElement $dataElement, array $typeHints = []): CollectionInterface
    {
        $mediaTypesCollection = CollectionFactory::get('MediaType');

        // Loop through the 'Media' collection items, each of which defines a media format
        // collection, and checks if the media matches the format. When a match is found, return
        // the media format collection. First try the most likely MIME types.
        foreach ($typeHints as $hint) {
            try {
                $type = $mediaTypesCollection->getItemCollection($hint);
            }
            catch (CollectionException) {
                continue;
            }
            $handler = $type->getPropertyValue('handler');
            if ($handler::isDataMatchingMediaType($dataElement)) {
                return $type;
            }
        }

        // If not matched, try the rest of the collections.
        foreach ($mediaTypesCollection->listItemIds() as $id) {
            if (in_array($id, $typeHints, true)) {
                continue;
            }
            $type = $mediaTypesCollection->getItemCollection($id);
            $handler = $type->getPropertyValue('handler');
            if ($handler::isDataMatchingMediaType($dataElement)) {
                return $type;
            }
        }

        throw new MediaProbeException('Media type not managed by MediaProbe');
    }
}
