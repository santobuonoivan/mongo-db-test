<?php

require 'vendor/autoload.php';

use MongoDB\Client;

class BaseMongoDB
{
	private $db;

	public function __construct()
	{
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		$this->db = $cliente->cola->items;
	}
	
	public function get( $id ){
		$response = $this->db->findOne( [ 'id' => $id ] );
		var_dump($response);
		return $response === NULL ? false : $response;
	}
	
	public function insert( $id, $valor){
		if( !$this->db->findOne( [ 'id' => $id ] ) )
		{
			$this->db->insertOne( [ 'id' => $id, 'value' => $valor ] );			
			return true;
		}else {
			return false;
		}
	}
	
	public function update( $id, $valor ){
		$response = $this->db->findOneAndUpdate( 
			[ 'id' => $id ],
			[ '$set' =>  ['id' => $id, 'value' => $valor ]]);
		return $response != NULL ? true : false;	
	}

	public function delete( $id ){
		$deleteResult = $this->db->deleteOne([ 'id' => $id ]);
		return $deleteResult->getDeletedCount() > 0 ? true : false; 
	}



}
