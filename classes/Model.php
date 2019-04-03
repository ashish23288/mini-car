<?php
class Model {
	private $conn;
	private $table1 = 'model';

	public  $model_name;
	public  $manufacturer_id;
	public  $color;
	public  $registration_no;
	public  $note;
	public  $pic1;
	public  $pic2;

	public function __construct($db){
		$this->conn = $db;
	}

	public function create(){

		try{
			$query = 'INSERT INTO '.$this->table1.' SET
			`model_name` = :model_name,
			`manufacturer_id` = :manufacturer_id,
			`color` = :color,
			`registration_no` = :registration_no,
			`note` = :note,
			`pic1` = :pic1,
			`pic2` = :pic2';
			$stmt  = $this->conn->prepare($query);

			$this->model_name 	   = htmlspecialchars(strip_tags($this->model_name));
			$this->manufacturer_id = htmlspecialchars(strip_tags($this->manufacturer_id));
			$this->color 	   	   = htmlspecialchars(strip_tags($this->color));
			$this->registration_no = htmlspecialchars(strip_tags($this->registration_no));
			$this->note 	       = htmlspecialchars(strip_tags($this->note));
			$this->pic1 	       = htmlspecialchars(strip_tags($this->pic1));
			$this->pic2 		     = htmlspecialchars(strip_tags($this->pic2));

			$stmt->bindParam(':model_name',$this->model_name);
			$stmt->bindParam(':manufacturer_id',$this->manufacturer_id);
			$stmt->bindParam(':color',$this->color);
			$stmt->bindParam(':registration_no',$this->registration_no);
			$stmt->bindParam(':note',$this->note);
			$stmt->bindParam(':pic1',$this->pic1);
			$stmt->bindParam(':pic2',$this->pic2);

			return $stmt->execute();

		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}

	}

}
