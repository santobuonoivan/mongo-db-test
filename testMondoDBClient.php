<?php

    declare(strict_types=1);

    require "./vendor/autoload.php";
    require "./BaseMongoDB.php";
    

    use PHPUnit\Framework\TestCase;

    final class EmailTest extends TestCase
    {
        private $db;

        public function setUp() : void {
            $this->db = new BaseMongoDB('testMongoDB'.rand(1,100), 'testMongoDBCollection'.rand(1,100));
        }

        
        public function tearDown() : void {            
            $this->db->drop();
        }

        public function testPush()
        {
            array_push($this->stack, 'foo');
            $this->assertEquals('foo', $this->stack[count($this->stack)-1]);
            $this->assertFalse(empty($this->stack));
        }

        public function testPop()
        {
            array_push($this->stack, 'foo');
            $this->assertEquals('foo', array_pop($this->stack));
            $this->assertTrue(empty($this->stack));
        }
        
    }