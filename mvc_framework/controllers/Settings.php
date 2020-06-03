<?php 
namespace controllers;

class Settings{
	function __construct(){
		var_dump("You call Settings class");
	}

	
	public function general($data){
		if (count($data) < 2)
		var_dump('You call General method with following params');
		foreach ($data as $value){
			var_dump("one of the params is", $value);
		}
		if (count($data) < 2) { // if we need at least 2 param 
			var_dump("error, method need at least 2 param"); // any param since third is ignored
		}
	}
	
}