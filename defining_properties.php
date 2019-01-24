<?php
	
	class Cars{
		var $wheel_count = 4;
		var $door_count = 4;
		function car_detail(){
			echo "This car has " . $this->wheel_count . " wheels";
		}
	}
	$honda = new Cars();
	$toyota = new Cars();
	// $toyota->greeting();

	$honda->wheel_count = 10;
	echo $toyota->wheel_count;
	echo "<br>";
	echo $honda->wheel_count;
	echo "<br>";
	$toyota->car_detail();
	
?>