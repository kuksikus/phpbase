<?php


namespace Action;

/**
 * Класс действия для отсутствующих страниц
 */
class Notfound implements \PhpBase\Mvc\IAction
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
        $response->setBody('Привет не найден!');
        $response->setStatus(404);
        return $response;
    }
}
