<?php
	
	function insert_category($cat_name, $cat_status, $date)
	{
		$sql = "INSERT INTO category (cat_name, cat_status, date_create) VALUES ('$cat_name', '$cat_status', '$date')";

		return $sql;
	}

	function insert_product($cat_id, $pro_name, $pro_price, $pro_desc, $pro_status, $pro_image, $date_create)
	{
		$sql = "INSERT INTO product (cat_id, pro_name, pro_price , pro_desc, pro_status, pro_image, date_create) VALUES ($cat_id, '$pro_name', $pro_price, '$pro_desc', $pro_status, '$pro_image', '$date_create')";

		return $sql;
	}


	function update_product($cat_id, $pro_name, $pro_price, $pro_desc, $pro_status, $pro_image, $date_create, $id)
	{
		$sql = "UPDATE product SET cat_id = $cat_id, pro_name = '$pro_name', pro_price = $pro_price, pro_desc = '$pro_desc', pro_status = $pro_status, pro_image = '$pro_image', date_create = '$date_create' WHERE id = $id ";

		return $sql;
	}

	function select_all($table)
	{
		$sql = "SELECT * FROM $table";

		return $sql;
	}

	function select_product() {
		$sql = "SELECT *, cat.cat_name as cat_name, pro.id as pro_id FROM product pro JOIN category cat ON pro.cat_id = cat.id ORDER BY pro.id DESC";

		return $sql;
	}
	
?>