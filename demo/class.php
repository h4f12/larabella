<?php

class Car {
	public $wheels = 4;
	static $doors = 5;


	function moveWheel() {
		echo "screeeettt!! vroom!";

	}
	
	
}

$bmw = new Car;
echo $bmw->wheels."<br>";
echo $bmw->moveWheel();
echo "<br>";

$bus = new Car;
echo "<hr>Bus:<br>";
echo $bus->wheels = 8;

class Plane extends Car {

}
echo "<hr>Jet:<br>";
$jet = new Plane;
$jet->moveWheel();
echo "<br>".$jet->wheels=2;
echo "<br>".Car::$doors;
echo "<br>".Plane::$doors;