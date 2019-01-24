<?php 
	
	class Cars{
		public $wheel_count = 4;
		private $door_count = 4;
		protected $seat_count = 4;

		function car_details(){
			echo $this->wheel_count . "<br>";
			echo $this->door_count . "<br>";
			echo $this->seat_count . "<br>";
			echo error_log();
		}
	}


	class Truck extends Cars{

	}


	$toyota = new Truck();
	$honda = new Cars();
	$honda->car_details();
	echo "<br>public " . $honda->wheel_count;
	echo "private" . $honda->door_count;
	echo "protected" . $honda->seat_count;
	
	$toyota->car_details();

?>