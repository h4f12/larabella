<?php

class Droid {

	public $leg = 2;
	static $eye = 2;


	function __construct(){
		echo self::$eye++;
		echo $this->leg;
		// echo "a droid is walking with ".$this->leg++." legs.";
	}
}


$adam = new Droid;
echo "<br>";
$hawa = new Droid;
echo "<br>";
$j = new Droid;

// echo $adam->leg;
// echo "<br>";

// $adam->walk();
// echo "<br>";





?>