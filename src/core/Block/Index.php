<?php

namespace ExifEye\core\Block;

use ExifEye\core\Data\DataElement;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Spec;
use ExifEye\core\Utility\ConvertBytes;

/**
 * Class representing an index of values.
 */
class Index extends IfdBase
{
    /**
     * {@inheritdoc}
     */
    public function loadFromData(DataElement $data_element, $offset, $size, array $options = [])
    {
        $this->debug("IFD {ifdname} @{offset} with {tags} entries", [
            'ifdname' => $this->getAttribute('name'),
            'tags' => $options['components'],
            'offset' => $data_element->getStart() + $offset,
        ]);

        $index_size = $data_element->getShort($offset);
        if ($index_size / $options['components'] !== Spec::getFormatSize(Spec::getFormatIdFromName('Short'))) {
            $this->warning('Size of {ifd_name} does not match the number of entries.', [
                'ifd_name' => $this->getAttribute('name'),
            ]);
        }
        $offset += 2;
        for ($i = 0; $i < $options['components']; $i++) {
            // Check if this tag ($i + 1) should be skipped.
            if (Spec::getElementPropertyValue($this->getType(), $i + 1, 'skip')) {
                continue;
            };

            $item_format = Spec::getElementPropertyValue($this->getType(), $i + 1, 'format')[0];

            switch (Spec::getFormatName($item_format)) {
                case 'Byte':
                    $item_value = $data_element->getByte($offset + $i * 2);
                    break;
                case 'Short':
                    $item_value = $data_element->getShort($offset + $i * 2);
                    break;
                case 'Long':
                    $item_value = $data_element->getLong($offset + $i * 2);
                    break;
                case 'Rational':
                    $item_value = $data_element->getRational($offset + $i * 2);
                    break;
                case 'SignedByte':
                    $item_value = $data_element->getSignedByte($offset + $i * 2);
                    break;
                case 'SignedShort':
                    $item_value = $data_element->getSignedShort($offset + $i * 2);
                    break;
                case 'SignedLong':
                    $item_value = $data_element->getSignedLong($offset + $i * 2);
                    break;
                case 'SignedRational':
                    $item_value = $data_element->getSRattional($offset + $i * 2);
                    break;
                default:
                    $item_value = $data_element->getSignedShort($offset + $i * 2);
                    $item_format = Spec::getFormatIdFromName('SignedShort');
                    break;
            }

            $this->debug("#{i} id {id}, f {format}, data @{offset}", [
                'i' => $i + 1,
                'id' => '0x' . strtoupper(dechex($i)),
                'format' => Spec::getFormatName($item_format),
                'offset' => $data_element->getStart() + $offset + $i * 2,
            ]);

            if ($entry_class = Spec::getElementHandlingClass($this->getType(), $i + 1, $item_format)) {
                new Tag('tag', $this, $i + 1, $entry_class, [$item_value], $item_format, 1);
            }
        }

        // Invoke post-load callbacks.
        $this->executePostLoadCallbacks($data_element);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toBytes($byte_order = ConvertBytes::LITTLE_ENDIAN, $offset = 0, $has_next_ifd = false)
    {
        $data_bytes = '';

        foreach ($this->getMultipleElements('tag') as $tag => $sub_block) {
            $data_bytes .= $sub_block->toBytes($byte_order);
        }

        return ConvertBytes::fromShort(strlen($data_bytes), $byte_order) . $data_bytes;
    }

    /**
     * {@inheritdoc}
     */
    public function getComponents()
    {
        $size = 0;
        foreach ($this->getMultipleElements('tag') as $tag) {
            $size += Spec::getFormatSize($tag->getFormat());
        }
        return $size / 2;
    }
}
