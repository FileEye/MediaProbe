<?php

namespace FileEye\MediaProbe\Entry;

use FileEye\MediaProbe\Entry\Core\Undefined;

/**
 * Class to hold version information.
 */
class Version extends Undefined
{
    /**
     * {@inheritdoc}
     */
    protected string $name = 'Version';

    protected function validateDataElement(): void
    {
        if (!is_numeric($this->dataElement->getBytes())) {
            $this->warning('Incorrect version data.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getValue(array $options = []): mixed
    {
        $format = $options['format'] ?? null;
        if (in_array($format, ['phpExif', 'exiftool'])) {
            return $this->dataElement->getBytes();
        }
        if (is_numeric($this->dataElement->getBytes())) {
            $version = $this->dataElement->getBytes() / 100;
        } else {
            $version = 0;
        }
        $major = floor($version);
        $minor = ($version - $major) * 100;

        return $version . ($minor === 0.0 ? '.0' : '');
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->getValue($options);
    }
}
