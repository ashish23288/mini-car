<?php

include_once './includes/header.php';
include_once './config/constant.php';

$data = file_get_contents(BASE_URL.'/api/post/read.php');

$details = json_decode($data);//pass true as second parameter if you want result as array;json_decode($data,true)
// echo "<pre>";
// print_r($details);
?>
<body>
<script src="./assets/js/main.js"></script>
<div class="container">
	<table class="table">
		<thead>
		  <tr>
			<th>Title</th>
			<th>Body</th>
			<th>Auther</th>
			<th>Edit</th>
			<th>Delete</th>
		  </tr>
		</thead>
		<tbody>

<?php
foreach($details->data as $values) {
	echo "<tr>
			<td>".$values->title."</td>
			<td>".$values->body."</td>
			<td>".$values->author."</td>
			<td><a class='btn btn-success' href='update.php?id=".$values->id."'>Edit</a></td>
			<td><button class='btn btn-danger deleteButton' id='".$values->id."'>Delete</button></td>
		  </tr>";
}

?>
		</tbody>
	</table>
</div>
</body>