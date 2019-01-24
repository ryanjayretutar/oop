<?php 

	include "database_connect.php";


	class DataOperation extends Database{
		public function insert_data($table, $fields){
			$sql = "";
			$sql .= "INSERT INTO " . $table;
			$sql .= " (" .implode(",", array_keys($fields)). ") VALUES ";
			$sql .= "('".implode("','", array_values($fields)). "')";
			echo $sql;
			$query = mysqli_query($this->con, $sql);

			if ($query) {
				return true;
			}
		}

		public function fetch_data($table){
			$sql = "SELECT * FROM " . $table;
			$array = array();
			$query = mysqli_query($this->con, $sql);
			while($row = mysqli_fetch_assoc($query)){
				$array[] = $row;
			}
			return $array;
		}

		public function select_data($table, $where){
			$sql = "";
			$condition = "";
			foreach ($where as $key => $value) {
				$condition .= $key . "='" . $value . "' AND ";
			}

			$condition = substr($condition, 0, -5);
			$sql .= "SELECT * FROM " . $table . " WHERE ". $condition;
			$query = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function update_data($table,$where,$fields){
			$sql = "";
			$condition = "";
			foreach ($where as $key => $value) {
				$condition .= $key . "='" . $value . "' AND ";
			}

			$condition = substr($condition, 0, -5);
			foreach($fields as $key => $value){
				$sql .= $key . "='" . $value . "', ";
			}

			$sql = substr($sql, 0, -2); value . "' AND ";
			$sql = "UPDATE ". $table . " SET " . $sql . " WHERE " . $condition;

			echo $sql;
			if (mysqli_query($this->con, $sql)) {
				return true;
			}
		}


		public function delete_data($table, $where){
			$sql = "";
			$condition = "";
			foreach ($where as $key => $value) {
				$condition .= $key . "='" . $value . "' AND ";
			}

			$condition = substr($condition, 0, -5);
			$sql .= "DELETE FROM " . $table . " WHERE ". $condition;
			if(mysqli_query($this->con, $sql)){
				return true;
			}
		}

	}
	$obj = new DataOperation();

	if(isset($_POST['submit'])){
		$myarray = array("lastname"=>$_POST['lastname'],
						"firstname"=>$_POST['firstname']);

		if($obj->insert_data("person", $myarray)){
			header("location: index.php?msg=insert request successfully");
		}
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$where = array("id"=>$id);

		$myarray = array(
						"id"=>$id,
						"firstname"=>$_POST['firstname'],
						"lastname"=>$_POST['lastname']
					);
		if($obj->update_data("person",$where, $myarray)){
			header("location: index.php?msg=Your request is accepted");
		}

	}

	if (isset($_POST['delete'])) {
		$id = $_POST['id'];
		$where = array("id"=>$id);
		if($obj->delete_data("person",$where)){
			header("location: index.php?msg=Your request is accepted");
		}

	}

	if (isset($_GET['delete'])) {
		$id = $_GET['id'];
		$where = array("id"=>$id);
		if($obj->delete_data("person",$where)){
			header("location: index.php?msg=Youra arequest is accepted");
		}

	}


 ?>