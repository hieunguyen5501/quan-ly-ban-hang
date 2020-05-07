<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
		<div class="form-group">
			<legend>Form Category</legend>
		</div>
		<div class="form-group">
      		<label class="control-label col-sm-2" for="pro_name">Name:</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="pro_name" placeholder="Enter Name" name="pro_name" value="<?php echo isset($product['pro_name']) ? $product['pro_name'] : '' ?>">
	      	</div>
	    </div>
	    <div class="form-group">
      		<label class="control-label col-sm-2" for="pro_price">Price:</label>
	      	<div class="col-sm-10">
	        	<input type="text" class="form-control" id="pro_price" placeholder="Enter price" name="pro_price" value="<?php echo isset($product['pro_price']) ? $product['pro_price'] : '' ?>">
	      	</div>
	    </div>
	    <div class="form-group">
      		<label class="control-label col-sm-2" for="pro_desc">Description:</label>
	      	<div class="col-sm-10">
	        	<textarea type="text" class="form-control" id="pro_desc" placeholder="Enter description" name="pro_desc">
					<?php echo isset($product['pro_desc']) ? $product['pro_desc'] : '' ?>
	        	</textarea>
	      	</div>
	    </div>
	    <div class="form-group">
      		<label class="control-label col-sm-2" for="pro_image">Image:</label>
	      	<div class="col-sm-10">
	        	<input type="file" class="form-control" id="pro_image" placeholder="" name="pro_image">
	        	<img style="width: 300px" src="upload/<?php echo isset($product['pro_image']) ? $product['pro_image'] : '' ?>" alt="" id="imgshow">
	      	</div>
	    </div>

		<div class="form-group">
      		<label class="control-label col-sm-2" for="name">Status:</label>
	      	<div class="col-sm-10">
	        	<select name="pro_status" class="form-control" id="pro_status">
			    	<option value="1" <?php if (isset($product['pro_status'])) echo $product['pro_status'] == 1 ? 'selected' : '' ?>>Hien</option>
			    	<option value="0" <?php if (isset($product['pro_status'])) echo $product['pro_status'] == 0 ? 'selected' : '' ?> >An</option>
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
					<option <?php if (isset($product['cat_id'])) echo $product['cat_id'] == $row['id'] ? 'selected' : '' ?> value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
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