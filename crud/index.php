<?php
	include "included/header.php";
	include "config/function.php";
?>
<body>
	<form action="" method="post">
		<input type="text" name="firstname">
		<input type="text" name="lastname">
		<input type="submit" name="submit" value="Submit">
	</form>


	<table cellspacing="5" cellpadding="5">
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>

		</tr>
		<?php
			$row = $obj->fetch_data("person");
			foreach ($row as $person) {
		 ?>
		

		<tr>
			<form action="" method="post">
			<td><input type="text" name="id" value="<?php echo $person['id']; ?>"></td>
			<td><input type="text" name="firstname" value="<?php echo $person['firstname']; ?>"></td>
			<td><input type="text" name="lastname" value="<?php echo $person['lastname']; ?>"></td>
			<td><input type="submit" name="update" value="Update"></td>
			<td><input onclick="return confirm('Are you sure you want to delete?');" type="submit" name="delete" value="Delete"></td>
			<td><a onclick="return confirm('Are you sure you want to delete?');" href="?delete=1&id=<?php echo $person['id'];?>"><button type="button">Delete</button></a></td>
			</form>
			<td>
				<form action="" method="post">
					<a href="index.php?id=<?php echo $person['id']?>" target="_blank">Edit</a>
				</form>
			</td>
		</tr>

		<?php } ?>
	</table> <br><br><br><br><br>

















	<?php 

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$where = array("id"=>$id);
			$row = $obj->select_data("person", $where);
		
	?>


	<form action="" method="post">
		<input type="text" name="id" value="<?php echo $row['id']; ?>">
		<input type="text" name="firstname" value="<?php echo $row['firstname']; ?>">
		<input type="text" name="lastname" value="<?php echo $row['lastname']; ?>">
		<input type="submit" name="update">

	</form>

<?php  } ?>



</body>
<?php
	include "included/footer.php";
?>