#!/usr/bin/php
<?php

/**
 * PEL: PHP Exif Library.
 * A library with support for reading and
 * writing all Exif headers in JPEG and TIFF images using PHP.
 *
 * Copyright (C) 2004, 2005, 2006 Martin Geisler.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program in the file COPYING; if not, write to the
 * Free Software Foundation, Inc., 51 Franklin St, Fifth Floor,
 * Boston, MA 02110-1301 USA
 */

/* Make PEL speak the users language, if it is available. */
setlocale(LC_ALL, '');

require_once dirname(__FILE__) . '/../vendor/autoload.php';

use ExifEye\core\ExifEye;
use ExifEye\core\DataWindow;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tiff;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

$prog = array_shift($argv);
$file = '';

while (! empty($argv)) {
    switch ($argv[0]) {
        case '-d':
            ExifEye::setDebug(true);
            break;
        case '-s':
            ExifEye::setStrictParsing(true);
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

if (! is_readable($file)) {
    printf("Unable to read %s!\n", $file);
    exit(1);
}

/*
 * We typically need lots of RAM to parse TIFF images since they tend
 * to be big and uncompressed.
 */
ini_set('memory_limit', '32M');

$data = new DataWindow(file_get_contents($file));

if (Jpeg::isValid($data)) {
    $img = new Jpeg();
} elseif (Tiff::isValid($data)) {
    $img = new Tiff();
} else {
    print("Unrecognized image format! The first 16 bytes follow:\n");
    ConvertBytes::dump($data->getBytes(0, 16));
    exit(1);
}

/* Set logging */
$log_handler = new StreamHandler('php://stdout');
$log_formatter = new LineFormatter("%level_name% > %context.path% > %message% \n");
$log_handler->setFormatter($log_formatter);
ExifEye::logger()->pushHandler($log_handler);

/* Try loading the data. */
$img->load($data);

print($img);
