<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include_once '../classes/Database.php';
include_once '../classes/Inventory.php';

$Database = new Database();
$db   = $Database->connect();
$posts = new Inventory($db);
$posts->model_name = isset($_GET['model_name'])?$_GET['model_name']:die();

$result= $posts->getUnsoldRecordsByModel();
$num   = $result->rowCount();

if($num > 0){
	$posts_arr =array();
	$row = $result->fetch(PDO::FETCH_ASSOC);
	extract($row);
	$post_item = array(
		'model_id'=>$model_id,
		'model_name'=>$model_name,
		'manufacturing_year'=>$manufacturing_year,
		'color'=>$color,
		'registration_no'=>$registration_no,
		'note'=>$note,
		'pic1'=>$pic1,
		'pic2'=>$pic2
	);
	echo json_encode($post_item);
} else {
	echo json_encode(array('message'=>'No Detail found'));
}
