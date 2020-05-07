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

<?php
require('form.php');
?>

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