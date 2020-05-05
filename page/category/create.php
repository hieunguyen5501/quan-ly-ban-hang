<?php
if (isset($_POST['create_category'])) {
	if (empty($_POST['cat_name'])) {
		echo 'Khong duoc de trong ten';
	} else {
		$cat_name = $_POST['cat_name'];
		$cat_status = $_POST['cat_status'];
		$date = date("Y-m-d h:i:sa");

		$sql = insert_category($cat_name, $cat_status, $date);

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
}
?>
<form action="" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<legend>Create Category</legend>
		</div>
		<div class="form-group">
      		<label class="control-label col-sm-2" for="cat_name">Name:</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="cat_name" placeholder="Enter Name" name="cat_name">
	      	</div>
	    </div>
		<div class="form-group">
      		<label class="control-label col-sm-2" for="name">Status:</label>
	      	<div class="col-sm-10">
	        	<select name="cat_status" class="form-control" id="cat_status">
			    	<option value="1">Hien</option>
			    	<option value="0">An</option>
			    </select>
	      	</div>
	    </div>


		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" name="create_category" class="btn btn-primary">Submit</button>
			</div>
		</div>
</form>