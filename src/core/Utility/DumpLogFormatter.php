<?php

namespace ExifEye\core\Utility;

use Bramus\Monolog\Formatter\ColoredLineFormatter;

/**
 * Formats incoming records into a one-line suitable for dump debug.
 */
class DumpLogFormatter extends ColoredLineFormatter
{
    const MAX_PATH = 40;

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
            $nesting = count(explode('/', $path)) - 1;
            if (strlen($path) < static::MAX_PATH) {
                $path = str_pad($path, static::MAX_PATH, ' ', STR_PAD_LEFT);
            }
            if (strlen($path) > static::MAX_PATH) {
                $path = '...' . substr($path, -static::MAX_PATH + 3);
            }
            $output .= $path . ' > ';
        } else {
            $nesting = 0;
            $output .= str_repeat(' ', static::MAX_PATH) . ' > ';
        }

        // Message.
        $output .= substr(str_repeat(' ', $nesting) . $record['message'], 0, static::MAX_PATH * 2);

        return $this->getColorScheme()->getColorizeString($record['level']). $output . $this->getColorScheme()->getResetString() . "\n";
    }
}
