<?php
if (isset($_POST['create_product'])) {
	
	$pro_name = $_POST['pro_name'];
	$pro_price = $_POST['pro_price'];
	$pro_desc = $_POST['pro_desc'];

	$date_create = date("Y-m-d h:i:sa");

	$cat_id = $_POST['cat_id'];

	$pro_status = $_POST['pro_status'];

	$file_image = $_FILES['pro_image'];

	$name_image = "";

	if (isset($file_image)) {
		if ($file_image['type'] == 'image/jpeg' || $file_image['type'] == 'image/png'  || $file_image['type'] == 'image/jpg' || $file_image['type'] == 'image/gif') {
			$ext = pathinfo($file_image['name'])['extension'];
			$name_image = md5(time()) .'.' .$ext;

			move_uploaded_file($_FILES["pro_image"]["tmp_name"], "upload/$name_image");
		}

	}

	$sqlInsert = insert_product($cat_id, $pro_name, $pro_price, $pro_desc, $pro_status, $name_image, $date_create);

	if ($conn->query($sqlInsert) === true) {
		echo "Add product success";
	} else {
		echo "Add product errors";
	}

	
}
$sqlCat = select_all('category');
$resultCat = $conn->query($sqlCat);
?>
<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		<div class="form-group">
			<legend>Create Category</legend>
		</div>
		<div class="form-group">
      		<label class="control-label col-sm-2" for="pro_name">Name:</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="pro_name" placeholder="Enter Name" name="pro_name">
	      	</div>
	    </div>
	    <div class="form-group">
      		<label class="control-label col-sm-2" for="pro_price">Price:</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="pro_price" placeholder="Enter price" name="pro_price">
	      	</div>
	    </div>
	    <div class="form-group">
      		<label class="control-label col-sm-2" for="pro_desc">Description:</label>
	      	<div class="col-sm-10">
	        	<textarea type="text" class="form-control" id="pro_desc" placeholder="Enter description" name="pro_desc">

	        	</textarea>
	      	</div>
	    </div>
	    <div class="form-group">
      		<label class="control-label col-sm-2" for="pro_image">Image:</label>
	      	<div class="col-sm-10">
	        	<input type="file" class="form-control" id="pro_image" placeholder="" name="pro_image">
	        	<img style="width: 300px" src="" alt="" id="imgshow">
	      	</div>
	    </div>

		<div class="form-group">
      		<label class="control-label col-sm-2" for="name">Status:</label>
	      	<div class="col-sm-10">
	        	<select name="pro_status" class="form-control" id="pro_status">
			    	<option value="1">Hien</option>
			    	<option value="0">An</option>
			    </select>
	      	</div>
	    </div>

		<div class="form-group">
      		<label class="control-label col-sm-2" for="cat_id">Category :</label>
	      	<div class="col-sm-10">
	        	<select name="cat_id" class="form-control" id="cat_id">
			    	<?php
			    	while ($row = $resultCat->fetch_assoc()) {
		    	    ?>
					<option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
		    	    <?php
			    	}
			    	?>
			    </select>
	      	</div>
	    </div>
		
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" name="create_product" class="btn btn-primary">Submit</button>
			</div>
		</div>
</form>

<script>
	$('document').ready(function () {
	    $("#pro_image").change(function () {
	        if (this.files && this.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
	                $('#imgshow').attr('src', e.target.result);
	            }
	            reader.readAsDataURL(this.files[0]);
	        }
	    });
    });
</script>