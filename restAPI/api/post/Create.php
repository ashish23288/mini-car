<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

$Database = new Database();
$db   = $Database->connect();

$posts = new Posts($db);

 $data = json_decode(file_get_contents('php://input'), true);

$posts->title 	   = $data['title'];
$posts->body 	   = $data['body'];
$posts->author 	   = $data['author'];
//$posts->category_id= $_POST['category_id'];

if($posts->create()){
	echo json_encode(
		array('message'=>'1')
	);
} else {
	echo json_encode(
		array('message'=>'0')
	);
}
