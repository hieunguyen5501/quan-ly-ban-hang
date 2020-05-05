<?php
$sql = select_all('category');
$result = $conn->query($sql);
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
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
			<td><?php echo $row['cat_name']; ?></td>
			<td><?php echo $row['cat_status'] == 1 ? "Hien" : "An" ?></td>
			<td><?php echo date_format(date_create($row['date_create']), "Y/m/d");; ?></td>
			<td>
				<a href="?page=edit_category&id=<?php echo $row['id'];  ?>">Edit</a>
				<a onclick="return confirm('Ban chac chan muon xoa')" href="?page=delete_category&id=<?php echo $row['id'];  ?>" >Delete</a>
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
	