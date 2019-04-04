<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,contentType,Content-Type,Authorization,X-Requested-With');

include_once '../classes/Database.php';
include_once '../classes/Manufacturer.php';

$Database = new Database();
$db   = $Database->connect();

$posts = new Manufacturer($db);

$data = json_decode(file_get_contents('php://input'), true);

$posts->name = $data['manufacturer_name'];
if (empty($posts->name) or trim($posts->name)=='') {
	echo json_encode(
		array('success'=>2)
	);
}
elseif($posts->create()){
	echo json_encode(
		array('success'=>1)
	);
} else {
	echo json_encode(
		array('success'=>0)
	);
}
