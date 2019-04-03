<?php
class Posts {
	private $conn;
	private $table1 = 'posts';
	private $table2 = 'category';
	
	public  $id;
	public  $title;
	public  $body;
	public  $author;
	public  $category_id;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	public function getPosts(){
		try{
			$query = 'SELECT * FROM '.$this->table1.' a LEFT JOIN '.$this->table2.' b ON a.category_id = b.c_id';
			$stmt  = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt;
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
	}
	
	public function getSinglePosts(){
		try{
			$query = 'SELECT * FROM '.$this->table1.' a LEFT JOIN '.$this->table2.' b ON a.category_id = b.c_id WHERE a.id=:id';
			$stmt  = $this->conn->prepare($query);
			$stmt->bindParam(':id',$this->id);
			$stmt->execute();
			return $stmt;
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
	}
	
	public function create(){
		
		try{
			$query = 'INSERT INTO '.$this->table1.' SET `title` = :title, `body` = :body, `author` = :author, `category_id` = :category_id';
			$stmt  = $this->conn->prepare($query);
			
			$this->title 	   = htmlspecialchars(strip_tags($this->title));
			$this->body 	   = htmlspecialchars(strip_tags($this->body));
			$this->author 	   = htmlspecialchars(strip_tags($this->author));
			$this->category_id = htmlspecialchars(strip_tags($this->category_id));
			
			$stmt->bindParam(':title',$this->title);
			$stmt->bindParam(':body',$this->body);
			$stmt->bindParam(':author',$this->author);
			$stmt->bindParam(':category_id',$this->category_id);
			
			return $stmt->execute();
			
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
		
	}
	
	public function update(){
		
		try{
			$query = 'UPDATE '.$this->table1.' SET `title` = :title, `body` = :body, `author` = :author, `category_id` = :category_id WHERE id = :id';
			$stmt  = $this->conn->prepare($query);
			
			$this->title 	   = htmlspecialchars(strip_tags($this->title));
			$this->body 	   = htmlspecialchars(strip_tags($this->body));
			$this->author 	   = htmlspecialchars(strip_tags($this->author));
			$this->category_id = htmlspecialchars(strip_tags($this->category_id));
			$this->id 		   = htmlspecialchars(strip_tags($this->id));
			
			$stmt->bindParam(':title',$this->title);
			$stmt->bindParam(':body',$this->body);
			$stmt->bindParam(':author',$this->author);
			$stmt->bindParam(':category_id',$this->category_id);
			$stmt->bindParam(':id',$this->id);
			
			return $stmt->execute();
			
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
		
	}
	
	public function delete(){
		try{
			$query = 'DELETE FROM '.$this->table1.' WHERE id = :id';
			$stmt  = $this->conn->prepare($query);
			$stmt->bindParam(':id',$this->id);
			$stmt->execute();
			return $stmt;
		} catch ( PDOException $e) {
			echo die('Query Error: '.$e->getMessage());
		}
	}
}