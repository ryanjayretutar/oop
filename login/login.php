
<?php 
	session_start();
	include_once "class.user.php";
	$users = new User();
	if (isset($_REQUEST['submit'])) {
		extract($_REQUEST);
		$login = $users->check_login($user, $password);
		if($login){
			header("location: home.php");
		}else{
			echo "Username/Email or Password is incorrect";
		}
	}
	if (isset($_SESSION['id'])) {
		header("location: home.php");
	}
	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OOP Login Module</title>

	<style type="text/css">
		#container {
			width: 600px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div id="container">
		<h1>Login</h1>
		<form action="" method="post" name="login">
		<span>Username or Email</span>
		<input type="text" name="user" required="
		"><br>
		<span>Password</span>
		<input type="password" name="password" required=""><br>
		<input onclick="return(submitLogin());" type="submit" name="submit" value="Login">
	</form>
	</div>
	

<script type="text/javascript">
	
	function submitLogin(){
		var form = document.login;
		if(form.user.value == ""){
			alert("Enter your email or username");
			return false;
		}else if (form.password.value == ""){
			alert("Enter your password");
			return false;
		}
	}
</script>
</body>
</html>