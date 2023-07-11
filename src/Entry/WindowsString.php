<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Model\BlockBase;
use FileEye\MediaProbe\ItemDefinition;
use FileEye\MediaProbe\Data\DataElement;
use FileEye\MediaProbe\Entry\Core\EntryBase;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\Utility\ConvertBytes;

/**
 * Class used to manipulate strings in the format Windows XP uses.
 *
 * When examining the file properties of an image in Windows XP one can fill in
 * title, comment, author, keyword, and subject fields.
 * Filling those fields and pressing OK will result in the data being written
 * into the Exif data in the image.
 *
 * The data is written in a non-standard format and can thus not be loaded
 * directly --- this class is needed to translate it into normal PHP strings.
 */
class WindowsString extends EntryBase
{
      // xx @todo to be cleaned up as when back to byest is not identical

    /**
     * {@inheritdoc}
     */
    protected string $name = 'WindowsString';

    /**
     * {@inheritdoc}
     */
    protected string $formatName = 'Byte';

    protected function validateDataElement(): void
    {
        $this->debug("text: {text}", ['text' => $this->toString()]);
    }

    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        $type = $options['type'] ?? 'php';
        switch ($format) {
            case 'phpExif':
                $decoded = mb_convert_encoding($this->dataElement->getBytes(), '8bit', 'UCS-2LE');
                $trimmed = rtrim($decoded, "\0");
                // As of PHP 8.1, illegal characters are replaced with a '?' character. For exiftool and BC
                // with earlier PHP versions we remove them.
                return str_replace('?', '', $trimmed);
            case 'exiftool':
                return $this->toString($options);
            default:
                switch ($type) {
                    case 'php':
                        return $this->toString($options) . chr(0);
                    default:
                        return $this->toString($options);
                }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        $format = $options['format'] ?? null;
        $type = $options['type'] ?? 'php';
        switch ($type) {
            case 'php':
                $decoded = mb_convert_encoding($this->dataElement->getBytes(), 'UTF-8', 'UCS-2LE');
                $trimmed = rtrim($decoded, "\0");
                // As of PHP 8.1, illegal characters are replaced with a '?' character. For exiftool and BC
                // with earlier PHP versions we remove them.
                return str_replace('?', '', $trimmed);
            default:
                return $this->dataElement->getBytes();
        }
    }
}
