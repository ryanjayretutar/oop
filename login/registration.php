<?php 
	include_once "class.user.php";
	$users = new User();

	if(isset($_REQUEST['submit'])){
		// $myarray = array("fullname"=>$_POST['fullname'],
		// 				"username"=>$_POST['user'],
		// 				"email"=>$_POST['email'],
		// 				"password"=>$_POST['password']);

		// if($users->reg_user("person", $myarray)){
		// 	header("location: index.php?msg=insert request successfully");
		// }

		extract($_REQUEST);
		$register = $users->reg_user($fullname, $email, $password, $user);
		if($register){
			echo 'You are now registered . <a href="login.php"> Click Here </a> to login';
		}
		else{
			echo 'Email or username already exists. Please try again';
		}
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style type="text/css">
		#container {
			width: 400px;
			margin: 0 auto;
		}
	</style>
</head>
<body>

	<div id="container">
		<h1>Registration</h1>
	<form action="" method="post" name="reg">
		<span>Full Name</span>
		<input type="text" name="fullname" required=""><br><br>
		<span>Username</span>
		<input type="text" name="user" required><br><br>
		<span>Email</span>
		<input type="text" name="email" required><br><br>
		<span>Password</span>
		<input type="password" name="password" required><br><br>
		<input onclick="return(submitReg());" type="submit" name="submit" value="Register">
	</form><br><br>
	<a href="login.php">Already Registered? Click Here</a>
	</div>
	<script type="text/javascript">

		function submitReg(){
			var form = document.reg;
			if(form.fullname.value == ""){
				alert("Enter your full name");
				return false;
			}else if (form.user.value == ""){
				alert("Enter your username");
				return false;
			}
			else if (form.email.value == ""){
				alert("Enter your email");
				return false;
			}
			else if (form.password.value == ""){
				alert("Enter your password");
				return false;
			}

		}
		
	</script>
</body>
</html>