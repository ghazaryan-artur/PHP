<?php
namespace system;

class Routes {
	function __construct($components){
		$dir = 'controllers'.DIRECTORY_SEPARATOR.$components[0] .'.php';
		if (file_exists($dir)){
			$className = "controllers\\" .ucfirst($components[0]);
			$obj = new $className;
		} else {
			echo 'There is no that object';
			exit;
		}
		// if(!empty($components[1]) && method_exists($obj, $components[1])) { // ete methode chgrele kam objectum chline 
																			// nuyn gorcoxutyuna kanchum
		if (!empty($components[1])){
			if(method_exists($obj, $components[1])) {		
				$objMethod =  $components[1];
				$params = [];			
				for($i = 2; count($components); $i++){
					if (empty($components[$i])) break; // vor datark string (orinak erku slash irar hetevic) tuyl chta
					$params[] = $components[$i];
				}
				$obj->$objMethod($params);
			} else {
				echo "there is no that method";
			}
		} else {
			echo "method is not writen";
		}


	}
	
}