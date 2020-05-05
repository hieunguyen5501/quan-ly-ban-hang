<?php
require('database/connect.php');
require('database/query.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quan ky ban hang</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">

	<script src="jquery-3.5.0.min.js"></script>
</head>
<body>
	<div class="container">
		<?php
		require('components/nav.php');
		?>

		<?php
		if (isset($_GET['page'])) {
			switch ($_GET['page']) {
				case 'list_category':
					require('page/category/index.php');
					break;
				
				case 'create_category':
					require('page/category/create.php');
					break;

				case 'delete_category':
					require('page/category/delete.php');
					break;
				
				case 'edit_category':
					require('page/category/edit.php');
					break;
				
				case 'create_product':
					require('page/product/create.php');
					break;
				
				case 'list_product':
					require('page/product/index.php');
					break;
				

				default:
					
					break;
			}
		}
		?>
	</div>
</body>
<script src=""></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</html>