<?php
namespace system;
class Routes {
	public $components;

	function __construct(){
		$this->components = explode('/', substr($_SERVER['REQUEST_URI'], 1));
		var_dump($this->components);
		if(!empty($this->components[0])){
		
			if($controller = $this->checkObject($this->components[0])) 	{ // es pahin vor elsere voroshvatc chen ays stugume bavarare, hetagayum erevi che,
							// bayc imanam elseri paragayum inchem veradarcnum nor voroshem verchnakan IF-i paymane
				if($this->checkMethod($controller, $this->components[1])){
					$params = array_slice($this->components, 2);
					$methodName = $this->components[1];
					call_user_func_array([$controller, $methodName], $params);
				}
			}

		} else {
			echo "Empty URL, comming soon";
		}

		// ete sax lucume  __constructor-i meche. + aveli karche ev haskanali, - qich segmentacvatc-e ev __constructore tcanrabervatc e
		
		/*$dir = 'controllers'.DIRECTORY_SEPARATOR.ucfirst($this->components[0]) .'.php';
		if (file_exists($dir)){
			$className = "controllers\\" .ucfirst($this->components[0]);

			if(class_exists($className)){
				$obj = new $className;

				if (!empty($this->components[1])){
					if(method_exists($obj, $this->components[1])) {		
						$objMethod =  $this->components[1];
						$params = array_slice($this->components, 2);
						$obj->$objMethod($params);
					} else {
						echo "ERROR: method not found (404)";
					}

				} else {
					echo "Method isn`t called, comming soon";
				}

			} else {
				var_dump("ERROR: class not found (404)");
			}
			

		} else {
			echo 'ERROR: file not found (404)';
		} */



	}
	
	public function checkObject($name){
		var_dump("you call CHeckObject method");
		$dir = 'controllers'.DIRECTORY_SEPARATOR.ucfirst($name) .'.php';
		if (file_exists($dir)){
			$className = "controllers\\" .ucfirst($name);

			if(class_exists($className)){
				return new $className;
			} else {
				var_dump("ERROR: class not found (404)");
			}
		} else {
			echo 'ERROR: file not found (404)';
		}
	}

	public function checkMethod($controller, $methodName){
		var_dump("you call CHeckObject method");
		if ($methodName){
			if(method_exists($controller, $methodName)) {		
				return true;
			} else {
				echo "ERROR: method not found (404)";
			}

		} else {
			echo "Method isn`t called, comming soon";
		}
	}

}

