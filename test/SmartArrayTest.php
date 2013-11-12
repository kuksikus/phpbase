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


    public function testAccess()
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


    public function testIterator()
    {
        $sm = new \PhpBase\SmartArray([
            'foo' => 'bar',
            'id' => 666
        ]);

        $iter = 2;
        while($iter--) {

            $foomet = false;
            $idmet = false;

            foreach ($sm as $key => $val) {

                switch($key) {
                    case 'foo':
                        $this->assertEquals('bar', $val);

                        if($foomet) return $this->fail();
                        $foomet = true;

                        break;

                    case 'id':
                        $this->assertEquals(666, $val);
                        if($idmet) return $this->fail();
                        $idmet = true;
                        break;

                    default:
                        $this->fail();
                }
            }

            if(!$foomet || !$idmet) return $this->fail();
        }
    }

}
