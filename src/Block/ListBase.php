<?php

namespace FileEye\MediaProbe\Block;

use FileEye\MediaProbe\Block\Tag;
use FileEye\MediaProbe\Collection;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Data\DataException;
use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\MediaProbeException;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Abstract class representing a generic table of data.
 *
 * Its extensions could be IFDs (Image File Directory), indexes, maps, etc.
 *
 * As this class is abstract you cannot instantiate objects from it. It only
 * serves as an ancestor to define common methods to its class extension
 * implementations.
 */
abstract class ListBase extends BlockBase
{
    // xx
    protected $definition;

    /**
     * Base constructor.
     *
     * @todo xx
     */
    public function __construct(ItemDefinition $definition, BlockBase $parent = null, BlockBase $reference = null)
    {
        $collection = $definition->getCollection();

        parent::__construct($collection, $parent, $reference);

        if ($collection->getPropertyValue('item') !== null) {
            $this->setAttribute('id', $collection->getPropertyValue('item'));
        }
        $this->setAttribute('name', $collection->getPropertyValue('name'));
        $this->definition = $definition;
    }

    /**
     * Invoke post-load callbacks.
     *
     * @param \FileEye\MediaProbe\Data\DataElement $data_element
     *   @todo
     */
    protected function executePostLoadCallbacks(DataElement $data_element)
    {
        $post_load_callbacks = $this->getCollection()->getPropertyValue('postLoad');
        if (!empty($post_load_callbacks)) {
            foreach ($post_load_callbacks as $callback) {
                call_user_func($callback, $data_element, $this);
            }
        }
        return $this;
    }

    public function getDefinition()
    {
        return $this->definition;
    }

    // xx
    public function getFormat()
    {
        return $this->getDefinition()->getFormat();
    }

    // xx
    public function getComponents()
    {
        return count($this->getMultipleElements('*[not(self::rawData)]'));
    }
}
