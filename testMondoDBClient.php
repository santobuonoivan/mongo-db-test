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
            $this->assertEquals(true,$this->db->insert(1,'ivan') );
            $this->assertFalse( $this->db->insert(1,'ivan') );
        }
        
        public function testPop()
        {   $this->db->insert( 1 ,'ivan' );
            $this->assertIsArray( $this->db->get('id', 1) );
        }

        public function testCountPop()
        {   $this->db->insert( 1 ,'ivan' );
            $this->db->insert( 2 ,'ivan' );
            $this->db->insert( 3 ,'ivan' );
            $this->db->insert( 4 ,'ivan' );
            $this->assertEquals( 4, count( $this->db->get( 'value', 'ivan' ) ) );
        }

        public function testCountNullPop()
        {   
            $this->db->insert( 1 ,'ivan' );

            $this->assertEquals( 0, count( $this->db->get( 'value', 'pepe' ) ) );
        }
        
    }