<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,contentType,Content-Type,Authorization,X-Requested-With');

include_once '../classes/Database.php';
include_once '../classes/Model.php';

$Database = new Database();
$db   = $Database->connect();

$posts = new Model($db);

$posts->model_name = $_POST['model_name'];
$posts->manufacturer_id = $_POST['manufacturer_id'];
$posts->manufacturing_year = $_POST['manufacturing_year'];
$posts->color = $_POST['color'];
$posts->registration_no= $_POST['registration_no'];
$posts->note = $_POST['note'];

if (empty(trim($posts->model_name)) ||
    empty(trim($posts->manufacturer_id)) ||
    empty(trim($posts->manufacturing_year)) ||
    empty(trim($posts->color)) ||
    empty(trim($posts->registration_no)) ||
    empty(trim($posts->note))
  ) {
    echo json_encode(
  		array('error'=>'Fields can not be empty')
  	);
    exit;
}

if (!is_numeric($posts->registration_no) || !is_numeric($posts->manufacturing_year)) {
  echo json_encode(
		array('error'=>'Registration Number and Manufacturing Year are numeric fields')
	);
  exit;
}

$target_dir = "../src/assets/img/";

for ($i=1; $i <= 2; $i++) {

  if(isset($_FILES["picture".$i]) && !empty($_FILES["picture".$i])) {

    $file_name = date('His').'_' . basename($_FILES["picture".$i]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo json_encode(
    		array('error'=>'Sorry, only JPG, JPEG, PNG & GIF files are allowed.')
    	);
      exit;
    }
    if (!move_uploaded_file($_FILES["picture".$i]["tmp_name"], $target_file)) {
      echo json_encode(
    		array('error'=>'Sorry, there was an error uploading your file..')
    	);
      exit;
    }
    if ($i==1) {
      $posts->pic1 = $file_name;
    } else {
      $posts->pic2 = $file_name;
    }
  } else {
    echo json_encode(
      array('error'=>'Picture field is mandatory.')
    );
    exit;
  }
}

if($posts->create()){
	echo json_encode(
		array('success'=>'Model added Successfully.')
	);
} else {
	echo json_encode(
		array('error'=>'Fail')
	);
}
