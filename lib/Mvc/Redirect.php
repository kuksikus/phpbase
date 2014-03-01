<?php
/**
 * Файл класса ответа - перенаправление
 */

namespace PhpBase\Mvc;

/**
 * Класс ответа - перенаправление
 */
class Redirect extends Response
{
    /**
     * Конструктор
     *
     * @param string $location Куда
     * @param int $code С каким кодом
     */
    public function __construct($location, $code = 303)
    {
        $this->setHeader('Location', $location);
        $this->setStatus($code);
    }
}