<?php


namespace Action;

/**
 * Класс действия страницы приветствия
 */
class Hello implements \PhpBase\Mvc\IAction
{
    /**
     * Выполняет действие, возвращает ответ
     *
     * @param \PhpBase\Mvc\Request $request Объект запроса
     * @return \PhpBase\Mvc\Response
     */
    public function run(\PhpBase\Mvc\Request $request)
    {
        $response = new \PhpBase\Mvc\Response;
        $response->setBody('Привет, Мир!');
        return $response;
    }
}
