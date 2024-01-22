#!/usr/bin/php
<?php

/**
 * FileEye/MediaProbe
 *
 * A PHP library for reading and writing media files metadata.
 */

use FileEye\MediaProbe\Model\ElementInterface;
use FileEye\MediaProbe\Model\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\InvalidFileException;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\Data\DataWindow;
use FileEye\MediaProbe\Utility\ConvertBytes;
use FileEye\MediaProbe\Block\Jpeg;
use FileEye\MediaProbe\Block\Tiff;
use FileEye\MediaProbe\Utility\DumpLogFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\TestHandler;
use Monolog\Processor\PsrLogMessageProcessor;

function dump_element(ElementInterface $element)
{
    if ($element instanceof EntryInterface) {
        $ifd_name = $element->getParentElement()->getParentElement()->getAttribute('name') ?: $element->getParentElement()->getAttribute('name');
        //$tag_title = $element->getParentElement()->getAttribute('name') ?: '*na*';
        $tag_title = $element->getParentElement()->getCollection()->getPropertyValue('title') ?? '*na*';
        print substr(str_pad($ifd_name . '/' . $tag_title, 50, ' '), 0, 50) . ' = ' . $element->toString(['format' => 'exiftool']) . "\n";
    }

    foreach ($element->getMultipleElements('*') as $sub_element) {
        dump_element($sub_element);
    }
}

/**
 * Converts bytes into human readable file size.
 *
 * @param string $bytes
 * @return string human readable file size (2,87 Мб)
 * @author Mogilev Arseny
 */
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

/* Make MediaProbe speak the users language, if it is available. */
setlocale(LC_ALL, '');

require_once dirname(__FILE__) . '/../vendor/autoload.php';

$prog = array_shift($argv);
$file = '';
$logger = null;
$fail_on_error = false;
$write_back = false;

while (! empty($argv)) {
    switch ($argv[0]) {
        case '-d':
            $logger = new Logger('dump-media');
            $log_handler = new StreamHandler('php://stdout');
            $log_formatter = new DumpLogFormatter();
            $log_handler->setFormatter($log_formatter);
            $logger
                ->pushHandler($log_handler)
                ->pushProcessor(new PsrLogMessageProcessor());
            break;
        case '-s':
            $fail_on_error = 'error';
            break;
        case '-w':
            $write_back = true;
            break;
        default:
            $file = $argv[0];
            break;
    }
    array_shift($argv);
}

if (empty($file)) {
    printf("Usage: %s [-d] [-s] <filename>\n", $prog);
    print("Optional arguments:\n");
    print("  -d        turn debug output on.\n");
    print("  -s        turn strict parsing on (halt on errors).\n");
    print("  -w        write back after parsing.\n");
    print("Mandatory arguments:\n");
    print("  filename  a media file.\n");
    exit(1);
}

if (!is_readable($file)) {
    printf("dump-media: Unable to read %s!\n", $file);
    exit(1);
}

try {
    /* Load data from file */
    $baseline_memory = FileSizeConvert(memory_get_usage());
    $media = Media::parseFromFile($file, $logger, $fail_on_error);
    $max_memory = FileSizeConvert(memory_get_peak_usage());
    $curr_memory = FileSizeConvert(memory_get_usage());
    if ($media === null) {
        print("dump-media: Unrecognized media format!\n");
        exit(1);
    }
    if ($write_back) {
        $media->saveToFile($file . '-rewrite.img');
    }
} catch (InvalidFileException $e) {
    $err = $e->getMessage();
}

if (!isset($err)) {
    dump_element($media);
    print "\n\n Base: $baseline_memory Curr: $curr_memory Max: $max_memory \n\n";
} else {
    print("dump-media: Error while reading media file: " . $err . "\n");
}

exit(0);  // xx decide exit code
