<?php


// CREATE TABLE test_table (
//    id int(11) NOT NULL AUTO_INCREMENT,
//    foo varchar(50) NOT NULL,
//    bar int(11) NOT NULL,
//    PRIMARY KEY (`id`)
// )


require_once __DIR__ . '/../../autoload.php';


class MysqlAdapterTest extends PHPUnit_Framework_TestCase
{
    public function testOperations()
    {
        $db = new \PhpBase\Db\Adapter\Mysql('mysql:host=127.0.0.1', 'root', '');
        $table = 'test.test_table';

        // Truncate table
        $this->assertInstanceOf('PDOStatement', $db->delete($table, []));

        // Check for no entries
        $this->assertEquals(0, $db->select($table)->rowCount());

        // Add 1 entry
        $this->assertInstanceOf('PDOStatement',
            $db->insert($table, ['foo' => '123', 'bar' => 456]));

        // Selecting it
        $result = $db->select($table);

        // Checking its the only one
        $this->assertEquals(1, $result->rowCount());

        // Getting row values
        $row = $result->fetchAll(PDO::FETCH_ASSOC)[0];

        $this->assertEquals('123', $row['foo']);
        $this->assertEquals(456, $row['bar']);

        // test update

        // test select where

        // test where update
    }
}
