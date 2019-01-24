<?php 

	$con = new mysqli("localhost", "admin", "root", "chat");

	$st = $con->prepare("select * from chat_msg");

	$st->execute();

	$rs = $st->get_result();

	while ($row = $rs->fetch_assoc()) {

		echo "<b>" . $row["name"] . "</b>:" . $row["message"] . "</br>";
		echo "<i>" . $row["msg_date"] . "</i> <br> <hr/>";
	}

	

 ?>