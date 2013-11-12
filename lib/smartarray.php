<?php
/**
 * Класс-обертка массива с дополнительными возможностями
 */


namespace PhpBase;


/**
 * Класс-обертка массива с дополнительными возможностями
 *
 * @package PhpBase
 */
class SmartArray implements \ArrayAccess, \Iterator
{
    /**
     * @var array
     */
    protected $_array = [];


    /**
     * Конструктор класса
     *
     * @param array $inital Начальное значение
     */
    public function __construct(array $inital = [])
    {
        $this->_array = $inital;
    }


    /**
     * Возвращает текущий элемент
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed
     */
    public function current()
    {
        return \current($this->_array);
    }


    /**
     * Двигает курсор на следущий элемент
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void
     */
    public function next()
    {
        \next($this->_array);
        return;
    }


    /**
     * Возвращает ключ текущего элемента
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed
     */
    public function key()
    {
        return \key($this->_array);
    }


    /**
     * Проверят валидность позиции курсора
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean
     */
    public function valid()
    {
        return \current($this->_array) !== false;
    }


    /**
     * Перемещает итератор в начало
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void
     */
    public function rewind()
    {
        \reset($this->_array);
        return;
    }

    /**
     * Проверяет существование элемента
     *
     * @param mixed $offset Позиция
     * @return boolean
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     */
    public function offsetExists($offset)
    {
        return isset($this->_array[$offset]);
    }

    /**
     * Возвращает элемент
     *
     * @param mixed $offset Позиция
     * @return mixed
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     */
    public function offsetGet($offset)
    {
        return isset($this->_array[$offset]) ? $this->_array[$offset] : null;
    }


    /**
     * Устанавливает значение
     *
     * @param mixed $offset Позция
     * @param mixed $value Значение
     * @return void
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     */
    public function offsetSet($offset, $value)
    {
        $this->_array[$offset] = $value;
        return;
    }


    /**
     * Удаляет элемент
     *
     * @param mixed $offset Позиция
     * @return void
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     */
    public function offsetUnset($offset)
    {
        unset($this->_array[$offset]);
        return;
    }
}
