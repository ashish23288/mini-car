<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

$Database = new Database();
$db   	  = $Database->connect();

$posts    = new Posts($db);

// $data = file_get_contents("php://input");

$posts->id 	       = $_POST['id'];
$posts->title 	   = $_POST['title'];
$posts->body 	   = $_POST['body'];
$posts->author 	   = $_POST['author'];
$posts->category_id= $_POST['category_id'];

if($posts->update()){
	echo json_encode(
		array('message'=>'Post Updated Successfully')
	);
} else {
	echo json_encode(
		array('message'=>'Post Not Updated')
	);
}
