<?php



use MongoDB\Client;

class BaseMongoDB
{
	private $client;
	private $db;
	private $collection;

	public function __construct($db,$collection)
	{
		$this->client = new MongoDB\Client("mongodb://localhost:27017");
		$this->db = $this->client->{$db};
		$this->collection = $this->db->{$collection};
	}
	
	public function get( $clave, $valor ){
		$result = $this->collection->find( [ $clave => $valor ] );
		$response = [];
		
		if( $result->isDead() ){
			return $response;
		}
		
		foreach ($result as  $value) {
			$response[] = (array) $value;
		}
		return $response;
	}
	
	public function insert( $id, $valor) : bool{
		if( !$this->collection->findOne( [ 'id' => $id ] ) )
		{
			$result = $this->collection->insertOne( [ 'id' => $id, 'value' => $valor ] );
			if($result->isAcknowledged() == 1){
				return true;
			}else {
				return false;
			}		
		}else {
			return false;
		}
	}
	
	public function update( $id, $valor ){
		$response = $this->collection->findOneAndUpdate( 
			[ 'id' => $id ],
			[ '$set' =>  ['id' => $id, 'value' => $valor ]]);
		return $response != NULL ? true : false;	
	}

	public function drop(){
		$result = $this->collection->drop();
		$response = false;
		if ((array) $result['ok']){
			$response = true;
		}
		return $response;
	}

	public function delete( $id ){
		$deleteResult = $this->collection->deleteOne([ 'id' => $id ]);
		return $deleteResult->getDeletedCount() > 0 ? true : false; 
	}



}
