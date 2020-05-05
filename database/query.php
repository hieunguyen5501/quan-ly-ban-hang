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

	function select_all($table)
	{
		$sql = "SELECT * FROM $table";

		return $sql;
	}
	
?>