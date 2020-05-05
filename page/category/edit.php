<?php
if (isset($_GET['id'])) {
	$id = (int)$_GET['id'];

	$sql = "SELECT * FROM category where id = $id";
	$result = mysqli_fetch_assoc($conn->query($sql));

	if (isset($_POST['update'])) {
		if (empty($_POST['cat_name'])) {
			echo 'Khong duoc de trong ten';
		} else {
			$cat_name = $_POST['cat_name'];
			$cat_status = $_POST['cat_status'];
			$date = date("Y-m-d h:i:sa");

			$sql = "UPDATE category SET cat_name = '$cat_name', cat_status = $cat_status, date_create = '$date' WHERE id = $id";

			if ($conn->query($sql) === TRUE) {
			    $sql = "SELECT * FROM category where id = $id";
				$result = mysqli_fetch_assoc($conn->query($sql));
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}
	}

}


?>
<form action="" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<legend>Edit Category</legend>
		</div>
		<div class="form-group">
      		<label class="control-label col-sm-2" for="cat_name">Name:</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="cat_name" placeholder="Enter Name" name="cat_name" value="<?php echo $result['cat_name'] ?>">
	      	</div>
	    </div>
		<div class="form-group">
      		<label class="control-label col-sm-2" for="name">Status:</label>
	      	<div class="col-sm-10">
	        	<select name="cat_status" class="form-control" id="cat_status">
			    	
					<option value="1" <?php echo $result['cat_status'] == 1 ? 'selected' : '' ?>>Hien</option>
			    	<option value="0" <?php echo $result['cat_status'] == 0 ? 'selected' : '' ?> >An</option>
				   
			    </select>
	      	</div>
	    </div>


		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" name="update" class="btn btn-primary">Submit</button>
			</div>
		</div>
</form>