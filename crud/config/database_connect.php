<?php 

	/**
	 * 
	 */
	class Database
	{
		public $con;
		public function __construct(){
			$this->con = mysqli_connect("localhost", "admin", "root", "ojt");
		}
	}

	$obj = new Database();


 ?>