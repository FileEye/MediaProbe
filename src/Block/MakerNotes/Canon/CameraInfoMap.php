<?php

namespace FileEye\MediaProbe\Block\MakerNotes\Canon;

use FileEye\MediaProbe\ItemFormat;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Block\Index;
use FileEye\MediaProbe\Block\Map;
use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class representing a map of values, for Canon Camera information.
 *
 * The actual map collection need to be resolved.
 */
class CameraInfoMap extends Map
{
    /**
     * {@inheritdoc}
     */
    protected function validate(DataElement $data_element): void
    {
        parent::validate($data_element);

        // Gets the Model from IFD0.
        $model_entry = $this->getRootElement()->getElement("//ifd[@name='IFD0']/tag[@name='Model']/entry");
        $model = $model_entry ? $model_entry->getValue() : 'n/a';

        // Find the appropriate map collection.
        $mapped = false;
        foreach ($this->getCollection()->listItemIds() as $map_id) {
            $map_t = $this->getCollection()->getItemCollection($map_id);
            if (preg_match($map_t->getPropertyValue('condition')[0], $model)) {
                $this->collection = $map_t;
                $mapped = true;
                break;
            }
        }
        if (!$mapped) {
            if ($this->getFormat() === ItemFormat::LONG) {
                if (in_array($this->getDefinition()->getValuesCount(), [138, 148])) {
                    $this->collection = $this->getCollection()->getItemCollection('CanonCameraInfoPowerShot');
                } elseif (in_array($this->getDefinition()->getValuesCount(), [156, 162, 167, 171, 264])) {
                    $this->collection = $this->getCollection()->getItemCollection('CanonCameraInfoPowerShot2');
                } else {
                    $this->collection = $this->getCollection()->getItemCollection('CanonCameraInfoUnknown32');
                }
// xx todo add when newer exiftoolxml is available
//            elseif ($this->getFormat() === ItemFormat::SHORT) {
//                $this->collection = $this->getCollection()->getItemCollection('CanonCameraInfoUnknown16');
//            }
            } else {
                $this->collection = $this->getCollection()->getItemCollection('CanonCameraInfoUnknown');
            }
        }

        $this->debug("Resolved map to {domnode}:{name}", [
            'domnode' => $this->getCollection()->getPropertyValue('DOMNode'),
            'name' => $this->getCollection()->getPropertyValue('name'),
        ]);
    }
}
