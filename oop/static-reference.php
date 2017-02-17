<?php

class Droid {

	static $leg = 2;


	static function walk(){
		return "a droid is walking with ".self::$leg." legs.";
	}
}


// $adam = new Droid;

class Drone extends Droid{
	static function display(){
		echo parent::walk();
	}

}
Drone::display();


?>