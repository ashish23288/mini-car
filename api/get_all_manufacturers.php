<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include_once '../classes/Database.php';
include_once '../classes/Manufacturer.php';

$Database = new Database();
$db   = $Database->connect();

$posts = new Manufacturer($db);
$result= $posts->getAllManufacturer();
$num   = $result->rowCount();

if($num > 0){
	$posts_arr =array();
	$posts_arr['data'] = array();
	while( $row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$post_item = array(
		  'm_id'=>$m_id,
			'manufacturer_name'=>$manufacturer_name
		);
		array_push($posts_arr['data'],$post_item);
	}
	echo json_encode($posts_arr);
} else {
	echo json_encode(array('message'=>'No posts found'));
}
