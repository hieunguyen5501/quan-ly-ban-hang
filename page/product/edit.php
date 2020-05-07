<?php
if ($_GET['id']) {
	$id = (int) $_GET['id'];

	$sqlPro = "SELECT * FROM product WHERE id = $id";

	$product = $conn->query($sqlPro)->fetch_assoc();
}

if (isset($_POST['create_product'])) {
	
	$pro_name = $_POST['pro_name'];
	$pro_price = $_POST['pro_price'];
	$pro_desc = $_POST['pro_desc'];

	$date_create = date("Y-m-d h:i:sa");

	$cat_id = $_POST['cat_id'];

	$pro_status = $_POST['pro_status'];

	$file_image = $_FILES['pro_image'];

	$name_image = isset($product['pro_image']) ? $product['pro_image'] : "";

	if (isset($file_image)) {
		if (file_exists("upload/" .$name_image)) {
			unlink("upload/" .$name_image);
		}

		if ($file_image['type'] == 'image/jpeg' || $file_image['type'] == 'image/png'  || $file_image['type'] == 'image/jpg' || $file_image['type'] == 'image/gif') {
			$ext = pathinfo($file_image['name'])['extension'];
			$name_image = md5(time()) .'.' .$ext;

			move_uploaded_file($_FILES["pro_image"]["tmp_name"], "upload/$name_image");
		}

	}

	$sqlUpdate = update_product($cat_id, $pro_name, $pro_price, $pro_desc, $pro_status, $name_image, $date_create, $id);

	if ($conn->query($sqlUpdate) === true) {
		echo "Update product success";
		header('Location: '."?page=edit_product&id=$id");
	} else {
		echo "Update product errors";
		header('Location: '."?page=edit_product&id=$id");
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