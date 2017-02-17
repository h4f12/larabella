<?php

class Droid {
	static $head = 1;
	static $arm = 2;
	static $leg = 2;
	static $eye = 4;

	static function walk(){
		echo "a droid is walking with ".Droid::$leg." legs.";
	}

	function see(){
		return "a droid can see with its ".Droid::$eye. " eyes.";
	}

}


// $adam = new Droid;

echo Droid::$head;
echo "<br>";

Droid::walk();
echo "<br>";

echo Droid::see();

?>