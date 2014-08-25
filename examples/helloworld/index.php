<?php
/**
 * Пример простейшего приложения
 *
 * Демонстрирует базовую функциональность
 * библиотеки по направлению запросов на указанные действия.
 *
 * Index и Notfound используются маршрутизатором, их наличие не обязательно.
 * URL /hello ведет на действие Action/Hello
 *
 */

use PhpBase\Mvc\Application;
use PhpBase\Mvc\Request;
use PhpBase\Mvc\Router\SimpleUrl;

require __DIR__ . '/../initexamples.php';

require __DIR__ . '/action/index.php';
require __DIR__ . '/action/notfound.php';
require __DIR__ . '/action/hello.php';

(new Application)->run(new Request, new SimpleUrl('Action\\'));
