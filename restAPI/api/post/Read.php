<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

$Database = new Database();
$db   = $Database->connect();

$posts = new Posts($db);
$result= $posts->getPosts();
$num   = $result->rowCount();

if($num > 0){
	$posts_arr =array();
	$posts_arr['data'] = array();
	while( $row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$post_item = array(
			'id'=>$id,
			'title'=>$title,
			'body'=>html_entity_decode($body),
			'author'=>$author,
			'category_id'=>$category_id,
			'category_name'=>$name
		);
		array_push($posts_arr['data'],$post_item);
	}
	echo json_encode($posts_arr);
} else {
	echo json_encode(array('message'=>'No posts found'));
}
