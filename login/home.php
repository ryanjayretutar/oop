<?php 
	session_start();

	include_once "class.user.php";
	$users = new User();

	$uid = $_SESSION['id'];

	if(!$users->get_session()){
		header("location: login.php");
	}

	// if (isset(var)) {
	// 	# code...
	// }

	if (isset($_GET['logout'])) {
		$users->user_logout();
		header("location: login.php");
	}




 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Home</title>
 	<style type="text/css">
		#container {
			width: 600px;
			margin: 0 auto;
		}
	</style>
 </head>
 <body>
 	<div id="container">
 		<div id="header">
 			<a href="home.php?logout=logout">Logout</a>
 		</div>
 	<div id="main-body">
 		<h1>Hello 
 	<?php 
 		$users->get_fullname($uid);
 	 ?>
 	</h1>
 	</div>
 </div>
 	
 </body>
 </html>