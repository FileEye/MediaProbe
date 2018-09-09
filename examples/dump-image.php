#!/usr/bin/php
<?php

/**
 * PEL: PHP Exif Library.
 * A library with support for reading and
 * writing all Exif headers in JPEG and TIFF images using PHP.
 *
 * Copyright (C) 2004, 2005, 2006 Martin Geisler.
 */

use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\ExifEyeException;
use ExifEye\core\Image;
use ExifEye\core\Spec;
use ExifEye\core\Data\DataWindow;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tiff;
use ExifEye\core\Utility\DumpLogFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\TestHandler;
use Monolog\Processor\PsrLogMessageProcessor;

function dump_element(ElementInterface $element)
{
    if ($element instanceof EntryInterface) {
        $ifd_name = $element->getParentElement()->getParentElement()->getAttribute('name');
        $tag_title = Spec::getElementTitle($element->getParentElement()->getParentElement()->getType(), $element->getParentElement()->getAttribute('id')) ?: '*** UNKNOWN ***';
        print substr(str_pad($ifd_name . '/' . $tag_title, 30, ' '), 0, 30) . ' = ' . $element->toString() . "\n";
    }

    foreach ($element->getMultipleElements('*') as $sub_element) {
        dump_element($sub_element);
    }
}

/* Make PEL speak the users language, if it is available. */
setlocale(LC_ALL, '');

require_once dirname(__FILE__) . '/../vendor/autoload.php';

$prog = array_shift($argv);
$file = '';
$logger = null;
$fail_on_error = false;

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
} catch (ExifEyeException $e) {
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
