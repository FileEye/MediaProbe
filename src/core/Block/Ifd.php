<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Data\DataException;
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
     * Constructs a Block for an Image File Directory (IFD).
     */
    public function __construct($type, $name, BlockBase $parent_block, $tag_id = null)
    {
        parent::__construct($type, $parent_block);

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
        $n = count($this->getMultipleElements('*'));
        $bytes .= ConvertBytes::fromShort($n, $byte_order);

        // Data area. We need to reserve 12 bytes for each IFD tag + 4 bytes
        // at the end for the link to next IFD as space occupied by IFD
        // entries.
        $data_area_offset = $offset + strlen($bytes) + $n * 12 + 4;
        $data_area_bytes = '';

        // Fill in the TAG entries in the IFD.
// xax        foreach ($this->getMultipleElements('*') as $tag => $sub_block) {
        foreach ($this->getMultipleElements('tag') as $tag => $sub_block) {
            $bytes .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $byte_order);
            $bytes .= ConvertBytes::fromShort($sub_block->getElement('entry')->getFormat(), $byte_order);
            $bytes .= ConvertBytes::fromLong($sub_block->getElement('entry')->getComponents(), $byte_order);

            $data = $sub_block->getElement('entry')->toBytes($byte_order);
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

        // Append link to next IFD.
        if ($has_next_ifd) {
            $bytes .= ConvertBytes::fromLong($data_area_offset, $byte_order);
        } else {
            $bytes .= ConvertBytes::fromLong(0, $byte_order);
        }

        // Append data area.
        $bytes .= $data_area_bytes;

        return $bytes;

/*            // The argument specifies the offset of this IFD. The IFD will
            // use this to calculate offsets from the entries to their data,
            // all those offsets are absolute offsets counted from the
            // beginning of the data.
            $ifd0_bytes = $ifd0->toBytes($this->byteOrder, 8);

            // Deal with IFD1.
            $ifd1 = $this->getElement("ifd[@name='IFD1']");
            if (!$ifd1) {
                // No IFD1, link to next IFD is 0.
                $bytes .= $ifd0_bytes['ifd_area'] . ConvertBytes::fromLong(0, $this->byteOrder) . $ifd0_bytes['data_area'];
            } else {
                $ifd0_length = strlen($ifd0_bytes['ifd_area']) + 4 + strlen($ifd0_bytes['data_area']);
                $ifd1_offset = 8 + $ifd0_length;
                $bytes .= $ifd0_bytes['ifd_area'] . ConvertBytes::fromLong($ifd1_offset, $this->byteOrder) . $ifd0_bytes['data_area'];
                $ifd1_bytes = $ifd1->toBytes($this->byteOrder, $ifd1_offset);
                $bytes .= $ifd1_bytes['ifd_area'] . ConvertBytes::fromLong(0, $this->byteOrder) . $ifd1_bytes['data_area'];
            }
        } else {
            $bytes .= ConvertBytes::fromLong(0, $this->byteOrder);
        }

        return $bytes;*/














/*        $ifd_area = '';
        $data_area = '';

        // Determine number of IFD entries.
        $n = count($this->getMultipleElements('tag')) + count($this->getMultipleElements('ifd'));
        if ($this->getElement("thumbnail") !== null) {
            // We need two extra entries for the thumbnail offset and length.
            $n += 2;
        }
        $ifd_area .= ConvertBytes::fromShort($n, $byte_order);

        // Initialize offset of data area. This included the bytes preceding
        // this IFD, the bytes needed for the count of entries, the entries
        // themselves (and sub entries), the extra data in the entries, and the
        // IFD link.
        $end = $offset + 2 + 12 * $n + 4;

        // Process the Tags.
        foreach ($this->getMultipleElements('tag') as $tag => $sub_block) {
            // Each entry is 12 bytes long.
            $ifd_area .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $byte_order);
            $ifd_area .= ConvertBytes::fromShort($sub_block->getElement("entry")->getFormat(), $byte_order);
            $ifd_area .= ConvertBytes::fromLong($sub_block->getElement("entry")->getComponents(), $byte_order);

            // Size? If bigger than 4 bytes, the actual data is not in
            // the entry but somewhere else.
            $data = $sub_block->getElement("entry")->toBytes($byte_order);
            $s = strlen($data);
            if ($s > 4) {
                $ifd_area .= ConvertBytes::fromLong($end, $byte_order);
                $data_area .= $data;
                $end += $s;
            } else {
                // Copy data directly, pad with NULL bytes as necessary to
                // fill out the four bytes available.
                $ifd_area .= $data . str_repeat(chr(0), 4 - $s);
            }
        }

        // Process the Thumbnail. @todo avoid double writing of tags
/*        if ($this->getElement("thumbnail")) {
            // TODO: make EntryInterface a class that can be constructed with
            // arguments corresponding to the next four lines.
            $ifd_area .= ConvertBytes::fromShort(Spec::getTagIdByName($this, 'ThumbnailLength'), $byte_order);
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $byte_order);
            $ifd_area .= ConvertBytes::fromLong(1, $byte_order);
            $ifd_area .= ConvertBytes::fromLong($this->getElement("thumbnail/entry")->getComponents(), $byte_order);

            $ifd_area .= ConvertBytes::fromShort(Spec::getTagIdByName($this, 'ThumbnailOffset'), $byte_order);
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $byte_order);
            $ifd_area .= ConvertBytes::fromLong(1, $byte_order);
            $ifd_area .= ConvertBytes::fromLong($end, $byte_order);

            $data_area .= $this->getElement("thumbnail/entry")->toBytes();
            $end += $this->getElement("thumbnail/entry")->getComponents();
        }*/

        // Process sub IFDs.
/*        $sub_bytes = '';
        foreach ($this->getMultipleElements('ifd') as $sub) {
            if ($sub->getType() === 'Exif') {
                $tag = Spec::getTagIdByName($this, 'ExifIFDPointer');
            } elseif ($sub->getType() === 'GPS') {
                $tag = Spec::getTagIdByName($this, 'GPSInfoIFDPointer');
            } elseif ($sub->getType() === 'Interoperability') {
                $tag = Spec::getTagIdByName($this, 'InteroperabilityIFDPointer');
            } else {
                // ConvertBytes::BIG_ENDIAN is the default used by Convert.
                $tag = ConvertBytes::BIG_ENDIAN;
            }
            // Make an additional entry with the pointer.
            $ifd_area .= ConvertBytes::fromShort($tag, $byte_order);
            // Next the format, which is always unsigned long.
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $byte_order);
            // There is only one component.
            $ifd_area .= ConvertBytes::fromLong(1, $byte_order);

            $data = $sub->toBytes($end, $byte_order);
//if (is_array($data)) dump(get_class($sub));
            $s = strlen($data);
            $sub_bytes .= $data;

            $ifd_area .= ConvertBytes::fromLong($end, $byte_order);
            $end += $s;
        }*/

//        return ['ifd_area' => $ifd_area, 'data_area' => $data_area];
   //     return $ifd_area . $data_area;
    }
}
