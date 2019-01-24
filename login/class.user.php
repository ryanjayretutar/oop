<?php 
	
	class User {
		public $con;

		function __construct(){
			$this->open_connection();
		}

		public function open_connection(){
			$this->con = new mysqli("localhost", "admin", "root", "ojt");

			if(mysqli_connect_errno()){
				die("Error: Could not connect to database");
			}else{
				return $this->con;
			}
		}

		public function reg_user($name, $email, $password, $user){
			$password = md5($password);
			$sql = "SELECT * FROM user WHERE username='$user' OR email='$email'";
			$result = mysqli_query($this->con, $sql);
			$count_row = $result->num_rows;
			if($count_row == 0){
				// $sql = "";
				// $sql .= "INSERT INTO user";
				// $sql .= " (" .implode(",", array_keys($fields)). ") VALUES ";
				// $sql .= "('".implode("','", array_values($fields)). "')";
				// // echo $sql;
				// $query = mysqli_query($this->con, $sql);

				// if ($query) {
				// 	return true;
				// }

				$sql1 = "INSERT INTO user SET username = '$user', password = '$password', email = '$email', fullname = '$name'";
				$result = mysqli_query($this->con, $sql1) or die(mysqli_connect_errno(). "Data cannot insert inside table");
				return $result;
			}else{
				return false;
			}
		}

		public function check_login($user, $password){
			$password = md5($password);
			$sql = "SELECT id from user WHERE username ='$user' OR email='$user' AND password = '$password'";
			$result = mysqli_query($this->con, $sql);
			$user_data = mysqli_fetch_array($result);
			$count_row = $result->num_rows;

			if ($count_row == 1) {
				$_SESSION['login'] = true;
				$_SESSION['id'] = $user_data['id'];
				return true;
			}else{
				return false;
			}

		}

		public function get_session(){
			return $_SESSION['login'];
		}

		public function user_logout(){
			$_SESSION['login'] = false;
			session_destroy();
		}

		public function get_fullname($uid){
			$sql2 = "SELECT * from user WHERE id=$uid";
			$result = mysqli_query($this->con, $sql2);
			$user_data = mysqli_fetch_array($result);
			echo $user_data['fullname'];
		}
		
		

 	}

?>