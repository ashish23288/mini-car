<?php
class Database {
	private $host 	   = 'localhost';
	private $user_name = 'root';
	private $password  = '';
	private $dbname    = 'mini_car';
	private $conn;
	
	public function connect () {
		$this->conn = '';
		try {
			$this->conn = new PDO('mysql: host='.$this->host.';dbname='.$this->dbname,$this->user_name,$this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			// echo 'success';
		} catch ( PDOException $e) {
			echo 'Connectio Error: '.$e->getMessage();
		}
		return $this->conn;
	}
	
}