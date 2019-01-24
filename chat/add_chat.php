<?php 


	$connection = new mysqli("localhost", "admin", "root","chat");

	$st = $connection->prepare("INSERT INTO chat_msg(name, message) VALUES(? ,?)");

	$st->bind_param("ss", $_POST["name"], $_POST['msg']);

	$st->execute();

	echo "Successfully added";


 ?>