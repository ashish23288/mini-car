<?php
include_once './includes/header.php';
include_once './config/constant.php';
?>
<body>
<script src="./assets/js/add.js"></script>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="./api/post/Create.php" method='POST' id="createForm" >
    <div class="form-group">
      <label for="Title">Title:</label>
      <input type="text" class="form-control" id="Title" placeholder="Enter Title" name="title">
    </div>
    <div class="form-group">
      <label for="Body">Body:</label>
      <textarea class="form-control" id="Body" placeholder="Enter Body" name="body"></textarea>
    </div>
    <div class="form-group">
      <label for="Author">Author:</label>
      <input type="text" class="form-control" id="Author" placeholder="Enter Author" name="author">
    </div>
    <div class="form-group">
      <label for="Category">Category Id:</label>
      <input type="text" class="form-control" id="Category" placeholder="Enter Category Id" name="category_id">
    </div>
    <button type="submit" class="btn btn-default" id="submitButton">Submit</button>
  </form>
</div>

</body>
</html>
