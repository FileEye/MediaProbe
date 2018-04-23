<?php

namespace ExifEye\core\Utility;

use Monolog\Formatter\LineFormatter;

/**
 * Formats incoming records into a one-line suitable for dump debug.
 */
class DumpLogFormatter extends LineFormatter
{
    const MAX_PATH = 50;

    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        // Level.
        $output = str_pad($record['level_name'], 7, ' ') . ' > ';

        // Path.
        if (isset($record['context']['path'])) {
            $path = $record['context']['path'];
            $nesting = count(explode('/', $path));
            if (strlen($path) < static::MAX_PATH) {
                $path = str_pad($path, static::MAX_PATH, ' ');
            }
            if (strlen($path) > static::MAX_PATH) {
                $path = '...' . substr($path, -27);
            }
            $output .= $path . ' > ';
        } else {
            $nesting = 0;
            $output .= str_repeat(' ', static::MAX_PATH) . ' > ';
        }

        // Indentation.
        $output .= str_repeat(' ', $nesting);

        // Message.
        $output .= $record['message'];

        $output .= "\n";
        return $output;
    }
}
