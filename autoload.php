<?php

/**
 * Register autoloader for ImageInfo.
 */
spl_autoload_register(function ($class) {
    if (substr_compare($class, 'FileEye\\ImageInfo\\core\\', 0, 13) === 0) {
        $classname = str_replace('FileEye\\ImageInfo\\core\\', '', $class);
        $load = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $classname . '.php');
        if ($load !== false) {
            include_once realpath($load);
        }
    }
});
