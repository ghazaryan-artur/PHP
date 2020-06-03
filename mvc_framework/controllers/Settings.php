<?php 
namespace controllers;

class Settings{
	function __construct(){
		var_dump("You call Settings class");
	}

	
	public function general($data){
		$numargs = func_num_args();
		var_dump("You call General method with ".$numargs ." arguments");
		// every arguments can called by func_get_arg(int)
	
	}
	
}