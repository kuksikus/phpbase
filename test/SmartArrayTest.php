<?php


require_once __DIR__ . '/../autoload.php';


class SmartArrayTest extends PHPUnit_Framework_TestCase
{
    public  function testInstance()
    {
        $sm = new \PhpBase\SmartArray([]);

        $this->assertInstanceOf('\ArrayAccess', $sm);
        $this->assertInstanceOf('\Iterator', $sm);
    }


    public  function testAccess()
    {
        $sm = new \PhpBase\SmartArray([
            'foo' => 'bar',
            'id' => 666
        ]);

        $this->assertEquals('bar', $sm['foo']);
        $this->assertEquals(666, $sm['id']);
        $this->assertEquals(null, $sm['nonexists']);

        $this->assertTrue(isset($sm['id']));
    }

}
