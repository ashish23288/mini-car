<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-With');

include_once '../classes/Database.php';
include_once '../classes/Inventory.php';



$Database = new Database();
$db   	  = $Database->connect();

$posts    = new Inventory($db);
$posts->model_id = isset($_GET['model_id'])?$_GET['model_id']:die();

if($posts->update()){
	echo json_encode(
		array('success'=>'Model Sold Successfully')
	);
} else {
	echo json_encode(
		array('error'=>'Model Not Sold')
	);
}
