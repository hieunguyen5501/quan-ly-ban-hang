<?php
$sql = select_all('product');
$result = $conn->query($sql);
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Description</th>
			<th>Status</th>
			<th>Date time</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
        ?>

		
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['pro_name']; ?></td>
			<td>
				<img style="width: 200px" src="upload/<?php echo $row['pro_image'] ?>" alt="">
			</td>
			<td><?php echo number_format($row['pro_price']); ?> d</td>
			<td><?php echo $row['pro_desc']; ?></td>
			<td><?php echo $row['pro_status'] == 1 ? "Hien" : "An" ?></td>
			<td><?php echo date_format(date_create($row['date_create']), "Y/m/d");; ?></td>
			<td>
				<a href="?page=edit_category&id=<?php echo $row['id'];  ?>">Edit</a>
				<a href="?page=delete_category&id=<?php echo $row['id'];  ?>">Delete</a>
			</td>
		</tr>

        <?php
		    }
		} else {
		    echo "0 results";
		}
		?>
		<tr>
			<td></td>
		</tr>
	</tbody>
</table>
	