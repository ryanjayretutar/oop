<?php 

	/**
	 * 
	 */
	class Cars
	{
		
		function greeting()
		{
			# code...
		}

		function greeting2()
		{
			# code...
		}

		
	}

		$the_methods = get_class_methods('Cars');
		foreach ($the_methods as $method) {
			echo $method . "<br>";
		}

?>