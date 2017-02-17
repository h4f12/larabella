<?php

class Droid {
	var $head = 1;
	var $arm = 2;
	var $leg = 2;
	var $eye = 4;

	function walk(){
		echo "a droid is walking with ".$this->leg." legs.";
	}

	function see(){
		return "a droid can see with its ".$this->eye. " eyes.";
	}

}


$adam = new Droid;

echo $adam->head;
echo "<br>";

echo $adam->eye;
echo "<br>";

$adam->walk();
echo "<br>";

echo $adam->see();



?>