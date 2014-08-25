<?php


namespace Action;

/**
 * Класс действия для главной страницы
 */
class Index implements \PhpBase\Mvc\IAction
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
        $response->setBody('Чтобы поздороваться с миром, нажми на <a href="/hello">ссылку</a>');
        return $response;
    }
}
