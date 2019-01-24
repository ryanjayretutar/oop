<?php 
	
	class Cars{
		static $wheel_count = 4;
		static $door_count = 4;
		protected $seat_count = 4;

		function car_details(){
			echo self::$wheel_count . "<br>";
			echo self::$door_count . "<br>";
		}
	}


	class Truck extends Cars{

	}


	// $toyota = new Truck();
	// $honda = new Cars();
	// $honda->car_details();
	// echo "<br>public " . $honda->wheel_count;
	// echo "private" . $honda->door_count;
	// echo "protected" . $honda->seat_count;
	
	// $toyota->car_details();

	// echo $honda->wheel_count;

	echo Cars::$door_count;
	Cars::car_details();	
?>	