<?php
/**
 * Маршрутизатор запросов на основе URL.
 *
 * Использует путь запроса в качестве имени класс действия.
 * Разделители пути заменяются на разделители пространств имен.
 *
 * Использует имя `Index`, если путь запроса пуст,
 * и `Notfound` если класс не найден по указанному пути.
 */

namespace PhpBase\Mvc\Router;

use PhpBase\Mvc\IAction;
use PhpBase\Mvc\IRouter;
use PhpBase\Mvc\Request;

/**
 * Маршрутизатор запросов на основе URL
 */
class SimpleUrl implements IRouter
{
    /**
     * Префикс имени классов
     *
     * @var string
     */
    protected $_prefix;


    /**
     * Конструктор класса
     *
     * @param string $prefix Префикс имени классов
     */
    public function __construct($prefix = '')
    {
        $this->_prefix = $prefix;
    }


    /**
     * Возвращает объект действия для запроса
     *
     * @param Request $request Объект запроса
     * @return IAction
     */
    public function getAction(Request $request)
    {
        $path = trim($request->getPath(), '/ ');
        $path = str_replace('/', ' ', $path);
        $path = str_replace(' ', '\\', ucwords($path));

        if (empty($path)) {
            $path = 'Index';
        }

        $actionClass = $this->_prefix . $path;
        $actionObject = null;

        if (class_exists($actionClass)) {
            $actionObject = new $actionClass;
        } else if (class_exists($actionClass = $this->_prefix . 'Notfound')) {
            $actionObject = new $actionClass;
        }

        return ($actionObject !== null && $actionObject instanceof IAction) ?
            $actionObject : null;
    }
}
