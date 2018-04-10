<?php

namespace ExifEye\core\Entry;

/**
 * Decode text for an Interoperability/InteroperabilityVersion tag.
 */
class InteroperabilityVersion extends VersionBase
{
    /**
     * {@inheritdoc}
     */
    protected static $stringElement = 'Interoperability';
}
