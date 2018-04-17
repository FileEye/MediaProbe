<?php

namespace ExifEye\core\Block;

use ExifEye\core\DataWindow;
use ExifEye\core\ExifEye;
use ExifEye\core\Format;
use ExifEye\core\InvalidDataException;
use ExifEye\core\Spec;

/**
 * Class representing an index of Short values as an IFD.
 */
class IfdIndexShort extends Ifd
{
    /**
     * Load data into a Image File Directory (IFD).
     *
     * @param DataWindow $d
     *            the data window that will provide the data.
     * @param int $offset
     *            the offset within the window where the directory will
     *            be found.
     * @param int $components
     *            (Optional) the number of components held by this IFD.
     * @param int $nesting_level
     *            (Optional) the level of nesting of this IFD in the overall
     *            structure.
     */
    public function load(DataWindow $d, $offset, $components = 1, $nesting_level = 0)
    {
        ExifEye::logger()->debug(str_repeat("  ", $nesting_level) . "** Constructing IFD '{name}' with {components} entries at offset {offset}...", [
            'name' => $this->getName(),
            'components' => $components,
            'offset' => $offset,
        ]);

        $index_size = $d->getShort($offset);
        if ($index_size / $components !== Format::getSize(Format::SHORT)) {
            ExifEye::logger()->error('Size of {ifd_type} does not match the number of entries.', [
                'ifd_type' => $this->getName(),
            ]);
        }
        $offset += 2;
        for ($i = 0; $i < $components; $i++) {
            // Check if PEL can support this TAG.
            if (!$this->isValidTag($i + 1)) {
                ExifEye::logger()->debug(str_repeat("  ", $nesting_level) . "No specification available for tag 0x{tag}, skipping ({count} of {total})...", [
                    'tag' => dechex($i + 1),
                    'count' => $i + 1,
                    'offset' => $components,
                ]);
                continue;
            }

            $item_format = Spec::getTagFormat($this->type, $i + 1)[0];
            ExifEye::logger()->debug(str_repeat("  ", $nesting_level) . 'Tag 0x{tag}: ({tag_name}) Fmt: {format} ({format_name}) Components: {components} ({count} of {total})...', [
                'tag' => dechex($i + 1),
                'tag_name' => Spec::getTagName($this->type, $i + 1),
                'format' => $item_format,
                'format_name' => Format::getName($item_format),
                'components' => 1,
                'count' => $i + 1,
                'offset' => $components,
            ]);
            switch ($item_format) {
                case Format::BYTE:
                    $item_value = $d->getByte($offset + $i * 2);
                    break;
                case Format::SHORT:
                    $item_value = $d->getShort($offset + $i * 2);
                    break;
                case Format::LONG:
                    $item_value = $d->getLong($offset + $i * 2);
                    break;
                case Format::RATIONAL:
                    $item_value = $d->getRational($offset + $i * 2);
                    break;
                case Format::SBYTE:
                    $item_value = $d->getSignedByte($offset + $i * 2);
                    break;
                case Format::SSHORT:
                    $item_value = $d->getSignedShort($offset + $i * 2);
                    break;
                case Format::SLONG:
                    $item_value = $d->getSignedLong($offset + $i * 2);
                    break;
                case Format::SRATIONAL:
                    $item_value = $d->getSRattional($offset + $i * 2);
                    break;
            }
            if ($class = Spec::getTagClass($this->type, $i + 1)) {
                $entry = new $class([$item_value]);
                $this->xxAppendSubBlock(new Tag($this, $i + 1, $entry));
            }
        }
        ExifEye::logger()->debug(str_repeat("  ", $nesting_level) . "** End of loading IFD '{ifd}'.", [
            'ifd' => $this->getName(),
        ]);
    }
}
