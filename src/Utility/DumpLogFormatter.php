<?php

namespace ExifEye\core\Utility;

use Monolog\Formatter\LineFormatter

/**
 * Formats incoming records into a one-line suitable for dump debug.
 */
class DumpLogFormatter extends LineFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
dump($record);
        $output = str_pad($record['level_name'], 7, ' ') . ' > ';
        $output .= "\n";
        return $output;
    }
}