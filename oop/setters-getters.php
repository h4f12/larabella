<?php

class Droid {

	static $head = 1;
	public $arm = 2;


	function get_values(){
		echo $this->arm;
	}
	static function set_values(){
		echo Droid::$head = 10;
	}
}
$adam = new Droid;



Droid::set_values();
echo "<br>";
$adam->get_values();

?>