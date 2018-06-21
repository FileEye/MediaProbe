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

use ExifEye\core\ElementInterface;
use ExifEye\core\Entry\Core\EntryInterface;
use ExifEye\core\ExifEye;
use ExifEye\core\Image;
use ExifEye\core\Spec;
use ExifEye\core\DataWindow;
use ExifEye\core\Utility\ConvertBytes;
use ExifEye\core\Block\Jpeg;
use ExifEye\core\Block\Tiff;
use Monolog\Handler\StreamHandler;
use ExifEye\core\Utility\DumpLogFormatter;

function dump_element(ElementInterface $element)
{
    if ($element instanceof EntryInterface) {
        $ifd_name = $element->getParentElement()->getParentElement()->getAttribute('name');
        $tag_title = Spec::getTagTitle($element->getParentElement()->getParentElement(), $element->getParentElement()->getAttribute('id')) ?: '*** UNKNOWN ***';
        print substr(str_pad($ifd_name . '/' . $tag_title, 30, ' '), 0, 30) . ' = ' . $element->toString() . "\n";
    }

    foreach ($element->query('*') as $sub_element) {
        dump_element($sub_element);
    }
}

/* Make PEL speak the users language, if it is available. */
setlocale(LC_ALL, '');

require_once dirname(__FILE__) . '/../vendor/autoload.php';

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

/* Set logging */
$log_handler = new StreamHandler('php://stdout');
$log_formatter = new DumpLogFormatter();
$log_handler->setFormatter($log_formatter);
ExifEye::logger()->pushHandler($log_handler);

/* Load data from file */
$image = Image::loadFromFile($file);

if ($image->root() === null) {
    print("dump-image: Unrecognized image format!\n");
    exit(1);
}

dump_element($image->root());
