<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Spec;

/**
 * Class representing an Image File Directory (IFD).
 */
class Ifd extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    protected $DOMNodeName = 'ifd';

    /**
     * The IFD header bytes to skip.
     *
     * @var array
     */
    protected $headerSkipBytes = 0;

    /**
     * Defines if tags in the IFD point to absolute offset.
     *
     * @var array
     */
    protected $tagsAbsoluteOffset = true;

    /**
     * The offset skip for tags.
     *
     * @var array
     */
    protected $tagsSkipOffset = 0;

    /**
     * The format of the tag representing this IFD.
     *
     * @var int
     */
    protected $format = Format::LONG;

    /**
     * The number of components of the tag representing this IFD.
     *
     * @var int
     */
    protected $components = 1;

    /**
     * Constructs a Block for an Image File Directory (IFD).
     */
    public function __construct($type, $name, BlockBase $parent_block, $tag_id = null, ElementInterface $reference = null)
    {
        parent::__construct($type, $parent_block, $reference);

        if ($tag_id !== null) {
            $this->setAttribute('id', $tag_id);
        }
        $this->setAttribute('name', $name);
        $this->hasSpecification = Spec::getElementIdByName($parent_block->getType(), $name) ? true : false;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        if (isset($options['format'])) {
            $this->format = $options['format'];
        }
        if (isset($options['components'])) {
            $this->components = $options['components'];
        }

        $starting_offset = $offset;

        // Get the number of tags.
        $n = $data_element->getShort($this->headerSkipBytes + $offset);
        $this->debug("START... Loading with {tags} TAGs at w-offset {offset} from {total} bytes", [
            'tags' => $n,
            'offset' => $offset,
            'total' => $data_element->getSize(),
        ]);

        $offset += $this->headerSkipBytes;

        // Check if we have enough data.
        if (2 + 12 * $n > $data_element->getSize()) {
            $n = floor(($offset - $data_element->getSize()) / 12);
            $this->warning('Adjusted to: {tags}.', [
                'tags' => $n,
            ]);
        }

        // Load Tags.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 2 + 12 * $i;

            // Gets the TAG's elements from the data window.
            $tag_id = $data_element->getShort($i_offset);
            $tag_format = $data_element->getShort($i_offset + 2);
            $tag_components = $data_element->getLong($i_offset + 4);
            $tag_data_element = $data_element->getLong($i_offset + 8);

            // If the data size is bigger than 4 bytes, then actual data is not in
            // the TAG's data element, but at the the offset stored in the data
            // element.
            $tag_size = Format::getSize($tag_format) * $tag_components;
            if ($tag_size > 4) {
                $tag_data_offset = $tag_data_element;
                if (!$this->tagsAbsoluteOffset) {
                    $tag_data_offset += $offset + 2;
                }
                $tag_data_offset += $this->tagsSkipOffset;
            } else {
                $tag_data_offset = $i_offset + 8;
            }

            // xax
            $this->debug(">> i {ifdoffset}, t {offset} of {total}, c {components}, f {format}, s {size}, d {data}", [
                'ifdoffset' => $i_offset,
                'offset' => $tag_data_offset,
                'total' => $tag_size,
                'components' => $tag_components,
                'format' => Format::getName($tag_format),
                'size' => $tag_size,
                'data' => $tag_size > 4 ? 'off' : ExifEye::dumpHex($data_element->getBytes($i_offset + 8, 4), 4),
            ]);
            //$this->debug(ExifEye::dumpHex($data_element->getBytes($tag_data_offset), 20));

            // Build the TAG object.
            $tag_entry_class = Spec::getElementHandlingClass($this->getType(), $tag_id, $tag_format);

            $element_type = Spec::getElementType($this->getType(), $tag_id);
            if ($element_type === 'tag' || $element_type === null) {
                $tag_entry_arguments = call_user_func($tag_entry_class . '::getInstanceArgumentsFromTagData', $this, $tag_format, $tag_components, $data_element, $tag_data_offset);
                $tag = new Tag('tag', $this, $tag_id, $tag_entry_class, $tag_entry_arguments, $tag_format, $tag_components);
            } else {
                // If the tag is an IFD pointer, loads the IFD.
                $ifd_type = Spec::getElementType($this->getType(), $tag_id);
                $ifd_name = Spec::getElementName($this->getType(), $tag_id);
                $o = $data_element->getLong($i_offset + 8);
                if ($starting_offset != $o) {
                    $ifd_class = Spec::getTypeHandlingClass($ifd_type);
                    $ifd = new $ifd_class($ifd_type, $ifd_name, $this, $tag_id);
                    try {
                        $ifd->loadFromData($data_element, $o, $size, [
                            'data_offset' => $tag_data_offset,
                            'format' => $tag_format,
                            'components' => $tag_components,
                        ]);
                    } catch (DataException $e) {
                        $this->error($e->getMessage());
                    }
                } else {
                    $this->error('Bogus offset to next IFD: {offset}, same as offset being loaded from.', [
                        'offset' => $o,
                    ]);
                }
                continue;
            }
        }

        $this->debug(".....END Loading");

        // Invoke post-load callbacks.
        $post_load_callbacks = Spec::getTypePropertyValue($this->getType(), 'postLoad');
        if (!empty($post_load_callbacks)) {
            foreach ($post_load_callbacks as $callback) {
                $this->debug("START... {callback}", [
                    'callback' => $callback,
                ]);
                call_user_func($callback, $data_element, $this);
                $this->debug(".....END {callback}", [
                    'callback' => $callback,
                ]);
            }
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $bytes = '';

        // Number of sub-elements. 2 bytes running.
        $n = count($this->getMultipleElements('ifd|tag'));
        if ($thumbnail = $this->getElement('thumbnail')) {
            $n += 2;
        }
        $bytes .= ConvertBytes::fromShort($n, $byte_order);

        // Data area. We need to reserve 12 bytes for each IFD tag + 4 bytes
        // at the end for the link to next IFD as space occupied by IFD
        // entries.
        $data_area_offset = $offset + strlen($bytes) + $n * 12 + 4;
        $data_area_bytes = '';

        // Fill in the TAG entries in the IFD.
        foreach ($this->getMultipleElements('ifd|tag') as $tag => $sub_block) {
            $bytes .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $byte_order);
            $bytes .= ConvertBytes::fromShort($sub_block->getFormat(), $byte_order);
            $bytes .= ConvertBytes::fromLong($sub_block->getComponents(), $byte_order);

            // xax
            if ($sub_block instanceof Ifd && $sub_block->getAttribute('id') == 37500) {
                $data = str_repeat(chr(0x0D), $sub_block->getComponents());
            } else {
                $data = $sub_block->toBytes($byte_order, $data_area_offset);
            }
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

        // Thumbnail.
        if ($thumbnail) {
            $thumbnail_entry = $thumbnail->getElement('entry');
            // Add offset.
            $bytes .= ConvertBytes::fromShort(Spec::getElementIdByName($this->getType(), 'ThumbnailOffset'), $byte_order);
            $bytes .= ConvertBytes::fromShort(Format::LONG, $byte_order);
            $bytes .= ConvertBytes::fromLong(1, $byte_order);
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
            // Add length.
            $bytes .= ConvertBytes::fromShort(Spec::getElementIdByName($this->getType(), 'ThumbnailLength'), $byte_order);
            $bytes .= ConvertBytes::fromShort(Format::LONG, $byte_order);
            $bytes .= ConvertBytes::fromLong(1, $byte_order);
            $bytes .= ConvertBytes::fromLong($thumbnail_entry->getComponents(), $byte_order);
            // Add thumbnail.
            $data_area_bytes .= $thumbnail_entry->toBytes();
            $data_area_offset += $thumbnail_entry->getComponents();
        }

        // Append link to next IFD.
        if ($has_next_ifd) {
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
        } else {
            $bytes .= ConvertBytes::fromLong(0, $byte_order);
        }

        // Append data area.
        $bytes .= $data_area_bytes;

        return $bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        return $this->components;
    }
}
