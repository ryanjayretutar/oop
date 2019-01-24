<?php 

	class Cars 
	{
		var $wheels = 4;
		function greeting()
		{
			return "The truck has " . $this->wheels . " wheels<br>";
		}

	}

	$honda = new Cars();


	class Truck extends Cars
	{
		var $wheels = 10;

	}

	$toyota = new Truck();
	
	echo $toyota->greeting();
	$toyota->wheels = 8;
	echo $toyota->wheels;

?>