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

class Drone extends Droid{
	var $arm = 0;
}

$t01 = new Drone;

echo $t01->head;
echo "<br>";

echo $t01->arm;

?>