<?php

namespace FileEye\MediaProbe\Utility;

class HexDump
{
    /**
     * Dumps a string of bytes in a human readable sequence of hex couples.
     */
    public static function dumpHex(string $input, ?int $dump_length = null): ?string
    {
        $input_length = strlen($input);

        if ($input_length === 0) {
            return null;
        }

        if ($dump_length === null) {
            $dump_length = $input_length;
        }

        $ret = '[ ';

        if ($input_length <= $dump_length) {
            $dump_length = $input_length;
            $tmp = substr($input, 0, $dump_length);
            $tmp = bin2hex($tmp);
            $tmp = strtoupper($tmp);
            $ret .= chunk_split($tmp, 2, ' ');
        } else {
            $left_length = round($dump_length / 2);
            $tmp = substr($input, 0, $left_length);
            $tmp = bin2hex($tmp);
            $tmp = strtoupper($tmp);
            $ret .= chunk_split($tmp, 2, ' ');
            $ret .= '... ';
            $right_length = $dump_length - $left_length;
            $tmp = substr($input, -$right_length);
            $tmp = bin2hex($tmp);
            $tmp = strtoupper($tmp);
            $ret .= chunk_split($tmp, 2, ' ');
        }

        $ret .= ']';

        return $ret;
    }

    public static function dumpHexFormatted(string $data, string $newline = "\n")
    {
        static $from = '';
        static $to = '';

        static $width = 16; # number of bytes per line

        static $pad = '.'; # padding for non-visible characters

        $ret = '';

        if ($from === '') {
            for ($i = 0; $i<=0xFF; $i++) {
                $from .= chr($i);
                $to .= ($i >= 0x20 && $i <= 0x7E) ? chr($i) : $pad;
            }
        }

        $hex = str_split(bin2hex($data), $width*2);
        $chars = str_split(strtr($data, $from, $to), $width);

        $offset = 0;
        foreach ($hex as $i => $line) {
            $row = sprintf('%6X', $offset) . ' : ' . implode(' ', str_split($line, 2)) . ' [' . $chars[$i] . ']' . $newline;
            $ret .= $row;
            $offset += $width;
        }

        return $ret;
    }

    public static function dumpIntHex(mixed $data): string
    {
        if (is_numeric($data)) {
            return $data . '/0x' . strtoupper(dechex($data));
        }
        return "'$data'";
    }
}
