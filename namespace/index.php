<?php
	spl_autoload_register(function($class_name){
		
		include $class_name .".php"; // B.php
	});



	$obj = new \f2\f3\B;
	
