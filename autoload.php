<?php

/**
 * Register autoloader for ExifEye.
 */
spl_autoload_register(function ($class) {
    if (substr_compare($class, 'ExifEye\\core\\', 0, 13) === 0) {
        $classname = str_replace('ExifEye\\core\\', '', $class);
        $load = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $classname . '.php');
        if ($load !== false) {
            include_once realpath($load);
        }
    }
});
