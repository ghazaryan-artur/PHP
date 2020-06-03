<?php

	spl_autoload_register(function($class_name){
		include str_replace("\\", DIRECTORY_SEPARATOR,  $class_name) .".php";
	});

	// point 1

	// $components = explode('/', substr($_SERVER['REQUEST_URI'], 1));
	$routs = new \system\Routes;



/*

	1. get url components
	2. if component1 exists ---> if class_exists($class_name)
	3. if class exists ---> create object ( $ctrl_obj = new $class_name)
	4. if component2 exists ---> if method_exists($ctrl_obj, component2) --> $ctrl_obj->$component2($component3, $component4)
	
 
$class_name = "controllers\\".ucfirst($component1)

	doamin.am/settings/general

*/
	
	