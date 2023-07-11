<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\Undefined;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class for an EXIF user comment.
 *
 * This class is used to hold user comments, which can come in several different
 * character encodings.
 *
 * The string can be encoded with a different encoding, and if so, the encoding
 * must be given using the second argument. The Exif standard specifies three
 * known encodings: 'ASCII', 'JIS', and 'Unicode'. If the user comment is
 * encoded using a character encoding different from the three known encodings,
 * then the empty string should be passed as encoding, thereby specifying that
 * the encoding is undefined.
 */
class ExifUserComment extends Undefined
{
    protected function validateDataElement(): void
    {
        $value = $this->dataElement->getBytes();

        if (strlen($value) < 8) {
            $this->valid = false;
        } else {
            $encoding = strtoupper(rtrim(substr($value, 0, 8), "\x00"));
            if (!in_array($encoding, ['', 'ASCII', 'JIS', 'UNICODE'])) {
                $this->valid = false;
            }
        }

        if (!$this->valid) {
            $this->warning('Invalid EXIF text encoding for UserComment.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        if ($format === 'exiftool') {
            $value = rtrim(substr($this->dataElement->getBytes(), 8), " \x00");
            return rtrim($value, " ");
        }
        if ($format === 'phpExif') {
            $encoding = rtrim(substr($this->dataElement->getBytes(), 0, 8), "\x00");
            $value = rtrim(substr($this->dataElement->getBytes(), 8), " \x00");
            if (strlen($value) === 0 && substr($this->dataElement->getBytes(), 8, 1) === ' ') {
                $value = ' ';
            }
            if (in_array($encoding, ['', 'ASCII', 'JIS', 'UNICODE'])) {
                return str_pad($encoding, 8, chr(0)) . str_pad($value, strlen($this->dataElement->getBytes()) - 8, chr(0));
            } else {
                return rtrim($this->dataElement->getBytes(), "\x00");
            }
        }
        return rtrim(substr($this->dataElement->getBytes(), 8), "\x00");
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->valid ? $this->getValue($options) : '';
    }
}
