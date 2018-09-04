<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\DataElement;
use ExifEye\core\DataWindow;
use ExifEye\core\DataException;
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
    protected $type = 'ifd';

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
     * Construct a new Image File Directory (IFD).
     */
    public function __construct(BlockBase $parent_block, $name)
    {
        parent::__construct($parent_block);

        $this->setAttribute('name', $name);
        $this->hasSpecification = Spec::getIfdIdByType($name) ? true : false;
    }

    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset = 0, $size = null, array $options = [])
    {
        $starting_offset = $offset;

        // Get the number of tags.
        $n = $data_element->getShort($this->headerSkipBytes + $offset);
        $this->debug("START... Loading with {tags} TAGs at w-offset {offset} from {total} bytes, r-offset {roffset}", [
            'tags' => $n,
            'offset' => $offset,
            'total' => $data_element->getSize(),
            'roffset' => $data_element->getStart() + $offset,
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

            // Build the TAG object.
            $tag_entry_class = Spec::getEntryClass($this, $tag_id, $tag_format);
            $tag_entry_arguments = call_user_func($tag_entry_class . '::getInstanceArgumentsFromTagData', $this, $tag_format, $tag_components, $data_element, $tag_data_offset);
            $tag = new Tag($this, $tag_id, $tag_entry_class, $tag_entry_arguments, $tag_format, $tag_components);

            // Load a subIfd.
            if (Spec::isTagAnIfdPointer($this, $tag->getAttribute('id'))) {
                // If the tag is an IFD pointer, loads the IFD.
                $ifd_name = Spec::getIfdNameFromTag($this, $tag->getAttribute('id'));
                $o = $data_element->getLong($i_offset + 8);
                if ($starting_offset != $o) {
                    $ifd_class = Spec::getIfdClass($ifd_name);
                    $ifd = new $ifd_class($this, $ifd_name);
                    try {
                        $ifd->loadFromData($data_element, $o, $size, [
                            'data_offset' => $tag_data_offset,
                            'components' => $tag_components,
                        ]);
                        $this->removeElement("tag[@name='" . $tag->getAttribute('name') . "']");
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
        foreach (Spec::getIfdPostLoadCallbacks($this) as $callback) {
            $this->debug("START... {callback}", [
                'callback' => $callback,
            ]);
            call_user_func($callback, $data_element, $this);
            $this->debug(".....END {callback}", [
                'callback' => $callback,
            ]);
        }

        return $data_element->getLong($offset + 2 + 12 * $n);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0)
    {
        $ifd_area = '';
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
        if ($this->getElement("thumbnail")) {
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
        }

        // Process sub IFDs.
        $sub_bytes = '';
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
        }

        return ['ifd_area' => $ifd_area, 'data_area' => $data_area];
    }
}
