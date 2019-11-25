<?php

/**
 * Register autoloader for ImageProbe.
 */
spl_autoload_register(function ($class) {
    if (substr_compare($class, 'FileEye\\ImageProbe\\core\\', 0, 24) === 0) {
        $classname = str_replace('FileEye\\ImageProbe\\core\\', '', $class);
        $load = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $classname . '.php');
        if ($load !== false) {
            include_once realpath($load);
        }
    }
});
