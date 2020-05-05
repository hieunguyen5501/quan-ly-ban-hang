<?php

if (isset($_GET['id'])) {
	$id = (int)$_GET['id'];

	$sql = "DELETE FROM category WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
	    header('Location: '."?page=list_category");
	} else {
	    header('Location: '."?page=list_category");
	}
}
?>