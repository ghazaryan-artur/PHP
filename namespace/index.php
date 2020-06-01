<?php
use f2\f3 as BNameSpace;
	spl_autoload_register(function($class_name){
		echo str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php";
		include str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php"; // B.php
	});



	$obj = new BNameSpace\B;
	
