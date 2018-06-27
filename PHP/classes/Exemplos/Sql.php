<?php 

/**
 * Função que executa o PDO e conversa com o banco.
 */
class Sql extends PDO
{
	private $conn;

	public function __construct()
	{
		$this->conn = new PDO("mysql:host=localhost;dbname=dbdomi_challenge","root","root");
	}

	private function setParams($statement,$parameters=array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($key,$value);
		}
	}
	private function setParam($statement,$key,$value){
		$statement ->bindParam($key,$value);
	}

	public function query($rowQuery,$params=array()){
		$stmt = $this->conn->prepare($rowQuery);
		$this->setParams($stmt,$params);
		$stmt -> execute();
		return $stmt;
	}

	public function select($rowQuery,$params=array()):array{
		$stmt = $this->query($rowQuery,$params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);


	}

}


?>