<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type,Authorization,X-Requested-With');

include_once '../classes/Database.php';
include_once '../classes/Model.php';

$Database = new Database();
$db   = $Database->connect();

$posts = new Model($db);

$data = json_decode(file_get_contents('php://input'), true);

$posts->model_name = $data['model_name'];
$posts->manufacturer_id = $data['manufacturer_id'];
$posts->manufacturing_year = $data['manufacturing_year'];
$posts->color = $data['color'];
$posts->registration_no= $data['registration_no'];
$posts->note = $data['note'];
$posts->pic1 = $data['pic1'];
$posts->pic2 = $data['pic2'];

$update_status = 'Y';

if (empty(trim($posts->model_name)) ||
    empty(trim($posts->manufacturer_id)) ||
    empty(trim($posts->manufacturing_year)) ||
    empty(trim($posts->color)) ||
    empty(trim($posts->registration_no)) ||
    empty(trim($posts->note)) ||
    empty(trim($posts->pic1)) ||
    empty(trim($posts->pic2))
  ) {
  $update_status = 'N';
}

if ($update_status == 'N') {
  echo json_encode(
		array('message'=>'Fields can not be empty')
	);
}
elseif (!is_numeric($posts->registration_no) || !is_numeric($posts->manufacturing_year)) {
  echo json_encode(
		array('message'=>'Registration Number and Manufacturing Year are numeric fields')
	);
}
elseif($posts->create()){
	echo json_encode(
		array('message'=>'Model added Successfully.')
	);
} else {
	echo json_encode(
		array('message'=>'Fail')
	);
}
