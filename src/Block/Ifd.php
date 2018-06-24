<?php

namespace ExifEye\core\Block;

use ExifEye\core\Block\Tag;
use ExifEye\core\DataWindow;
use ExifEye\core\DataWindowException;
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
    public function loadFromData(DataWindow $data_window, $offset = 0, array $options = [])
    {
        $starting_offset = $offset;

        // Get the number of tags.
        $n = $data_window->getShort($offset + $this->headerSkipBytes);
        $this->debug("START... Loading with {tags} TAGs at offset {offset} from {total} bytes", [
            'tags' => $n,
            'offset' => $offset,
            'total' => $data_window->getSize(),
        ]);

        $offset += 2 + $this->headerSkipBytes;

        // Check if we have enough data.
        if ($offset + 12 * $n > $data_window->getSize()) {
            $n = floor(($offset - $data_window->getSize()) / 12);
            $this->warning('Adjusted to: {tags}.', [
                'tags' => $n,
            ]);
        }

        // Load Tags.
        for ($i = 0; $i < $n; $i++) {
            $i_offset = $offset + 12 * $i;

            // Gets the TAG's elements from the data window.
            $tag_id = $data_window->getShort($i_offset);
            $tag_format = $data_window->getShort($i_offset + 2);
            $tag_components = $data_window->getLong($i_offset + 4);
            $tag_data_element = $data_window->getLong($i_offset + 8);

            // If the data size is bigger than 4 bytes, then actual data is not in
            // the TAG's data element, but at the the offset stored in the data
            // element.
            $tag_size = Format::getSize($tag_format) * $tag_components;
            if ($tag_size > 4) {
                $tag_data_offset = $tag_data_element;
                if (!$this->tagsAbsoluteOffset) {
                    $tag_data_offset += $offset;
                }
                $tag_data_offset += $this->tagsSkipOffset;
            } else {
                $tag_data_offset = $i_offset + 8;
            }

            // Build the TAG object.
            $tag_entry_class = Spec::getEntryClass($this, $tag_id, $tag_format);
            $tag_entry_arguments = call_user_func($tag_entry_class . '::getInstanceArgumentsFromTagData', $this, $tag_format, $tag_components, $data_window, $tag_data_offset);
            $tag = new Tag($this, $tag_id, $tag_entry_class, $tag_entry_arguments, $tag_format, $tag_components);

            // Load a subIfd.
            if (Spec::isTagAnIfdPointer($this, $tag->getAttribute('id'))) {
                // If the tag is an IFD pointer, loads the IFD.
                $ifd_name = Spec::getIfdNameFromTag($this, $tag->getAttribute('id'));
                $o = $data_window->getLong($offset + 12 * $i + 8);
                if ($starting_offset != $o) {
                    $ifd_class = Spec::getIfdClass($ifd_name);
                    $ifd = new $ifd_class($this, $ifd_name);
                    try {
                        $ifd->loadFromData($data_window, $o, ['components' => $tag->getElement("entry")->getComponents()]);
                        $this->remove("tag[@name='" . $tag->getAttribute('name') . "']");
                    } catch (DataWindowException $e) {
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
            call_user_func($callback, $data_window, $this);
            $this->debug(".....END {callback}", [
                'callback' => $callback,
            ]);
        }

        return $data_window->getLong($offset + 12 * $n);
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($offset, $order)
    {
        $ifd_area = '';
        $data_area = '';

        // Determine number of IFD entries.
        $n = count($this->query('tag')) + count($this->query('ifd'));
        if ($this->getElement("thumbnail") !== null) {
            // We need two extra entries for the thumbnail offset and length.
            $n += 2;
        }
        $ifd_area .= ConvertBytes::fromShort($n, $order);

        // Initialize offset of data area. This included the bytes preceding
        // this IFD, the bytes needed for the count of entries, the entries
        // themselves (and sub entries), the extra data in the entries, and the
        // IFD link.
        $end = $offset + 2 + 12 * $n + 4;

        // Process the Tags.
        foreach ($this->query('tag') as $tag => $sub_block) {
            // Each entry is 12 bytes long.
            $ifd_area .= ConvertBytes::fromShort($sub_block->getAttribute('id'), $order);
            $ifd_area .= ConvertBytes::fromShort($sub_block->getElement("entry")->getFormat(), $order);
            $ifd_area .= ConvertBytes::fromLong($sub_block->getElement("entry")->getComponents(), $order);

            // Size? If bigger than 4 bytes, the actual data is not in
            // the entry but somewhere else.
            $data = $sub_block->getElement("entry")->toBytes($order);
            $s = strlen($data);
            if ($s > 4) {
                $ifd_area .= ConvertBytes::fromLong($end, $order);
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
            $ifd_area .= ConvertBytes::fromShort(Spec::getTagIdByName($this, 'ThumbnailLength'), $order);
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $order);
            $ifd_area .= ConvertBytes::fromLong(1, $order);
            $ifd_area .= ConvertBytes::fromLong($this->getElement("thumbnail/entry")->getComponents(), $order);

            $ifd_area .= ConvertBytes::fromShort(Spec::getTagIdByName($this, 'ThumbnailOffset'), $order);
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $order);
            $ifd_area .= ConvertBytes::fromLong(1, $order);
            $ifd_area .= ConvertBytes::fromLong($end, $order);

            $data_area .= $this->getElement("thumbnail/entry")->toBytes();
            $end += $this->getElement("thumbnail/entry")->getComponents();
        }

        // Process sub IFDs.
        $sub_bytes = '';
        foreach ($this->query('ifd') as $sub) {
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
            $ifd_area .= ConvertBytes::fromShort($tag, $order);
            // Next the format, which is always unsigned long.
            $ifd_area .= ConvertBytes::fromShort(Format::LONG, $order);
            // There is only one component.
            $ifd_area .= ConvertBytes::fromLong(1, $order);

            $data = $sub->getBytes($end, $order);
            $s = strlen($data);
            $sub_bytes .= $data;

            $ifd_area .= ConvertBytes::fromLong($end, $order);
            $end += $s;
        }

        return ['ifd_area' => $ifd_area, 'data_area' => $data_area];
    }
}
