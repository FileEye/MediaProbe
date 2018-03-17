<?php

namespace lsolesen\pel;

class PelIfdApple extends PelIfd
{

    public function load(PelDataWindow $d, $offset, $components = 1, $nesting_level = 0)
    {
        $starting_offset = $offset;

        /* Read the number of entries */
        $n = $d->getShort($offset + 14);
        Pel::debug(
            str_repeat("  ", $nesting_level) . "** Constructing IFD '%s' with %d entries at offset %d from %d bytes...",
            $this->getName(),
            $n,
            $offset,
            $d->getSize()
        );

        $offset += 16;

        /* Check if we have enough data. */
        if ($offset + 12 * $n > $d->getSize()) {
            $n = floor(($offset - $d->getSize()) / 12);
            Pel::maybeThrow(new PelIfdException('Adjusted to: %d.', $n));
        }

        for ($i = 0; $i < $n; $i++) {
            // TODO: increment window start instead of using offsets.
            $tag = $d->getShort($offset + 12 * $i);
            $tag_format = $d->getShort($offset + 12 * $i + 2);
            $tag_components = $d->getLong($offset + 12 * $i + 4);
            $tag_offset = $d->getLong($offset + 12 * $i + 8);

            // Check if PEL can support this TAG.
            if (!$this->isValidTag($tag)) {
                Pel::maybeThrow(
                    new PelIfdException(
                        str_repeat("  ", $nesting_level) . "No specification available for TAG 0x%04X in IFD '%s', skipping (%d of %d)...",
                        $tag,
                        $this->getName(),
                        $i + 1,
                        $n
                    )
                );
                continue;
            }

            Pel::debug(
                str_repeat("  ", $nesting_level) . 'Tag 0x%04X: (%s) Fmt: %d (%s) Components: %d (%d of %d)...',
                $tag,
                PelSpec::getTagName($this->type, $tag),
                $tag_format,
                PelFormat::getName($tag_format),
                $tag_components,
                $i + 1,
                $n
            );

            // Load a subIfd.
            if (PelSpec::isTagAnIfdPointer($this->type, $tag)) {
                // If the tag is an IFD pointer, loads the IFD.
                $type = PelSpec::getIfdIdFromTag($this->type, $tag);
                $o = $d->getLong($offset + 12 * $i + 8);
                if ($starting_offset != $o) {
                    $ifd_class = PelSpec::getIfdClass($type);
                    $ifd = new $ifd_class($type);
                    try {
                        $ifd->load($d, $o, $tag_components, $nesting_level + 1);
                        $this->sub[$type] = $ifd;
                    } catch (PelDataWindowOffsetException $e) {
                        Pel::maybeThrow(new PelIfdException($e->getMessage()));
                    }
                } else {
                    Pel::maybeThrow(new PelIfdException('Bogus offset to next IFD: %d, same as offset being loaded from.', $o));
                }
                continue;
            }

            // Load a TAG entry.
            if ($entry = static::createFromData($this->type, $tag, $d, $offset, $i)) {
                $this->addEntry($entry);
            }
        }

        /* Offset to next IFD */
        $o = $d->getLong($offset + 12 * $n);
        Pel::debug(str_repeat("  ", $nesting_level) . 'Current offset is %d, link at %d points to %d.', $offset, $offset + 12 * $n, $o);

        if ($o > 0) {
            /* Sanity check: we need 6 bytes */
            if ($o > $d->getSize() - 6) {
                Pel::maybeThrow(new PelIfdException('Bogus offset to next IFD: ' . '%d > %d!', $o, $d->getSize() - 6));
            } else {
                if (PelSpec::getIfdType($this->type) === '1') {
                    // IFD1 shouldn't link further...
                    Pel::maybeThrow(new PelIfdException('IFD1 links to another IFD!'));
                }
                $this->next = new PelIfd(PelSpec::getIfdIdByType('1'));
                $this->next->load($d, $o);
            }
        }

        Pel::debug(str_repeat("  ", $nesting_level) . "** End of loading IFD '%s'.", $this->getName());

        // Invoke post-load callbacks.
        foreach (PelSpec::getIfdPostLoadCallbacks($this->type) as $callback) {
            call_user_func($callback, $d, $this);
        }
    }

    final public static function createFromData($ifd_id, $tag_id, PelDataWindow $data, $ifd_offset, $seq)
    {
        $format = $data->getShort($ifd_offset + 12 * $seq + 2);
        $components = $data->getLong($ifd_offset + 12 * $seq + 4);
        // The data size. If bigger than 4 bytes, the actual data is
        // not in the entry but somewhere else, with the offset stored
        // in the entry.
        $size = PelFormat::getSize($format) * $components;
        if ($size > 0) {
            $data_offset = $ifd_offset + 12 * $seq + 8;
            if ($size > 4) {
                $data_offset = $data->getLong($data_offset);
            }
            $sub_data = $data->getClone($data_offset + $ifd_offset - 16, $size);
        } else {
            $data_offset = 0;
            $sub_data = new PelDataWindow();
        }

        try {
            $class = PelSpec::getTagClass($ifd_id, $tag_id, $format);
            $arguments = call_user_func($class . '::getInstanceArgumentsFromData', $ifd_id, $tag_id, $format, $components, $sub_data, $data_offset);
            return  call_user_func($class . '::createInstance', $ifd_id, $tag_id, $arguments);
        } catch (PelException $e) {
            // Throw the exception when running in strict mode, store
            // otherwise.
            Pel::maybeThrow($e);
        }
    }
}
