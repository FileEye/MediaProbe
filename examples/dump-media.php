#!/usr/bin/php
<?php

/**
 * FileEye/MediaProbe
 *
 * A PHP library for reading and writing media files metadata.
 */

use FileEye\MediaProbe\ElementInterface;
use FileEye\MediaProbe\Entry\Core\EntryInterface;
use FileEye\MediaProbe\MediaProbe;
use FileEye\MediaProbe\InvalidFileException;
use FileEye\MediaProbe\Media;
use FileEye\MediaProbe\Collection;
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
    $media = Media::loadFromFile($file, $logger, $fail_on_error);
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
} else {
    print("dump-media: Error while reading media file: " . $err . "\n");
}

// Dump via exif_read_data().
//dump(@exif_read_data($file));

exit(0);  // xx decide exit code
