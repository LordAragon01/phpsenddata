<?php

namespace Source\Bd;

use PDOException;

class Connect {

	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "root";
	const DBNAME = "optigest_db";

	private $conn;

	public function __construct()
	{

		try{

			$this->conn = new \PDO(
				"mysql:dbname=".Connect::DBNAME.";charset=utf8".";host=".Connect::HOSTNAME,
				Connect::USERNAME,
				Connect::PASSWORD
			);  

		}catch(PDOException $exception){

			var_dump($exception);

		}
	

	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_OBJ);

	}

	public function selectOnly($rawQuery):array
	{

		$stmt = $this->conn->prepare($rawQuery);

		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);

	}

}
