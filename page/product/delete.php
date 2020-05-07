<?php

if ($_GET['id']) {
	$id = (int) $_GET['id'];

	$sqlPro = "SELECT * FROM product WHERE id = $id";

	$product = $conn->query($sqlPro)->fetch_assoc() or die ('sdfhsgh');

	if (file_exists("upload/" .$product['pro_image'])) {
		unlink("upload/" .$product['pro_image']);
	}

	$sql = "DELETE FROM product WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
	    header('Location: '."?page=list_product");
	} else {
	    header('Location: '."?page=list_product");
	}

}

?>