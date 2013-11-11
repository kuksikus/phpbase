<?php
/**
 * Автозагрузчик PHPBase
 */


define('PHPBASE_LIB', __DIR__ . DIRECTORY_SEPARATOR .
    'lib' . DIRECTORY_SEPARATOR);


/**
 * Регистрация автозагрузчика
 */
spl_autoload_register(
    function($className)
    {
        if (substr($className, 0, 8) === 'PhpBase\\') {
            $subPath = strtolower(substr($className, 8));
            $subPath = str_replace('\\', DIRECTORY_SEPARATOR, $subPath);

            $filePath = PHPBASE_LIB . $subPath . '.php';

            if (file_exists($filePath)) {
                require $filePath;
            }
        }
    }
);
