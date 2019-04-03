<?php
class Manufacturer {
	private $conn;
	private $table1 = 'manufacturer';

	public  $name;

	public function __construct($db){
		$this->conn = $db;
	}

	public function create(){

		try{
			$query = 'INSERT INTO '.$this->table1.' SET `manufacturer_name` = :manufacturer_name';
			$stmt  = $this->conn->prepare($query);

			$this->name = htmlspecialchars(strip_tags($this->name));

			$stmt->bindParam(':manufacturer_name',$this->name);

			return $stmt->execute();

		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}

	}

	public function getAllManufacturer(){
		try{
			$query = 'SELECT * FROM '.$this->table1;
			$stmt  = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
	}
}
