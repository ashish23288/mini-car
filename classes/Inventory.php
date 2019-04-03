<?php
class Inventory {
	private $conn;
	private $table1 = 'manufacturer';
	private $table2 = 'model';
	
	public  $model_id;

	public function __construct($db){
		$this->conn = $db;
	}
	
	public function getUnsoldRecords(){
		try{
			$query = 'SELECT a.manufacturer_name,b.model_name, COUNT(b.model_id) as count FROM '.$this->table1.' a LEFT JOIN '.$this->table2.' b ON a.m_id = b.manufacturer_id WHERE status="N" group by b.model_name';
			$stmt  = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
	}
	
	public function getUnsoldRecordsByModel(){
		try{
			$query = 'SELECT * FROM '.$this->table2.' WHERE model_name=:model_name and status="N"';
			$stmt  = $this->conn->prepare($query);
			$stmt->bindParam(':model_name',$this->model_name);
			$stmt->execute();
			return $stmt;
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
	}
	
	public function update(){
		
		try{
			$query = 'UPDATE '.$this->table2.' SET `status` = "Y" WHERE model_id = :model_id';
			$stmt  = $this->conn->prepare($query);
			
			$this->model_id = htmlspecialchars(strip_tags($this->model_id));
			$stmt->bindParam(':model_id',$this->model_id);
			
			return $stmt->execute();
			
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
		
	}
	
}