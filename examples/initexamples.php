<?php
/**
 * Инициализация примеров
 *
 */

/**
 * Регистрация автозагрузчика PSR-4
 *
 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
 */
spl_autoload_register(function ($class) {

    $prefix = 'PhpBase\\';
    $base_dir = __DIR__ . '/../lib/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

