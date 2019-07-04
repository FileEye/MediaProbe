#!/usr/bin/php
<?php

/**
 * PEL: PHP Exif Library.
 * A library with support for reading and
 * writing all Exif headers in JPEG and TIFF images using PHP.
 *
 * Copyright (C) 2004, 2005, 2006 Martin Geisler.
 */

use FileEye\ImageInfo\core\ElementInterface;
use FileEye\ImageInfo\core\Entry\Core\EntryInterface;
use FileEye\ImageInfo\core\ImageInfo;
use FileEye\ImageInfo\core\ImageInfoException;
use FileEye\ImageInfo\core\Image;
use FileEye\ImageInfo\core\Collection;
use FileEye\ImageInfo\core\Data\DataWindow;
use FileEye\ImageInfo\core\Utility\ConvertBytes;
use FileEye\ImageInfo\core\Block\Jpeg;
use FileEye\ImageInfo\core\Block\Tiff;
use FileEye\ImageInfo\core\Utility\DumpLogFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\TestHandler;
use Monolog\Processor\PsrLogMessageProcessor;

function dump_element(ElementInterface $element)
{
    if ($element instanceof EntryInterface) {
        $ifd_name = $element->getParentElement()->getParentElement()->getAttribute('name') ?: $element->getParentElement()->getAttribute('name');
        $tag_title = $element->getParentElement()->getAttribute('name') ?: '*na*';
        print substr(str_pad($ifd_name . '/' . $tag_title, 30, ' '), 0, 30) . ' = ' . $element->toString() . "\n";
    }

    foreach ($element->getMultipleElements('*') as $sub_element) {
        dump_element($sub_element);
    }
}

/* Make ImageInfo speak the users language, if it is available. */
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
            $logger = new Logger('dump-image');
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
    print("  filename  a JPEG or TIFF image.\n");
    exit(1);
}

if (!is_readable($file)) {
    printf("dump-image: Unable to read %s!\n", $file);
    exit(1);
}

try {
    /* Load data from file */
    $image = Image::createFromFile($file, $logger, $fail_on_error);
    if ($image === null) {
        print("dump-image: Unrecognized image format!\n");
        exit(1);
    }
    if ($write_back) {
        $image->saveToFile($file . '-rewrite.img');
    }
} catch (ImageInfoException $e) {
    $err = $e->getMessage();
}

if (!isset($err)) {
    dump_element($image);
} else {
    print("dump-image: Error while reading image: " . $err . "\n");
}

// Dump via exif_read_data().
//dump(@exif_read_data($file));

exit(0);  // xx decide exit code
