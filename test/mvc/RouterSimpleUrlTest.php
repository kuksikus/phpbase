<?php



require_once __DIR__ . '/../autoload.php';

require_once 'ActionStub.php';


$_SERVER['REQUEST_URI'] = '';

class RouterSimpleUrlTest extends PHPUnit_Framework_TestCase
{
    public  function testIndex()
    {
        $router = new PhpBase\Mvc\Router\SimpleUrl('TestNamespace\\');
        $request = $this->getMock('\PhpBase\Mvc\Request', ['getPath']);
        $request->method('getPath')->will($this->returnValue(''));
        $this->assertTrue($router->getAction($request) instanceof TestNamespace\Index);
    }

    public  function testAction()
    {
        $router = new PhpBase\Mvc\Router\SimpleUrl('TestNamespace\\');
        $request = $this->getMock('\PhpBase\Mvc\Request', ['getPath']);
        $request->method('getPath')->will($this->returnValue('subname/action'));
        $this->assertTrue($router->getAction($request) instanceof TestNamespace\subname\Action);
    }


    public  function testNotfound()
    {
        $router = new PhpBase\Mvc\Router\SimpleUrl('TestNamespace\\');
        $request = $this->getMock('\PhpBase\Mvc\Request', ['getPath']);
        $request->method('getPath')->will($this->returnValue('notexists'));
        $this->assertTrue($router->getAction($request) instanceof TestNamespace\Notfound);
    }
}
