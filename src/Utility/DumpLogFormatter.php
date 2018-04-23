<?php

namespace ExifEye\core\Utility;

use Monolog\Formatter\LineFormatter;

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
        $output = str_pad($record['level_name'], 7, ' ') . ' > ';
        if (isset($record['context']['path'])) {
            $path = $record['context']['path'];
            if (strlen($path) < 30) {
                $path = str_pad($path, 30, ' ');
            }
            if (strlen($path) > 30) {
                $path = '...' . substr($path, -27);
            }
            $output .= $path . ' > ';
        } else {
            $output .= str_pad(' ', 30, ' ') . ' > ';
        }
        $output .= "\n";
        return $output;
    }
}
